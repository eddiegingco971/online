<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    {{-- <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Item Total Amount :
                            <span class="float-end">₱ {{$this->totalProductAmount}}</span>
                        </h4>
                        <hr>
                        <small>* Items will be delivered in 10 - 15 minutes.</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Basic Information
                        </h4>
                        <hr>

                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Full Name</label>
                                    <input type="text" wire:model="fullname" class="form-control" placeholder="Enter Full Name" />
                                    @error('fullname')
                                        <small class="text-danger"> {{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Phone Number</label>
                                    <input type="number" wire:model="phone_number" class="form-control" placeholder="Enter Phone Number" />
                                    @error('phone_number')
                                        <small class="text-danger"> {{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email Address</label>
                                    <input type="email" wire:model="email" class="form-control" placeholder="Enter Email Address" />
                                    <input type="email"  class="form-control" value="{{auth()->user()->email}}" />
                                    @error('emails')
                                        <small class="text-danger"> {{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Full Address</label>
                                    <textarea wire:model="address" class="form-control" rows="2"></textarea>
                                    @error('address')
                                        <small class="text-danger"> {{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Select Payment Mode: </label>
                                    <div class="d-md-flex align-items-start">
                                        <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <button class="nav-link fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Cash on Delivery</button>
                                            <button class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Online Payment</button>
                                        </div>
                                        <div class="tab-content col-md-9" id="v-pills-tabContent">
                                            <div class="tab-pane fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                <h6>Cash on Delivery Mode</h6>
                                                <hr/>
                                                <button type="button" wire:click="cod" class="btn btn-primary">Place Order (Cash on Delivery)</button>

                                            </div>
                                            <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                                <h6>Online Payment Mode</h6>
                                                <hr/>
                                                <button type="button" class="btn btn-warning">Pay Now (Online Payment)</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div> --}}
    @if ($this->totalProductAmount != '0')
    <div class="content">
        <!-- Content Header (Page header) -->
        <section class="content-header card">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Checkout</h1>
              </div>
              <div class="col-sm-6">
                {{-- <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Invoice</li>
                </ol> --}}
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                {{-- <div class="callout callout-info">
                  <h5><i class="fas fa-info"></i> Note:</h5>
                  This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                </div> --}}


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                  <!-- title row -->
                  <div class="row">
                    <div class="col-12">
                      <h4>
                        <i class="fas fa-globe"></i> Mac Kaon FoodHub.
                        <small class="float-right">Date: {{auth()->user()->created_at}}</small>
                        <small class="float-right"></small>
                      </h4>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- info row -->
                  <div class="row invoice-info">
                    {{-- <div class="col-sm-4 invoice-col">
                      From
                      <address>
                        <strong>Admin, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (804) 123-5432<br>
                        Email: info@almasaeedstudio.com
                      </address>
                    </div> --}}
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      To
                      <address>
                        <strong>{{auth()->user()->firstname}} {{auth()->user()->lastname}}</strong><br>
                        {{-- {{auth()->user()->address}}<br> --}}
                        {{-- {{auth()->user()->fees->barangay_name}}<br>
                        Phone: {{auth()->user()->phone_number}}<br> --}}
                        Email: {{auth()->user()->email}}
                      </address>
                      <div class="row">
                        {{-- <div class="col-md-6 mb-3">
                            <label>Firstname</label>
                            <input type="text" wire:model.defer="firstname" id="firstname" class="form-control" placeholder="Enter Full Name" readonly/>
                            @error('firstname') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Lastname</label>
                            <input type="text" wire:model.defer="lastname" id="lastname" class="form-control" placeholder="Enter Full Name" readonly/>
                            @error('lastname') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email Address</label>
                            <input type="email" wire:model.defer="email" id="email" class="form-control" placeholder="Enter Email Address" readonly/>
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div> --}}
                        <div class="col-md-6 mb-3">
                            <label>Phone Number</label>
                            <input type="number" wire:model.defer="phone_number" id="phone_number" class="form-control" placeholder="09xxxxxxxxx" />
                            @error('phone_number') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- @php
                            $fees = DB::table('fees')->where('status','active')->get();
                        @endphp --}}
                        <div class="col-md-6 mb-3">
                            <label>Address</label>
                            <textarea wire:model.defer="address" id="address" class="form-control" rows="2"></textarea>
                            {{-- <select wire:model.defer="address" id="address" class="form-control form-select">
                                @foreach ($fees as $fee)
                                    <option value="{{$fee->id}}">{{$fee->barangay_name}}</option>
                                @endforeach
                            </select> --}}
                            @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      {{-- <b>Invoice #007612</b><br>
                      <br>
                      <b>Order ID:</b> 4F3S8J<br>
                      <b>Payment Due:</b> 2/22/2014<br>
                      <b>Account:</b> 968-34567 --}}
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <!-- Table row -->
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th>Qty</th>
                          <th>Product</th>
                          {{-- <th>Serial #</th> --}}
                          <th>Description</th>
                          <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($carts as $cart)
                            <tr>
                                <td>{{$cart->quantity}}</td>
                                <td>
                                    <img src="{{asset('dist/img/product/'.$cart->products->product_photo)}}" width="50px" height="50px" alt="Image" style="border-radius: 10%">
                                    {{$cart->products->product_name}}</td>
                                {{-- <td>455-981-221</td> --}}
                                <td>{{$cart->products->description}}</td>
                                <td>{{$cart->products->price}}</td>
                              </tr>
                            @empty
                            <tr>
                                <td>No product</td>

                              </tr>

                            @endforelse

                        </tbody>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">
                      <p class="lead">Payment Methods:</p>
                      <img src="../../dist/img/credit/cod.png" height="40px" width="70px" alt="Gcash" style="border-radius: 5px; border: 1px solid black;">
                      <img src="../../dist/img/credit/gcash.png" height="40px" width="70px" alt="Gcash" style="border-radius: 5px; border: 1px solid black;">

                      <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                       Prepare the exact amount of payment.
                      </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                      {{-- <p class="lead">To be pay</p> --}}

                      <div class="table-responsive">
                        <table class="table">
                          <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>₱ {{$this->totalProductAmount}}</td>
                          </tr>
                          <tr>
                            <th>Delivery Fee:</th>
                            <td>₱ {{auth()->user()->fees->price}}</td>
                          </tr>
                          <tr>
                            <th>Total Amount:</th>
                            <td>₱ {{$this->totalFee}}</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <!-- this row will not appear when printing -->
                  <div class="row no-print">
                    <div class="col-12">
                        {{-- <button type="button" wire:loading.attr="disabled" wire:click="codOrder" class="btn btn-primary">
                            <span wire:loading.remove wire:target="codOrder">
                                Place Order (Cash on Delivery)
                            </span>
                        </button> --}}

                      <button type="button" class="btn btn-success float-right" wire:loading.attr="enabled" wire:click="codOrder"><i class="far fa-credit-card"></i>
                        <span wire:loading.remove wire:target="codOrder">
                            (Cash on Delivery)
                        </span>
                      </button>

                      <button type="button" class="btn btn-success float-right" wire:loading.attr="disabled" wire:click="qrcode"><i class="far fa-credit-card"></i>
                        <span wire:loading.remove wire:target="qrcode">
                          (Scan QR Code Delivery)
                        </span>
                      </button>

                      {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;"wire:loading.attr="disabled" wire:target="scan_gcash">
                        <i class="fas fa-money-bill"></i> QR Scan
                      </button> --}}
                    </div>
                  </div>
                </div>
                <!-- /.invoice -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    @else

    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 card text-center">
                    <h1><img src="{{asset('/dist')}}/img/Logo.png" alt="" width="100px" height="100px" class="rounded-circle"></h1>
                    <h4>There is no product on added into your cart!</h4>
                    <h1>
                        <a href="{{url('/collections')}}">
                            <button class="btn btn-sm btn-warning float-center">
                               <i class="fa fa-cart-plus px-1 mt-1" aria-hidden="true"></i> Order Now
                            </button>
                        </a>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    @endif



</div>
