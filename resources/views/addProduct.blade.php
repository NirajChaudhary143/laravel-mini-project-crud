@extends('layouts.base')

@section('main-content')

<div class="card card-default edit-card-gap">
          <div class="card-header">
            <h3 class="card-title">Add Product</h3>
            
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- Edit Form Start -->
          <form action="{{route('storeProduct')}}" method="POST">
                 @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputProduct">Product Name</label>
                    <input type="text" class="form-control" id="exampleInputProduct" name="product_name">
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div> -->
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->

                  <div class="form-group">
                  <label>Category</label>
                  <select name="category" class="form-control select2bs4" style="width: 100%;">
                    <option value="1">Fruits</option>
                    <option value="2">Vegitable</option>
                    
                  </select>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>

              <!-- /.Edit Form End -->
         
        </div>

@endsection