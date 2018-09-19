<?php //echo "hello";die;?>
 <?= $this->Html->script('admin/canvasjs.min.js') ?>


<script type="text/javascript">
window.onload = function () { 
  
    CanvasJS.addColorSet("blue",
                [//colorSet Array
                "#2d95e3"              
                ]);
//monthlyearning
  var chart = new CanvasJS.Chart("monthlyproject",
  {
  
    animationEnabled: true,
      height:270,
      width:550,
    zoomEnabled:false,
    colorSet: "blue",
    title:{
      text: "Month wise earning",
      fontColor: "#000",
          fontSize: 14,
          padding: 10,
          fontWeight: "600",
      horizontalAlign: "left",
      fontFamily: "'Open Sans', sans-serif"
    },
    axisY: {title:"Earning",
      labelFontSize: 12,
      labelFontColor: "#000",
      valueFormatString:  "#,##,##0.##",
      labelFontFamily:"'Open Sans', sans-serif",
      maximum: 1000,
      gridThickness: 1,
      lineThickness: 1,
      tickThickness: 1,
      interval: 100
    },
    axisX: {title:"Duration",
      //valueFormatString: "MMM-YYYY",
      labelFontSize: 12,
      labelFontFamily:"'Open Sans', sans-serif",
      lineThickness: 1,
      labelFontColor: "#000",
      
      interval:1,
    },
    data: [
    {
      type: "column",
        dataPoints:<?php //echo $totalcustomer_this_year; ?> ,
    }
    ]
  });
  chart.render();  
  
  
  //monthlymember
  var chart1 = new CanvasJS.Chart("monthlyproperty",
  {
  
    animationEnabled: true,
      height:270,
      width:550,
    zoomEnabled:false,
    colorSet: "blue",
    title:{
      text: "Month wise members",
      fontColor: "#000",
          fontSize: 14,
          padding: 10,
          fontWeight: "600",
      horizontalAlign: "left",
      fontFamily: "'Open Sans', sans-serif"
    },
    axisY: {title:"Member",
      labelFontSize: 12,
      labelFontColor: "#000",
      valueFormatString:  "#,##,##0.##",
      labelFontFamily:"'Open Sans', sans-serif",
      maximum: 100,
      gridThickness: 1,
      lineThickness: 1,
      tickThickness: 1,
      interval: 10
    },
    axisX: {title:"Duration",
      //valueFormatString: "MMM-YYYY",
      labelFontSize: 12,
      labelFontFamily:"'Open Sans', sans-serif",
      lineThickness: 1,
      labelFontColor: "#000",
      
      interval:1,
    },
    data: [
    {
      type: "column",
        dataPoints:<?php //echo $totalsub_this_year; ?> ,
    }
    ]
  });
  chart1.render();  
}
</script>
<!--<script type="text/javascript">
window.onload = function () { 

	  CanvasJS.addColorSet("blue",
                [//colorSet Array
                "#2d95e3"              
                ]);
//all
	var chart = new CanvasJS.Chart("all",
	{
	
		animationEnabled: true,
			height:270,
			width:850,
		zoomEnabled:false,
		colorSet: "blue",
		title:{
			text: "Project:This Year",
			fontColor: "#000",
        	fontSize: 14,
        	padding: 10,
        	fontWeight: "600",
			horizontalAlign: "left",
			fontFamily: "'Open Sans', sans-serif"
		},
		axisY: {title:"Price",
			labelFontSize: 12,
			labelFontColor: "#000",
			valueFormatString:  "#,##,##0.##",
			labelFontFamily:"'Open Sans', sans-serif",
			maximum: 10000,
			gridThickness: 1,
			lineThickness: 1,
			tickThickness: 1,
			interval: 1000
		},
		axisX: {title:"Duration",
			//valueFormatString: "MMM-YYYY",
			labelFontSize: 12,
			labelFontFamily:"'Open Sans', sans-serif",
			lineThickness: 1,
			labelFontColor: "#000",
			
			interval:1,
		},
		data: [
		{
			type: "column",
		    dataPoints:<?php echo $totalcustomer_this_year; ?> ,
		 
		    		}
		]
	});
	chart.render();

}
</script>-->

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
              <span class="info-box-number">4</span>
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
              <span class="info-box-number">12</span>
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
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Categories</span>
              <span class="info-box-number">2</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Articles</span>
              <span class="info-box-number">2620</span>
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


