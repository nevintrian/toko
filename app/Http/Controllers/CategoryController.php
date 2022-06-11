<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CategoryController extends Controller
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
                'data' => Category::all(),
            ], Response::HTTP_OK);
        }

        if ($request->keywords) {
            return Inertia::render('Categories/Index', [
                'categories' => Category::where('name', 'LIKE', '%' . $request->keywords . '%')->paginate(),
            ]);
        }

        return Inertia::render('Categories/Index', [
            'categories' => Category::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $input = $request->all();
        $image = $request->file('image');
        $destinationPath = public_path() . '/uploads/categories/';
        $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $filename);
        $input['image'] = "$filename";
        Category::create($input);
        return Redirect::route('category.index')->with('success', 'Berhasil Tambah Kategori.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return Inertia::render('Categories/Edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = public_path() . '/uploads/categories/';
            $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);
            $input['image'] = "$filename";
        } else {
            unset($input['image']);
        }

        Category::find($category->id)->update($input);
        return Redirect::route('category.index')->with('success', 'Berhasil Ubah Kategori.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return Redirect::route('category.index')->with('success', 'Berhasil Hapus Kategori.');
    }
}
