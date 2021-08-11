@extends('layout.master')
@section('title')
    Edit Quantity Product
@endsection
@section('content')
<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Edit Quantity Product</h1>
                    </div>
                    <form class="user">
                    <input type="hidden" name="token" id="token" value="{{csrf_token()}}"> 
                        <div class="form-group">
                        <input type="number" class="form-control form-control-user" id="quantity" placeholder="Quantity" name="quantity" value="" required>
                        </div>
                        <div class="form-group">
                            <h5 style="display:inline-block"> Choose Changer : </h5>
                            <label class="radio-inline" for="sparepart">
                                <input type="radio" name="changer" id="buyer" value="0"> Buyer
                            </label>
                            <label class="radio-inline" for="bicycle">
                                <input type="radio" name="changer" id="supplier" value="1"> Supplier
                            </label>
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="changer_name" placeholder="Changer Name" name="changer_name" value="" required>
                        </div>
                        <input type="submit" name="submit" id="btnEdit" class="btn btn-primary btn-user btn-block" value="Edit">
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>

        </div>

        </div>

        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#btnEdit').click(function(e){
                e.preventDefault();
                var inventory_uuid = "{{$inventory_uuid}}";
                var user_uuid = "{{$user_uuid}}";
                var quantity = $('#quantity').val();
                var changer_name = $('#changer_name').val();
                var changer = $('input[name="changer"]:checked').val();
                var _token = $('#token').val();
                
                $.ajax({
                    url:'http://localhost:8000/inventory_flows',
                    type:'POST',                          
                    dataType: 'json',
                    data:{
                        inventory_uuid,
                        user_uuid,
                        quantity,
                        changer,
                        changer_name,
                        _token
                    },
                    success:function(response){
                        console.log(response);
                        $.ajax({
                            url:'http://localhost:8000/inventory/editQuantity',
                            type:'PUT',                          
                            data:{
                                inventory_uuid,
                                user_uuid,
                                quantity,
                                changer,
                                _token
                            },
                            success:function(response){
                                Swal.fire(
                                    'Good job!',
                                    response,
                                    'success'
                                )
                                .then((result)=>{
                                    if(result.value){
                                        window.location.href='/'; // this is your relocate to other page.
                                    }
                                });
                            },
                            error:function(error){
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Oops...',
                                    html: errorOutput(error.responseJSON),
                                })
                            }
                        });
                    },
                    error:function(error){
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            html: errorOutput(error.responseJSON),
                        })
                    }
                });
            });
        });
    </script>
</body>
@endsection