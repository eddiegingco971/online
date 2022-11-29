<section class="content">
    <div class="container-fluid">
          <div class="card elevation-3">
            <div class="card-header text-center">
              <h2>Price Entry</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{url('prices-create')}}" method="POST">
                  @csrf

                  <div class="form-group">
                      <label for="sizes" id="sizes"> Size</label>
                      <input type="sizes" name="sizes" class="form-control" placeholder="Category Name">
                      @error('sizes')
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
