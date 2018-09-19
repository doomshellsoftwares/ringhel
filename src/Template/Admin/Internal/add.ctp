<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create Internal Users
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo SITE_URL; ?>admin/dashboard"><i class="fa fa-home"></i>Home</a></li>

      <?php if(isset($internal['id'])){ ?>
        <li class="active"><a href="javascript:void(0)">Edit Internal Users</a></li>   
      <?php } else { ?>
        <li class="active"><a href="javascript:void(0)">Add Internal Users</a></li>
      <?php } ?>
    </ol>
  </section>
  <!-- /.box-header -->
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
     <?php echo $this->Flash->render(); ?>
     <!-- right column -->
     <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-info">
        
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-plus-square" aria-hidden="true"></i> <?php if(isset($internal['id'])){ echo 'Edit Post New'; }else{ echo 'Create Internal Users';} ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php echo $this->Form->create($internal, array(
         'class'=>'form-horizontal',
         'enctype' => 'multipart/form-data',
         'validate'
       )); ?>
       <div class="box-body">
         
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-4 control-label">Email ID</label>

          <div class="col-sm-6">
           <?php echo $this->Form->input('email', array('class' => 'form-control','Type'=>'mail', 'label'=>false,'placeholder'=>'Enter Email ID', 'required')); ?>
         </div>
       </div>

       <div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label">Name</label>

        <div class="col-sm-6">
         <?php echo $this->Form->input('name', array('class' => 'form-control','label'=>false,'placeholder'=>'Enter Name', 'required')); ?>
       </div>
     </div>

     <div class="form-group">
      <label for="inputEmail3" class="col-sm-4 control-label">Company Name</label>

      <div class="col-sm-6">
       <?php echo $this->Form->input('comp_name', array('class' => 'form-control','label'=>false,'placeholder'=>'Enter Company Name', 'required')); ?>
     </div>
   </div>

   <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Preferred Language</label>

    <div class="col-sm-6">
      <?php echo $this->Form->input('pref_language', array('class' => 'form-control','label'=>false,'placeholder'=>'Enter Company Name', 'required','type'=>'select','options'=>$language,'empty'=>'Select Language ')); ?>       
      </div>
  </div>
  

</div>
<!-- /.box-body -->
<div class="box-footer">
  <?php
  if(isset($internal['id'])){
    echo $this->Form->submit(
      'Update', 
      array('class' => 'btn btn-info pull-right', 'title' => 'Update')
    ); }else{ 
      echo $this->Form->submit(
        'Add', 
        array('class' => 'btn btn-info pull-right', 'title' => 'Add')
      );
    }
    ?><?php
    echo $this->Html->link('Back', [
      'action' => 'index'
      
    ],['class'=>'btn btn-default']); ?>
  </div>
  <!-- /.box-footer -->
  <?php  echo $this->Form->end(); ?>
</div>

</div>
<!--/.col (right) -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div> 

