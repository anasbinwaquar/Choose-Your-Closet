<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script src="{{ asset('js/listproduct.js') }}" ></script>
<script type=text/javascript > 
        function func(){
            var att = document.createAttribute("disabled");
            if(document.getElementById('quantity_small').disabled = true){
                document.getElementById('quantity_small').disabled = false;
            }
            else{
                
                att.value="true";
                document.getElementById('quantity_small').setAttributeNode(att);
            }
        } 
         
    </script>
    <title>Hello, world!</title>

  </head>
  <body>
<div class="container">
	<h1>List Products</h1>
<form name="ProductForm" id="ProductForm" action="{{ route('CreateProduct')}}" method="post" enctype="multipart/form-data" class="justify-content-center">
	@csrf
    <div  >
    	<label >Product Name:</label>
    	<input type="text" name="product_name" id="product_name" value="" required>
    </div>
    <div>
        <label >Product Description:</label>
        <input type="text" name="description" id="description" value="" required>
    </div>
    <div>
    	<label >Product Price Per Unit:</label>
    	<input type="text" name="price_per_unit" id="price_per_unit" value="" required>
    </div>
    <div>
    	<label >Quantitiy for Small:</label>
    	<input type="text" class="q1" name="quantity_small" id="quantity_small" value="" >
    </div>
    <div>
        <label >Quantitiy for Medium:</label>
        <input type="text" class="q2" name="quantity_medium" id="quantity_medium" value="" >
    </div>
    <div>
        <label >Quantitiy for Large:</label>
        <input type="text" class="q3" name="quantity_large" id="quantity_large" value="" >
    </div>
    <div>
        <label >Quantitiy for Extra Large:</label>
        <input type="text" class="q4" name="quantity_extra_large" id="quantity_extra_large" value="" >
    </div>
    <div class="checkbox-group" id="checkbox-group">
    	<label  >Sizes:</label>
    	  <input type="checkbox" class="s1" id="sizes[]" name="sizes[]" value="Small"/> <label for="Small">Small</label>
		  <input type="checkbox" class="s2" id="sizes[]" name="sizes[]" value="Medium" /> <label for="Medium">Medium</label>
		  <input type="checkbox" class="s3" id="sizes[]" name="sizes[]" value="Large" /> <label for="Large">Large</label>
		  <input type="checkbox" class="s4" id="sizes[]" name="sizes[]" value="Extra Large" /> <label for="Extra Large">Extra Large</label>
    </div>

    <div>
    	<label>Choose the Clothing type:</label>
		  <select name="clothing_type" id="clothing_type" required>
		    <option value="Pant">Pant</option>
		    <option value="T-Shirt">T-Shirt</option>
		    <option value="Kurta">Kurta</option>
		    <option value="Kurti">Kurti</option>
		    <option value="Bridal Wear">Bridal Wear</option>
		    <option value="Kids">Kids</option>
		  </select>
    </div>
    <div>
        <label >Clothing Gender:</label>
          <select name="gender_type" id="gender_type" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
    </div>
    <div>
        <label >Category:</label>
          <select name="category" id="category" required>
            <option value="Formal">Formal</option>
            <option value="Informal">Informal</option>
          </select>
    </div>
    <div>
        <label >Do you want to set it up for Rental?:</label>
          <select name="rental" id="rental">
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
    </div>
    <div>
        <h3>Quantities for Rental</h3>
        <label >Quantitiy for Small:</label>
        <input type="text" class="q1" name="rquantity_small" id="rquantity_small" value="" >
    </div>
    <div>
        <label >Quantitiy for Medium:</label>
        <input type="text" class="q2" name="rquantity_medium" id="rquantity_medium" value="" >
    </div>
    <div>
        <label >Quantitiy for Large:</label>
        <input type="text" class="q3" name="rquantity_large" id="rquantity_large" value="" >
    </div>
    <div>
        <label >Quantitiy for Extra Large:</label>
        <input type="text" class="q4" name="rquantity_extra_large" id="rquantity_extra_large" value="" >
    </div>
    <div class="checkbox-group" id="checkbox-group">
        <label  >Sizes:</label>
          <input type="checkbox" class="s1" id="sizes[]" name="sizes[]" value="Small"/> <label for="Small">Small</label>
          <input type="checkbox" class="s2" id="sizes[]" name="sizes[]" value="Medium" /> <label for="Medium">Medium</label>
          <input type="checkbox" class="s3" id="sizes[]" name="sizes[]" value="Large" /> <label for="Large">Large</label>
          <input type="checkbox" class="s4" id="sizes[]" name="sizes[]" value="Extra Large" /> <label for="Extra Large">Extra Large</label>
    </div>
    <div>
        <label >Daily Charges:</label>
        <input type="text" name="charges" id="charges" value="" >
    </div>
    <div>
        <label for="files">Product Images:</label>
        <input type="file" id="product_image" name="product_image" multiple required><br><br>
        <input type="submit" required>
    </div>
</form>
</div>


  </body>
</html>