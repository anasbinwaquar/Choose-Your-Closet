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
                </div>
                <div class="block-content">
                    <div class="product-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="gallery">
                                    <div class="sp-wrap"><a href="{{asset('uploads/sell/'. $product->product_image)}}"><img class="img-fluid d-block mx-auto" src="{{asset('/uploads/sell/'. $product->product_image)}}"></a><a href="{{asset('uploads/sell/'. $product->product_image)}}"><img class="img-fluid d-block mx-auto" src="{{asset('/uploads/sell/'. $product->product_image)}}"></a><a href="{{asset('/uploads/sell/'. $product->product_image)}}"><img class="img-fluid d-block mx-auto" src="{{asset('/uploads/sell/'. $product->product_image)}}"></a></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <h3>{{$product->product_name}}</h3>
                                    <div class="rating"><img src="/product/img/star.svg"><img src="/product/img/star.svg"><img src="/product/img/star.svg"><img src="/product/img/star-half-empty.svg"><img src="/product/img/star-empty.svg"></div>
                                    <div class="price">
                                        <h3>Rs. {{$product->price_per_unit}}</h3>
                                           @if($product->Discount!=NULL)
                                                            <h3 style="color:grey;text-decoration-line: line-through;">PKR {{$product->price_per_unit}}</h3>
                                                            @elseif($product->Discount==NULL)
                                                            <h3>PKR {{$product->price_per_unit}}</h3>
                                                            @endif
                                                            @if($product->Discount!=NULL)
                                                        <h3 style="color:green;">{{$product->Discount}}% Discount</h3>
                                                            <h3>New Price: PKR
                                                              <?php 
                                                              $var=($product->Discount/100)*$product->price_per_unit;
                                                              echo $product->price_per_unit-$var;
                                                               ?>
                                                            </h3>
                                                              @endif
                                    </div>
                                    <form action="{{route('CartData',['product_id'=>$product->id])}}" method="post">
                                        @csrf
                                        
                                    <div style="width:250px;">
                                    <div class="input-group">
                                     <button class="button_quantity" type="button"><i class="fas fa-minus" onclick="decreaseValue()"></i></button>
                                      <span class="input-container">
                                      <input id="number" type="text" name="quant" class="form-control input-number" value="0" min="" max="0">
                                      </span><button class="button_quantity" type="button"><i class="fas fa-plus" onclick="increaseValue()"></i></button>
                                      </div>
                                      @if ($errors->any())
                                            <div class="col-md-12 alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        @if($error=='The size field is required.')
                                                        <li> Please select a Size. </li>
                                                        @else
                                                        <li>{{ $error }}</li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                      <input id="size_submit" type="text" name="size" style="display: none;">
                                        @if($product->quantity_small!=NULL || $product->quantity_small!=0)
                                        <button id="size_s" type="button" class="btn btn-primary" style="font-weight: bold;" value="S" onclick="size_selector(this.id)">S</button>
                                        <input type="hidden" id="amount_s" value="{{$product->quantity_small}}">
                                         @endif
                                        @if($product->quantity_medium!=NULL || $product->quantity_medium!=0)
                                        <button id="size_m" type="button" class="btn btn-primary" style="font-weight: bold;" value="M" onclick="size_selector(this.id)">M</button>
                                        <input type="hidden" id="amount_s" value="{{$product->quantity_medium}}">
                                         @endif
                                        @if($product->quantity_large!=NULL || $product->quantity_large!=0)
                                        <button id="size_l" type="button" class="btn btn-primary" style="font-weight: bold;" value="L" onclick="size_selector(this.id)">L</button>
                                        <input type="hidden" id="amount_s" value="{{$product->quantity_large}}">
                                         @endif
                                        @if($product->quantity_extra_large!=NULL || $product->quantity_extra_large!=0)
                                        <button id="size_xl" type="button" class="btn btn-primary" style="font-weight: bold;" value="XL" onclick="size_selector(this.id)">XL</button>
                                        <input type="hidden" id="amount_s" value="{{$product->quantity_extra_large}}">
                                        @endif
                                      </div>
                                      @if(!session()->has('customer_id'))
                                         <button class="btn btn-primary" type="button" onclick="alert('You need to Login first')"><i class="icon-basket"></i>Add to Cart</button>
                                         @elseif(session()->has('customer_id'))
                                         <button class="btn btn-primary" type="submit"><i class="icon-basket"></i>Add to Cart</button>
                                         @endif
                                      </form>
                                    </div>
                                    <div class="summary">
                                        <p>{{$product->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="/product-info">
                        <div>
                            <ul class="nav nav-tabs" role="tablist" id="myTab">
                                <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-toggle="tab" id="description-tab" href="#description">Description</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" id="specifications-tabs" href="#specifications">Specifications</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" id="reviews-tab" href="#reviews">Reviews</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane active fade show description" role="tabpanel" id="description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <figure class="figure"><img class="img-fluid figure-img" src="{{asset('uploads/sell/'. $product->product_image)}}"></figure>
                                        </div>
                                        <div class="col-md-7">
                                            <h4>Lorem Ipsum</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7 right">
                                            <h4>Lorem Ipsum</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                        <div class="col-md-5">
                                            <figure class="figure"><img class="img-fluid figure-img" src="{{asset('uploads/sell/'. $product->product_image)}}"></figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show specifications" role="tabpanel" id="specifications">
                                    <div class="table-responsive table-bordered">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="stat">Cloth Type</td>
                                                    <td>{{$product->clothing_type}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="stat">Category</td>
                                                    <td>{{$product->category}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="stat">Gender</td>
                                                    <td>{{$product->gender_type}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" role="tabpanel" id="reviews">
                                    
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if(session()->has('data') AND $check==0)
                                        <form method="post" action="{{ route('SubmitReview')}}">
                                            @csrf
                                        <div style="max-width: 400px;">
                                        </div>
                                        <div style="padding-bottom: 18px;font-size : 24px; padding-top: 18px;">Product Review</div>
                                        <div style="padding-bottom: 18px;">Rate this product<span style="color: red;"> *</span><br/>
                                        <select id="data_4" name="rating" style="max-width : 150px;" class="form-control"><option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        </select>
                                        </div>
                                        <div style="padding-bottom: 18px;">Description<span style="color: red;"> *</span><br/>
                                        <textarea id="data_8" false name="description" style="max-width : 450px;" rows="9" class="form-control"></textarea>
                                        </div>
                                        <div style="padding-bottom: 18px;">
                                        <button id="Submit" name="Submit" type="submit" class="btn btn-primary" required>SUBMIT</button></div>
                                        <div class="form-group">
                                        <div>
                                        <script  type="text/javascript"></script>
                                        </div>
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        </form>
                @if($product!=NULL)
                <div class="content">
                        <div class="col-lg-12 col-lg-12">
                            <div class="items">
                                <div class="product">
                     @foreach($product as $product)
                @foreach($product as $product)
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
                                <h4><span class="text" style="font-size: 15px;">Subtotal</span><span class="price" style="font-size: 15px;">PKR {{$product_cart}}</span></h4>
                                <h4><span class="text" style="font-size: 15px;">Sale Discount</span><span class="price" style="font-size: 15px;">PKR {{$discount_sale}}</span></h4>
                                <h4><span class="text" style="font-size: 15px;">Voucher Discount</span><span class="price" style="font-size: 15px;">PKR {{$discount_cart}}</span></h4>
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