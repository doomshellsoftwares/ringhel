<section id="content">
<div class="container">
<div class="article_main_box profile_main_box login_page">
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4">
<h3>Forgot your password </h3>
         <?php echo $this->Flash->render(); ?>

<?php echo $this->Form->create('Users',array('url' => array('controller' => 'Users', 'action' => 'forgotpassword'),'type'=>'file','inputDefaults'=>array('div'=>false,'label'=>false),'class'=>'form-horizontal','id'=>'LoginsIndexForm','autocomplete'=>'off')); ?>

    <div class="form-group">
      <div class="col-sm-12">
        <i class="fas fa-user"></i>
        <input type="email" class="form-control" id="inputEmail3"  name="email" placeholder="E-mail"required>
      </div>
    </div>

      <div class="form-group"> 
    <div class="col-sm-12">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
    
 <?php echo $this->Form->end();   ?>
</div>
<div class="col-sm-4"></div>
</div>
</div>
</div>
</section>
