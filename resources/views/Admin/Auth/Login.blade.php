{{-- <!DOCTYPE html>
<html>
    <head>
        <title>Admin GreenFood | Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header style="background-color: #cccccc; min-height: 70px; padding: 15px;">
            <div class="container" style="text-align: center; color: red">
                Welcome! GreenFood Company
            </div>
        </header>
        <main style="background-color: #dddddd; min-height: 300px; padding: 7.5px 15px;">
            <div class="container" style="width: 100%; max-width: 1200px; margin-left: auto; margin-right: auto;">
            <div class="login-form" style="width: 100%; max-width: 500px; margin: 30px auto;  background-color: #ffffff; padding: 20px; border: 3px dotted #cccccc; border-radius: 10px;">
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <h1 style="color:green; font-size: 20px; margin-bottom: 30px;">Login Admin GreenFood</h1>
                    <div class="input-box" style="margin-bottom: 10px;">
                        <i ></i>
                        <input type="text" name="email" placeholder="Enter your email address" style="padding: 7.5px 7.5px;width: 97%; border: 1px solid #cccccc;outline: none;">
                    </div>
                    <div class="input-box">
                        <i ></i>
                        <input type="password" name="password" placeholder="Enter password" style="padding: 7.5px 7.5px;width: 97%; border: 1px solid #cccccc;outline: none;">
                    </div>
                    <div class="btn-box" style="text-align: right;margin-top: 30px;">
                        <button type="submit" style="padding: 7.5px 15px;border-radius: 2px;background-color: #009999;color: #ffffff;border: none;outline: none;">
                            Login
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </main>
        <footer style="background-color: #cccccc; min-height: 200px; padding: 15px;">
            <div class="container" style="color: red;text-align: center">
            Thai Hoang Anh Kiet | GreenWichSchool | Admin
            </div>
        </footer>
    </body>
</html> --}}
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>
<style>
    .btn-primary {
    color: #fff;
    background-color: #DD1C1A;
    border-color: #F0C808;
}
.btn-primary:hover{color:#fff;background-color:#F0C808;border-color:#DD1C1A}
</style>
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image" style="background:url('{{asset('img/market.jpg')}}');background-size: 464.98px 471px;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Log-in ADmin</h1>
                                        <p class="mb-4">enter your email address below
                                            and we'll send you  to Admin place</p>
                                            <span style="color: red;">@if (isset($message))
                                                {{$message}}
                                            @endif</span>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('admin.login') }}">
                                        @csrf
                                        <div class="form-group">
                                           
                                            <input type="email" class="form-control form-control-user" name="email"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter password...">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Let's Go
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" >Welcome!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small">Already have an account? Login!</a>                                        
                                    </div>
                                    <div class="text-center">
                                        <a class="small" style="color: red;">Thai Hoang Anh Kiet | GreenWichSchool | Admin</a>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>