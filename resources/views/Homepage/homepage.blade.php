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
  <div class="row justify-content-between">
    @foreach($data as $data)
     <div class="col-lg-4 col-offset-12 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                             <img class="card-img-top" src="{{asset('uploads/sell/'. $data->product_image)}}" alt="Card image cap" style="height:250px;">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li></ul>
                                <a class="cart" href="#">Add to Cart</a>
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