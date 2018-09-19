 <div class="content-wrapper">
   <section class="content-header">
    <h1>
         Statistics Manager
    </h1>
    <ol class="breadcrumb">
    <li><a href="<?php echo SITE_URL; ?>admin/dashboard"><i class="fa fa-home"></i>Home</a></li>
<li><a href="<?php echo SITE_URL; ?>admin/statistics">Statistics Manager</a></li>
    </ol> 
    </section> <!-- content header -->

    <!-- Main content -->
    <section class="content">
  <div class="row">
    <div class="col-xs-12">    
  <div class="box">
    <div class="box-header">
  <?php echo $this->Flash->render(); ?>
    <a href="<?php echo SITE_URL; ?>admin/static/add">
    <button class="btn btn-success pull-right m-top10"><i class="fa fa-plus" aria-hidden="true"></i>
    Add Statistics</button></a>
     </div><!-- /.box-header -->
      <div class="box-body">    
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Description</th>                             
					           <th>Status</th>
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
            <td><?php if($company['status']=='Y'){ 
            echo $this->Html->link('Approved', [
          'action' => 'status',
          $company->id,
          $company['status']  
          ],['class'=>'label label-success']);
      
          }else{ 
        echo $this->Html->link('Unapproved', [
          'action' => 'status',
          $company->id,
           $company['status']
      ],['class'=>'label label-primary']);
        
       } ?>
    </td> 
    <td>
      <?php
      echo $this->Html->link('Edit', [
          'action' => 'edit',
          $company->id
      ],['class'=>'btn btn-primary']); ?>
      </td>
                </tr>
    <?php $counter++;} }else{?>
    <tr>
               <td><?php echo $counter;?></td>
                <td><?php //if(isset($company['name'])){ echo ucfirst($company['name']);}else{ echo 'N/A'; } ?>xyz</td>
                <td><?php //if(isset($company['name'])){ echo ucfirst($company['name']);}else{ echo 'N/A'; } ?>xyz dummy data</td>
                
                
               
            <td><?php if($company['status']=='Y'){ 
            echo $this->Html->link('Active', [
          'action' => '#',
          $company->id,
          $company['status']  
          ],['class'=>'label label-success']);
      
          }else{ 
        echo $this->Html->link('Inactive', [
          'action' => '#',
          $company->id,
           $company['status']
      ],['class'=>'label label-primary']);
        
       } ?>
    </td> 
    <td>
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
     
     
     
