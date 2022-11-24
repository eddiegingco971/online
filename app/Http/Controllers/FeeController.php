<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index()
    {
        $fees = Fee::get();
        return view('admin.fee.index', compact('fees'));
    }

    public function store(Request $request) {

        $fees = new Fee;
        $fees->barangay_name = $request->input('barangay_name');
        $fees->price = $request->input('price');
        $fees->status = $request->input('status');

        $request->validate([
            'barangay_name' => 'required|string|max:255',
            'price' => 'nullable',
            'status'=> 'required',


        ]);
        $fees->save();

        return redirect('/fee')->with('status', 'Fee Added Successfully');
    }

    public function edit($id)
    {
        $fees = Fee::find($id);
        return view('admin.fee.edit', compact('fees'));
    }

    public function update(Request $request, $id){

        $fees = Fee::find($id);
        $fees->barangay_name = $request->input('barangay_name');
        $fees->price = $request->input('price');
        $fees->status = $request->input('status');


        $fees->update();

        return redirect('/fee')->with('status', 'Fee Updated Successfully!');
    }

    public function destroy($id)
    {
        $fees = Fee::find($id);
        $fees->delete();
        return redirect('/fee')->with('status', 'Fee Deleted Successfully!');
    }
}
