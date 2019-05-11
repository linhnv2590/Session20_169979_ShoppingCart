@extends("master")
@section("title", "Products Detail")
@section("content")
    <h1 id="product-h1">Products Detail</h1>

    @if(Session::has('messageUpdateProduct'))
        <p class="alert-success col-6">{{Session::get('messageUpdateProduct')}}</p>
    @endif

    <div class="col-8">
        <div class="form-group">
            Code: {{$product->id}}
        </div>
        <div class="form-group">
            Name: {{$product->name}}
        </div>
        <div class="form-group">
            <img src="{{asset('/storage/'.$product->image)}}" alt="" id="product-img">
        </div>
        <div class="form-group">
            Price: {{$product->price}}
        </div>
        <div class="form-group">
            Old Price: {{$product->old_price}}
        </div>
        <div class="form-group">
            Description: {{$product->description}}
        </div>

        <div>
            <a href="{{route('products.edit', ['id' => $product->id])}}">
                <button class="btn btn-warning">Edit</button>
            </a>
            <a href="{{route('products.delete', ['id' => $product->id])}}">
                <button class="btn btn-danger">Delete</button>
            </a>
        </div>
    </div>
@endsection