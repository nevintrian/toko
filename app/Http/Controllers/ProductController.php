<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProductController extends Controller
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
                'data' => Product::all(),
            ], Response::HTTP_OK);
        }
        if ($request->keywords) {
            // $hasil = Product::with('category')->where('name', 'LIKE', '%' . $request->keywords . '%')
            //     ->orWhere('code', 'LIKE', '%' . $request->keywords . '%')
            //     ->orWhere('category_id', 'LIKE', '%' . $request->keywords . '%')
            //     ->paginate();
            // dd($hasil);
            return Inertia::render('Products/Index', [
                'products' => Product::with('category')
                    ->where('name', 'LIKE', '%' . $request->keywords . '%')
                    ->orWhere('code', 'LIKE', '%' . $request->keywords . '%')
                    ->paginate(),
            ]);
        }
        return Inertia::render('Products/Index', [
            'products' => Product::with('category')->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Products/Create', ['categories' => Category::paginate()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $input = $request->all();
        $image = $request->file('image');
        $destinationPath = public_path() . '/uploads/products/';
        $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $filename);
        $input['image'] = "$filename";
        Product::create($input);
        return Redirect::route('product.index')->with('success', 'Berhasil Tambah Produk.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return Inertia::render('Products/Edit', [
            'product' => $product,
            'categories' => Category::paginate()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = public_path() . '/uploads/products/';
            $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);
            $input['image'] = "$filename";
        } else {
            unset($input['image']);
        }

        Product::find($product->id)->update($input);
        return Redirect::route('product.index')->with('success', 'Berhasil Ubah Produk.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return Redirect::route('product.index')->with('success', 'Berhasil Hapus Produk.');
    }
}
