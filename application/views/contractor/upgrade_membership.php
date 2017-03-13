<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>/assets/images/favicon.png">
        <title>IWTB - Contractor Membership upgrade</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Menu CSS -->
        <link href="<?php echo base_url(); ?>/assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Preloader -->
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
                <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                    <div class="top-left-part"><a class="logo" href="index.html"><i class="glyphicon glyphicon-fire"></i>&nbsp;<span class="hidden-xs">My Admin</span></a></div>
                    <ul class="nav navbar-top-links navbar-right pull-right">
                        <li>
                            <form role="search" class="app-search hidden-xs">
                                <input type="text" placeholder="Search..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-header -->
                <!-- /.navbar-top-links -->
                <!-- /.navbar-static-side -->
            </nav>
            <?php
                $baseUrl = base_url();
                if( isset($_SESSION[$sessionPrefix.'error']) ){
                    echo "
                         <div id='alerttopright' class='myadmin-alert myadmin-alert-img alert6 myadmin-alert-top-right' style='display: block;'> <img src='{$baseUrl}/assets/images/warning_icon.jpg' class='img' alt='img'><a href='#' class='closed'>&times;</a>
                            <h4>Operation Failed!</h4>
                            {$_SESSION[$sessionPrefix.'error']}
                         </div>
                        ";
                     unset($_SESSION[$sessionPrefix.'error']);       
                }
                else if( isset($_SESSION[$sessionPrefix.'success']) ) {
                    echo "
                         <div id='alerttopright' class='myadmin-alert myadmin-alert-img alert3 myadmin-alert-top-right' style='display: block;'> <img src='{$baseUrl}/assets/images/success_icon.png' class='img' alt='img'> <a href='#' class='closed'>&times;</a>
                            <h4>Operation successful!</h4>
                            {$_SESSION[$sessionPrefix.'success']}
                         </div>
                        ";
                     unset($_SESSION[$sessionPrefix.'success']);
                }
            ?>
            <!-- notification showing section for all pages, with JS -->
            <div class="notificationShowingDiv">
                <div id='alerttopright' class='myadmin-alert myadmin-alert-img alert6 myadmin-alert-top-right errorNotificationAlert'> <img src='<?php echo base_url();?>/assets/images/warning_icon.jpg' class='img' alt='img'><a href='#' class='closed'>&times;</a>
                    <h4>Operation Failed!</h4>
                    <div id="errorMessage"></div>
                 </div>
            </div>
            <!-- Page Content -->
            <div id="page-wrapper" style="margin-left: 0px;">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-lg-12">
                            <h4 class="page-title">Contractor Membership upgrade</h4>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="active">Membership upgrade</li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">
                                <center><h3>Please select any membership to continue with your contractor account!</h3></center>
                                <hr>
                                <div class="row pricing-plan">

                                    <div class="col-md-3 col-xs-12 col-sm-6 no-padding"></div>

                                    <div class="col-md-3 col-xs-12 col-sm-6 no-padding">
                                        <div class="pricing-box b-l">
                                            <div class="pricing-body">
                                                <div class="pricing-header">
                                                    <h4 class="text-center">Gold</h4>
                                                    <h2 class="text-center"><span class="price-sign">$</span>110 + GST</h2>
                                                    <p class="uppercase">per month</p>
                                                </div>
                                                <div class="price-table-content">
                                                    <div class="price-row"><i class="icon-user"></i> 5 Members</div>
                                                    <div class="price-row"><i class="icon-screen-smartphone"></i> Single Device</div>
                                                    <div class="price-row"><i class="icon-drawar"></i> 80GB Storage</div>
                                                    <div class="price-row"><i class="icon-refresh"></i> Monthly Backups</div>
                                                    <div class="price-row">
                                                        <button class="btn btn-success waves-effect waves-light m-t-20 membershipSelectButton" id="1">Select</button>
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
                                                    <h2 class="text-center"><span class="price-sign">$</span>100</h2>
                                                    <p class="uppercase">per month</p>
                                                </div>
                                                <div class="price-table-content">
                                                    <div class="price-row"><i class="icon-user"></i> 10 Members</div>
                                                    <div class="price-row"><i class="icon-screen-smartphone"></i> Single Device</div>
                                                    <div class="price-row"><i class="icon-drawar"></i> 120GB Storage</div>
                                                    <div class="price-row"><i class="icon-refresh"></i> Monthly Backups</div>
                                                    <div class="price-row">
                                                        <button class="btn btn-lg btn-info waves-effect waves-light m-t-20 membershipSelectButton" id="2">Select</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <form action="" method="POST" data-toggle="validator">
                                    <input type="hidden" name="membership_plan_id" id="membership_plan_id">
                                    <a href="logout" class="btn btn-danger"><i class="icon-arrow-left-circle"></i> LOGOUT</a>
                                    <button type="submit" name="buttonSubmit" class="btn btn-success pull-right" id="continueSubmit"><i class="icon-arrow-right-circle"></i> Continue To Pay With E-Way</button>
                                    <div style="clear: both;"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
            <footer class="footer text-center"> 2016 &copy; Myadmin brought to you by themedesigner.in </footer>
        </div>
        <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Menu Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>/assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>
        <!--Nice scroll JavaScript -->
        <script src="<?php echo base_url(); ?>/assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/validator.js"></script>
        <!--Wave Effects -->
        <script src="<?php echo base_url(); ?>/assets/js/waves.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url(); ?>/assets/js/myadmin.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".membershipSelectButton").click(function(){
                    var membership_plan_id = $(this).attr("id");
                    $("#membership_plan_id").val(membership_plan_id);
                    $(this).closest(".pricing-box").css("background-color", "#ddd");
                });
                $("#continueSubmit").click(function(){
                    var membership_plan_id = $("#membership_plan_id").val();
                    if(membership_plan_id == "") {
                        $("#errorMessage").html("Please select any Membership Plan!");
                        $(".errorNotificationAlert").show();
                        return false;
                    }
                });
            });
        </script>
        <!-- Start of LiveChat (www.livechatinc.com) code -->
    <script type="text/javascript">
    window.__lc = window.__lc || {};
    window.__lc.license = 8615564;
    (function() {
      var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
      lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
    })();
    </script>
    <!-- End of LiveChat code -->
    </body>
</html>