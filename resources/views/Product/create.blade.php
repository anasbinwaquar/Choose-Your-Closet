<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Seller Portal</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link " href="ListProduct"><i class="fas fa-tachometer-alt"></i><span>Add Product</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="DeleteProduct"><i class="fas fa-tachometer-alt"></i><span>Delete Product</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="RentalProduct"><i class="fas fa-tachometer-alt"></i><span>Add Rental Product</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="SellerLogout"><i class="fas fa-user"></i><span>Logout</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <h3 class="text-dark mb-2">Seller Dashboard</h3>
                          <!--   </div> -->
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                    </ul>
            </div>
            </nav>

<form class="form-horizontal justify-content-center" name="ProductForm" id="ProductForm" action="{{ route('CreateProduct')}}" method="post" enctype="multipart/form-data" autocomplete="off" style="margin-left: 30%;
    width:80em;">
  @csrf
<fieldset>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
  <div class="col-md-6">
  <input id="product_name" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md" required type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">PRODUCT DESCRIPTION</label>  
  <div class="col-md-6">
  <input id="description" name="description" placeholder="PRODUCT DESCRIPTION" class="form-control input-md" required type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="price_per_unit">PRODUCT PRICE PER UNIT</label>  
  <div class="col-md-6">
  <input id="price_per_unit" name="price_per_unit" placeholder="PRODUCT PRICE PER UNIT" class="form-control input-md" required type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="sizes">SIZES</label>  
  <div class="col-md-6">
      <input type="checkbox" class="s1" id="sizes[]" name="sizes[]" value="Small"/> <label for="Small">Small</label>
      <input type="checkbox" class="s2" id="sizes[]" name="sizes[]" value="Medium" /> <label for="Medium">Medium</label>
      <input type="checkbox" class="s3" id="sizes[]" name="sizes[]" value="Large" /> <label for="Large">Large</label>
      <input type="checkbox" class="s4" id="sizes[]" name="sizes[]" value="Extra Large" /> <label for="Extra Large">Extra Large</label>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="quantity_small">QUANTITY FOR SMALL</label>  
  <div class="col-md-6">
  <input id="quantity_small" name="quantity_small" placeholder="QUANTITY FOR SMALL" class="form-control input-md"  disabled type="text" value="0">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="quantity_medium">QUANTITY FOR MEDIUM</label>  
  <div class="col-md-6">
  <input id="quantity_medium" name="quantity_medium" placeholder="QUANTITY FOR MEDIUM" class="form-control input-md" t disabled type="text" value="0">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="quantity_large">QUANTITY FOR LARGE</label>  
  <div class="col-md-6">
  <input id="quantity_large" name="quantity_large" placeholder="QUANTITY FOR LARGE" class="form-control input-md"  disabled type="text" value="0">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="quantity_extra_large">QUANTITY FOR EXTRA LARGE</label>  
  <div class="col-md-6">
  <input id="quantity_extra_large" name="quantity_extra_large" placeholder="QUANTITY FOR EXTRA LARGE" class="form-control input-md" disabled type="text" value="0">
    
  </div>
</div>



<div class="form-group">
  <label class="col-md-4 control-label" for="clothing_type">CLOTHING TYPE</label>
  <div class="col-md-6">
    <select id="clothing_type" name="clothing_type" class="form-control" id="clothing_type" required>
    <option selected>CHOOSE...</option>
    <option value="Pant">Pant</option>
    <option value="T-Shirt">T-Shirt</option>
    <option value="Full sleeves shirt">Full sleeves shirt</option>
    <option value="Kurta">Kurta</option>
    <option value="Kurti">Kurti</option>
    <option value="Bridal Wear">Bridal Wear</option>
    <option value="Kids">Kids wear</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="gender">CLOTHING GENDER</label>
  <div class="col-md-6">
    <select id="gender_type" name="gender_type" class="form-control" required>
    <option selected>CHOOSE...</option>
     <option value="Male">Male</option>
     <option value="Female">Female</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="category">PRODUCT CATEGORY</label>
  <div class="col-md-6">
    <select id="category" name="category" class="form-control" required>
    <option selected>CHOOSE...</option>
    <option value="Formal">Formal</option>
    <option value="Informal">Informal</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">PRODUCT IMAGES</label>
  <div class="col-md-6">
    <input id="product_image" name="product_image" class="input-file col-md-6" type="file" accept="image/*" multiple required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Submit"></label>
  <div class="col-md-6">
    <button id="Submit" name="Submit" type="submit" class="btn btn-primary col-md-12" required>SUBMIT</button>
  </div>
  </div>
</fieldset>
</form>
        </div>
        </div>
      </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>

    <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Brand 2020</span></div>
            </div>
        </footer>
</body>


  <script type="text/javascript">
    $(function(){
    $("#Submit").click(function(e){
        var valid=0;
        if($("#quantity_small").val()!="" ||$("#quantity_medium").val()!="" ||$("#quantity_large").val()!="" ||$("#quantity_extra_large").val()!="" ){

        }
        else{
          alert("Please fill atleast one quantity field");
          e.preventDefault();
        }
    });
    $(".s1").click(function(){
        if($(this).prop("checked")==true){
           $("#quantity_small").prop("disabled", false);
           return;
        }
          $("#quantity_small").val("");
          $("#quantity_small").prop("disabled", true);
    })
    $(".s2").click(function(){
        if($(this).prop("checked")==true){
           $("#quantity_medium").prop("disabled", false);
           return;
        }
          $("#quantity_medium").val("");
          $("#quantity_medium").prop("disabled", true);
    })
    $(".s3").click(function(){
        if($(this).prop("checked")==true){
           $("#quantity_large").prop("disabled", false);
           return;
        }
          $("#quantity_large").val("");
          $("#quantity_large").prop("disabled", true);
    })
    $(".s4").click(function(){
        if($(this).prop("checked")==true){
           $("#quantity_extra_large").prop("disabled", false);
           return;
        }
          $("#quantity_extra_large").val("");
          $("#quantity_extra_large").prop("disabled", true);
    })

});

  </script>
</html>