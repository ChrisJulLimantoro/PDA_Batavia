<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends BaseController
{
    public function __construct(\App\Models\Order $model)
    {
        parent::__construct($model);
    }

    public function addView(Request $request)
    {
        $data = $request->input('product_id');
        return view('order.add', [
            'product_id' => $data,
        ]);
    }
}
