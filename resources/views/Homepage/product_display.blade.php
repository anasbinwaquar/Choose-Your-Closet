<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="{{ asset('css/product_display.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/productdisplay.js')}}"></script>  
    <title>Homepage</title>
  </head>
<body>
<div class="product-details"><!--product-details-->
@foreach($product as $product)
		<div class="card item col-xs-4 col-lg-4" style="width: 18rem;">
		  <img class="card-img-top" src="{{asset('uploads/sell/'. $product->product_image)}}" alt="Card image cap" >
		  <div class="card-body">
		    <h5 class="product-name">{{$product->product_name}}</h5>
		    <p class="product-description">{{$product->description}}</p>
		    <a href="product/{{$product->id}}" class="btn btn-primary">See More</a>
		  </div>
		  <div>
		  		<button class="btn btn-primary">Add to cart for Rent</button>
		  </div>

		</div>
                                   
	<div class="col-sm-5">
		<div class="view-product">
			<img src="{{asset('uploads/sell/'. $product->product_image)}}" style="width: 50%; height: auto;" alt="">
		</div>
			

	</div>
	<div class="col-sm-7">
		<div class="product-information"><!--/product-information-->
			<img src="images/product-details/new.jpg" class="newarrival" alt="">
			<h2>{{$product->product_name}}</h2>
			<img src="images/product-details/rating.png" alt="">
			
			<span>
				<span>Rs: {{$product->price_per_unit}}</span>
				<br>
				<span>{{$product->description}}</span>
				<br>
				<div>
				<?php 
					if ($product->quantity_small>0 ||$product->quantity_medium>0 ||$product->quantity_large>0 ||$product->quantity_extra_large>0 )
						echo "Availability: In Stock";
					else
						echo "Not in stock";
					echo "<br>";
					if($product->quantity_small>0)
						echo '<input value="Small" type="radio" name="sizes">Small';
					if($product->quantity_medium>0)
						echo '<input value="Medium" type="radio" name="sizes">Medium';
					if($product->quantity_large>0)
						echo '<input value="Large" type="radio" name="sizes">Large';
					if($product->quantity_extra_large>0)
						echo '<input value="Extra_large" type="radio" name="sizes">Extra Large';
					
			 	?>
				</div>	
				<button type="button" class="btn btn-fefault cart">
					<i class="fa fa-shopping-cart"></i>
					Add to cart
				</button>
			</span>
			@endforeach
			<!-- <br>
			@if($RentalProduct!=null)
			<span>
				<h2>Rental Details</h2>
				<span>Daily Charges Rs: {{$RentalProduct->charges}}</span>
				<div>
				</div>
				<th><a href="/add-to-cart-rent/{{$RentalProduct->product_id}}"><button class="btn btn-fefault cart">
				<i class="fa fa-shopping-cart"></i>
				Add to cart</button></a></th>

			</span>
			@endif
			
			<p><b>Brand:</b> {{$SellerData->Brand_Name}}</p> -->
		</div>
	</div>
</div>                
</body>
</html>