<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orders=Order::all();
        return view('dashboard.order.admin_order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order=Order::find($id);
        $order->delete();
        return redirect()->route('dashboard.orders.index')->with('success','Order Deleted Successfully');
    }

    public function change_order_status(string $id)
    {
        $order=Order::findOrFail($id);
        if($order->status=='pending'){
            $order->status= 'delivery';
            $order->save();
            $status_changed= 'delivery';
        }elseif($order->status== 'delivery'){
            $order->status='cancelled';
            $order->save();
            $status_changed= 'cancelled';
        }
        // Gate::authorize("acitveorder",Admin::class);
        try{
            // $status_changed=$this->orderService->changeorderStatus($id);
            if($status_changed=='delivery'){
                return redirect()->route('dashboard.orders.index')
                    ->with('success','order Has Become delivery');
            }elseif($status_changed=='cancelled'){
                return redirect()->route('dashboard.orders.index')
                    ->with('success','order Has Become Active');
            }
        }catch(\Exception $e){
            return redirect()->route('dashboard.orders.index')
                ->with('fail','Something Erorr,Please Try Again');
            throw $e;
        }
    }
}
