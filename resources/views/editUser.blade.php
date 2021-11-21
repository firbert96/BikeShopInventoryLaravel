@extends('layout.master')
@section('title')
    Edit User
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
                        <h1 class="h4 text-gray-900 mb-4">Edit User</h1>
                    </div>
                    <form class="user">
                        <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="fullname">Full Name</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control form-control-user" id="fullname" placeholder="Full Name" name="fullname" value="{{ $fullname }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="token" id="token" value="{{csrf_token()}}"> 
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-10">
                                <input type="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" value="{{ $email }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="phone">Phone Number</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control form-control-user" id="phone" placeholder="Phone number" name="phone" value="{{ $phone }}" required>
                                </div>
                            </div>            
                        </div>
                        <input type="submit" name="edit" value="Edit" id="btnEdit" class="btn btn-primary btn-user btn-block">
                    </form>
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
                $('#btnEdit').hover(function(){
                    $('#btnEdit').val("Are you sure edit?");
                },function(){
                    $('#btnEdit').val("Edit");
                });

                $('#btnEdit').click(function(e){
                    e.preventDefault();
                    var uuid = "{{ $uuid }}";
                    var fullname = $('#fullname').val();
                    var email = $('#email').val();
                    var phone = $('#phone').val();
                    var _token = $('#token').val();
                    var api_url = "{{env('API_URL')}}";
                    $.ajax({
                        url:api_url+'/users',
                        type:'PUT',                          
                        data:{
                            uuid,
                            fullname,
                            email,
                            phone,
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