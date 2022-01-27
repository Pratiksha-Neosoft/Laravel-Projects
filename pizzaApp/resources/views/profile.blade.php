<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    @include('include.head')
</head>
<body>
    <div class="container">
    @include('include.nav')
    <h2 class="p-2">My Profile</h2>
    <div>Name: {{$data->name}}</div>
    <div>Email: {{$data->email}}</div>
    <div>Mobile: {{$data->mobile}}</div>
    <div>Address: {{$data->address}}</div>
    <a href="{{url('pizza/profile/update')}}">
        <button class="btn btn-info my-3 ">Update Profile</button>
    </a>
    @include('include.foot')
    </div>
</body>
</html>