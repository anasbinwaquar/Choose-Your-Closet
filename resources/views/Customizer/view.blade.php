<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="{{asset('images/Closet.png')}}">
<!--      <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
<!--     Site CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="css/nav_styling.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS
  <!-<link rel="stylesheet" href="css/responsive.css"> -->
    <!-- Custom CSS -->
   <!--  <link rel="stylesheet" href="css/custom.css"> -->
        <title>Customizer - Choose Your Closet</title>
        <style>
            .drawing-area{
                position: absolute;
                top: 120px;
                left: 160px;
                z-index: 10;
                width: 200px;
                height: 400px;
            }

            .canvas-container{
                width: 200px; 
                height: 400px; 
                position: relative; 
                user-select: none;
                border: 1px solid #000000;
                /*padding: 10px;*/
            }
            #design_front_price{
                visibility: hidden;
            }
            #tshirt-div{
                width: 530px;
                height: 630px;
                position: relative;
                background-color: #fff;
            }
            #tshirt-div-back{
                width: 530px;
                height: 630px;
                position: relative;
                background-color: #fff;
            }
            #canvas{
                position: absolute;
                width: 200px;
                height: 400px; 
                left: 0px; 
                top: 0px; 
                user-select: none; 
                cursor: default;
            }
            #CustomizedShirt {
              margin: auto;
              width: 60%;
              /*border: 5px solid #FFFF00;*/
              /*padding: 10px;*/
            }
            #Left-Pane{
                float: left;
            }
            #Right-Pane{
                float: right;
            }
            input::-webkit-inner-spin-button 
            {
              -webkit-appearance: none;
              margin: 0;
            }

            h2{
                font-weight: bold;
                font-size: 25px;
                color: #24C6DC;
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
        <a class="nav-link navlink active" href="/customize" style="color: #24C6DC;">Customizer</a>
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
    <form class="form-inline my-2 my-lg-0">
        <div class="input-group mb-4">
            <input type="search" placeholder="Search..." aria-describedby="button-addon6" class="form-control border-info">
            <div class="input-group-append">
              <button id="button-addon6" type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
            </div>
          </div>
    </form>
</nav>

<br><br>

        <form class="px-4 py-3 btn-submit" id="CustomizedShirt" method="post" action="/customizer">
         {{csrf_field()}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        @if($error=='The contact format is invalid.')
                        <li>{{ "Please enter a valid contact number" }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif
        <div id="Left-Pane">
                <h2>Front</h2>
            <!-- Create the container of the tool -->
        <div id="tshirt-div" class="row justify-content-center form-group ">
            <!-- 
                Initially, the image will have the background tshirt that has transparency
                So we can simply update the color with CSS or JavaScript dinamically
            -->
            <img id="tshirt-foregroundpicture"  />
            <div id="drawingArea" class="drawing-area">                 
                <div class="canvas-container">
                    <input type="hidden" id="tshirt-front" name="tshirt_front" value="{{old('tshirt_front')}}">
                    <canvas id="tshirt-canvas" width="200" height="400"></canvas>
                </div>
            </div>
        </div>
        
        <!-- The select that will allow the user to pick one of the static designs -->
        <br>

        <!-- The Select that allows the user to change the color of the T-Shirt -->
        <br>
        <label for="tshirt-type" style="font-size: 20px;">Select Clothing Type:</label>

        <select id="tshirt" name="clothing_type" class="dropdown" style="height: 30px;">
            <option value=" " >Select one of the clothing ...</option>
            @foreach ($shirts as $shirt)
            @php
            $back=$shirt->getFilename();
            $temp=$shirt->getFilename();
            $temp=str_replace('_front.png', '', $temp);
            $back=str_replace('_front.png', '_back.png', $back)
            @endphp
            @if(strpos($shirt->getFilename(),'front'))
            <option value="{{ asset('t-shirts/' . $shirt->getFilename()) }}" >  {{$temp}}  </option>
            @endif
            @endforeach
        </select>
        <br>
        <label for="tshirt-color" style="font-size: 20px;">T-Shirt Color: ( Select Color and press enter )</label>
        <input type="color" name="tshirt_color" id="tshirt-color" value="#e66465" style="height: 30px;">
        <br>
        <label for="tshirt-design" style="font-size: 20px;">Front T-Shirt Design:</label>
        <select id="tshirt-design" style="height: 30px;">
            <option value="">Select designs for front ...</option>
            @foreach ($images as $image)
            <option value="{{ asset('templates/' . $image->image) }}" data-price='{{$image->price}}' data-name='{{$image->image}}' >{{$image->name}} | Rs:{{$image->price}}</option>
            @endforeach
        </select>
        <br>
        <div class="row">
        <input type="submit" class="form-control" id="Submit" style="width: 120px; color: #fff;background-color: #007bff;margin-right: 20px;" >
{{-- <button id="Submit" name="Submit" type="submit" class="btn btn-primary" required>SUBMIT</button> --}}
        <button type="button" class="btn btn-primary" id="Delete" >Remove Print</button>
        </div>
            </div>


        <div id="Right-Pane">
            <h2>Back</h2>

                <div id="tshirt-div-back" class="row justify-content-center form-group ">
                    <img id="tshirt-backgroundpicture" />
                    <div id="drawingArea" class="drawing-area">                 
                        <div class="canvas-container">
                            <input type="hidden" id="tshirt-back" name="tshirt_back">
                            <canvas id="tshirt-canvas-back" width="200" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <br><br>

                <label for="tshirt-design" style="font-size: 20px;">Back T-Shirt Design:</label>
                <select id="tshirt-design-back" class="" style="height: 30px;">
                    <option value="">Select designs for back ...</option>
                    @foreach ($images as $image)
                    <option value="{{ asset('templates/' . $image->image) }}" data-price='{{$image->price}}' data-name='{{$image->image}}' >{{$image->name}} | Rs:{{$image->price}}</option>
                    @endforeach
                </select>

                    <br>
                  <label for="sizes" style="font-size: 20px;">Select Size: </label>  
                  <select name="size" style="height: 30px;width: 200px;margin-left: 20px;">
                      <option  value="Small"> Small</option>
                      <option  value="Medium"> Medium</option>
                      <option  value="Large"> Large</option>
                      <option  value="Extra Large"> Extra Large</option>
                 </select>
                <div>
                    
                <h3>Price: <span id="price">1000</span></h3>
                <h3>Total Designs used: <span id="design_count">0</span></h3>
                </div>
                <div class="form-group w-50">
                  <label for="address" style="font-size: 20px;">Full Delivery Address</label>  
                  <input id="address" name="address" class="form-control " required type="text">
                </div> 

                  <div class="form-group w-50">
                  <label for="address" style="font-size: 20px;">Contact Number</label>  
                  <input id="contact" name="contact" class="form-control "  required type="number">
                </div> 
                 <br><br><br><br>

        </div>
        <input type="hidden" id="total_price" name="total_price">
       
        </form>

        <footer class="page-footer dark" style="clear: both;">
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
        
		    <div id="data"></div>
        
	<!-- Include Fabric.js in the page <--></-->
    <script type="text/javascript" src="{{ asset('js/fabric.js-4.2.0/dist/fabric.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" integrity="sha512-s/XK4vYVXTGeUSv4bRPOuxSDmDlTedEpMEcAQk0t/FMd9V6ft8iXdwSBxV0eD60c6w/tjotSlKu9J2AAW1ckTA==" crossorigin="anonymous"></script>
	<!-- Include DomToImage in the page -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{asset('js/domtoimage.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/customizer.js')}}"></script>

        
    </body>
    
</html>


