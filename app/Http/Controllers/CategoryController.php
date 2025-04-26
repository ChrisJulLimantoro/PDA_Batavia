<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function __construct(Category $model)
    {
        parent::__construct( $model);
    }
}
