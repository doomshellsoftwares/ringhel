<section id="content">
<div class="container">
<div class="article_main_box profile_main_box">
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4">
<h3>My Profile</h3>
        <?php echo $this->Flash->render(); ?>
<?php echo $this->Form->create('Users',array('url' => array('controller' => 'profile', 'action' => 'profile'),'type'=>'file','inputDefaults'=>array('div'=>false,'label'=>false),'class'=>'form-horizontal','id'=>'LoginsIndexForm','autocomplete'=>'off')); ?>
    <div class="form-group">
      <div class="col-sm-12">
        
        <i class="fas fa-user"></i>
            <?php echo $this->Form->input('name',array('class'=>'form-control','placeholder'=>'Display Name','required'=>true,'label' =>false,'type'=>'text','value'=>$profile['name'])); ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
      <i class="fas fa-briefcase"></i>
 <?php echo $this->Form->input('comp_name',array('class'=>'form-control','placeholder'=>'Company Name','required'=>true,'label' =>false,'type'=>'text','value'=>$profile['comp_name'])); ?>      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
      <i class="fas fa-lock"></i>
       <?php echo $this->Form->input('password',array('class'=>'form-control','placeholder'=>'Old Password','type'=>'password','autocomplete'=>'off','label' =>false)); ?>
       <input type="hidden" name="email" value="<?php echo $profile['email']?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
      <i class="fas fa-lock"></i>
        <?php echo $this->Form->input('newpassword',array('class'=>'form-control','placeholder'=>'New Password','type'=>'password','autocomplete'=>'off','id'=>'p1','label' =>false)); ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
      <i class="fas fa-lock"></i>
        	<input type="password" name="confirmpassword" class="form-control" id="registration" placeholder="Confirm Password" onfocus="validatePass(document.getElementById('p1'), this);"  oninput="validatePass(document.getElementById('p1'), this);" >
      </div>
    </div>
      <div class="form-group"> 
    <div class="col-sm-12">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
    
  </form>

</div>
<div class="col-sm-4"></div>
</div>
</div>
</div>
</section>
<script>
function validatePass(p1, p2) {

if (p1.value != p2.value) {

p2.setCustomValidity('Password incorrect');

} else {

p2.setCustomValidity('');

}
}
</script>
