<!DOCTYPE html>
<html>
<head>
    <title>
        Choose Your Closet
    </title>
      <link rel="icon" href="{{asset('images/Closet.png')}}">
<!--      <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
<!--     Site CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="css/nav_styling.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS
  <!-<link rel="stylesheet" href="css/responsive.css"> -->
    <!-- Custom CSS -->
   <!--  <link rel="stylesheet" href="css/custom.css"> -->
</head>
<body>

  @if($check==0)
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/" style="color: #24C6DC; font-weight: bold;"> <img src="{{asset('images/Closet.png')}}" alt="logo" width="100" id="logo">Virtual Clothing Store</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active navclass">
        <a class="nav-link navlink active" href="/" style="color: #24C6DC;">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link navlink" href="#" style="color: #24C6DC;">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link navlink" href="/customize" style="color: #24C6DC;">Customizer</a>
      </li>
      <li class="nav-item">
        <div class="dropdown">
        <a class="nav-link navlink" href="#" style="color: #24C6DC;">Products</a>
         <div class="dropdown-content">
        <a href="#" class="link">Purchase</a>
        <a href="#" class="link">Rent</a>
        </div>
        </div>
      </li>
      <li class="nav-item">
        <div class="dropdown">
        <a class="nav-link navlink" href="#" style="color: #24C6DC;">Sign Up</a>
         <div class="dropdown-content">
        <a href="/CustomerSignUp" class="link">Customer</a>
        <a href="/SellerSignUp" class="link">Seller</a>
        </div>
        </div>
      </li>
       <li class="nav-item">
        <div class="dropdown">
        <a class="nav-link navlink" href="#" style="color: #24C6DC;">Login</a>
         <div class="dropdown-content">
        <a href="/CustomerLogin" class="link">Customer</a>
        <a href="/SellerLogin" class="link">Seller</a>
        </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link navlink" href="/ContactUs" style="color: #24C6DC;">Contact Us</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <div class="input-group mb-4">
            <input type="search" placeholder="Search..." aria-describedby="button-addon6" class="form-control border-info">
            <div class="input-group-append">
              <button id="button-addon6" type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
            </div>
          </div>
    </form>
</nav>

@elseif($check==1)
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/" style="color: #24C6DC; font-weight: bold;"> <img src="{{asset('images/Closet.png')}}" alt="logo" width="100" id="logo">Virtual Clothing Store</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active navclass">
        <a class="nav-link navlink active" href="/" style="color: #24C6DC;">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link navlink" href="#" style="color: #24C6DC;">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link navlink" href="/customize" style="color: #24C6DC;">Customizer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link navlink" href="#" style="color: #24C6DC;">Products</a>
      </li>
      <li class="nav-item">
        <div class="dropdown">
        <a class="nav-link navlink" href="/CustomerCart" style="color: #24C6DC;"><i class="fas fa-shopping-cart"></i><span class="badge badge-light">
          <?php if(session()->has('cart'))
        {
           echo session()->get('cart')->totalQty;
        }
         ?></span>Cart</a>
        </div>
      </li>
       <li class="nav-item">
        <div class="dropdown">
        <a class="nav-link navlink" href="/UserLogout" style="color: #24C6DC;">Logout</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link navlink" href="/ContactUs" style="color: #24C6DC;">Contact Us</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <div class="input-group mb-4">
            <input type="search" placeholder="Search..." aria-describedby="button-addon6" class="form-control border-info">
            <div class="input-group-append">
              <button id="button-addon6" type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
            </div>
          </div>
    </form>
</nav>
@endif

    <div class="container">
  <div class="row justify-content-between">
    @foreach($data as $data)
     <div class="col-lg-4 col-offset-12 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                             <img class="card-img-top" src="{{asset('uploads/sell/'. $data->product_image)}}" alt="Card image cap" style="height:400px;width: 350px;">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li></ul>
                                <a class="cart" href="{{route('CartData',['product_id'=>$data->id])}}">Add to Cart</a>
 </div>
                        </div>
                        <div class="why-text">
                            <h4>{{$data->product_name}}</h4>
                            <h5>Rs: {{$data->price_per_unit}}</h5>
                            <a href="product/{{$data->id}}" class="btn btn-block" style="background-color:#007bff;color: #ffffff;">See More</a>
                        </div>
                    </div>
    </div>
    @endforeach
  </div>
</div>

<!-- <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2020 Copyright Text</p>
        </div>
    </footer> -->

</body>
</html> 