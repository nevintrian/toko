<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use Inertia\Inertia;

class HomeAboutController extends Controller
{
    public function index()
    {
        return Inertia::render('Home/About', [
            'abouts' => About::paginate(),
            'contacts' => Contact::paginate(),
        ]);
    }
}
