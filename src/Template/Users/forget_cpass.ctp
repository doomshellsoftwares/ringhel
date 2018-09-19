<section id="content">
<div class="container">
<div class="article_main_box profile_main_box login_page">
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4">
<h3>Password Reset Form</h3>
         <?php echo $this->Flash->render(); ?>

<?php echo $this->Form->create('User',array('url'=>array('controller'=>'Users','action'=>'forget_cpass/kp/'.$usrid),'type'=>'file','inputDefaults'=>array('div'=>false,'label'=>false),'class'=>'cont-form','role'=>'form','onsubmit'=>'return validate();')); ?>
 <?php if($ftyp==1) { ?>
    <div class="form-group">
      <div class="col-sm-12">
        <i class="fas fa-user"></i>
        <?php echo $this->Form->password('password',array('required','id'=>'pass','class'=>'form-control', 'placeholder'=>'New Password')); ?>
      </div>
    </div>
<div class="form-group">
      <div class="col-sm-12">
        <i class="fas fa-user"></i>
<?php echo $this->Form->password('cpassword',array('required','id'=>'cpass','class'=>'form-control', 'placeholder'=>'Confirm Password')); ?>
      </div>
    </div>
      <div class="form-group"> 
    <div class="col-sm-12">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
      <?php } else {
 echo("<span style='color:red;align:center;margin-left:110px'>Invalid Key or Expired link</span>");    
 }
  
  ?>
   
 <?php echo $this->Form->end();   ?>
</div>
<div class="col-sm-4"></div>
</div>
</div>
</div>
</section>
<script type="text/javascript">
function validate(){
	
	if($('#pass').val()!=$('#cpass').val()){
		alert("Password and confirm password should be same");
		return false;
	}else
	return true;
}

</script>
