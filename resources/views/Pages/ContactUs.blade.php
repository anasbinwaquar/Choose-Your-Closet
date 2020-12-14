<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact Us - Choose Your Closet</title>
    <link rel="icon" href="{{asset('images/Closet.png')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/nav_styling.css">
</head>

<body>
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
                  <button id="button-addon6" type="submit" class="btn btn-info" style="background-color: #24C6DC;"><i class="fa fa-search"></i></button>
                </div>
              </div>
        </form>
    </nav>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 style="color: #24C6DC;">Contact Us</h2>
                    <p>You've got Questions, We've got Answers! All you have to do is connect with us via filling in the form below. Have a nice day!</p>
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
    
</body>

</html>