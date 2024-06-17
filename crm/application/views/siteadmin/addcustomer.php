<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-4 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Customer Master [Add]</h4></div>

                    <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color:green;">
                        <?php if($this->session->flashdata('msg')!="") {?>  
                            <?php echo $this->session->flashdata('msg');?>
                          <?php } ?> </h6>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Customer Master [Add]</li>
                    </ol>
                </div>
            </div>
        </div>
        
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 col-lg-10 mt-1">
                <button title="Back" class="btn btn-danger mb-1"><i class="fas fa-arrow-left"></i><a href="<?php echo base_url()."superadmindashbord/customer_master"; ?>" style="color: #fff;"> Back</a></button>

                <div class="card">
                    <div class="card-header">                               
                        <h4 class="card-title" style="color: #fff;">Customer Master [Form Entry]</h4>                                
                    </div>
                    
                    <div class="card-content">
                        <div class="card-body py-3">
                            <form class="form-row" action="<?php echo base_url()."superadmindashbord/customerSubmit"; ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group col-sm-4 mb-2">
                                  <div class="form-group">
                                    <label>Customer Name:</label>
                                     <textarea rows="2" name="customerName" class="form-control font-w-600 text-primary" required=""></textarea>
                                  </div>
                                </div>
                                <div class="form-group col-sm-8 mb-2"> 
                                    <label>Address:</label>
                                      <textarea rows="2" name="customerAddress" class="form-control"></textarea>
                                </div>
                                <div class="form-group col-sm-4 mb-2">
                                  <div class="form-group">
                                    <label>State:</label>
                                     <select class="select2 form-control" name="customerState" required=""  id="state">
                                        <option value="" disabled="">---select---</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bengal">West Bengal</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group col-sm-4 mb-2">
                                  <div class="form-group">
                                    <label>State Code:</label>
                                     <select class="select2 form-control" name="customerStateCode" id="stateCode" required="" >
                                        <option value="" disabled="">---select---</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group col-sm-4 mb-2" id="city_other_main">
                                  <div class="form-group">
                                    <label>City:</label>
                                     <select class="select2 form-control" name="customerCity"  required="" id="stateCity" onchange="cityother(this.value);">
                                        <option value="" disabled="">---select---</option>
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
                                     <input type="text" placeholder="" class="form-control" name="customerPINCode" >
                                  </div>
                                </div>
                                <div class="form-group col-sm-4 mb-2">
                                  <div class="form-group">
                                    <label>Mobile No. (Primary):</label>
                                     <input type="text" placeholder="" onkeyup="phone_validate(this.value);" class="form-control" name="customerMobileNo">
                                      <span title="Must be 10 Digit" class="phone_validate input-group-prepend" style="display: none; color: red; font-size: 8px; margin-left: 2px;">Must be 10 Digit </span>
                                  </div>
                                </div>
                                <div class="form-group col-sm-4 mb-2">
                                  <div class="form-group">
                                    <label>Mobile No. (Alternate):</label>
                                     <input type="text" placeholder="" onkeyup="phone_validate1(this.value);" class="form-control" name="customerMobileNo1">
                                      <span title="Must be 10 Digit" class="phone_validate1 input-group-prepend" style="display: none; color: red; font-size: 8px; margin-left: 2px;">Must be 10 Digit </span>
                                  </div>
                                </div>
                                <div class="form-group col-sm-4 mb-2">
                                  <div class="form-group">
                                    <label>Email ID:</label>
                                     <input type="email" placeholder="" class="form-control" name="customerEmailID">
                                  </div>
                                </div>
                                <div class="form-group col-sm-4 mb-2">
                                  <div class="form-group">
                                    <label>Customer GST No.:</label>
                                     <input type="text" placeholder="" class="form-control" name="customerGSTNo">
                                  </div>
                                </div>
                                <div class="form-group col-sm-4 mb-2">
                                  <div class="form-group">
                                    <label>Customer Adhaar No.:</label>
                                     <input type="text" placeholder="" class="form-control" name="customerAdhaarNo">
                                  </div>
                                </div>
                                <div class="form-group col-sm-4 mb-2">
                                  <div class="form-group">
                                    <label>Customer PAN No.:</label>
                                     <input type="text" placeholder="" class="form-control" name="customerPANNo">
                                  </div>
                                </div>
                                <div class="form-group col-sm-4 mb-2">
                                  <div class="form-group">
                                    <label>Opening Balance:</label>
                                     <input type="text" placeholder="" class="form-control" name="customerOpeningBalance">
                                  </div>
                                </div>
                                <div class="form-group col-sm-4 mb-2">
                                  <div class="form-group">
                                    <label>Closing Balance:</label>
                                     <input type="text" placeholder="" class="form-control" name="customerClosingBalance">
                                  </div>
                                </div>
                                <div class="form-group col-sm-4 mb-2">
                                  <div class="form-group">
                                    <label>Bank Account No:</label>
                                     <input type="text" class="form-control" name="bankAccountNo">
                                  </div>
                                </div>
                                <div class="form-group col-sm-4 mb-2">
                                  <div class="form-group">
                                    <label>Bank Account IFSC Code:</label>
                                     <input type="text" class="form-control" name="bankifscCode">
                                  </div>
                                </div>
                                <div class="form-group col-sm-4 mb-2">
                                  <div class="form-group">
                                    <label>Party Type:</label>
                                     <select class="select2 form-control" name="partyType"  required="">
                                        <option value="" disabled="">---select---</option>
                                        <option value="NA">N.A.</option>
                                        <option value="GST Dealer">GST Dealer</option>
                                        <option value="Un-Registered Person">Un-Registered Person</option>
                                        <option value="Composition Dealer">Composition Dealer</option>
                                        <option value="UIN Holder">UIN Holder</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                    <label for="dt"></label> 
                                </div>
                                <div class="form-group col-sm-4 mb-2"> 
                                    <label for="dt">Status:</label> 
                                    <select class="select2 form-control" name="statusCustomer" required="" style="background: aliceblue;">
                                        <option value="" disabled="">---select---</option>
                                        <option value="Active" selected="">Active</option>
                                        <option value="Deactive">Deactive</option> 
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 mb-2"> 
                                    <label for="dt"> Created Date:</label> 
                                    <input style="background: aliceblue;" readonly="" type="date" required="" class="form-control" name="createdDateCustomer" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                                <div class="form-group col-sm-12 mt-3" style="text-align: center; margin: 0px;"> 
                                    <button onclick="return confirm('Are you sure you want to add Customer info?')" title="Save" type="submit" name="submit" class="btn btn-info"><i class="fas fa-save"></i> Save</button>  
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
  function phone_validate(vlu){   
  var letters = /^[A-Za-z]+$/;
    if(vlu.match(letters) || vlu.length!=10) {  
        $('.phone_validate').show();
        return false;
      }else{$('.phone_validate').hide();}
}
</script>
<script type="text/javascript">
  function phone_validate1(vlu){   
  var letters = /^[A-Za-z]+$/;
    if(vlu.match(letters) || vlu.length!=10) {  
        $('.phone_validate1').show();
        return false;
      }else{$('.phone_validate1').hide();}
}


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



