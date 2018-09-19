<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
      Create Statistics 
          </h1>
<ol class="breadcrumb">
<li><a href="<?php echo SITE_URL; ?>admin/dashboards"><i class="fa fa-home"></i>Home</a></li>
 <?php if(isset($companies['id'])){ ?>
<li class="active"><a href="javascript:void(0)">Edit Statistics</a></li>   
<?php } else { ?>
<li class="active"><a href="javascript:void(0)">Add Statistics</a></li>
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
          <h3 class="box-title"><i class="fa fa-plus-square" aria-hidden="true"></i> <?php if(isset($companies['id'])){ echo 'Edit Static'; }else{ echo 'Create Statistics';} ?></h3>
        </div>
            <!-- /.box-header -->
            <!-- form start -->
    <?php echo $this->Form->create($companies, array(
                       'class'=>'form-horizontal',
                       'enctype' => 'multipart/form-data',
                       'validate'
                      )); ?>
 <div class="box-body">
   
    <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Title</label>

              <div class="col-sm-3">
       <?php echo $this->Form->input('duration', array('class' => 'form-control','required','label'=>false,'placeholder'=>'Enter Title')); ?>
               
              </div>
              
            </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Description</label>

              <div class="col-sm-8">
       <?php echo $this->Form->input('url', array('class' => 
                    'longinput form-control ckeditor','placeholder'=>'Course Duration','required','label'=>false,'type'=>'textarea')); ?>
               
              </div>
              
            </div>
     
      
  
  </div>
  <!-- /.box-body -->
          <div class="box-footer">
      <?php
        if(isset($companies['id'])){
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
    $('#datepick1').datepicker({ "dateFormat":"dd-mm-yy"});             
       })    
   </script>  
