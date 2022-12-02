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
                  <th>Total Amount</th>
                  <th>Payment Method</th>
                  <th>Payment Status</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  @foreach ($orders as $order)
                    <tr>
                      {{-- <td>{{$order->id}}</td>
                      <td>{{$order->user_id}}</td> --}}
                      <td>{{$order->tracking_number}}</td>
                      {{-- <td>{{$order->order_date}}</td> --}}
                      {{-- <td>{{$order->quantity}}</td> --}}
                      <td>{{$order->total_amount}}</td>
                      <td>{{$order->payment_method}}</td>
                      <td>{{$order->payment_status}}</td>
                      <td>{{$order->status}}</td>
                      <td>
                        <a href="{{url('delete-order/'.$order->id)}}" class="btn btn-success btn-sm">View</a>
                      </td>
                    </tr>
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
