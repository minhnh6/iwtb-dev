<?php
$project_name_highlight = '';
if(in_array('name', $tracker_change) )
{
    $project_name_highlight = 'update_highlight';
}
$project_description_highlight = '';
if(in_array('description', $tracker_change) )
{
    $project_description_highlight = 'update_highlight';
}
$project_sector_highlight = '';
if(in_array('sector', $tracker_change) )
{
    $project_sector_highlight = 'update_highlight';
}
$project_budget_range_highlight = '';
if(in_array('budget_range', $tracker_change) )
{
    $project_budget_range_highlight = 'update_highlight';
}
$project_fixed_budget_highlight = '';
if(in_array('fixed_budget', $tracker_change) )
{
    $project_fixed_budget_highlight = 'update_highlight';
}
$project_is_inspection_highlight = '';
if(in_array('is_inspection_required', $tracker_change) )
{
    $project_is_inspection_highlight = 'update_highlight';
}
$project_is_da_approval_highlight = '';
if(in_array('is_da_approval_required', $tracker_change) )
{
    $project_is_da_approval_highlight = 'update_highlight';
}
$project_is_urgent_project_highlight = '';
if(in_array('is_urgent_project', $tracker_change) )
{
    $project_is_urgent_project_highlight = 'update_highlight';
}
$project_is_hiring_iwtb_expert_highlight = '';
if(in_array('is_hiring_iwtb_expert', $tracker_change) )
{
    $project_is_hiring_iwtb_expert_highlight = 'update_highlight';
}

$project_note = '';
if(in_array('last_updated_on', $tracker_change) )
{
    $project_note = '<div class="update_note"><strong>Variation done on '.$projectDetails['last_updated_on'].'</strong></div>';
}
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-12">
                <h4 class="page-title">Bid Details</h4>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="active">Bid Details</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- row -->
        <div class="row">
            
            <div class="col-sm-12">
                <div class="white-box">
                    <center><h3><?=$projectDetails['name'];?></h3></center>
                    <?=$project_note;?>
                    <center>My Bid Details</center>                    
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
                        <center><h3>Main Details</h3></center>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">I want to build</label>
                                        <input type="text" class="form-control <?=$project_name_highlight;?>" placeholder="Project title.." value="<?=$projectDetails['name'];?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputEmail" class="control-label">Project Details & Brief</label>
                                        <textarea style="height: 150px;" class="form-control <?=$project_description_highlight ;?>" id="inputEmail" placeholder="Project details.." disabled="disabled"><?=$projectDetails['description'];?></textarea>                                        
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
                                        <input type="text" class="form-control <?=$project_sector_highlight ;?>" placeholder="Sector" value="<?=$projectDetails['sector'];?>" disabled="disabled">
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
                                        <select class="form-control <?=$project_budget_range_highlight  ;?>" disabled="disabled">                                           
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
                                        <select class="form-control <?=$project_fixed_budget_highlight ;?>" disabled="disabled">
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
                                        <select class="form-control <?=$project_is_inspection_highlight ;?>" disabled="disabled">
                                            <?php
                                            $status = 'Yes';
                                            if($projectDetails['is_inspection_required'] == 'N')
                                            {
                                                $status = 'No';
                                            }
                                            ?>                                        
                                            <option value="<?=$projectDetails['is_inspection_required'];?>" selected=""><?=$status;?></option>                                           
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">DA Approval Required</label>
                                        <select class="form-control <?=$project_is_da_approval_highlight;?>" disabled="disabled">
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
                                    <div class="form-group checkbox checkbox-success ">
                                        <?php
                                        $checked = '';
                                        if($projectDetails['is_urgent_project'] == 'Y')
                                        {
                                            $checked = 'checked';
                                        }
                                        ?>
                                        <input type="checkbox" name="is_urgent_project" id="is_urgent_project" value="" <?=$checked;?> disabled="disabled">
                                        <label for="is_urgent_project" class="<?=$project_is_urgent_project_highlight ;?>"> Urgent Project($30) </label>
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
                                            <input type="checkbox" name="is_hiring_iwtb_expert" id="is_hiring_iwtb_expert" value="" <?=$checked;?> disabled="disabled">
                                            <label for="is_hiring_iwtb_expert" class="<?=$project_is_hiring_iwtb_expert_highlight ;?>"> Hire an IWTB expert </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                         <?php
                        if($bid_detail['is_contact_details_shared'] == 1)
                        {
                            ?>
                            <center><h3>Employer Contact Details</h3></center>
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
                            <?php
                        }
                        ?>
                        <form action="<?=base_url();?>contractor/lead/myBidDetails/<?=$projectDetails['project_id'];?>" method="POST">
                            <input type="hidden" name="bid_id" value="<?=$bid_detail['bid_id'];?>" />
                            <center><h3>My Bid Details</h3></center>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputName1" class="control-label">My Bid</label>
                                            <?php                                        
                                            /* $disable = 'disabled="disabled"';
                                            if(count($tracker_change) > 0)
                                            {
                                                $disable = '';
                                            } */
                                            $disable = '';
                                            ?>
                                            <input type="number" min="0.01" step=".000000001" class="form-control" placeholder="" name="bid_amount" value="<?=$bid_detail['bid_amount'];?>" <?=$disable;?> />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputEmail" class="control-label">My Proposal</label>                                       
                                            <textarea style="height: 150px;" class="form-control" id="inputEmail" placeholder="Bid proposal" name="bid_proposal" <?=$disable;?>><?=$bid_detail['bid_proposal'];?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>                       
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success" value="Update Bid" name="resubmit_bid" <?=$disable;?>>
                                            <a href="<?=base_url();?>contractor/lead/contractorDiscardBid/<?=$bid_detail['bid_id'];?>" class="btn btn-danger" target="_self"><i class="icon-close"></i> Discard Bid</a>
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
        $(".myBids").addClass("active");
        $(".myBids a").addClass("active");
    });
</script>