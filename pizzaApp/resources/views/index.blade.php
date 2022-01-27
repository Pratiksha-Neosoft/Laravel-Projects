<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Delivery</title>
    @include('include.head')
</head>
<body>
  <div class="container">
    @include('include.nav')
  <div class="jumbotron my-3 " style="margin:-15px;">
    <h1 class="display-4">Pizza Delivery</h1>
    <p class="lead">Welcome to pizza delivery service. This is the place when you may chose the most delicious pizza you like from wide variety of options!</p>
    <hr class="my-4">
    <p>We're performing delivery free of charge in case if your order is higher than 20$</p>
    <p class="lead">
        <a href="{{url('pizza/register')}}"><button class="btn btn-primary w-100 p-2 "><h5>Sign In and Order</h5></button></a>
    </p>
  </div>
  </div>
  @include('include.foot')
</body>
</html>