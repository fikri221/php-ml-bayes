<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Contralab - Register</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body col-lg-12 p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="text-center">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                </div>
                                <form id="register-form" name="register-form" class="user" action="validation.php?action=register" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="register-form-name" name="register-form-name" value="" placeholder="Name" />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="register-form-email" name="register-form-email" value="" placeholder="Email Address" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="register-form-password" name="register-form-password" value="" placeholder="Password" />
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block mt-5" id="register-form-submit" name="register-form-submit" value="register">
                                        Register Account
                                    </button>
                                </form>
                                <hr />
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="login.php">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
