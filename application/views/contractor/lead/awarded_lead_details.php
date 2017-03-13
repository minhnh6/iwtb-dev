<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
           
            <div class="col-lg-12">
                <h4 class="page-title">Lead Details</h4>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="active">Lead Details</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <center><h3><?=$projectDetails['name'];?></h3></center>
                    <?php
                    if($bid_detail['bid_status'] == 'Awarded')
                    {
                        ?>
                         <center>
                            <p class="text-muted m-b-30 label-da">
                                <a class="btn-danger"> ** The Client is offering this project to you! **</a>  
                                <a class="btn btn-success" href="<?php echo base_url();?>contractor/lead/acceptAwardProject/<?=$projectDetails['project_id'];?>/<?=$bid_detail['bid_id'];?>"><i class="icon-like"></i> ACCEPT</a>
                                <a class="btn btn-danger" href="<?php echo base_url();?>contractor/lead/rejecttAwardProject/<?=$projectDetails['project_id'];?>/<?=$bid_detail['bid_id'];?>"><i class="icon-dislike"></i> REJECT</a>
                            </p>
                        </center>
                        <?php
                    }
                    ?>
                   
                    <hr>
                      <div class="col-sm-12">
             <!-- code_huy -->
						<?php
                        if(count($project_imgs) > 0)
                        { ?>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">                              
                                    <div class="form-group">
                                                <table role="presentation" class="table table-striped">
                                                    <tbody class="files">
                                                        <?php                                                        
                                                            foreach( $project_imgs as $img)
                                                            {
																	$image = basename(base_url('/'.$img['url_img']));
																	$filesize = strlen(file_get_contents(base_url('/'.$img['url_img'])));
																	$filesize = round(($filesize / 1024),2);
                                                                ?>
                                                                 <tr class="template-download">
                                                                    <td>
                                                                        <span class="preview">
                                                                                <a href="<?php echo base_url().'/'.$img['url_img']; ?>" title="<?= $image;?>" download="<?= $image;?>" data-gallery>
																					<img width="100px" height="auto" src="<?php echo base_url().'/'.$img['url_img']; ?>">
																				</a>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <p class="name">
                                                                                <a href="<?php echo base_url().'/'.$img['url_img']; ?>" title="<?= $image;?>" download="<?= $image;?>"><?= $image;?></a>
                                                                        </p>
                                                                    </td>
                                                                    <td>
                                                                        <span class="size"><?= $filesize ?> KB</span>
                                                                    </td>                                                            
                                                                </tr>
                                                                <?php
                                                            }
                                                        
                                                        ?>
                                            </tbody>
                                        </table>                                                                      
                                    </div>                          
                            </div>
                        </div>
                        <hr />
                        <?php
                        }
                        ?>
						<!-- end code_huy -->
                        </div>
                    <form action="" method="POST" data-toggle="validator">
                        <center><h3>Main Details</h3></center>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">I want to build</label>
                                        <input type="text" class="form-control" placeholder="Project title.." value="<?=$projectDetails['name'];?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputEmail" class="control-label">Project Details & Brief</label>
                                        <textarea style="height: 150px;" class="form-control" id="inputEmail" placeholder="Project details.." disabled="disabled"><?=$projectDetails['description'];?></textarea>                                        
                                    
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
                                        <input type="text" class="form-control" value="<?=$employerDetails['title'];?> <?=$employerDetails['surename'];?> <?=$employerDetails['first_name'];?>" disabled="disabled" >                                       
                                  
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Email address</label>
                                        <input type="email" class="form-control" value="<?=$employerDetails['email_address'];?>" disabled="disabled">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Contact</label>
                                        <input type="text" class="form-control" value="<?=$employerDetails['phone_number'];?>" disabled="disabled">
                                    
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Address Line 1</label>
                                       <input type="email" class="form-control" value="<?=$employerDetails['address_line_1'];?>" disabled="disabled">
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Address Line 2</label>
                                        <input type="text" class="form-control" value="<?=$employerDetails['address_line_2'];?>" disabled="disabled">
                                        
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                       <label for="inputName1" class="control-label">Suburb</label>
                                       <input type="email" class="form-control" value="<?=$employerDetails['suburb'];?>" disabled="disabled">
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Postal Code</label>
                                         <input type="text" class="form-control" value="<?=$employerDetails['post_code'];?>" disabled="disabled">
                                    
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
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
                                       <input type="text" class="form-control" placeholder="Sector" value="<?=$projectDetails['sector'];?>" disabled="disabled">
                                      
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">I'm hiring an</label>
                                         <select class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose Category" disabled="disabled">
                                            <optgroup label="Select multiple categories">
                                                <?php
                                                foreach($projectTradeCustomList as $trade)
                                                {
                                                    ?>
                                                        <option value="<?=$trade['trade_id'];?>" selected><?=$trade['trade_name'];?></option>
                                                    <?php
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
                                        <select class="form-control" disabled="disabled">
                                            <option value="<?=$projectDetails['budget_range'];?>" selected=""><?=$projectDetails['budget_range'];?></option>
                                        </select>                                        
                                    </div>
                                </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if($projectDetails['fixed_budget'] == 0)
                                        {
                                            $projectDetails['fixed_budget'] = '';
                                        }
                                        ?>
                                        <label for="inputName1" class="control-label">Fixed Budget</label>
                                        <select class="form-control" disabled="disabled">                                                                                  
                                            <option value="<?=$projectDetails['fixed_budget'];?>" selected=""><?=$projectDetails['fixed_budget'];?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Inspection Required</label>
                                        <select class="form-control" disabled="disabled">
                                            <?php
                                            $status = 'Yes';
                                            if($projectDetails['is_inspection_required'] == 'N')
                                            {
                                                $status = 'No';
                                            }
                                            ?>                                        
                                            <option value="<?=$projectDetails['is_inspection_required'];?>" selected=""><?=$status;?></option>                                           
                                        </select>                                        
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">DA Approval Required</label>
                                        <select class="form-control" disabled="disabled">
                                            <?php
                                            $status = 'Yes';
                                            if($projectDetails['is_da_approval_required'] == 'N')
                                            {
                                                $status = 'No';
                                            }
                                            ?>                                        
                                            <option value="<?=$projectDetails['is_da_approval_required'];?>" selected=""><?=$status;?></option>                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <center><h3>Additional Features</h3></center>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group checkbox checkbox-success">
                                        <?php
                                        $checked = '';
                                        if($projectDetails['is_urgent_project'] == 'Y')
                                        {
                                            $checked = 'checked';
                                        }
                                        ?>
                                        <input type="checkbox" name="checkbox" id="checkbox3" value="" <?=$checked;?> disabled="disabled">
                                        <label for="checkbox3"> Urgent Project($30) </label>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="display: none !important;">
                                    <div class="form-group">
                                        <div class="form-group checkbox checkbox-success">
                                           <?php
                                            $checked = '';
                                            if($projectDetails['is_hiring_iwtb_expert'] == 'Y')
                                            {
                                                $checked = 'checked';
                                            }
                                            ?>
                                            <input type="checkbox" name="checkbox" id="checkbox3" value="" <?=$checked;?> disabled="disabled">
                                            <label for="checkbox3"> Hire an IWTB expert </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <center><h3>My Bid Details</h3></center>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">My Bid</label>
                                         <input type="text" class="form-control" placeholder="" value="<?=$bid_detail['bid_amount'];?>" disabled="disabled">
                                  
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputEmail" class="control-label">My Proposal</label>
                                         <textarea style="height: 150px;" class="form-control" id="inputEmail" placeholder="Bid proposal" disabled="disabled"><?=$bid_detail['bid_proposal'];?></textarea>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-default"><i class="icon-envelope"></i> Contact IWTB</button>
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
<script type="text/javascript">
    $(document).ready(function(){
        $(".myAwarded").addClass("active");
        $(".myAwarded a").addClass("active");
    });
</script>