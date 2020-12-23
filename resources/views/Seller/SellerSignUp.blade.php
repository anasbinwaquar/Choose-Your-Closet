<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Seller Sign Up</title>
 <link rel="icon" href="{{asset('images/Closet.png')}}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js">
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/SellerSignupStyle.css">
    <link rel="stylesheet" type="text/css" href="css/nav_styling.css">
    
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
        <a class="nav-link navlink" href="/" style="color: #24C6DC;">Home</a>
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
        <a href="/CustomerSignUp" class="link">Customer</a>
        <a href="/SellerSignUp" class="link active">Seller</a>
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
        <br>
        <section class="signup">
            <img src="images/signup-bg.png" alt="" id="SellerBenefits">
            <div class="container1">
                <div class="signup-content">
                    <form action="Seller_registered" method="post" autocomplete="off">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    @if($error=='The c n i c format is invalid.')
                                    <li>{{ "Please enter a valid CNIC number" }}</li>
                                    @else
                                        <li>{{ $error }}</li>
                                        
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            
                        <h2 class="form-title">Create account</h2>
                         <div class="form-group">
                            <input type="text" class="form-input" name="First_Name" required id="name" placeholder="First Name" value="{{old('First_Name')}}"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="Last_Name" required id="name" placeholder="Last Name" value="{{old('Last_Name')}}"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="Email" required id="email" placeholder="Your Email" value="{{old('Email')}}" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="Phone_Number" required id="PhoneNumber" placeholder="Phone Number" value="{{old('Phone_Number')}}"/>
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{old('Website_Name')}}" class="form-input" name="Website_Name"  id="WebsiteName" placeholder="Website Name(Optional)"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" value="{{old('Brand_Name')}}" name="Brand_Name" id="BrandName" placeholder="Brand Name(Optional)"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="Username" value="{{old('Username')}}" required id="Username" placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="Password" value="{{old('Password')}}" required id="Password" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="CNIC" id="CNIC" value="{{old('CNIC')}}" required placeholder="CNIC : 42201-XXXXXXX-X"/>
                        </div>
                        <!-- <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div> -->
                       <!--  <div class="form-group"> -->
                          <button type="submit" name="submit" id="submit" class="btn btn-primary" value="Sign up">Sign Up</button>
                            <!-- <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/> -->
                       <!--  </div> -->
                    </form>
                    <p class="loginhere">
                        Already have an account ? <a href="/SellerLogin" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>
<br><br><br><br><br><br><br><br><br>
     <footer class="page-footer dark clearfix active" >
     <footer class="page-footer dark">
      <img src="{{asset('images/Closet.png')}}" alt="Logo" style="float: right; margin-right: 200px;">
        <div class="container" style="font-weight: lighter;">
            <div class="row" style="padding-right: 220px;">
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