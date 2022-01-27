<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Delivery | Login</title>
    @include('include.head')
</head>
<body>
  <div class="container">
    @include('include.nav')
    <form action="postlogin" method="post">
        @csrf()
        <h1 class="my-3">Login</h1>
        @if(Session::has('errMsg'))
        <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
        @endif
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="pass">Password:</label>
            <input class="form-control" type="password" id="pass" name="pass" required>
        </div>
        <input type="submit" class="form-control btn btn-success my-3 btn-lg">
    </form>
    @include('include.foot')
  </div>
</body>
</html>