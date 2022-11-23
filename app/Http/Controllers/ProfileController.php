<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function profileSetting(){
        $users = User::get();
        $profiles = DB::table('profiles')->where('user_id', auth()->user()->id)->get();
        if(Auth::user()->user_type == 'user'){
            return view('user.user-profile.index', compact('users', 'profiles'));
        }else{
            return view('layouts.profiling.index', compact('users', 'profiles'));
        }

    }

    public function store(Request $request)
    {
        $profiles = new Profile;
        $profiles->email = $request->input('email');
        $profiles->firstname = $request->input('firstname');
        $profiles->lastname = $request->input('lastname');
        $profiles->middlename = $request->input('middlename');
        $profiles->age = $request->input('age');
        $profiles->gender = $request->input('gender');
        $profiles->address = $request->input('address');
        $profiles->barangay = $request->input('barangay');
        $profiles->phone_number = $request->input('phone_number');
        $profiles->user_id = $request->input('user_id');

        $request->validate([
            'user_pic' => 'required|image|mimes:jpg,png,jpeg,gif,svg,jfif,webp|max:2048',
            'email' => 'required|email',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'age' => 'required|numeric|min:18|max:100',
            'gender' => 'required|string',
            'address' => 'required|string',
            'barangay' => 'required|string',
            'phone_number' => 'required|numeric|digits:11',
            'user_id'=> 'required',
        ]);

        if($request->hasFile('user_pic')){
          $file = $request->file('user_pic');
          $extention = $file->getClientOriginalExtension();
          $filename = time().'.'. $extention;
          $file->move('dist/img/user-profile/', $filename);
          $profiles->user_pic = $filename;
        }

        $profiles->save();


        return redirect('/profile')->with('status', 'Profile Added Successfully!');

    }


    public function edit($id)
    {
        $profiles = Profile::find($id);
        $users = User::where('created_at', '!=', null)->get();
        return view('layouts.profiling.edit', compact('profiles','users'));
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, $id){
        $profiles = Profile::find($id);
        $profiles->email = $request->input('email');
        $profiles->firstname = $request->input('firstname');
        $profiles->lastname = $request->input('lastname');
        $profiles->middlename = $request->input('middlename');
        $profiles->age = $request->input('age');
        $profiles->gender = $request->input('gender');
        $profiles->address = $request->input('address');
        $profiles->barangay = $request->input('barangay');
        $profiles->phone_number = $request->input('phone_number');
        $profiles->user_id = $request->input('user_id');

        if($request->hasFile('user_pic')){

          $destination = 'dist/img/user-profile/'.$profiles->user_pic;
          if(File::exists($destination)){
              File::delete($destination);
          }
          $file = $request->file('user_pic');
          $extention = $file->getClientOriginalExtension();
          $filename = time().'.'. $extention;
          $file->move('dist/img/product/', $filename);
          $profiles->user_pic = $filename;

        }

        $profiles->update();
        return redirect('/profile')->with('status', 'Profile Updated Successfully!');
    }
}
