<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Fee;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

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
        $users = User::where('user_type', 'user')->get();
        $carts = Cart::get();
        return view('admin.user.userList', compact('users', 'carts'));
    }

    public function index()
    {
        $orderItems = OrderItems::get();
        // $carts = Cart::orderBy('created_at', 'desc')->where('user_id', auth()->user()->id)->get();
        // return view('user.user-cart.index', compact('carts'));
        return view('user.cart.index', compact('orderItems'));
    }

    public function userOrder(){
        $orderItems = OrderItems::get();
        return view('user.user-order.index', compact('orderItems'));
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
        $fees = Fee::where('status', 'active')->get();
        if(Auth::user()->user_type == 'user'){
            return view('user.user-profile.index', compact('users','fees'));
        }else{
            return view('layouts.profiling.index', compact('users', 'fees'));
        }

    }

    public function edit($id)
    {
        $users = User::find($id);
        $fees = Fee::where('status', 'active')->get();
        if(Auth::user()->user_type == 'user'){
            return view('user.user-profile.edit', compact('users', 'fees'));
        }else{
            return view('layouts.profiling.edit', compact('users','fees'));
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
        $users->barangay_id = $request->input('barangay_id');
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

    // public function passwordCreate()
    // {
    //     if(Auth::user()->user_type == 'user'){
    //     return view('user.user-profile.change-password');
    //     }else{
    //         return view('layouts.profiling.change-password');
    //     }
    // }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required','string'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect('/profile')->with('status','Password Updated Successfully');

        }else{

            return redirect('/profile')->with('error','Current Password does not match with Old Password');
        }
    }

    public function show($id){

        // $orders= Order::where('user_id', auth()->user()->id)->first();
        $orders = Order::where('tracking_number', '!=' , null)->get();
        // $orderItems = OrderItems::get();
        return view('user.user-order.viewOrder', compact('orders'));
    }
}
