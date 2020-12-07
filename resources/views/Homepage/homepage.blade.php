<!DOCTYPE html>
<html>
<head>
    <title>
        
    </title>
<!--      <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
<!--     Site CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Responsive CSS
  <!-<link rel="stylesheet" href="css/responsive.css"> -->
    <!-- Custom CSS -->
   <!--  <link rel="stylesheet" href="css/custom.css"> -->
</head>
<body>
    <div class="container">
        @foreach($data as $data)
	<div id="products" class="row view-group">
                <div class="item col-xs-4 col-lg-4">
                    <div class="thumbnail card">
                        <div class="img-event">
                            <img class="group list-group-image img-fluid" src="{{asset('uploads/sell/'. $data->product_image)}}" alt="" />
                        </div>
                        <div class="caption card-body">
                            <h4 class="group card-title inner list-group-item-heading">
                                {{$data->product_name}}</h4>
                            <p class="group inner list-group-item-text">
                                {{$data->description}}</p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">
                                        {{$data->price_per_unit}}</p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <a class="btn btn-success" href="http://www.jquery2dotnet.com">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>{{$data->product_name}}</h4>
                            <h4>{{$data->description}}</h4>
                            <h5>Rs: {{$data->price_per_unit}}</h5>
                            <a href="product/{{$data->id}}" class="btn btn-success btn-block">See More</a>
                        </div>
                    </div>
    </div>
    @endforeach
  </div>
</div>
</body>
</html> 