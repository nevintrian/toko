<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Inertia\Inertia;

class HomeProductsController extends Controller
{
    public function index()
    {
        return Inertia::render('Home/Products', [
            'categories' => Category::paginate(),
            'products' => Product::paginate()
        ]);
    }
}
