<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>RINGHEL</title>
<!---------bootstrap-------------------->
<link href="<?php echo SITE_URL; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!------------font-awesome------------------>
<link href="<?php echo SITE_URL; ?>css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
<!------------Poppins-font------------------>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700" rel="stylesheet">
<!---------------genral---------------------->
<link href="<?php echo SITE_URL; ?>css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo SITE_URL; ?>css/responsive.css" rel="stylesheet" type="text/css">
<!------min.js-----------------> 
<script src="<?php echo SITE_URL; ?>js/jquery.min.js" type="text/javascript"></script> 
<!--------------bootstyrap-js--------------------------> 
<script src="<?php echo SITE_URL; ?>js/bootstrap.min.js" type="text/javascript"></script> 

</head>
<body>
<div id="page-wrapper">
<!-------------------------Header Start------------------------->
<header>
<!--<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<ul>
<li><a href="#"><img src="images/profile-pics.jpg" alt="profile image"></a></li>
<li><a href="#">My Profile</a></li>
<li><a href="#">Logout</a></li>


</ul>
</div>-->
<div class="container">
<div class="headtop">
<div class="row">

<div class="col-sm-6 text-left">
<div class="logo">
<a href="<?php echo SITE_URL; ?>"><img src="<?php echo SITE_URL; ?>images/logofront.png"></a>
</div>
</div>

<div class="col-sm-6 text-right">

<ul class="pro_top">
<li>
<div class="lan">
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">En
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    <i class="fas fa-sort-up"></i>
      <li><a href="#">EN</a></li>
      <li><a href="#">ssss</a></li>
      <li><a href="#">RS</a></li>
    </ul>
  </div>
</div>
</li>


<li class="profile_menu"><a href="profile.html" data-toggle="tooltip" title="My Profile"><i class="fas fa-user-circle"></i></a></li>
<?php	$rolepresent=$this->request->session()->read('Auth.User.role_id'); ?>
<?php if ($rolepresent){ ?>

<li><a href="<?php  echo SITE_URL; ?>users/logout ?>" data-toggle="tooltip" title="Logout"><i class="fas fa-power-off"></i></a></li>
<?php }else{ ?>
<li><a href="<?php echo SITE_URL; ?>login"><i class="fas fa-sign-in-alt"></i> LOGIN</a></li>
<?php  } ?>
</ul>


</div>
</div>
</div>


</div>
</header>
