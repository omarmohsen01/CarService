<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartSparePart;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $user_id=Auth::user()->id;
        $cart=Cart::where('user_id',$user_id)->first();
        $items=[];
        if($cart){
            $items=CartSparePart::where('cart_id',$cart->id)->get();
            $total_price=0;
            foreach($items as $item){
                $total_price += $item->quantity*$item->spare_part->price;
            }
        }
        return view('front.checkout',compact('total_price','items'));
    }
    public function pay(Request $request)
    {
        $request->validate([
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'phone'=>'numeric|required',
            'email'=>'required',
            'country'=>'required|string',
            'city'=>'required|string',
            'address'=>'required|string',
        ]);
        $user_id=Auth::user()->id;
        $cart=Cart::where('user_id',$user_id)->first();
        $cart_spare_parts=CartSparePart::where('cart_id',$cart->id)->get();
        $total_price=0;
        foreach($cart_spare_parts as $item){
            $total_price += $item->quantity*$item->spare_part->price;
        }
        $order=Order::create([
            'order_number'=>rand(1,1000000)+rand(1,1000000),
            'customer_name'=>$request->first_name,
            'customer_email'=>$request->email,
            'customer_address'=>$request->address,
            'customer_phone'=>$request->phone,
            'product_total_price'=>$total_price,
            'status'=>'pending'
        ]);
        foreach($cart_spare_parts as $item){
            OrderDetails::create([
                'total'=>$total_price,
                'price'=>$item->spare_part->price,
                'quantity'=>$item->quantity,
                'spare_part_id'=>$item->spare_part->id,
                'order_id'=>$order->id
            ]);
        }
        return redirect()->route('home')->with('success','Your Order Is Created Successfully');
    }
}
