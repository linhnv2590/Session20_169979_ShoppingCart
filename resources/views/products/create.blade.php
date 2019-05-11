@extends("master")
@section("title", "Create New Product")
@section("content")
    <h1 id="create-product-h1">Create New Product</h1>
    <div class="col-6">
        @if(Session::has('messageCreateProduct'))
            <p class="alert-success">{{Session::get('messageCreateProduct')}}</p>
        @endif
        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Old Price</label>
                <input type="text" name="old_price" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="alert-danger">{{$error}}</p>
            @endforeach
        @endif
    </div>
@endsection