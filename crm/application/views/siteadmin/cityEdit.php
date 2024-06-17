


        <!-- START: Main Content-->
        <main>
          
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">City Master [Edit]</h4> 
                              <span style="float: right; color: #555;"> <?php if ($row->updated_date) {
                                ?> <span title="Last Updated : <?php echo date("d-m-Y",strtotime($row->updated_date)) ?>" style=" color: #555;"> Last Updated : <?php echo date("d-m-Y",strtotime($row->updated_date)) ?> <?php echo date("h:i:s A",strtotime($row->updated_date)) ?> </span><?php
                              } else{ ?><span style=" color: #555;"> Last Updated : 00-00-0000 </span> <?php } ?>
                            </div>

                            <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color:green;">
                                <?php if($this->session->flashdata('msg')!="") {?>  
                                    <?php echo $this->session->flashdata('msg');?>
                                  <?php } ?> </h6>
                            </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                                <li class="breadcrumb-item active">City Master [Edit]</li>
                            </ol>
                        </div>
                    </div>
                </div>
                
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    
                    <div class="col-12 col-lg-10 mt-1">
                        <button title="Back" class="btn btn-danger mb-1"><i class="fas fa-arrow-left"></i><a href="<?php echo base_url()."superadmindashbord/manage_city"; ?>" style="color: #fff;"> Back</a></button>

                        <!-- <button title="Edit" class="btn btn-info mb-1"><a href="job_post_edit.php?post=<?php echo $data['id'];?>" style="color: #fff;"><i class="fas fa-pencil"></i><i class="icon-pencil"></i> Edit</a></button> -->

                        
                        <div class="card">
                          
                            <div class="card-header">                               
                                <h4 class="card-title" style="color: #fff;">City Master [Edit]</h4>                                
                            </div>
                            
                            <div class="card-content">
                                <div class="card-body py-3">
                                    <form class="form-row" action="<?php echo base_url()."superadmindashbord/cityUpdate"; ?>" method="post" enctype="multipart/form-data">
                                      <input type="hidden" name="cid" value="<?php echo $row->cid; ?>">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="exampleInputEmail1"> State Name:</label>
                                            <select class="select2 form-control" name="sid" required="">
                                                <option value="" selected="" disabled="">---select---</option>
                                                <?php  echo rajya_dropdown($row->sid); ?> 
                                            </select>
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-6 mb-2"> 
                                            <label for="dt"> City Name:</label> 
                                            <input type="text" value="<?php echo $row->city_name; ?>" required="" class="form-control" name="city_name">
                                        </div>

                                       
                                        <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                            <label for="dt"></label> 
                                             
                                        </div>

                                        <div class="form-group col-sm-6 mb-2"> 
                                            <label for="dt">Status:</label> 
                                             
                                            <select class="select2 form-control" name="status" required="">
                                            <option value="" disabled="">---select---</option>
                                              <option value="Active"<?php if ($row->status=='Active') { echo 'selected';
                                              } ?>>Active</option>
                                              <option value="Deactive"<?php if ($row->status=='Deactive') { echo 'selected';
                                              } ?>>Deactive</option>
                                            </select>
                                        </div>


                                        <div class="form-group col-sm-6 mb-2"> 
                                            <label for="dt"> Created Date:</label> 
                                            <input style="background: aliceblue;" readonly="" type="date" name="created_date" required="" class="form-control" value="<?php echo date("Y-m-d",strtotime( $row->created_date)); ?>">
                                        </div>

                                        
                                        <div class="form-group col-sm-12 mt-3" style="text-align: center; margin: 0px;"> 
                                            <button onclick="return confirm('Are you sure you want to update city?')" title="Update" type="submit" name="submit" class="btn btn-info"><i class="fas fa-sync"></i> Update</button>  
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
        <!-- Modal -->
        
  


   


