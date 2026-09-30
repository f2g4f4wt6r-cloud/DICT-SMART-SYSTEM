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

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" style="position: absolute;">Courses/Seminar</h6>
                            <a class="btn ml-auto btn-outline btn-primary d-none d-md-block" href="addcourse.php" style="width: 100px;">Add</a> 
                        </div>
                        <div class="card-body">
                            <div class="custom-tab">

                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Free Courses</a>
                                        <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Premuim Courses</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Seminar Code</th>
                                                        <th>No. of Hours</th>
                                                        <th>Duration/Schedule</th>
                                                        <th>Time</th>
                                                        <th>Platform Used</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                    $sql = mysqli_query($conn,"SELECT * FROM courses INNER JOIN trainings ON courses.Training_ID = trainings.id WHERE trainings.Fee = 'Free'");
                                                ?>
                                                <tbody>
                                                    <?php
                                                        while($rows = mysqli_fetch_array($sql)){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $rows[1]; ?></td>
                                                        <td><?php echo $rows[2]; ?></td>
                                                        <td><?php echo $rows[3]; ?></td>
                                                        <td><?php echo $rows[4]; ?></td>
                                                        <td><?php echo $rows[5]; ?></td>
                                                        <td align="center"><a href="" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-circle btn-sm" onclick="deletexid(<?php echo $rows[0];?> )"> <i class="fas fa-trash"></a></td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Seminar Code</th>
                                                        <th>No. of Hours</th>
                                                        <th>Duration/Schedule</th>
                                                        <th>Time</th>
                                                        <th>Government Fee</th>
                                                        <th>Private Fee</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                    $sql = mysqli_query($conn,"SELECT * FROM courses INNER JOIN trainings ON courses.Training_ID = trainings.id WHERE trainings.Fee = 'Premium'");
                                                ?>
                                                <tbody>
                                                    <?php
                                                        while($rows = mysqli_fetch_array($sql)){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $rows[1]; ?></td>
                                                        <td><?php echo $rows[2]; ?></td>
                                                        <td><?php echo $rows[3]; ?></td>
                                                        <td><?php echo $rows[4]; ?></td>
                                                        <td><?php echo $rows[6]; ?></td>
                                                        <td><?php echo $rows[7]; ?></td>
                                                        <td align="center"><a href="" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-circle btn-sm" onclick="deletexid(<?php echo $rows[0];?> )"> <i class="fas fa-trash"></a></td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
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
              <form action="functions/delete_courses.php" method="GET">
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
    <script type="text/javascript">
        $(document).ready(function() {
          $('#dataTable').DataTable();
      } );
        $(document).ready(function() {
          $('#dataTable1').DataTable();
      } );
    </script>
</body>

</html>