<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
    <title>AP BIO - FERTILIZERS</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrapValidator.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-image: url(img/login.jpg);background-size: cover;">
    <div id="app">
        <section class="section">
            <div class="container ">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand text-white" style="margin:10px">
                           <img style="width:180px;" src="img/logo.png">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            <div class="card-body">
                                <form id="loginForm" method="post" action="#">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" id="email_id" name="email_id" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Password</label>
                                        <input type="password" id="password" name="password" class="form-control">
                                    </div>

                                    <div class="form-group mb-5">
                                        <div class="float-right">
                                            <a href="forgot.php">
                                                Forgot Password?
                                            </a>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Login
                                        </button>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrapValidator.min.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function() {

        $('#loginForm').bootstrapValidator({
            fields: {
                email_id: {
                   validators: {
                        notEmpty: {
                            message: 'Email is required'
                        },
                        regexp: {
                        regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
                        message: 'Please enter a valid email address. For example johndoe@domain.com.'
                        }
                    }
                },
                password: {
                   validators: {
                        notEmpty: {
                            message: 'Password is required'
                        },
                        regexp: {
                        regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
                        message:'Password wont allow <> [] = % '
                        }
                    }
                }
            }
        });
    });
    </script>   
    
</body>

</html>