		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">    
					<div class="box">
						<div class="box-header">
							<?php echo $this->Flash->render(); ?>

						</div><!-- /.box-header -->
						<div class="box-body">    
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>S.no</th>                            
										<th>Name</th>                            
										<th>Language</th>                            
										<th>Meaning</th>                            
										<th>Action</th>
									</tr>
								</thead>

								<tbody>
									<?php $page = $this->request->params['paging']['']['page'];
									$limit = $this->request->params['paging']['']['perPage'];
									$counter = ($page * $limit) - $limit + 1;
    foreach($catelang as $value){ //pr($intusr);
    	?>
    	<tr>
    		<td><?php echo $counter;?></td>
    		<td><?php echo $value['category']['name']; ?></td>
    		<td><?php echo $value['language']['name']; ?></td>
    		<td><?php echo $value['title']; ?></td>
    		<td>
    			<?php
    			echo $this->Html->link('Delete', [
    				'action' => 'delete_catinfo',
    				$value->id
    			],['class'=> 'btn btn-danger',"onClick"=>"javascript: return confirm('Are you sure do you want to delete this')"]); ?>
    		</td>
    	</tr>
    	<?php $counter++;}  ?>  
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