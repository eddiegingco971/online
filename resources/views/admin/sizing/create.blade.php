<section class="content">
    <div class="container-fluid">
          <div class="card elevation-3">
            <div class="card-header text-center">
              <h2>Sizing Entry</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{url('sizing-create')}}" method="POST">
                  @csrf

                  @php
                  $categories=DB::table('categories')->where('status','active')->get();
                  @endphp

                  <div class="form-group">
                    <label for="category_id" class="col-form-label">Category</label>
                    <select class="form-select form-control" name="category_id">
                      <option value="">--Select any category--</option>
                        @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-danger">{{$message}}</div>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="sizing_name" id="sizing_name"> Sizing Name</label>
                      <input type="sizing_name" name="sizing_name" class="form-control" placeholder="Category Name">
                      @error('sizing_name')
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
