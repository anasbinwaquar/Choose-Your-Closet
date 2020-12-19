<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Shopping Cart - Choose Your Closet</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
</head>

<body>
    
    <main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Shopping Cart</h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p> -->
                </div>
              
                @foreach($product as $product)
                <div class="content">
                        <div class="col-md-12 col-lg-10">
                            <div class="items">
                                <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="{{asset('uploads/sell/'. $product['item']['product_image'])}}"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#">{{$product['item']['product_name']}}</a>
                                            <div class="product-specs">
                                                <div><span>Clothing Type:&nbsp;</span><span class="value">{{$product['item']['clothing_type']}}</span></div>
                                                <div><span>Category:&nbsp;</span><span class="value">{{$product['item']['category']}}</span></div>
                                                <div><span>Gender:&nbsp;</span><span class="value">{{$product['item']['gender_type']}}</span></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label>
                                        <input type="number" id="number" class="form-control quantity-input" value="{{$product['qty']}}">
                                          </div>
                                        <div class="col-6 col-md-2 price"><span>{{$product['item']['price_per_unit']}}</span></div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-12 col-lg-12">
                            <div class="summary">
                                <h3>Summary</h3>
                                <h4><span class="text">Subtotal</span><span class="price">Rs. {{$product_cart}}</span></h4>
                                <h4><span class="text">Discount</span><span class="price">Rs.0</span></h4>
                                <h4><span class="text">Shipping</span><span class="price">Rs.0</span></h4>
                                <h4><span class="text">Total</span><span class="price">Rs. {{$product_cart}}</span></h4><button class="btn btn-primary btn-block btn-lg" type="button">Checkout</button>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </main>
   
</body>

</html>