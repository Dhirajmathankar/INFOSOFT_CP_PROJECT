<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo "Codiegniter" ?> | Administrator Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo BASE_URL(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo BASE_URL(); ?>assets/dist/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?php echo BASE_URL(); ?>assets/dist/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo BASE_URL(); ?>assets/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->       
    <link href="<?php echo BASE_URL(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    
    <link href="<?php echo BASE_URL(); ?>assets/dist/css/jquery-ui-1.8.22.custom.css" rel="stylesheet" type="text/css" />
    
    <link href="<?php echo BASE_URL(); ?>assets/dist/css/custom.css" rel="stylesheet" type="text/css" />
    
    <link href="<?php echo BASE_URL(); ?>assets/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />  
     <!-- jQuery 2.1.4 -->
    <script src="<?php echo BASE_URL(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo BASE_URL(); ?>assets/plugins/jQuery/jquery-ui-min.js" type="text/javascript"></script>
    
    <script src="<?php echo BASE_URL(); ?>assets/js/validation.js" type="text/javascript"></script>
    
    <script src="<?php echo BASE_URL(); ?>assets/js/custom.js?v=5.0" type="text/javascript"></script>
    
     <!-------------------------------------------------------->
     <style> 

.content {
    min-height: 170px;
}
     </style>
     <script type="text/javascript">
            
(function ($) {
$(document).on('focus',".datepicker", function(){
    $(this).datepicker({
        changeMonth: true,
        changeYear: true,       
        yearRange: '1950:<?php echo date('Y',time())+10; ?>',
        dateFormat: "dd-mm-yy"
});
});



$(document).on('focus',".eventdatepicker", function(){ 
$(this).datetimepicker({ 
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });               
});

$(document).on('focus',".timepicker1", function(){ 
	$(this).timepicki({increase_direction:'up'}); 
    });

 

$(document).ready(function(){
     $("#submit_now").click(function(){ 
      
      var xx = validation("#page-form"); 
      
      if(!xx){
          return false;
      }
  });
});

})(jQuery);
         
</script>
<style type="text/css">
    .required_star {
        color: #e30000;
    }
</style>
  </head>
  <body class="sidebar-mini skin-blue">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo BASE_URL(); ?>admindashbord" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">SM</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><?php echo "Codiegniter" ?></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <h4 style="margin: 15px 0px 5px 20px; color: #ffffff; float: left;"><?php echo 'Admin'; ?></h4>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo BASE_URL(); ?>assets/dist/img/admin.jpg" class="user-image" alt="Administrator" />
                  <span class="hidden-xs">Administrator</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo BASE_URL(); ?>assets/dist/img/admin.jpg" class="img-circle" alt="User Image" />
                    <p>
                      Administrator
                      <small>Configuration/Management</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo BASE_URL(); ?>admindashbord/change_password" class="btn btn-default btn-flat">Change Password</a>                       
                    </div>
                   
                    <div class="pull-right">
                      <a href="<?php echo BASE_URL(); ?>adminlogout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              
              <li>&nbsp;&nbsp;

              </li>
            </ul>
          </div>
        </nav>
      </header>
        
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        
        
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo BASE_URL(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php if(isset($_SESSION["user_name"])){ echo $_SESSION["user_name"]; }else{ echo 'Alexander Pierce'; } ?> </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
       
          <ul class="sidebar-menu">
<!--            <li class="header">MAIN NAVIGATION</li>-->
            <li>
              <a href="<?php echo BASE_URL(); ?>admindashbord">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>              
            </li>
                  	<li class="treeview">
			<a href="#">
			<i class="fa fa-th"></i>
			<span>Master</span> 
			<i class="fa fa-angle-left pull-right"></i> 
			</a>
				<ul class="treeview-menu" style="display: none;">
                                <li><a href="<?php echo BASE_URL(); ?>admindashbord/businesslist"><i class="fa fa-circle-o"></i> Manage Business Type</a></li> 
                                <li><a href="<?php echo BASE_URL(); ?>admindashbord/serviceslist"><i class="fa fa-circle-o"></i> Manage Services</a></li> 
                                <li><a href="<?php echo BASE_URL(); ?>admindashbord/vendor_registration"><i class="fa fa-circle-o"></i> Vendor Registration</a></li>
                                <li><a href="<?php echo BASE_URL(); ?>admindashbord/vendorlist"><i class="fa fa-circle-o"></i> Manage Vendor List </a></li> 
                                
				</ul>
			</li>
<!--            <li><a href="<?php echo BASE_URL(); ?>admin/manage_exam_timetable"><i class="fa fa-book"></i> Manage Exam Time Table</a></li> 
           <li><a href="<?php echo BASE_URL(); ?>admin/approve_result"><i class="fa fa-check-square"></i> Approve Result </a></li>  -->
           </ul>
       </section>
        
        <!-- /.sidebar -->
      </aside> 
      <div class="content-wrapper"> 
          
         <!--  HEADER END  --> 
          
          
          
          
          
          
          
          
          
          <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>  
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">            
        <li class="active">Dashboard</li>
    </ol>
</section>


<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      
    </section>
    
     
 
<div style="padding: 20px;"> <?php if($this->session->flashdata('msg')!="") {?>	
	<strong><?php echo $this->session->flashdata('msg');?></strong>
	<?php }?></div>


 
<div class="col-lg-8 col-xs-8">
 
        
</div>
         
         
         
         
         
         
         
         <!--  BODY END  -->
          
         
         
          </div><!-- /.content-wrapper -->
           </div><!-- /wrapper -->
 
<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Admin Panel Version</b> 1.0.0
        </div>
    <strong>Copyright &copy; 2015 <a target='_blank' href="<?php echo BASE_URL(); ?>public/home/welcome"><?php echo "Codiegniter"; ?></a>.</strong> All rights reserved.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </footer>

<!-- </div>./wrapper -->   
    
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo BASE_URL(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   
    <script src="<?php echo BASE_URL(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
    
              
<script src="<?php echo BASE_URL(); ?>assets/js/bootstrap-datetimepicker.js"></script> 
<script src="<?php echo BASE_URL(); ?>assets/js/timepicki.js"></script>

<script>
function show_section(cid){             
$.ajax({
     type: "POST",
     datatype:"text",
     url: "<?php echo BASE_URL(); ?>admin/show_section/"+cid,
     data: {},
     success: function(data) { 
        if(data !=""){ 
          $("#classs").html(data);
        }
        else {
            alert(data);
        }
     }
 }); 
}


function show_section2(cid){             
$.ajax({
     type: "POST",
     datatype:"text",
     url: "<?php echo BASE_URL(); ?>admin/show_section2/"+cid,
     data: {},
     success: function(data) { 
        if(data !=""){ 
          $("#classs2").html(data);
        }
        else {
            alert(data);
        }
     }
 }); 
}
 

$("#checkAll").change(function(){  //"select all" change 
	var status = this.checked; // "select all" checked status
	$('.checkbox').each(function(){ //iterate all listed checkbox items
		this.checked = status; //change ".checkbox" checked status
	});
});

$('.checkbox').change(function(){ //".checkbox" change 
	//uncheck "select all", if one of the listed checkbox item is unchecked
	if(this.checked == false){ //if this item is unchecked
		$("#select_all")[0].checked = false; //change "select all" checked status to false
	}
	
	//check "select all" if all checkbox items are checked
	if ($('.checkbox:checked').length == $('.checkbox').length ){ 
		$("#select_all")[0].checked = true; //change "select all" checked status to true
	}
});


</script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  </body>
</html>
          
          