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
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form method="POST" name="form1">
                              <div class="form-group row">  
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <input type="text" class="form-control" placeholder="First name" name="fullname" id="fname" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <input type="text" class="form-control" placeholder="Middle name" name="mname" id="mname" required>
                                </div>
                              </div>
                              <div class="form-group row">  
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <input type="text" class="form-control" placeholder="Last name" name="lname" id="lname" required>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                  <input type="date" class="form-control" placeholder="Birthdate" id="dob" name="dob" max="<?php echo date('2005-m-d'); ?>" onmouseleave="ageCount();" required>
                                </div>
                                 <div class="col-sm-2 mb-3 mb-sm-0">
                                  <input type="text" class="form-control" placeholder="Age" name="age" id="age" readonly>
                                </div>
                              </div> 
                              <div class="form-group row">  
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                  <select class="form-control form-control-user" id="civil" name="civil" required>
                                      <option value="">Select Civil Status</option>
                                      <option value="Single">Single</option>
                                      <option value="Married">Married</option>
                                      <option value="Separated">Separated</option>
                                      <option value="Widowed">Widowed</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                  <select class="form-control form-control-user" id="sex" name="sex" required>
                                      <option value="">Select Sex</option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                  </select>
                                </div>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" placeholder="Contact No." name="contact" id="contact" required>
                                </div>
                          
                               
                              </div> 

                              <div class="form-group row">  
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <input type="text" class="form-control" placeholder="Address" name="address" id="address" required>
                                </div>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" placeholder="Occupation" name="occupation" id="occupation" required>
                                </div>
                              </div>  

                              <div class="form-group row">  
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <input type="email" class="form-control" placeholder="Email Address" name="email" id="email" required>
                                </div>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" placeholder="Username" name="username" id="username" required>
                                </div>
                              </div>  

                              <div class="form-group row">  
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                                </div>

                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <input type="password" class="form-control" placeholder="Retype password" name="retype" id="retype" required>
                                 </div>
                              </div>  

                                <div class="text-center">
                                <button type="button" name="save" id="butsave" class="btn btn-primary">
                                    Register Account
                                </button>
                                </div>
                                <div class="col-12">
                                    <?php include('snackbar.php'); ?>
                                    <div id="snackbar0" class="form-group">Username must contain atleast 6 characters!</div>
                                    <div id="snackbar" class="form-group">Username should not be empty!</div>
                                    <div id="snackbar1" class="form-group">Username must contain only letters, numbers and underscore!</div>
                                    <div id="snackbar2" class="form-group">Password must contain atleast 6 characters!</div>
                                    <div id="snackbar3" class="form-group">Username and password should not be equal!</div>
                                    <div id="snackbar4" class="form-group">Password must contain atleast 1 number!</div>
                                    <div id="snackbar5" class="form-group">Password must contain atleast 1 lowercase letter!</div>
                                    <div id="snackbar6" class="form-group">Password must contain atleast 1 uppercase letter!</div>
                                    <div id="snackbar7" class="form-group">Password mismatched!</div>
                                    <div id="snackbar8" class="form-group">Account has been registered. Please check your email for the verification code!
                                    <div id="snackbar9" class="form-group">Email Address already exists!</div>
                                </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="u_login.php">Already have an account? Login!</a>
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
    <script>
        $(document).ready(function() {
        $('#butsave').on('click', function() {
            //$("#butsave").attr("disabled", "disabled");
            var email = $('#email').val();
            var username = $('#username').val();
            var password = $('#password').val();
            var fname = $('#fname').val();
            var retype = $('#retype').val();
            var dob = $('#dob').val();
            var civil = $('#civil').val();
            var sex = $('#sex').val();
            var contact = $('#contact').val();
            var age = $('#age').val();
            var address = $('#address').val();
            var occupation = $('#occupation').val();
            var mname = $('#mname').val();
            var lname = $('#lname').val();

            if(password == username){
                // Get the snackbar DIV
                var x = document.getElementById("snackbar3");
                // Add the "show" class to DIV
                x.className = "show";

                 // After 3 seconds, remove the show class from DIV
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

                form1.password.focus();
                return false;
            }

            if(form1.password.value.length<6){
                // Get the snackbar DIV
                var x = document.getElementById("snackbar2");
                // Add the "show" class to DIV
                x.className = "show";

                 // After 3 seconds, remove the show class from DIV
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

                 form1.password.focus();
                 return false;
            }

            if(form1.username.value.length < 6){
              // Get the snackbar DIV
              var x = document.getElementById("snackbar0");
              // Add the "show" class to DIV
              x.className = "show";

               // After 3 seconds, remove the show class from DIV
              setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
              form1.username.focus();
              return false;
            }

            re= /^\w+$/;
            if(!re.test(form1.username.value)){
              // Get the snackbar DIV
              var x = document.getElementById("snackbar1");
              // Add the "show" class to DIV
              x.className = "show";

               // After 3 seconds, remove the show class from DIV
              setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

              form1.username.focus();
              return false;
            }

            if(retype == password){
                re = /[A-Z]/;
                re1 = /[a-z]/;
                re2 = /[0-9]/;
                if(!re.test(form1.password.value)){
                    $("#butsave").removeAttr("disabled");
                    // Get the snackbar DIV
                    var x = document.getElementById("snackbar6");
                    // Add the "show" class to DIV
                    x.className = "show";

                     // After 3 seconds, remove the show class from DIV
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                     form1.password.focus();
                     return false;

                }else if(!re1.test(form1.password.value)){
                    $("#butsave").removeAttr("disabled");
                    // Get the snackbar DIV
                    var x = document.getElementById("snackbar5");
                    // Add the "show" class to DIV
                    x.className = "show";

                     // After 3 seconds, remove the show class from DIV
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                     form1.password.focus();
                     return false;

                }else if(!re2.test(form1.password.value)){
                    $("#butsave").removeAttr("disabled");
                    // Get the snackbar DIV
                    var x = document.getElementById("snackbar4");
                    // Add the "show" class to DIV
                    x.className = "show";

                     // After 3 seconds, remove the show class from DIV
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                     form1.password.focus();
                     return false;
                }else{
                    $.ajax({
                    url: "functions/add_account.php",
                    type: "POST",
                    data: {
                        email: email, 
                        username: username,
                        password: password, 
                        fname: fname,
                        dob: dob,
                        civil: civil,
                        sex: sex,
                        contact: contact,
                        age: age,
                        address: address,
                        occupation: occupation,
                        mname: mname,
                        lname: lname,
                    },
                    cache: false,
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult.statusCode==200){
                            $("#butsave").attr("disabled", "disabled");
                            // Get the snackbar DIV
                            var x = document.getElementById("snackbar8");
                            // Add the "show" class to DIV
                            x.className = "show";

                            // After 3 seconds, remove the show class from DIV
                            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                            //return true;
                            var delayInMilliseconds = 2000; 

                            setTimeout(function() {
                               window.location.href = 'u_login.php';
                            }, delayInMilliseconds);
                                                
                        }
                        else if(dataResult.statusCode==201){
                            $("#butsave").removeAttr("disabled");
                            // Get the snackbar DIV
                            var x = document.getElementById("snackbar9");
                            // Add the "show" class to DIV
                            x.className = "show";

                             // After 3 seconds, remove the show class from DIV
                            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                             return false;
                        }
                        else if(dataResult.statusCode==202){
                            $("#error").show();
                            $('#error').html('Cannot add record!');
                        }
                    }
                });
            }   
            }
            else{
                $("#butsave").removeAttr("disabled");
                // Get the snackbar DIV
                var x = document.getElementById("snackbar7");
                // Add the "show" class to DIV
                x.className = "show";

                 // After 3 seconds, remove the show class from DIV
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                form1.password.focus();
                return false;
            }


        });
    });
    </script>
    <script type="text/javascript">
      function ageCount(){
        var date1=new Date();
        var dob=document.getElementById("dob").value;
        var date2=new Date(dob);

        var y1=date1.getFullYear();
        var y2=date2.getFullYear();

        var day1=date1.getUTCDate();
        var month1=date1.getUTCMonth();

        var day2=date2.getUTCDate();
        var month2=date2.getUTCMonth();
        if (month2<=month1) {
            if (day2<=date1) {
                 var age= y1-y2;
             }else{
                var age=(y1-y2)-1;
             }
        }else{
            var age=(y1-y2)-1;
        }
        document.getElementById("age").value=age;
        return true;
      }
  </script>

</body>

</html>