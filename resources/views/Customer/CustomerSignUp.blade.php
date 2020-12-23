<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Customer Sign Up - Choose Your Closet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" href="{{asset('images/Closet.png')}}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js">
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/CustomerSignupStyle.css">
    <link rel="stylesheet" type="text/css" href="css/nav_styling.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #2b2f31">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="opacity: 0.8;">
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
        <a class="nav-link navlink active" href="#" style="color: #24C6DC;">Sign Up</a>
         <div class="dropdown-content">
        <a href="/CustomerSignUp" class="link active">Customer</a>
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

    <div class="main">
        <br><br>
        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container1">
                <div class="signup-content">

                    <form action="Customer_registered" method="post" autocomplete="off">
                         @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                     @endif
                        <h2 class="form-title" style="font-weight: bold;">Create account</h2>
                         <div class="form-group">
                            <input type="text" class="form-input" name="First_Name" id="name" value="{{old('First_Name')}}" placeholder="First Name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="Last_Name" id="name" placeholder="Last Name" value="{{old('Last_Name')}}"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="Email" id="email" placeholder="Your Email" value="{{old('Email')}}" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="Phone_Number" id="PhoneNumber" placeholder="Phone Number" value="{{old('Phone_Number')}}" />
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{old('Username')}}" class="form-input" name="Username" id="Username" placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="Password" id="Password" placeholder="Password"/>
                        </div>
                        <!-- <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div> -->
                       <!--  <div class="form-group"> -->
                          <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                            <!-- <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/> -->
                       <!--  </div> -->
                    </form>
                    <p class="loginhere">
                        Already have an account ? <a href="/CustomerLogin" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>
        <br>
    </div>

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