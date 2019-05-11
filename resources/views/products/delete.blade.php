@extends("master")
@section("title", "Delete Product")
@section("content")
    <div class="col-md-8 offset-2">
        @if(Session::has('messageDeleteProduct'))
            <p class="alert-danger">{{Session::get('messageDeleteProduct')}}</p>
        @endif
        <form action="{{route('products.destroy', ['id' => $product->id])}}" method="post">
            @csrf
            <div class="form-group">
                <h3>Do you want to delete {{$product->name}} Product?</h3>
                <div>
                    <img src="{{asset('/storage/'.$product->image)}}" alt="" style="width: 300px">
                </div>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
@endsection()