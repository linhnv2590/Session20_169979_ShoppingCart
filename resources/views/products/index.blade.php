@extends("master")
@section("title", "Products List")
@section("content")
    <h1 id="product-h1">Products List</h1>

    @if(Session::has('messageDeleteProduct'))
        <p class="alert-danger col-6">{{Session::get('messageDeleteProduct')}}</p>
    @endif

    <div class="row">
        <div class="col-2">
            <a href="{{route('products.create')}}">
                <button class="btn btn-success">New Product</button>
            </a>
        </div>
        <div class="col-10">
            <form action="{{route('products.search')}}" method="get">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="keyword" class="form-control" placeholder="Enter Keyword ..."
                               value="{{(isset($_GET['keyword']) ? $_GET['keyword']: '')}}">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-outline-secondary">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (Session::has('message'))
        <p class="alert-warning offset-2 col-6">{{Session::get('message')}}</p>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Old Price</th>
            <th>Action</th>
        </tr>
        @foreach($products as $index => $product)
            <tr>
                <td>{{++$index}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->old_price}}</td>
                <td>
                    <a href="{{route('products.show', ['id' => $product->id])}}">
                        <button class="btn btn-info">Show</button>
                    </a>
                    <a href="{{route('products.edit', ['id' => $product->id])}}">
                        <button class="btn btn-warning">Edit</button>
                    </a>
                    <a href="{{route('products.delete', ['id' => $product->id])}}">
                        <button class="btn btn-danger">Delete</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection