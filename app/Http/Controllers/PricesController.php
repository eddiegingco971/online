<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    public function index()
    {
        $prices = Price::get();
        return view('admin.price.index', compact('prices'));
    }

    public function store(Request $request) {

        $prices = new Price;
        $prices->sizes = $request->input('sizes');
        $prices->price = $request->input('price');

        $request->validate([
            'sizes' => 'required|string|max:255',
            'price' => 'required|numeric',

        ]);
        $prices->save();

        return redirect('/prices')->with('status', 'Prices Added Successfully');
    }

    public function edit($id)
    {
        $prices = Price::find($id);
        return view('admin.price.edit', compact('prices'));
    }

    public function update(Request $request, $id){

        $prices = Price::find($id);
        $prices->sizes = $request->input('sizes');
        $prices->price = $request->input('price');


        $prices->update();

        return redirect('/prices')->with('status', 'Prices Updated Successfully!');
    }

    public function destroy($id)
    {
        $prices = Price::find($id);
        $prices->delete();
        return redirect('/prices')->with('status', 'Prices Deleted Successfully!');
    }

}
