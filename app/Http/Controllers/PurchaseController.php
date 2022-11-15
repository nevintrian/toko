<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PurchaseController extends Controller
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
                'data' => Purchase::all(),
            ], Response::HTTP_OK);
        }

        if ($request->keywords) {
            return Inertia::render('Purchases/Index', [
                'purchases' => Purchase::where('code', 'LIKE', '%' . $request->keywords . '%')->paginate(),
            ]);
        }

        return Inertia::render('Purchases/Index', [
            'purchases' => Purchase::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Purchases/Create', [
            'products' => Product::paginate()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePurchaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchaseRequest $request)
    {
        $purchase = Purchase::create([
            'code' => $request->code,
            'date' => Carbon::now(),
            'supplier_name' => $request->supplier_name,
            'total_price' => $request->total_price,
            'status' => 1
        ]);

        for ($i = 0; $i < $request->cart_row; $i++) {
            PurchaseDetail::create([
                'purchase_id' => $purchase->id,
                'product_id' => $request->product_id[$i],
                'quantity' => $request->quantity[$i],
                'subtotal' => $request->subtotal[$i]
            ]);

            Product::where('id', $request->product_id[$i])->update([
                'stock' => DB::raw("stock+" . $request->quantity[$i]),
            ]);
        }

        return Redirect::route('purchase.index')->with('success', 'Berhasil Tambah Pembelian.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return Inertia::render('Purchases/Show', [
            'purchase' => Purchase::where('id', $purchase->id)->first(),
            'purchase_detail' => PurchaseDetail::where('purchase_id', $purchase->id)->with('product')->paginate()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        return Inertia::render('Purchases/Edit', [
            'purchase' => $purchase
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurchaseRequest  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        Purchase::find($purchase->id)->update($request->all());
        return Redirect::route('purchase.index')->with('success', 'Berhasil Ubah Pembelian.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchases = PurchaseDetail::where('purchase_id', $purchase->id)->get()->pluck('quantity', 'product_id')->toArray();
        foreach ($purchases as $key => $value) {
            Product::where('id', $key)->update([
                'stock' => DB::raw("stock-$value"),
            ]);
        }
        Purchase::destroy($purchase->id);
        return Redirect::route('purchase.index')->with('success', 'Berhasil Hapus Pembelian.');
    }

    public function print_pdf()
    {
        $purchase = Purchase::all();
        $pdf = PDF::loadview('purchase_pdf', ['purchases' => $purchase]);
        return $pdf->download('laporan-pembelian-pdf');
        exit();
    }
}
