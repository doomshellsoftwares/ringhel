<?php 
$str = file_get_contents('json/results.json');
$event = json_decode($str, true);
?> 
   <div class="content-wrapper">
   <section class="content-header">
    <h1>
       Event  View
    </h1>
    </section> <!-- content header -->
            
    <section class="content">   
    <div class="box-header">
	<?php echo $this->Flash->render(); ?>
     </div><!-- /.box-header -->
               
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="100px;">#</th>             
                  <th>Event Name</th>
                  <th>Partner Logo</th>
                  <th>Event Logo</th>
                  </tr>
                </thead>
                <tbody>
		<?php 
		if(isset($event['Event']) && !empty($event['Event'])){ 
		foreach($event['Event'] as $service){
		?>
            <tr>
                <td><?php echo $counter;?></td>
                <td><?php if(isset($service['eventname'])){ echo ucfirst($service['eventname']);}else{ echo 'N/A'; } ?></td>
                 <td><?php if(isset($service['partnerlogo_image']) && $service['partnerlogo_image'] !=''){ ?><img src="<?php echo SITE_URL;?>excel_image/<?php echo $service['partnerlogo_image'];?>" height="100px;" width="200px;"><?php }else{ echo 'N/A';}?></td>
                 <td><?php if(isset($service['eventlogo_image']) && $service['eventlogo_image'] !=''){ ?><img src="<?php echo SITE_URL;?>excel_image/<?php echo $service['eventlogo_image'];?>" height="100px;" width="200px;" ><?php }else{ echo 'N/A';}?></td>
                 </tr>
		<?php $counter++;} }else{?>
		<tr>
		<td colspan="5">NO Data Available</td>
		</tr>
		<?php } ?>	
                </tbody>
               
              </table>    
  </section>
    <!-- /.content -->  
    
    <section class="content-header">
    <h1>
       Product  View
    </h1>
    </section> <!-- content header -->
            
    <section class="content">            
    <div class="box-header">
	<?php echo $this->Flash->render(); ?>
     </div><!-- /.box-header --> 
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="20px;">#</th>
                  <th width="20px;">Event Name</th>
                  <th width="25px;">Product Name</th>
                  <th width="25px;">Company Name</th>
                  <th width="25px;">Category Name</th>
                  <th width="25px;">Product Image</th>
                  <th width="20px;">Selling Unit</th>
                  <th width="25px;">Seller Price Per Item</th>
                  <th width="25px;">Seller Price per Kg</th>
                  <th width="20px;">Mark Up %</th>
                  <th width="20px;">Media</th>
                  <th width="25px;">Typeform Url</th>
                  </tr>
                </thead>
                <tbody>
		<?php 
		if(isset($event['Product']) && !empty($event['Product'])){ 
		foreach($event['Product'] as $service){
		?>
            <tr>
             <td><?php echo $counter;?></td>
             <td><?php if(isset($service['Event_Name'])){ echo ucfirst($service['Event_Name']);}else{ echo 'N/A'; } ?></td>
             <td><?php if(isset($service['Product_Name'])){ echo ucfirst($service['Product_Name']);}else{ echo 'N/A'; } ?></td>
             <td><?php if(isset($service['Company_Name'])){ echo ucfirst($service['Company_Name']);}else{ echo 'N/A'; } ?></td>
             <td><?php if(isset($service['Category_Name'])){ echo ucfirst($service['Category_Name']);}else{ echo 'N/A'; } ?></td>
             <td><?php if(isset($service['Product_Image']) && $service['Product_Image'] !=''){ ?><img src="<?php echo SITE_URL;?>excel_image/<?php echo $service['Product_Image'];?>" height="100px;" width="200px;"><?php }else{ echo 'N/A';}?></td>
             <td><?php if(isset($service['Selling_Unit'])){ echo ucfirst($service['Selling_Unit']);}else{ echo 'N/A'; } ?></td>
             <td><?php if(isset($service['SellerPrice _Per_ Item'])){ echo ucfirst($service['SellerPrice _Per_ Item']);}else{ echo 'N/A'; } ?></td>
             <td><?php if(isset($service['SellerPrice _per_ Kg'])){ echo ucfirst($service['SellerPrice _per_ Kg']);}else{ echo 'N/A'; } ?></td>
             <td><?php if(isset($service['MarkUp _%'])){ echo ucfirst($service['MarkUp _%']);}else{ echo 'N/A'; } ?></td>
             <td><?php if(isset($service['Media'])){ echo ucfirst($service['Media']);}else{ echo 'N/A'; } ?></td>
             <td><?php if(isset($service['Typeform_Url'])){ echo ucfirst($service['Typeform_Url']);}else{ echo 'N/A'; } ?></td>
                 </tr>
		<?php $counter++;} }else{?>
		<tr>
		<td colspan="5">NO Data Available</td>
		</tr>
		<?php } ?>	
                </tbody>
               
              </table>    
  </section>
    <!-- /.content -->   
    
    
    
    
    
 </div>     
     <!-- /.   content-wrapper -->  
