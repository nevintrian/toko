<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeProductController extends Controller
{
    public function index($id)
    {
        return Inertia::render('Home/Product', [
            'product' => Product::with('category')
                ->where('id', $id)
                ->paginate(),
            'contact' => Contact::paginate()
        ]);
    }
}
