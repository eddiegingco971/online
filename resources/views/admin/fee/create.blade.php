<section class="content">
    <div class="container-fluid">
          <div class="card elevation-3">
            <div class="card-header text-center">
              <h2>Fee Entry</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{url('fee-create')}}" method="POST">
                  @csrf
                  <div class="form-group">
                      <label for="barangay_name" id="barangay_name">Barangay Name</label>
                      <input type="barangay_name" name="barangay_name" class="form-control" placeholder="Barangay Name">
                      @error('barangay_name')
                        <div class="text-danger">{{$message}}</div>
                      @enderror
                  </div>
                  <div class="form-group mb-3">
                    <label for="price" class="col-form-label">Price</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="0.00">
                    @error('price')
                      <div class="text-danger">{{$message}}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="status" id="status">Status</label>
                    <select  type="status" name="status" class="form-select form-control" id="status" >
                      <option value="active">Active</option>
                      <option value="inactive">Inactive</option>
                     </select>

                    @error('status')
                      <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>



                    <div class="form-group float-right mr-5">
                      <button type="submit" class="btn btn-info" style="position: relative; left:78%;">Add</button>
                  </div>

                </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    </div>
</section>
