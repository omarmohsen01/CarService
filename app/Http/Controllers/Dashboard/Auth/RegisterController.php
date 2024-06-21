<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('dashboard.auth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>['required','string'],
            'last_name'=>['required','string'],
            'email'=> ['required','email'],
            'password'=> ['required','string'],
            'phone'=> ['required','integer','unique:admins'],
        ]);
        $admin=Admin::create([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'password'=> Hash::make($request->password),
            'type'=> 'VENDOR'
        ]);
        return redirect()->route('dashboard.login.index')->with('success','Welcome, You Have Become Vendor Now');
    }
}
