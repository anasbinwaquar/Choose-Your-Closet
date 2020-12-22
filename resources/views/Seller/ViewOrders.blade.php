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
                    <li class="nav-item"><a class="nav-link " href="/ListProduct"><i class="fas fa-tachometer-alt"></i><span>Add Product</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="/DeleteProduct"><i class="fas fa-tachometer-alt"></i><span>Delete Product</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="/RentalProduct"><i class="fas fa-tachometer-alt"></i><span>Add Rental Product</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="/ViewProducts"><i class="fas fa-tachometer-alt"></i><span>View Products</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="/ViewOrders"><i class="fas fa-tachometer-alt"></i><span>View Orders</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="/CompletedOrders"><i class="fas fa-tachometer-alt"></i><span>Completed Orders</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/SellerLogout"><i class="fas fa-user"></i><span>Logout</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <h3 class="text-dark mb-2">Order View</h3>
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
                <div class="table-responsive table m-lg-auto mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Size</th>
                                        <th>Address</th>
                                        <th>Contact Number</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                  <tbody>
                                    @php
                                        $check=1;
                                        $price=0;
                                    @endphp
                                    @foreach (collect($data)->unique('OrderID') as $data)
                                      <tr>
                                        <th>{{ $data->OrderID }}</th>
                                        <th> @foreach($data2 as $d2)
                                                @if($d2->OrderID==$data->OrderID)
                                                {{ $d2->ProductID}}
                                                <br>
                                                    @php
                                                        $check=1
                                                    @endphp
                                                @else
                                                @php
                                                    $check=0;
                                                @endphp
                                                @endif
                                            @endforeach</th>
                                            <th> @foreach($data2 as $d2)
                                                @if($d2->OrderID==$data->OrderID)
                                                {{$d2->product_name}}
                                                <br>
                                                    @php
                                                        $check=1
                                                    @endphp
                                                @else
                                                @php
                                                    $check=0;
                                                @endphp
                                                @endif
                                            @endforeach</th>
                                            <th> @foreach($data2 as $d2)
                                                @if($d2->OrderID==$data->OrderID)
                                                {{$d2->Quantity}}
                                                <br>
                                                    @php
                                                        $check=1
                                                    @endphp
                                                @else
                                                @php
                                                    $check=0;
                                                @endphp
                                                @endif
                                            @endforeach</th>
                                            <th> @foreach($data2 as $d2)
                                                @if($d2->OrderID==$data->OrderID)
                                                {{$d2->Size}}
                                                <br>
                                                    @php
                                                        $check=1
                                                    @endphp
                                                @else
                                                @php
                                                    $check=0;
                                                @endphp
                                                @endif
                                            @endforeach</th>
                                        <th>{{ $data->Delivery_Address}}</th>
                                        <th> {{$data->Phone_Number}} </th>
                                        <th>
                                            @foreach($data2 as $d2)
                                                @if($d2->OrderID==$data->OrderID)
                                                {{$d2->Total}}
                                                @php
                                                    $price=$d2->Total+$price;
                                                @endphp
                                                <br>
                                                @endif
                                            @endforeach
                                            <br>
                                        Total: {{$price}}</th>  
                                        @php
                                         $price=0;
                                        @endphp 
                                        <th><a href="EndOrder/{{$data->OrderID}}"><button class="btn btn-success">Completed</button></a></th>
                                      </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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

        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Brand 2020</span></div>
            </div>
        </footer>
</html>