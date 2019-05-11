<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/master.css')}}">
</head>
<body>
<!-- Navigation -->
<nav id="nav-top">
    <a href="{{route('home')}}" id="home-link">
        <img src="{{asset('/storage/images/background/CodeGym-Logo.png')}}" alt="" id="home-icon">
    </a>
</nav>
<!-- Content -->
<div class="row">
    <div class="container-fluid col-2" id="nav-left">
        <a href="{{route('products.index')}}" id="product-link">
            <button class="btn btn-light btn-lg btn-block" id="product-btn">
                <img src="{{asset('/storage/images/background/product.png')}}" alt="" id="product-icon">
                Products List
            </button>
        </a>
        <a href="{{route('cart.index')}}" id="cart-link">
            <button class="btn btn-light btn-lg btn-block" id="cart-btn">
                <img src="{{asset('/storage/images/background/cart.png')}}" alt="" id="cart-icon">
                Cart List
                @if(Session::get('cart'))
                    ({{Session::get('cart')->totalQuantity}})
                @endif
            </button>
        </a>
    </div>
    <div class="container-fluid col-10" id="home">
        @yield("content")
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</html>
