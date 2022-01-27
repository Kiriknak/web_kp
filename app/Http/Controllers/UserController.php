<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('dashboard.users.index', compact('users'), ['title' => 'Dashboard Users']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.add', ['title' => 'Create Users']);
    }

    public function createAdmin()
    {
        return view('dashboard.users.AddAdmin', ['title' => 'Create Users']);
    }
    public function register()
    {
        return view('auth.register', ['title' => 'Register']);
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
            'email' => 'email|unique:users,email',
            'password' => ['confirmed', Password::min(6)->letters()->numbers()->uncompromised()],
            'name'   => 'required',
            'phone' => 'required|unique:customers,telepon|numeric',
            'alamat' => 'required',
            'kodepos' => 'required|numeric',
            'kabupaten' => 'required',
            'state' => 'required'
        ]);



        $user = User::create([
            'email'             => $validated['email'],
            'password'          => Hash::make($validated['password']),
        ]);

        Customer::create([
            'nama' => $validated['name'],
            'alamat' => $validated['alamat'],
            'kodepos' => $validated['kodepos'],
            'kabupaten' => $validated['kabupaten'],
            'provinsi' => $validated['state'],
            'telepon' => $validated['phone'],
            'user_id' => $user->id,
        ]);

        if (!Auth::check()) {

            Auth::attempt([
                'email' => $validated['email'],
                'password' => $validated['password']
            ]);
        } else {
            return back()->withSuccess('user sukses terdaftar');
        }

        return redirect()->to('/');
    }



    public function storeAdmin(Request $request)
    {

        $validated = $request->validate([
            'email' => 'email|unique:users,email',
            'password' => ['confirmed', Password::min(6)->letters()->numbers()],
        ]);



        $user = User::create([
            'email'             => $validated['email'],
            'password'          => Hash::make($validated['password']),
        ]);
        $user->role_id = 1;
        $user->save();

        if (!Auth::check()) {

            Auth::attempt([
                'email' => $validated['email'],
                'password' => $validated['password']
            ]);
        } else {
            return back()->withSuccess('user sukses terdaftar');
        }

        return back()->withSuccess('user sukses terdaftar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        if ($user->id == Auth::user()->id)
            return redirect()->back()->withErrors(['msg' => 'Tidak Boleh Menghapus Users yang sedang login']);
        else {
            $user->delete();

            return back()->withSuccess('deleted');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }



    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // dd($request);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                ->withSuccess('Signed in');
        }

        return redirect('login')->withErrors(['errors.auth' => 'true']);
    }

    public function logout()
    {
        Auth::logout();
        $cart =  array();
        Session::put('cart', $cart);
        return redirect('/');
    }

    public function login()
    {
        return view('auth.login', ['title' => 'Login']);
    }
}
