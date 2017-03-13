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
                              <center><p class="text-muted m-b-30"> Edit your currrent information to update! </p></center>
                              <hr>
                              <center> <h4>Company Details</h4> </center>
                              <hr>
                              <form action="" method="POST" enctype="multipart/form-data" data-toggle="validator">
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">Business Name</label>
                                                            <input type="text" class="form-control" id="business_name" name="business_name"  placeholder="Business name" value="<?php echo @$contractorDetails['business_name']; ?>" required>
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">ABN Number</label>
                                                            <input type="text" class="form-control" id="abn_number" name="abn_number" placeholder="ABN Number" value="<?php echo @$contractorDetails['abn_number']; ?>" required>
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">Director Name</label>
                                                            <input type="text" class="form-control" id="director_name" name="director_name" placeholder="Director Name" value="<?php echo @$contractorDetails['director_name']; ?>" required>
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">Website URL</label>
                                                            <input type="text" class="form-control" id="website" name="website" placeholder="Website URL" value="<?php echo @$contractorDetails['website']; ?>" required>
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
                                                            <input type="text" class="form-control" id="address_line_1" name="address_line_1" placeholder="Address line 1" value="<?php echo @$contractorDetails['address_line_1']; ?>" required>
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">Address Line 2</label>
                                                            <input type="text" class="form-control" id="address_line_2" name="address_line_2" placeholder="Address line 2" value="<?php echo @$contractorDetails['address_line_2']; ?>" required>
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">Office Number</label>
                                                            <input type="text" class="form-control" id="office_number" name="office_number" placeholder="Office Number" value="<?php echo @$contractorDetails['office_number']; ?>" required>
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">Mobile Number</label>
                                                            <input type="number" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number" value="<?php echo @$contractorDetails['mobile_number']; ?>" required>
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">Industry</label>
                                                            <select class="form-control" name="industry" name="industry" id="industry">
                                                                  <option value="">---Select type of industry---</option>
                                                                  <option <?php if (isset($contractorDetails['industry']) && ($contractorDetails['industry'] == "Commercial")) echo " selected "; ?> value="Commercial">Commercial</option>
                                                                  <option <?php if (isset($contractorDetails['industry']) && ($contractorDetails['industry'] == "Residential")) echo " selected "; ?> value="Residential">Residential</option>
                                                            </select>
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">Profile Image</label>
                                                            <input type="file" class="form-control btn btn-default" id="profileImage" name="profileImage">
                                                            <div class="help-block with-errors"></div>
                                                            <span class="help-block"><small>Upload profile picture to change it or leave it empty.</small></span>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">State</label>
                                                            <select name="state" class="form-control" required>
                                                                  <option value="">--Select State--</option>
                                                                  <?php
                                                                  if (isset($state) && is_array($state)) {
                                                                        foreach ($state as $value) {
                                                                              !empty($contractorDetails['state_id']) ? $contractorDetails['state_id'] == $value['id'] ? $selected = 'selected' : $selected = '' : '';
                                                                              echo '<option '.$selected.' value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                                                        }
                                                                  }
                                                                  ?>
                                                            </select>
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">Trades: </label>
                                                            <?php   
                                                           foreach ($user_trade_id as $trade_id) {                            
                                                               foreach ($tradeList as $aTrade) {                            
                                                                    if ($trade_id == $aTrade['trade_id']) {
                                                                          echo "<span class='trade_ecard'>{$aTrade['trade_name']}</span>";
                                                                    }                            
                                                                }                              
                                                          }                                                                                                                                           
                                                        ?>
                                                        </div> 
                                                </div>
                                          </div>
                                    </div>
                                    <hr>
                                    <center> <h4>Qualifications and Capabilities</h4> </center>
                                    <hr>
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">Trade License</label>
                                                            <input type="file" class="form-control btn-default" id="trade_license" name="trade_license">
                                                            <div class="help-block with-errors"></div>
                                                            <span class="help-block">
                                                                  <small>Upload trade license to change it or leave it empty.</small>
                                                                  <?php
                                                                  $baseUrl = base_url();
                                                                  if ($contractorDetails['trade_license_url'] != "")
                                                                        echo "<a class='label label-primary' href='{$baseUrl}/uploads/{$contractorDetails['trade_license_url']}' download>Download trade license</a>";
                                                                  else
                                                                        echo "<a class='label label-danger'>No trade license available</a>";
                                                                  ?>
                                                            </span>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">Insurance Certificate</label>
                                                            <input type="file" class="form-control btn-default" id="insurance_certificate" name="insurance_certificate">
                                                            <div class="help-block with-errors"></div>
                                                            <span class="help-block">
                                                                  <small>Upload insurance certificate to change it or leave it empty.</small>
                                                                  <?php
                                                                  if ($contractorDetails['insurance_certificate_url'] != "")
                                                                        echo "<a class='label label-primary' href='{$baseUrl}/uploads/{$contractorDetails['insurance_certificate_url']}' download>Download insurance certificate</a>";
                                                                  else
                                                                        echo "<a class='label label-danger'>No trade license available</a>";
                                                                  ?>
                                                            </span>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">Project Capabilities</label>
                                                            <textarea class="form-control" style="height: 150px;" name="project_capabilities" id="project_capabilities" name="project_capabilities" placeholder="Describe your project capabilities here.." required><?php echo $contractorDetails['project_capabilities'] ?></textarea>
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">Legal Options (T&C)</label>
                                                            <div class="form-group checkbox checkbox-success">
                                                                  <input type="checkbox" name="legal_option" id="checkbox3" value="option_1" <?php if (isset($contractorDetails['legal_option']) && $contractorDetails['legal_option'] == "option_1") echo " checked "; ?>>
                                                                  <label for="checkbox3"> Option 1 </label>
                                                            </div>
                                                            <div class="form-group checkbox checkbox-success">
                                                                  <input type="checkbox" name="legal_option" id="checkbox3" value="option_2" <?php if (isset($contractorDetails['legal_option']) && $contractorDetails['legal_option'] == "option_2") echo " checked "; ?>>
                                                                  <label for="checkbox3"> Option 2 </label>
                                                            </div>
                                                            <div class="form-group checkbox checkbox-success">
                                                                  <input type="checkbox" name="legal_option" id="checkbox3" value="option_3" <?php if (isset($contractorDetails['legal_option']) && $contractorDetails['legal_option'] == "option_3") echo " checked "; ?>>
                                                                  <label for="checkbox3"> Option 3 </label>
                                                            </div>
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <hr>
                                    <center> <h4>Change Password</h4> </center>
                                    <hr>
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">Password</label>
                                                            <input type="password" class="form-control btn-default" id="password" name="password">
                                                            <div class="help-block with-errors"></div>
                                                            <span class="help-block"><small>Provide password to change it or leave it empty.</small></span>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">Re-type Password</label>
                                                            <input type="password" class="form-control btn-default" id="rePassword" name="rePassword">
                                                            <div class="help-block with-errors"></div>
                                                            <span class="help-block"><small>Type further password to when you need to change it.</small></span>
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
                  <form action="" method="POST">
                        <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#10007;</button>
                              <h4 class="modal-title">Change your current password:</h4>
                        </div>
                        <div class="modal-body">
                              <div class="form-group">
                                    <label for="recipient-name" class="control-label">Current Password:</label>
                                    <input type="password" class="form-control" id="recipient-name">
                              </div>
                              <div class="form-group">
                                    <label for="recipient-name" class="control-label">New Password:</label>
                                    <input type="password" class="form-control" id="recipient-name">
                              </div>
                              <div class="form-group">
                                    <label for="message-text" class="control-label">Re-type New Password:</label>
                                    <input type="password" class="form-control" id="message-text">
                              </div>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-inverse waves-effect waves-light">Save changes</button>
                        </div>
                  </form>
            </div>
      </div>
</div>
<script type="text/javascript">
      $(document).ready(function () {
            $('[name=legal_option]:checkbox').on('change', function () {
                  var th = $(this), name = th.prop('name');
                  if (th.is(':checked')) {
                        $(':checkbox[name="' + name + '"]').not($(this)).prop('checked', false);
                  }
            });
      });
</script>