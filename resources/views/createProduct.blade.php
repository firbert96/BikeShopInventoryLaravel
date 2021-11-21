@extends('layout.master')
@section('title')
    Create New Product
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
                        <h1 class="h4 text-gray-900 mb-4">Create New Product</h1>
                    </div>
                    <form class="user">
                        <input type="hidden" name="token" id="token" value="{{csrf_token()}}"> 
                        <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="product_name" placeholder="Product Name" name="product_name" value="" required>
                        </div>
                        <div class="form-group">
                            <h5 style="display:inline-block"> Choose Product : </h5>
                            <label class="radio-inline" for="sparepart">
                                <input type="radio"name="product" id="sparepart" value="0" required>Sparepart
                            </label>
                            <label class="radio-inline" for="bicycle">
                                <input type="radio" name="product" id="bicycle" value="1">Bicycle
                            </label>
                        </div>
                        <input type="submit" name="submit" id="btnCreate" class="btn btn-primary btn-user btn-block" value="Create">
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
            $('#btnCreate').click(function(e){
                e.preventDefault();
                var user_uuid = "{{ $user_uuid }}";
                var product_name = $('#product_name').val();
                var product = $('input[name="product"]:checked').val();;
                var _token = $('#token').val();
                var api_url = "{{env('API_URL')}}";
                $.ajax({
                    url:api_url+'/inventory',
                    type:'POST',                          
                    dataType: 'json',
                    data:{
                        user_uuid,
                        product_name,
                        product,
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
            });
        });
    </script>
</body>
@endsection