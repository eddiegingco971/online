<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
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
        $orders = Order::get();
        $categories = Category::where('created_at', '!=', null)->get();
        return view('staff.index', compact('categories','orders'));
    }

    public function orderDelivered()
    {
        $orders = Order::get();
        $categories = Category::where('created_at', '!=', null)->get();
        return view('staff.delivered', compact('orders', 'categories'));
    }
}
