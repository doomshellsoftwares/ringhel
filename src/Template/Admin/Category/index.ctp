 <div class="content-wrapper">
   <section class="content-header">
    <h1>
      Category Manager
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo SITE_URL; ?>admin/category"><i class="fa fa-home"></i>Home</a></li>
      <li><a href="<?php echo SITE_URL; ?>admin/category">Category Manager</a></li>
    </ol> 
  </section> <!-- content header -->

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">    
        <div class="box">
          <div class="box-header">
            <?php echo $this->Flash->render(); ?>
            <a href="<?php echo SITE_URL; ?>admin/category/add">
              <button class="btn btn-success pull-right m-top10"><i class="fa fa-plus" aria-hidden="true"></i>
              Add Category</button></a>
            </div><!-- /.box-header -->
            <div class="box-body">    
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Name</th>                            
                    <th>Parent Name</th>                            
                    <th>Add Language</th>                            

                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $page = $this->request->params['paging']['']['page'];
                  $limit = $this->request->params['paging']['']['perPage'];
                  $counter = ($page * $limit) - $limit + 1;
                  if(isset($users) && !empty($users)){ 
    foreach($users as $intusr){ //pr($intusr);
      ?>
      <tr>
        <td><?php echo $counter;?></td>
        
        <td>

          <?php 
          if($intusr['parent_id']!=0)
            { ?> 
              <a data-toggle="modal" class='infolangcat' style="text-decoration: underline;" href="<?php echo SITE_URL?>admin/category/info_cat/<?php echo $intusr['id'];?>">
           <?php echo ucfirst($intusr['name']); ?> 
         </a>
      <?php   } 
      else{  ?>
           <a data-toggle="modal" class='infolangcat' style="text-decoration: underline;" href="<?php echo SITE_URL?>admin/category/info_cat/<?php echo $intusr['id'];?>">
            <?php echo ucfirst($intusr['name']); ?>
             </a>
          <?php } ?>

        </td>

        <td>
          <?php $getcatdetail=$this->Comman->getCategorydetail($intusr['parent_id']); ?>
          <?php 
          if($intusr['parent_id']==0)
          { 
            echo '';
          } else{ echo  ucfirst($getcatdetail['name']); 
        } ?>   
      </td>
      
      <td>

       <a  data-toggle="modal" class='addlangcat btn btn-success' href="<?php echo SITE_URL?>admin/category/title_cat/<?php echo $intusr['id'];?>">+</a>

     </td>
    <?php /*
        <td>
          <?php if($intusr->status=="Y"){  ?>
            <?=  $this->Html->link(__('Approved'), ['action' => 'status', $intusr->id,'N'],['class'=>'label label-success']) ?>
          <?php  }else {?>
            <?=  $this->Html->link(__('Unapproved'), ['action' => 'status', $intusr->id,'Y'],['class'=>'label label-primary']) ?>
          <?php } ?>

          </td> */ ?>
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
<div class="modal" id="langcatmodal">
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

<!-- Modal -->
<div class="modal" id="langcatinfo">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <span class="modal-title" style="color: #fff;">Category Languages</span>
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
 $('.addlangcat').click(function(e){ 
  e.preventDefault();
  $('#langcatmodal').modal('show').find('.modal-body').load($(this).attr('href'));
});
</script>

<script>
 $('.infolangcat').click(function(e){ 
  e.preventDefault();
  $('#langcatinfo').modal('show').find('.modal-body').load($(this).attr('href'));
});
</script>

