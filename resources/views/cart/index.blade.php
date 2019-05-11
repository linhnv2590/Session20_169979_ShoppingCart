@extends("master")
@section("title", "Cart List")
@section("content")
    <div class="row">
        @if(!$cart || $cart->totalQuality == 0)
            {{Session::flush()}}

            <div class="col-12" style="text-align: center">
                <div>
                    <img src="{{asset('/storage/images/background/mascot.png')}}" alt="">
                </div>
                <div><h3>Nothing in your Cart!</h3></div>
                <div style="padding-top: 20px">
                    <a href="{{route('home')}}">
                        <button class="btn btn-warning">Continue Shopping!</button>
                    </a>
                </div>
            </div>
        @else
            <h1>Cart List ({{$cart->totalQuality}} Product)</h1>

            <div class="col-12">
                @if(Session::has('removeItemFromCart'))
                    <p class="alert-success">
                        {{Session::get('removeItemFromCart')}}
                    </p>
                @endif
            </div>

            <div class="col-9">
                @foreach($cart->itemsList as $product)
                    <div class="row">
                        <div class="col-3">
                            <img src="{{asset('/storage/'.$product['item']->image)}}" alt="" class="img-thumbnail"
                                 style="width: 150px">
                        </div>
                        <div class="col-3">
                            <div style="padding-bottom: 10px">{{$product['item']->name}}</div>
                            <div>
                                <a href="{{route('cart.removeItemFromCart', ['id'=>$product['item']->id])}}">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
                            </div>
                        </div>
                        <div class="col-3">
                            <div><strong>{{number_format($product['item']->price)}} VND</strong></div>
                            <div>
                                <small>
                                    <del>{{number_format($product['item']->old_price)}}</del>
                                </small>
                            </div>
                        </div>
                        <div class="col-1">
                            <div>Quality: {{$product['quality']}}</div>
                        </div>
                    </div>
                @endforeach

                <div style="padding-top: 30px">
                    <a href="{{route('cart.clearCart')}}">
                        <button class="btn btn-danger btn-lg" id="cart-clear-btn">Clear Cart</button>
                    </a>
                </div>
            </div>

            <div class="col-3">
                <h1>Order Bill</h1>
                <div>
                    <p>Total Price: <span
                                style="color: red; font-size:x-large"><strong>{{$cart->totalPrice}}</strong></span>
                    </p>
                </div>
                <div>
                    <a href="">
                        <button class="btn btn-primary btn-lg" id="cart-order-btn">Process Order</button>
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection
