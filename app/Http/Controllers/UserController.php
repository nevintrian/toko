<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
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
        return Inertia::render('Users/Create');
    }


    public function store(StoreUserRequest $request)
    {
        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name
        ]);

        return Redirect::route('user.index')->with('success', 'Berhasil Tambah User.');
    }

    public function edit(User $user)
    {
        return Inertia::render('Users/Edit', [
            'user' => $user,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        if ($request->password) {
            User::find($user->id)->update(['password' => Hash::make($request->password)]);
        }

        User::find($user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return Redirect::route('user.index')->with('success', 'Berhasil Ubah User.');
    }


    public function destroy(User $user)
    {
        User::destroy($user->id);
        return Redirect::route('user.index')->with('success', 'Berhasil Hapus User.');
    }
}
