<html lang="en">
<head>
    <title>Laravel DataTables Tutorial Example</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
        <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>
      <body>
         <div class="container">
               <h2>Laravel DataTables Tutorial Example</h2>
            <table class="table table-bordered" id="table">
               <thead>
                  <tr>
                    <th>S.N</th>
                     <th>Product Id</th>
                     <th>Product</th>
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
               ajax: "{{ route('get.product') }}",
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
                                    var editBtn = '<a href="admin-panel-edit-product/' + row.product_id + '" class="btn btn-success btn-sm">Edit</a>';
                                    var deleteBtn = '<a href="admin-panel-delete-product/' + row.product_id + '" class="btn btn-danger btn-sm">Delete</a>';
                                    return editBtn + ' ' + deleteBtn;
                                }
                            },
                        // { data: 'action', name: 'action', orderable: true, searchable: true }

                     ]
            });
         });
         </script>
   </body>
</html>