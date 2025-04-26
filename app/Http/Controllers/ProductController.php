<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function __construct(\App\Models\Product $model)
    {
        parent::__construct($model);
    }
}
