<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Users/Index', [
            'users' => User::paginate()
        ]);
    }

    public function create()
    {
        return Inertia::render('Users/Create', [
            'users' => User::paginate()
        ]);
    }

    public function store(Request $request)
    {
        User::create([
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name
        ]);

        return Inertia::render('Users/Create', [
            'users' => User::paginate()
        ]);
    }
}
