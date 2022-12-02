<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $orders = Order::get();
        $orders = Order::where('payment_status','unpaid')->get();
        $orderItems = OrderItems::get();
        $categories = Category::where('created_at', '!=', null)->get();
        return view('staff.index', compact('categories','orders', 'orderItems'));
    }

    public function orderDelivered()
    {
        $orders = Order::where('status', 'delivered')->where('payment_status', 'paid')->get();
        $orderItems = OrderItems::get();
        $categories = Category::where('created_at', '!=', null)->get();
        return view('staff.delivered', compact('orders', 'categories', 'orderItems'));
    }
    public function show($id){
        $orders = Order::where('tracking_number', '!=', null)->get();
        return view('staff.viewOrder', compact('orders'));
    }
}
