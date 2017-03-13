<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-12">
                <h4 class="page-title">View Project Proposal</h4>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Project Name</a></li>
                    <li class="active">Project Proposal</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="white-box">
                    <div class="user-bg"> <img width="100%" alt="user" src="<?php echo base_url(); ?>uploads/<?=$proposal_detail['profile_picture_url'];?>">
                        <div class="overlay-box">
                            <div class="user-content"> <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>uploads/<?=$proposal_detail['profile_picture_url'];?>" class="thumb-lg img-circle" alt="img"></a>
                                <h4 class="text-white"><?=$proposal_detail['business_name'];?></h4>
                                <h5 class="text-white"><?=$proposal_detail['email_address'];?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <div class="white-box">
                    <ul class="nav nav-tabs tabs customtab">
                        <li class="active tab"><a href="#projectProposal" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Project Proposal</span> </a> </li>
                        <li class="tab"><a href="#contactorProfile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Contractor Profile</span> </a> </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="projectProposal">
                            <div class="steamline">
                                <div class="sl-item">
                                    <div class="sl-left"></div>
                                    <hr>
                                    <div class="sl-right">
                                        <div class="m-l-40"><a href="#" class="text-info"></a>
                                            <p class="m-t-10">
                                                <?php 
                                                $baseUrl =  base_url();
                                                if($bid_detail['discard_status'] == 0)
                                                {
                                                    $biddingTime = date("d/m/Y: h:i A", strtotime($bid_detail['bid_added_on']));
                                                    /*Check Bid is shared contact or Not*/
                                                    $share_disbale = "<a class='btn btn-primary' href='{$baseUrl}employer/project/shareContactDetails/?project_id={$bid_detail['project_id']}&bid_id={$bid_detail['bid_id']}'><i class='icon-share-alt'></i> Share Contact Details</a>";
                                                    if($bid_detail['is_contact_details_shared'] == 1)
                                                    {
                                                        $share_disbale = "<a class='btn btn-primary' disabled='disabled' style='background-color: crimson;'><i class='icon-share-alt'></i> Contact Shared</a>";
                                                    }
                                                    $award_project = "<a class='btn btn-success noany_award_{$proposal_detail['trade_id']}' href='{$baseUrl}employer/project/awardProjectToBidder/?project_id={$bid_detail['project_id']}&bid_id={$bid_detail['bid_id']}' ><i class='icon-present'></i> Award Project</a>";
                                                    
                                                    if($bid_detail['bid_status'] == 'Awarded')
                                                    {
                                                        $award_project = "<a class='btn btn-success' disabled='disabled' style='background-color: crimson;'><i class='icon-share-alt'></i> Project awared</a>";
                                                                                                           
                                                    } 
                                                    echo "<p class='m-t-10'> 
                                                                        {$share_disbale}                                                                       
                                                                        {$award_project}
                                                          </p>
                                                        ";                                                   
                                                }
                                                ?>                                                
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="sl-item">
                                    <div class="sl-left"></div>
                                    <hr>
                                    <div class="sl-right">
                                        <div class="m-l-40"><a href="#" class="text-info"><?=$proposal_detail['business_name'];?></a> <span  class="sl-date">at <?=$biddingTime;?></span>
                                            <p class="m-t-10"><?=$bid_detail['bid_proposal'];?> </p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="tab-pane" id="contactorProfile">
                            <div class="white-box">
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Business Name</strong> <br>
                                        <p class="text-muted"><?=$proposal_detail['business_name'];?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>ABN Number</strong> <br>
                                        <p class="text-muted"><?=$proposal_detail['abn_number'];?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Director Name</strong> <br>
                                        <p class="text-muted"><?=$proposal_detail['director_name'];?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6"> <strong>Industry</strong> <br>
                                        <p class="text-muted"><?=$proposal_detail['industry'];?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Address Line 1</strong> <br>
                                        <p class="text-muted"><?=$proposal_detail['address_line_1'];?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Address Line 2</strong> <br>
                                        <p class="text-muted"><?=$proposal_detail['address_line_2'];?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Office Number</strong> <br>
                                        <p class="text-muted"><?=$proposal_detail['office_number'];?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6"> <strong>Mobile Number</strong> <br>
                                        <p class="text-muted"><?=$proposal_detail['mobile_number'];?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Website</strong> <br>
                                        <p class="text-muted"><?=$proposal_detail['website'];?></p>
                                    </div>
                                </div>
                                <hr>
                                <h4 class="font-bold m-t-30">Project Capabilities:</h4>
                                <p class="m-t-30">I'm 15 years experienced in working with electric materials.</p>
                                <p>So far I've completed more than 1000 projects with electric materials as chief contractor. </p>
                                <p>I was the main contractor who worked on electic materials degisn in Twin Tower, USA.</p>
                                <h4 class="font-bold m-t-30">Testimonials</h4>
                                <hr>
                                <div class="steamline">
                                    <?php
                                        $baseUrl = base_url();
                                        foreach($feedbackList as $aFeedback) {
                                            $testimonyGivenOn = date("d.m.Y", strtotime($aFeedback['testimony_given_on']));
                                            echo "
                                                  <div class='sl-item'>
                                                        <div class='sl-left'> <img src='{$baseUrl}assets/images/users/avatar.png' alt='user' class='img-circle'/> </div>
                                                        <div class='sl-right'>
                                                            <div class='m-l-40'><a href='#' class='text-info'>{$aFeedback['first_name']} {$aFeedback['surename']}</a> <span class='label label-primary'>{$aFeedback['testimony_rating']}/5</span> <span  class='sl-date'>{$testimonyGivenOn}</span>
                                                                <p class='m-t-10'> {$aFeedback['project_testimony']} </p>
                                                            </div>
                                                        </div>
                                                   </div>
                                                   <hr>  
                                                ";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->            
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <div class="form-group">                        
                        <a href="../../viewDetails/<?=$projectId;?>" class="btn btn-danger"><i class="icon-arrow-left-circle"></i> Return Project's Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->