<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza | Cart</title>
    @include('include.head')
</head>
<body>
    <div class="container">
    @include('include.nav')
    <h2 class="p-2">Cart</h2>
    <div class="row">
    @if(count($item)==0)
    <h2 class="text-center text-secondary mx-auto p-3"><u>Your Cart is empty!</u></h2>
    @else
    @foreach($item as $m)
    <div class="col-4"> 
        <div class="card m-3" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('/menu/'.$m->image)}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$m->item}}</h5>
            <h6>Quantity: {{$m->q}}</h6>
            <a href="/delete/{{$m->cart_id}}" class="btn btn-info">Remove</a>
            <p class="float-right">Rs.{{$m->price}}</p>
        </div>
        </div>
    </div>
    @endforeach
    </div>
    <div><a href="{{url('checkout')}}"><button class="btn btn-success form-control m-3">Checkout</button></a></div>
    @endif
    </div>
    @include('include.foot')
    </div>
</body>
</html>