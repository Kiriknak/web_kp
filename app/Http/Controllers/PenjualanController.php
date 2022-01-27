<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $penjualan = Penjualan::latest()->paginate(10);
        return view('dashboard.penjualan.index', compact('penjualan'), ['title' => 'Dashboard Penjualan']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function checkout(Request $request)
    {
        return view('penjualan.index');
        //dd($user->customer->nama);
    }



    public function place(Request $request)
    {
        $customer = Auth::user()->customer;
        return $this->store($request, $customer);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Customer $customer)
    {
        $cart = Session::get('cart');
        if (!count($cart) > 0) return back()->withErrors('Cart is Empty');
        $penjualan = Penjualan::create(['customer_id' => $customer->id]);


        foreach ($cart as $cartItem) {
            $barang = Barang::where('id', $cartItem['id'])->first();
            $detailPenjualan = DetailPenjualan::create(
                [
                    'penjualan_id' => $penjualan->id,
                    'barang_id' => $barang->id,
                    'jumlah' => $cartItem['qty'],
                    'harga' => $barang->price
                ]
            );
        }
        if ($detailPenjualan != null) {
            $cart = array();
            Session::put('cart', $cart);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
