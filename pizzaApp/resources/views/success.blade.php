<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza | Success</title>
    @include('include.head')
</head>
<body>
    <div class="container">
    @include('include.nav')
    <h2 class="p-2">Order has been placed successfully!!</h2>
    <div class="alert alert-success">You will receive notification by email with order details.</div>
    <a href="{{url('pizza/menu')}}" class="btn btn-primary">Go and order some more</a>
    @include('include.foot')
    </div>
</body>
</html>