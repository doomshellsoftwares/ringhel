<?php foreach($article['comment'] as $key=>$value){ ?>
<div class="cmnt_box">
<div class="row">
<!--<div class="col-sm-2">
<img src="images/profile-pics.jpg">
</div>-->

<div class="col-sm-12">
<h4><?php echo $value['user']['name']; ?> <span><?php echo date('d M Y',strtotime($value['date'])); ?></span></h4>

</div>

<div class="col-sm-12">
<p><?php echo $value['comment']; ?></p>
</div>
</div>
</div>
<?php } ?>
