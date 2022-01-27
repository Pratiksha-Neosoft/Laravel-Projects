<nav class="navbar navbar-expand-lg navbar-light bg-light row">
  <div class="col-4 ">
  <img src="{{asset('/'.'pizza.jpeg')}}" width=150 height=100 class="navbar-brand">
  </div>
  @if(Session::has('sid'))
  <div class="col-2">
  </div>
  <div class="collapse navbar-collapse col-6 " id="navbarSupportedContent">
  <a href="{{url('pizza/menu')}}" class="text-secondary p-3">Menu</a>
  <a href="{{url('pizza/cart')}}" class="text-secondary p-3">Cart 
    @if(Session::has('cartcnt'))
    <span class="badge badge-dark">{{session('cartcnt')}}</span>
    @else
    <span class="badge badge-dark">0</span>
    @endif
  </a>
  <a href="{{url('pizza/order')}}" class="text-secondary p-3">Orders</a>
    <a href="{{url('pizza/profile')}}" class="text-secondary  p-3">Profile</a>
    <a href="{{url('logout')}}"><button class="btn btn-outline-danger ">Logout</button></a>
  </div>

  @else
  <div class="col-5 ">
  </div>
  <div class="collapse navbar-collapse col-3 " id="navbarSupportedContent">
    <a href="{{url('pizza/register')}}"><button class="btn btn-outline-primary m-2">Sign Up</button></a>
    <a href="{{url('pizza/login')}}"><button class="btn btn-outline-success ">Login</button></a>
  </div>
  @endif
</nav>