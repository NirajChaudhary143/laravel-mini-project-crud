@extends('layouts.base')

  
@section('main-content')

<div class="row table-gap">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Product Name</th>
                      <th>Category</th>
                      <th>Action</th>
                      <!-- <th>Reason</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                    <tr>
                      <td>{{$product->product_id}}</td>
                      <td>{{$product->product_name}}</td>
                      <td>{{$product->category_id == 1 ? 'Fruit' :'Vegitable'}}</td>
                      <td>
                      <a style="border-right:1px solid;padding-right:5px" href="{{route('deleteProduct',['id'=>$product->product_id])}}">Delete</a>
                      <a href="{{route('editView',['id'=>$product->product_id])}}">Edit</a>
                      </td>
                      <!-- <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td> -->
                    </tr>
          @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
<!-- 
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> -->

  @endsection

