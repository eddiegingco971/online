<div>
    {{-- The Master doesn't talk, he acts. --}}
    <form action="{{url('cart-create')}}" method="POST" enctype="multipart/form-data" style="justify-content: space-between;">
        @csrf
    <div class="py-3 py-md-5 bg-dark">
        <div class="container card">
            <div class="row">
                <div class="col-md-7 mt-3 mb-3">
                    <div class="bg-dark border">
                        <img src="{{asset('dist/img/product/'.$this->product_photo)}}" class="w-100" alt="Img">
                    </div>
                </div>
                <div class="col-md-5 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{$product_name}}
                            {{-- <label class="label-stock bg-success">Available</label> --}}
                            @if ($status == 'active')
                                <label class="label-stock bg-success">Available</label>
                            @else
                                <label class="label-stock bg-danger">Not Available</label>
                            @endif
                            @if (Route::has('login'))
                                @auth
                                    <input type="hidden" name="user_id" id="email" value="{{auth()->user()->id}}">
                                @endauth
                            @endif
                            <input type="hidden" name="product_id" id="product_id" class="form-control" value="{{$productId}}">
                        </h4>
                        <hr>
                        {{-- <p class="product-path">
                            Home / {{$this->product->category_id}} / {{$this->product->product_name}}
                        </p> --}}
                        <div>
                            <span class="selling-price">₱{{$this->price}}</span>
                            <input type="hidden" name="price" class="form-control" value="{{$this->price}}">
                            {{-- <span class="original-price">$499</span> --}}
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1 btn-warning decrement-btn"><i class="fa fa-minus"> </i></span>
                                <input type="text" name="quantity" class="input-quantity qty-input" value="1" readonly/>
                                <span class="btn btn1 btn-warning increment-btn"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>

                            <input type="hidden" class="form-control" name="total_amount" id="total_amount" class="form-control">
                            <input type="hidden" name="status" id="status" class="form-control" value="new">

                        <div class="mt-2 mb-2">
                            @if ($this->status == 'active')
                                <button type="submit" class="btn btn1 btn-success"> <i class="fa fa-shopping-cart"></i> Add To Cart</button>
                            @else
                                <div class="btn bg-danger"> <i class="fa fa-shopping-cart"></i> Unavailable</div>
                            @endif

                            {{-- <button type="submit" class="btn btn1 btn-success"> <i class="fa fa-shopping-cart"></i> Add To Cart</button> --}}
                            {{-- <a href="" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </a> --}}
                        </div>
                        <div class="col-md-12 mt-2 text-dark card bg-secondary">
                            <h5 class="card-header">Description</h5>
                            <p>
                                {{$this->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    </form>
</div>
