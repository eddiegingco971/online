<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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

        $orders = DB::table('orders')->count();
        $products = DB::table('products')->count();
        $users = DB::table('users')->count();
        $carts = DB::table('carts')->count();
        return view('admin.master' ,compact('orders','products','users','carts'));

    }

    // public function calendar()
    // {
    //     return view('admin.event.calendar');
    // }

    public function cartList()
    {
        $carts = Cart::get();
        return view('admin.cart.cartList', compact('carts'));
    }

    public function show($id){

        $orders = Order::where('tracking_number', '!=', null)->get();

        return view('admin.order.viewOrder', compact('orders'));
    }


}
