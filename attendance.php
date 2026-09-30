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
    <meta name="distributor" content="Global" />
    <meta itemprop="contentRating" content="General" />
    <meta name="robots" content="All" />
    <meta name="revisit-after" content="7 days" />
    <meta name="description" content="The source of truly unique and awesome jquery plugins." />
    <meta name="keywords" content="slider, carousel, responsive, swipe, one to one movement, touch devices, jquery, plugin, bootstrap compatible, html5, css3" />
    <meta name="author" content="w3widgets.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>
    <title>Employee</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/responsive-calendar.css" rel="stylesheet">
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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" style="position: absolute;">Your Attendance</h6>
                            <form class="forms-sample" role="form" method="POST" action="functions/add_calendar.php" enctype="multipart/form-data">
                                <input type="hidden" class="form-control" name="idno" value="<?php echo $idno ?>" readonly>
                                <input type="hidden" class="form-control" name="date" value="<?php echo date("Y-m-d") ?>" readonly>
                                <input type="hidden" class="form-control" name="month" value="<?php echo date("m") ?>" readonly>
                                <input type="hidden" class="form-control" name="salary" value="<?php echo $salary ?>" readonly>
                                <button type="submit" class="btn ml-auto btn-outline btn-primary d-none d-md-block" name="submit"><i class="fas fa-fw fa-user"></i> Time In</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="container">
                                  <!-- Responsive calendar - START -->
                                    <div class="responsive-calendar">
                                    <div class="controls">
                                        <a class="pull-left" data-go="prev"><div class="btn btn-primary">Prev</div></a>
                                        <h4><span data-head-year></span> <span data-head-month></span></h4>
                                        <a class="pull-right" data-go="next"><div class="btn btn-primary">Next</div></a>
                                    </div><hr/>
                                    <div class="day-headers">
                                      <div class="day header">Mon</div>
                                      <div class="day header">Tue</div>
                                      <div class="day header">Wed</div>
                                      <div class="day header">Thu</div>
                                      <div class="day header">Fri</div>
                                      <div class="day header">Sat</div>
                                      <div class="day header">Sun</div>
                                    </div>
                                    <div class="days" data-group="days">
                                      
                                    </div>
                                  </div>
                                  <!-- Responsive calendar - END -->
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
              <form action="functions/delete_passers.php" method="GET">
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
    <div class="modal" id="view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reason for Application</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" action="functions/approved_leave.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div id="result1"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/responsive-calendar.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery.js"></script>
    <?php
        $sql = mysqli_query($conn,"SELECT * FROM calendar INNER JOIN accounts ON calendar.ID_No = accounts.Username WHERE calendar.ID_No = $idno");
    ?>  
    <script src="js/responsive-calendar.js"></script>
    <script type="text/javascript">
      
      $(document).ready(function () {
        $(".responsive-calendar").responsiveCalendar({
          time: '<?php echo date("Y-m"); ?>',
          events: {
            <?php 
                while($rows = mysqli_fetch_array($sql)){
            ?>
            "<?php echo $rows['Date']; ?>": {"number": '<b style="color:white;">Present<b>'},<?php } ?>}
            
        });
      });
    </script>


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
        function viewxid(z){
        var id = z;
        //alert(id);
        $.post('functions/get_view.php', {postid: id},
            function(data)
            {
                $('#result1').html(data);
            });

        }
    </script>

</body>

</html>