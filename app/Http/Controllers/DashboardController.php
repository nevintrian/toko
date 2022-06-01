<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            'user_count' => User::all()->count(),
            'category_count' => Category::all()->count(),
            'product_count' => Product::all()->count(),
            'order_count' => Order::all()->count(),
            'purchase_count' => Purchase::all()->count()
        ]);
    }
}
