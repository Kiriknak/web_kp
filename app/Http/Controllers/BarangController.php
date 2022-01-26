<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $barang = Barang::latest()->paginate(10);
        return view('dashboard.barang', compact('barang'), ['title' => 'Dashboard Barang']);
    }


    public function search(Request $request)
    {


        $barang = Barang::where('name', 'like', '%' . $request->input('name') . '%')->paginate();

        return view('dashboard.barang', compact('barang'), ['title' => 'Dashboard Barang']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.barang.add');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'numeric|required',
            'image' => 'mimes:png,jpeg,jpg|required'
        ]);

        $request->file('image')->storePublicly('product', 'public');

        $barang = Barang::create(
            [
                'name' => $validated['name'],
                'price' => $validated['price'],
                'file_path' => $request->file('image')->hashName(),
                'description' => $request['description'],
            ]
        );

        return redirect(route('barang.index'))->withSuccess($barang);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {

        return view('dashboard.barang.edit', ['barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $Barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'numeric|required',
            'image' => 'mimes:png,jpeg,jpg',
            'description' => 'string'
        ]);
        $barang->name = $validated['name'];
        $barang->price = $validated['price'];
        $barang->description = $validated['description'];

        if ($request->hasFile('image')) {

            $request->file('image')->storePublicly('product', 'public');
            $barang->file_path = $request->file('image')->hashName();
        }

        $barang->save();
        return back()->withSuccess('barang');
        //}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);

        $barang->delete();

        return back()->withSuccess('deleted');
    }
}
