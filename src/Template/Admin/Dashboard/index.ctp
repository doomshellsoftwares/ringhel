

<script inline="1">

//<![CDATA[
$(document).ready(function () {
  $("#Mysubscriptions").bind("change", function (event) {
    $.ajax({
      async:true,
      data:$("#Mysubscriptions").serialize(),
      dataType:"html", 
      type:"POST", 
      url:"<?php echo ADMIN_URL ;?>dashboards/search",
      success:function (data) {
    //  alert(data); 
    $("#examp").html(data); }, 
  });
    return false;
  });});
//]]>
</script>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-building"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Internal Users</span>
            <span class="info-box-number"><?php echo $usersitcount; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total External Users</span>
            <span class="info-box-number"><?php echo $usersexcount; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>


      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-list-alt"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Categories</span>
            <span class="info-box-number"><?php echo $totalcat; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-newspaper-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Articles</span>
            <span class="info-box-number"><?php echo $totalarticle; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- START OF GRAPH PANEL -->



    <!-- END OF GRAPH PANEL --> 

    <!-- TABLE: LATEST ORDERS -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><strong>LATEST</strong> ARTICLES</h3>              
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table class="table no-margin">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>Article ID</th>                    
                <th>Title</th>                    
                <th>Category</th>                    
                <th>Subcategory</th> 
                <th>Language</th>
                <th>Last Modified By</th>                   
                <th>Last Modification Date & Time</th>                                     
              </tr>
            </thead>
            <tbody>
              <?php
              $i=1; 
                  foreach($article as $intusr){//pr($intusr);die;
                    ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td>KB <?php echo $intusr['id']; ?></td>
                      <td><?php if(isset($intusr['title'])){ echo ucfirst($intusr['title']);}else{ echo 'N/A'; } ?></td>
                      <td>
                        <?php 
                        echo ucfirst($intusr['catelang']['title']);?>
                      </td>

                      <td>
                        <?php 
                        $getcatdetail=$this->Comman->getsubcat($intusr['subcat_id']); 
         // pr($getcatdetail);
                        echo $getcatdetail['title'];
                        ?>   
                      </td>

                      <td><?php if(isset($intusr['language']['name'])){ echo ucfirst($intusr['language']['name']);}else{ echo 'N/A'; } ?></td>
                      <td>Admin</td>
                      <td><?php if(isset($intusr['created'])){ echo ucfirst($intusr['created']);}else{ echo 'N/A'; } ?></td>




                    </tr>
                    <?php $i++;} ?>

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <!--<a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>-->
              <a href="<?php echo ADMIN_URL; ?>articles/index" class="btn btn-sm btn-default btn-flat pull-right">View All Reports</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>LATEST</strong> INTERNAL USERS</h3>              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                    <tr>
                      <th>S.No.</th>
                      <th>Email Id</th>                    
                      <th>Name</th>                    
                      <th>Company Name</th>                    
                      <th>Prefferd Language</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1; 
                    foreach ($users as $value) { //pr($value);                                  
                      ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['email']; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['comp_name']; ?></td>
                        <td><?php echo $value['language']['name']; ?></td>

                      </tr>
                      <?php $i++; } ?>

                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <!--<a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>-->
                <a href="<?php echo ADMIN_URL; ?>internal/" class="btn btn-sm btn-default btn-flat pull-right">View Internal Users</a>
                <!--  <a href="<?php echo ADMIN_URL; ?>companies/index" class="btn btn-sm btn-default btn-flat pull-right">View All Companies</a>-->
              </div>
              <!-- /.box-footer -->
            </div>

            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title"><strong>LATEST</strong> EXTERNAL USERS</h3>              
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table no-margin">
                    <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Email Id</th>                    
                        <th>Name</th>                    
                        <th>Company Name</th>                    
                        <th>Prefferd Language</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=1; 
                      foreach ($usersex as $value) {                               
                        ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value['email']; ?></td>
                          <td><?php echo $value['name']; ?></td>
                          <td><?php echo $value['comp_name']; ?></td>
                          <td><?php echo $value['language']['name']; ?></td>

                        </tr>

                        <?php $i++;

                      }?>

                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <!--<a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>-->
                <a href="<?php echo ADMIN_URL; ?>external/" class="btn btn-sm btn-default btn-flat pull-right">View External Users</a>
                <!--<a href="<?php echo ADMIN_URL; ?>membersubscriptions/index" class="btn btn-sm btn-default btn-flat pull-right">View All Packages</a>-->
              </div>
              <!-- /.box-footer -->
            </div>

            <!-- /.box -->
            <?php /* ?> </div> <?php */ ?>
            <!-- /.col -->

      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




