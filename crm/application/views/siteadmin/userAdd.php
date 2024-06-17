


        <!-- START: Main Content-->
        <main>
          
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">User Master [Add]</h4></div>

                            <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color:green;">
                                <?php if($this->session->flashdata('msg')!="") {?>  
                                    <?php echo $this->session->flashdata('msg');?>
                                  <?php } ?> </h6>
                            </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                                <li class="breadcrumb-item active">User Master [Add]</li>
                            </ol>
                        </div>
                    </div>
                </div>
                
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    
                    <div class="col-12 col-lg-10 mt-1">
                        <button title="Back" class="btn btn-danger mb-1"><i class="fas fa-arrow-left"></i><a href="<?php echo base_url()."superadmindashbord/manage_user"; ?>" style="color: #fff;"> Back</a></button>

                        <!-- <button title="Edit" class="btn btn-info mb-1"><a href="registraton_form_edit.php?form=<?php echo $data['id'];?>" style="color: #fff;"><i class="fas fa-pencil"></i><i class="icon-pencil"></i> Edit</a></button> -->

                        <div class="card">
                          
                            <div class="card-header">                               
                                <h4 class="card-title" style="color: #fff;">User Master [Add]</h4>                                
                            </div>
                            
                            <div class="card-content">
                                <div class="card-body py-3">
                                    <form class="form-row" action="<?php echo base_url()."superadmindashbord/userSubmit"; ?>" method="post" enctype="multipart/form-data">

                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="exampleInputEmail1"> Full Name:</label>
                                            <input type="text" name="fullname" placeholder="" required="" class="form-control" required="">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2"> 
                                            <label for="dt">Gender:</label> 
                                            <select class="form-control" name="gender">
                                                <option value=""> ---select---</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>

                                        
                                        <div class="form-group col-sm-4 mb-2"> 
                                            <label>Date Of Birth:</label>
                                              <input type="date" name="dob" placeholder="dd-mm-yyyy" class="form-control"  data-position='bottom right'>
                                              <i style="float: right;margin-top: -23px;margin-right: 20px;" class="far fa-calendar-alt"></i>
                                               
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Father Name:</label>
                                             <input type="text" placeholder="" class="form-control" name="father_name">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>E-Mail:</label>
                                             <input type="email" name="emailid" id="emailid" placeholder="" class="form-control">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Mobile Number:</label>
                                             <input type="number" placeholder="10 digit mobile no." class="form-control" name="mobile">
                                          </div>
                                        </div>

                                        

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Aadhar No.:</label>
                                             <input type="number" placeholder="" class="form-control" name="adhar_no">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Local Address:</label>
                                            <textarea class="textarea form-control" name="local_address" id="form-message" rows="2"></textarea>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Permanent Address:</label>
                                            <textarea class="textarea form-control" name="permanent_address" id="permanent_address" rows="2"></textarea>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                            <label for="dt"></label> 
                                             
                                        </div>

                                        <div class="form-group col-sm-6 mb-2">
                                          <div class="form-group">
                                            <label>Login ID:</label>
                                             <input type="text" class="form-control" name="login_id" required="">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-6 mb-2">
                                          <div class="form-group">
                                            <label>Designation:</label>
                                             <select class="form-control" name="emp_type" id="emp_type" required="">
                                                  <option value=""> ---select---</option> 
                                                  <option value="City Officer">City Officer</option>
                                                  <option value="Community Officer">Community Officer</option>
                                              </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-6 mb-2">
                                          <div class="form-group">
                                            <label>Password:</label>
                                             <input type="password" class="form-control" name="user_password" id="user_password" required="">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-6 mb-2">
                                          <div class="form-group">
                                            <label>Roll: </label> 
                                              <select class="form-control" name="user_type" id="user_type" required="">
                                                  <option value=""> ---select---</option> 
                                                  <option value="Cityadmin">Cityadmin</option>
                                                  <option value="Communityadmin">Communityadmin</option>
                                              </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-6 mb-2">
                                          <div class="form-group">
                                            <label>Assign City: [Cluster Head City]</label>
                                             <select class="select2 form-control" name="cityofCluster" required="">
                                                <option value="" selected="" disabled="">---select---</option> 
                                                <?php  echo city_dropdown(); ?> 
                                            </select>
                                          </div>
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
                                            <button onclick="return confirm('Are you sure you want to add User?')" title="Save" type="submit" name="submit" class="btn btn-info"><i class="fas fa-save"></i> Save</button>  
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
        
     



