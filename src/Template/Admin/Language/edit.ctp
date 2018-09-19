<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
      Create Company Manager
          </h1>
<ol class="breadcrumb">
<li><a href="<?php echo SITE_URL; ?>admin/companies"><i class="fa fa-home"></i>Home</a></li>
<li><a href="<?php echo SITE_URL; ?>admin/companies/index">Manage Company</a></li>
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
          <h3 class="box-title"><i class="fa fa-plus-square" aria-hidden="true"></i> <?php if(isset($companies['id'])){ echo 'Edit Company'; }else{ echo 'Create Company';} ?></h3>
         <?php //pr($companies);die; ?>
        </div>
            <!-- /.box-header -->
            <!-- form start -->
    <?php echo $this->Form->create($companies, array(
                       'class'=>'form-horizontal',
                       'enctype' => 'multipart/form-data',
                       'validate'
                      )); ?>
 <div class="box-body">
   
    <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
      <?php echo $this->Form->input('name',array('class'=>'form-control','placeholder'=>'Enter Company Name', 'id'=>'first_name','required'=>'true','label' =>false)); ?>
              </div>
            </div>
           
    <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Contact Person</label>

              <div class="col-sm-10">
      <?php echo $this->Form->input('contact_person',array('class'=>'form-control','placeholder'=>'Enter Contact Person Name', 'id'=>'contact_name','required'=>'true','label' =>false)); ?>
               
              </div>
            </div>        

    <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

              <div class="col-sm-10">
      <?php echo $this->Form->input('email',array('class'=>'form-control','placeholder'=>'Enter Email ID', 'id'=>'mcheckmail','required'=>true,'label' =>false)); ?>
              <span id="ntc" style="color:red;display:none">Please Enter Valid Email Id!!!!</span>  
              </div>
            </div>      
      <input type="hidden" name="id" value="<?php echo $companies['id']; ?>"

      <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Mobile</label>

              <div class="col-sm-10">
      <?php echo $this->Form->input('mobile',array('class'=>'form-control','onkeypress'=>'return isNumber(event);','required'=>true,'placeholder'=>'Mobile','required'=>'true','label' =>false)); ?>  
                <span id="showmsg" style="color:red;display:none">Please Enter Only Numeric Characters!!!!</span>
               
              </div>
            </div>      
        
       <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Address</label>

              <div class="col-sm-10">
      <?php echo $this->Form->input('address',array('class'=>'form-control','placeholder'=>'Enter Address', 'id'=>'address_name','required'=>'true','label' =>false,'type'=>'textarea')); ?>
               
              </div>
            </div>     
      
  
  </div>
  <!-- /.box-body -->
          <div class="box-footer">
      <?php
        if(isset($companies['id'])){
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
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 46 || charCode > 57 || charCode == 47)) {
       document.getElementById("showmsg").style.display = "block";
        return false;
    }
    return true;

}


 function isValidEmailAddress(emailAddress) {
   var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
   return pattern.test(emailAddress);
};

$(document).ready(function() {
$( "#mcheckmail" ).change(function() {
var txt = $('#mcheckmail').val();
var testCases = [txt];
   var test = testCases;
   if(isValidEmailAddress(test)!=true){
   $('#ntc').css('display','block');
   $('#mcheckmail').val('');
   }
   else{
$('#ntc').css('display','none');
}
});
});  
</script>
