


        <!-- START: Main Content-->
        <main>
          
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-4 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Bill [Edit]</h4>

                              <span style="float: right; color: #555;"> <?php if ($row->updatedDateBill) {
                                ?> <span title="Last Updated : <?php echo date("d-m-Y",strtotime($row->updatedDateBill)) ?> <?php echo date("H:i A",strtotime($row->updatedTimeBill)) ?>" style=" color: #555;"> Last Updated : <?php echo date("d-m-Y",strtotime($row->updatedDateBill)) ?> <?php echo date("H:i A",strtotime($row->updatedTimeBill)) ?></span><?php
                              } else{ ?><span style=" color: #555;"> Last Updated : 00-00-0000 </span> <?php } ?> | 
                              <span title="Current Status: <?php if ($row->statusPayment=="Pending"){ echo 'Pending'; } ?><?php if ($row->statusPayment=="Done"){ echo 'Done'; } ?>"> Current Status: <?php if ($row->statusPayment=="Pending"){ echo 'Pending'; } ?><?php if ($row->statusPayment=="Done"){ echo 'Done'; } ?></span></span>  

                            </div>

                            <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color:green;">
                                <?php if($this->session->flashdata('msg')!="") {?>  
                                    <?php echo $this->session->flashdata('msg');?>
                                  <?php } ?> </h6>
                            </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                                <li class="breadcrumb-item active">Bill [Edit]</li>
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
                                <h4 class="card-title" style="color: #fff;">Bill [Edit - Entry Form]</h4>                                
                            </div>
                            
                            <div class="card-content">
                                <div class="card-body py-3">
                                    <form class="form-row" action="<?php echo base_url()."superadmindashbord/billUpdate"; ?>" method="post" enctype="multipart/form-data">

                                        <input type="hidden" class="form-control" name="blid" value="<?php echo $row->blid ;?>">


                                        <div class="form-group col-sm-4 mb-2"> 
                                            <label for="dt">Bill/Invoice No.:</label> 
                                            <input readonly="" type="text" class="form-control font-w-600 text-danger" name="billNo" value="<?php echo $row->billNo; ?>" style="background: aliceblue;">
                                        </div>

                                        <div class="form-group col-sm-4 mb-2"> 
                                            <label for="dt"> Bill Date:</label> 
                                            <input type="date" required="" class="form-control font-w-600 text-danger" name="billDate" value="<?php echo date("Y-m-d", strtotime($row->billDate)); ?>" style="background: aliceblue;">
                                        </div>

                                        <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                            <label for="dt"></label> 
                                             
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Customer Name:</label>
                                             <select class="select2 form-control" name="cuid" required="" id="cuid" onchange="showOrderBookingPendingStatus(this.value);">
                                                
                                                <?php  echo customerDropdown($row->cuid); ?> 
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Order Booking No. (Pending):</label>
                                              <select class="select2 form-control" name="obid"  id="obid" onchange="showOrderBookingPendingDetail(this.value);" required="">
                                                
                                                <?php  echo showPendingBookingNoList($row->obid); ?>
                                            </select>
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Order Booking Date:</label>
                                             <input type="text" placeholder="" class="form-control" name="bookingDate" id="bookingDate" value="<?php  echo date("d-m-Y",strtotime(orderBookingDetail($row->obid)->bookingDate)) ; ?>" style="background: aliceblue;" readonly="">
                                            
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Trailor No.:</label>
                                             <input type="text" placeholder="" class="form-control" name="trailorNo" id="trailorNo"  value="<?php  echo vehicleDetail($row->blid)->vehicleNo; ?>" style="background: aliceblue;" readonly="">

                                             <input type="hidden" class="form-control" name="blid" id="blid" value="<?php echo $row->blid ;?>">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                            <label for="dt"></label> 
                                             
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>LR/GR No.:</label>
                                             <input type="text" placeholder="" class="form-control" name="lrGrNo" value="<?php echo $row->lrGrNo; ?>">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>LR/GR Date:</label>
                                             <input type="date" placeholder="" class="form-control" name="lrGrDate" value="<?php echo date("Y-m-d",strtotime($row->lrGrDate)) ;?>">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Port Of Discharge:</label>
                                             <input type="text" placeholder="" class="form-control" name="portOfDischarge" value="<?php echo $row->portOfDischarge; ?>">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Loading Point:</label>
                                             <textarea rows="2" name="loadingPoint" class="form-control"> <?php echo $row->loadingPoint; ?></textarea>
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Off Loading Point:</label>
                                             <textarea rows="2" name="offLoadingPoint" class="form-control"><?php echo $row->offLoadingPoint; ?></textarea>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Shipping Line:</label>
                                            <textarea rows="2" name="shippingLine" class="form-control"> <?php echo $row->shippingLine; ?></textarea>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Gross Weight:</label>
                                             <input type="text" placeholder="" class="form-control" name="grossWeight" value="<?php echo $row->grossWeight; ?>">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Job Reference:</label>
                                             <input type="text" placeholder="" class="form-control" name="jobReference" value="<?php echo $row->jobReference; ?>">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Ex Rate:</label>
                                             <input type="text" placeholder="" class="form-control" name="exRate" value="<?php echo $row->exRate; ?>">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-12 mb-2"> 
                                            <label>Remarks-1:</label>
                                              <textarea rows="2" name="remarks1" class="form-control"> <?php echo $row->remarks1; ?></textarea>
                                               
                                        </div>

                                        <div class="form-group col-sm-12 mb-2"> 
                                            <label>Remarks-2:</label>
                                              <textarea rows="2" name="remarks2" class="form-control"> <?php echo $row->remarks2; ?></textarea>
                                               
                                        </div>

                                        <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                            <label for="dt"></label> 
                                             
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Description-1:</label>
                                             <textarea rows="2" name="description1" class="form-control"><?php echo $row->description1;?></textarea>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Description-2:</label>
                                             <textarea rows="2" name="description2" class="form-control"><?php echo $row->description2;?></textarea>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>SAC:</label>
                                             <input type="text" placeholder="" class="form-control" name="sacNo" value="<?php echo $row->sacNo; ?>">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Qty/CBM:</label>
                                             <input type="text" placeholder="" class="form-control" name="qty"  value="<?php echo $row->qty; ?>" style="background: aliceblue;" readonly="">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Unit Rate (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control" name="unitRate" id="unitRate" style="background: aliceblue;" readonly="" value="<?php  echo orderBookingDetail($row->obid)->bookingBillAmt; ?>">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Total Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control font-w-600" name="totalAmt" id="totalAmt" style="background: aliceblue;" readonly="" onchange="mytotal()" value="<?php  echo orderBookingDetail($row->obid)->bookingBillAmt; ?>">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Other Charge:</label>
                                             <input type="text" class="form-control" name="otherChargeText" placeholder="Type of charge..." value="<?php echo $row->otherChargeText; ?>">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Other Charge (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control" name="otherChargeINR" id="otherChargeINR" onchange="mytotal()" required="" value="<?php echo $row->otherChargeINR; ?>">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Other Deduction (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control" name="otherDeductionINR" id="otherDeductionINR" onchange="mytotal()" required="" value="<?php echo $row->otherDeductionINR; ?>">
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
                                                <option value="0"<?php if ($row->gstApplicable=="0") {echo 'selected';} ?>>0</option>
                                                <option value="5"<?php if ($row->gstApplicable=="5") {echo 'selected';} ?>>5</option>
                                                <option value="12"<?php if ($row->gstApplicable=="12") {echo 'selected';} ?>>12</option>
                                                <option value="18"<?php if ($row->gstApplicable=="18") {echo 'selected';} ?>>18</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>GST Applicable (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                              <input type="text" placeholder="" class="form-control" name="gstAmt" id="gstAmt" style="background: aliceblue;" readonly="" onchange="mytotal()"  value="<?php echo $row->gstAmt; ?>" required="">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Invoice Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" class="form-control font-w-600" name="invoiceAmt" id="invoiceAmt" style="background: aliceblue;" readonly="" onchange="mytotal()" required="" value="<?php  echo $row->invoiceAmt; ?>">

                                             <input type="hidden" class="form-control font-w-600" name="grossAmt" id="grossAmt" style="background: aliceblue;" readonly="" onchange="mytotal()"  value="<?php  echo $row->grossAmt; ?>">
                                          </div>
                                        </div>

                                        
                                        <div class="form-group col-sm-12 mt-3" style="text-align: center; margin: 0px;"> 
                                            <button title="Update" onclick="return confirm('Are you sure you want to update Bill?')" title="Update" type="submit" name="submit" class="btn btn-info"><i class="fas fa-sync"></i> Update</button>  
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



