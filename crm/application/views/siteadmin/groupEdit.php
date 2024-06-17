<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-4 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Group Master [Edit]</h4></div>

                    <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color:green;">
                        <?php if($this->session->flashdata('msg')!="") {?>  
                            <?php echo $this->session->flashdata('msg');?>
                          <?php } ?> </h6>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Group Master [Edit]</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 col-lg-8 mt-1">
                <button title="Back" class="btn btn-danger mb-1"><i class="fas fa-arrow-left"></i><a href="<?php echo base_url()."superadmindashbord/manage_group_master"; ?>" style="color: #fff;"> Back</a></button>

                <div class="card">
                    <div class="card-header">     
                        <h4 class="card-title" style="color: #fff;">Group Master [Edit]</h4>      
                    </div>
                    
                    <div class="card-content">
                        <div class="card-body py-3">
                            <form class="form-row" action="<?php echo base_url()."superadmindashbord/groupUpdate"; ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group col-sm-12 mb-2">
                                  <div class="form-group">
                                    <label>Group Name:</label>
                                    <input type="hidden" name="gid" value="<?php echo $row->gid ;?>">
                                    <input type="text" class="form-control font-w-600 text-primary" name="group_name" value="<?php echo $row->group_name ;?>">
                                  </div>
                                </div>
                                <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                    <label for="dt"></label> 
                                </div>
                                <div class="form-group col-sm-4 mb-2"> 
                                  <label for="dt">Status:</label> 
                                  <select class="select2 form-control font-w-500 text-primary" name="status" required="" style="background: aliceblue;">
                                   <option value="" disabled="">---select---</option>
                                    <option value="Active"<?php if ($row->status=='Active') { echo 'selected';
                                    } ?>>Active</option>
                                    <option value="Deactive"<?php if ($row->status=='Deactive') { echo 'selected';
                                    } ?>>Deactive</option> 
                                  </select>
                                </div>
                                <div class="form-group col-sm-2 mb-2"> 
                                  <label for="dt"> Created Date:</label> 
                                  <input style="background: aliceblue;" readonly="" type="text" class="form-control" name="created_date" value="<?php echo $row->created_date ;?>">
                                </div>
                                <div class="form-group col-sm-12 mt-3" style="text-align: center; margin: 0px;"> 
                                    <button onclick="return confirm('Are you sure you want to Update Group info?')" title="Update" type="submit" name="submit" class="btn btn-info"><i class="fas fa-save"></i> Update</button>  
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


