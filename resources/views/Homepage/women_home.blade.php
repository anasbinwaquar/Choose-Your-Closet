<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" href="{{asset('images/Closet.png')}}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="/css/nav_styling.css">
	<link rel="stylesheet" type="text/css" href="/css/home.css">

</head>
<body>
  @if($check==0)
  <nav class="navbar navbar-expand-lg navbar-light bg-light" >
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
        <a class="nav-link navlink" href="/ContactUs" style="color: #24C6DC;">Contact Us</a>
      </li>
    </ul>
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
        <a class="nav-link navlink" href="AboutUs" style="color: #24C6DC;">About Us</a>
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
        <a class="nav-link navlink" href="/ContactUs" style="color: #24C6DC;">Contact Us</a>
      </li>
    </ul>
</nav>
@endif
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 7</div>
  <img class="slider_img" src="https://www.alkaramstudio.com/media/homepageslider/homepageslider/slider-2-mak-winter-revised.jpg" style="width:100%">
  <!-- <div class="text">Caption Text</div> -->
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 7</div>
  <img class="slider_img" src="https://www.alkaramstudio.com/media/homepageslider/homepageslider/festive-slider-dt.jpg" style="width:100%">
  <!-- <div class="text">Caption Two</div> -->
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 7</div>
  <img class="slider_img" src="https://www.alkaramstudio.com/media/homepageslider/homepageslider/fc20slider.jpg" style="width:100%">
  <!-- <div class="text">Caption Three</div> -->
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 7</div>
  <img class="slider_img" src="https://www.alkaramstudio.com/media/homepageslider/homepageslider/sliderrronline-revised.jpg" style="width:100%">
  <!-- <div class="text">Caption Four</div> -->
</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 7</div>
  <img class="slider_img" src="https://cdn.shopify.com/s/files/1/0464/1731/3955/files/02a_1512x.jpg?v=1608095079" style="width:100%">
  <!-- <div class="text">Caption Four</div> -->
</div>

<div class="mySlides fade">
  <div class="numbertext">6 / 7</div>
  <img class="slider_img" src="https://www.dulhanzari.com/wp-content/uploads/2019/08/231.jpg" style="width:100%">
  <!-- <div class="text">Caption Four</div> -->
</div>

<div class="mySlides fade">
  <div class="numbertext">7 / 7</div>
  <img class="slider_img" src="https://cdn.shopify.com/s/files/1/2265/5245/files/Women-Clothing-Fashion-in-Pakistan_1506x.progressive.jpg?v=1607949452" style="width:100%">
  <!-- <div class="text">Caption Four</div> -->
</div>

</div>
  <a class="left" onclick="nextSlide(-1)">❮</a>  
        <a class="right" onclick="nextSlide(1)">❯</a>  
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

	<div style="margin: 50px;">
  <div class="row justify-content-between">
     <div class="img_container col-lg-4 col-offset-12 special-grid best-seller">
      <a class="anchor_link" class="anchor_link" href="/women_home_pret">
                   <button class="button"><img src="https://i.pinimg.com/originals/a1/80/27/a18027d39e23f6c41d76dd8a123e7e58.jpg" class="imagy"></button>
                   <div class="centered">Pret</div>
                 </a>
    </div>
    <div class="img_container col-lg-4 col-offset-12 special-grid best-seller">
      <a class="anchor_link"  href="/women_home_3_piece_suit">
                   <button class="button"><img src="https://www.alkaramstudio.com/media/catalog/product/cache/1/image/17f82f742ffe127f42dca9de82fb58b1/f/w/fw-24.1-19-green-1_1.jpg" class="imagy"></button>
                    <div class="centered">3 Piece Suit</div>
                    </a>
    </div>
    <div class="img_container col-lg-4 col-offset-12 special-grid best-seller">
      <a class="anchor_link" href="/women_home_party_wear">
                   <button class="button"><img src="https://i.pinimg.com/736x/95/fb/c7/95fbc71a7a0280cf1a29334d66e29c75.jpg" class="imagy"></button>
                    <div class="centered">Party Wear</div>
                    </a>
    </div>
  </div> 
    <br>
  <div class="img_container row justify-content-between">
         <div class="col-lg-4 col-offset-12 special-grid best-seller">
          <a class="anchor_link" href="/women_home_winter_wear">
                   <button class="button"><img src="https://cdn.sanaullastore.com/media/catalog/product/a/l/al-karam-winter-collection-2019-fw-7.1-19-blue-_1_.jpg" class="imagy"></button>
                    <div class="centered">Winter Wear</div>
                    </a>
    </div>
     <div class="img_container col-lg-4 col-offset-12 special-grid best-seller">
      <a class="anchor_link" href="/women_home_summer_wear">
                   <button class="button"><img src="https://i.pinimg.com/736x/fc/4d/e8/fc4de81d07db809aa5e3654c25b8d497.jpg" class="imagy"></button>
                    <div class="centered">Summer Wear</div>
                    </a>
    </div>  
        <div class="img_container col-lg-4 col-offset-12 special-grid best-seller">
          <a class="anchor_link" href="/women_home_pants_jeans">
                 <button class="button"><img src="https://cdn.shopify.com/s/files/1/0015/2502/2772/products/Side-zip-denim-capri-by-grain-de-malice-1_large.jpg?v=1527156969" class="imagy"> </button>
                 <div class="centered">Pants & Jeans</div>
          </a>
    </div>
     </div>
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
<script>
var slideIndex = 0;
showSlides();
function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active_dot", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active_dot";
  setTimeout('showSlides()', 2000); // Change image every 2 seconds
}
 function displaySlides(n) {  
            var i;  
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");  
            if (n > slides.length) {slideIndex = 1}  
            if (n < 1) { slideIndex = slides.length}  
            for (i = 0; i < slides.length; i++) {  
                slides[i].style.display = "none"; 
                dots[i].className = dots[i].className.replace(" active_dot", ""); 
            }  
            dots[slideIndex-1].className += " active_dot";
            slides[slideIndex - 1].style.display = "block"; 
        }  
  function nextSlide(n) {  
            displaySlides(slideIndex += n);  
        }  
</script>
</html>