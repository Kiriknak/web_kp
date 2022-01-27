<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer = Customer::paginate(10);
        return view('dashboard.customer.index', compact('customer'), ['title' => 'Dashboard Customer']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.customer.add');
    }

    public function search(Request $request)
    {
        //
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
            'name'   => 'required',
            'phone' => 'required|unique:customers,telepon|numeric',
            'alamat' => 'required',
            'kodepos' => 'required|numeric',
            'kabupaten' => 'required',
            'state' => 'required'
        ]);

        Customer::create([
            'nama' => $validated['name'],
            'alamat' => $validated['alamat'],
            'kodepos' => $validated['kodepos'],
            'kabupaten' => $validated['kabupaten'],
            'provinsi' => $validated['state'],
            'telepon' => $validated['phone'],
            'user_id' => null
        ]);
        return back()->with('msg', 'Customer added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {

        return view('dashboard.customer.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'phone' => 'numeric|required',
            'kodepos' => 'required',
            'kabupaten' => 'required',
            'state' => 'required',
        ]);
        $customer->nama = $validated['name'];
        $customer->alamat = $validated['alamat'];
        $customer->telepon = $validated['phone'];
        $customer->kabupaten = $validated['kabupaten'];
        $customer->provinsi = $validated['state'];
        $customer->save();

        return back()->with('msg', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
