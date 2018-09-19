	<section class="content">
		<div class="row">

			<!-- right column -->
			<div class="col-md-12">
				<!-- Horizontal Form -->
				<div class="box box-info">
					<?php echo $this->Flash->render(); ?>
				
					<!-- /.box-header -->
					<!-- form start -->
					<?php echo $this->Form->create($category, array(
						'class'=>'form-horizontal',
						'enctype' => 'multipart/form-data',
						'validate'
					)); ?>
					<div class="box-body">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">Language</label>

							<div class="col-sm-6">
								<?php echo $this->Form->input('lang_id', array('class' => 'form-control','label'=>false,'empty'=>'Language','options' => $language)); ?>
							</div>
						</div>

							<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">Title</label>

							<div class="col-sm-6 input_fields_wrap">
								<?php echo $this->Form->input('title', array('class' => 'form-control','type'=>'text','required','label'=>false,'placeholder'=>'Enter Title')); ?>
							</div>
						
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label"></label>

							<div class="col-sm-6">
								<?php echo $this->Form->input('cat_id', array('class' => 'form-control','label'=>false,'type'=>'hidden','value'=>$cat_id)); ?>
							</div>
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