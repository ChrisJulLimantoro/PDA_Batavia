<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use  HasFactory, HasUuids, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'description', 'quantity', 'total_price', 'status', 'payment_method', 'payment_status', 'address', 'comment', 'user_id', 'product_id', 'custom_design'];

    // protected $primaryKey = 'uuid';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
    /**
     * Rules that applied in this model
     *
     * @var array
     */
    public static function validationRules()
    {
        return [
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
            'status' => 'nullable|string|max:50',
            'payment_method' => 'nullable|string|max:50',
            'payment_status' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'comment' => 'nullable|string|max:255',
            'user_id' => 'required|uuid',
            'product_id' => 'required|uuid',
            'custom_design' => 'nullable|string|max:255',
        ];
    }

    /**
     * Messages that applied in this model
     *
     * @var array
     */

    public static function validationMessages()
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must be less than 50 characters',
            'description.required' => 'Description is required',
            'description.string' => 'Description must be a string',
            'description.max' => 'Description must be less than 255 characters',
            'quantity.required' => 'Quantity is required',
            'quantity.integer' => 'Quantity must be an integer',
            'total_price.required' => 'Total price is required',
            'total_price.numeric' => 'Total price must be a number',
            'status.string' => 'Status must be a string',
            'status.max' => 'Status must be less than 50 characters',
            'payment_method.string' => 'Payment method must be a string',
            'payment_method.max' => 'Payment method must be less than 50 characters',
            'payment_status.string' => 'Payment status must be a string',
            'payment_status.max' => 'Payment status must be less than 50 characters',
            'address.string' => 'Address must be a string',
            'address.max' => 'Address must be less than 255 characters',
            'comment.string' => 'Comment must be a string',
            'comment.max' => 'Comment must be less than 255 characters',
            'user_id.required' => 'User ID is required',
            'user_id.uuid' => 'User ID must be a valid UUID',
            'product_id.required' => 'Product ID is required',
            'product_id.uuid' => 'Product ID must be a valid UUID',
            'custom_design.string' => 'Custom design must be a string',
            'custom_design.max' => 'Custom design must be less than 255 characters',
        ];
    }

    /**
     * Filter data that will be saved in this model
     *
     * @var array
     */
    public function resourceData($request)
    {
        return ModelUtils::filterNullValues([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity'),
            'total_price' => $request->input('total_price'),
            'status' => $request->input('status'),
            'payment_method' => $request->input('payment_method'),
            'payment_status' => $request->input('payment_status'),
            'address' => $request->input('address'),
            'comment' => $request->input('comment'),
            'user_id' => $request->input('user_id'),
            'product_id' => $request->input('product_id'),
            'custom_design' => $request->input('custom_design'),
        ]);
    }

    /**
     * Controller associated with this model
     *
     * @var string
     */

    public function controller()
    {
        return 'App\Http\Controllers\OrderController';
    }

    /**
     * Relations associated with this model
     *
     * @var array
     */
    public function relations()
    {
        return ['user', 'product'];
    }


    // DEFINE RELATIONS
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
