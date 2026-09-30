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
                            <h6 class="m-0 font-weight-bold text-primary" style="position: absolute;">Inbox</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sender</th>
                                            <th>Message</th>
                                            <th>File</th>
                                            <th>Reply</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $sql = mysqli_query($conn,"SELECT * FROM inbox INNER JOIN accounts ON inbox.Sender_ID = accounts.ID WHERE inbox.Receiver_ID = $accountID AND inbox.R_Status = 'Sent'");
                                    ?>
                                    <tbody>
                                        <?php
                                            while($rows = mysqli_fetch_array($sql)){
                                        ?>
                                        <tr>
                                            <td><?php echo $rows['FirstName']; ?> <?php echo $rows['LastName']; ?></td>
                                            <td><?php echo $rows[2]; ?></td>
                                            <td>
                                                <?php if( $rows[7] == '../comms/' ){ ?>
                                                
                                                <?php } elseif( $rows[7] ==! ' ' ){ ?>
                                                
                                                <?php } else {  ?>
                                                <a href="comms/<?php echo $rows['pdf_name']; ?>"/><?php echo $rows['pdf_name']; ?> <a target="_blank" style="float: right;" class="btn btn-primary btn-sm" href="comms/<?php echo $rows['pdf_name']; ?>"/>View File</a>
                                                <?php } ?>
                                            </td>
                                            <td><a href="reply.php?id=<?php echo $rows[0];?>" class="btn btn-primary btn-sm">Reply</a></td>
                                            <td align="center"><a href="" data-toggle="modal" data-target="#update" class="btn btn-danger btn-circle btn-sm" onclick="editxid(<?php echo $rows[0];?> )"> <i class="fas fa-trash"></a></td>   
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
              <form action="functions/delete_passers.php" method="POST">
              <div class="modal-footer">
                  <input type="hidden" name="id" id="delid">
                  <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                  <button type="submit" name="submit" class="btn btn-danger"> Yes</button>
              </div>
          </form>
          </div>
      </div>
    </div>
    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <form method="POST" action="functions/delete_inbox.php" enctype="multipart/form-data">
              <div class="modal-body">
                  <div id="result"></div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                  <button type="submit" name="submit" class="btn btn-primary"> Yes</button>
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
        function editxid(y){
        var id = y;
        //alert(id);
        $.post('functions/get_inbox.php', {postid: id},
            function(data)
            {
                $('#result').html(data);
            });

        }
    </script>

</body>

</html>