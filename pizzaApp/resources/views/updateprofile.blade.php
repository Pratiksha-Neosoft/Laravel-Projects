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
    <h3 class="p-2">Update Profile</h3>
    <form method="post" action="postupdate">
        @csrf()
        <div class="form-group">
            <label>Name:</label>
            <input class="form-control" value="{{session('sid')->name}}" name="name" type="text">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input class="form-control" value="{{session('sid')->email}}" name="email" type="email">
        </div>
        <div class="form-group">
            <label>Mobile:</label>
            <input class="form-control" value="{{session('sid')->mobile}}" name="mobile" type="number">
        </div>
        <div class="form-group">
            <label>Address:</label>
            <textarea class="form-control" rows="3" name="add">{{session('sid')->address}}</textarea>
        </div>
        <input type="submit" class="btn btn-success m-4">
    </form>
    @include('include.foot')
    </div>
</body>
</html>