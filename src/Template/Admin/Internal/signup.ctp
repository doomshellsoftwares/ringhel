 <script>
    function validatePassword() {
        var validator = $("#user_form").validate({
            rules: {
                //password: "required",
                confirmpassword: {
                    equalTo: "#password"
                }
            },
            messages: {
                password: " Enter Password",
                confirmpassword: " Enter Confirm Password Same as Password"
            }
        });
        if (validator.form()) {
        }
    }
 
    </script>
<!----------------------editprofile-strt----------------------->
 <section id="page_signup">
 <div class="container">
 <div class="row">
 <div class="col-sm-8">
 <div class="signup-popup">
 <h2>Sign <span>Up</span></h2>
      
  <?php
echo $this->Form->create($users,array('url' => array('controller' => 'users', 'action' => 'signup'),'type'=>'file','inputDefaults'=>array('div'=>false,'label'=>false),'class'=>'form-horizontal','id'=>'user_form','autocomplete'=>'off')); ?>

  <form class="form-horizontal">
  <div class="form-group">
   
    <div class="col-sm-6">
		<?php echo $this->Form->input('user_name',array('class'=>'form-control','placeholder'=>'Enter Your Name','pattern'=>'[a-zA-Z ]*','id'=>'inputEmail3','required'=>true,'label' =>false,'type'=>'text')); ?>
    </div>
    <div class="col-sm-6">
		<?php echo $this->Form->email('email',array('class'=>'form-control','placeholder'=>'Enter Your Email','required'=>true,'autocomplete'=>'off','id'=>'username','label' =>false)); ?>
		      <span id="dividhere" style="display:none;color:red;">Email Already Exist</span>

    </div>
  </div>
  
  
   <div class="form-group">
                  
                  <div class="col-sm-12">
                    <div class="row">
                      <div class="col-sm-6">
                       <?php echo $this->Form->input('phonecountry',array('class'=>'form-control','placeholder'=>'Country','required'=>true,'label' =>false,'id'=>'country_phone','empty'=>'--Select Country--','options'=>$country)); ?>

                      </div>
           
                      <div class="col-sm-2">
						
                       <?php //echo $this->Form->input('phonecode',array('class'=>'form-control','placeholder'=>'Phonecode','id'=>'','label' =>false,'empty'=>'--Code--','readonly'=>true)); ?>
 <?php echo $this->Form->input('phonecode',array('class'=>'form-control','placeholder'=>'Phone Code','id'=>'phonecode','required'=>true,'label' =>false,'type'=>'text','readonly'=>true)); ?>
                      </div>
                       
                        <div class="col-sm-4">
		<?php echo $this->Form->input('phone',array('class'=>'form-control telnumber','maxlength'=>'12','required'=>true,'placeholder'=>'Enter Your Number','label' =>false,'type'=>'tel','pattern'=>'^\d{10}$')); ?>
     
    </div>
                      
                    </div>
                  </div>
                  <div class="col-sm-4"></div>
                </div>
  
  
  <div class="form-group">
 
  
    <div class="col-sm-6">
		 <?php echo $this->Form->input('password',array('class'=>'form-control','placeholder'=>'Password','maxlength'=>'11','type'=>'password','autocomplete'=>'off','id'=>'p1','label' =>false,'required'=>true)); ?>
    </div>
    
     <div class="col-sm-6">
		<input type="password" name="confirmpassword" required="" class="form-control" id="registration" placeholder="Confirm Password" onfocus="validatePass(document.getElementById('p1'), this);"  oninput="validatePass(document.getElementById('p1'), this);" >
       <input type="hidden" name="user_activation_key" class="form-control" id="registration" value="<?php echo md5(uniqid(rand(), true)); ?>">
       <input type="hidden" name="ref_by" class="form-control" id="registration" value="<?php echo (isset($ref_by))?$ref_by:''; ?>">
       

    </div>
    
    
  </div>
  
  
  
  <div class="form-group">
   
   
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-12 ">
      <div class="checkbox">
        <label>
          <input type="checkbox" required> I Agree with <a href="<?php echo SITE_URL; ?>/termsandconditions"  target="_blank">Terms and Conditions</a>
        </label>
      </div>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-12">
		<button type="submit" class="btn btn-default" onClick="validatePassword();"><?php echo __('Submit'); ?></button>
     
    </div>
  </div>
  
  
  
  
   <?php echo $this->Form->end(); ?>
  
 </div>
 </div>
 
 
 
 <div class="col-sm-4">
 
 <div class="sign-up-with">
 
 <div class="signup-popup2">
 <div class="">
 <h2 class="m-bott-20">Sign in<span>With</span></h2>
      
 
 <div class="signup-social-inner">
 <div class="row">

 <div class="col-sm-12">

 
 
 <a href="<?php echo SITE_URL; ?>/login?provider=Facebook" class="bg-face"><i class="fa fa-facebook"></i><span>Sign in With Facebook</span></a></div>
 <div class="col-sm-12"><a href="#" class="bg-twt"><i class="fa fa-google-plus"></i><span>Sign in With Google-plus</span></a></div>


 <div class="col-sm-12"><a href="#" class="bg-vk"><i class="fa fa-vk"></i><span>Sign in With VK</span></a></div>
 <div class="col-sm-12"><a href="#" class="bg-g-plus"><i class="fa fa-twitter"></i><span>Sign in With Twitter</span></a></div>

 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </section>
 
 
 
  <script type="text/javascript">
	$(document).ready(function() {
		$("#country_phone").on('change',function() {
			var id = $(this).val();
			$("#phonecode").find('option').remove();
			if (id) {
				var dataString = 'id='+ id;
				$.ajax({
					type: "POST",
					url: '<?php echo SITE_URL;?>/users/getphonecode',
					data: dataString,
					cache: false,
					success: function(html) {
						$.each(html, function(key, value) {    
						$('#phonecode').val(value);
						});
					} 
				});
			}
		});
	});
	</script>
  <!--------------------------------------------------> 

<script>
	$(document).ready(function(){  //alert();
		$('#username').change(function() { //alert();
			var username = $('#username').val();
			//alert(username);
			$.ajax({ 
				type: 'POST', 
				url: '<?php echo SITE_URL;?>/users/find_username',
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

