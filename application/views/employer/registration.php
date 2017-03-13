<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">
            <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>/assets/images/favicon.png">
            <title>Employer - Registration</title>
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
                  <!-- Page Content -->
                  <div id="page-wrapper" style="margin-left: 0px;">
                        <div class="container-fluid">
                              <div class="row bg-title">
                                    <div class="col-lg-12">
                                          <h4 class="page-title">Employer Registration</h4>
                                          <ol class="breadcrumb">
                                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                                <li class="active">Employer Registration</li>
                                          </ol>
                                    </div>
                                    <!-- /.col-lg-12 -->
                              </div>
                              <?php
                              $baseUrl = base_url();
                              if (isset($_SESSION[$sessionPrefix . 'error'])) {
                                    echo "
                                 <div id='alerttopright' class='myadmin-alert myadmin-alert-img alert6 myadmin-alert-top-right' style='display: block;'> <img src='{$baseUrl}/assets/images/warning_icon.jpg' class='img' alt='img'> <a href='#' class='closed'>&times;</a>
                                    <h4>Registration Failed!</h4>
                                    {$_SESSION[$sessionPrefix . 'error']}
                                 </div>
                                ";
                                    unset($_SESSION[$sessionPrefix . 'error']);
                              } else if (isset($_SESSION[$sessionPrefix . 'success'])) {
                                    echo "
                                 <div id='alerttopright' class='myadmin-alert myadmin-alert-img alert3 myadmin-alert-top-right' style='display: block;'> <img src='{$baseUrl}/assets/images/success_icon.png' class='img' alt='img'> <a href='#' class='closed'>&times;</a>
                                    <h4>Registration successful!</h4>
                                    {$_SESSION[$sessionPrefix . 'success']}
                                 </div>
                                ";
                                    unset($_SESSION[$sessionPrefix . 'success']);
                              }
                              ?>
                              <!-- row -->
                              <div class="row">
                                    <div class="col-sm-12">
                                          <div class="white-box">
                                                <center><h3>Employer Registration Form</h3></center>
                                                <center><p class="text-muted m-b-30"> Fill the form to create employer profile! </p></center>
                                                <hr>
                                                <form action="" method="POST" data-toggle="validator">
                                                      <div class="row">
                                                            <div class="col-sm-12">
                                                                  <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                              <label for="inputName1" class="control-label">Title</label>
                                                                              <select class="form-control" id="title" name="title" required>
                                                                                    <option value="">--- Please select any title ---</option>
                                                                                    <option <?php if (isset($_POST['title']) && ($_POST['title'] == "Mr.")) echo " selected "; ?> value="Mr.">Mr.</option>
                                                                                    <option <?php if (isset($_POST['title']) && ($_POST['title'] == "Mrs.")) echo " selected "; ?> value="Mrs.">Mrs.</option>
                                                                                    <option <?php if (isset($_POST['title']) && ($_POST['title'] == "Miss")) echo " selected "; ?> value="Mrs.">Miss</option>
                                                                                    <option <?php if (isset($_POST['title']) && ($_POST['title'] == "Dr.")) echo " selected "; ?> value="Mrs.">Dr.</option>
                                                                              </select>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                              <label for="inputEmail" class="control-label">First Name</label>
                                                                              <input type="text" class="form-control" id="first_name" name="first_name" <?php echo @"value='{$_POST['first_name']}'" ?> placeholder="First name" required>
                                                                              <div class="help-block with-errors"></div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div class="row">
                                                            <div class="col-sm-12">
                                                                  <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                              <label for="inputEmail" class="control-label">Surname</label>
                                                                              <input type="text" class="form-control" id="surename" name="surename" <?php echo @"value='{$_POST['surename']}'" ?> placeholder="Surname" required>
                                                                              <div class="help-block with-errors"></div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                              <label for="inputEmail" class="control-label">Phone number</label>
                                                                              <input type="text" class="form-control" id="phone_number" name="phone_number" <?php echo @"value='{$_POST['phone_number']}'" ?> placeholder="Phone number" required>
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
                                                                              <input type="text" class="form-control" id="address_line_1" name="address_line_1" <?php echo @"value='{$_POST['address_line_1']}'" ?> placeholder="Address line 1" required>
                                                                              <div class="help-block with-errors"></div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                              <label for="inputEmail" class="control-label">Address Line 2</label>
                                                                              <input type="text" class="form-control" id="address_line_2" name="address_line_2" <?php echo @"value='{$_POST['address_line_2']}'" ?> placeholder="Address line 2">
                                                                              <div class="help-block with-errors"></div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div class="row">
                                                            <div class="col-sm-12">
                                                                  <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                              <label for="inputEmail" class="control-label">Suburb</label>
                                                                              <input type="text" class="form-control" id="suburb" name="suburb" <?php echo @"value='{$_POST['suburb']}'" ?> placeholder="Suburb" required>
                                                                              <div class="help-block with-errors"></div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                              <label for="inputEmail" class="control-label">Postcode</label>
                                                                              <input type="number" class="form-control" id="post_code" name="post_code" <?php echo @"value='{$_POST['post_code']}'" ?> placeholder="Ex. 1234" required>
                                                                              <div class="help-block with-errors"></div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div class="row">
                                                            <div class="col-sm-12">
                                                                  <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                              <label for="inputEmail" class="control-label">Email address</label>
                                                                              <input type="email" class="form-control" id="email_address" name="email_address" <?php echo @"value='{$_POST['email_address']}'" ?> placeholder="Ex. someone@anything.com" required>
                                                                              <div class="help-block with-errors"></div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                              <label for="state" class="control-label">State</label>
                                                                              <select name="state" class="form-control" required>
                                                                                    <option value="">--Select State--</option>
                                                                                    <?php
                                                                                    if (isset($state) && is_array($state)) {
                                                                                          foreach ($state as $value) {
                                                                                                $selected = !empty($_POST['state']) ? $_POST['state'] == $value['id'] ? 'selected' : '' : '';
                                                                                                echo '<option '.$selected.' value="' . $value['id'] . '">' . $value['name'] . '</option>';
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
                                                                              <label for="inputEmail" class="control-label">Password</label>
                                                                              <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                                                                              <div class="help-block with-errors"></div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                              <label for="inputEmail" class="control-label">Confirm Password</label>
                                                                              <input type="password" class="form-control" id="rePassword" name="rePassword" placeholder="password" required>
                                                                              <div class="help-block with-errors"></div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-sm-6"></div>
                                                            </div>
                                                      </div>
                                                      <div class="row">
                                                            <div class="col-sm-12">
                                                                  <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                              <button type="submit" name="submitButton" class="btn btn-primary">Submit</button>
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