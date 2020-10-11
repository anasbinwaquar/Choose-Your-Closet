<h1>hi</h1>
<form action="CreateProduct" method="post" enctype="multipart/form-data">
	@csrf
    <div>
    	<label for="username">Product Name:</label>
    	<input type="text" name="product_name" id="product_name" value="" required>
    </div>
    <div>
    	<label for="username">Product Price Per Unit:</label>
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