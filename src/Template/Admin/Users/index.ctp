<?php echo $this->Flash->render(); ?>

<?php echo $this->Form->create($Users, array('class'=>'form-horizontal','id' => 'sevice_form', 'enctype' => 'multipart/form-data')); ?>

          <div class="col-lg-12">
          <div class="card">
          <div class="card-header"><strong>Admin Detail</strong></div>
         

          <div class="card-body card-block">
            <div class="row">
                     
          <div class="col-sm-3">
          <div class="form-group">
          <label for="company" class=" form-control-label">Opening Time</label>
          <?php echo $this->Form->input('opening', array('class' => 
          'longinput form-control','placeholder'=>'Opening Time','label'=>false)); ?>
        </div>
          </div>

          <div class="col-sm-3">
          <div class="form-group">
          <label for="company" class=" form-control-label">Closing Time</label>
          <?php echo $this->Form->input('closing', array('class' => 
          'longinput form-control','placeholder'=>'Closing Time','label'=>false)); ?>
        </div>
          </div>

          <div class="col-sm-3">
          <div class="form-group">
          <label for="company" class=" form-control-label">Contact Number</label>
          <?php echo $this->Form->input('phone', array('class' => 
          'longinput form-control','placeholder'=>'Contact Number','label'=>false)); ?>
        </div>
          </div>

          <div class="col-sm-3">
          <div class="form-group">
          <label for="company" class=" form-control-label">Change Email</label>
          <?php echo $this->Form->input('email', array('class' => 
          'longinput form-control','placeholder'=>'Change Email','label'=>false)); ?>
        </div>
          </div>


          <div class="col-sm-3">
          <div class="form-group">
          <label for="company" class=" form-control-label">Confirm Password</label>
          <?php echo $this->Form->input('cpassword', array('class' => 
          'longinput form-control','placeholder'=>'Confirm Password','label'=>false,'type'=>'password')); ?>
        </div>
          </div>

          <div class="col-sm-3">
          <div class="form-group">
          <label for="company" class=" form-control-label">Facebook</label>
          <?php echo $this->Form->input('social_fb', array('class' => 
          'longinput form-control','type'=>'url','label'=>false)); ?>
          </div>
          </div>

          <div class="col-sm-3">
          <div class="form-group">
          <label for="company" class=" form-control-label">Google Plus </label>
          <?php echo $this->Form->input('social_gplus', array('class' => 
          'longinput form-control','type'=>'url','label'=>false)); ?>
          </div>
          </div>

          <div class="col-sm-3">
          <div class="form-group">
          <label for="company" class=" form-control-label">Instagram </label>
          <?php echo $this->Form->input('social_insta', array('class' => 
          'longinput form-control','type'=>'url','label'=>false)); ?>
          </div>
          </div>

           <div class="col-sm-3">
          <div class="form-group    ">
          <label for="company" class=" form-control-label">About Us</label>
          <?php echo $this->Form->input('about_us', array('class' => 
          'longinput form-control','type'=>'textarea','rows'=>'1','label'=>false)); ?>
          </div>
          </div>

          <div class="col-sm-3">
          <div class="form-group    ">
          <label for="company" class=" form-control-label">Address </label>
          <?php echo $this->Form->input('address', array('class' => 
          'longinput form-control','type'=>'textarea','rows'=>'1','label'=>false)); ?>
          </div>
          </div>

          </div>


          <div class="row">
          <div class="col-lg-1">
          <div class="card-body">

          <?php if(isset($transports['id'])){
          echo $this->Form->submit('Update', array('title' => 'Update','div'=>false,
          'class'=>array('btn btn-primary btn-sm'))); }else{  ?>
          <button type="submit" class="btn btn-success">Submit</button>
          <?php  } ?>
          </div>
          </div>

          </div>
          </div>
          </div>

          <?php echo $this->Form->end(); ?>

          </div>

