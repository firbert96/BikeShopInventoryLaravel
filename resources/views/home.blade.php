@extends('layout.master')
@section('title')
    Bike Shop Inventory
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
    .dropdownColor{
        background-color:AliceBlue;
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
                        <h5 class="m-0 font-weight-bold text-primary">Table Inventory</h5>
                    </div>
                    
                    <div class="card-body">
                        <!-- <form method="get" action="/"> -->
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <input type="text" name="input_search" id="input_search" class="form-control form-control-user" placeholder="Search Product Name" value="">      
                            </div>
                            <div class="col-lg-6 col-md-4">
                                <button type="submit" id="btnSearch" class="btn btn-success btn-icon-split"><span class="text">Search</span></button>
                            </div>
                        </div>
                        <!-- </form> -->
                        <br>
                        <br>
                        <div class="table-responsive">
                            <form>
                            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
                            <div id="productNotFound"></div>
                            <table class="table" id="tableInventory" width="100%" cellspacing="0">
                                <thead id="theadInventory">
                                </thead>
                                <tbody id="tbodyInventory">
                                </tbody>
                            </table>
                            <div style="float:right" >
                                <table id="paginationInventory">
                                </table>
                                <nav>
                                    <ul class='pagination' id="btnPage">
                                    </ul>
                                </nav>
                            </div>
                            </form>
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
        function pageLoad(page){
            let newPage = page;
            let input_search = $('#input_search').val();
            var api_url = "{{env('API_URL')}}";
            $.ajax({
                type:"GET",
                url:api_url+"/inventory/showInventory?page="+newPage+"&input_search="+input_search,
                success: function(response)
                {
                    let responseLength = response.total;
                    let num = 1;
                    let product = '';
                    let date = '';
                    $('#productNotFound').html('');
                    $('#theadInventory').html('');
                    $('#tbodyInventory').html('');
                    $('#paginationInventory').html('');
                    $('#btnPage').html('');
                    if(responseLength>0){
                        $('#tableInventory').addClass('table-bordered');
                        $('#theadInventory').append(
                            "<th class='center'>No</th>"+ 
                            "<th class='center'>Product Name</th>"+ 
                            "<th class='center'>Product</th>"+
                            "<th class='center'>Quantity</th>"+ 
                            "<th class='center'>Auditor Name</th>"+
                            "<th class='center'>Auditor Email</th>"+
                            "<th class='center'>Action</th>"
                        );
                        $.each(response.data, function(key, val){    
                            product = (val.product == 0 ) ? 'Sparepart' : 'Bicycle';
                            $('#tbodyInventory').append(
                                "<tr>"+
                                    "<td class='center'>"+num+"</td>"+
                                    "<td class='center'>"+val.product_name+"</td>"+
                                    "<td class='center'>"+product+"</td>"+
                                    "<td class='center'>"+val.quantity+"</td>"+
                                    "<td class='center'>"+val.fullname+"</td>"+
                                    "<td class='center'>"+val.email+"</td>"+
                                    "<td class='center'>"+
                                        "<a href='editProduct?uuid="+val.uuid+"' class='btn btn-primary' style='margin:10px'>"+
                                            "<span class='text'>Edit Product</span>"+
                                        "</a>"+
                                        "<a href='editQuantity?uuid="+val.uuid+"' class='btn btn-warning' style='margin:10px'>"+
                                            "<span class='text'>Edit Quantity</span>"+
                                        "</a>"+
                                        "<button id='"+val.uuid+"' class='btn btn-danger deleteId' style='margin:10px''>"+
                                            "<span class='text'>Delete Product</span>"+
                                        "</button>"+
                                    "</td>"+
                                "</tr>"   
                            );
                            num++;
                        });
                        $('#paginationInventory').append(
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
                                $('#btnPage').append(
                                    "<li class='page-item' id='page-"+i+"' onclick=pageLoad("+i+")>"+
                                        "<a class='page-link'>"+i+"</a>"+
                                    "</li>"
                                );       
                            }
                            $('.page-item').removeClass('active');
                            $('#page-'+newPage).addClass(' active');
                        }
                    }
                    else{
                        $('#tableInventory').removeClass('table-bordered');
                        $('#productNotFound').append("<h3 class='center'>Product not found</h3>");
                    }
                }
            });
        }

        $(document).ready(function(){       
            pageLoad(1);

            $(document).on('click', '.deleteId', null, function (e) {
                e.preventDefault();
                let uuid = $(this).prop('id');
                let _token = $('#token').val();
                var api_url = "{{env('API_URL')}}";
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "DELETE",
                            url: api_url+'/inventory?uuid='+uuid,
                            data:{
                                _token
                            },
                            success: function(response)
                            {
                                Swal.fire(
                                    'Deleted!',
                                    response,
                                    'success'
                                )
                            },
                            error:function(error){
                                alert(errorOutput(error.responseJSON));
                            }
                        })
                        .done(function(){ 
                            pageLoad(1);
                        });
                    }
                });
            });

            $('#btnSearch').click(function(e){
                e.preventDefault();
                pageLoad(1);
            });

            $('#userDropdown').hover(function(){
                $('#userDropdown').addClass("blue");
            },
            function(){
                $('#userDropdown').removeClass("blue");
            });

        });
    </script>

</body>
@endsection