<?php //pr($this->request->params); ?>
<?php if($this->request->params['action']!='title_cat' && $this->request->params['action']!='info_cat' ) { ?>
			<?php echo $this->element('admin/header'); ?>
			
			<?php echo $this->element('admin/menu'); ?>
<?php  } ?>
					<?php echo  $this->fetch('content') ; ?> 	
			<?php if($this->request->params['action']!='title_cat' && $this->request->params['action']!='info_cat' ) { ?>
		
			<?php echo $this->element('admin/footer'); ?>
<?php } ?>		
