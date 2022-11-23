<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
    public function list()
    {
        $users = User::get();
        $carts = Cart::get();
        return view('admin.user.userList', compact('users', 'carts'));
    }

    public function index()
    {
        // $carts = DB::table('carts')->where('user_id', auth()->user()->id)->get();
        // $carts = Cart::orderBy('created_at', 'desc')->where('user_id', auth()->user()->id)->get();
        // return view('user.user-cart.index', compact('carts'));
        return view('user.cart.index');
    }

    public function userOrder(){
        $orders = Order::get();
        return view('user.user-order.index', compact('orders'));
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/user')->with('status', 'User Deleted Successfully!');
    }
}
