@extends('layouts.app')

@section("title","index")
@section("content")
<div class="container mt-5">
    <div class="text-center">
      
        <a href="{{route("products.create")}}" class="btn btn-success">Create Post</a>
    </div>
    <table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Category</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach ($products as $product)
         <tr>
      <th scope="row">{{$product['id']}}</th>
      <td>{{$product->product_name}}</td>
      <td>{{$product->product_price}}</td>
      <td>{{$product->category ? $product->category->category_name : "not found"}}</td>
      <td>
      <a href="{{route('products.show', $product['id'])}}"  class="btn btn-info">Info</a>
      <a href="{{route('products.edit',$product['id'])}}"  class="btn btn-primary">Edit</a>
      <form id="delete-form" class="d-inline" method="POST" action="{{route('products.destroy',$product['id'])}}">
        @csrf
        @method("delete")
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
      </td>
    </tr>
    @endforeach
   
   
    
  </tbody>
</table>
</div>



@endsection


   