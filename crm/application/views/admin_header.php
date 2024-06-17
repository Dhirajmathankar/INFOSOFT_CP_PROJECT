

<!DOCTYPE html>
<html lang="en">
    <!-- START: Head-->
    

<head>
        <meta charset="UTF-8">
        <title>Admin | Shree Sai Industries</title>
        
        <meta name="viewport" content="width=device-width,initial-scale=1"> 

        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/css/datepicker.min.css">
        <link rel="shortcut icon" href="<?php echo base_url()."dist/"; ?>images/favicon.png" type="image/png" />
        <!-- START: Template CSS-->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Varela&display=swap" rel="stylesheet"> -->
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/jquery-ui/jquery-ui.min.css">
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/jquery-ui/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/simple-line-icons/css/simple-line-icons.css">        
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/flags-icon/css/flag-icon.min.css">         
        <!-- END Template CSS-->

        <!-- START: Page CSS-->
        <link rel="stylesheet"  href="<?php echo base_url()."dist/"; ?>/vendors/chartjs/Chart.min.css">
        <!-- END: Page CSS-->

        <!-- START: Page CSS-->   
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/morris/morris.css"> 
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/weather-icons/css/pe-icon-set-weather.min.css"> 
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/chartjs/Chart.min.css"> 
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/starrr/starrr.css"> 
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/ionicons/css/ionicons.min.css"> 
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.css">
        <!-- END: Page CSS-->

        <!-- START: Page CSS-->
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/datatable/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/datatable/buttons/css/buttons.bootstrap4.min.css"/>
        <!-- END: Page CSS-->
        <!-- START: ckeditor JS-->
        <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
        <!-- START: Custom CSS-->
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/css/main.css">

        <!-- END: Custom CSS-->

        <!-- START: Page CSS-->
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/select2/css/select2.min.css"/>
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/select2/css/select2-bootstrap.min.css"/>
        <!-- END: Page CSS-->
        
    </head>
    <!-- END Head-->

    <!-- START: Body-->
    <body id="main-container" class="default">

        <!-- START: Pre Loader-->
        <!-- <div class="se-pre-con">
            <div class="loader"></div> -->
        </div>
        <!-- END: Pre Loader-->
<?php $fullname= employee_complete_det($this->session->userdata('aid'))->fullname; ?>
        <!-- START: Header-->
        <div id="header-fix" class="header fixed-top">
            <div class="site-width">
                <nav class="navbar navbar-expand-lg  p-0" style="background: linear-gradient(90deg, rgba(255,95,109,1) 0%, rgba(255,195,113,1) 68%);">
                    <div class="navbar-header  h-100 h4 mb-0 align-self-center logo-bar text-left" style="background: linear-gradient(90deg, rgba(255,95,109,1) 0%, rgba(255,195,113,1) 68%);"> 
                    <a href="#!" class="horizontal-logo ">
                            <img title="Ashish Container Service" style="border-radius: 4px;    margin-top: 0px;" src="<?php echo base_url()."dist/"; ?>images/#" alt="" width="90%">             
                        </a> 
                        <h1 style="text-align: center;
    position: absolute;
    top: 43%;
    right: 43%;
    transform: translate(48%,-50%);
    text-transform: uppercase;
    font-family: verdana;
    font-size: 1.1em;
    font-weight: 700;
    color: #fff;">Shree Sai Industries</h1>                   
                    </div>
                    <div class="navbar-header h4 mb-0 text-center h-100 collapse-menu-bar">
                        <a href="#" class="sidebarCollapse" id="collapse"><i class="icon-menu"></i></a>
                    </div>

                    
                    <div class="navbar-right ml-auto h-100">
                        <ul class="ml-auto p-0 m-0 list-unstyled d-flex top-icon h-100">
                            <li class="dropdown user-profile align-self-center d-inline-block">
                                <a href="#" class="nav-link py-0" data-toggle="dropdown" aria-expanded="false"> 
                                    <div class="media" title="Ashish Container Service">
                                        <img src="<?php echo base_url()."dist/"; ?>/images/author.png" alt="" class="d-flex img-fluid" width="50" title="Click here to sign out">
                                    </div>
                                </a>

                                <div class="dropdown-menu border dropdown-menu-right p-0">
                                    <div class="dropdown-divider"></div>
                                    <a href="#!" class="dropdown-item px-2 align-self-center d-flex">
                                        <span class="icon-user mr-2 h6 mb-0"></span><?php echo $fullname; ?></a>
                                        <div class="dropdown-divider"></div>
                                    <a href="#!" class="dropdown-item px-2 align-self-center d-flex">
                                        <span class="icon-settings mr-2 h6 mb-0"></span> <?php if(is_numeric($this->session->userdata('designation'))){ echo designation_det($this->session->userdata('designation'))->designation; }else{ echo $this->session->userdata('designation'); } ?></a>
                                        <div class="dropdown-divider"></div>
                                    <a title="Click here to Sign Out" href="<?php echo base_url()."adminlogout"; ?> " onclick="return confirm('Are you sure you want to sign-out?')" class="dropdown-item px-2 text-danger align-self-center d-flex">
                                        <span class="icon-logout mr-2 h6  mb-0"></span> Sign Out</a>
                                </div>

                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- END: Header-->

        <!-- START: Main Menu-->
        <div class="sidebar">
            <div class="site-width">
                <!-- START: Menu-->
                <ul id="side-menu" class="sidebar-menu">

                    <li class="dropdown"><a href="#!"><i class="icon-home mr-1"></i> <span style="font-size: 12px!important;"> <?php if(is_numeric($this->session->userdata('designation'))){ echo designation_det($this->session->userdata('designation'))->designation; }else{ echo $this->session->userdata('designation'); } ?> Dashboard </span></a>                  
                        <ul>
                            <li title="Vehicle Master">
                                <a href="<?php echo base_url()."superadmindashbord/manage_group_master"; ?>"><i class="fab fa-product-hunt"></i> Group Master</a>
                            </li>
                            <li title="Vehicle Master">
                                <a href="<?php echo base_url()."superadmindashbord/product_master"; ?>"><i class="fab fa-product-hunt"></i> Product Master</a>
                            </li> 
                            <li title="Vehicle Master">
                                <a href="<?php echo base_url()."superadmindashbord/customer_master"; ?>"><i class="fab fa-product-hunt"></i> Customer Master</a>
                            </li> 

                            <li title="Billing">
                                <a href="<?php echo base_url()."superadmindashbord/manage_bill"; ?>"><i class="fas fa-money-check-alt"></i>  Billing</a>
                            </li>

                            <li>
                                <a title="Click here to Sign Out" href="<?php echo base_url()."adminlogout"; ?> " onclick="return confirm('Are you sure you want to sign-out?')" class="text-primary"><span class="icon-logout mr-2 h6  mb-0"></span> Sign Out</a>
                            </li> 
                        </ul>
                    </li>
                </ul>
                <!-- END: Menu-->
            </div>
        </div>
        <!-- END: Main Menu-->