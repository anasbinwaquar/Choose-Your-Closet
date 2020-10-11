<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
<div class="container">
	<h1>List Products</h1>
<form action="CreateProduct" method="post" enctype="multipart/form-data" class="justify-content-center">
	@csrf
    <div  >
    	<label for="username">Product Name:</label>
    	<input type="text" name="product_name" id="product_name" value="" required>
    </div>

    <div>
    	<label for="username">Product gPrice Per Unit:</label>
    	<input type="text" name="price_per_unit" id="price_per_unit" value="" required>
    </div>
    <div>
    	<label for="username">Quantitiy:</label>
    	<input type="text" name="quantitiy" id="quantitiy" value="" required>
    </div>
    <div>
    	<label for="username">Product Description:</label>
    	<input type="text" name="description" id="description" value="" required>
    </div>
    <div>
    	<label for="username">Sizes:</label>
    	  <input type="checkbox" name="sizes[]" value="Small"/> <label for="Small">Small</label>
		  <input type="checkbox" name="sizes[]" value="Medium" /> <label for="Medium">Medium</label>
		  <input type="checkbox" name="sizes[]" value="Large" /> <label for="Large">Large</label>
		  <input type="checkbox" name="sizes[]" value="Extra Large" /> <label for="Extra Large">Extra Large</label>
    </div>
    <div>
    	<label for="wear_type">Choose the Clothing type:</label>
		  <select name="wear_type" id="wear_type">
		    <option value="Pant">Pant</option>
		    <option value="T-Shirt">T-Shirt</option>
		    <option value="Kurta">Kurta</option>
		    <option value="Kurti">Kurti</option>
		    <option value="Bridal Wear">Bridal Wear</option>
		    <option value="Kids">Kids</option>
		  </select>
    </div>
    <div>
    	<label for="files">Product Images:</label>
		<input type="file" id="product_image" name="product_image" multiple><br><br>
		<input type="submit">
    </div>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>