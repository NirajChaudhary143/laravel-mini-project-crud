<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div align="center">

    <h1>Product Table</h1>
    @if(Session::has('success'))
{{Session::get('success')}}
@endif
@if(Session::has('fail'))
{{Session::get('fail')}}
@endif
<br>

    <a href="{{route('addProduct')}}"><h3><strong>Add Product</strong></h3></a>
    <table style="border-collapse: collapse; width:30%; border:1px solid;text-align:center" >
        
        <tr style="border:1px solid">
            <th style="border:1px solid">ID</th>
            <th style="border:1px solid">Product Name</th>
            <th style="border:1px solid">Category</th>
            <th style="border:1px solid">Action</th>
        </tr>
        @foreach($products as $product)
        <tr style="border:1px solid">
            <td style="border:1px solid">{{$product->product_id}}</td>
            <td style="border:1px solid">{{$product->product_name}}</td>
            @if($product->category_id==1)
            <td style="border:1px solid">Fruits</td>
            @elseif($product->category_id==2)
            <td style="border:1px solid">Vegitables</td>

            @endif
            <td style="border:1px solid">
                <a style="border-right:1px solid;padding-right:5px" href="{{route('deleteProduct',['id'=>$product->product_id])}}">Delete</a>
                <a href="{{route('editView',['id'=>$product->product_id])}}">Edit</a>
            </td>
        </tr>
        @endforeach
    </div>
        
       
    </table>
</x-app-layout>
