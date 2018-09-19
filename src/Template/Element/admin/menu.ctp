<?php 
//pr($this->request->params['controller']);  die;
?>
	  <style type="text/css">
     .sidebar-menu {
    list-style: none;
    margin: 0px;
    margin-top: 60px !important;
    padding: 0;
} 
    </style>
<?php $role_id=$this->request->session()->read('Auth.User.role_id'); 
    if($role_id=='1') {
    ?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
	
		<div class="pull-left image">
		 <!--<img src="<?php echo SITE_URL;?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
		</div>
		<div class="pull-left info">
		  <p><?php echo ucfirst($this->request->session()->read('Auth.User.email'));?></p>
		  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      
		</div> 
     </div>
      <ul class="sidebar-menu">

        <li class="<?php if($this->request->params['controller'] == 'Dashboards'){ echo 'active';} ?> treeview">
          <a href="<?php echo $this->Url->build('/admin/dashboard/'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li> 
      
        <li class="">
        <a href="#">
        <i class="fa fa-user-secret" aria-hidden="true"></i>
        <span>User Manager</span> </a>

             <ul class="treeview-menu" <?php if($this->request->params['controller']=='Profilepack') {  ?> style="display: block" <?php } ?>>
        

            <li> <a href="<?php echo $this->Url->build('/admin/internal/'); ?>" style="color:#fff"><i class="fa fa-circle-o"></i>Internal Users</a></li>

             <li> <a href="<?php echo $this->Url->build('/admin/external'); ?>" style="color:#fff"><i class="fa fa-circle-o"></i>External Users</a></li>
        
            </ul>
        </li>

       <li class="treeview">
        <a href="<?php echo ADMIN_URL;?>category/index">
        <i class="fa fa-list-alt"></i> <span>Category Manager</span>
        </a>
        </li> 
        <li class="treeview">
        <a href="<?php echo ADMIN_URL;?>language/index">
     
        <i class="fa fa-language"></i> <span>Language Manager</span>
     
        </a>
        </li> 
        <li class="treeview">
        <a href="<?php echo ADMIN_URL;?>articles/index">
        <i class="fa fa-newspaper-o"></i> <span>Article Manager</span>
        </a>
        </li> 
        <li class="treeview">
        <a href="<?php echo ADMIN_URL;?>api/index">
        <i class="fa fa-user"></i> <span>API Manager</span>
        </a>
        </li> 
      
       

   </ul>
    </section>

  </aside>     
<?php } else if($role_id=='2') { ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
  
    <div class="pull-left image">
     <!--<img src="<?php echo SITE_URL;?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
    </div>
    <div class="pull-left info">
      <p><?php echo ucfirst($this->request->session()->read('Auth.User.email'));?></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      
    </div> 
     </div>
      <ul class="sidebar-menu">
        <li class="treeview">
        <a href="<?php echo ADMIN_URL;?>category/index">
        <i class="fa fa-list-alt"></i> <span>Category Manager</span>
        </a>
        </li> 
        <li class="treeview">
        <a href="<?php echo ADMIN_URL;?>articles/index">
        <i class="fa fa-newspaper-o"></i> <span>Article Manager</span>
        </a>
        </li> 
        <li class="">
        <a href="#">
        <i class="fa fa-user-secret" aria-hidden="true"></i>
        <span>User Manager</span> </a>

             <ul class="treeview-menu" <?php if($this->request->params['controller']=='Profilepack') {  ?> style="display: block" <?php } ?>>
        

            <li> <a href="<?php echo $this->Url->build('/admin/internal/'); ?>" style="color:#fff"><i class="fa fa-circle-o"></i>Internal Users</a></li>

             <li> <a href="<?php echo $this->Url->build('/admin/external'); ?>" style="color:#fff"><i class="fa fa-circle-o"></i>External Users</a></li>
        
            </ul>
        </li>
        
        <li class="<?php if($this->request->params['controller'] == 'Dashboards'){ echo 'active';} ?> treeview">
          <a href="<?php echo $this->Url->build('/admin/dashboard/'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li> 
   </ul>
    </section>

  </aside>
<?php } ?>       


