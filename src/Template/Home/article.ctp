  <?php echo $this->Flash->render(); ?>
  <div id="comment_update">
<section id="content">
<div class="container">
<div class="article_main_box article_main_box_inner">
<div class="row">
<div class="col-sm-2">
<div class="left_part">
<ul>
<li>
<i class="far fa-calendar"></i>
<h3><?php echo date('d',strtotime($article['created'])); ?><span><?php echo date('M',strtotime($article['created'])); ?></span></h3>
<p><?php echo date('Y',strtotime($article['created'])); ?></p>
</li>
<!--<li>
<i class="far fa-clock"></i>
<h3>04.30<span>Pm</span></h3>
<p>2018</p>
</li>-->
</ul>
</div>
</div>
<div class="col-sm-10">
<div class="articlebg">
<img src="<?php echo SITE_URL; ?>images/<?php echo $article['cimage']; ?>">
</div>

<div class="article_box">
<h1><?php echo $article['title']; ?></h1>
<ul class="text-left">
<!--<li><i class="far fa-calendar"></i>03 dec 2018</li>-->
<li><i class="fas fa-user"></i>John Snow</li>
<li><i class="far fa-id-badge"></i>ID 868686</li>
</ul>
<p><?php echo $article['description']; ?></p>

</div>

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

<div class="cmnt_box">
	   <?php echo $this->Form->create($requirement,array('url' => array('controller' => 'home', 'action' => 'comment'),'type'=>'file','inputDefaults'=>array('div'=>false,'label'=>false),'class'=>'form-horizontal','id'=>'comment_form','autocomplete'=>'off')); ?>
    <div class="form-group">
    <div class="col-sm-1">
    <label><i class="fab fa-blogger-b"></i></label>
    </div>
      <div class="col-sm-11">
		    <?php echo $this->Form->input('comment',array('class'=>'form-control','placeholder'=>'Enter your comment','id'=>'name','required','label' =>false)); ?>
        <input type="hidden" value="<?php echo $article_id; ?>" name="article_id">
        
        
      </div>
    </div>
  </form>
</div>
<div class="alert with-close alert-success commentsucess" style="display:none;">
Comment Post Successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
 <button type="submit" class="cmnt_btn" form="comment_form"  id="bn_comment">Post Comment</button>

</div>
</div>
</div>
</div>
</section>
</div>

<script>
$('#bn_comment').click(function(e) { 
	e.preventDefault();
	
    $.ajax({
	type: "POST",
	url: '<?php echo SITE_URL;?>home/comment',
	data: $('#comment_form').serialize(),
	cache:false,
	success:function(data){ 
	 $("#comment_update").html(data); 
	$(".commentsucess").css("display","block"); 

	}
    });
});
</script>
