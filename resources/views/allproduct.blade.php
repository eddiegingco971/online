@extends('layouts.app')

@section('content')

<div class="py-3 py-md-5 bg-dark">
    <div class="container">
         <form action="{{url('cart-create')}}" method="POST" enctype="multipart/form-data" style="justify-content: space-between;">
                        @csrf
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">All Products</h4>
            </div>

                    @forelse ($products as $product)
                    @csrf
                    <div class="col-6 col-md-3">
                        <div class="product-card card">
                            <div class="product-card-img">
                                @if ($product->status == 'active')
                                    <label class="stock bg-success">Available</label>
                                @else
                                    <label class="stock bg-danger">Not Available</label>
                                @endif

                                @if (Route::has('login'))
                                    @auth
                                <input type="hidden" name="user_id" id="email" value="{{auth()->user()->id}}">
                                    @endauth
                                @endif
                                <input type="hidden" name="product_id" id="product_id" class="form-control" value="{{$product->id}}">

                                <a href="{{url('/collections/'.$product->categories->category_name.'/'.$product->product_name)}}">
                                    <img src="{{asset('dist/img/product/'.$product->product_photo)}}" alt="Laptop">
                                </a>

                            </div>
                            <div class="product-card-body">
                                <h5 class="product-name">
                                <a href="{{url('/collections/'.$product->categories->category_name.'/'.$product->product_name)}}">
                                    {{$product->product_name}}
                                </a>
                                </h5>
                                <div>
                                    <span class="selling-price">₱{{$product->price}}</span>
                                    {{-- <span class="original-price">₱799</span> --}}
                                </div>
                                <input type="hidden" name="price" class="form-control" value="{{$product->price}}">

                                <div class="col-md-12 my-auto">
                                    <div class="quantity">
                                        <div class="input-group">
                                            {{-- <i class="fa fa-minus"> --}}
                                                {{-- <i class="fa fa-plus"> --}}
                                            <span class="btn btn1 btn-warning decrement-btn"><i class="fa fa-minus"> </i></span>
                                            <input type="text" name="quantity" class="input-quantity qty-input" value="1"/>
                                            <span class="btn btn1 btn-warning increment-btn"><i class="fa fa-plus"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" class="form-control" name="total_amount" id="total_amount" class="form-control">
                                <input type="hidden" name="status" id="status" class="form-control" value="new">
                                <div class="mt-2">

                                    @if ($product->status == 'active')
                                        <button type="submit" class="btn btn1 btn-success">Add Cart</button>
                                    @else
                                        <div class="btn btn1  btn-danger">Not Available</div>
                                    @endif
                                    {{-- <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                    <a href="" class="btn btn1"> View </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-md-12">
                            <div class="p-2">
                                <h4>No products available</h4>
                            </div>
                        </div>
                    @endforelse



        </div>
        {{-- <div class="col-md-12 offset-md-5">
            <div class=" btn btn-primary">{{$products->links()}}</div>
        </div> --}}
    </div>
</form>
</div>

@endsection
