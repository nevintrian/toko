<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Inertia\Inertia;

class HomeIndexController extends Controller
{
    public function index()
    {
        return Inertia::render('Home/Index', [
            'categories' => Category::all(),
            'products' => Product::all()
        ]);
    }
}
