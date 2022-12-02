<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('payment_status', 'unpaid')->get();
        $orderItems = OrderItems::get();
        $categories = Category::where('created_at', '!=', null)->get();
        return view('admin.order.index', compact('orders', 'categories', 'orderItems'));
    }

    public function orderDelivered()
    {
        $orders = Order::where('status', 'delivered')->where('payment_status', 'paid')->get();
        $orderItems = OrderItems::get();
        $categories = Category::where('created_at', '!=', null)->get();
        return view('admin.order.delivered', compact('orders', 'categories','orderItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $orders = Order::find($id);
        return view('admin.fee.edit', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderItems = OrderItems::find($id);
        $orders = Order::get();
        $users = User::get();
        return view('admin.order.edit', compact('orderItems', 'orders', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $orders = Order::find($id);
    //     $orders->delete();
    //     return redirect('/order')->with('status', 'Product Deleted Successfully!');
    // }
}
