<section id="content">
<div class="container">
<div class="article_main_box profile_main_box login_page">
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4">
<h3>Sign UP</h3>
 <?php
echo $this->Form->create($users,array('url' => array('controller' => 'users', 'action' => 'signup'),'type'=>'file','inputDefaults'=>array('div'=>false,'label'=>false),'class'=>'form-horizontal','id'=>'user_form','autocomplete'=>'off')); ?>
    
     <div class="form-group">
      <div class="col-sm-12">
        <i class="fas fa-user"></i>
        <?php echo $this->Form->email('name',array('class'=>'form-control','placeholder'=>'Name','required'=>true,'autocomplete'=>'off','type'=>'text','label' =>false)); ?>
        
      </div>
    </div>
    
    <div class="form-group">
      <div class="col-sm-12">
        <i class="fas fa-user"></i>
        <?php echo $this->Form->email('email',array('class'=>'form-control','placeholder'=>'E-mail','required'=>true,'autocomplete'=>'off','id'=>'username','label' =>false)); ?>
        <span id="dividhere" style="display:none;color:red;">Email Already Exist</span>
      </div>
    </div>
    
    
    <div class="form-group">
      <div class="col-sm-12">
      <i class="fas fa-lock"></i>
       <?php echo $this->Form->input('password',array('class'=>'form-control','placeholder'=>'Password','type'=>'password','autocomplete'=>'off','id'=>'p1','label' =>false,'required'=>true)); ?>
      </div>
    </div>
    
    
    <div class="form-group">
      <div class="col-sm-12">
      <i class="fas fa-lock"></i>
       <input type="password" name="confirmpassword" required="" class="form-control" id="registration" placeholder="Confirm Password" onfocus="validatePass(document.getElementById('p1'), this);"  oninput="validatePass(document.getElementById('p1'), this);" >
      </div>
    </div>
    
    
      <div class="form-group"> 
    <div class="col-sm-12">
      <button type="submit" class="btn btn-default">Login</button>
    </div>
  </div>
  <div class="form-group forgot_create_account"> 
    <div class="col-sm-12 text-center">
      <a href="#">Forgot Password</a>
    </div>
    <!--<div class="col-sm-6 text-right">
      <a href="#">Create Account</a>
    </div>-->
  </div>
    
  </form>

</div>
<div class="col-sm-4"></div>
</div>
</div>
</div>
</section>
<script>
	$(document).ready(function(){  
		$('#username').change(function() { 
			var username = $('#username').val();
			//alert(username);
			$.ajax({ 
				type: 'POST', 
				url: '<?php echo SITE_URL;?>users/find_username',
				data: {'username':username}, 
				success: function(data){ 
					if(data > 0)
						{
							$('#username').val('');
							$('#dividhere').show();
						}
						else
						{
							$('#dividhere').hide();
						}
				}, 
			});  
		});
	});
function validatePass(p1, p2) {

if (p1.value != p2.value) {

p2.setCustomValidity('Password incorrect');

} else {

p2.setCustomValidity('');

}
}
</script>
