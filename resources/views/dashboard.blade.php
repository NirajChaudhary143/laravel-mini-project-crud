@extends('layouts.base')

  
@section('main-content')

<div class="container">
               <h2>Products</h2>
            <table class="table table-bordered" id="table">
               <thead>
                  <tr>
                    <th>S.N</th>
                     <th>Product Id</th>
                     <th>Product Name</th>
                     <th>Category</th>
                     <th>Action</th>
                  </tr>
               </thead>
            </table>
         </div>
       <script>
         $(function() {
               $('#table').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('product.get') }}",
               columns: [
                                    { 
                            data: 'DT_RowIndex', 
                            name: 'DT_RowIndex', 
                            orderable: false, 
                            searchable: false,
                            render: function (data, type, full, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        { data: 'product_id', name: 'product_id' },
                        { data: 'product_name', name: 'product_name' },
                        { 
                                data: 'category_id', 
                                name: 'category_id',
                                render: function(data, type, row) {
                                    return data == 1 ? 'Fruits' : 'Vegetables';
                                }
                            },
                         {
                                data: null,
                                name: 'action',
                                orderable: false,
                                searchable: false,
                                render: function(data, type, row) {
                                    var editBtn = '<a href="edit/' + row.product_id + '" class="btn btn-success btn-sm">Edit</a>';
                                    var deleteBtn = '<a href="delete/' + row.product_id + '" class="btn btn-danger btn-sm">Delete</a>';
                                    return editBtn + ' ' + deleteBtn;
                                }
                            },
                        // { data: 'action', name: 'action', orderable: true, searchable: true }

                     ]
            });
         });
         </script>
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

