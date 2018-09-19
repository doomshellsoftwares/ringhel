<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     Profile  Manager
       
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
		    <div class="box-header with-border">
		      <h3 class="box-title">Profile setting</h3>
		    </div>
            <!-- /.box-header -->
            <!-- form start -->
<?php //pr($page); die; ?>
		<?php echo $this->Flash->render(); ?>

 <?php $role_id=$this->request->session()->read('Auth.User.role_id'); ?>
<?php echo $this->Form->create('Users',array('url' => array('controller' => 'sitesettings', 'action' => 'add'),'type'=>'file','inputDefaults'=>array('div'=>false,'label'=>false),'class'=>'form-horizontal','id'=>'LoginsIndexForm','autocomplete'=>'off')); ?>
		      <div class="box-body">
  
		        <div class="form-group">
		          <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

		          <div class="col-sm-10">
			<?php echo $this->Form->input('name',array('class'=>'form-control','placeholder'=>'Display Name','required'=>true,'label' =>false,'type'=>'text','value'=>$profile['name'])); ?>
		           
		          </div>
		        </div>
			
		        
   
		        
			<div class="form-group">
		          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

		          <div class="col-sm-10">
			<?php echo $this->Form->input('email',array('class'=>'form-control','placeholder'=>'Display Email','required'=>true,'label' =>false,'type'=>'text','value'=>$profile['email'])); ?>
		           
		          </div>
		        </div>
		 
			<div class="form-group">
				  <div class="col-sm-10" style="margin-left: 148px;">
		        <a href="javascript:void(0)" class="chngpassword"  >Do you want to change password ?</a>
		        </div>
		        </div>

			<div class="passdata" style="display:none;">
			<div class="form-group">
		          <label for="inputEmail3" class="col-sm-2 control-label">Old Password</label>

		          <div class="col-sm-10">
			<?php echo $this->Form->input('password',array('class'=>'form-control','placeholder'=>'Old Password','type'=>'password','autocomplete'=>'off','label' =>false)); ?>
       <input type="hidden" name="email" value="<?php echo $profile['email']?>">
		           
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="inputEmail3" class="col-sm-2 control-label">New Password</label>

		          <div class="col-sm-10">
			<?php echo $this->Form->input('newpassword',array('class'=>'form-control','placeholder'=>'New Password','type'=>'password','autocomplete'=>'off','id'=>'pa1','label' =>false)); ?>
		           
		          </div>
		        </div>
			<div class="form-group">
		          <label for="inputEmail3" class="col-sm-2 control-label">Confirm Password</label>

		          <div class="col-sm-10">
				<input type="password" name="confirmpassword" class="form-control" id="registration" placeholder="Confirm Password" onfocus="validatePass(document.getElementById('pa1'), this);"  oninput="validatePass(document.getElementById('pa1'), this);" >
		          </div>
		        </div>
			</div>
			
			</div>
		      
		       
		      <!-- /.box-body -->
		      <div class="box-footer">
			<?php
			echo $this->Html->link('Cancel', [
			'controller' => 'dashboard',	
			    'action' => 'index'
			   
			],['class'=>'btn btn-default']); ?>
		      
			<?php
			
				
				echo $this->Form->submit(
				    'Update', 
				    array('class' => 'btn btn-info pull-right', 'title' => 'Update')
				); 
			
		       ?>
		      </div>
		      <!-- /.box-footer -->
		  <?php echo $this->Form->end(); ?>
          </div>
         
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

	
<script>
$(document).ready(function(){
    $(".chngpassword").click(function(){
        $(".passdata").toggle();
    });
});
</script>
<script>
function validatePass(pa1, pa2) {

if (pa1.value != pa2.value) {

pa2.setCustomValidity('Password incorrect');

} else {

pa2.setCustomValidity('');

}
}
</script>

