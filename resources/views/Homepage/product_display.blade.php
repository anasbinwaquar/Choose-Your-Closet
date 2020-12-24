<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>product - Brand</title>
    <link rel="stylesheet" href="/product/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="/product/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="/product/css/smoothproducts.css">
    <link rel="stylesheet" type="text/css" href="/product/css/style1.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light nav1">

    
<!--     <nav class="navbar navbar-expand-lg navbar-light bg-light">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/" style="color: #24C6DC; font-weight: bold;"> <img src="{{asset('images/Closet.png')}}" alt="logo" width="100" id="logo">Virtual Clothing Store</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item1 navclass">
        <a class="nav-link navlink" href="/" style="color: #24C6DC;">Home<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item1">

      <li class="nav-item">

        <a class="nav-link navlink" href="#" style="color: #24C6DC;">About Us</a>
      </li>
      <li class="nav-item1">
        <a class="nav-link navlink" href="/customize" style="color: #24C6DC;">Customizer</a>
      </li>
      <li class="nav-item1">
        <div class="dropdown">
        <a class="nav-link navlink" href="#" style="color: #24C6DC;">Products</a>
         <div class="dropdown-content">
        <a href="#" class="link">Purchase</a>
        <a href="RentProducts" class="link">Rent</a>
        </div>
        </div>
      </li>
      <li class="nav-item1">
        <div class="dropdown">
        <a class="nav-link navlink" href="#" style="color: #24C6DC;">User Profile</a>
         <div class="dropdown-content">
        <a href="/CheckOrders" class="link">Check Orders</a>
        <a href="/CompletedOrdersCustomer" class="link">Completed Orders</a>
        </div>
        </div>
      </li>

      <li class="nav-item1">

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

       <li class="nav-item1">

       <li class="nav-item">

        <div class="dropdown">
        <a class="nav-link navlink" href="/UserLogout" style="color: #24C6DC;">Logout</a>
        </div>
      </li>

      <li class="nav-item1">

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
</nav> -->

    @foreach($product as $product)
    <main class="page product-page">
        <section class="clean-block clean-product dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Product Page</h2>
                   
                </div>
                <div class="block-content">
                    <div class="product-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="gallery">
                                    <div class="sp-wrap"><a href="{{asset('uploads/sell/'. $product->product_image)}}"><img class="img-fluid d-block mx-auto" src="{{asset('uploads/sell/'. $product->product_image)}}"></a><a href="{{asset('uploads/sell/'. $product->product_image)}}"><img class="img-fluid d-block mx-auto" src="{{asset('uploads/sell/'. $product->product_image)}}"></a><a href="{{asset('uploads/sell/'. $product->product_image)}}"><img class="img-fluid d-block mx-auto" src="{{asset('uploads/sell/'. $product->product_image)}}"></a></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <h3>{{$product->product_name}}</h3>
                                    <div class="rating"><img src="/product/img/star.svg"><img src="/product/img/star.svg"><img src="/product/img/star.svg"><img src="/product/img/star-half-empty.svg"><img src="/product/img/star-empty.svg"></div>
                                    <div class="price">
                                        <h3>Rs. {{$product->price_per_unit}}</h3>
                                    </div>
                                    <form action="{{route('CartData',['product_id'=>$product->id])}}" method="post">
                                        @csrf
                                        
                                    <div style="width:250px;">
                                    <div class="input-group">
                                     <button class="button_quantity" type="button"><i class="fas fa-minus" onclick="decreaseValue()"></i></button>
                                      <span class="input-container">
                                      <input id="number" type="text" name="quant" class="form-control input-number" value="0" min="0" max="0">
                                      </span>
                                      <button class="button_quantity" type="button"><i class="fas fa-plus" onclick="increaseValue()"></i></button>
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
                                        <input type="hidden" id="amount_m" value="{{$product->quantity_medium}}">
                                         @endif
                                        @if($product->quantity_large!=NULL || $product->quantity_large!=0)
                                        <button id="size_l" type="button" class="btn btn-primary" style="font-weight: bold;" value="L" onclick="size_selector(this.id)">L</button>
                                        <input type="hidden" id="amount_l" value="{{$product->quantity_large}}">
                                         @endif
                                        @if($product->quantity_extra_large!=NULL || $product->quantity_extra_large!=0)
                                        <button id="size_xl" type="button" class="btn btn-primary" style="font-weight: bold;" value="XL" onclick="size_selector(this.id)">XL</button>
                                        <input type="hidden" id="amount_xl" value="{{$product->quantity_extra_large}}">
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

                                        <script type="text/javascript">
                                        function validateForm() {
                                        if (isEmpty(document.getElementById('data_8').value.trim())) {
                                        alert('Review is required!');
                                        return false;
                                        }
                                        return true;
                                        }
                                        function isEmpty(str) { return (str.length === 0 || !str.trim()); }
                                        function validateEmail(email) {
                                        var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,15}(?:\.[a-z]{2})?)$/i;
                                        return isEmpty(email) || re.test(email);
                                        }
                                        </script>
                                        @endif

                                        @foreach($reviews as $review)
                                            @if(session()->has('customer_id'))
                                                @if($check==1 && $review->customer_id==session()->get('customer_id'))
                                                    <form method="post" action="{{ route('EditReview')}}">
                                                        @csrf
                                                    <div class="reviews">
                                                        <div class="review-item">
                                                            <div class="rating"> Rating: {{$review->rating}}</div>

                                                            <h5>Your Review:</h4><span class="text-muted"></a>{{$review->First_Name}} {{$review->Last_Name}}, Dated: {{$review->review_date}}</span>
                                                            <p>{{$review->description}}</p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                       <label >Edit Description: </label> <input type="text" name="description" value="{{$review->description}}">

                                            <div >Update Rating:<span style="color: red;"> *  </span><select id="data_4" name="rating" style="max-width : 150px;">
                                                        @php
                                                            for ($i=01; $i <=5 ; $i++) { 
                                                                if($i==$review->rating)
                                                                    echo "<option selected='selected'>$i</option>";
                                                                else
                                                                    echo "<option>$i</option>";
                                                            }
                                                        @endphp
                                                        </select>
                                                       
                                                        </div>
                                                        <br>
                                            <button id="Submit" name="Submit" type="submit" class="btn btn-primary" required>Edit</button></div>
                                                    </div> 
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">

                                                    </form>
                                                @endif
                                            @endif
                                        <br><br>
                                        @endforeach


                                        @foreach($reviews as $review)
                                                <div class="reviews">
                                                    <div class="review-item">
                                                        <div class="rating"> Rating: {{$review->rating}}</div>
                                                        <h5>By:</h4><span class="text-muted"></a>{{$review->First_Name}} {{$review->Last_Name}}, Dated: {{$review->review_date}}</span>
                                                        <p>{{$review->description}}</p>
                                                    </div>
                                                </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clean-related-items">
                        <h3>Related /products</h3>
                        <div class="items">
                            <div class="row justify-content-center">
                                <div class="col-sm-6 col-lg-4">
                                    <div class="clean-related-item">
                                        <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="{{asset('uploads/sell/'. $product->product_image)}}"></a></div>
                                        <div class="related-name"><a href="#">Lorem Ipsum dolor</a>
                                            <div class="rating"><img src="/product/img/star.svg"><img src="/product/img/star.svg"><img src="/product/img/star.svg"><img src="/product/img/star-half-empty.svg"><img src="/product/img/star-empty.svg"></div>
                                            <h4>$300</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="clean-related-item">
                                        <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="{{asset('uploads/sell/'. $product->product_image)}}"></a></div>
                                        <div class="related-name"><a href="#">Lorem Ipsum dolor</a>
                                            <div class="rating"><img src="/product/img/star.svg"><img src="/product/img/star.svg"><img src="/product/img/star.svg"><img src="/product/img/star-half-empty.svg"><img src="/product/img/star-empty.svg"></div>
                                            <h4>$300</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="clean-related-item">
                                        <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="{{asset('uploads/sell/'. $product->product_image)}}"></a></div>
                                        <div class="related-name"><a href="#">Lorem Ipsum dolor</a>
                                            <div class="rating"><img src="/product/img/star.svg"><img src="/product/img/star.svg"><img src="/product/img/star.svg"><img src="/product/img/star-half-empty.svg"><img src="/product/img/star-empty.svg"></div>
                                            <h4>$300</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script src="/product/js/jquery.min.js"></script>
    <script src="/product/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="/product/js/smoothproducts.min.js"></script>
    <script src="/product/js/theme.js"></script>
    {{-- <script type="text/javascript" src="/product/js/script.js"></script> --}}
    @endforeach
