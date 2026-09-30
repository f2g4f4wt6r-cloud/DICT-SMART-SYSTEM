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

    <title>Employee</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php 
            include ("e_side.php");
        ?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php 
                    include ('topnav.php')
                ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="row">

                        <div class="table-responsive">
                            <table width="100%">
                                <thead >
                                </thead>
                                    <tbody align="center">
                                        <tr>
                                            <td>
                                                <div class="col-md-8 col-lg-8">

                                                    <div class="card position-relative">
                                                        <div class="card-header py-3">
                                                            <h6 class="m-0 font-weight-bold text-primary">APPLICATION FOR LEAVE</h6>
                                                        </div>
                                                        <div class="card-body" align="left">
                                                            <form class="forms-sample" role="form" method="POST" action="functions/add_leave.php" enctype="multipart/form-data">
                                                            
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                                        <label for="exampleInputPassword4">1. Office Department:</label>
                                                                        <input type="text" class="form-control" name="dept">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="exampleInputPassword4">2. Name:</label>
                                                                        <input type="text" class="form-control" name="name" value=" <?php echo $acctname . ' ' . $lastname; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                                                        <label for="exampleInputPassword4">3. Date of filing:</label>
                                                                        <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="filing">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label for="exampleInputPassword4">4. Position:</label>
                                                                        <input type="text" class="form-control" name="position" value="<?php echo $position; ?>" readonly>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label for="exampleInputPassword4">5. Salary:</label>
                                                                        <input type="text" class="form-control" name="salary" value="<?php echo $salary; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" class="form-control" name="idno" value="<?php echo $idno ?>">
                                                                <hr>
                                                                    <h6 class="m-0 font-weight-bold text-primary" align="center">6. DETAILS OF APPLICATION</h6>
                                                                <hr>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                                        <label for="exampleInputPassword4">6.A) Type of Leave to be Availed of:</label>
                                                                        <div class="custom-control custom-checkbox small">
                                                                            <input type="radio" name="A6" class="custom-control-input" id="1" value="Vacation Leave">
                                                                            <label class="custom-control-label" for="1">Vacation Leave</label>
                                                                        </div>
                                                                        <div class="custom-control custom-checkbox small">
                                                                            <input type="radio" name="A6" class="custom-control-input" id="2" value="Mandatory/Forced Leave">
                                                                            <label class="custom-control-label" for="2">Mandatory/Forced Leave</label>
                                                                        </div>
                                                                        <div class="custom-control custom-checkbox small">
                                                                            <input type="radio" name="A6" class="custom-control-input" id="3" value="Sick Leave">
                                                                            <label class="custom-control-label" for="3">Sick Leave</label>
                                                                        </div>
                                                                        <div class="custom-control custom-checkbox small">
                                                                            <input type="radio" name="A6" class="custom-control-input" id="4" value="Maternity Leave">
                                                                            <label class="custom-control-label" for="4">Maternity Leave</label>
                                                                        </div>
                                                                        <div class="custom-control custom-checkbox small">
                                                                            <input type="radio" name="A6" class="custom-control-input" id="5" value="Paternity Leave">
                                                                            <label class="custom-control-label" for="5">Paternity Leave</label>
                                                                        </div>
                                                                        <div class="custom-control custom-checkbox small">
                                                                            <input type="radio" name="A6" class="custom-control-input" id="6" value="Special Privilege Leave">
                                                                            <label class="custom-control-label" for="6">Special Privilege Leave</label>
                                                                        </div>
                                                                        <div class="custom-control custom-checkbox small">
                                                                            <input type="radio" name="A6" class="custom-control-input" id="7" value="Solo Parent Leave">
                                                                            <label class="custom-control-label" for="7">Solo Parent Leave</label>
                                                                        </div>
                                                                        <div class="custom-control custom-checkbox small">
                                                                            <input type="radio" name="A6" class="custom-control-input" id="8" value="Study Leave">
                                                                            <label class="custom-control-label" for="8">Study Leave</label>
                                                                        </div>
                                                                        <div class="custom-control custom-checkbox small">
                                                                            <input type="radio" name="A6" class="custom-control-input" id="9" value="Special Emergency Leave (Calamity) Leave">
                                                                            <label class="custom-control-label" for="9">Special Emergency Leave (Calamity) Leave</label>
                                                                        </div>
                                                                        <div class="custom-control custom-checkbox small">
                                                                            <input type="radio" name="A6" class="custom-control-input" id="10" value="Adaption Leave">
                                                                            <label class="custom-control-label" for="10">Adaption Leave</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="exampleInputPassword4">6.B) Details of Leave:</label><br>
                                                                        <label for="exampleInputPassword4"><i><b>In case of Vacation/Special Privilege Leave:</b></i></label>
                                                                        <input type="text" class="form-control" name="BA6" style="height: 30px;" placeholder="Within Philippines">
                                                                        <input type="text" class="form-control" name="BB6" style="height: 30px;" placeholder="Abroad (Specify)">
                                                                        <br>
                                                                        <label for="exampleInputPassword4"><i><b>In case of Sick Leave:</b></i></label>
                                                                        <input type="text" class="form-control" name="BC6" style="height: 30px;" placeholder="In Hospital (Specify Illness)">
                                                                        <input type="text" class="form-control" name="BD6" style="height: 30px;" placeholder="Out Patient (Specify Illness)">
                                                                        <br>
                                                                        <label for="exampleInputPassword4"><i><b>In case of Study Leave:</b></i></label>
                                                                        <div class="custom-control custom-checkbox small">
                                                                            <input type="radio" name="B6" class="custom-control-input" id="11" value="Completion of Masters Degree">
                                                                            <label class="custom-control-label" for="11">Completion of Master's Degree</label>
                                                                        </div>
                                                                        <div class="custom-control custom-checkbox small">
                                                                            <input type="radio" name="B6" class="custom-control-input" id="12" value="BAR/Board Examination Review">
                                                                            <label class="custom-control-label" for="12">BAR/Board Examination Review</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                                                        <label for="exampleInputPassword4">6.C) No. Of Working Days:</label>
                                                                        <label for="exampleInputPassword4">Starting Date:</label>
                                                                        <input type="date" class="form-control" name="start" id="startDate" ><br>
             
                                                                        <input type="text" class="form-control" name="C6" id="taxResidencyCalculator" placeholder="No. Of Working Days" readonly>
                                                                        
                                                                    </div>
                                                                    <div class="col-sm-3" style="margin-top: 7px;">
                                                                        <br>
                                                                        <label for="exampleInputPassword4">End Date:</label>
                                                                        <input type="date" class="form-control" name="end" id="endDate" onmouseleave="calculateDate();">

                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="exampleInputPassword4">6.D) Commutation:</label>
                                                                        <div class="custom-control custom-checkbox small">
                                                                            <input type="radio" name="D6" class="custom-control-input" id="13" value="Not Requested">
                                                                            <label class="custom-control-label" for="13">Not Requested</label>
                                                                        </div>
                                                                        <div class="custom-control custom-checkbox small">
                                                                            <input type="radio" name="D6" class="custom-control-input" id="14" value="Requested">
                                                                            <label class="custom-control-label" for="14">Requested</label>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                                <hr>
                                                                <div align="center">
                                                                    <button type="submit" class="btn btn-success mr-2" name="submit">Send</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                <!-- /.container-fluid -->
                </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
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
              <form action="delete_activities.php" method="GET">
              <div class="modal-footer">
                  <input type="hidden" name="id" id="delid">
                  <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                  <button type="submit" name="submit" class="btn btn-danger"> Yes</button>
              </div>
          </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script type="text/javascript">
        function deletexid(x){
          document.getElementById('delid').value=x;
        }
    </script>
    <script type="text/javascript">
        function calculateDate() {
        var startDate = document.getElementById("startDate").value;
        var endDate = document.getElementById("endDate").value;
        var Difference_In_Time = new Date(endDate).getTime() - new Date(startDate).getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        document.getElementById("taxResidencyCalculator").value = Difference_In_Days;
        }
  </script>
</body>

</html>