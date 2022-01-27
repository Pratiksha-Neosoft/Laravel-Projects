    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu</title>
        @include('include.head')
    </head>
    <body>
        <div class="container">
        @include('include.nav')
    <h2 class="p-2">Menu</h2>
    <div class="row">
    @foreach($menudata as $m)
    <div class="col-4"> 
        <div class="card m-3" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('/menu/'.$m->image)}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$m->item}}</h5>
            <form method="post" action="/add_to_cart">
                @csrf()
                <input name="product_id" value="{{$m->id}}" type="hidden">
            <button class="btn btn-info">Add to Card</button>
            </form>
            <p class="float-right">Rs.{{$m->price}}</p>
        </div>
        </div>
    </div>    
    @endforeach
    </div>
    @include('include.foot')
    </div>
</body>
</html>