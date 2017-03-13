<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-12">
                <h4 class="page-title">My E-card</h4>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">My E-card</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- row -->
        <div class="row">
            <?php
                foreach($info_user as $list){
                    if(isset($list['profile_picture_url']) && $list['profile_picture_url'] != '')                    
                        $avatar_url = base_url().'uploads/'.$list['profile_picture_url'];                    
                    else
                        $avatar_url = base_url().'uploads/default_avatar.png';
            ?>
            
            <div class="col-md-4 col-xs-12">
                <div class="white-box">
                    <div class="user-bg"> <img width="100%" alt="user" src="<?=$avatar_url;?>"/>
                        <div class="overlay-box">
                            <div class="user-content"> <a href="javascript:void(0)"><img src="<?=$avatar_url;?>" class="thumb-lg img-circle" alt="img"/></a>
                                <h4 class="text-white"><?php echo $list['business_name']; ?><!--Phil--></h4>
                                <h5 class="text-white"><?php echo $list['email_address']; ?><!--user@test.com--></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Business Name</strong> <br>
                            <p class="text-muted"><?php echo $list['business_name']; ?><!--East West Properties Ltd.--></p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r"> <strong>ABN Number</strong> <br>
                            <p class="text-muted"><?php echo $list['abn_number']; ?><!--1223243--></p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Director Name</strong> <br>
                            <p class="text-muted"><?php echo $list['director_name']; ?><!--Phil--></p>
                        </div>
                        <div class="col-md-3 col-xs-6"> <strong>Industry</strong> <br>
                            <p class="text-muted"><?php echo $list['industry']; ?><!--Residential--></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Address Line 1</strong> <br>
                            <p class="text-muted"><?php echo $list['address_line_1']; ?><!--House no: 400, Road no: 21--></p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Address Line 2</strong> <br>
                            <p class="text-muted"><?php echo $list['address_line_2']; ?><!--Block: G, Bashundhora R/A--></p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Office Number</strong> <br>
                            <p class="text-muted"><?php echo $list['office_number']; ?><!--0192837434--></p>
                        </div>
                        <div class="col-md-3 col-xs-6"> <strong>Mobile Number</strong> <br>
                            <p class="text-muted"><?php echo $list['mobile_number']; ?><!--9238347292--></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-xs-6 b-r"> <strong>Website</strong> <br>
                            <p class="text-muted"><?php echo $list['website']; ?><!--www.eastwestpropertiesltd.com--></p>
                        </div>
                        <div class="col-md-4 col-xs-6 b-r"> <strong>Trade License</strong> <br>
                            <p class="text-muted"><a href="<?=base_url();?>uploads/<?=$list['trade_license_url']; ?>" target="_blank" class="label label-primary"><i class="icon-cloud-download"></i> Download</a></p>
                        </div>
                        <div class="col-md-4 col-xs-6 b-r"> <strong>Insurance Certificate</strong> <br>
                            <p class="text-muted"><a href="<?=base_url();?>uploads/<?=$list['insurance_certificate_url']; ?>" target="_blank" class="label label-primary"><i class="icon-cloud-download"></i> Download</a></p>
                        </div>
                    </div>
                    <hr>
                    <h4 class="font-bold m-t-30 <?php echo $user_trade_id;?>">Trades:</h4>
                    <?php   
                       foreach ($user_trade_id as $trade_id) {                            
                           foreach ($tradeList as $aTrade) {                            
                                if ($trade_id == $aTrade['trade_id']) {
                                      echo "<span class='trade_ecard'>{$aTrade['trade_name']}</span>";
                                }                            
                            }                              
                      }                                                      
                    ?>
                    <hr>
                    <h4 class="font-bold m-t-30">Project Capabilities:</h4>
                    <?php echo $list['project_capabilities']; ?>
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
            <?php
                }
            ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->