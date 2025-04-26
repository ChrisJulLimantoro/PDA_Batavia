<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use  HasFactory, HasUuids, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'description','address','phone','email'];

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
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:50|unique:vendors,email',
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
            'address.required' => 'Address is required',
            'address.string' => 'Address must be a string',
            'address.max' => 'Address must be less than 255 characters',
            'phone.required' => 'Phone is required',
            'phone.string' => 'Phone must be a string',
            'phone.max' => 'Phone must be less than 50 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.max' => 'Email must be less than 50 characters',
            'email.unique' => 'Email must be unique',
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
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ]);
    }

    /**
     * Controller associated with this model
     *
     * @var string
     */

    public function controller()
    {
        return 'App\Http\Controllers\VendorController';
    }

    /**
     * Relations associated with this model
     *
     * @var array
     */
    public function relations()
    {
        return ['products'];
    }

    /**
     * Get the products for the vendor.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_vendors', 'vendor_id', 'product_id')
            ->withPivot('id')
            ->withTimestamps();
    }
}
