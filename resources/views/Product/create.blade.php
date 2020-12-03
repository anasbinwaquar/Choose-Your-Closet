<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


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
    <title>Add Products</title>

<style type="text/css">
    body {
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
} 

h1{
    text-align: center;
    font-family: Arial, sans-serif, Helvetica;
}
</style>

</head>

<body style="overflow-x: hidden;">
  <!------ Include the above in your HEAD tag ---------->

<form class="form-horizontal justify-content-center" name="ProductForm" id="ProductForm" action="{{ route('CreateProduct')}}" method="post" enctype="multipart/form-data">
  @csrf
<fieldset>

<!-- Form Name -->
<legend><h1>LIST PRODUCTS</h1></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
  <div class="col-md-4">
  <input id="product_name" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md" required type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">PRODUCT DESCRIPTION</label>  
  <div class="col-md-4">
  <input id="description" name="description" placeholder="PRODUCT DESCRIPTION" class="form-control input-md" required type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="price_per_unit">PRODUCT PRICE PER UNIT</label>  
  <div class="col-md-4">
  <input id="price_per_unit" name="price_per_unit" placeholder="PRODUCT PRICE PER UNIT" class="form-control input-md" required type="text">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="quantity_small">QUANTITY FOR SMALL</label>  
  <div class="col-md-4">
  <input id="quantity_small" name="quantity_small" placeholder="QUANTITY FOR SMALL" class="form-control input-md" required type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="quantity_medium">QUANTITY FOR MEDIUM</label>  
  <div class="col-md-4">
  <input id="quantity_medium" name="quantity_medium" placeholder="QUANTITY FOR MEDIUM" class="form-control input-md" required type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="quantity_large">QUANTITY FOR LARGE</label>  
  <div class="col-md-4">
  <input id="quantity_large" name="quantity_large" placeholder="QUANTITY FOR LARGE" class="form-control input-md" required type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="quantity_extra_large">QUANTITY FOR EXTRA LARGE</label>  
  <div class="col-md-4">
  <input id="quantity_extra_large" name="quantity_extra_large" placeholder="QUANTITY FOR EXTRA LARGE" class="form-control input-md" required type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="sizes">SIZES</label>  
  <div class="col-md-4">
      <input type="checkbox" class="s1" id="sizes[]" name="sizes[]" value="Small"/> <label for="Small">Small</label>
      <input type="checkbox" class="s2" id="sizes[]" name="sizes[]" value="Medium" /> <label for="Medium">Medium</label>
      <input type="checkbox" class="s3" id="sizes[]" name="sizes[]" value="Large" /> <label for="Large">Large</label>
      <input type="checkbox" class="s4" id="sizes[]" name="sizes[]" value="Extra Large" /> <label for="Extra Large">Extra Large</label>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="clothing_type">CLOTHING TYPE</label>
  <div class="col-md-4">
    <select id="clothing_type" name="clothing_type" class="form-control" id="clothing_type" required>
    <option selected>CHOOSE...</option>
    <option value="Pant">Pant</option>
    <option value="T-Shirt">T-Shirt</option>
    <option value="Kurta">Kurta</option>
    <option value="Kurti">Kurti</option>
    <option value="Bridal Wear">Bridal Wear</option>
    <option value="Kids">Kids wear</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="gender">CLOTHING GENDER</label>
  <div class="col-md-4">
    <select id="gender_type" name="gender_type" class="form-control" required>
    <option selected>CHOOSE...</option>
     <option value="Male">Male</option>
     <option value="Female">Female</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="category">PRODUCT CATEGORY</label>
  <div class="col-md-4">
    <select id="category" name="category" class="form-control" required>
    <option selected>CHOOSE...</option>
    <option value="Formal">Formal</option>
    <option value="Informal">Informal</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="rental">SET IT UP FOR RENTAL?</label>
  <div class="col-md-4">
    <select id="rental" name="rental" class="form-control">
    <option selected>CHOOSE...</option>
    <option value="1">Yes</option>
    <option value="0">No</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="available_quantity">QUANTITIES FOR RENTAL</label>  
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="rquantity_small">QUANTITY FOR SMALL</label>  
  <div class="col-md-4">
  <input id="rquantity_small" name="rquantity_small" placeholder="QUANTITY FOR SMALL" class="form-control input-md" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="rquantity_medium">QUANTITY FOR MEDIUM</label>  
  <div class="col-md-4">
  <input id="rquantity_medium" name="rquantity_medium" placeholder="QUANTITY FOR MEDIUM" class="form-control input-md" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="rquantity_large">QUANTITY FOR LARGE</label>  
  <div class="col-md-4">
  <input id="rquantity_large" name="rquantity_large" placeholder="QUANTITY FOR LARGE" class="form-control input-md" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="rquantity_extra_large">QUANTITY FOR EXTRA LARGE</label>  
  <div class="col-md-4">
  <input id="rquantity_extra_large" name="rquantity_extra_large" placeholder="QUANTITY FOR EXTRA LARGE" class="form-control input-md" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="sizes">SIZES</label>  
  <div class="col-md-4">
      <input type="checkbox" class="s1" id="sizes[]" name="sizes[]" value="Small"/> <label for="Small">Small</label>
      <input type="checkbox" class="s2" id="sizes[]" name="sizes[]" value="Medium" /> <label for="Medium">Medium</label>
      <input type="checkbox" class="s3" id="sizes[]" name="sizes[]" value="Large" /> <label for="Large">Large</label>
      <input type="checkbox" class="s4" id="sizes[]" name="sizes[]" value="Extra Large" /> <label for="Extra Large">Extra Large</label>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="charges">DAILY CHARGES</label>  
  <div class="col-md-4">
  <input id="charges" name="charges" placeholder="DAILY CHARGES" class="form-control input-md" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">PRODUCT IMAGES</label>
  <div class="col-md-4">
    <input id="product_image" name="product_image" class="input-file" type="file"  multiple required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Submit">Submit Button</label>
  <div class="col-md-4">
    <button id="Submit" name="Submit" type="submit" class="btn btn-primary" required>SUBMIT</button>
  </div>
  </div>

</fieldset>
</form>


</body>

</html>