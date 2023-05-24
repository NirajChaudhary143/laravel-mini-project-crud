<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
<form action="{{route('update',['id'=>$product->product_id])}}" method="POST">
    @csrf
    <input type="text" placeholder="Enter Product Name" name="product_name" value="{{$product->product_name}}"><br>
    <label for="">Category</label>
    <select name="category" id="">
        
    <option value="1" {{ $product->category_id == 1 ? 'selected' : '' }}>
    Fruits
</option>
<option value="2" {{ $product->category_id == 2 ? 'selected' : '' }}>
    Vegetables
</option>

    </select>
    <br>
    <input type="submit" value="Update">
</form>

</body>
</html>