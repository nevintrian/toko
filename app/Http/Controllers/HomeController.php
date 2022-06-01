<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home/Index', [
            'categories' => Category::paginate(6),
            'products' => Product::paginate()
        ]);
    }
}
