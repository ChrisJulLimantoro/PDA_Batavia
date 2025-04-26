<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    public function __construct(\App\Models\Order $model)
    {
        parent::__construct($model);
    }

    public function rupiahFormat($amount)
    {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }

    public function addView(Request $request)
    {
        $data = $request->input('product_id');
        // Get all Products
        $products = Product::all();
        return view('order.add', [
            'product_id' => $data,
            'products' => $products,
        ]);
    }

    public function add(Request $request)
    {
        $data = $request->only(['product_id', 'quantity', 'address', 'description']);
        // Calculate the total price
        $product = Product::find($data['product_id']);
        $prices = json_decode($product->price, true);
        foreach ($prices as $price) {
            if ($price['moq'] > $data['quantity']) {
                break;
            }
            $data['price'] = $price['price'];
            $data['subtotal'] = $price['price'] * $data['quantity'];
            // Set Shipping Cost
            $data['shipping_cost'] = 0.1 * $data['subtotal'];
            $data['tax'] = 0.1 * ($data['subtotal'] + $data['shipping_cost']);

            $data['total_price'] = $data['subtotal'] + $data['shipping_cost'] + $data['tax'];
        }
        
        // Get all Products save state at session first
        $request->session()->put('product_id', $data['product_id']);
        $request->session()->put('quantity', $data['quantity']);
        $request->session()->put('address', $data['address']);
        $request->session()->put('description', $data['description']);
        $request->session()->put('subtotal', $data['subtotal']);
        $request->session()->put('total_price', $data['total_price']);
        $request->session()->put('shipping_cost', $data['shipping_cost']);
        $request->session()->put('tax', $data['tax']);
        $request->session()->put('price', $data['price']);
        // Redirect
        return redirect()->route('order.payment');
    }

    public function payment(Request $request)
    {
        $data = $request->session()->all();
        // If even one session data not found redirect to add view
        if (empty($data['product_id']) || empty($data['quantity']) || empty($data['address']) || empty($data['description']) || empty($data['subtotal']) || empty($data['shipping_cost']) || empty($data['price']) || empty($data['total_price'])) {
            return redirect()->route('order.add');
        }
        // Get Product
        $product = Product::find($data['product_id']);
        // Kill all the session
        $request->session()->forget(['product_id', 'quantity', 'address', 'description', 'total_price', 'shipping_cost', 'price', 'subtotal']);
        return view('order.payment', [
            'product_id' => $data['product_id'],
            'quantity' => $data['quantity'],
            'address' => $data['address'],
            'description' => $data['description'],
            'total_price' => $data['total_price'],
            'shipping_cost' => $data['shipping_cost'],
            'tax' => $data['tax'],
            'subtotal' => $data['subtotal'],
            'price' => $data['price'],
            'product' => $product,
        ]);
    }

    public function save(Request $request)
    {
        $requestFillable = $request->only($this->model->getFillable());
        $requestFillable['user_id'] = $request->session()->get('user_id');
        $requestFillable['status'] = 1;
        $requestFillable['payment_method'] = 1;
        $requestFillable['payment_status'] = 1;


        $valid = Validator::make($requestFillable, $this->model->validationRules(), $this->model->validationMessages());
        if ($valid->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Order failed to create',
                'errors' => $valid->errors(),
            ], 500);
        }

        $created =  $this->model->create($requestFillable);
        $data = $this->getById($created->id);
        if ($created) {
            //TODO: ADD NOTIFICATION FOR EMAIL AND SWAL AT HOME
            $this->sendMailCreated($data);
            // return redirect()->route('home')->withSuccess('Order created successfully');
            return response()->json([
                'success' => true,
                'message' => 'Order created successfully',
                'data' => $created,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Order failed to create',
                'errors' => 'Order failed to create',
            ], 500);        
        }
    }

    public function custom(Request $request)
    {
        if (session('user_id') == null) {
            return redirect()->route('login')->with('error', 'Please login first');
        }
        $data = $request->input('product_id');
        // Get all Products
        $products = Product::all();
        return view('order.custom', [
            'product_id' => $data,
            'products' => $products,
        ]);
    }

    public function customSave(Request $request)
    {
        $data = $request->only($this->model->getFillable());
        // Save the data
        $data['user_id'] = $request->session()->get('user_id');
        $data['status'] = 1;
        $data['payment_method'] = 1;
        $data['payment_status'] = 1;
        $data['total_price'] = 0;
        $data['custom_design'] = "";
        // Check the data first
        $valid = Validator::make($data, $this->model->validationRules(), $this->model->validationMessages());
        if ($valid->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Order failed to create',
                'errors' => $valid->errors(),
            ], 500);
        }
        // File
        if ($request->hasFile('custom_design')) {
            $valid = Validator::make($request->all(), [
                'custom_design' => 'required|mimes:jpg,jpeg,png|max:2048',
            ]);
            if ($valid->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'File failed to upload',
                    'errors' => $valid->errors(),
                ], 500);
            }
            $file = $request->file('custom_design');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data['custom_design'] = $filename;
        }

        // Save the data
        $created =  $this->model->create($data);
        $data = $this->getById($created->id);
        if ($created) {
            $this->sendMailCustom($data);
            return response()->json([
                'success' => true,
                'message' => 'Order created successfully',
                'data' => $created,
            ], 200);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'Order failed to create',
                'errors' => 'Order failed to create',
            ], 500);
        }
    }

    public function sendMailCreated($data)
    {
        $mail = new MailController(new \App\Mail\OrderMail($data));
        dispatch(new SendMailJob($mail, ['to' => $data->user->email]));
    }

    public function sendMailCustom($data)
    {
        $mail = new MailController(new \App\Mail\CollaborationMail($data));
        dispatch(new SendMailJob($mail, ['to' => $data->user->email]));
    }
}
