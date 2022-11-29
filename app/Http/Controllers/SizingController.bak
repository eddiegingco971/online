<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sizing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SizingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizings = Sizing::get();
        return view('admin.sizing.index', compact('sizings'));
    }

    public function store(Request $request) {

        $sizings = new Sizing;
        $sizings->sizing_name = $request->input('sizing_name');
        $sizings->price = $request->input('price');
        $sizings->category_id = $request->input('category_id');

        $request->validate([
            'sizing_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id'=> 'required',


        ]);
        $sizings->save();

        return redirect('/sizing')->with('status', 'Sizing Added Successfully');
    }

    public function edit($id)
    {
        $sizings = Sizing::find($id);
        return view('admin.sizing.edit', compact('sizings'));
    }

    public function update(Request $request, $id){

        $sizings = Sizing::find($id);
        $sizings->sizing_name = $request->input('sizing_name');
        $sizings->price = $request->input('price');


        $sizings->update();

        return redirect('/sizing')->with('status', 'Sizing Updated Successfully!');
    }

    public function destroy($id)
    {
        $sizings = Sizing::find($id);
        $sizings->delete();
        return redirect('/sizing')->with('status', 'Sizing Deleted Successfully!');
    }

}
