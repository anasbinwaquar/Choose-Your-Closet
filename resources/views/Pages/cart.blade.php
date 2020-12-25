<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Shopping Cart - Choose Your Closet</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
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


    <style>
    
    .h2
    {
        color: #24C6DC; 
        font-weight: bold;
        font-size: 40px;
        text-align: center;
       
    }

</style>

</head>

<body>
    
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
        <a class="nav-link navlink active" href="/CustomerCart" style="color: #24C6DC;"><i class="fas fa-shopping-cart"></i><span class="badge badge-light">
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
    </div>
</nav>

    <main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info h2">Shopping Cart</h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p> -->
                </div><?php 
                                $var=0;
                                $var2=0;
                                   ?>
                 
                @if($product!=NULL)
                <div class="content">
                        <div class="col-lg-12 col-lg-12">
                            <div class="items">
                                <div class="product">
                     @foreach($product as $product)
                     @foreach($product as $product)
                                   <?php 
                                   
                                  $var+=$product['sale_dis'];
                                  $var2+=$product['vouch_dis'];
                                   ?>
                  <form action="{{route('UpdateCartData',['product_id'=> $product['item']['id'],'size'=>$product['siz']])}}" method="post">
                    @csrf   
                                    <div class="row justify-content-center align-items-center">

                                        <form action="{{route('CartData',['product_id'=> $product['item']['id']])}}"  method="post">

                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="{{asset('uploads/sell/'. $product['item']['product_image'])}}"></div>
                                        </div>
                                      
                                        <div class="col-md-5 product-info" style="font-size: 18px;"><a class="product-name" href="#">{{$product['item']['product_name']}}</a>

                                            <div class="product-specs">
                                                <div style="font-size: 15px;"><span>Clothing Type:&nbsp;</span><span class="value">{{$product['item']['clothing_type']}}</span></div>
                                                <div style="font-size: 15px;"><span>Category:&nbsp;</span><span class="value">{{$product['item']['category']}}</span></div>
                                                <div style="font-size: 15px;"><span>Gender:&nbsp;</span><span class="value">{{$product['item']['gender_type']}}</span></div>
                                                 <div style="font-size: 15px;"><span>Size:&nbsp;</span><span class="value">
                                                 {{$product['siz']}}</span></div>
                                                 <br>
                                                 <input type="text" name="voucher" value="" style="height: 30px;">
                                                 <button class="btn btn-dark" style="font-size: 15px;" type="submit">Add Voucher</button>
                                                 <br><br>
                                                 <button class="btn btn-success" style="font-size: 20px;" type="submit">Update</button>
                                                 <a href="{{route('DeleteCartData',['product_id'=> $product['item']['id'],'size'=>$product['siz']])}}"><button class="btn btn-danger" style="font-size: 20px;" type="button">Delete</button></a>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label>

                                        <input type="number" id="number" name="update_quantity" class="form-control quantity-input" min="1" value="{{$product['qty']}}">
                                          </div>
                                        <div class="col-6 col-md-2 price"><span>{{$product['price']}}</span></div>
                                         
                                    </div>
                                     </form>
                                 @endforeach
                                 @endforeach
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="summary">
                                <h3>Summary</h3>
                                <<h4><span class="text" style="font-size: 15px;">Subtotal</span><span class="price" style="font-size: 15px;">PKR {{$product_cart}}</span></h4>
                                <h4><span class="text" style="font-size: 15px;">Sale Discount</span><span class="price" style="font-size: 15px;">
                                PKR {{ $var}}</span></h4>
                                <h4><span class="text" style="font-size: 15px;">Voucher Discount</span><span class="price" style="font-size: 15px;">PKR {{$var2}}</span></h4>
                                <h4><span class="text" style="font-size: 15px;">Shipping</span><span class="price" style="font-size: 15px;">PKR {{$shipping}}</span></h4>
                                <h4><span class="text" style="font-size: 15px;">Total</span><span class="price" style="font-size: 15px;">PKR {{$final_total}}</span></h4><a href="/PurchaseOrders"><button class="btn btn-primary btn-block btn-lg" type="button">Checkout</button></a>
                            </div>
                        </div>
                        @elseif($product==NULL)
                        <div class="col-md-12 col-lg-10 row justify-content-center align-items-center"> 
                            <h2>Your Cart is Empty</h2> </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="summary">
                                <h3>Summary</h3>
                                <h4><span class="text">Subtotal</span><span class="price">Rs. 0</span></h4>
                                <h4><span class="text">Discount</span><span class="price">Rs. 0</span></h4>
                                <h4><span class="text">Shipping</span><span class="price">Rs. 0</span></h4>
                            </div>
                        </div>

                        
                </div>
                     @endif
                 

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