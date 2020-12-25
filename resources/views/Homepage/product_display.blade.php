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
     <link rel="icon" href="{{asset('images/Closet.png')}}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js">
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="css/nav_styling.css">
</head>

<body>
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
                                      <input id="number" type="text" name="quant" class="form-control input-number" value="1" min="1" max="10">
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
                                         @endif
                                        @if($product->quantity_medium!=NULL || $product->quantity_medium!=0)
                                        <button id="size_m" type="button" class="btn btn-primary" style="font-weight: bold;" value="M" onclick="size_selector(this.id)">M</button>
                                         @endif
                                        @if($product->quantity_large!=NULL || $product->quantity_large!=0)
                                        <button id="size_l" type="button" class="btn btn-primary" style="font-weight: bold;" value="L" onclick="size_selector(this.id)">L</button>
                                         @endif
                                        @if($product->quantity_extra_large!=NULL || $product->quantity_extra_large!=0)
                                        <button id="size_xl" type="button" class="btn btn-primary" style="font-weight: bold;" value="XL" onclick="size_selector(this.id)">XL</button>
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
                                        var re = /^([\w-]+(?:\.[\w-]+))@((?:[\w-]+\.)\w[\w-]{0,66})\.([a-z]{2,15}(?:\.[a-z]{2})?)$/i;
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
    <script type="text/javascript" src="/product/js/script.js"></script>
    @endforeach
</body>
<script type="text/javascript">
    function size_selector(parameter)
    {
        document.getElementById('size_submit').value=document.getElementById(parameter).value;
    }
</script>

</html>