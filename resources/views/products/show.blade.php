@extends("layouts.app")
@section("title") show @endsection
@section("content") 
<div class="card mt-4">
  <h5 class="card-header">Product info</h5>
  <div class="card-body">
    <h5 class="card-title">name: {{$product->product_name}}</h5>
    <p class="card-text">Description: {{$product->product_description}}</p>
    <p class="card-text">Price: {{$product->product_price}}</p>
  </div>
</div>

<div class="card mt-4">
  <h5 class="card-header">Categroy Of Product Info</h5>
  <div class="card-body">
    <h5 class="card-title">Name: {{$product->category ? $product->category->category_name : "not found"}} </h5>
    <p class="card-text">Description: {{$product->category ? $product->category->category_description : "not found"}}</p>
  </div>
</div>

@endsection

    

