<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Contralab - Login</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet" />
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body col-lg-12 p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="text-center">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Sign In</h1>
                                </div>
                                <form id="login-form" name="login-form" class="user" action="validation.php?action=login" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="login-form-email" name="login-form-email" value="" aria-describedby="emailHelp" placeholder="Email" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="login-form-password" name="login-form-password" value="" placeholder="Password" />
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block mt-5" id="login-form-submit" name="login-form-submit" value="login">
                                        Login
                                    </button>
                                </form>
                                <hr />
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.php">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
</body>

</html>