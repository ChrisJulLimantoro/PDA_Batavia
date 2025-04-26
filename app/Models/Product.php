<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use  HasFactory, HasUuids, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'description', 'price', 'image', 'status'];

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
    protected $casts = [
        'price' => 'json',
    ];
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
            'price' => 'required|json',
            'image' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
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
            'price.required' => 'Price is required',
            'price.json' => 'Price must be a valid JSON string',
            'image.string' => 'Image must be a string',
            'image.max' => 'Image must be less than 255 characters',
            'status.boolean' => 'Status must be a boolean value',
            'status.nullable' => 'Status is optional',
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
            'price' => $request->input('price'),
            'image' => $request->input('image'),
            'status' => $request->input('status'),
        ]);
    }

    /**
     * Controller associated with this model
     *
     * @var string
     */

    public function controller()
    {
        return 'App\Http\Controllers\ProductController';
    }

    /**
     * Relations associated with this model
     *
     * @var array
     */
    public function relations()
    {
        return ['orders', 'categories', 'vendors'];
    }

    /**
     * Get the orders associated with the product.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the categories associated with the product.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products', 'product_id', 'category_id');
    }

    /**
     * Get the vendors associated with the product.
     */
    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'product_vendors', 'product_id', 'vendor_id');
    }
}
