<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $products = Product::get('category_id');
        $categories = Category::where('created_at', '!=', null)->get();
        return view('admin.product.create',  compact('categories', 'products'));
        // $products = Product::get('category_id', 'id');
        // $productSizings = Product::get('sizing_id' , 'id');
        // $sizings = Sizing::get();
        // $categories = Category::where('created_at', '!=', null)->get();
        // return view('admin.product.create',  compact('categories', 'sizings', 'products'));
        // $request->validate([
        //     'category_id' => 'required',
        // ]);
        // $category = Category::find($request->category_id);

        // $sizings = Sizing::find($category);

        // $request->validate([
        //     'product_photo' => 'required|string',
        //     'product_name' => 'required|string',
        //     'quantity' => 'required|numeric',
        //     'category_id'=>'required|',
        //     'price' => 'required|string',
        // ]);
        // $category = Category::find($request->category_id);
        // dd($category);
        // Product::create([
        //     'product_photo'=> $request->product_photo,
        //     'product_name'=> $request->product_name,

        //     'quantity'=> $request->quantity,
        //     'price'=> $request->price,
        // ]);

        // return redirect('/product')->with('status', 'Added Product Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = new Product;
        $products->product_name = $request->input('product_name');
        $products->price = $request->input('price');
        $products->description = $request->input('description');
        $products->category_id = $request->input('category_id');
        $products->status = $request->input('status');

        $request->validate([
            'product_photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg,jfif,webp|max:2048',
            'product_name' => 'required|string|max:255',
            'price' => 'required',
            'description'=>'required|string|max:255',
            'category_id'=> 'required',
            'status'=> 'required'
        ]);

        if($request->hasFile('product_photo')){
          $file = $request->file('product_photo');
          $extention = $file->getClientOriginalExtension();
          $filename = time().'.'. $extention;
          $file->move('dist/img/product/', $filename);
          $products->product_photo = $filename;
        }

        $products->save();


        return redirect('/product')->with('status', 'Product Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        $categories = Category::where('created_at', '!=', null)->get();
        return view('admin.product.edit', compact('products','categories'));
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, $id){
        $products = Product::find($id);
        $products->product_name = $request->input('product_name');
        $products->price = $request->input('price');
        $products->description = $request->input('description');
        $products->category_id = $request->input('category_id');
        $products->status = $request->input('status');

        if($request->hasFile('product_photo')){

          $destination = 'dist/img/product/'.$products->product_photo;
          if(File::exists($destination)){
              File::delete($destination);
          }
          $file = $request->file('product_photo');
          $extention = $file->getClientOriginalExtension();
          $filename = time().'.'. $extention;
          $file->move('dist/img/product/', $filename);
          $products->product_photo = $filename;

        }

        $products->update();
        return redirect('/product')->with('status', 'Product Updated Successfully!');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $destination = 'dist/img/product/'.$products->product_photo;
         if(File::exists($destination)){
             File::delete($destination);
         }
        $products->delete();
        return redirect('/product')->with('status', 'Product Deleted Successfully!');
    }
}
