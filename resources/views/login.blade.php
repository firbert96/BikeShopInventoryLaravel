@extends('layout.master')
@section('title')
    Login
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
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                            <div class="text-center">
                                <h1 class=" h4 text-gray-900 mb-4">Welcome Back!</h1>
                            </div>
                            <form class="user">
                                <input type="hidden" name="token" id="token" value="{{csrf_token()}}"> 
                                <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required>
                                </div>
                                <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" required>
                                </div>
                                <input type="submit" id="login" class="login btn btn-primary btn-user btn-block" name="submit" value="Login"/>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="register">Create an Account!</a>
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

    <script>
        $(document).ready(function(){
            $(".login").hover(function(){
                $(".login").val("Login Now!");
            },
            function(){
                $(".login").val("Login");
            });

            $("#login").click(function(e){
                e.preventDefault();
                var email = $('#email').val();
                var password = $('#password').val();
                var _token = $('#token').val();
                $.ajax({
                    url:'/login',
                    type:'POST',                          
                    data:{
                        email,
                        password,
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
                            text: error.responseJSON,
                        })
                    }
                });
            });
        });
    </script>
</body>
@endsection