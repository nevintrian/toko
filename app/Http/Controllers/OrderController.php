<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class OrderController extends Controller
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
                'data' => Order::all(),
            ], Response::HTTP_OK);
        }

        if ($request->keywords) {
            return Inertia::render('Orders/Index', [
                'orders' => Order::where('code', 'LIKE', '%' . $request->keywords . '%')->paginate(),
            ]);
        }

        return Inertia::render('Orders/Index', [
            'orders' => Order::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Orders/Create', [
            'products' => Product::paginate()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create([
            'code' => $request->code,
            'date' => Carbon::now(),
            'customer_name' => $request->customer_name,
            'total_price' => $request->total_price,
            'status' => 1
        ]);

        for ($i = 0; $i < $request->cart_row; $i++) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $request->product_id[$i],
                'quantity' => $request->quantity[$i],
                'subtotal' => $request->subtotal[$i]
            ]);

            Product::where('id', $request->product_id[$i])->update([
                'stock' => DB::raw("stock-" . $request->quantity[$i]),
                'sold' =>  DB::raw("sold+" . $request->quantity[$i]),
            ]);
        }

        return Redirect::route('order.index')->with('success', 'Berhasil Tambah Penjualan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return Inertia::render('Orders/Show', [
            'order' => Order::where('id', $order->id)->first(),
            'order_detail' => OrderDetail::where('order_id', $order->id)->with('product')->paginate()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return Inertia::render('Orders/Edit', [
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        Order::find($order->id)->update($request->all());
        return Redirect::route('order.index')->with('success', 'Berhasil Ubah Penjualan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $orders = OrderDetail::where('order_id', $order->id)->get()->pluck('quantity', 'product_id')->toArray();
        foreach ($orders as $key => $value) {
            Product::where('id', $key)->update([
                'stock' => DB::raw("stock+$value"),
                'sold' => DB::raw("sold-$value"),
            ]);
        }
        Order::destroy($order->id);
        return Redirect::route('order.index')->with('success', 'Berhasil Hapus Penjualan.');
    }
}
