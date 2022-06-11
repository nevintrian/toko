<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeProductsController extends Controller
{
    public function index(Request $request)
    {

        if ($request->keywords) {
            return Inertia::render('Home/Products', [
                'products' => Product::with('category')
                    ->where('name', 'LIKE', '%' . $request->keywords . '%')
                    ->orWhere('code', 'LIKE', '%' . $request->keywords . '%')
                    ->paginate(),
                'categories' => Category::paginate(),
            ]);
        }

        if ($request->filter) {
            return Inertia::render('Home/Products', [
                'products' => Product::with('category')
                    ->where('category_id', $request->filter)
                    ->paginate(),
                'categories' => Category::paginate(),
            ]);
        }

        return Inertia::render('Home/Products', [
            'categories' => Category::paginate(),
            'products' => Product::orderBy('sold', 'DESC')->paginate(),
        ]);
    }
}
