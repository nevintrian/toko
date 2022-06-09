<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHomeRequest;
use App\Http\Requests\UpdateHomeRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'success',
                'data' => Home::all(),
            ], Response::HTTP_OK);
        }
        if ($request->keywords) {
            // $hasil = Product::with('category')->where('name', 'LIKE', '%' . $request->keywords . '%')
            //     ->orWhere('code', 'LIKE', '%' . $request->keywords . '%')
            //     ->orWhere('category_id', 'LIKE', '%' . $request->keywords . '%')
            //     ->paginate();
            // dd($hasil);
            return Inertia::render('Homes/Index', [
                'homes' => Home::with('contact')->paginate(),
            ]);
        }
        return Inertia::render('Homes/Index', [
            'homes' => Home::with('contact')->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Homes/Create', ['contacts' => Contact::paginate()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHomeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHomeRequest $request)
    {
        $input = $request->all();
        $image = $request->file('image');
        $destinationPath = public_path() . '/uploads/homes/';
        $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $filename);
        $input['image'] = "$filename";
        Home::create($input);
        return Redirect::route('home.index')->with('success', 'Berhasil Tambah Home.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        return Inertia::render('Homes/Edit', [
            'home' => $home,
            'contacts' => Contact::paginate()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHomeRequest  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomeRequest $request, Home $home)
    {

        $input = $request->all();
        // dd($input);
        $image = $request->file('image');
        if ($image) {
            $destinationPath = public_path() . '/uploads/homes/';
            $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);
            $input['image'] = "$filename";
            // dd($image);
        } else {
            unset($input['image']);
        }

        Home::find($home->id)->update($input);
        return Redirect::route('home.index')->with('success', 'Berhasil Ubah Home.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        Home::destroy($home->id);
        return Redirect::route('home.index')->with('success', 'Berhasil Hapus Home.');
    }
}
