<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/homepage.css') }}" rel="stylesheet">

    <title>Homepage</title>
  </head>

@forelse($product as $product)
<div class="card-column">
		<div class="card item col-xs-4 col-lg-4" style="width: 18rem;">
		  <img class="card-img-top" src="{{asset('uploads/sell/'. $product->product_image)}}" alt="Card image cap" >
		  <div class="card-body">
		    <h5 class="product-name">{{$product->product_name}}</h5>
		    <p class="product-description">{{$product->description}}</p>
		    <a href="product/{{$product->id}}" class="btn btn-primary">See More</a>
		  </div>
		</div>
	</div>
@endforelse