</body>
<script type="text/javascript">
    function size_selector(parameter)
    {
        document.getElementById('size_submit').value=document.getElementById(parameter).value;
    }
    function increaseValue() {
      var value = parseInt(document.getElementById('number').value);
      var button = $('.button_quantity');
      var max=$("#number").attr('max');
      console.log(max);
      if(value<max){   
      value = isNaN(value) ? 0 : value;
      value++;
      document.getElementById('number').value = value;
      }
    }

    function decreaseValue() {
      var value = parseInt(document.getElementById('number').value);
      value = isNaN(value) ? 0 : value;
      value < 1 ? value = 1 : '';
      value--;
      document.getElementById('number').value = value;
    }
    $( document ).ready(function() {
        $("#size_s").click(function(){
            $("#number").prop("max",$("#amount_s").val())
            $("#number").val("0");
            console.log($("#number").attr('max'));

        });
        $("#size_m").click(function(){
            $("#number").prop("max",$("#amount_m").val())
            $("#number").val("0");
            console.log($("#number").attr('max'));
        });
        $("#size_l").click(function(){
            $("#number").prop("max",$("#amount_l").val())
            $("#number").val("0");
            console.log($("#number").attr('max'));
        });
        $("#size_xl").click(function(){
            $("#number").prop("max",$("#amount_xl").val())
            $("#number").val("0");
            console.log($("#number").attr('max'));
        });
    });
</script>

</html>