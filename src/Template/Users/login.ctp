<section id="content">
<div class="container">
<div class="article_main_box profile_main_box login_page">
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4">
<h3>Login</h3>
         <?php echo $this->Flash->render(); ?>

<?php echo $this->Form->create('Users',array('url' => array('controller' => 'Users', 'action' => 'login'),'type'=>'file','inputDefaults'=>array('div'=>false,'label'=>false),'class'=>'form-horizontal','id'=>'LoginsIndexForm','autocomplete'=>'off')); ?>

    <div class="form-group">
      <div class="col-sm-12">
        <i class="fas fa-user"></i>
         <?php echo $this->Form->input('email',array('class'=>'form-control','placeholder'=>'E-mail','id'=>'inputEmail3','required'=>true,'label' =>false,'type'=>'email')); ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
      <i class="fas fa-lock"></i>
       <?php echo $this->Form->input('password',array('class'=>'form-control','placeholder'=>'Password','id'=>'inputPassword3','required'=>true,'label' =>false,'type'=>'password')); ?>
       
       
       <input type="hidden" name="redirecturl" value="<?php echo $redirecturl; ?>">
      </div>
    </div>
      <div class="form-group"> 
    <div class="col-sm-12">
      <button type="submit" class="btn btn-default">Login</button>
    </div>
  </div>
  <div class="form-group forgot_create_account"> 
    <div class="col-sm-12 text-center">
      <a href="<?php echo SITE_URL; ?>forgotpassword">Forgot Password</a>
    </div>
    <!--<div class="col-sm-6 text-right">
      <a href="#">Create Account</a>
    </div>-->
  </div>
    
 <?php echo $this->Form->end();   ?>
</div>
<div class="col-sm-4"></div>
</div>
</div>
</div>
</section>
