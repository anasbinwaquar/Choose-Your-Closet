<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact Us - Choose Your Closet</title>
    <link rel="icon" href="{{asset('images/Closet.png')}}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js">
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="css/nav_styling.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
        @if($check_nav==0)
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/" style="color: #24C6DC; font-weight: bold;"> <img src="{{asset('images/Closet.png')}}" alt="logo" width="100" id="logo">Virtual Clothing Store</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item navclass">
        <a class="nav-link navlink" href="/" style="color: #24C6DC;">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link navlink" href="AboutUs" style="color: #24C6DC;">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link navlink" href="/customize" style="color: #24C6DC;">Customizer</a>
      </li>
      <li class="nav-item">
        <div class="dropdown">
        <a class="nav-link navlink" href="#" style="color: #24C6DC;">Products</a>
         <div class="dropdown-content">
        <a href="/" class="link">Purchase</a>
        <a href="/RentProducts" class="link">Rent</a>
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
        <a class="nav-link navlink active" href="/ContactUs" style="color: #24C6DC;">Contact Us</a>
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
    </div>
</nav>

@elseif($check_nav==1)
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/" style="color: #24C6DC; font-weight: bold;"> <img src="{{asset('images/Closet.png')}}" alt="logo" width="100" id="logo">Virtual Clothing Store</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item navclass">
        <a class="nav-link navlink" href="/" style="color: #24C6DC;">Home<span class="sr-only">(current)</span></a>
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
        <a href="RentProducts" class="link">Rent</a>
        </div>
        </div>
      </li>
      <li class="nav-item">
        <div class="dropdown">
        <a class="nav-link navlink" href="#" style="color: #24C6DC;">User Profile</a>
         <div class="dropdown-content">
        <a href="/CheckOrders" class="link">Check Orders</a>
        <a href="/CompletedOrdersCustomer" class="link">Completed Orders</a>
        </div>
        </div>
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
        <a class="nav-link navlink active" href="/ContactUs" style="color: #24C6DC;">Contact Us</a>
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
    </div>
</nav>
@endif
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 style="color: #24C6DC; font-size: 30px;">Contact Us</h2>
                    <p style="font-size: 20px;">You've got Questions, We've got Answers! All you have to do is connect with us via filling in the form below. Have a nice day!</p>
                </div>
                <form action="Contacted" method="post" autocomplete="off">
                    @csrf
                    @if($check==0)
                    <div class="form-group"><label>Name</label><input class="form-control" name="name" type="text" required></div>
                    <div class="form-group"><label>Subject</label><input class="form-control" name="subject" type="text" required></div>
                    <div class="form-group"><label>Email</label><input class="form-control" name="email" type="email" required></div>
                    <div class="form-group"><label>Message</label><textarea class="form-control" name="message" required></textarea></div>
                    <div class="form-group"><button class="btn btn-light btn-block" type="submit" style="background-color: #24C6DC; color: #FFFFFF">Send</button></div>
                    @elseif($check==1)
                    <div class="form-group"><button class="btn btn-light btn-block" type="submit" style="background-color: #24C6DC; color: #FFFFFF" disabled>Contacted Successfully</button></div>
                    <!-- <a href="ContactUs"><div class="form-group"><button class="btn btn-light btn-block" style="background-color: #24C6DC; color: #FFFFFF">Contact Again</button></div></a> -->
                    @endif
                </form>
            </div>
        </section>
    </main>
        <footer class="page-footer dark">
      <img src="{{asset('images/Closet.png')}}" alt="Logo" style="float: right; margin-right: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Customer Portal</h5>
                    <ul>
                        <li><a href="/CustomerSignUp">Sign Up</a></li>
                        <li><a href="/CustomerLogin">Login</a></li>
                        <li><a href="/">Home</a></li>
                        <li><a href="/">Purchase Product</a></li>
                        <li><a href="/RentProducts">Rent Product</a></li>
                        <li><a href="/customize">Custom Orders</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Seller Portal</h5>
                    <ul>
                        <li><a href="/SellerSignUp">Sign Up</a></li>
                        <li><a href="/SellerLogin">Login</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About</h5>
                    <ul>
                        <li><a href="AboutUs">About Us</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="/ContactUs">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2020 Copyright Choose Your Closet <img src="{{asset('images/Closet.png')}}" alt="Logo" width="50"></p>
        </div>
    </footer>
</body>

</html>