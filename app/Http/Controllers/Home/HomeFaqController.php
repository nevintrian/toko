<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Inertia\Inertia;

class HomeFaqController extends Controller
{
    public function index()
    {
        return Inertia::render('Home/Faq', [
            'categories' => Category::all(),
            'products' => Product::all()
        ]);
    }
}
