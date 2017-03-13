<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>/assets/images/favicon.png">
        <title>IWTB - Contractor Registration, Step 1 of 3</title>
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
                    <div class="top-left-part"><a class="logo" href="<?php echo base_url(); ?>"><i class="glyphicon glyphicon-fire"></i>&nbsp;<span class="hidden-xs">My Admin</span></a></div>
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
            <!-- Page Content -->
            <div id="page-wrapper" style="margin-left: 0px;">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-lg-12">
                            <h4 class="page-title">Contractor Registration</h4>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="active">Contractor Registration</li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="white-box">
                                <center><h3>Fill in the E-card to create a profile</h3></center>
                                <center><p class="text-muted m-b-30"> Step 1 of 3: Your Company </p></center>
                                <hr>
                                <form action="registrationStepTwo" method="POST" data-toggle="validator" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputEmail" class="control-label">Business Name</label>
                                                    <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Business name" value="<?php echo @$_SESSION['business_name']?>" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputEmail" class="control-label">ABN Number</label>
                                                    <input type="number" class="form-control" id="abn_number" name="abn_number" placeholder="ABN Number" value="<?php echo @$_SESSION['abn_number']?>" required>
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
                                                    <input type="text" class="form-control" id="director_name" name="director_name" placeholder="Director Name" value="<?php echo @$_SESSION['director_name']?>" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputEmail" class="control-label">Website URL</label>
                                                    <input type="url" class="form-control" id="website" name="website" placeholder="Website URL" value="<?php echo @$_SESSION['website']?>" required>
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
                                                    <input type="text" class="form-control" id="address_line_1" name="address_line_1" placeholder="Address line 1" value="<?php echo @$_SESSION['address_line_1']?>" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputEmail" class="control-label">Address Line 2</label>
                                                    <input type="text" class="form-control" id="address_line_2" name="address_line_2" placeholder="Address line 2" value="<?php echo @$_SESSION['address_line_2']?>">
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
                                                    <input type="text" class="form-control" id="office_number" name="office_number" placeholder="Office Number" value="<?php echo @$_SESSION['office_number']?>" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputEmail" class="control-label">Mobile Number</label>
                                                    <input type="number" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number" value="<?php echo @$_SESSION['mobile_number']?>" required>
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
                                                    <select class="form-control" id="industry" name="industry" required="">
                                                        <option value="">---Select type of industry---</option>
                                                        <option <?php if(isset($_SESSION['industry']) && ($_SESSION['industry'] == "Commercial")) echo " selected ";?> value="Commercial">Commercial</option>
                                                        <option <?php if(isset($_SESSION['industry']) && ($_SESSION['industry'] == "Residential")) echo " selected ";?> value="Residential">Residential</option>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputEmail" class="control-label">Profile Image</label>
                                                    <input type="file" class="form-control btn btn-default" id="profileImage" name="profileImage">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <button type="submit" name="registrationStepOneSubmit" class="btn btn-primary">Next</button>
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