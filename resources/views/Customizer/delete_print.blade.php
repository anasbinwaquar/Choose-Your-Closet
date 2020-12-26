

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Delete Prints - Choose Your Closet</title>
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
                    <li class="nav-item"><a class="nav-link " href="Product_approval"><i class="fas fa-table"></i><span>Product Verifcation</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="addprints"><i class="fas fa-user-circle"></i><span>Add Prints</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="deleteprint"><i class="fas fa-user-circle"></i><span>Delete Prints</span></a></li>
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
                                <h3 class="text-dark mb-2">Delete Prints</h3>
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
                                        <th>Print Name</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                  <tbody>
                                    @if($prints->isEmpty())
                                    <th><p style="margin-left: 75%;">NO PRINTS ADDED</p></th>
                                    @elseif($prints!=NULL)  
                                    @foreach ($prints as $print)
                                      <tr>
                                        <th>{{$print->name}}</th>
                                        <th>{{$print->price}}</th>
                                        <th><img src="{{ asset('templates/' . $print->image) }}" style="width: 100px; height: 100px"></th>
                                        <th><a href="delete_print/{{$print->id}}"><button class="btn btn-success">Delete</button></a></th>
                                      </tr>
                                      @endforeach
                                    @endif
                                </tbody>
                            </table>
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

