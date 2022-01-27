<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function index()
    {
        return view('cart.index');
    }

    public function addToCart(Request $request, $id)
    {
        $barang = Barang::where('id', $id)->first();
        $cart = Session::get('cart');


        try {
            $cart[$id]['qty'] += 1;
        } catch (\Throwable $th) {
            $cart[$barang->id] = array(
                "id" => $barang->id,
                "qty" => 1,
            );
        }
        Session::put('cart', $cart);
        Session::flash('success', 'barang berhasil ditambah ke keranjang!');
        //dd(Session::get('cart'));
        return redirect()->back();
    }

    public function updateCart(Request $request, $id)
    {
        $cart = Session::get('cart');


        if ($request->qty > 0) {
            $cart[$id]['qty'] = $request->qty;
        } else {
            unset($cart[$id]);
        }

        Session::put('cart', $cart);
        return redirect()->back();
    }
    public function deleteCart($id)
    {
        $cart = Session::get('cart');
        unset($cart[$id]);
        Session::put('cart', $cart);
        return redirect()->back();
    }
}
