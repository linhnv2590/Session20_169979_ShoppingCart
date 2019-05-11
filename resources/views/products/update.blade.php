@extends("master")
@section("title", "Update Product")
@section("content")
    <h1 id="create-product-h1">Update Product</h1>
    <div class="col-6">
        @if(Session::has('message'))
            <p class="alert-success">{{Session::get('message')}}</p>
        @endif
        <form action="{{route('products.update', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>ID</label>
                <input type="text" name="id" class="form-control" value="{{$product->id}}" readonly>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{$product->name}}" required>
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="image" class="form-control-file" value="{{$product->image}}">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" value="{{$product->price}}" required>
            </div>
            <div class="form-group">
                <label>Old Price</label>
                <input type="text" name="old_price" class="form-control" value="{{$product->old_price}}" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4">{{$product->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="alert-danger">{{$error}}</p>
            @endforeach
        @endif
    </div>
@endsection