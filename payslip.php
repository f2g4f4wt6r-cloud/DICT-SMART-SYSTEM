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

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        @media print {
          #printPageButton {
            display: none;
          }
        }

        .invoice-box {
            max-width: 1000px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 15px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include ('topnav.php');
                ?> 
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="invoice-box">
                        <div class="col-lg-6">
                            <!-- col-lg-6 start here -->
                            <div class="invoice-logo"><img src="img/logo.png" style="height: 100px; position: absolute;"></div>
                            <br>
                        </div>
                        <table cellpadding="0" cellspacing="0">
                            <tr class="top">
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <?php 
                                                $sqlcount=mysqli_query($conn, "SELECT COUNT(ID) AS total FROM calendar WHERE ID_No = $idno;");
                                                $rowscount=mysqli_fetch_array($sqlcount);
                                                $num_rows=$rowscount['total'];
                                                $id=$_GET['id'];
                                                $sql0 = mysqli_query($conn, "SELECT * FROM calendar INNER JOIN accounts ON calendar.ID_No=accounts.ID_No WHERE calendar.ID_No=$id");
                                                $row0 = mysqli_fetch_array($sql0);
                                                $date = date_create($row0['Date']);
                                                $date1 = DateTime::createFromFormat('m', $row0['Month']);
                                            ?>
                                            <td class="title">
                                                <img src="" style="width: 100%; max-width: 300px" />
                                            </td>

                                            <td>
                                                Date: <?php echo date_format($date,'F' . ' ' . 'd');?><br />
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td>
                                                DICT Region II<br />
                                                JPCC+MP5, Bagay Road, Tuguegarao, Cagayan<br /><br>
                                                Pay Period: <?php echo $date1->format('F');?><br />
                                                Working Days: <?php echo $num_rows ;?><br />
                                            </td>

                                            <td>
                                            
                                            Employee Name: <?php echo $row0['FirstName']. ' '.$row0['LastName']?><br />                         
                                            Email Address: <?php echo $row0['EmailAd']; ?><br />
                                            Designation: <?php echo $row0['AccessLevel']; ?><br />
                                   
                                        </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <div id="invoice-table">
                              <div class="table-responsive">
                                  <table class="table" id="quote">
                                    <tr class="tabletitle">
                                       <thead>
                                        <tr>
                                          <th>Earnings</th>
                                          <th>Amount</th>
                                          <th>Deductions</th>
                                          <th>Amount</th>
                                        </tr>
                                      </thead>
                                        <?php
                                            $result = mysqli_query($conn, "SELECT SUM(Salary) AS value_sum FROM calendar WHERE ID_No = '$id'"); 
                                            $row = mysqli_fetch_assoc($result); 
                                            $sum = $row['value_sum'];
                                            $result1 = mysqli_query($conn, "SELECT SUM(Amount) AS value_sum1 FROM deduction"); 
                                            $row1 = mysqli_fetch_assoc($result1); 
                                            $sum1 = $row1['value_sum1'];
                                            $sql = mysqli_query($conn, "SELECT * FROM calendar WHERE ID_No = '$id'");
                                            $rows = mysqli_fetch_array($sql);
                                        ?>
                                        <tr>
                                          <td style="text-align: left;">Basic Pay</td>
                                          <td style="text-align: left;">₱<?php echo $rows['Salary'];?></td>
                                          <td style="text-align: left;">Pag-IBIG</td>
                                          <td style="text-align: left;">₱120</td>
                                        </tr>
                                        <tr>
                                          <td style="text-align: left;"></td>
                                          <td style="text-align: left;"></td>
                                          <td style="text-align: left;">PhilHealth</td>
                                          <td style="text-align: left;">₱100</td>
                                        </tr>
                                        <tr>
                                          <td style="text-align: left;"></td>
                                          <td style="text-align: left;"></td>
                                          <td style="text-align: left;">SSS</td>
                                          <td style="text-align: left;">₱110</td>
                                        </tr>
                                        <tr>
                                          <td style="text-align: left;">Total</td>
                                          <td style="text-align: left;">₱<?php echo $sum;?></td>
                                          <td style="text-align: left;">Total</td>
                                          <td style="text-align: left;">₱<?php echo $sum1;?></td>
                                        </tr>
                                        <tr>
                                          <td style="text-align: left;"></td>
                                          <td style="text-align: right;"><b>Total Earnings:</b></td>
                                          <td style="text-align: left;"><b>₱<?php echo $sum - $sum1 ;?></b></td>
                                          <td style="text-align: left;"></td>
                                        </tr>
                                  </table>
                                  <span id="totalprice"></span>

                              <div id="legalcopy">
                              </div>
                                <div class="invoice-footer mt25 no-print" style="text-align: right;">
                                    <div class="col-s-12">            
                                      <button target="_blank" class="btn btn btn-primary btn-rounded pull-right" id="printPageButton" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                    </div>
                              </div>
                            </div>
                         </div>
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
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a Service</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="functions/add_service.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                      <label for="exampleInputPassword4">Service</label>
                      <input type="text" class="form-control" id="exampleInputPassword4" name="service">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Select Category</label>
                        <?php
                            $sql = mysqli_query($conn,"SELECT * FROM  category");
                        ?>
                        <select class="form-control" name="category">
                            <?php while($row = mysqli_fetch_array($sql)) { ?>
                                <option value="<?php echo $row['ID'];?>"><?php echo $row['Title'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Description</label>
                      <textarea class="form-control" id="exampleInputPassword4" name="description"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Price</label>
                      <input class="form-control" name="price">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Image</label>
                      <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                      <input name="files" type="file" id="files" class="form-control uploadButton" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Services</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <form method="POST" action="functions/edit_service.php" enctype="multipart/form-data">
              <div class="modal-body">
                  <div id="result"></div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
              </form>
          </div>
      </div>
    </div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                <div class="modal-body">
                    <p>Do you really want to delete this record?</p>
                </div>
                <div class="modal-footer">
                <form action="functions/del_decline.php" method="POST">
                    <input type="hidden" id="delid" name="idx">
                    <button type="submit" name="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                </form>
                </div>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="un" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Approve Appointment?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form action="functions/approved.php" method="POST">
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
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Decline Appointment?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form action="functions/decline.php" method="POST">
                <div class="modal-body">
                    <p>Do you really want to decline this Appointment?</p>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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
    <script type="text/javascript">
    function deletexid(x){
        //alert(x);
        document.getElementById('delid').value  = x;

    }
    function editxid(y){
        var id = y;
        //alert(id);
        $.post('functions/get_appointment.php', {postid: id},
            function(data)
            {
                $('#result').html(data);
            });

    }
    </script>
    <script>
        function unavailablexid(aa){
          document.getElementById("unxid").value = aa;
        }
        function availablexid(dd){
            document.getElementById("axid").value = dd;
        }
    </script>
    <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
    <script language="javascript" type="text/javascript">
        let sum = 0;
        const prices = [...document.querySelectorAll('#quote .tprice')]
          .map(td => isNaN(td.textContent) ? 0 : +td.textContent); // an array of numbers
        if (prices.length) sum = prices.reduce((a, b) => a + b);   // reduced to a sum
        document.getElementById('totalprice').innerHTML += "£" + sum.toFixed(2);
    </script>
</body>

</html>