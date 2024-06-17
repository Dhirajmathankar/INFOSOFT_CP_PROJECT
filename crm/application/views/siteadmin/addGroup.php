<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Group Master [Add]</h4></div>

                    <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color:green;">
                        <?php if($this->session->flashdata('msg')!="") {?>
                            <?php echo $this->session->flashdata('msg');?>
                          <?php } ?> </h6>
                    </div>
                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Group Master [Add]</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 col-lg-10 mt-1">
            <button title="Back" class="btn btn-danger mb-1"><i class="fas fa-arrow-left"></i><a href="<?php echo base_url()."superadmindashbord/manage_group_master"; ?>" style="color: #fff;"> Back</a></button>
                <div class="card">
                    <div class="card-header">     
                        <h4 class="card-title" style="color: #fff;">Group Master [Add]</h4>                                
                    </div>
                    <div class="card-content">
                        <div class="card-body py-3">
                            <form class="form-row" action="<?php echo base_url()."superadmindashbord/groupSubmit"; ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group col-sm-12 mb-2"> 
                                <label for="dt"> Group Name:</label> 
                                <input type="text" required="" class="form-control" name="group_name">
                            </div>
                            <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                <label for="dt"></label> 
                            </div>

                            <div class="form-group col-sm-6 mb-2"> 
                                <label for="dt">Status:</label> 
                                <select class="select2 form-control" name="status" required="" style="background: aliceblue;">
                                    <option value="" disabled="">---select---</option>
                                    <option value="Active">Active</option>
                                    <option value="Deactive">Deactive</option> 
                                </select>
                            </div>

                            <div class="form-group col-sm-6 mb-2"> 
                                <label for="dt"> Created Date:</label> 
                                <input style="background: aliceblue;" readonly="" type="date" required="" class="form-control" name="created_date" value="<?php echo date("Y-m-d"); ?>">
                            </div>

                            <div class="form-group col-sm-12 mt-3" style="text-align: center; margin: 0px;"> 
                                <button onclick="return confirm('Are you sure you want to add Group?')" title="Save" type="submit" name="submit" class="btn btn-info"><i class="fas fa-save"></i> Save</button>  
                            </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Card DATA-->
    </div>
</main>
<!-- END: Content-->
        
     



