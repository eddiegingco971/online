<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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


    public function setting(){
        // $users = User::get();
        $users = User::first();
        if(Auth::user()->user_type == 'user'){
            return view('user.user-profile.index', compact('users'));
        }else{
            return view('layouts.profiling.index', compact('users'));
        }

    }

    public function edit($id)
    {
        $users = User::find($id);

        if(Auth::user()->user_type == 'user'){
            return view('user.user-profile.edit', compact('users'));
        }else{
            return view('layouts.profiling.edit', compact('users'));
        }

    }

    public function update(Request $request, $id){
        $users = User::find($id);
        // $users->email = $request->input('email');
        $users->firstname = $request->input('firstname');
        $users->lastname = $request->input('lastname');
        $users->age = $request->input('age');
        $users->gender = $request->input('gender');
        $users->address = $request->input('address');
        $users->barangay = $request->input('barangay');
        $users->phone_number = $request->input('phone_number');

        if($request->hasFile('avatar')){

          $destination = 'dist/img/user-profile/'.$users->avatar;
          if(File::exists($destination)){
              File::delete($destination);
          }
          $file = $request->file('avatar');
          $extention = $file->getClientOriginalExtension();
          $filename = time().'.'. $extention;
          $file->move('dist/img/user-profile/', $filename);
          $users->avatar = $filename;

        }
        $users->update();
        // dd($users);

        return redirect('/profile')->with('status', 'Profile Updated Successfully!');
    }
}
