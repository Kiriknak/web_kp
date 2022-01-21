<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', ['title' => 'Register']);
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'email' => 'email|unique:users,email',
            'password' => ['confirmed', Password::min(6)->letters()->numbers()->uncompromised()],
            'name'   => 'required',
            'phone' => 'required|unique:users,phone|numeric',
            'alamat' => 'required'
        ]);


        User::create([
            'email'             => $validated['email'],
            'password'          => Hash::make($validated['password']),
            'name'              => ($validated['name']),
            'phone' => $validated['phone'],
            'alamat' => $validated['alamat']
        ]);
        Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password']
        ]);
        return redirect()->to('/');
    }
}
