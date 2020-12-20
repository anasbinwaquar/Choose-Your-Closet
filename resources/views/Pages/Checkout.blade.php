<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Payment - Choose Your Closet</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
</head>

<body onload="card_form()">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">Brand</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto"></ul>
            </div>
        </div>
    </nav>
    <main class="page payment-page">
        <section class="clean-block payment-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Payment</h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p> -->
                </div>
                <form method="post" action="PurchaseOrdersChecked" autocomplete="off">
                    <div class="products">
                        <h3 class="title">Checkout</h3>
                        @csrf
                        @foreach($product as $product)
                        <div class="item"><span class="price">{{$product['price']}}</span>
                            <p class="item-name">{{$product['item']['product_name']}} x{{$product['qty']}}</p>
                            <p class="item-description">{{$product['item']['description']}}</p>
                        </div>
                        @endforeach
                        <div class="total"><span>Total</span><span class="price">Rs. {{$product_cart}}</span></div>
                    </div>
                    <div class="card-details">
                             <h3 class="title">Delivery Address</h3>
                            <div class="col-lg-12">
                                <div class="form-group"><input class="form-control" type="text" placeholder="Address" name="Delivery_Address" required>
                                </div>
                            </div>
                            <br>
                             <h3 class="title">Payment Methods</h3>    
                             <div class="form-check ">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Radio1" onclick="card_form()">
                              <label class="form-check-label" style="font-size: 15px;">Pay by card</label>
                            </div>
                            <div class="form-check ">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Radio2" onclick="card_form()" checked="true">
                              <label class="form-check-label" style="font-size: 15px;">Cash on delievery</label>
                            </div>
                            <div class="form-check ">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Radio3" onclick="card_form()">
                              <label class="form-check-label" style="font-size: 15px;">Wallet</label>
                            </div>             
    
                        <div id="form_card">
                        <h3 class="title">Credit Card Details</h3>
                        <div class="form-row">
                            <div class="col-sm-7">
                                <div class="form-group"><label for="card-holder">Card Holder</label><input class="form-control" type="text" placeholder="Card Holder"></div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group"><label>Expiration date</label>
                                    <div class="input-group expiration-date"><input class="form-control" type="text" placeholder="MM"><input class="form-control" type="text" placeholder="YY"></div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group"><label for="card-number">Card Number</label><input class="form-control" type="text" id="card-number" placeholder="Card Number"></div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group"><label for="cvc">CVC</label><input class="form-control" type="text" id="cvc" placeholder="CVC"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-block">Proceed</button>
                     </div>
              </form>
            </div>
        </section>
    </main>
    
</body>
<script type="text/javascript">

    function card_form()
    {
        document.getElementById("form_card").style.display = "none";
        if(document.getElementById("Radio1").checked==true)
        {
            document.getElementById("form_card").style.display = "block";
            document.getElementById("wallet_card").style.display = "none";
        }
        else if(document.getElementById("Radio3").checked==true)
        {
            document.getElementById("wallet_card").style.display = "block";
            document.getElementById("form_card").style.display = "none";
        }
        else if(document.getElementById("Radio2").checked==true)
        {
            document.getElementById("wallet_card").style.display = "none";
            document.getElementById("form_card").style.display = "none";
        }
    }
</script>
</html>