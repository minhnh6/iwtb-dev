<!-- code_huy -->
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css"> 
<!-- end code_huy -->
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
                    <center><h3><?php echo $leadDetails['name'];?></h3></center>
                    <form action="" method="POST" data-toggle="validator">
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
						<center><h3>Main Details</h3></center>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">I want to build</label>
                                        <input type="text" class="form-control" value="<?php echo $leadDetails['name'];?>" disabled="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputEmail" class="control-label">Project Details & Brief</label>
                                        <textarea style="height: 150px;" class="form-control" id="inputEmail" disabled=""><?php echo $leadDetails['description'];?></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <hr>
                        <center><h3>Contact Details</h3></center>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Name</label>
                                        <input type="text" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Email address</label>
                                        <input type="email" class="form-control">
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
                                        <input type="text" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Address Line 1</label>
                                        <input type="email" class="form-control">
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
                                        <input type="text" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Suburb</label>
                                        <input type="email" class="form-control">
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
                                        <input type="text" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    </div>
                                </div>
                            </div>
                        </div>
                        -->
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
                                            <option <?php if(isset($leadDetails['sector']) && ($leadDetails['sector'] == "Commercial")) echo " selected ";?> value="Commercial">Commercial</option>
                                            <option <?php if(isset($leadDetails['sector']) && ($leadDetails['sector'] == "Residential")) echo " selected ";?> value="Residential">Residential</option>
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
                                                    foreach( $tradeList as $aTrade ){
                                                        $selectHtml = "";
                                                        if(in_array($aTrade['trade_id'], $projectTradeList))
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
                                            <option <?php if(!isset($leadDetails['budget_range']) || ($leadDetails['budget_range'] == "")) echo " selected ";?> value=""></option>
                                            <option <?php if(isset($leadDetails['budget_range']) && ($leadDetails['budget_range'] == "<2500")) echo " selected ";?> value="<2500"><2500</option>
                                            <option <?php if(isset($leadDetails['budget_range']) && ($leadDetails['budget_range'] == "2500-3000")) echo " selected ";?> value="2500-3000">2500-3000</option>
                                            <option <?php if(isset($leadDetails['budget_range']) && ($leadDetails['budget_range'] == ">3000")) echo " selected ";?> value=">3000">>3000</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">OR A fixed price</label>
                                        <?php
                                        if($leadDetails['fixed_budget'] == 0)
                                        {
                                            $leadDetails['fixed_budget'] = '';
                                        }
                                        ?>
                                        <input type="number" min="0" step=".000000001" class="form-control" name="fixed_budget" id="fixed_budget" value="<?php echo $leadDetails['fixed_budget'];?>" disabled="">
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
                                            <option <?php if(isset($leadDetails['is_inspection_required']) && ($leadDetails['is_inspection_required'] == "Y")) echo " selected ";?> value="Y">Yes</option>
                                            <option <?php if(isset($leadDetails['is_inspection_required']) && ($leadDetails['is_inspection_required'] == "N")) echo " selected ";?> value="N">No</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">DA Approval Required</label>
                                        <select class="form-control" id="is_da_approval_required" name="is_da_approval_required" disabled=""> 
                                            <option <?php if(isset($leadDetails['is_da_approval_required']) && ($leadDetails['is_da_approval_required'] == "Y")) echo " selected ";?> value="Y">Yes</option>
                                            <option <?php if(isset($leadDetails['is_da_approval_required']) && ($leadDetails['is_da_approval_required'] == "N")) echo " selected ";?> value="N">No</option>
                                        </select>
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
                                <div class="col-sm-6">
                                    <div class="form-group checkbox checkbox-success">
                                        <input type="checkbox" name="is_urgent_project" value="Y" id="checkbox3" <?php if($leadDetails['is_urgent_project'] == "Y" ) echo " checked ";?> disabled="">
                                        <label for="checkbox3"> Urgent Project($30) </label>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="display: none !important;">
                                    <div class="form-group">
                                        <div class="form-group checkbox checkbox-success">
                                            <input type="checkbox" name="is_hiring_iwtb_expert" value="Y" id="checkbox3" <?php if($leadDetails['is_hiring_iwtb_expert'] == "Y") echo " checked ";?> disabled="">
                                            <label for="checkbox3"> Hire an IWTB expert </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#responsive-modal"><i class="icon-paper-clip"></i> Place Bid</button>
                                        <!-- <button type="button" class="btn btn-danger"><i class="icon-close"></i> Discard Lead</button> -->
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
</div>
<!-- /#page-wrapper -->
<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" data-toggle="validator">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#10007;</button>
                    <h4 class="modal-title">Enter your proposal details</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Bid amount</label>
                        <input type="number" min="0" step=".001" class="form-control" id="bid_amount" name="bid_amount" placeholder="Ex. $1500" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Write proposal</label>
                        <textarea class="form-control" style="height: 150px;" placeholder="Enter your complete proposal here..." id="bid_proposal" name="bid_proposal" required=""></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" name="bidSubmit" class="btn btn-inverse waves-effect waves-light">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- code_huy -->
<!-- setup gallery -->
<div id="blueimp-gallery" class="blueimp-gallery " style="display: none;">
	<div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
<!-- end code_huy -->
<script type="text/javascript">
    $(document).ready(function(){
        $(".myLeads").addClass("active");
        $(".myLeads a").addClass("active");
    });
</script>

<!-- code_huy -->
<!-- blueimp Gallery script -->
<script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- end code_huy -->