<section class="content">
    <div class="container-fluid">
          <div class="card elevation-3">
            <div class="card-header text-center">
              <h2>Category Entry</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{url('category-create')}}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group">
                      <label for="category_name" id="category_name"> Category Name</label>
                      <input type="category_name" name="category_name" class="form-control" placeholder="Category Name">
                      @error('category_name')
                        <div class="text-danger">{{$message}}</div>
                      @enderror
                  </div>
                  <div class="form-group mb-3">
                    <label for="image" class="col-form-label">Category Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
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
