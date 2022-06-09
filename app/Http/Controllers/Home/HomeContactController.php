<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use Inertia\Inertia;

class HomeContactCOntroller extends Controller
{
    public function index()
    {
        return Inertia::render('Home/Contact', [
            'contacts' => Contact::paginate(),
        ]);
    }
}
