<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sliders = DB::table('sliders')->count();
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.sliders.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sliders = new Slider;
        $sliders->title = $request->input('title');
        $sliders->description = $request->input('description');
        $sliders->link = $request->input('link');
        $sliders->button_name = $request->input('button_name');
        $sliders->status = $request->input('status');

        $request->validate([
            'title'=> 'required|string|max:50',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp,jfif|max:2048',
            'description'=> 'required|string',
            'link'=> 'required|string',
            'button_name'=> 'required|string',
            'status'=> 'required',
        ]);
        if($request->hasFile('image')){

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('dist/img/slider/', $filename);
            $sliders->image = $filename;

          }

        $sliders->save();


        return redirect('/slider')->with('status', 'Banner Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliders = Slider::find($id);
        return view('admin.sliders.edit', compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $sliders = Slider::find($id);
        $sliders->title = $request->input('title');
        $sliders->description = $request->input('description');
        $sliders->link = $request->input('link');
        $sliders->button_name = $request->input('button_name');
        $sliders->status = $request->input('status');

        if($request->hasFile('image')){

          $destination = 'dist/img/slider/'.$sliders->image;
          if(File::exists($destination)){
              File::delete($destination);
          }
          $file = $request->file('image');
          $extention = $file->getClientOriginalExtension();
          $filename = time().'.'. $extention;
          $file->move('dist/img/slider/', $filename);
          $sliders->image = $filename;

        }

        $sliders->update();
        return redirect('/slider')->with('status', 'Banner Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sliders = Slider::find($id);
        $destination = 'dist/img/slider/'.$sliders->image;
         if(File::exists($destination)){
             File::delete($destination);
         }
        $sliders->delete();
        return redirect('/slider')->with('status', 'Banner Deleted Successfully!');
    }
}
