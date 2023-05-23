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

    <a href="{{route('addProduct')}}">Add Products</a>
    <table>
        
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{$product->product_id}}</td>
            <td>{{$product->product_name}}</td>
            @if($product->category_id==1)
            <td>Fruits</td>
            @elseif($product->category_id==2)
            <td>Vegitables</td>

            @endif
            <td>
                <a href="{{route('deleteProduct',['id'=>$product->product_id])}}">Delete</a>
                <a href="#">Edit</a>
            </td>
        </tr>
        @endforeach
    </div>
        
       
    </table>
</x-app-layout>
