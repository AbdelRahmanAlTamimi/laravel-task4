@extends("layouts.app")

@section("title") create @endsection

@section("content")


 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-5">
<form method="POST" action="{{route('products.store')}}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Product Name</label>
        <input name="name" type="text" class="form-control" value="{{old('name')}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Product Price</label>
        <input name="price" type="number" class="form-control" value="{{old('price')}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Product Descreption</label>
        <input name="description" type="text" class="form-control" value="{{old('description')}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Product Category</label>
        <select name="pro_cat" class="form-control">
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
            
        </select>
    </div>

    <button class="btn btn-success">submit</button>
</form>
</div>
@endsection