<div id="page-wrapper">
      <div class="container-fluid">
            <div class="row bg-title">
                  <div class="col-lg-12">
                        <h4 class="page-title">View Project Bids</h4>
                        <ol class="breadcrumb">
                              <li><a href="#">Home</a></li>
                              <li><a href="#"><?php echo $projectDetails['name']; ?></a></li>
                              <li class="active">Project Bids</li>
                        </ol>
                  </div>
                  <!-- /.col-lg-12 -->
            </div>
            <!-- row -->
            <div class="row">
                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                              <hr>

                              <form action="" method="POST" data-toggle="validator">
                                    <center><h3><?php echo $projectDetails['name']; ?></h3></center>
                                    <center><p class="text-muted m-b-30"> Project details with complete bids! </p></center>
                                    <?php
                                    if (count($project_imgs) > 0) {
                                          ?>
                                          <hr>
                                          <div class="row">
                                                <div class="col-sm-12">
                                                      <div class="col-sm-12">                                   
                                                            <div class="form-group">
                                                                  <table role="presentation" class="table table-striped">
                                                                        <tbody class="files">
                                                                              <!-- code_huy -->
                                                                              <?php
                                                                              foreach ($project_imgs as $img) {
                                                                                    $image = basename(base_url('/' . $img['url_img']));
                                                                                    $filesize = strlen(file_get_contents(base_url('/' . $img['url_img'])));
                                                                                    $filesize = round(($filesize / 1024), 2);
                                                                                    ?>
                                                                                    <tr class="template-download fade">
                                                                                          <td>
                                                                                                <span class="preview">
                                                                                                      <a href="<?php echo base_url() . '/' . $img['url_img']; ?>" title="<?= $image; ?>" download="<?= $image; ?>" data-gallery>
                                                                                                            <img width="100px" height="auto" src="<?php echo base_url() . '/' . $img['url_img']; ?>">
                                                                                                      </a>
                                                                                                </span>
                                                                                          </td>
                                                                                          <td>
                                                                                                <p class="name">
                                                                                                      <a href="<?php echo base_url() . '/' . $img['url_img']; ?>" title="<?= $image; ?>" download="<?= $image; ?>"><?= $image; ?></a>
                                                                                                </p>
                                                                                          </td>
                                                                                          <td>
                                                                                                <span class="size"><?= $filesize ?> KB</span>
                                                                                          </td>                                                            
                                                                                    </tr>
                                                                                    <?php
                                                                              }
                                                                              ?>
                                                                              <!-- end code_huy -->
                                                                        </tbody>
                                                                  </table>                                                                      
                                                            </div>
                                                      </div>                               
                                                </div>
                                          </div>
                                          <hr />
                                          <?php
                                    }
                                    ?>
                                    <center><h3>Main Details</h3></center>
                                    <hr>
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputName1" class="control-label">I want to build</label>
                                                            <input type="text" class="form-control" value="<?php echo $projectDetails['name']; ?>" readonly="">
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputEmail" class="control-label">Project Details & Brief</label>
                                                            <textarea style="height: 150px;" class="form-control"  readonly=""><?php echo $projectDetails['description']; ?></textarea>
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <hr>
                                    <center><h3>Contact Details</h3></center>
                                    <hr>
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputName1" class="control-label">Name</label>
                                                            <input type="text" class="form-control" value="<?php echo $employerDetails['title'] . " " . $employerDetails['first_name'] . " " . $employerDetails['surename']; ?>" readonly="">
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputName1" class="control-label">Email address</label>
                                                            <input type="email" class="form-control" value="<?php echo $employerDetails['email_address']; ?>" readonly="">
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputName1" class="control-label">Contact</label> 
                                                            <input type="text" class="form-control" value="<?php echo $employerDetails['phone_number']; ?>" readonly="">
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputName1" class="control-label">Address Line 1</label>
                                                            <input type="email" class="form-control" value="<?php echo $employerDetails['address_line_1']; ?>" readonly="">
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputName1" class="control-label">Address Line 2</label>
                                                            <input type="text" class="form-control" value="<?php echo $employerDetails['address_line_2']; ?>" readonly="">
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputName1" class="control-label">Suburb</label>
                                                            <input type="text" class="form-control" name="suburb" value="<?php echo $employerDetails['suburb']; ?>" readonly="">
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputName1" class="control-label">Postal Code</label>
                                                            <input type="text" class="form-control" value="<?php echo $employerDetails['post_code']; ?>" readonly="">
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <div class="alert alert-info"><i class="icon-note"></i> Note that, your contact details will not be shared publicly. But you will be shared only with the contractors you approve.</div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <hr>
                                    <center><h3>Project Details</h3></center>
                                    <hr>
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputName1" class="control-label">Sector</label>
                                                            <select class="form-control" name="sector" id="sector" disabled="">
                                                                  <option value="">---Select A Sector---</option>
                                                                  <option <?php if (isset($projectDetails['sector']) && ($projectDetails['sector'] == "Commercial")) echo " selected "; ?> value="Commercial">Commercial</option>
                                                                  <option <?php if (isset($projectDetails['sector']) && ($projectDetails['sector'] == "Residential")) echo " selected "; ?> value="Residential">Residential</option>
                                                            </select>
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputName1" class="control-label">Hire A</label>
                                                            <select class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose Category" name="trades[]" id="trades" disabled="">
                                                                  <optgroup label="Select multiple categories">
                                                                        <?php
                                                                        foreach ($tradeList as $aTrade) {
                                                                              $selectHtml = "";
                                                                              if (in_array($aTrade['trade_id'], $projectTradeCustomList))
                                                                                    $selectHtml = " selected ";
                                                                              echo "<option value='{$aTrade['trade_id']}' {$selectHtml}>{$aTrade['trade_name']}</option>";
                                                                        }
                                                                        ?>
                                                                  </optgroup>
                                                            </select>
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputName1" class="control-label">Project Budget</label>
                                                            <select class="form-control" id="budget_range" name="budget_range" disabled="">
                                                                  <option value="">---Select any price range---</option>
                                                                  <option <?php if (isset($projectDetails['budget_range']) && ($projectDetails['budget_range'] == "<2500")) echo " selected "; ?> value="<2500"><2500</option>
                                                                  <option <?php if (isset($projectDetails['budget_range']) && ($projectDetails['budget_range'] == "2500-3000")) echo " selected "; ?> value="2500-3000">2500-3000</option>
                                                                  <option <?php if (isset($projectDetails['budget_range']) && ($projectDetails['budget_range'] == ">3000")) echo " selected "; ?> value=">3000">>3000</option>
                                                            </select>
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputName1" class="control-label">OR Mention a fixed price</label>
                                                            <?php
                                                            if($projectDetails['fixed_budget'] == 0)
                                                            {
                                                                $projectDetails['fixed_budget'] = '';
                                                            }
                                                            ?>
                                                            <input type="number" min="0.01" step=".000000001" class="form-control" name="fixed_budget" id="fixed_budget" value="<?php echo $projectDetails['fixed_budget']; ?>" disabled="">
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputName1" class="control-label">Inspection Required</label>
                                                            <select class="form-control" id="is_inspection_required" name="is_inspection_required" disabled="">
                                                                  <option value="">---Select if inspection is required---</option>
                                                                  <option <?php if (isset($projectDetails['is_inspection_required']) && ($projectDetails['is_inspection_required'] == "Y")) echo " selected "; ?> value="Y">Yes</option>
                                                                  <option <?php if (isset($projectDetails['is_inspection_required']) && ($projectDetails['is_inspection_required'] == "N")) echo " selected "; ?> value="N">No</option>
                                                            </select>
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="inputName1" class="control-label">DA Approval Required</label>
                                                            <select class="form-control" id="is_da_approval_required" name="is_da_approval_required" disabled=""> 
                                                                  <option value="">---Select if DA approval is required---</option>
                                                                  <option <?php if (isset($projectDetails['is_da_approval_required']) && ($projectDetails['is_da_approval_required'] == "Y")) echo " selected "; ?> value="Y">Yes</option>
                                                                  <option <?php if (isset($projectDetails['is_da_approval_required']) && ($projectDetails['is_da_approval_required'] == "N")) echo " selected "; ?> value="N">No</option>
                                                            </select>
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>

                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                      <div class="form-group">
                                                            <label for="State" class="control-label">State</label>
                                                            <input type="text" class="form-control" value="<?php echo $state['name']; ?>" readonly="">
                                                            <div class="help-block with-errors"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <hr>
                                    <center><h3>Additional Features</h3></center>
                                    <hr>
                                    <div class="row">
                                          <div class="col-sm-12">
                                                <div class="col-sm-3">
                                                      <div class="form-group checkbox checkbox-success">
                                                            <input type="checkbox" name="is_urgent_project" value="Y" id="checkbox3" <?php if (isset($projectDetails['is_urgent_project'])) echo " checked "; ?> disabled="">
                                                            <label for="checkbox3"> Urgent Project($30) </label>
                                                      </div>
                                                </div>
                                                <div class="col-sm-3" style="display: none !important;">
                                                      <div class="form-group">
                                                            <div class="form-group checkbox checkbox-success">
                                                                  <input type="checkbox" name="is_hiring_iwtb_expert" value="Y" id="checkbox3" <?php if (isset($projectDetails['is_hiring_iwtb_expert'])) echo " checked "; ?> disabled="">
                                                                  <label for="checkbox3"> Hire an IWTB expert </label>
                                                            </div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-3">
                                                      <div class="form-group">
                                                            <div class="form-group checkbox checkbox-success">
                                                                  <a href="../edit/<?= $projectDetails['project_id']; ?>" class="btn btn-primary"><i class="icon-note"></i> Add A Variation</a>
                                                            </div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-3">
                                                      <div class="form-group">
                                                            <div class="form-group checkbox checkbox-success">
                                                                  <span class="endProjectloadingImage"><img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif"></span>
                                                                  <?php
                                                                  if ($projectDetails['project_status'] == "Open") {
                                                                        echo "<a href='javascript:void(0);' id='{$projectDetails['project_id']}' class='btn btn-danger endProjectButton'><i class='endProjectIcon icon-flag'></i>  End Project</a>";
                                                                  } else {
                                                                        echo "<a class='btn btn-success'><i class='icon-check'></i> Ended</a>";
                                                                  }
                                                                  ?>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </form>
                              <hr>
                              <center><h3>Active Bids</h3></center>
                              <hr>
                              <!-- Nav tabs -->
                              <ul class="nav nav-tabs" role="tablist">
                                    <?php
                                    $count = 0;
                                    foreach ($projectTradeList as $aProjectTrade) {
                                          $activeClass = "";
                                          if ($count == 0)
                                                $activeClass = "active";
                                          $count++;
                                          echo "<li role='presentation' class='{$activeClass}'><a href='#trade_{$aProjectTrade['trade_id']}' aria-controls='home' role='tab' data-toggle='tab'><span class='visible-xs'><i class='ti-home'></i></span><span class='hidden-xs'> {$aProjectTrade['trade_name']}</span></a></li>";
                                    }
                                    ?>
                              </ul>
                              <!-- Tab panes -->
                              <div class="tab-content">
                                    <?php
                                    $baseUrl = base_url();
                                    $count = 0;
     
                                    foreach ($projectTradeList as $aProjectTrade) {
     
                                          $activeClass = "";
                                          $number_award = 0;
                                          if ($count == 0)
                                                $activeClass = "active";
                                          $count++;
                                          echo "
                                            <div role='tabpanel' class='tab-pane {$activeClass}' id='trade_{$aProjectTrade['trade_id']}'>
                                                <div class='col-md-10'>
                                                    <div class='steamline'>";
                                          if (isset($bidCustomList[$aProjectTrade['trade_id']])) {
                                                $hide_award = '';
                                                foreach ($bidCustomList[$aProjectTrade['trade_id']] as $aBid) {
                                                      if ($aBid['discard_status'] == 0) {
                                                            $biddingTime = date("d/m/Y: h:i A", strtotime($aBid['bid_added_on']));
                                                            /* Check Bid is shared contact or Not */
                                                            $share_disbale = "<a class='btn btn-primary' href='{$baseUrl}employer/project/shareContactDetails/?project_id={$projectDetails['project_id']}&bid_id={$aBid['bid_id']}'><i class='icon-share-alt'></i> Share Contacts</a>";
                                                            if ($aBid['is_contact_details_shared'] == 1) {
                                                                  $share_disbale = "<a class='btn btn-primary' disabled='disabled' style='background-color: crimson;'><i class='icon-share-alt'></i> Contact Shared</a>";
                                                            }
                                                            $award_project = "<a class='btn btn-success noany_award_{$aProjectTrade['trade_id']}' href='{$baseUrl}employer/project/awardProjectToBidder/?project_id={$projectDetails['project_id']}&bid_id={$aBid['bid_id']}' ><i class='icon-present'></i> Award Project</a>";
                                                            $show_discards = "<div class='sl-absolute'><a href='{$baseUrl}employer/project/discardBid/{$aBid['bid_id']}' title='Discard this bid'><i class='fa fa-times'></i></a></div>";
                                                            if ($aBid['bid_status'] == 'Awarded') {
                                                                  $award_project = "<a class='btn btn-success' disabled='disabled' style='background-color: crimson;'><i class='icon-share-alt'></i> Project awared</a>";
                                                                  $show_discards = '';
                                                                  $number_award ++;
                                                            }
                                                            $hight_light = '';
                                                            if ($aBid['resubmit_status'] == 1) {
                                                                  $hight_light = 'yellow_hightlight';
                                                            }
                                                            if ( $aBid['bid_status'] == 'Accepted') {
                                                                  $award_project = "<a class='btn btn-success' disabled='disabled' style='background-color: crimson;'><i class='icon-share-alt'></i> Accepted award</a>";
                                                            }
                                                            $feedbackButton = "";
                                                            if ($projectDetails['project_status'] == "Ended" && $aBid['bid_status'] == 'Accepted') {
                                                                  $award_project = '';
                                                                  if ($aBid['project_testimony'] == "") {
                                                                        $feedbackButton = "<a class='btn btn-info leaveFeedbackButton' data-project-name='{$projectDetails['name']}' data-reciever-name='{$aBid['business_name']}' id='{$aBid['project_id']}/{$aBid['user_id']}/{$aBid['bid_id']}'><i class='icon-note'></i> Leave A Feedback</a>";
                                                                  } else {
                                                                        $feedbackButton = "<a class='btn btn-success'><i class='icon-check'></i> Feedback Provided</a>";
                                                                  }
                                                            }
                                                            echo "
                                                                        <div class='sl-item {$hight_light}' style='position: relative;'>
                                                                        {$show_discards}                                                                    
                                                                        <div class='sl-left'> <img src='{$baseUrl}uploads/{$aBid['profile_picture_url']}' alt='user' class='img-circle'/> </div>
                                                                        <div class='sl-right'>
                                                                            <div class='m-l-40'><a href='#' class='text-info'>{$aBid['business_name']}</a> <span  class='sl-price'><b>\${$aBid['bid_amount']}</b></span> <span  class='sl-date'><i>[{$biddingTime}]</i></span>
                                                                                <p class='m-t-10'>{$aBid['bid_proposal']}</p>
                                                                                <p class='m-t-10'> 
                                                                                    {$share_disbale}
                                                                                    <a class='btn btn-default' href='../viewProjectProposal/{$projectDetails['project_id']}/{$aBid['bid_id']}'><i class='icon-eye'></i> View Full proposals</a>
                                                                                    {$award_project}
                                                                                    <a class='btn btn-success messageButton' data-project-name='{$projectDetails['name']}' data-reciever-name='{$aBid['business_name']}' id='{$aBid['project_id']}/{$aBid['user_id']}'><i class='icon-pencil'></i> Message</a>
                                                                                    {$feedbackButton}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    ";
                                                            if ($number_award > 0) {
                                                                  echo '
                                                                    <style type="text/css">
                                                                        .noany_award_' . $aProjectTrade['trade_id'] . '
                                                                        {
                                                                            display: none;
                                                                        }
                                                                    </style>';
                                                            }
                                                      }
                                                }
                                          }
                                          echo "</div>
                                                </div>
                                                <div class='clearfix'></div>
                                            </div>
                                        ";
                                    }
                                    ?>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<input type="hidden" name="baseUrl" id="baseUrl" value="<?php echo base_url(); ?>">

