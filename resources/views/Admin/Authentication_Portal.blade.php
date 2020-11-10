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
      <th scope="col">Seller ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Website Name</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Username</th>
      <th scope="col">CNIC</th>
      <th scope="col">Approval</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($authentication as $authentication)
    <tr>
      <th>{{$authentication->id}}</th>
      <th>{{$authentication->First_Name}}</th>
      <th>{{$authentication->Last_Name}}</th>
      <td>{{$authentication->Email}}</td>	
      <th>{{$authentication->Phone_Number}}</th>
      <th>{{$authentication->Website_Name}}</th>
      <th>{{$authentication->Brand_Name}}</th>
      <th>{{$authentication->Username}}</th>
      <th>{{$authentication->CNIC}}</th>
      <th><a href="setapproval/{{$authentication->id}}"><button class="btn btn-success">Approve</button></a></th>
      <th><a href="declineapproval/{{$authentication->id}}"><button class="btn btn-danger">Decline</button></a></th>
    </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>