<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = new Category;
        $categories->category_name = $request->input('category_name');
        $categories->status = $request->input('status');

        $request->validate([
            'category_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp,jfif|max:2048',
            'status' => 'required|string',
        ]);

        if($request->hasFile('image')){

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('dist/img/category/', $filename);
            $categories->image = $filename;

          }


        $categories->save();

        return redirect('/category')->with('status', 'Category Added Successfully');   ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $categories = Category::find($id);
        $categories->category_name = $request->input('category_name');
        $categories->status = $request->input('status');

        if($request->hasFile('image')){

            $destination = 'dist/img/category/'.$categories->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('dist/img/category/', $filename);
            $categories->image = $filename;

          }

        $categories->update();

        return redirect('/category')->with('status', 'Product Updated Successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        $categories = Category::find($id);
        $destination = 'dist/img/category/'.$categories->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $categories->delete();

        return redirect('/category')->with('status', 'Product Deleted Successfully!');
    }

}
