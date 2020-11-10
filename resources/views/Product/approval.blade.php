  <!DOCTYPE html>
<html>
<head>
  <title>Admin Portal</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
   @csrf
   <table class="table table-striped table-dark">
    <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Product Image</th>
      <th scope="col">Clothing Type</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($product as $product)
    <tr>
      <th>{{$product->product_name}}</th>
      <th>{{$product->price_per_unit}}</th>
      <th>{{$product->description}}</th>
      <td><img src="{{asset('uploads/sell/'. $product->product_image)}}" style="width: 20rem;height: 10rem"></td>  
      <th>{{$product->clothing_type}}</th>

      <th><a href="set_product_approval/{{$product->id}}"><button class="btn btn-success">Approve</button></a></th>
      <th><a href="decline_product_approval/{{$product->id}}"><button class="btn btn-danger">Decline</button></a></th>
    </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>