<section class="graphPanel box box-info">

<div class="row">
      <aside class="col-sm-8 col-graph-box">
        <div class="box-header with-border">
              <h3 class="box-title"><strong>EARNING</strong> STATISTICS</h3>              
            </div>
        <div class="graphcontainer">
          <div class="tabs_nav_container responsive">
            <ul class="nav nav-tabs" role="tablist">
           <li class="active"><a href="#tabs_1" aria-controls="tabs_1" role="tab" data-toggle="tab">Monthly Earning</a></li>
           <li><a href="#tabs_2" aria-controls="tabs_2" role="tab" data-toggle="tab">Yearly Earning</a></li>      
            </ul>
            <div class="tab-content"> 
              
              <!--tab1 start here--> 
              <div class="tab-pane fade in active" id="tabs_1">
                <div id="monthlyproject" style="height: 270px; width: 100%;"></div>
              </div>
              <!--tab1 end here--> 
              
              <!--tab2 start here--> 
              <div class="tab-pane fade" id="tabs_2">
                <div id="monthlyproperty" style="height: 270px; width: 100%;"></div>
              </div>
              <!--tab2 end here-->               
     
            </div>
          </div>
        </div>
        
        <!--
                                <div class="paneltop"><h4><strong>Sales</strong> Statistics</h4></div>
                                <div class="graphcontainer" id="monthlysales"></div> --> 
      </aside>
       <aside class="col-sm-4 col-graph-content">
        <table class="table graphcontent">
          <thead>
            <tr>
              <th>Total Earning</th>           
            </tr>
          </thead>
          <tbody>            
            <tr>
              <td>This Week</td>
              <td><i class=""></i> 
                <?php 
                  if(!empty($week_cash['0']['sum'])){
                    echo $week_cash['0']['sum'];
                  }else{
                    echo '$210';
                  }
                ?> 
              </td>
              
            </tr>            
            <tr>
              <td>This Month</td>
              <td><i class=""></i> 
                <?php 
                  if(!empty($month_cash['0']['sum'])){
                    echo $month_cash['0']['sum'];
                  }else{
                    echo '$450';
                  }
                ?> 
              </td>
          
            </tr>

            <tr>
              <td>Latest 3 Month</td>
              <td><i class=""></i> 
                <?php 
                  if(!empty($quarter_cash['0']['sum'])){
                    echo $quarter_cash['0']['sum'];
                  }else{
                    echo '$850';
                  }
                ?> 
              </td>
           
            </tr>
            <tr>
              <td>Total Earning</td> 
              <td><i class=""></i> 
                <?php 
                  if(!empty($complete_total['0']['sum'])){
                    echo $complete_total['0']['sum'];
                  }else{
                    echo '$2620';
                  }
                ?> 
              </td>
            
            </tr>
          </tbody>
        </table>
      </aside>

      </div>
        
    </section>
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
                    <th>Status (Draft/Published)</th>                   
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i=1; 
                    foreach ($newcompanies as $value) {                                  
                  ?>
                  <tr>
                    <td><?php //echo $i; ?>1</td>
                    <td><?php //echo $value['name']; ?>KB110</td>
                    <td><?php //echo $value['contact_person']; ?>XYZ</td>
                    <td><?php //echo $value['email']; ?>C1</td>
                    <td><?php //echo $value['contact_person']; ?>S1</td>
                    <td><?php //echo $value['email']; ?>RO, EN, SB</td>
                    <td><?php //echo $value['email']; ?>Admin</td>
                    <td><?php //echo $value['email']; ?>19 July 2018, 11:00</td>
                    <td><?php //echo $value['email']; ?>Published</td>
                  </tr>
                  <?php $i++; } ?>
                   <tr>
                    <td><?php //echo $i; ?>1</td>
                    <td><?php //echo $value['name']; ?>KB110</td>
                    <td><?php //echo $value['contact_person']; ?>XYZ</td>
                    <td><?php //echo $value['email']; ?>C1</td>
                    <td><?php //echo $value['contact_person']; ?>S1</td>
                    <td><?php //echo $value['email']; ?>RO, EN, SB</td>
                    <td><?php //echo $value['email']; ?>Admin</td>
                    <td><?php //echo $value['email']; ?>19 July 2018, 11:00</td>
                    <td><?php //echo $value['email']; ?>Published</td>
                  </tr> <tr>
                    <td><?php //echo $i; ?>2</td>
                    <td><?php //echo $value['name']; ?>KB111</td>
                    <td><?php //echo $value['contact_person']; ?>TAT</td>
                    <td><?php //echo $value['email']; ?>C2</td>
                    <td><?php //echo $value['contact_person']; ?>S2</td>
                    <td><?php //echo $value['email']; ?>EN</td>
                    <td><?php //echo $value['email']; ?>Admin</td>
                    <td><?php //echo $value['email']; ?>20 July 2018, 11:00</td>
                    <td><?php //echo $value['email']; ?>Draft</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <!--<a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>-->
              <a href="#" class="btn btn-sm btn-default btn-flat pull-right">View All Reports</a>
              <!--<a href="<?php echo ADMIN_URL; ?>companies/index" class="btn btn-sm btn-default btn-flat pull-right">View All Reports</a>-->
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
                    foreach ($newcompanies as $value) {                                  
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['contact_person']; ?></td>
                    <td><?php echo $value['email']; ?></td>
                    <td><?php echo $value['contact_person']; ?></td>
                    <td><?php echo $value['email']; ?></td>
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
              <a href="#" class="btn btn-sm btn-default btn-flat pull-right">View Internal Users</a>
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
                    foreach ($newmembers as $service) {                                  
                  ?>
                  <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php if(isset($service['member']['name'])){ echo ucfirst($service['member']['name']);}else{ echo 'N/A'; } ?></td>
                  <td><?php if(isset($service['member']['company']['name'])){ echo ucfirst($service['member']['company']['name']);}else{ echo 'N/A'; } ?></td>
                  <td><?php if(isset($service['subscription']['name'])){ echo ucfirst($service['subscription']['name']);}else{ echo 'N/A'; } ?></td> 
                  <td><?php if(isset($service['created'])){ echo strftime('%d-%b-%Y',strtotime($service['created'])); }else{ echo 'N/A'; } ?></td>
                  <td><?php if(isset($service['expiry'])){ echo strftime('%d-%b-%Y',strtotime($service['expiry'])); }else{ echo 'N/A'; } ?></td> 
                  </tr>

                  <?php $i++;
                    if($i==6){
                      break;
                   } 
                  }?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <!--<a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>-->
              <a href="#" class="btn btn-sm btn-default btn-flat pull-right">View External Users</a>
              <!--<a href="<?php echo ADMIN_URL; ?>membersubscriptions/index" class="btn btn-sm btn-default btn-flat pull-right">View All Packages</a>-->
            </div>
            <!-- /.box-footer -->
          </div>

          <!-- /.box -->
        <?php /* ?> </div> <?php */ ?>
        <!-- /.col -->

        <?php /* ?> <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Inventory</span>
              <span class="info-box-number">5,200</span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
                  <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mentions</span>
              <span class="info-box-number">92,050</span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
                  <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Downloads</span>
              <span class="info-box-number">114,381</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Direct Messages</span>
              <span class="info-box-number">163,921</span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
                  <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Browser Usage</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="chart-responsive">
                    <canvas id="pieChart" height="150"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                    <li><i class="fa fa-circle-o text-green"></i> IE</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                    <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                    <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                    <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">United States of America
                  <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                </li>
                <li><a href="#">China
                  <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
              </ul>
            </div>
            <!-- /.footer -->
          </div>
          <!-- /.box -->
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Products</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo SITE_URL; ?>/dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Samsung TV
                      <span class="label label-warning pull-right">$1800</span></a>
                    <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo SITE_URL; ?>/dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Bicycle
                      <span class="label label-info pull-right">$700</span></a>
                    <span class="product-description">
                          26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo SITE_URL; ?>/dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Xbox One <span
                        class="label label-danger pull-right">$350</span></a>
                    <span class="product-description">
                          Xbox One Console Bundle with Halo Master Chief Collection.
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo SITE_URL; ?>/dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">PlayStation 4
                      <span class="label label-success pull-right">$399</span></a>
                    <span class="product-description">
                          PlayStation 4 500GB Console (PS4)
                        </span>
                  </div>
                </li>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">View All Products</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->    
        </div> 
        <!-- /.col -->
      </div><?php */ ?>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<!-- ChartJS 1.0.1 -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo SITE_URL; ?>/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->

