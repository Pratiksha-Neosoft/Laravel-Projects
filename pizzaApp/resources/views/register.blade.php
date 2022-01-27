<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Delivery | Registration</title>
    @include('include.head')
</head>
<body>
  <div class="container">
    @include('include.nav')
    <form action="postregister" method="post" enctype="multipart/form-data">
        @csrf()
        <h1 class="my-3">Registration</h1>
        @if(Session::has('errMsg'))
        <div class="text-danger">{{Session::get('errMsg')}}</div>
        @endif
        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" type="text" id="name" name="name">
            @error('name')
            <div class="text-danger w-50">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="email" id="email" name="email">
            @error('email')
            <div class="text-danger w-50">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="pass">Password:</label>
            <input class="form-control" type="password" id="pass" name="pass">
            @error('pass')
            <div class="text-danger w-50">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="mobile">Mobile:</label>
            <input class="form-control" type="number" id="mobile" name="mobile">
            @error('mobile')
            <div class="text-danger w-50">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="add">Address:</label>
            <textarea class="form-control"  id="add" name="add" rows="3"></textarea>
            @error('add')
            <div class="text-danger w-50">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="form-control btn btn-success my-3 btn-lg">
    </form>
    @include('include.foot')
  </div>
</body>
</html>