<!-- /#page-wrapper -->
<div id="responsive-modal" class="modal fade messageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
            <div class="modal-content">
                  <form action="" method="POST" data-toggle="validator" class="messageSendingForm">
                        <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#10007;</button>
                              <h4 class="modal-title modalTitle">Project name </h4> 
                              <i><h6 class="modal-title"><b>To:</b> <snap class="recieverName"></span></h6></i>
                        </div>
                        <div class="modal-body">
                              <div class="form-group">
                                    <label for="recipient-name" class="control-label">Enter message:  <span class="loadingImage"><img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif"></span> <span class="messageSendingStatus"><span></label>
                                                      <textarea class="form-control" style="height: 150px;" placeholder="Enter your message here..." id="content" name="bid_proposal" required=""></textarea>
                                                      </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="messageSubmit" class="btn btn-inverse waves-effect waves-light messageSubmit">Send</button>
                                                      </div>
                                                      </form>
                                                      </div>
                                                      </div>
                                                      </div>
                                                      <!-- feedback modal to provide feedback to the contractors -->
                                                      <div id="responsive-modal" class="modal fade feedbackModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog">
                                                                  <div class="modal-content">
                                                                        <form action="" method="POST" data-toggle="validator" class="feedbackProvidingForm">
                                                                              <div class="modal-header">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#10007;</button>
                                                                                    <h4 class="modal-title">Leave Feedback For - <span class='modalTitle'>Project name</span> </h4> 
                                                                                    <h6 class="modal-title">To: <snap class="recieverName"></span></h6>
                                                                              </div>
                                                                              <div class="modal-body">
                                                                                    <div class="form-group" style="overflow: hidden;">
                                                                                          <label for="recipient-name" class="control-label pull-left">Rate It: </label>
                                                                                          <div class="rating control-label pull-left">
                                                                                                <span class="ratingStar" id="5">&#9734;</span><span class="ratingStar" id="4">&#9734;</span><span class="ratingStar" id="3">&#9734;</span><span class="ratingStar" id="2">&#9734;</span><span class="ratingStar" id="1">&#9734;</span>
                                                                                          </div>
                                                                                          <div style="clear: both;"></div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                          <label for="recipient-name" class="control-label">Feedback:  <span class="feedbackLoadingImage"><img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif"></span> <span class="feedbackPostingStatus"><span></label>
                                                                                                            <textarea class="form-control" style="height: 150px;" placeholder="Enter your Feedback Message here..." id="feedback" name="feedback" required=""></textarea>
                                                                                                            </div>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                                                                  <button type="submit" name="messageSubmit" class="btn btn-inverse waves-effect waves-light feedbackSubmit">Send</button>
                                                                                                            </div>
                                                                                                            </form>
                                                                                                            </div>
                                                                                                            </div>
                                                                                                            </div>

                                                                                                            <!-- code_huy -->
                                                                                                            <div id="blueimp-gallery" class="blueimp-gallery " style="display: none;">
                                                                                                                  <div class="slides"></div>
                                                                                                                  <h3 class="title"></h3>
                                                                                                                  <a class="prev">‹</a>
                                                                                                                  <a class="next">›</a>
                                                                                                                  <a class="close">×</a>
                                                                                                                  <a class="play-pause"></a>
                                                                                                                  <ol class="indicator"></ol>
                                                                                                            </div>
                                                                                                            <!--end code_huy -->

                                                                                                            <script type="text/javascript">
                                                                                                                  $(document).ready(function () {
                                                                                                                        var baseUrl = $("#baseUrl").val();
                                                                                                                        var projectId_recieverId = "";
                                                                                                                        var rating = 0;
                                                                                                                        $(".messageButton").click(function () {
                                                                                                                              var modalTitle = $(this).data('projectName');
                                                                                                                              var recieverName = $(this).data('recieverName');
                                                                                                                              projectId_recieverId = $(this).attr("id");
                                                                                                                              $(".modalTitle").html(modalTitle);
                                                                                                                              $(".recieverName").html(recieverName);
                                                                                                                              $(".messageModal").modal();
                                                                                                                        });
                                                                                                                        $(".messageSendingForm").submit(function (e) {
                                                                                                                              e.preventDefault();
                                                                                                                              if ($(this)[0].checkValidity()) {
                                                                                                                                    $(".loadingImage").show();
                                                                                                                                    var targetUrl = baseUrl + "employer/message/sendMessageFromBidList/" + projectId_recieverId;
                                                                                                                                    var content = $("#content").val();
                                                                                                                                    $.ajax({
                                                                                                                                          method: "POST",
                                                                                                                                          url: targetUrl,
                                                                                                                                          data: {content: content}
                                                                                                                                    })
                                                                                                                                            .done(function (msg) {
                                                                                                                                                  $(".loadingImage").hide();
                                                                                                                                                  if (msg) {
                                                                                                                                                        $(".messageSendingStatus").html("<label class='label label-success'>Message has been sent successfully!</label>");
                                                                                                                                                  } else {
                                                                                                                                                        $(".messageSendingStatus").html("<label class='label label-danger'>There was a problem in sending message!</label>");
                                                                                                                                                  }
                                                                                                                                            })
                                                                                                                                            .fail(function () {
                                                                                                                                                  $(".loadingImage").hide();
                                                                                                                                                  $(".messageSendingStatus").html("<label class='label label-danger'>There was a problem in sending message!</label>");
                                                                                                                                            });
                                                                                                                              }
                                                                                                                        });
                                                                                                                        //////////// ending the project ////////////////////////////////////////////////////
                                                                                                                        $(".endProjectButton").click(function () {
                                                                                                                              var projectId = $(this).attr("id");
                                                                                                                              var baseUrl = $("#baseUrl").val();
                                                                                                                              $(".loadingImage").show();
                                                                                                                              $.ajax({
                                                                                                                                    method: "POST",
                                                                                                                                    url: baseUrl + "employer/project/endProject/" + projectId
                                                                                                                              })
                                                                                                                                      .done(function (msg) {
                                                                                                                                            $(".loadingImage").hide();
                                                                                                                                            if (msg) {
                                                                                                                                                  $(".endProjectButton").html("<i class='icon-check'></i>  Ended");
                                                                                                                                                  $(".endProjectButton").removeClass("btn-danger").addClass("btn-success").removeClass("endProjectButton").unbind();
                                                                                                                                                  showSuccessAlert("Your project has been marked as Ended, you can provide feedback to contractors now.", baseUrl)
                                                                                                                                                  setTimeout(function () {
                                                                                                                                                        location.reload();
                                                                                                                                                  }, 2000);
                                                                                                                                            } else {
                                                                                                                                                  showDangerAlert("Your project is already marked as Ended!", baseUrl);
                                                                                                                                            }
                                                                                                                                      })
                                                                                                                                      .fail(function () {
                                                                                                                                            $(".loadingImage").hide();
                                                                                                                                            showDangerAlert("There was a problem in ending project, please try again later!", baseUrl);
                                                                                                                                      });
                                                                                                                        });
                                                                                                                        /////////////////////////////////leave feedback /////////////////////////////////////////
                                                                                                                        var feedbackUri = "";
                                                                                                                        $(".leaveFeedbackButton").click(function () {
                                                                                                                              var baseUrl = $("#baseUrl").val();
                                                                                                                              var projectName = $(this).data("projectName");
                                                                                                                              var recieverName = $(this).data("recieverName");
                                                                                                                              feedbackUri = $(this).attr("id");
                                                                                                                              $(".modalTitle").text(projectName);
                                                                                                                              $(".recieverName").text(recieverName);
                                                                                                                              $(".feedbackModal").modal();
                                                                                                                        });
                                                                                                                        $(".feedbackProvidingForm").submit(function (e) {
                                                                                                                              e.preventDefault();
                                                                                                                              $(".feedbackLoadingImage").show();
                                                                                                                              if ($(this)[0].checkValidity()) {
                                                                                                                                    var feedback = $("#feedback").val();
                                                                                                                                    $.ajax({
                                                                                                                                          method: "POST",
                                                                                                                                          url: baseUrl + "employer/project/leaveFeedback/" + feedbackUri,
                                                                                                                                          data: {feedback: feedback, rating: rating}
                                                                                                                                    })
                                                                                                                                            .done(function (msg) {
                                                                                                                                                  $(".feedbackLoadingImage").hide();
                                                                                                                                                  if (msg) {
                                                                                                                                                        $(".leaveFeedbackButton").removeClass("btn-info").addClass("btn-success").html("<i class='icon-check'></i> Feedback Provided").unbind();
                                                                                                                                                        $(".feedbackPostingStatus").html("<label class='label label-success'>Feedback has been posted successfully!</label>");
                                                                                                                                                  } else {
                                                                                                                                                        $(".feedbackPostingStatus").html("<label class='label label-danger'>There was a problem in posting feedback!</label>");
                                                                                                                                                  }
                                                                                                                                            })
                                                                                                                                            .fail(function () {
                                                                                                                                                  $(".feedbackLoadingImage").hide();
                                                                                                                                                  $(".feedbackPostingStatus").html("<label class='label label-danger'>There was a problem in posting feedback!</label>");
                                                                                                                                            });
                                                                                                                              }
                                                                                                                        });
                                                                                                                        $(".ratingStar").click(function () {
                                                                                                                              $(".rating > span").removeClass("markedStar");
                                                                                                                              rating = $(this).attr("id");
                                                                                                                              rating = parseInt(rating);
                                                                                                                              $(".rating > span").each(function (index) {
                                                                                                                                    var currentId = $(this).attr("id");
                                                                                                                                    currentId = parseInt(currentId);
                                                                                                                                    if (currentId > rating)
                                                                                                                                          return;
                                                                                                                                    $(this).addClass("markedStar");
                                                                                                                              });
                                                                                                                        });
                                                                                                                        ///////////////////////////////////done with providing feedback //////////////////////////////////
                                                                                                                  });
                                                                                                                  function showSuccessAlert(message, baseUrl) {
                                                                                                                        var successAlertHtml = "<div id='alerttopright' class='myadmin-alert myadmin-alert-img alert3 myadmin-alert-top-right' style='display: block;'> <img src='" + baseUrl + "/assets/images/success_icon.png' class='img' alt='img'>" +
                                                                                                                                "<h4>Operation successful!</h4>" +
                                                                                                                                message +
                                                                                                                                "</div>";
                                                                                                                        $(".commonNotificationDiv").html(successAlertHtml);
                                                                                                                        setTimeout(function () {
                                                                                                                              $(".commonNotificationDiv").html("");
                                                                                                                        }, 2000);
                                                                                                                  }
                                                                                                                  function showDangerAlert(message, baseUrl) {
                                                                                                                        var dangerAlertHtml = "<div id='alerttopright' class='myadmin-alert myadmin-alert-img alert6 myadmin-alert-top-right' style='display: block;'> <img src='" + baseUrl + "/assets/images/warning_icon.jpg' class='img' alt='img'>" +
                                                                                                                                "<h4>Operation Failed!</h4>" +
                                                                                                                                message +
                                                                                                                                "</div>";
                                                                                                                        $(".commonNotificationDiv").html(dangerAlertHtml);
                                                                                                                        setTimeout(function () {
                                                                                                                              $(".commonNotificationDiv").html("");
                                                                                                                        }, 2000);
                                                                                                                  }
                                                                                                            </script>
                                                                                                            <style>
                                                                                                                  .loadingImage{display: none;}
                                                                                                                  .endProjectloadingImage{display: none;}
                                                                                                                  .feedbackLoadingImage{display: none;}
                                                                                                                  .rating {
                                                                                                                        unicode-bidi: bidi-override;
                                                                                                                        direction: rtl;
                                                                                                                  }
                                                                                                                  .rating > span {
                                                                                                                        display: inline-block;
                                                                                                                        position: relative;
                                                                                                                        width: 1.1em;
                                                                                                                  }
                                                                                                                  .rating > span:hover:before,
                                                                                                                  .rating > span:hover ~ span:before {
                                                                                                                        content: "\2605";
                                                                                                                        position: absolute;
                                                                                                                  }
                                                                                                                  .markedStar:before {
                                                                                                                        content: "\2605";
                                                                                                                        position: absolute;
                                                                                                                  }
                                                                                                            </style>
                                                                                                            <style>
                                                                                                                  .fade
                                                                                                                  {
                                                                                                                        opacity: 1;
                                                                                                                  }
                                                                                                                  .table {
                                                                                                                        margin-top: 15px;
                                                                                                                  }
                                                                                                            </style>