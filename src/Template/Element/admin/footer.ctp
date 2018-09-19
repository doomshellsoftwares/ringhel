<footer class="main-footer">
    
<!--Copyright &copy; <?php echo date('Y')."-".(date('Y')+1);?>-->
    © 2018 All Rights Reserved.<a href="<?php echo SITE_URL;?>" class="ring"> RINGHEL</a> 
  </footer>

  
  
</div>
<!-- ./wrapper -->

<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>


<!-- Sparkline -->
<?= $this->Html->script('admin/jquery.sparkline.min.js') ?>

<!-- jvectormap -->
<?= $this->Html->script('admin/jquery-jvectormap-1.2.2.min.js') ?>
<?= $this->Html->script('admin/jquery-jvectormap-world-mill-en.js') ?>

<!-- jQuery Knob Chart -->
<?= $this->Html->script('admin/jquery.knob.js') ?>

<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<?= $this->Html->script('admin/daterangepicker.js') ?>

<!-- datepicker -->
<?= $this->Html->script('admin/bootstrap-datepicker.js') ?>

<!-- Bootstrap WYSIHTML5 -->
<?= $this->Html->script('admin/bootstrap3-wysihtml5.all.min.js') ?>

<!-- Slimscroll -->
<?= $this->Html->script('admin/jquery.slimscroll.min.js') ?>

<!-- FastClick -->
<?= $this->Html->script('admin/fastclick.js') ?>
<?= $this->Html->script('admin/jquery.dataTables.min.js') ?>
<?= $this->Html->script('admin/dataTables.bootstrap.min.js') ?>


<!-- Commented the following line 60 and used the line 61 following it instead -->
<!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
<?php echo $this->Html->css('admin/jquery-ui.css'); ?>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<!-- Select2 -->


<?= $this->Html->css('select2/select2.min.css') ?>

<?= $this->Html->script('select2/select2.full.min.js') ?>

<!-- input date -->

<script>
   $('#datepicksd123').datepicker();
</script>


  
<!-- AdminLTE App -->
<?= $this->Html->script('admin/app.min.js') ?>

  <script src="<?php echo SITE_URL;?>ckeditor/ckeditor.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<?= $this->Html->script('admin/dashboard.js') ?>-->




<style type="text/css">
	.ring{font-size: 13px;}
</style>
</body>
</html>
