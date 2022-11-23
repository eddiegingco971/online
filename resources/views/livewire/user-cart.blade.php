<div>

  <div class="py-3 py-md-3 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="shopping-cart">
                    <div class="cart-header d-none d-sm-none d-mb-block d-lg-block bg-info">
                        <div class="row ">
                            <div class="col-md-3">
                                <h4>Products</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Price</h4>
                            </div>
                            <div class="col-md-3">
                                <h4>Quantity</h4>
                            </div>
                            <div class="col-md-2  d-none d-sm-none d-mb-block d-lg-block">
                                <h4>Total</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Remove</h4>
                            </div>
                        </div>
                    </div>


                    @forelse($carts as $cart)
                    <div class="cart-item py-1">
                        <div class="row">
                            <div class="col-md-3 my-auto">

                                <a href="">
                                    <label class="product-name">
                                        <img src="{{asset('dist/img/product/'.$cart->products->product_photo)}}" style="width: 100px; height: 100px" alt="">
                                        {{$cart->products->product_name}}
                                    </label>
                                </a>
                            </div>
                            <div class="col-md-2 my-auto">
                                <label class="price text-dark">₱{{$cart->products->price}}</label>
                            </div>
                            <div class="col-md-3 col-8 my-auto">
                                <div class="quantity">
                                    <div class="input-group">
                                        <span class="btn btn1 btn-warning" wire:loading.attr='disabled' wire:click="decrementQuantity({{$cart->id}})"><i class="fa fa-minus"> </i></span>
                                        <input type="text" name="quantity"  value="{{$cart->quantity}}" class="input-quantity" readonly/>
                                        <span class="btn btn1 btn-warning" wire:loading.attr='disabled' wire:click="incrementQuantity({{$cart->id}})"><i class="fa fa-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 my-auto  d-none d-sm-none d-mb-block d-lg-block">
                                <label class="price text-dark">₱{{$cart->products->price*$cart->quantity}}</label>
                                @php
                                    $total_amount += $cart->products->price*$cart->quantity
                                @endphp
                            </div>
                            <div class="col-md-2 my-auto">
                                <div class="remove">
                                    <a href="{{url('delete-cart/'.$cart->id)}}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Remove
                                    </a>
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
            </div>
            <div class="col-md-4 mt-2">
                <div class="card text-dark">
                <div class="card-header text-center bg-info"><h3>CHECKOUT</h3></div>

                <div class="card-body">

                    <div class="col-sm-12">
                        <label class="price text-dark">Total Amount: ₱ {{$total_amount}}</label>
                    </div>
                    <div class="col-sm-12">
                        <a class="col-12 price text-light btn btn1 btn-warning" href="/checkout">Checkout</a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
</div>
