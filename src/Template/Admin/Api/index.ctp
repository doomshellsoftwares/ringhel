 <div class="content-wrapper">
   <section class="content-header">
    <h1>
        API Manager
    </h1>
    <ol class="breadcrumb">
    <li><a href="<?php echo SITE_URL; ?>admin/category"><i class="fa fa-home"></i>Home</a></li>
<li><a href="<?php echo SITE_URL; ?>admin/article">API Manager</a></li>
    </ol> 
    </section> <!-- content header -->

    <!-- Main content -->
    <section class="content">
  <div class="row">
    <div class="col-xs-12">    
  <div class="box">
    <div class="box-header">
  <?php echo $this->Flash->render(); ?>
  <!--  <a href="<?php echo SITE_URL; ?>admin/articles/view">
    <button class="btn btn-success pull-right m-top10"><i class="fa fa-eye" aria-hidden="true"></i>
    View</button></a>-->
     </div><!-- /.box-header -->
      <div class="box-body">    
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No.</th>
                  <th>API Number </th>                            
                  <th>User</th>                            
                  <th>Email ID</th>                           
                  <th>Mobile</th>                                               
             <!-- <th>Status</th>-->
              <th>Action</th>
                  </tr>
                </thead>
                <tbody>
    <?php $page = $this->request->params['paging']['']['page'];
    $limit = $this->request->params['paging']['']['perPage'];
    $counter = ($page * $limit) - $limit + 1;
    if(isset($companies) && !empty($companies)){ 
    foreach($companies as $company){//pr($service);die;
    ?>
            <tr>
                <td><?php echo $counter;?></td>
                <td><?php if(isset($company['name'])){ echo ucfirst($company['name']);}else{ echo 'N/A'; } ?></td>
                <td><?php if(isset($company['contact_person'])){ echo ucfirst($company['contact_person']);}else{ echo 'N/A'; } ?></td>
                <td><?php if(isset($company['email'])){ echo ucfirst($company['email']);}else{ echo 'N/A'; } ?></td>
                <td><?php if(isset($company['mobile'])){ echo ucfirst($company['mobile']);}else{ echo 'N/A'; } ?></td>
                <td><?php if(isset($company['address'])){ echo ucfirst($company['address']);}else{ echo 'N/A'; } ?></td>
            <td><?php /* if($company['status']=='Y'){ 
            echo $this->Html->link('Approved', [
          'action' => '#',
          $company->id,
          $company['status']  
          ],['class'=>'label label-success']);
      
          }else{ 
        echo $this->Html->link('Unapproved', [
          'action' => '#',
          $company->id,
           $company['status']
      ],['class'=>'label label-primary']);
        
       } */ ?>
    </td> 
    <td>
      <?php
      echo $this->Html->link('Edit', [
          'action' => '#',
          $company->id
      ],['class'=>'btn btn-primary']); ?>
      </td>
                </tr>
    <?php $counter++;} }else{?>
    
    <tr>
               
   <td><?php echo $counter;?></td>
                <td>KB110</td>
                <td>XYZ</td>
                <td>admin@doomshell.com</td>
                <td>9829591245</td>
           <!-- <td><?php /* if($company['status']=='Y'){ 
            echo $this->Html->link('Published', [
          'action' => '#',
          $company->id,
          $company['status']  
          ],['class'=>'label label-success']);
      
          }else{ 
        echo $this->Html->link('Draft', [
          'action' => '#',
          $company->id,
           $company['status']
      ],['class'=>'label label-primary']);
        
       } */ ?>

    </td> -->
    <td>
    	<button type="button"  class="btn btn-primary bttn" data-toggle="modal" data-target="#myModal">View</button>
      <?php
   //   echo $this->Html->link('Active', [
      //    'action' => '#',
    //      $company->id
  //    ],['class'=>'btn btn-primary']); ?>
      <?php
      echo $this->Html->link('Edit', [
          'action' => '#',
          $company->id
      ],['class'=>'btn btn-primary']); ?>
      <?php
      echo $this->Html->link('Delete', [
          'action' => '#',
          $member->id
      ],['class'=> 'btn btn-danger',"onClick"=>"javascript: return confirm('Are you sure do you want to delete this')"]); ?>

      </td>
    
   </tr>

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
 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Api Manager</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">


          <section class="content">
      <div class="row">
       
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
              <?php echo $this->Flash->render(); ?>
        
       
<?php echo $this->Form->create($companies, array('class'=>'form-horizontal','enctype' => 'multipart/form-data','validate')); ?>
 <div class="box-body">
   <div class="row">
    <div class="col-sm-6">
    <div class="form-group row">
    <div class="col-sm-6">
        <label for="inputEmail3" class=" control-label">Start date</label>
        <div class="">
        <?php echo $this->Form->input('expiryf',array('class'=>'form-control','id'=>'datepickpost2','label' =>false)); ?>
        </div>
   </div>
   <div class="col-sm-6">
        <label for="inputEmail3" class=" control-label">End date</label>
        <div class="">
        <?php echo $this->Form->input('expiryf',array('class'=>'form-control','id'=>'datepickpost3','label' =>false)); ?>
        </div>
     </div>    
   </div>
   </div>
   <div class="col-sm-6">
     <div class="form-group row">
    <div class="col-sm-5">
    
        <div class="search_btn">
        <?php echo $this->Form->input('Search',array('class'=>'form-control btn-success', 'type'=>'submit' ,'label' =>false)); ?>
        </div>
   </div> 
   <div class="col-sm-5">
        
        <div class="search_btn">
        <?php echo $this->Form->input('Reset',array('class'=>'form-control btn-primary', 'type'=>'submit' ,'label' =>false)); ?>
        </div>
   </div>    
   </div>
   </div>
  </div>

   <div class="form-group">    
        <div class="col-sm-4">Search Word</div>
        <div class="col-sm-4">
        90%  
        </div>
   </div>
   <div class="form-group">    
        <div class="col-sm-4">View Articles</div>
        <div class="col-sm-4">
        95%  
        </div>
   </div>
   <div class="form-group">    
        <div class="col-sm-4">Failed Searches</div>
        <div class="col-sm-4">
        10%  
        </div>
   </div>

  </div>
  <!-- /.box-body -->
       
          <!-- /.box-footer -->
 <?php echo $this->Form->end(); ?>
          </div>
      
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
   </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
<script>
    $(document).ready(function () {   
    $('#datepickpost2').datepicker({ "dateFormat":"dd-mm-yy"});             
       })  
       $(document).ready(function () {   
    $('#datepickpost3').datepicker({ "dateFormat":"dd-mm-yy"});             
       })    
   </script>  

   <style type="text/css">
     .modal-header {
    background-color: #166e9e !important;
}
.bttn {
    background-color: #166e9e !important;

}

.search_btn{
  margin-top: 22px;
}
   </style>