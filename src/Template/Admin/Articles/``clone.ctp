
 
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create Article
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo SITE_URL; ?>admin/dashboards"><i class="fa fa-home"></i>Home</a></li>

      <?php if(isset($article['id'])){ ?>
        <li class="active"><a href="javascript:void(0)">Edit Article</a></li>   
      <?php } else { ?>
        <li class="active"><a href="javascript:void(0)">Add New Article</a></li>
      <?php } ?>
    </ol>
  </section>

<section class="content">
  <div class="row">

    <!-- right column -->
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-info">
          <?php echo $this->Flash->render(); ?>
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-plus-square" aria-hidden="true"></i> <?php if(isset($article['id'])){ echo 'Edit Post New'; }else{ echo 'Create Article';} ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($article, array(
           'class'=>'form-horizontal',
           'enctype' => 'multipart/form-data',
           'validate'
         )); ?>
         <div class="box-body">

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Title</label>

            <div class="col-sm-3">
             <?php echo $this->Form->input('title', array('class' => 'form-control','required','label'=>false,'placeholder'=>'Enter Post Title')); ?>

           </div>
           <label for="inputEmail3" class="col-sm-2 control-label">Language</label>

           <div class="col-sm-3">
             <?php echo $this->Form->input('lang_id', array('class' => 'form-control', 
             'required','options'=>$language,'empty'=>'Select Language','id'=>'language_cat','label'=>false)); ?> 

           </div>


         </div>
         <div class="form-group">
         <label for="inputEmail3" class="col-sm-2 control-label">Category</label>

         <div class="col-sm-3">
           <?php 
           echo $this->Form->input('cat_id', array('class' => 'form-control','empty'=>'Select Category', 'id'=>'manager_email' ,'options'=>$category,'required','label'=>false)); ?>
         </div>

         <label for="inputEmail3" class="col-sm-2 control-label">Subcategory</label>

          <div class="col-sm-3">
           <?php 
           echo $this->Form->input('subcat_id', array('class' => 'form-control','empty'=>'Select Sub Categroy','id'=>'state','label'=>false,'options'=>$state)); ?>

         </div>

       </div>

       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Keywords</label>

        <div class="col-sm-3">
          <?php echo $this->Form->input('keyword',array('class'=>'form-control', 'type'=>'text' ,'label' =>false,'placeholder'=>'Enter Keywords')); ?>

        </div>

        <label for="inputEmail3" class="col-sm-2 control-label">Status</label>

         <div class="col-sm-3">
         <?php $sector=array('D'=>'Draft','P'=>'Published');
         echo $this->Form->input('status', array('class' => 'form-control','selected','options'=>$sector,'required','label'=>false)); ?>

       </div>

     </div>
     <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Add Image</label>

        <div class="col-sm-3">
          <?php echo $this->Form->input('cimage', array('class' => 
                    'longinput form-control','type'=>'file','label'=>false)); ?>

        </div>
     </div>

     <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Content</label>
      <div class="col-sm-8">
       <?php echo $this->Form->input('description', array('class' => 
       'longinput form-control ckeditor','required','type'=>'textarea','label'=>false)); ?>

     </div>



   </div>


 </div>
 <!-- /.box-body -->
 <div class="box-footer">

  <?php
  if(isset($articles['id'])){
    echo $this->Form->submit(
      'Update', 
      array('class' => 'btn btn-info pull-right', 'title' => 'Update')
    ); }else{ 
      echo $this->Form->submit(
        'Submit', 
        array('class' => 'btn btn-info pull-right', 'title' => 'Add')
      );
    } ?>

    <a href="#" class="btn btn-info pull-right previe">Preview</a>
    <?php
    echo $this->Html->link('Back', [
      'action' => 'index'

    ],['class'=>'btn btn-default']); ?>
  </div>
  <!-- /.box-footer -->
  <?php echo $this->Form->end(); ?>
</div>

</div>

</div>
<!--/.col (right) -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->


<style type="text/css">
.previe{
  margin-right: 10px;
}
</style>



