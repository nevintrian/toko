<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Home;
use App\Models\Product;
use Inertia\Inertia;

class HomeFaqController extends Controller
{
    public function index()
    {
        return Inertia::render('Home/Faq', [
            'faqs' => Faq::paginate(),
            'homes' => Home::with('contact')->paginate()
        ]);
    }
}
