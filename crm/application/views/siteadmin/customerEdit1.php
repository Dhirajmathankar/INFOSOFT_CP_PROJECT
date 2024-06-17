


        <!-- START: Main Content-->
        <main>
          
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-4 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Customer Master [Edit]</h4>

                              <span style="float: right; color: #555;"> <?php if ($row->updatedDateCustomer) {
                                ?> <span title="Last Updated : <?php echo date("d-m-Y",strtotime($row->updatedDateCustomer)) ?>" style=" color: #555;"> Last Updated : <?php echo date("d-m-Y",strtotime($row->updatedDateCustomer)) ?> </span><?php
                              } else{ ?><span style=" color: #555;"> Last Updated : 00-00-0000 </span> <?php } ?> | 
                              <span title="Current Status: <?php if ($row->statusCustomer=="Active"){ echo 'Active'; } ?><?php if ($row->statusCustomer=="Deactive"){ echo 'Deactive'; } ?>"> Current Status: <?php if ($row->statusCustomer=="Active"){ echo 'Active'; } ?><?php if ($row->statusCustomer=="Deactive"){ echo 'Deactive'; } ?></span></span>  

                            </div>

                            <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color:green;">
                                <?php if($this->session->flashdata('msg')!="") {?>  
                                    <?php echo $this->session->flashdata('msg');?>
                                  <?php } ?> </h6>
                            </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                                <li class="breadcrumb-item active">Customer Master [Edit]</li>
                            </ol>
                        </div>
                    </div>
                </div>
                
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    
                    <div class="col-12 col-lg-10 mt-1">
                        <button title="Back" class="btn btn-danger mb-1"><i class="fas fa-arrow-left"></i><a href="<?php echo base_url()."superadmindashbord/manage_customer"; ?>" style="color: #fff;"> Back</a></button>

                        <!-- <button title="Edit" class="btn btn-info mb-1"><a href="registraton_form_edit.php?form=<?php echo $data['id'];?>" style="color: #fff;"><i class="fas fa-pencil"></i><i class="icon-pencil"></i> Edit</a></button> -->

                        <div class="card">
                          
                            <div class="card-header">                               
                                <h4 class="card-title" style="color: #fff;">Customer Master [Edit - Form Entry]</h4>                                
                            </div>
                            
                            <div class="card-content">
                                <div class="card-body py-3">
                                    <form class="form-row" action="<?php echo base_url()."superadmindashbord/customerUpdate"; ?>" method="post" enctype="multipart/form-data">

                                        <input type="hidden" class="form-control" name="cuid" value="<?php echo $row->cuid ;?>">

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Customer Name:</label>
                                             <!-- <input type="text" style="text-transform: uppercase;" placeholder="" class="form-control  font-w-600 text-primary" name="customerName" value="<?php echo $row->customerName ;?>" required=""> -->
                                             <textarea rows="2" name="customerName" class="form-control font-w-600 text-primary" required="" style="text-transform: uppercase;"><?php echo $row->customerName ;?></textarea>
                                          </div>
                                        </div>

                                         <div class="form-group col-sm-8 mb-2"> 
                                            <label>Address:</label>
                                              <textarea rows="2" name="customerAddress" class="form-control"><?php echo $row->customerAddress ;?></textarea>
                                               
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>State:</label>
                                             <select class="select2 form-control" name="customerState" required=""  id="state">
                                                <option value="" disabled="">---select---</option>
                                                <option value="Andhra Pradesh"<?php if ($row->customerState=='Andhra Pradesh') { echo 'selected';
                                              } ?>>Andhra Pradesh</option>
                                                <option value="Arunachal Pradesh"<?php if ($row->customerState=='Arunachal Pradesh') { echo 'selected';
                                              } ?>>Arunachal Pradesh</option>
                                                <option value="Assam"<?php if ($row->customerState=='Assam') { echo 'selected';
                                              } ?>>Assam</option>
                                                <option value="Bihar"<?php if ($row->customerState=='Bihar') { echo 'selected';
                                              } ?>>Bihar</option>
                                                <option value="Chhattisgarh"<?php if ($row->customerState=='Chhattisgarh') { echo 'selected';
                                              } ?>>Chhattisgarh</option>
                                              <option value="Delhi"<?php if ($row->customerState=='Delhi') { echo 'selected';
                                              } ?>>Delhi</option>
                                                <option value="Goa"<?php if ($row->customerState=='Goa') { echo 'selected';
                                              } ?>>Goa</option>
                                                <option value="Gujarat"<?php if ($row->customerState=='Gujarat') { echo 'selected';
                                              } ?>>Gujarat</option>
                                                <option value="Haryana"<?php if ($row->customerState=='Haryana') { echo 'selected';
                                              } ?>>Haryana</option>
                                                <option value="Himachal Pradesh"<?php if ($row->customerState=='Himachal Pradesh') { echo 'selected';
                                              } ?>>Himachal Pradesh</option>
                                                <option value="Jharkhand"<?php if ($row->customerState=='Jharkhand') { echo 'selected';
                                              } ?>>Jharkhand</option>
                                                <option value="Jammu and Kashmir"<?php if ($row->customerState=='Jammu and Kashmir') { echo 'selected';
                                              } ?>>Jammu and Kashmir</option>
                                                <option value="Karnataka"<?php if ($row->customerState=='Karnataka') { echo 'selected';
                                              } ?>>Karnataka</option>
                                                <option value="Kerala"<?php if ($row->customerState=='Kerala') { echo 'selected';
                                              } ?>>Kerala</option>
                                                <option value="Madhya Pradesh"<?php if ($row->customerState=='Madhya Pradesh') { echo 'selected';
                                              } ?>>Madhya Pradesh</option>
                                                <option value="Maharashtra"<?php if ($row->customerState=='Maharashtra') { echo 'selected';
                                              } ?>>Maharashtra</option>
                                                <option value="Manipur"<?php if ($row->customerState=='Manipur') { echo 'selected';
                                              } ?>>Manipur</option>
                                                <option value="Meghalaya"<?php if ($row->customerState=='Meghalaya') { echo 'selected';
                                              } ?>>Meghalaya</option>
                                                <option value="Mizoram"<?php if ($row->customerState=='Mizoram') { echo 'selected';
                                              } ?>>Mizoram</option>
                                                <option value="Nagaland"<?php if ($row->customerState=='Nagaland') { echo 'selected';
                                              } ?>>Nagaland</option>
                                                <option value="Odisha"<?php if ($row->customerState=='Odisha') { echo 'selected';
                                              } ?>>Odisha</option>
                                                <option value="Punjab"<?php if ($row->customerState=='Punjab') { echo 'selected';
                                              } ?>>Punjab</option>
                                                <option value="Rajasthan"<?php if ($row->customerState=='Rajasthan') { echo 'selected';
                                              } ?>>Rajasthan</option>
                                                <option value="Sikkim"<?php if ($row->customerState=='Sikkim') { echo 'selected';
                                              } ?>>Sikkim</option>
                                                <option value="Tamil Nadu"<?php if ($row->customerState=='Tamil Nadu') { echo 'selected';
                                              } ?>>Tamil Nadu</option>
                                                <option value="Telangana"<?php if ($row->customerState=='Telangana') { echo 'selected';
                                              } ?>>Telangana</option>
                                                <option value="Tripura"<?php if ($row->customerState=='Tripura') { echo 'selected';
                                              } ?>>Tripura</option>
                                                <option value="Uttar Pradesh"<?php if ($row->customerState=='Uttar Pradesh') { echo 'selected';
                                              } ?>>Uttar Pradesh</option>
                                                <option value="Uttarakhand"<?php if ($row->customerState=='Uttarakhand') { echo 'selected';
                                              } ?>>Uttarakhand</option>
                                                <option value="West Bengal"<?php if ($row->customerState=='West Bengal') { echo 'selected';
                                              } ?>>West Bengal</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>State Code:</label>
                                             <select class="select2 form-control" name="customerStateCode" id="stateCode" required="" >
                                                <!-- <option value="" disabled="">---select---</option> -->
                                                <option selected="" value="<?php echo $row->customerStateCode ;?>"><?php echo $row->customerStateCode ;?></option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>City:</label>
                                             <select class="select2 form-control" name="customerCity"  required="" id="stateCity" onchange="cityother(this.value);">
                                                <!-- <option value="" disabled="">---select---</option> -->
                                                <option selected="" value="<?php echo $row->customerCity ;?>"><?php echo $row->customerCity ;?></option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2" id="city_other" style="display: none;">
                                          <div class="form-group">
                                            <label>Other City:</label>
                                             <input type="text" placeholder="Please specify" class="form-control" name="customerCityOther" >
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>PIN Code:</label>
                                             <input type="text" placeholder="" class="form-control" name="customerPINCode" value="<?php echo $row->customerPINCode ;?>">
                                          </div>
                                        </div>

                                        

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Mobile No. (Primary):</label>
                                             <input type="text" placeholder="" onkeyup="phone_validate(this.value);" class="form-control" name="customerMobileNo" value="<?php echo $row->customerMobileNo ;?>">
                                              <span title="Must be 10 Digit" class="phone_validate input-group-prepend" style="display: none; color: red; font-size: 8px; margin-left: 2px;">Must be 10 Digit </span>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Mobile No. (Alternate):</label>
                                             <input type="text" placeholder="" onkeyup="phone_validate1(this.value);" class="form-control" name="customerMobileNo1" value="<?php echo $row->customerMobileNo1 ;?>">
                                              <span title="Must be 10 Digit" class="phone_validate1 input-group-prepend" style="display: none; color: red; font-size: 8px; margin-left: 2px;">Must be 10 Digit </span>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Email ID:</label>
                                             <input type="email" placeholder="" class="form-control" name="customerEmailID" value="<?php echo $row->customerEmailID ;?>">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Customer GST No.:</label>
                                             <input type="text" placeholder="" class="form-control" name="customerGSTNo" value="<?php echo $row->customerGSTNo ;?>">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Customer PAN No.:</label>
                                             <input type="text" placeholder="" class="form-control" name="customerPANNo" value="<?php echo $row->customerPANNo ;?>">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Opening Balance:</label>
                                             <input type="text" placeholder="" class="form-control" name="customerOpeningBalance" value="<?php echo $row->customerOpeningBalance ;?>">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Closing Balance:</label>
                                             <input type="text" placeholder="" class="form-control" name="customerClosingBalance" value="<?php echo $row->customerClosingBalance ;?>">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                            <label for="dt"></label> 
                                             
                                        </div>

                                        <div class="form-group col-sm-4 mb-2"> 
                                            <label for="dt">Status:</label> 
                                            <select class="select2 form-control font-w-500 text-primary" name="statusCustomer" required="" style="background: aliceblue;">
                                             <option value="" disabled="">---select---</option>
                                              <option value="Active"<?php if ($row->statusCustomer=='Active') { echo 'selected';
                                              } ?>>Active</option>
                                              <option value="Deactive"<?php if ($row->statusCustomer=='Deactive') { echo 'selected';
                                              } ?>>Deactive</option> 
                                            </select>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2"> 
                                            <label for="dt"> Created Date:</label> 
                                            <input style="background: aliceblue;" readonly="" type="date" required="" class="form-control font-w-500 text-primary" name="createdDateCustomer" value="<?php echo date("Y-m-d"); ?>">
                                        </div>
                                        

                                        
                                        <div class="form-group col-sm-12 mt-3" style="text-align: center; margin: 0px;"> 
                                            <button onclick="return confirm('Are you sure you want to update Customer Info?')" title="Update" type="submit" name="submit" class="btn btn-info"><i class="fas fa-sync"></i> Update</button>  
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
 <script type="text/javascript">
   function cityother(value) {

    if(value=="Other"){
     //$("#city_other_main").hide();
     $("#city_other").show();
    }
    else{
       $("#city_other").hide(); 
    }
    // val= $("#cityother").val();
}
 </script>    
     



