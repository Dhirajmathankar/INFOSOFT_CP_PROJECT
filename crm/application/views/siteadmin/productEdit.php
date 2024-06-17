<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-4 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Product Master [Edit]</h4>
                    </div>
                    <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color:green;">
                        <?php if($this->session->flashdata('msg')!="") {?>  
                            <?php echo $this->session->flashdata('msg');?>
                          <?php } ?> </h6>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Product Master [Edit]</li>
                    </ol>
                </div>
            </div>
        </div>
        
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 col-lg-10 mt-1">
                <button title="Back" class="btn btn-danger mb-1"><i class="fas fa-arrow-left"></i><a href="<?php echo base_url()."superadmindashbord/product_master"; ?>" style="color: #fff;"> Back</a></button>
                <div class="card">
                    <div class="card-header"> 
                        <h4 class="card-title" style="color: #fff;">Product Master [Edit]</h4>    
                    </div>
                    
                    <div class="card-content">
                        <div class="card-body py-3">
                            <form class="form-row" action="<?php echo base_url()."superadmindashbord/productUpdate"; ?>" method="post" enctype="multipart/form-data">

                                <input type="hidden" class="form-control" name="pid" value="<?php echo $row->pid ;?>">
                                <div class="form-group col-sm-6 mb-2">
                                  <div class="form-group">
                                    <label>Product Name :</label>
                                     <input type="text" style="text-transform: capitalize;" placeholder="" class="form-control" value="<?php echo $row->product_name ;?>" name="product_name" required="">
                                  </div>
                                </div>

                                <div class="form-group col-sm-6 mb-2">
                                  <div class="form-group">
                                    <label>Product Company Name :</label>
                                     <input type="text" style="text-transform: capitalize;" placeholder="" class="form-control" name="product_company_name" value="<?php echo $row->product_company_name ;?>" required="">
                                  </div>
                                </div>

                                <div class="form-group col-sm-3 mb-2">
                                  <div class="form-group">
                                    <label>Price :</label>
                                     <input type="number" style="text-transform: capitalize;" placeholder="" class="form-control" value="<?php echo $row->price ;?>" name="price" required="">
                                  </div>
                                </div>
                                <div class="form-group col-sm-3 mb-2">
                                    <div class="form-group">
                                    <label>Group Name :</label>
                                    <select class="select2 form-control" name="gid">
                                        <?php echo groupDropdown($row->gid); ?>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group col-sm-2 mb-2">
                                  <div class="form-group">
                                    <label>HSN/SAC Code :</label>
                                     <input type="text" style="text-transform: capitalize;" placeholder="" class="form-control" value="<?php echo $row->hsn_code ;?>" name="hsn_code" required="">
                                  </div>
                                </div>

                                <div class="form-group col-sm-2 mb-2">
                                  <div class="form-group">
                                    <label>Unit :</label>
                                     <input type="text" style="text-transform: capitalize;" placeholder="" value="<?php echo $row->unit ;?>" class="form-control" name="unit" required="">
                                  </div>
                                </div>

                                <div class="form-group col-sm-2 mb-2">
                                  <div class="form-group">
                                    <label>GST:</label>
                                     <select class="select2 form-control" name="gst" required="">
                                        <option  value="0"<?php if ($row->gst=='0') { echo 'selected';
                                      } ?>>Tax Free</option>
                                        <option value="5"<?php if ($row->gst=='5') { echo 'selected';
                                      } ?>>5 %</option>
                                        <option value="6"<?php if ($row->gst=='6') { echo 'selected';
                                      } ?>>6 %</option>
                                        <option value="12"<?php if ($row->gst=='12') { echo 'selected';
                                      } ?>>12 %</option>
                                        <option value="18"<?php if ($row->gst=='18') { echo 'selected';
                                      } ?>>18 %</option>
                                        <option value="28"<?php if ($row->gst=='28') { echo 'selected';
                                      } ?>>28 %</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                    <label for="dt"></label> 
                                     
                                </div>

                               <div class="form-group col-sm-3 mb-2"> 
                                    <label for="dt">Status:</label> 
                                    <select class="select2 form-control" name="status" required="" style="background: aliceblue;">
                                        <option value="" disabled="">--select--</option>
                                        <option value="Active"<?php if ($row->status=='Active') { echo 'selected';
                                      } ?>>Active</option>
                                        <option value="Deactive"<?php if ($row->status=='Deactive') { echo 'selected';
                                      } ?>>Deactive</option> 
                                    </select>
                                </div>


                                <div class="form-group col-sm-3 mb-2"> 
                                    <label for="dt"> Update Date:</label> 
                                    <input style="background: #ffe9cb;" readonly="" type="date" required="" class="form-control" name="createdDate" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                                <div class="form-group col-sm-12 mt-3" style="text-align: center; margin: 0px;"> 
                                    <button title="Update" onclick="return confirm('Are you sure you want to update Vehicle Info?')" title="Update" type="submit" name="submit" class="btn btn-danger"><i class="fas fa-sync"></i> Update</button>  
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
        
     



