<?php
    include('config.php');

    session_start();

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $code = $_POST['code'];
        $username = $_SESSION['uname'];
        $sql = mysqli_query($conn, "SELECT * FROM u_accounts WHERE Username='$username' AND VerificationCode='$code'");
      

        $count = mysqli_num_rows($sql);
        if($count == 1){
            $sqlupdate = mysqli_query($conn, "UPDATE u_accounts SET Verification = 1 WHERE Username = '$username'");
            
            header("Location: user/index.php");
             
        }else{
           $error = "Invalid Verification Code. Please try again!";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DICT</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-12">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
   
                                    <div class="text-center">
                                        <img src="img/logo.png" style="height: 200px;">
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">We've sent a code to your email</h1>
                                    </div>
                                    <div class="social-auth-links text-center mb-3">
                                        <?php if(isset($error)) { ?>
                                        <p class="err"><?php echo $error;?></p>
                                        <?php }?>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Verification Code" name="code">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Verify
                                        </button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>