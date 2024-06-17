<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $fullname= employee_complete_det($this->session->userdata('aid'))->fullname; ?>

<!--counter-->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>





        <!-- START: Main Content-->
        <main>
            <div class="container-fluid site-width" style="margin-bottom: 350px;">
                <!-- START: Breadcrumbs-->
                <div class="row">
                    <div class="col-12  align-self-center">
                        
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0"><?php if(is_numeric($this->session->userdata('designation'))){ echo designation_det($this->session->userdata('designation'))->designation; }else{ echo $this->session->userdata('designation'); } ?> Dashboard</h4> <p style="color: #555;"><?php echo strtoupper($fullname);?>. Welcome to <?php if(is_numeric($this->session->userdata('designation'))){ echo designation_det($this->session->userdata('designation'))->designation; }else{ echo $this->session->userdata('designation'); } ?> Dashboard!</p></div>

                            <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color:green;">
                                <?php if($this->session->flashdata('msg')!="") {?>  
                                    <?php echo $this->session->flashdata('msg');?>
                                  <?php } ?> </h6>
                            </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                                <li class="breadcrumb-item active"> <?php if(is_numeric($this->session->userdata('designation'))){ echo designation_det($this->session->userdata('designation'))->designation; }else{ echo $this->session->userdata('designation'); } ?> Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                

                                 
            </div>
        </main>
        <!-- END: Content-->






