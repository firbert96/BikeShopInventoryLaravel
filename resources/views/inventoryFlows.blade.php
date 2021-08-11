@extends('layout.master')
@section('title')
    Inventory Flows
@endsection
@section('css')
<style>
    .blue{              
        border: 3px solid blue;
        border-radius: 20px;
        margin: 5px;
    }
    .center{
        text-align: center;
    }
    .spaceVertical{
        padding: 1%;
    }
    .spanGreen{
        color:green;
    } 
    .spanRed{
        color:red;
    }
    .spanBlue{
        color:blue;
    }
</style>
@endsection
@section('content')
<body id="page-top">       
    <!-- template -->

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Bike Shop Inventory</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="/inventoryFlows">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Table Inventory Flows</span></a>
        </li>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="createProduct">
            <i class="fa fa-list-alt"></i>
            <span>Create New Product</span></a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                                </div>
                            </div>
                            </form>
                        </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow ">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <table>
                            <tr>
                                <td><span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $fullname }}</span></td>
                            </tr>
                            <tr>
                                <td><span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $email }}</span></td>
                            </tr>
                        </table>    

                            <img class="img-profile rounded-circle" src="{{url('template/img/user.jpg')}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ url('editUser') }}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Edit User
                            </a>
                            <a class="dropdown-item" href="{{ url('changePassword') }}">
                            <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                            Change Password User
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                            </a>
                        </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Table Inventory Flows</h5>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">                                
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="buyer-tab" data-toggle="tab" href="#buyer" role="tab" aria-controls="Buyer" aria-selected="true">Buyer</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="supplier-tab" data-toggle="tab" href="#supplier" role="tab" aria-controls="Supplier" aria-selected="false">Supplier</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="Product" aria-selected="false">Detail Product</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
                                    <div class="tab-pane fade show active" id="buyer" role="tabpanel" aria-labelledby="buyer-tab">
                                        <div class="spaceVertical">
                                            <h6 class="m-0 font-weight-bold text-primary">Buyer</h6>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-8">
                                                    <input type="text" id="input_search_buyer" class="form-control form-control-user" placeholder="Search Product Name for Buyer" value="">      
                                                </div>
                                                <div class="col-lg-6 col-md-4">
                                                    <button type="submit" id="btnSearchBuyer" class="btn btn-success btn-icon-split"><span class="text">Search</span></button>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            
                                            <div class="table-responsive">
                                                <div id="productNotFoundBuyer"></div>
                                                <table class="table" id="tableBuyer" width="100%" cellspacing="0">
                                                    <thead id="theadBuyer">
                                                    </thead>
                                                    <tbody id="tbodyBuyer">
                                                    </tbody>
                                                </table>
                                                <div style="float:right" >
                                                    <table id="paginationBuyer">
                                                    </table>
                                                    <nav>
                                                        <ul class='pagination' id="btnPageBuyer">
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="supplier" role="tabpanel" aria-labelledby="supplier-tab">
                                        <div class="spaceVertical">      
                                            <h6 class="m-0 font-weight-bold text-primary">Supplier</h6>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-8">
                                                    <input type="text" id="input_search_supplier" class="form-control form-control-user" placeholder="Search Product Name for Supplier" value="">      
                                                </div>
                                                <div class="col-lg-6 col-md-4">
                                                    <button type="submit" id="btnSearchSupplier" class="btn btn-success btn-icon-split"><span class="text">Search</span></button>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            
                                            <div class="table-responsive">
                                                <div id="productNotFoundSupplier"></div>
                                                <table class="table" id="tableSupplier" width="100%" cellspacing="0">
                                                    <thead id="theadSupplier">
                                                    </thead>
                                                    <tbody id="tbodySupplier">
                                                    </tbody>
                                                </table>
                                                <div style="float:right" >
                                                    <table id="paginationSupplier">
                                                    </table>
                                                    <nav>
                                                        <ul class='pagination' id="btnPageSupplier">
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="product-tab">
                                        <div class="spaceVertical">    
                                            <h6 class="m-0 font-weight-bold text-primary">Detail Product</h6>
                                            <br>
                                            
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="list-group" id="tabProduct">
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="tab-content" id="tabContentProduct">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{ url('logout') }}">Logout</a>
            </div>
        </div>
        </div>
    </div>

    <script>
        function showDetail(id){
            alert(id);
            let uuid = id;
            $('#content -'+uuid).addClass('show active');
        }

        function pageLoadBuyer(page){
            let newPage = page;
            let input_search_buyer = $('#input_search_buyer').val();
            $.ajax({
                type:"GET",
                url:"http://localhost:8000/inventory_flows/showBuyer?page="+newPage+"&input_search_buyer="+input_search_buyer,
                success: function(response)
                {
                    let responseLength = response.total;
                    let num = 1;
                    let product = '';
                    let date = '';
                    $('#productNotFoundBuyer').html('');
                    $('#theadBuyer').html('');
                    $('#tbodyBuyer').html('');
                    $('#paginationBuyer').html('');
                    $('#btnPageBuyer').html('');
                    if(responseLength>0){
                        $('#tableBuyer').addClass('table-bordered');
                        $('#theadBuyer').append(
                            "<th class='center'>No</th>"+ 
                            "<th class='center'>Product Name</th>"+ 
                            "<th class='center'>Product</th>"+
                            "<th class='center'>Quantity</th>"+ 
                            "<th class='center'>Auditor Name</th>"+
                            "<th class='center'>Auditor Email</th>"+
                            "<th class='center'>Buyer Name</th>"
                        );
                        $.each(response.data, function(key, val){    
                            product = (val.product == 0 ) ? 'Sparepart' : 'Bicycle';
                            $('#tbodyBuyer').append(
                                "<tr>"+
                                    "<td class='center'>"+num+"</td>"+
                                    "<td class='center'>"+val.product_name+"</td>"+
                                    "<td class='center'>"+product+"</td>"+
                                    "<td class='center'>"+val.quantity+"</td>"+
                                    "<td class='center'>"+val.fullname+"</td>"+
                                    "<td class='center'>"+val.email+"</td>"+
                                    "<td class='center'>"+val.changer_name+"</td>"+
                                "</tr>"   
                            );
                            num++;
                        });
                        $('#paginationBuyer').append(
                            "<tr>"+
                                "<td>Current Page </td>"+
                                "<td>: "+response.current_page+"</td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>Total Page </td>"+
                                "<td>: "+response.total+"</td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>Data per Page </td>"+
                                "<td>: "+response.per_page+"</td>"+
                            "</tr>"
                        );
                        if(response.last_page>1){   
                            for(let i=1;i<=response.last_page;i++){
                                $('#btnPageBuyer').append(
                                    "<li class='page-item cPageBuyer' id='pageBuyer-"+i+"'  onclick=pageLoadBuyer("+i+")>"+
                                        "<a class='page-link'>"+i+"</a>"+
                                    "</li>"
                                );
                            }
                            $('.cPageBuyer').removeClass('active');
                            $('#pageBuyer-'+newPage).addClass(' active');
                        }
                    }
                    else{
                        $('#tableBuyer').removeClass('table-bordered');
                        $('#productNotFoundBuyer').append("<h3 class='center'>Product not found</h3>");
                    }
                }
            });
        }

        function pageLoadSupplier(page){
            let newPage = page;
            let input_search_supplier = $('#input_search_supplier').val();
            $.ajax({
                type:"GET",
                url:"http://localhost:8000/inventory_flows/showSupplier?page="+newPage+"&input_search_supplier="+input_search_supplier,
                success: function(response)
                {
                    let responseLength = response.total;
                    let num = 1;
                    let product = '';
                    let date = '';
                    $('#productNotFoundSupplier').html('');
                    $('#theadSupplier').html('');
                    $('#tbodySupplier').html('');
                    $('#paginationSupplier').html('');
                    $('#btnPageSupplier').html('');
                    if(responseLength>0){
                        $('#tableSupplier').addClass('table-bordered');
                        $('#theadSupplier').append(
                            "<th class='center'>No</th>"+ 
                            "<th class='center'>Product Name</th>"+ 
                            "<th class='center'>Product</th>"+
                            "<th class='center'>Quantity</th>"+ 
                            "<th class='center'>Auditor Name</th>"+
                            "<th class='center'>Auditor Email</th>"+
                            "<th class='center'>Supplier Name</th>"
                        );
                        $.each(response.data, function(key, val){    
                            product = (val.product == 0 ) ? 'Sparepart' : 'Bicycle';
                            $('#tbodySupplier').append(
                                "<tr>"+
                                    "<td class='center'>"+num+"</td>"+
                                    "<td class='center'>"+val.product_name+"</td>"+
                                    "<td class='center'>"+product+"</td>"+
                                    "<td class='center'>"+val.quantity+"</td>"+
                                    "<td class='center'>"+val.fullname+"</td>"+
                                    "<td class='center'>"+val.email+"</td>"+
                                    "<td class='center'>"+val.changer_name+"</td>"+
                                "</tr>"   
                            );
                            num++;
                        });
                        $('#paginationSupplier').append(
                            "<tr>"+
                                "<td>Current Page </td>"+
                                "<td>: "+response.current_page+"</td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>Total Page </td>"+
                                "<td>: "+response.total+"</td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>Data per Page </td>"+
                                "<td>: "+response.per_page+"</td>"+
                            "</tr>"
                        );
                        if(response.last_page>1){   
                            for(let i=1;i<=response.last_page;i++){
                                $('#btnPageSupplier').append(
                                    "<li class='page-item cPageSupplier' id='pageSupplier-"+i+"' onclick=pageLoadSupplier("+i+")>"+
                                        "<a class='page-link'>"+i+"</a>"+
                                    "</li>"
                                );
                            }
                            $('.cPageSupplier').removeClass('active');
                            $('#pageSupplier-'+newPage).addClass(' active');
                        }
                    }
                    else{
                        $('#tableSupplier').removeClass('table-bordered');
                        $('#productNotFoundSupplier').append("<h3 class='center'>Product not found</h3>");
                    }
                }
            });
        }

        function pageLoadDetailProduct(){
            $.ajax({
                type:"GET",
                url:"http://localhost:8000/inventory/showDetailProduct",
                success: function(response)
                {
                    $('#tabProduct').html('');
                    $('#tabContentProduct').html('');
                    let changer = '';
                    let uuid = '';
                    let quantity = '';
                    let firstTab = '';
                    let firstContent = '';
                    $.each(response, function(key, val){
                        uuid = val.uuid;
                        firstTab = (key == 0) ? 'active': '';
                        $('#tabProduct').append(
                        "<a class='list-group-item list-group-item-action "+firstTab+"' data-toggle='list' role='tab' id='"+uuid+"'>"+
                            val.product_name+" ("+val.quantity+")"+
                        "</a>"
                        );
                        firstContent = (key == 0) ? 'show active': '';
                        $('#tabContentProduct').append(
                        "<div class='tab-pane fade tabContent "+firstContent+"' id='tabContent-"+uuid+"' role='tabpanel'>"+
                            "<table class='table' width='100%' cellspacing='0'>"+
                                "<thead>"+
                                    "<th>Last quantity</th>"+
                                    "<th>Last updated by</th>"+
                                    "<th>Email</th>"+
                                "</thead>"+
                                "<tbody>"+
                                    "<td><span class='spanBlue'>"+val.quantity+"</span></td>"+
                                    "<td>"+val.fullname+"</td>"+
                                    "<td>"+val.email+"</td>"+
                                "</tbody>"+
                            "</table>"+
                            "<br>"+
                            "<br>"+
                            "<table class='table' width='100%' cellspacing='0'>"+
                                "<thead>"+
                                    "<th>History Quantity</th>"+
                                    "<th>Buyer or Supplier Name</th>"+
                                    "<th>Buyer or Supplier</th>"+
                                "</thead>"+
                                "<tbody id='tbodyProduct-"+uuid+"'>"+
                                "</tbody>"+
                            "</table>"+
                        "</div>"
                        );
                        $.ajax({
                            type:"GET",
                            url:"http://localhost:8000/inventory_flows/showDetailProduct?uuid="+uuid,
                            success:function(responses){
                                $.each(responses, function(keys, vals){
                                    changer = (vals.changer == 0 ) ? 'Buyer' : 'Supplier';
                                    quantity = (vals.changer == 0 ) ? "<span class='spanRed'>- "+vals.quantity : "<span class='spanGreen'>+ "+vals.quantity;
                                    $('#tbodyProduct-'+val.uuid).append(
                                        "<tr>"+
                                            "<td>"+quantity+"</span></td>"+
                                            "<td>"+vals.changer_name+"</td>"+
                                            "<td>"+changer+"</td>"+
                                        "</tr>"
                                    );
                                });
                            }
                        });
                    });
                }
            });
        }

        $(document).ready(function(){
            pageLoadBuyer(1);
            pageLoadSupplier(1);
            pageLoadDetailProduct();
            $('#userDropdown').hover(function(){
                $('#userDropdown').addClass("blue");
            },
            function(){
                $('#userDropdown').removeClass("blue");
            });

            $(document).on('click', '.list-group-item-action', null, function (e) {
                e.preventDefault();
                $('.tabContent').removeClass('show active');
                let uuid = $(this).prop('id');
                $('#tabContent-'+uuid).addClass("show active");
            });

            $('#btnSearchBuyer').click(function(e){
                e.preventDefault();
                pageLoadBuyer(1);
            });

            $('#btnSearchSupplier').click(function(e){
                e.preventDefault();
                pageLoadSupplier(1);
            });
        });
    </script>

</body>
@endsection