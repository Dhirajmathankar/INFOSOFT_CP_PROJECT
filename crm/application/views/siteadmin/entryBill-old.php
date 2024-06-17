


        <!-- START: Main Content-->
        <main>
          
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-4 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Bill [Entry]</h4></div>

                            <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color:green;">
                                <?php if($this->session->flashdata('msg')!="") {?>  
                                    <?php echo $this->session->flashdata('msg');?>
                                  <?php } ?> </h6>
                            </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                                <li class="breadcrumb-item active">Bill [Entry]</li>
                            </ol>
                        </div>
                    </div>
                </div>
                
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    
                    <div class="col-12 col-lg-10 mt-1">
                        <button title="Back" class="btn btn-danger mb-1"><i class="fas fa-arrow-left"></i><a href="<?php echo base_url()."superadmindashbord/manage_bill"; ?>" style="color: #fff;"> Back</a></button>

                        <!-- <button title="Edit" class="btn btn-info mb-1"><a href="registraton_form_edit.php?form=<?php echo $data['id'];?>" style="color: #fff;"><i class="fas fa-pencil"></i><i class="icon-pencil"></i> Edit</a></button> -->

                        <div class="card">
                          
                            <div class="card-header">                               
                                <h4 class="card-title" style="color: #fff;">Bill [Entry Form]</h4>                                
                            </div>
                            
                            <div class="card-content">
                                <div class="card-body py-3">
                                    <form class="form-row" action="<?php echo base_url()."superadmindashbord/billSubmit"; ?>" method="post" enctype="multipart/form-data">

                                        <div class="form-group col-sm-4 mb-2"> 
                                            <label for="dt"> Bill Date:</label> 
                                            <input type="date" required="" value="<?php echo date("Y-m-d") ?>" class="form-control text-danger font-w-600" name="billDate" style="background: aliceblue;">
                                        </div>

                                        <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                            <label for="dt"></label> 
                                             
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Customer Name:</label>
                                             <select class="select2 form-control" name="cuid" required="" id="cuid" onchange="showOrderBookingPendingStatus(this.value);">
                                                <option value="" selected="" disabled="">---select---</option> 
                                                <?php  echo customerDropdown(); ?> 
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Order Booking No. (Pending):</label>
                                              <select class="select2 form-control" name="obid"  id="obid" onchange="showOrderBookingPendingDetail(this.value);" required="">
                                                
                                            </select>
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Order Booking Date:</label>
                                             <input type="text" placeholder="" class="form-control" name="bookingDate" id="bookingDate" value="" style="background: aliceblue;" readonly="">
                                            
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Trailor No.:</label>
                                             <input type="text" placeholder="" class="form-control" name="trailorNo" id="trailorNo" style="background: aliceblue;" readonly="">

                                             <input type="hidden" class="form-control" name="blid" id="blid" value="<?php echo $row->blid ;?>">
                                          </div>
                                        </div>




                                        <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                            <label for="dt"></label> 
                                             
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>LR/GR No.:</label>
                                             <input type="text" placeholder="" class="form-control" name="lrGrNo">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>LR/GR Date:</label>
                                             <input type="date" placeholder="" class="form-control" name="lrGrDate" value="<?php echo date("Y-m-d") ;?>">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Port Of Discharge:</label>
                                             <input type="text" placeholder="" class="form-control" name="portOfDischarge">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Loading Point:</label>
                                             <textarea rows="2" name="loadingPoint" class="form-control"></textarea>
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Off Loading Point:</label>
                                             <textarea rows="2" name="offLoadingPoint" class="form-control"></textarea>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Shipping Line:</label>
                                            <textarea rows="2" name="shippingLine" class="form-control"></textarea>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Gross Weight:</label>
                                             <input type="text" placeholder="" class="form-control" name="grossWeight">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Job Reference:</label>
                                             <input type="text" placeholder="" class="form-control" name="jobReference">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Ex Rate:</label>
                                             <input type="text" placeholder="" class="form-control" name="exRate">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-12 mb-2"> 
                                            <label>Remarks-1:</label>
                                              <textarea rows="2" name="remarks1" class="form-control"></textarea>
                                               
                                        </div>

                                        <div class="form-group col-sm-12 mb-2"> 
                                            <label>Remarks-2:</label>
                                              <textarea rows="2" name="remarks2" class="form-control"></textarea>
                                               
                                        </div>

                                        <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                            <label for="dt"></label> 
                                             
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Description-1:</label>
                                             <textarea rows="2" name="description1" class="form-control">LOCAL TRANSPORTIONS CHARGES</textarea>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Description-2:</label>
                                             <textarea rows="2" name="description2" class="form-control">  </textarea>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>SAC:</label>
                                             <input type="text" placeholder="" class="form-control" name="sacNo" value="996511">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Qty/CBM:</label>
                                             <input type="text" placeholder="" class="form-control" name="qty" value="1" style="background: aliceblue;" readonly="">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Unit Rate (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control" name="unitRate" id="unitRate" style="background: aliceblue;" readonly="">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Total Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control font-w-600" name="totalAmt" id="totalAmt" style="background: aliceblue;" readonly="" onchange="mytotal()">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Other Charge:</label>
                                             <input type="text" class="form-control" name="otherChargeText" placeholder="Type of charge...">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Other Charge (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control" name="otherChargeINR" id="otherChargeINR" value="0" onchange="mytotal()" required="">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Other Deduction (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control" name="otherDeductionINR" id="otherDeductionINR" value="0" onchange="mytotal()" required="">
                                          </div>
                                        </div>

                                        
                                        <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                            <label for="dt"></label> 
                                             
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>GST Applicable (%):</label>
                                              <select class="select2 form-control" name="gstApplicable"  id="gstApplicable" onchange="mytotal()" required="">
                                                <option value="" disabled="">---select---</option>
                                                <option value="0" selected="">0</option>
                                                <option value="5">5</option>
                                                <option value="12">12</option>
                                                <option value="18">18</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>GST Applicable (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                              <input type="text" placeholder="" class="form-control" name="gstAmt" id="gstAmt" style="background: aliceblue;" readonly="" onchange="mytotal()" value="0.00" required="">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Invoice Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control font-w-600" name="invoiceAmt" id="invoiceAmt" style="background: aliceblue;" readonly="" onchange="mytotal()" required="">

                                             <input type="hidden" placeholder="" class="form-control font-w-600" name="grossAmt" id="grossAmt" style="background: aliceblue;" readonly="" onchange="mytotal()">
                                          </div>
                                        </div>


                                        <!-- <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Total (Expenses):</label>
                                             <input type="text" placeholder="" class="form-control" name="expensesTotal" id="expensesTotal" readonly="" style="background: aliceblue;" onchange="mytotal()" value="0">
                                          </div>
                                        </div> -->

                                        <div class="form-group col-sm-12 mt-3" style="text-align: center; margin: 0px;"> 
                                            <button onclick="return confirm('Are you sure you want to submit Bill?')" title="Save" type="submit" name="submit" class="btn btn-info"><i class="fas fa-save"></i> Save</button>  
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
  function showOrderBookingPendingStatus(cuid){  
 $.ajax({
        dataType: "html",
    url:"<?php echo base_url()."superadmindashbord/show_Order_Booking_Pending_Status"; ?>",
    data: "cuid="+cuid, 
    type : "POST",
    success: function(result){  
       $("#obid").html('<option value="" selected="" disabled="">--select--</option>'+result); 
    }   
  });
}
</script> 

<script type="text/javascript">
  function showOrderBookingPendingDetail(obid){  
 $.ajax({
        dataType: "html",
    url:"<?php echo base_url()."superadmindashbord/show_Order_Booking_Pending_Detail"; ?>",
    //data: "obid="+obid,
    data: "obid="+obid,  
    type : "POST",
    success: function(result){  
       var obj = jQuery.parseJSON(result); 
              //$("#bookingDate").val(obj.bookingDate);
              var bookingDate=obj.bookingDate;
              var result1=bookingDate.split('-'); 
              $("#bookingDate").val(result1[2]+'-'+result1[1]+'-'+result1[0]);



               $("#trailorNo").val(obj.vehicleNo);

               $("#blid").val(obj.blid);

               //var bookingBillAmt=number_format(val(obj.bookingBillAmt),2);

              $("#unitRate").val(obj.bookingBillAmt);
              $("#totalAmt").val(obj.bookingBillAmt);
              $("#invoiceAmt").val(obj.bookingBillAmt);
             
    }   
  });
}
</script>        
        




<script type="text/javascript">


function mytotal(){
    var totalAmt = $('#totalAmt').val();
    var gstApplicable = $('#gstApplicable').val();
    var grossAmt = $('#grossAmt').val();
    var invoiceAmt = $('#invoiceAmt').val();
    var gstAmt = $('#gstAmt').val();

    var otherChargeINR = $('#otherChargeINR').val();
    var otherDeductionINR = $('#otherDeductionINR').val();

    // find grossAmt 
    var grossAmt = parseFloat(totalAmt) + parseFloat(otherChargeINR);
    $('#grossAmt').val(grossAmt.toFixed(2));
   
 
    var gstAmt =  (totalAmt * (gstApplicable/100));
    $('#gstAmt').val(gstAmt.toFixed(2));
    var gstAmt = parseFloat($('#gstAmt').val());

    var tot = parseFloat(totalAmt) + parseFloat(gstAmt) + parseFloat(otherChargeINR) - parseFloat(otherDeductionINR);
    $('#invoiceAmt').val(tot.toFixed(2));
    var invoiceAmt = parseFloat($('#invoiceAmt').val());
    
}

</script>  



