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
            include ('sidebar.php');
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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" style="position: absolute;">Declined Seminar Requests</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Course Code</th>
                                            <th>Fee</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $sql = mysqli_query($conn,"SELECT * FROM requests INNER JOIN courses ON requests.Course_ID = courses.ID INNER JOIN users ON requests.User_ID = users.ID WHERE requests.Status = 'Declined'");
                                    ?>
                                    <tbody>
                                        <?php
                                            while($rows = mysqli_fetch_array($sql)){
                                        ?>
                                        <tr>
                                            <td><?php echo $rows['Name']; ?> <?php echo $rows['Lname']; ?></td>
                                            <td><?php echo $rows['Code']; ?></td>
                                            <td><?php echo $rows['Fee']; ?></td>
                                            <td align="center">
                                              <?php if($rows['Status']=="Pending"){ ?>
                                              <span class="badge badge-warning" style="color: white; font-size: 15px;"><?php } else if($rows[5]=="Approved"){ ?> 
                                              <span  class="badge badge-success" style="color: white; font-size: 15px;"> <?php } else if($rows[5]=="Declined"){ ?> 
                                              <span  class="badge badge-danger" style="color: white; font-size: 15px;"> <?php } else if($rows[5]=="Completed"){ ?> 
                                              <span  class="badge badge-primary" style="color: white; font-size: 15px;"><?php }?><?php echo $rows[5];?></span>
                                            </td>                                           
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
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
    <div class="modal fade" id="un" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Approve Request?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form action="functions/approve.php" method="POST">
                <div class="modal-body">
                    <p>Do you really want to approve this appointment?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="unxid">
                    <button type="submit" name="submit" class="btn btn-success">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.decline-dialog -->
    </div>

    <div class="modal fade" id="av" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Decline Request?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form action="functions/decline.php" method="POST">
                <div class="modal-body">
                    <label for="exampleInputPassword4">Reason for Declining</label>
                    <textarea class="form-control" name="reason"></textarea>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="ida" id="axid">
                    <button type="submit" name="submit" class="btn btn-success">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.decline-dialog -->
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
              <div class="modal-body">
                  Do you really want to delete this record?
              </div>
              <form action="functions/delete_training.php" method="GET">
              <div class="modal-footer">
                  <input type="hidden" name="id" id="delid">
                  <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                  <button type="submit" name="submit" class="btn btn-danger"> Yes</button>
              </div>
          </form>
          </div>
      </div>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>
        function deletexid(x){
          document.getElementById('delid').value=x;
        }
    </script>
    <script>
        function approvedxid(aa){
          document.getElementById("unxid").value = aa;
        }
        function declinexid(dd){
            document.getElementById("axid").value = dd;
        }
    </script>

</body>

</html>