<div class="modal-header">
	<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
	<h4 class="modal-title">
		            <i class="fa fa-plus-square"></i> Property Details</h4>
		        
</div>






<div class="modal-body">
<div class="bs-example">
    <table class="table table-bordered">
        <thead>
            <tr>
                         <th>S.no</th>
                         <th>Title</th>
						 <th>Type</th>
						 <th>Owner</th>
						 <th>Country</th>
                         <th>City</th>
                         <th>Locality</th>
					     <th>Area</th>
					     <th>Price</th>
                         <th>Added Date</th>
            </tr>
        </thead>
        <tbody>
			                <?php if(count($agent_property)>0){ //pr($destination);?>
			                <?php $i=1; foreach($agent_property as $key=>$value) {  ?>
			                <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value['Property']['name']; ?></td>
                            <td><?php   echo $value['Propertytype']['en_name']; ?></td>
                            <td><?php   echo $value['User']['name']; ?></td>
                            
                            <td><?php echo $value['Country']['en_name']; ?></td>
                            <td><?php echo $value['City']['en_name']; ?></td>
                            <td><?php echo $value['Location']['name']; ?></td>
							<td><?php  echo $value['Property']['area']." "; echo ($value['Property']['area_unit']!='')?$value['Property']['area_unit']:$value['Property']['ship']; ?></td>
						    <td><?php  echo $value['Property']['tot_price']." ".$currency[1];  ?></td>
						   <td><?php echo strftime('%d-%b-%Y',strtotime($value['Property']['created']));?></td>
						   </tr> 
						     <?php $i++; } ?>
                    <?php } else{  ?>    
                    <tr><td colspan="11" align="center">No Meta Available</td></tr>
                    <?php } ?>
						   
        </tbody>
    </table>
</div>
</div><!--./modal-body-->
<div class="modal-footer">
	<button data-dismiss="modal" class="btn btn-default pull-right" type="button">Close</button>
</div><!--./modal-footer-->
</form>


