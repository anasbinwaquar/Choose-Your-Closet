<!DOCTYPE html>
<html>
<head>
	<title>Seller Portal</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body style="background: #108dc7;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #ef8e38, #108dc7);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #ef8e38, #108dc7); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
@csrf
<h1 style="color:#ffffff;">WELCOME {{session('data')['Username']}}</h1>
<a href="ListProduct"><button type="button" class="btn btn-primary btn-lg btn-block">ADD PRODUCT</button></a>


<a href="SellerLogout"><button type="button" class="btn btn-primary btn-lg btn-block">LOGOUT</button></a>

</body>
</html>