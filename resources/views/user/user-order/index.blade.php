@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 mt-3">
          <h1>Order Management</h1>
        </div>
        {{-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div> --}}
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card elevation-3">
            <div class="card-header">
              <h3 class="card-title">List of Order</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  {{-- <th>Order ID#</th>
                  <th>User ID#</th> --}}
                  <th>Tracking Number</th>
                  {{-- <th>Order Date</th> --}}
                  {{-- <th>Quantity</th> --}}
                  <th>Total Payment</th>
                  <th>Payment Method</th>
                  <th>Payment Status</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  @foreach ($orderItems as $order)
                  <a href="{{url('view-order/'.$order->id)}}">
                    <tr>
                      {{-- <td>{{$order->id}}</td>
                      <td>{{$order->user_id}}</td> --}}
                      <td>{{$order->orders->tracking_number}}</td>
                      <td>{{$order->orders->total_amount}}</td>
                      <td>{{$order->orders->payment_method}}</td>
                      <td>{{$order->orders->payment_status}}</td>
                      <td>{{$order->orders->status}}</td>
                      {{-- <td>{{$order->order_date}}</td> --}}
                      {{-- <td>{{$order->quantity}}</td> --}}
                      {{-- <td>{{$order->->product_name}}</td> --}}
                      {{-- <td>{{$order->}}</td> --}}
                      {{-- <td>{{$order->payment_method}}</td>
                      <td>{{$order->payment_status}}</td>
                      <td>{{$order->status}}</td> --}}
                      <td>
                        <a href="{{url('view-order/'.$order->id)}}" class="btn btn-success btn-sm">View</a>
                      </td>
                    </tr>
                </a>
                  @endforeach

                </tbody>
                {{-- <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot> --}}
              </table>
              <a href="{{url('/collections')}}">
                <button class="btn btn-sm btn-warning d-flex justify-content-end float-right mt-2">
                   <i class="fa fa-cart-plus px-1 mt-1" aria-hidden="true"></i> Buy More!
                </button>
              </a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection
