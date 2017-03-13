<?php
$date = new DateTime($expirite_day);
$expirite_day = $date->format('d-M-Y H:i:s');
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-12">
                <h4 class="page-title">My Membership</h4>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="active">Current Membership Plan</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">                    
                    <center><h3>Current Membership Plan: <?=$member_level;?></h3></center>
                    <center><p class="text-muted m-b-30"> Expire Date: <?=$expirite_day;?> </p></center>
                    <hr>
                    <div class="row pricing-plan">
                        <div class="col-md-3 col-xs-12 col-sm-6 no-padding">
                            <div class="pricing-box">
                                <div class="pricing-body b-l">
                                    <div class="pricing-header">
                                        <h4 class="text-center">Silver</h4>
                                        <h2 class="text-center"><span class="price-sign">$</span>110.00 <small> + GST</small> </h2>
                                        <p class="uppercase">per month</p>
                                    </div>
                                    <div class="price-table-content">
                                        <div class="price-row"><i class="icon-user"></i> 3 Members</div>
                                        <div class="price-row"><i class="icon-screen-smartphone"></i> Single Device</div>
                                        <div class="price-row"><i class="icon-drawar"></i> 50GB Storage</div>
                                        <div class="price-row"><i class="icon-refresh"></i> Monthly Backups</div>
                                        <div class="price-row">
                                            <button class="btn btn-success changeMembershipButton waves-effect waves-light m-t-20">Change Membership</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-6 no-padding">
                            <div class="pricing-box b-l">
                                <div class="pricing-body">
                                    <div class="pricing-header">
                                        <h4 class="text-center">Gold</h4>
                                        <h2 class="text-center"><span class="price-sign">$</span>299.00 <small> + GST</small> </h2>
                                        <p class="uppercase">per quarter</p>
                                    </div>
                                    <div class="price-table-content">
                                        <div class="price-row"><i class="icon-user"></i> 5 Members</div>
                                        <div class="price-row"><i class="icon-screen-smartphone"></i> Single Device</div>
                                        <div class="price-row"><i class="icon-drawar"></i> 80GB Storage</div>
                                        <div class="price-row"><i class="icon-refresh"></i> Monthly Backups</div>
                                        <div class="price-row">
                                            <button class="btn btn-success changeMembershipButton waves-effect waves-light m-t-20">Change Membership</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-6 no-padding">
                            <div class="pricing-box featured-plan">
                                <div class="pricing-body">
                                    <div class="pricing-header">
                                        <h4 class="price-lable text-white bg-warning"> Popular</h4>
                                        <h4 class="text-center">Platinum</h4>
                                        <h2 class="text-center"><span class="price-sign">$</span>549.00 <small> + GST</small></h2>
                                        <p class="uppercase">per half yearly</p>
                                    </div>
                                    <div class="price-table-content">
                                        <div class="price-row"><i class="icon-user"></i> 10 Members</div>
                                        <div class="price-row"><i class="icon-screen-smartphone"></i> Single Device</div>
                                        <div class="price-row"><i class="icon-drawar"></i> 120GB Storage</div>
                                        <div class="price-row"><i class="icon-refresh"></i> Monthly Backups</div>
                                        <div class="price-row">
                                            <button class="btn btn-lg btn-info changeMembershipButton waves-effect waves-light m-t-20">Change Membership</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-6 no-padding">
                            <div class="pricing-box">
                                <div class="pricing-body b-r">
                                    <div class="pricing-header">
                                        <h4 class="text-center">Dimond</h4>
                                        <h2 class="text-center"><span class="price-sign">$</span>998.00 <small> + GST</small></h2>
                                        <p class="uppercase">per year</p>
                                    </div>
                                    <div class="price-table-content">
                                        <div class="price-row"><i class="icon-user"></i> 15 Members</div>
                                        <div class="price-row"><i class="icon-screen-smartphone"></i> Single Device</div>
                                        <div class="price-row"><i class="icon-drawar"></i> 1TB Storage</div>
                                        <div class="price-row"><i class="icon-refresh"></i> Monthly Backups</div>
                                        <div class="price-row">
                                            <button class="btn btn-success changeMembershipButton waves-effect waves-light m-t-20">Change Membership</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#10007;</button>
                    <h4 class="modal-title">Please provide password to update membership plan to: PREMIUM till 1/4/2017</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Current Password:</label>
                        <input type="password" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Re-type Password:</label>
                        <input type="password" class="form-control" id="message-text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-inverse waves-effect waves-light">Update Membership</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".changeMembershipButton").click(function(){
            $("#responsive-modal").modal();
        });
    });
</script>

<style>
    .pricing-header h2 small {
        font-size: 35%;
    }
</style>