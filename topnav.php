<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <?php
          $sql=mysqli_query($conn, "SELECT COUNT(ID) AS total FROM inbox WHERE R_Status = 'Sent' AND Receiver_ID = $accountID");
          $rows=mysqli_fetch_array($sql);
          $num_rows=$rows['total'];
        ?>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter"><?php echo $num_rows;?></span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message
                </h6>
                <?php
                    $sql = mysqli_query($conn,"SELECT * FROM inbox INNER JOIN accounts ON inbox.Sender_ID = accounts.ID WHERE inbox.Receiver_ID = $accountID AND inbox.R_Status = 'Sent'");
                    while($rows = mysqli_fetch_array($sql)){
                ?>
                <a class="dropdown-item d-flex align-items-center" href="inbox.php">
                    <div class="dropdown-list-image mr-3">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($rows['Image']);?>" class="rounded-circle">
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate"><?php echo $rows[2]; ?></div>
                        <div class="small text-gray-500"><?php echo $rows['FirstName']; ?> <?php echo $rows['LastName']; ?></div>
                    </div>
                </a>
                <?php } ?>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
            </div>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $acctname.' '.$lastname ?></span>
                <?php
                  if($login_profile!=''){ 
                ?>
                <img class="img-profile rounded-circle" src="data:image/jpeg;base64,<?php echo base64_encode($login_profile);?>">
                <?php }else{ ?>
                <img class="img-profile rounded-circle" src="img/user.png">
                <?php } ?>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <!--<a class="dropdown-item" href="#" data-toggle="modal" data-target="#editprofile">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>-->
                <a class="dropdown-item" href="profile.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changepass">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>
</nav>

<div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 align="center">Change Password</h4>
                </div>
                <form action="functions/change_pass.php" method="POST" onsubmit="return checkForm(this);">
                <div class="modal-body">
                    <input type="hidden" name="uname" value="<?php echo $username;?>">
                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Old Password: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="password" name="oldpword" class="form-control" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">New Password: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="password" name="newpword" class="form-control" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Confirm Password: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="password" name="rpword" class="form-control" required>
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
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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