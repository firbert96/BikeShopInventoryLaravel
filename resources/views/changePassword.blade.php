@extends('layout.master')
@section('title')
    Change Password User
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
                        <h1 class="h4 text-gray-900 mb-4">Change Password User</h1>
                    </div>
                    <form class="user">
                        <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="currentPassword">Current Password</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-user" id="currentPassword" placeholder="Current Password" name="currentPassword" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="token" id="token" value="{{csrf_token()}}"> 
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="newPassword">New Password</label>
                                </div>
                                <div class="col-md-9">
                                <input type="password" class="form-control form-control-user" id="newPassword" placeholder="New Password" name="newPassword" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="repeatPassword">Repeat Password</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" class="form-control form-control-user" id="repeatPassword" placeholder="Confirmation New Password" name="repeatPassword" value="" required>
                                </div>
                            </div>            
                        </div>
                        <input type="submit" name="change" value="Change Password" id="btnChange" class="btn btn-primary btn-user btn-block">
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
                $('#btnChange').click(function(e){
                    e.preventDefault();
                    var _token = $('#token').val();
                    var uuid = "{{ $uuid }}";
                    var currentPassword = $('#currentPassword').val();
                    var newPassword = $('#newPassword').val();
                    var repeatPassword = $('#repeatPassword').val();
                    if(repeatPassword === newPassword){
                        $.ajax({
                            url:'http://localhost:8000/users/changePassword',
                            type:'PUT',                          
                            data:{
                                uuid,
                                currentPassword,
                                newPassword,
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
                    }
                    else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Password doesn\'t match!'
                        })
                    }
                });
            });
        </script>
    </body>
@endsection