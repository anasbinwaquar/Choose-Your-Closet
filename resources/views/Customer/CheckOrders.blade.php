
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Customer Portal</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
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
                                        <th>Seller Contact Number</th>
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
                                      </tr>
                                    @endforeach
                                </tbody>
                            </table>
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