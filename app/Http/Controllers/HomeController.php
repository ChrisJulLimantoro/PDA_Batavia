<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        return view('home');
    }
}
