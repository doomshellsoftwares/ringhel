<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Create New Category
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo SITE_URL; ?>admin/dashboard"><i class="fa fa-home"></i>Home</a></li>

			<?php if(isset($category['id'])){ ?>
				<li class="active"><a href="javascript:void(0)">Edit Category</a></li>   
			<?php } else { ?>
				<li class="active"><a href="javascript:void(0)">Add Category</a></li>
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
						<h3 class="box-title"><i class="fa fa-plus-square" aria-hidden="true"></i> <?php if(isset($category['id'])){ echo 'Edit Post New'; }else{ echo 'Create New Category';} ?></h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<?php echo $this->Form->create($category, array(
						'class'=>'form-horizontal',
						'enctype' => 'multipart/form-data',
						'validate'
					)); ?>
					<div class="box-body">

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">Category Name</label>

							<div class="col-sm-6">
								<?php echo $this->Form->input('name', array('class' => 'form-control','Type'=>'mail', 'required','label'=>false,'placeholder'=>'Enter Category Name')); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">Subcategory Name</label>

							<div class="col-sm-6 input_fields_wrap">
								<?php echo $this->Form->input('name', array('class' => 'form-control','required','label'=>false,'placeholder'=>'Enter Subcategory Name')); ?>
							</div>
							<a href="javascript.void(0);" class="add_field_button"><i style="font-size: 26px; padding-top: 4px;color: #3c8dbc;" class="fa fa-plus-circle"></i></a>
						</div>

					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<?php
						if(isset($category['id'])){
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
			$('#datepickpost1').datepicker({ "dateFormat":"dd-mm-yy"});             
		})    
	</script>  

	<script type="text/javascript">
		$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
    	e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-group"><div class="col-sm-10"> <?php echo $this->Form->input('subcat', array('class' => 'form-control','required','label'=>false,'placeholder'=>'Enter Subcategory Name')); ?></div><a href="#" class="remove_field"><i style="font-size: 26px; padding-top: 4px;color: #3c8dbc;" class="fa fa-minus-circle"></i></a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    	e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>