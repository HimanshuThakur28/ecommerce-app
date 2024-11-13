<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="">E-Commerce</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active" id="products-link">
        <a class="nav-link" href="{{route('home')}}">Products</a>
      </li>
      <li class="nav-item" id="cart-link">
        <a class="nav-link" href="{{route('cart')}}">Cart
    @if(session()->has('cart') && count(session()->get('cart')) > 0)
    <span class="badge badge-warning badge-pill">{{count(session()->get('cart'))}}</span>
@endif        
</a>
      </li>
      <li class="nav-item" id="logout-link">
        <a class="nav-link" href="{{route('logout')}}">logout</a>
      </li>
    </ul>
  
  </div>
</nav>

<script>
document.addEventListener("DOMContentLoaded",function(){
const isAuth=sessionStorage.getItem('api_token') || localStorage.getItem('api_token');

if(!isAuth){
document.getElementById('products-link').style.display ='none';
document.getElementById('cart-link').style.display ="none";
document.getElementById('logout-link').style.display ="none";

}

});


</script>