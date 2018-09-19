 <style type="text/css">
   #cke_1_contents{
    height: 60px !important;
   }
 </style>

 <div class="content-wrapper">
   <section class="content-header">
    <h1>
      Article Manager
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo SITE_URL; ?>admin/category"><i class="fa fa-home"></i>Home</a></li>
      <li><a href="<?php echo SITE_URL; ?>admin/article">Article Manager</a></li>
    </ol> 
  </section> <!-- content header -->

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">    
        <div class="box">
          <div class="box-header">
            <?php echo $this->Flash->render(); ?>
            <a href="<?php echo SITE_URL; ?>admin/articles/add">
              <button class="btn btn-success pull-right m-top10"><i class="fa fa-plus" aria-hidden="true"></i>
              Add Article</button></a>
            </div><!-- /.box-header -->
            <div class="box-body">    
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Article ID</th>                            
                    <th>Title</th>                            
                    <th>Category</th>                           
                    <th>Subcategory</th>                        
                    <th>Language</th>                        
                    <th>Last Modified By</th>                        
                    <th>Last Modification Date & Time</th>
                    <th>&nbsp;</th>
                    <th>Image</th>
                    <th>Action</th>
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
        <td><?php echo $counter;?></td>
        <td>KB <?php echo $intusr['id']; ?></td>
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
        <td>Admin</td>
        <td><?php if(isset($intusr['created'])){ echo ucfirst($intusr['created']);}else{ echo 'N/A'; } ?></td>
        
        <td>

          <a class='btn btn-success btn-xs' href="<?php echo SITE_URL?>admin/articles/clone/<?php echo $intusr['id'];?>">Clone
        </a>

      </td>

        <td>
          <?php if (isset($intusr['cimage'])) { ?>
            <img src="<?php echo SITE_URL; ?>images/<?php echo $intusr['cimage']; ?>" height="30px" width="30px" alt="image">

          <?php } else{ ?>
            <img src="<?php echo SITE_URL; ?>images/logomini.png" height="30px" width="30px" alt="image">
          <?php } ?>
        </td>
        <td>
          <?php
          echo $this->Html->link('Edit', [
            'action' => 'edit',
            $intusr->id
          ],['class'=>'btn btn-primary']); ?>
          <?php
          echo $this->Html->link('Delete', [
            'action' => 'delete',
            $intusr->id
          ],['class'=> 'btn btn-danger',"onClick"=>"javascript: return confirm('Are you sure do you want to delete this')"]); ?>
        </td>
      </tr>
      <?php $counter++;} }else{?>
<!--
 fa fa-pencil-square-o
 fa fa-trash-o-->
<?php } ?>  
</tbody>

</table>
</div>

<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->  
</div>
<!-- /.row -->      
</section>
<!-- /.content -->  

</div>     
<!-- /.   content-wrapper -->  

<!-- Modal -->
<div class="modal" id="articlemodal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <span class="modal-title" style="color: #fff;">Add Language</span>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">


      </div>


    </div>
  </div>
</div>
<!-- /.modal -->

<script>
 $('.addarticle').click(function(e){ 
  e.preventDefault();
  $('#articlemodal').modal('show').find('.modal-body').load($(this).attr('href'));
});
</script>

