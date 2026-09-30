<?php
    include('config.php');

    session_start();

    // Getting IP Address
    function getIpAddr(){
      if (!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ipAddr=$_SERVER['HTTP_CLIENT_IP'];
      }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
      }else{
        $ipAddr=$_SERVER['REMOTE_ADDR'];
      }
      return $ipAddr;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];
        $ipaddress = getIpAddr();
        $time=time()-30;

        $sql = mysqli_query($conn, "SELECT * FROM accounts WHERE Username='$uname' AND Password='$pword'");
        $row = mysqli_fetch_array($sql);
        $count = mysqli_num_rows($sql);

        if($count == 1){
            $status = $row['Status'];
            $acct = $row['AccessLevel'];
            $_SESSION['uname'] = $uname;
            
            if($status == 1 && $acct == 'Employee'){

                header("location: main.php");
            }
            elseif($status == 1 && $acct == 'Director'){
                header("location: index.php");

            }

        }else{

            $sqlattempts = mysqli_query($conn, "SELECT * from logs WHERE TryTime > $time and IPAddress='$ipaddress' ORDER BY ID DESC");
            $rowattempts = mysqli_fetch_array($sqlattempts);
           
            $countattempts = mysqli_num_rows($sqlattempts);
          
            if($countattempts == 3){
                $lasttry = $rowattempts['TryTime'];
                if($lasttry > time()){
                    mysqli_query($conn, "DELETE FROM logs WHERE IPAddress='$ipaddress'");
                }

                $error = "You have reached the maximum number of attempts. Please try again after 30 seconds";
              
              
            }else{
                $trytime=time();
                mysqli_query($conn, "INSERT INTO logs(IPAddress, TryTime) VALUES('$ipaddress', '$trytime')");
                $countattempts++;
                $rem_attm = 3 - $countattempts;
                if($rem_attm > 0){
                $error = "Access Denied. Invalid username and/or password!<br>You only have ".$rem_attm." attempts left.";
                }else{
                    $error = "Access Denied. Invalid username and/or password!<br>This is your last attempt.";
                }
            }
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
    <style type="text/css">
      .err{
        font-size: 14px;
        font-weight: bold;
        color: red;
        text-align: center;
      }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="img/logo.png">
                                    </div>

                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Username" name="uname">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="pword">
                                        </div>
                                        <div class="custom-control">
                                        <?php if(isset($error)){ ?>
                                            <p class="err"><i class="fa fa-exclamation"></i> <?php echo $error;?></p>
                                        <?php }?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
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