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
                    <div class="sidebar-brand-icon " style="margin-top: 30px;"><img src="{{asset('images/Closet.png')}}" width="88px;"></div>
                   
                </a>
                <br>
                <br>
                 <div class="sidebar-brand-text mx-3" style="color: #fff; font-weight: bold;"><span>Choose Your Closet</span></div>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar" style="margin-top: 30%;">
                    <li class="nav-item"><a class="nav-link " href="/SellerProfile"><i class="fas fa-tachometer-alt"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="/ListProduct"><i class="fas fa-tachometer-alt"></i><span>Add Product</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="/DeleteProduct"><i class="fas fa-tachometer-alt"></i><span>Delete Product</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="/DeleteRentalProduct"><i class="fas fa-tachometer-alt"></i><span>Delete Rental Products</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="/UpdateQuantity"><i class="fas fa-tachometer-alt"></i><span>Update Product Quantity</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="/RentalProduct"><i class="fas fa-tachometer-alt"></i><span>Add Rental Product</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="/ViewOrders"><i class="fas fa-tachometer-alt"></i><span>View Orders</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="/ViewRentOrders"><i class="fas fa-tachometer-alt"></i><span>View Rent Orders</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="/ViewProducts"><i class="fas fa-tachometer-alt"></i><span>View Products</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="/CompletedOrders"><i class="fas fa-tachometer-alt"></i><span>Completed Orders</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/AddVoucher"><i class="fas fa-tachometer-alt"></i><span>Add Voucher</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="/DeleteVoucher"><i class="fas fa-tachometer-alt"></i><span>Delete Voucher</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="/AddEvent"><i class="fas fa-tachometer-alt"></i><span>Add Event Sale</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="/DeleteEvent"><i class="fas fa-tachometer-alt"></i><span>Delete Event Sale</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/SellerLogout"><i class="fas fa-user"></i><span>Logout</span></a></li>

                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <h3 class="text-dark mb-2">Add Rental Products</h3>
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

            <form class="form-horizontal justify-content-center" name="ProductForm" id="ProductForm" action="{{ route('CreateRentProduct')}}" method="post" enctype="multipart/form-data" autocomplete="off" style="margin-left: 30%;
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
  <input id="product_name" name="product_name" placeholder="PRODUCT NAME" value="{{old('product_name')}}" class="form-control input-md" required type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">PRODUCT DESCRIPTION</label>  
  <div class="col-md-6">
  <input id="description" name="description" placeholder="PRODUCT DESCRIPTION" value="{{old('description')}}" class="form-control input-md" required type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="sizes">SIZES</label>  
  <div class="col-md-6">
      <input type="radio" id="size" name="size" value="Small"/> <label>Small</label> 
      <input type="radio" id="size" name="size" value="Medium" /> <label >Medium</label>
      <input type="radio" id="size" name="size" value="Large" /> <label >Large</label>
      <input type="radio" id="size" name="size" value="Extra Large" /> <label>Extra Large</label>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="clothing_type">CLOTHING TYPE</label>
  <div class="col-md-6">
    <select id="clothing_type" name="clothing_type" class="form-control" id="clothing_type" required>
     <option value="Pant & Jeans">Pant & Jeans</option>
    <option value="T-Shirt">T-Shirt</option>
    <option value="Shirt">Shirt</option>
    <option value="Kurta Shalwar">Kurta Shalwar</option>
    <option value="Pret">Pret</option>
    <option value="Jeans">Jeans</option>
    <option value="3 Piece Suit">3 Piece Suit</option>
    <option value="Party Wear">Party Wear</option>
    <option value="Kids Wear">Kids Wear</option>
    <option value="Groom Wear">Groom Wear</option>
    <option value="Bridal Wear">Bridal Wear</option>
    <option value="Summer Wear">Summer Wear</option>
    <option value="Mid Summer Wear">Mid Summer Wear</option>
    <option value="Winter Wear">Winter Wear</option>
    <option value="Shoes">Shoes</option>
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
     <option value="Other">Other</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="category">PRODUCT CATEGORY</label>
  <div class="col-md-6">
    <select id="category" name="category" class="form-control" required>
    <option value="Formal">Formal</option>
    <option value="Informal">Informal</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="charges">SECURITY DEPOST</label>  
  <div class="col-md-6">
  <input id="security_deposit" name="security_deposit" required value="{{old('security_deposit')}}" class="form-control input-md" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="charges">DAILY CHARGES</label>  
  <div class="col-md-6">
  <input id="charges" name="charges" placeholder="DAILY CHARGES" required value="{{old('charges')}}" class="form-control input-md" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">PRODUCT IMAGES</label>
  <div class="col-md-6">
    <input id="product_image" name="product_image" class="input-file" type="file" accept="image/*" multiple required>
  </div>
</div>
<div class="form-group">
  <div class="col-md-6">
    <input id="product_image2" name="product_image2" class="input-file col-md-6" type="file" accept="image/*" >
  </div>
</div>
<div class="form-group">
  <div class="col-md-6">
    <input id="product_image3" name="product_image3" class="input-file col-md-6" type="file" accept="image/*">
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
</body>


</html>