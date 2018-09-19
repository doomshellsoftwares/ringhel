
 
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create Article
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo SITE_URL; ?>admin/dashboards"><i class="fa fa-home"></i>Home</a></li>

      <?php if(isset($articles['id'])){ ?>
        <li class="active"><a href="javascript:void(0)">Edit Article</a></li>   
      <?php } else { ?>
        <li class="active"><a href="javascript:void(0)">Add New Article</a></li>
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
            <h3 class="box-title"><i class="fa fa-plus-square" aria-hidden="true"></i> <?php if(isset($articles['id'])){ echo 'Edit Post New'; }else{ echo 'Create Article';} ?></h3>
          </div>
          <!-- /.box-header -->
 <div class="box-body">    
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>                      
        <th>Title</th>                            
        <th>Category</th>                           
        <th>Subcategory</th>                        
        <th>Language</th>                        
      </tr>
    </thead>
    <tbody>
      <?php $page = $this->request->params['paging']['']['page'];
      $limit = $this->request->params['paging']['']['perPage'];
      $counter = ($page * $limit) - $limit + 1;
      if(isset($article) && !empty($article)){ 
    foreach($article as $intusr){//pr($intusr);die;
      ?>
      <tr>
        <td><?php if(isset($intusr['title'])){ echo ucfirst($intusr['title']);}else{ echo 'N/A'; } ?></td>
        <td>
          <?php 
          echo ucfirst($intusr['catelang']['title']);?>
        </td>

        <td>
          <?php 
          $getcatdetail=$this->Comman->getsubcat($intusr['subcat_id']); 
         // pr($getcatdetail);
          echo $getcatdetail['title'];
          ?>   
        </td>
        
        <td><?php if(isset($intusr['language']['name'])){ echo ucfirst($intusr['language']['name']);}else{ echo 'N/A'; } ?></td>
      </tr>
      <tr>
        
        <td colspan="3"><h3>Content</h3><?php if(isset($intusr['description'])){ echo ucfirst($intusr['description']);}else{ echo 'N/A'; } ?></td>
      </tr>
      <?php $counter++;} }else{?>
<!--
 fa fa-pencil-square-o
 fa fa-trash-o-->
<?php } ?>  
</tbody>

</table>
</div>
<!--new clone addd------------------------------------------------------------
------------------------------------------------------------------------------------------
-======================================================================================-->

<!-- Main content -->
<section class="content">
  <div class="row">

    <!-- right column -->
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-info">
        <?php echo $this->Flash->render(); ?>
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-plus-square" aria-hidden="true"></i> <?php if(isset($articles['id'])){ echo 'Edit Post New'; }else{ echo 'Create Article';} ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php echo $this->Form->create($articles, array(
         'class'=>'form-horizontal',
         'enctype' => 'multipart/form-data',
         'validate'
       )); ?>
       <div class="box-body">
        <div class="form-group">
          <div class="col-sm-4">
           <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
           <?php echo $this->Form->input('title', array('class' => 'form-control','placeholder'=>'Enter Title','required','label'=>false)); ?>
         </div>
         <div class="col-sm-4" style="display: none;">
           <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
           <?php 
           echo $this->Form->input('cat_id', array('class' => 'form-control','selected' ,'options'=>$category,'label'=>false)); ?>
         </div>
         <div class="col-sm-4" style="display: none;">
           <label for="inputEmail3" class="col-sm-2 control-label">Subcategory</label>
           <?php 
           echo $this->Form->input('subcat_id', array('class' => 'form-control','selected','id'=>'state','options'=>$state,'label'=>false)); ?>
         </div>
       </div>

       <div class="form-group">

         <div class="col-sm-4">
          <label for="inputEmail3" class="col-sm-2 control-label">Language</label>
          <?php echo $this->Form->input('lang_id', array('class' => 'form-control', 
          'required','options'=>$language,'empty'=>'Select Language','label'=>false)); ?> 

        </div>
        <div class="col-sm-4">
          <label for="inputEmail3" class="col-sm-2 control-label">Keywords</label>
          <?php echo $this->Form->input('keyword',array('class'=>'form-control', 'type'=>'text' ,'label' =>false,'placeholder'=>'Enter Keywords')); ?>

        </div>
        <div class="col-sm-4">
          <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
          <?php echo $this->Form->input('cimage', array('class' => 
                    'longinput form-control','type'=>'file','label'=>false)); ?>

        </div>

      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Content</label>
        <div class="col-sm-12">
         <?php echo $this->Form->input('description', array('class' => 
         'longinput form-control ckeditor','type'=>'textarea','label'=>false)); ?>

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


<style type="text/css">
.previe{
  margin-right: 10px;
}
</style>



