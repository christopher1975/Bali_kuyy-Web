<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    function index() {
        return view('register');
    }

    function register_admin(Request $request) {
        $validatedData =  $request->validate([
            'email' => 'required|email:dns|unique:users',
            'nama' => 'required',
            'password' => 'required'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        Admin::create($validatedData);
        return redirect('/login');
    }
}