<section class="content">
    <div class="container-fluid">
          <div class="card elevation-3">
            <div class="card-header text-center">
              <h2>Slider Entry</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{url('slider-create')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                      <label for="title" id="title">Title</label>
                      <input type="title" name="title" class="form-control" placeholder="Slider Title">
                      @error('title')
                      <div class="text-danger">{{$message}}</div>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="description" id="description">Description</label>
                    <textarea type="description" name="description"  row="5" col="5" class="form-control"></textarea>
                    @error('description')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="link" id="link">Link</label>
                    <input type="link" name="link" class="form-control" placeholder="Link">
                    @error('link')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="button_name" id="button_name">Button Name</label>
                    <input type="button_name" name="button_name" class="form-control" placeholder="Follow or Click here! or Buy now!">
                    @error('button_name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status" class="col-form-label">Status</label>
                    <select class="form-select form-control" name="status">
                      <option hidden="true" value="">--Select Status--</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{$message}}</div>
                      @enderror
                  </div>

                  <div class="form-group mb-3">
                    <label for="image" class="col-form-label">Slider Image</label>
                    <input type="file" name="image" class="form-control" id="image">

                    @error('image')
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
