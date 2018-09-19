<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
   New Language
          </h1>
<ol class="breadcrumb">
<li><a href="<?php echo SITE_URL; ?>admin/dashboard"><i class="fa fa-home"></i>Home</a></li>

 <?php if(isset($language['id'])){ ?>
<li class="active"><a href="javascript:void(0)">Edit Language</a></li>   
<?php } else { ?>
<li class="active"><a href="javascript:void(0)">Add Language</a></li>
<?php } ?>
        </ol>
      </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
              <?php echo $this->Flash->render(); ?>
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-plus-square" aria-hidden="true"></i> <?php if(isset($language['id'])){ echo 'Edit Post New'; }else{ echo 'New Language';} ?></h3>
        </div>
            <!-- /.box-header -->
            <!-- form start -->
    <?php echo $this->Form->create($language, array(
                       'class'=>'form-horizontal',
                       'enctype' => 'multipart/form-data',
                       'validate'
                      )); ?>
 <div class="box-body">
   
    <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Language Name</label>

              <div class="col-sm-6">
       <?php echo $this->Form->input('name', array('class' => 'form-control','required','label'=>false,'placeholder'=>'Enter Language')); ?>
              </div>
    </div>

<div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Short Name</label>

              <div class="col-sm-6">
       <?php echo $this->Form->input('short_name', array('class' => 'form-control','required','label'=>false,'placeholder'=>'Enter Short Name')); ?>
              </div>
    </div>
    <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label"></label>

              <div class="col-sm-6">
<a href="#" class="btn">Click here to download the file</a>
<?php echo $this->Form->input('csvfile', array('class' => 'btn pull-left', 'type'=>'file','label'=>false,)); ?>
</div>
    </div>
  </div>
  <!-- /.box-body -->
          <div class="box-footer">
      <?php
        if(isset($language['id'])){
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
    $(document).ready(function () {   
    $('#datepickpost1').datepicker({ "dateFormat":"dd-mm-yy"});             
       })    
   </script>  
