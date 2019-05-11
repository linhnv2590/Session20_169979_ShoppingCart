@extends("master")
@section("title", "Shopping Cart")
@section("nav-left")
    <a href="{{route('products.index')}}" id="product-link">
        <button class="btn btn-light btn-lg btn-block" id="product-btn">
            <img src="{{asset('/storage/images/background/product.png')}}" alt="" id="product-icon">
            Products List
        </button>
    </a>
@endsection
@section("content")
    <div class="row"></div>
    <div class="row">
        @foreach($products as $product)
            <div class="col-3" id="product">
                <div>{{$product->name}}</div>
                <div><img src="{{asset('/storage/'.$product->image)}}" alt="" id="product-img-home" class="img-thumbnail"></div>
                <div><b>{{number_format($product->price)}} VND</b>
                    <small><del>{{number_format($product->old_price)}}</del></small>
                </div>
                <div>
                    <a href="{{route('cart.addToCart', ['id' => $product->id])}}">
                        <button class="btn btn-secondary">Add to Card</button>
                    </a>
                    <a href="{{route('products.show', ['id' => $product->id])}}">
                        <button class="btn btn-info">Details</button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection