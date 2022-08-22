<?php 	
session_start();
if (empty($_SESSION['uname'])) {
    header('location:index.php');
}
require('admin.php'); 
$obj = new Admin;
$k = $obj->getAdmin($_SESSION['id']);
$agent_id=$_SESSION['id'];

$pix= $k['a_pix'];
if (empty($pix)) {
    $pix = 'avatar.png';
}

 ?>
        <?php
                 require('include/dashheaders.php');
                  ?>
 
 
                     <?php
                 require('include/sidebar.php');
                  ?>
                    <div class="col-lg-7 col-md-6 col-xs-6 pl-3 offset-lg-1 offset-md-3">  <?php
                        require('include/mobile-dashboard.php');
                        ?>
                      
                        <div class="my-address">
                            <h3 class="heading pt-0">Change Password</h3>
                            
                            <form action="passwordprocess.php"  method="POST">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="form-group name">
                                         <input type="hidden" name="a_id" class="d-none" value="<?php echo $agent_id; ?>">
                                            <label>Current Password</label>
                                            <input type="password" name="pwd" class="form-control" placeholder="Current Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group email">
                                            <label>New Password</label>
                                            <input type="password" name="npwd" class="form-control" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 ">
                                        <div class="form-group subject">
                                            <label>Confirm New Password</label>
                                            <input type="password" name="cpwd" class="form-control" placeholder="Confirm New Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="send-btn mt-2">
                                            <button type="submit" class="btn btn-common" name="update">Send Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
				require('include/dashfooter.php');
				 ?>