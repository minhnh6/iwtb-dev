<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>/assets/images/favicon.png">
        <title><?php echo $pageTitle;?></title>
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
                    <div class="top-left-part"><a class="logo" href="<?=base_url();?>contractor/index"><img height="48" src="<?php echo base_url();?>assets/images/logo_1.png"></a></div>
                    <ul class="nav navbar-top-links navbar-right pull-right">                        
                        <li class="dropdown"> 
				<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> 
					<!-- code_huy -->
					<img src="<?php echo base_url(); ?>/uploads/<?php echo $_SESSION[$sessionPrefix.'profile_picture_url'];?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $_SESSION[$sessionPrefix.'business_name'];?></b> 
					<!-- end code_huy -->
				</a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="<?php echo base_url(); ?>contractor/myECard"><i class="ti-eye"></i> View My E-card</a></li>
                                <li><a href="<?php echo base_url(); ?>contractor/updateProfile"><i class="ti-user"></i> Update Profile</a></li>
                                <li><a href="<?php echo base_url(); ?>contractor/myMembership"><i class="ti-wallet"></i> My Membership</a></li>
                                <li><a href="<?php echo base_url(); ?>contractor/logout"><i class="fa fa-power-off"></i> Logout</a></li>
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