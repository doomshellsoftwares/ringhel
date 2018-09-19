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
	<?php  $lang=$this->Comman->getlang();
	
	//pr($lang); ?>
<div class="lan">
<div class="dropdown">
	<?php //pr($_SESSION); ?>
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php if($_SESSION['langselect']['langname']){ echo strtoupper($_SESSION['langselect']['langname']); } else{ echo "EN"; }
		?> 
   
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    <i class="fas fa-sort-up"></i>
    <?php foreach($lang as $key=> $value){ ?>
   
        <li><a href="<?php echo SITE_URL; ?>profile/langselect/<?php echo $value['short_name']; ?>/<?php echo $value['id']; ?>"><?php echo strtoupper($value['short_name']); ?></a></li>

      <?php } ?>
    </ul>
  </div>
</div>
</li>


<?php	
$rolepresent=$this->request->session()->read('Auth.User.id'); ?>
<?php if ($rolepresent){ ?>

<li class="profile_menu"><a href="<?php echo SITE_URL; ?>profile" data-toggle="tooltip" title="My Profile"><i class="fas fa-user-circle"></i></a></li>
<li><a href="<?php  echo SITE_URL; ?>users/logout ?>" data-toggle="tooltip" title="Logout"><i class="fas fa-power-off"></i></a></li>
<?php }else{ ?>
<li><a href="<?php echo SITE_URL; ?>login"><i class="fas fa-sign-in-alt"></i><?php echo __('LOGIN'); ?> </a></li>
<?php  } ?>
</ul>


</div>
</div>
</div>
<nav>
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav">
	<?php //pr($_SESSION); ?>
	<?php  $maincat = $this->Comman->getcathome();?>
<?php foreach($maincat as $key=>$value){ //pr($value); ?>	
<li class="dropdown">
<a class="dropdown-toggle active" data-toggle="dropdown" href="#"><?php echo $value['title'];?><span class="caret"></span></a>
          <ul class="dropdown-menu">
          <i class="fas fa-sort-up"></i>
     
			
          	<?php  $subcat = $this->Comman->getsubcathome($_SESSION['langselect']['langid'],$value['cat_id']);?>
          	
          	<?php foreach($subcat as $subcatkey=> $subcatvalue){ ?>
            <li><a href="<?php echo SITE_URL; ?>home/home/<?php echo $subcatvalue['id'] ?>"><?php echo  $subcatvalue['title']; ?></a></li>
           <?php } ?>
            
           
          </ul>
</li>
<?php } ?>

</ul>
</div>
</nav>
<div class="search_bar">
<?php $url= SITE_URL."/home"; ?>
	 <?php  echo $this->Form->create('',array('url'=>array('controller'=>'home','action'=>''),'type'=>'file','label'=>false,'class'=>'form-horizontal')); ?>
    <div class="form-group">
     <div class="col-sm-3"></div>
      <div class="col-sm-6">
		  
   
        <input type="text" class="form-control" name="articlesearch" value="<?php echo $searchname; ?>">
        <button type="submit" class="serch_btn"><i class="fas fa-search"></i></button>
     
        
    
      </div>
           
      <div class="col-sm-3"></div>
    </div>
    
 <?php echo $this->Form->end();?>
</div>
</div>
</header>

