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
    {{-- <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">Brand</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto"></ul>
            </div>
        </div>
    </nav> --}}
    @foreach($product as $product)
    <main class="page product-page">
        <section class="clean-block clean-product dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">product Page</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
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
                                        <h3>{{$product->price_per_unit}}</h3>
                                    </div>
                                    <a href="{{route('CartData',['product_id'=>$product->id])}}"><button class="btn btn-primary" type="button"><i class="icon-basket"></i>Add to Cart</button></a>
                                    <div style="width:250px;">
                                    <div class="input-group">
                                     <button class="button_quantity"><i class="fas fa-minus" onclick="decreaseValue()"></i></button>
                                      <span class="input-container">
                                      <input id="number" type="text" name="quant" class="form-control input-number" value="1" min="1" max="10">
                                      </span><button class="button_quantity"><i class="fas fa-plus" onclick="increaseValue()"></i></button>
                                      </div>
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
                                        @if(session()->has('data') && $check!=1)
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
                                        <div style="padding-bottom: 18px;">Review<span style="color: red;"> *</span><br/>
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
    </footer>
    <script src="/product/js/jquery.min.js"></script>
    <script src="/product/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="/product/js/smoothproducts.min.js"></script>
    <script src="/product/js/theme.js"></script>
    <script type="text/javascript" src="/product/js/script.js"></script>
    @endforeach
</body>

</html>