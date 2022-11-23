<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        // $products = DB::table('products')->get();
        $sliders = Slider::where('status', 'active')->get();
        $orders = DB::table('orders')->where('quantity')->get();
        $categories = Category::where('status','active')->get();
        // $carts = DB::table('carts')->where('status', 'new')->count();
        // $carts = User::where('user_id', 'id')->get()->count();
        // $carts = DB::table('carts')->where('user_id', 'id')->get();
        // $carts = DB::table('carts')->where('user_id', 'id')->get()->count();

        return view('base', compact('sliders', 'orders', 'users', 'categories'));
    }

    // public function allProduct(){
    //     $products = Product::orderBy('created_at', 'desc')->get();
    //     return view('allproduct', compact('products'));
    // }

    public function productSearch(Request $request){

        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->exists();
        $products=Product::orwhere('product_name','like','%'.$request->search.'%')
                    ->orderBy('id','DESC')
                    ->simplePaginate('9');
        return view('search-product')->with('products',$products)->with('recent_products', $recent_products);
    }

    public function collectionCategory()
    {
        $categories = Category::where('status','active')->get();
        return view('collections.category.index',compact('categories'));
    }

    // public function collectionCategory()
    // {
    //     $categories = Category::where('status','active')->get();
    //     return view('collections.category.collectionCategory',compact('categories'));
    // }

    public function specificProduct($cat_name)
    {
        $categories = Category::where('category_name', $cat_name)->first();

        if($categories){
            $products = $categories->products()->get();
            return view('collections.product.index', compact('products','categories'));
        }else{
            return redirect()->back();
        }
    }
    public function viewProduct($id){
        // dd($id);
        return view('collections.product.view', compact('id'));
        // $categories = Category::where('category_name', $cat_name)->first();

        // if($categories){
        //     $products = $categories->products()->where('product_name', $pro_name)->where('status', 'active')->first();
        //     if($products){
        //         return view('collections.product.view', compact('products','categories'));
        //     }else{
        //         return redirect()->back();
        //     }
        //     // $products = $categories->products()->get();
        //     // return view('collections.product.index', compact('products','categories'));
        // }else{
        //     return redirect()->back();
        // }

    }

    public function about()
    {
       return view('about');
    }
}
