<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('dashboard.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'=> ['required','email'],
            'password'=> ['required','string'],
        ]);
        // $admin = Admin::where('email', $request->email)->first();
        // if($admin){
        //     if(Hash::check($request->password, $admin->password)){
        //         return redirect()->route('dashboard.index');
        //     }else{
        //          return redirect()->back()->with('fail','Invalid ');
        //     }
        // }else{
        //     return redirect()->back()->with('fail','Invalid Credentials');
        // }

        if(Auth::guard('admin')->attempt(['email'=> $request->email,'password'=> $request->password])) {
            return redirect()->route('dashboard.index');
        }else{
            return redirect()->back()->with('fail','Invalid Credentials');
        }
    }
}
