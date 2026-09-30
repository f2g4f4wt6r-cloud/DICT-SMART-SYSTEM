<?php
    include('config.php');
    include('lock.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php 
            include ('e_side.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include('topnav.php');
                ?> 

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800">Profile</h1>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Grow In Utility -->
                        <div class="col-lg-4">

                            <div class="card position-relative">
                                
                                <div class="card-body">
                                    <div class="form-group">
                                    <center>
                                    <?php
                                      if($login_profile!=''){ 
                                    ?>
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($login_profile);?>"  alt="Image" width="200px" height="200px" id="pprev" class="rounded-circle" style="border-radius: 50%;">
                                    <?php }else{ ?>
                                        <img src="img/undraw_profile.svg" alt="Image" width="200px" height="200px" id="pprev" class="rounded-circle" style="border-radius: 50%;"/>
                                    <?php } ?>
                                    <h5 style="color: black;"><?php echo $acctname;?> <?php echo $lastname;?></h5>
                                    <b><?php echo $access;?></b>
                                    </center>
                                    </div>
                                    <hr>
                                  
                                  <div class="form-group row">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">First Name: </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12" style="text-align: right;">
                                        <b><?php echo $acctname;?></b>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="form-group row">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Last Name: </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12" style="text-align: right;">
                                        <b><?php echo $lastname;?></b>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="form-group row">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Email Address: </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12" style="text-align: right;">
                                        <b><?php echo $login_email;?></b>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="form-group row">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Position: </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12" style="text-align: right;">
                                        <b><?php echo $access;?></b>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="form-group row">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Gender: </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12" style="text-align: right;">
                                        <b><?php echo $gender;?></b>
                                    </div>
                                  </div>
                                  <hr>
                                </div>
                            </div>

                        </div>

                        <!-- Fade In Utility -->
                        <div class="col-lg-8">

                            <div class="card position-relative">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">User Profile</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">First Name: </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <b><?php echo $acctname;?></b>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Last Name: </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <b><?php echo $lastname;?></b>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Email Address: </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <b><?php echo $login_email;?></b>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Position: </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <b><?php echo $access;?></b>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Gender: </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <b><?php echo $gender;?></b>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Username: </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <b><?php echo $username;?></b>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <a class="btn ml-auto btn-outline btn-primary d-none d-md-block" href="#" data-toggle="modal" data-target="#uploadpdf" onclick="pdfxid(<?php echo $idno ;?>)" style="width: 200px;">Upload PDS</a>
                                    </div>
                                  </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 align="center">Edit Profile</h4>
                </div>
                 <form action="functions/edit_profile.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <center>
                        <?php
                          if($login_profile!=''){ 
                        ?>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($login_profile);?>"  alt="Image" width="100px" height="100px" id="pprev" class="rounded-circle" style="border-radius: 50%;">
                        <?php }else{ ?>
                            <img src="img/undraw_profile.svg" alt="Image" width="100px" height="100px" id="pprev" class="rounded-circle" style="border-radius: 50%;"/>
                        <?php } ?>
                        </center>
                    </div>
                    <div class="form-group row">
                            <?php
                                if($login_profile!=''){ 
                            ?>
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Change Photo:</label>
                            <?php } else { ?>
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Upload Photo:</label>
                            <?php }?>
                          <div class="col-md-8 col-sm-6 col-xs-12">
                              <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                              <input name="files" type="file" id="files" class="uploadButton" />
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Email Address: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="email" name="email" value="<?php echo $login_email;?>" class="form-control" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Username: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="text" name="uname" value="<?php echo $username;?>" class="form-control" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">First Name: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="text" name="acctname" value="<?php echo $acctname;?>" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Last Name: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="text" name="lastname" value="<?php echo $lastname;?>" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Position: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="text" name="position" value="<?php echo $access;?>" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Password: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="password" name="pword" class="form-control" required>
                        </div>
                      </div>
                      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="submit">Confirm</button>
                </div>
            </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="uploadpdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Upload PDS</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form action="functions/add_pdf.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div id="result3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" name="btn_upload" class="btn btn-primary">Add</button>
                </div>
              </form>
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
        function pdfxid(zz){
        var id = zz;
        //alert(id);
        $.post('functions/get_pdf.php', {postid: id},
            function(data)
            {
                $('#result3').html(data);
            });

        }
    </script>
</body>

</html>