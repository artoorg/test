<?php include ('server.php');?>
<!DOCTYPE html>
<html>
    <head>  
    <title>DASHBOARD php sql</title>
        <script src="js/jquery.js"></script>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/vendor/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script> 
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light   bg-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Envert™</a>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.php"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php"></a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4 margin-top-120 ">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form method="post" action="register.php">
                            <?php include ('errors.php');?>
                                

                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Username</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="username" required autofocus value="<?php echo $username; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="email" required value="<?php echo $email; ?>">
                                </div>
                            </div>
                            

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password_1" required value="<?php echo $email; ?>">
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password_2" required value="<?php echo $email; ?>">
                                </div>
                            </div>

                            
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="register" class="btn btn-primary">
                                    register
                                </button>
                                <a href="login.php" class="btn btn-link">
                                    Sign in
                                </a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>     


