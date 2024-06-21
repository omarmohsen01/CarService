<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register_index()
    {
        $brands=Brand::all();
        return view('front.auth.register',compact('brands'));
    }
    public function register_store(Request $request)
    {
        $request->validate([
            'first_name'=>['required','string'],
            'last_name'=>['required','string'],
            'email'=> ['required','email','unique:users,email'],
            'password'=> ['required','string'],
            'phone'=> ['required','integer','unique:users,phone'],
            'brand_id'=>'integer',
        ]);
        // dd($request);
        $user=User::create([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'password'=> Hash::make($request->password),
            'brand_id'=>$request->brand_id
        ]);
        Auth::login($user);
        return redirect()->route('home');
    }
    public function login_index()
    {
        $brands=Brand::all();
        return view('front.auth.register',compact('brands'));
    }
    public function login_store(Request $request)
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
        if(Auth::attempt(['email'=> $request->email,'password'=> $request->password])) {
            return redirect()->route('home');
        }else{
            return redirect()->back()->with('fail','Invalid Credentials');
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.index')->with('success', 'You have been logged out successfully.');
    }
}
