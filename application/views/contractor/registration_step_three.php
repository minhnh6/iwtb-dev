<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">
            <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>/assets/images/favicon.png">
            <title>IWTB - Contractor Registration, Step 3 of 3</title>
            <!-- Bootstrap Core CSS -->
            <link href="<?php echo base_url(); ?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Menu CSS -->
            <link href="<?php echo base_url(); ?>/assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
            <!-- Custom CSS -->
            <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">
            <!-- Select CSS -->
            <link href="<?php echo base_url(); ?>/assets/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />

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
                  if (isset($_SESSION[$sessionPrefix . 'error'])) {
                        echo "
                         <div id='alerttopright' class='myadmin-alert myadmin-alert-img alert6 myadmin-alert-top-right' style='display: block;'> <img src='{$baseUrl}/assets/images/warning_icon.jpg' class='img' alt='img'><a href='#' class='closed'>&times;</a>
                            <h4>Operation Failed!</h4>
                            {$_SESSION[$sessionPrefix . 'error']}
                         </div>
                        ";
                        unset($_SESSION[$sessionPrefix . 'error']);
                  } else if (isset($_SESSION[$sessionPrefix . 'success'])) {
                        echo "
                         <div id='alerttopright' class='myadmin-alert myadmin-alert-img alert3 myadmin-alert-top-right' style='display: block;'> <img src='{$baseUrl}/assets/images/success_icon.png' class='img' alt='img'> <a href='#' class='closed'>&times;</a>
                            <h4>Operation successful!</h4>
                            {$_SESSION[$sessionPrefix . 'success']}
                         </div>
                        ";
                        unset($_SESSION[$sessionPrefix . 'success']);
                  }
                  ?>
                  <!-- notification showing section for all pages, with JS -->
                  <div class="notificationShowingDiv">
                        <div id='alerttopright' class='myadmin-alert myadmin-alert-img alert6 myadmin-alert-top-right errorNotificationAlert'> <img src='<?php echo base_url(); ?>/assets/images/warning_icon.jpg' class='img' alt='img'><a href='#' class='closed'>&times;</a>
                              <h4>Operation Failed!</h4>
                              <div id="errorMessage"></div>
                        </div>
                  </div>
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
                                    <div class="col-md-12">
                                          <div class="white-box">
                                                <center><h3>Fill in the E-card to create a profile</h3></center>
                                                <center><p class="text-muted m-b-30"> Step 3 of 3: Your Account </p></center>
                                                <hr>
                                                <form action="" method="POST" data-toggle="validator">
                                                      <div class="row">
                                                            <div class="col-sm-12">
                                                                  <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                              <label for="inputEmail" class="control-label">Email Address</label>
                                                                              <input type="email" class="form-control btn-default" id="email_address" name="email_address" placeholder="Enter your email.." value="<?php echo @$_SESSION['email_address'] ?>" required>
                                                                              <div class="help-block with-errors"></div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                              <label for="inputEmail" class="control-label">Trade</label>
                                                                              <!-- code_huy -->
                                                                               <select class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose Category" name="trade_id[]" id="trade_id" required="">
                                                                                    <optgroup label="Select multiple categories">
                                                                                          <?php
                                                                                          foreach ($tradeList as $aTrade) {
                                                                                                $selectHtml = "";
                                                                                                if (in_array($aTrade['trade_id'], $_POST['trade_id'])) {
                                                                                                      $selectHtml = " selected ";
                                                                                                }
                                                                                                echo "<option value='{$aTrade['trade_id']}' {$selectHtml}>{$aTrade['trade_name']}</option>";
                                                                                          }
                                                                                          ?>
                                                                                    </optgroup>
                                                                              </select>
                                                                              <!-- end code_huy -->
                                                                              <div class="help-block with-errors"></div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div class="row">
                                                            <div class="col-sm-12">
                                                                  <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                              <label for="inputEmail" class="control-label">Password</label>
                                                                              <input type="password" class="form-control btn-default" id="password" name="password" required>
                                                                              <div class="help-block with-errors"></div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                              <label for="inputEmail" class="control-label">Confirm Password</label>
                                                                              <input type="password" class="form-control btn-default" id="rePassword" name="rePassword" required>
                                                                              <div class="help-block with-errors"></div>
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
                                                                                    if(isset($state) && is_array($state)){
                                                                                          foreach ($state as $value) {
                                                                                                $selected = !empty($_SESSION['state']) ? $_SESSION['state'] == $value['id'] ? 'selected' : '' : '';
                                                                                                echo '<option '.$selected.' value="'.$value['id'].'">'.$value['name'].'</option>';
                                                                                          }
                                                                                    }
                                                                                    ?>
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
                                                                              <button type="submit" name="registrationStepThreeSubmit" id="registrationStepThreeSubmit" class="btn btn-primary">Sign Up</button>
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

            <script src="<?php echo base_url(); ?>/assets/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>/assets/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>

            <script type="text/javascript">
                  $(document).ready(function () {
                        $(".select2").select2();
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