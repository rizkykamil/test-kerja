<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // index login

    public function index()
    {
        return view('login');
    }

    public function post(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
             'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (auth()->attempt($request->only('username', 'password'))) {
            return redirect()->route('product.index')->with('success', 'Login berhasil');
        }

        return redirect()->back()->with('error', 'Username atau password salah');
    }
}
