<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Custom Orders - Choose Your Closet</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="icon" href="{{asset('images/Closet.png')}}">

<style>
    
    .active{
        font-weight: bold;
    }

    ::selection
    {
        background-color: #000000;
        color: #ffffff;
    }

</style>

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
                    <li class="nav-item"><a class="nav-link" href="deleteprint"><i class="fas fa-user-circle"></i><span>Delete Prints</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="custom_order"><i class="fas fa-user-circle"></i><span>Custom Orders</span></a></li>
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
                                <h3 class="text-dark mb-2">Custom Orders</h3>
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
                                        <th>Front View</th>
                                        <th>Back View</th>
                                        <th>Price</th>
                                        <th>Size</th>
                                        <th>Address</th>
                                        <th>Contact Number</th>
                                    </tr>
                                </thead>
                                  <tbody>
                                    @foreach ($orders as $order)
                                      <tr>
                                        @php
                                        $str= urlencode($order->image_front);
                                        // echo ($str); 
                                        @endphp
                                        <th>{{$order->id}}</th>

                                        <th><img src="{{$order->image_front}}" style="width: 300px; height: 300px" > </th>
                                        <th><img src="{{$order->image_back}}" style="width: 300px; height: 300px"></a></th>
                                        {{-- <th><a href="/image" >Front View</a></th>

                                        <th><a href="{{$order->image_back}}">Back View</a></th> --}}
                                        <td>{{$order->price}}</td> 
                                        <th>{{$order->size}}</th>
                                        <th>{{$order->address}}</th>
                                        <th>{{$order->contact_number}}</th>
                                        {{-- <th><a href="setapproval/{{$authentication->id}}"><button class="btn btn-success">Approve</button></a></th> --}}
                                        {{-- <th><a href="declineapproval/{{$authentication->id}}"><button class="btn btn-danger">Decline</button></a></th> --}}
                                      </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

 
</script>
</html>

