<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>/assets/images/favicon.png">
        <title><?php echo $pageTitle; ?></title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Menu CSS -->
        <link href="<?php echo base_url(); ?>/assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
        <!-- Data table CSS -->
        <link href="<?php echo base_url(); ?>/assets/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <!-- Select CSS -->
        <link href="<?php echo base_url(); ?>/assets/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- <script src="<?php echo base_url(); ?>/assets/bower_components/jquery/dist/jquery.min.js"></script> -->
        <script type="text/javascript">
           var base_url = "<?php echo base_url();?>";
         </script>
        <!--  these for Upload --> 
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/start/jquery-ui.css" id="theme">
        <!-- Demo styles -->        
        <style>
        /* Adjust the jQuery UI widget font-size: */
        .ui-widget {
            font-size: 0.95em;
        }
        </style>
        <!-- blueimp Gallery styles -->
        <link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
        <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/upload/css/jquery.fileupload.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/upload/css/jquery.fileupload-ui.css">
        <!-- CSS adjustments for browsers with JavaScript disabled -->
        <noscript><link rel="stylesheet" href="<?php echo base_url(); ?>/assets/upload/css/jquery.fileupload-noscript.css"></noscript>
        <noscript><link rel="stylesheet" href="<?php echo base_url(); ?>/assets/upload/css/jquery.fileupload-ui-noscript.css"></noscript>
        <!-- End -->
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
                    <div class="top-left-part"><a class="logo" href="<?=base_url();?>employer/index"><img height="48" src="<?php echo base_url();?>assets/images/logo_1.png"></a></div>
                    <ul class="nav navbar-top-links navbar-right pull-right">                        
                        <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"><b class="hidden-xs"><?php echo $_SESSION[$sessionPrefix.'first_name'];?></b> <span class="label label-rouded label-danger headerUnreadMessageCount" style="padding: 8px;"></span> </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="<?php echo base_url();?>employer/myProfile"><i class="ti-user"></i> My Profile</a></li>
                                <li><a href="<?php echo base_url();?>employer/message/showList"><i class="ti-email"></i> Inbox <span class="label label-rouded label-danger headerUnreadMessageCount" style="padding: 8px;"></span> </a></li>
                                <li><a href="<?php echo base_url();?>employer/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-header -->
                <!-- /.navbar-top-links -->
                <!-- /.navbar-static-side -->
            </nav>
            <!-- Page Content -->
            
            
            <input type="hidden" id="baseUrl" value="<?php echo base_url();?>">