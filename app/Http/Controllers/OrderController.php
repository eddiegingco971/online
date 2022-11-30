<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::get();
        $categories = Category::where('created_at', '!=', null)->get();
        return view('admin.order.index', compact('orders', 'categories'));
    }

    public function orderDelivered()
    {
        $orders = Order::get();
        $categories = Category::where('created_at', '!=', null)->get();
        return view('admin.order.delivered', compact('orders', 'categories'));
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
    // public function store(Request $request)
    // {
    //     $orders = new Order;
    //     $orders->user_id = $request->input('user_id');
    //     $orders->price = $request->input('price');
    //     $orders->description = $request->input('description');
    //     $orders->category_id = $request->input('category_id');
    //     $orders->status = $request->input('status');

    //     $request->validate([
    //         'user_id' => 'required',
    //         'tracking_number' =>  'mac-'.Str::random(10),
    //         'order_date',
    //         'total_amount',
    //         'quantity',
    //         'payment_method',
    //         'payment_status',
    //         'status',
    //     ]);



    //     $orders->save();


    //     return redirect('/order')->with('status', 'Order Successfully!');
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($orderId)
    {
        $order = Order::where('user_id',auth()->user()->id)->where('id',$orderId)->first();
        if($order){

            return view('user.user-order.index', compact('order'));

        }else{

            return redirect()->back()->with('message','No Order Found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
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
    public function destroy($id)
    {
        $orders = Order::find($id);
        $orders->delete();
        return redirect('/order')->with('status', 'Product Deleted Successfully!');
    }
}
