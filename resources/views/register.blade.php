@extends('layout.master')
@section('title')
    Register
@endsection
@section('content')
<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                <span id="msg_error"></span>
                <form class="user">
                    <input type="hidden" name="token" id="token" value="{{csrf_token()}}"> 
                    <div class="form-group">
                        <input value="" type="text" class="form-control form-control-user" placeholder="Full Name" name="fullname" id="fullname" required>
                    </div>
                    <div class="form-group">
                        <input value="" type="email" class="form-control form-control-user" placeholder="Email Address" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <input value="" type="text" class="form-control form-control-user" placeholder="Phone Number" name="phone" id="phone" required>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" placeholder="Password" name="password" id="password" required>
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" placeholder="Repeat Password" name="repeat_password" id="repeat_password" required>
                        </div>
                    </div>
                    <input type="submit" name="submit" id="btnRegister" class="btn btn-primary btn-user btn-block" value="Register Account"/>
                </form>
                <div class="text-center">
                    <a class="small" href="/">Already have an account? Login!</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#btnRegister").hover(function(){
                    $("#btnRegister").val("Register Now!");
                },
                function(){
                    $("#btnRegister").val("Register Account");
            });

            $('#btnRegister').click(function(e){
                e.preventDefault();
                var fullname = $('#fullname').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var password = $('#password').val();
                var repeat_password = $('#repeat_password').val();
                var _token = $('#token').val();
                if(password === repeat_password){
                    $.ajax({
                        url:'http://localhost:8000/users',
                        type:'POST',                          
                        dataType: 'json',
                        data:{
                            fullname,
                            email,
                            phone,
                            password,
                            _token
                        },
                        success:function(response){
                            $.ajax({
                                url:'/login',
                                type:'POST',                          
                                data:{
                                    email,
                                    password,
                                    _token
                                },
                                success:function(){
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
                                    console.log(error);
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