<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-12">
                <h4 class="page-title">My Profile</h4>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="active">Edit profile</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <center><h3>My Profile</h3></center>
                    <center><p class="text-muted m-b-30"> Edit your current information to update! </p></center>
                    <hr>
                    <form action="" method="POST" data-toggle="validator">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Title</label>
                                        <select class="form-control" name="title" id="title" required>
                                            <option value="">--- Please select any title ---</option>
                                            <option <?php if(isset($employerDetails['title']) && ($employerDetails['title'] == "Mr.")) echo " selected ";?> value="Mr.">Mr.</option>
                                            <option <?php if(isset($employerDetails['title']) && ($employerDetails['title'] == "Mrs.")) echo " selected ";?> value="Mrs.">Mrs.</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputEmail" class="control-label">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" <?php echo @"value='{$employerDetails['first_name']}'"?> placeholder="First name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputEmail" class="control-label">Surname</label>
                                        <input type="text" class="form-control" name="surename" id="surename" <?php echo @"value='{$employerDetails['surename']}'"?> placeholder="Surname" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputEmail" class="control-label">Phone number</label>
                                        <input type="text" class="form-control" name="phone_number" id="phone_number" <?php echo @"value='{$employerDetails['phone_number']}'"?> placeholder="Phone number" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputEmail" class="control-label">Address Line 1</label>
                                        <input type="text" class="form-control" name="address_line_1" id="address_line_1" <?php echo @"value='{$employerDetails['address_line_1']}'"?> placeholder="Address line 1" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputEmail" class="control-label">Address Line 2</label>
                                        <input type="text" class="form-control" name="address_line_2" id="address_line_2" <?php echo @"value='{$employerDetails['address_line_2']}'"?> placeholder="Address line 2" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputEmail" class="control-label">Suburb</label>
                                        <input type="text" class="form-control" name="suburb" id="suburb" <?php echo @"value='{$employerDetails['suburb']}'"?> placeholder="Suburb" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputEmail" class="control-label">Postcode</label>
                                        <input type="number" class="form-control" name="post_code" id="post_code" <?php echo @"value='{$employerDetails['post_code']}'"?> placeholder="Ex. 1234" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputEmail" class="control-label">Email address</label>
                                        <input type="email" class="form-control" id="email_address" name="email_address" <?php echo @"value='{$employerDetails['email_address']}'"?> placeholder="Ex. someone@anything.com" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="state" class="control-label">State</label>
                                        <input type="text" class="form-control"  <?php echo @"value='{$state['name']}'"?> disabled="" >
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputEmail" class="control-label">Change Password</label>
                                        <button  data-toggle="modal" data-target="#responsive-modal" type="button" class="form-control btn btn-success model_img"><i class="icon-note"></i> Click Here To Change Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <button type="submit" name="submitButton" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" data-toggle="validator">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#10007;</button>
                    <h4 class="modal-title">Change your current password:</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Current Password:</label>
                        <input type="password" name="currentPassword" class="form-control" id="currentPassword" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">New Password:</label>
                        <input type="password" name="newPassword" class="form-control" id="newPassword" required="">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Re-type New Password:</label>
                        <input type="password" name="rePassword" class="form-control" id="rePassword" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" name="passwordChangeButtonSubmit" class="btn btn-inverse waves-effect waves-light">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>