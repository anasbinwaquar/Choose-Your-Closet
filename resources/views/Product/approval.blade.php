<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Product Authentication - Choose Your Closet</title>
        <link rel="icon" href="{{asset('images/Closet.png')}}">
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
                    <li class="nav-item"><a class="nav-link " href="LoginAdminCheck"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="Seller_Authentication"><i class="fas fa-table"></i><span>Seller Verifcation</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="Product_approval"><i class="fas fa-table"></i><span>Product Verifcation</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="addprints"><i class="fas fa-user-circle"></i><span>Add Prints</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="deleteprint"><i class="fas fa-user-circle"></i><span>Delete Prints</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="custom_order"><i class="fas fa-user-circle"></i><span>Custom Orders</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="AdminLogout"><i class="fas fa-user-circle"></i><span>Logout</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <!-- <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..."> -->
                               <!--  <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div> -->
                                <h3 class="text-dark mb-2">Product Verifcation</h3>
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
            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Product Info</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                           <!--  <div class="col-md-6 text-nowrap">
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm"><option value="10" selected="">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>&nbsp;</label></div>
                            </div> -->
                            <!-- <div class="col-md-6">
                                <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                            </div> -->
                        </div>
                         @if($product -> isEmpty())
                         <p style="text-align: center;">NO PRODUCT TO VERIFY</p>           
                         @else
                        <div class="table-responsive table m-lg-auto mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Product Image</th>
                                        <th scope="col">Clothing Type</th>
                                        <th scope="col">Approe</th>
                                        <th scope="col">Disapprove</th>
                                    </tr>
                                </thead>
                                  <tbody>
                                       @foreach ($product as $product)
                                      <tr>
                                          <th>{{$product->product_name}}</th>
                                          <th>{{$product->price_per_unit}}</th>
                                          <th>{{$product->description}}</th>
                                          <td><img src="{{asset('uploads/sell/'. $product->product_image)}}" style="width: 20rem;height: 20rem"></td>  
                                          <th>{{$product->clothing_type}}</th>
                                          <th><a href="set_product_approval/{{$product->id}}"><button class="btn btn-success">Approve</button></a></th>
                                          <th><a href="decline_product_approval/{{$product->id}}"><button class="btn btn-danger">Decline</button></a></th>
                                      </tr>
                                      @endforeach
                                      @endif
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                </div>
            </div>
          </div>

            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Rental Product Info</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        </div>
                        @if($rent_product -> isEmpty())
                         <p style="text-align: center;">NO RENTAL PRODUCT TO VERIFY</p>           
                         @else
                        <div class="table-responsive table m-lg-auto mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Daily Charges</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Product Image</th>
                                        <th scope="col">Clothing Type</th>
                                        <th scope="col">Approe</th>
                                        <th scope="col">Disapprove</th>
                                    </tr>
                                </thead>
                                  <tbody>
                                       @foreach ($rent_product as $product)
                                      <tr>
                                          <th>{{$product->product_name}}</th>
                                          <th>{{$product->charges}}</th>
                                          <th>{{$product->description}}</th>
                                          <td><img src="{{asset('uploads/sell/'. $product->product_image)}}" style="width: 20rem;height: 20rem"></td>  
                                          <th>{{$product->clothing_type}}</th>
                                          <th><a href="set_rentproduct_approval/{{$product->id}}"><button class="btn btn-success">Approve</button></a></th>
                                          <th><a href="decline_rentproduct_approval/{{$product->id}}"><button class="btn btn-danger">Decline</button></a></th>
                                      </tr>
                                      @endforeach
                                      @endif
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
          </div>
        </div>
        </div>
        </div>

    <!-- </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div> -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>