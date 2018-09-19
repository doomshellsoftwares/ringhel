         <?php echo $this->Flash->render(); ?>

<section id="content">
<div class="container">
<div class="article_main_box">
<div class="row">
<div class="col-sm-12">
	<?php if(count($article)>0) { ?>
	<?php foreach($article as $key=>$value){ //pr($value); ?>
<div class="article_box">
<h1><a href="<?php echo SITE_URL; ?>home/article/<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a></h1>
<ul class="text-left">
<li><i class="far fa-calendar"></i><?php echo date('d M Y',strtotime($value['created'])); ?></li>
<li><i class="fas fa-user"></i>John Snow</li>
<li><i class="far fa-id-badge"></i>ID 868686</li>
</ul>
<p><?php echo $value['description']; ?></p>
<a href="<?php echo SITE_URL; ?>home/article/<?php echo $value['id']; ?>"><?php echo __('Read More'); ?><i class="fas fa-angle-double-right"></i></a>
</div>
 <?php }?>

<?php } else { ?>
<strong><?php echo  "No Data Avialabel"; ?></strong>
<?php } ?>

</div>
</div>
</div>
</div>
</section>

