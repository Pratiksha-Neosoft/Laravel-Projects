<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza | Checkout</title>
    @include('include.head')
</head>
<body>
    <div class="container">
    @include('include.nav')
    <h2 class="p-2">Checkout</h2>
    <form action="postcheckout" method="post">
        @csrf()
    <div class="form-group">
        <label>Credit Card:</label>
        <input type="number" class="form-control" name="cardno">
        @error('cardno')
            <div class="alert alert-danger w-50">{{ $message }}</div>
        @enderror
    </div>
    <input type="hidden" class="form-control" name="total" value="{{$total}}">
    Order Total: Rs.{{$total}} <br><br>
    <input type="submit" value="checkout" class="form-control btn btn-success">
    </form>
    @include('include.foot')
    </div>
</body>
</html>