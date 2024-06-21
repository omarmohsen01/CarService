<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartSparePart;
use App\Models\SparePart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user_id=Auth::user()->id;
        $cart=Cart::where('user_id',$user_id)->first();
        $cartItems=[];
        if($cart){
            $cartItems=CartSparePart::where('cart_id',$cart->id)->get();
        }
        return view('front.cart',compact('cartItems'));
    }

    public function add_to_cart($id)
    {
        $spare_part=SparePart::find($id);
        $user_id=Auth::user()->id;
        $cart=Cart::where('user_id',$user_id)->first();
        if($cart){
            if($spare_part->quantity==0){
                return redirect()->back()->with('fail','Out Of Stock');
            }else{
                CartSparePart::create([
                    'cart_id'=>$cart->id,
                    'spare_part_id'=>$spare_part->id,
                    'quantity'=>1
                ]);
                return redirect()->back()->with('success','Spare Part Added Sucessfully');
            }
        }else{
            $cart=Cart::create(['user_id',$user_id]);
            CartSparePart::create([
                'cart_id'=>$cart->id,
                'spare_part_id'=>$spare_part->id,
                'quantity'=>1
            ]);
            return redirect()->back()->with('success','Spare Part Added Sucessfully');
        }
    }
}
