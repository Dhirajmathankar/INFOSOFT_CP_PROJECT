


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
                    
                    <div class="col-12 col-lg-12 mt-1">
                        <button title="Back" class="btn btn-danger mb-1"><i class="fas fa-arrow-left"></i><a href="<?php echo base_url()."superadmindashbord/manage_bill"; ?>" style="color: #fff;"> Back</a></button>

                        <form class="" action="<?php echo base_url()."superadmindashbord/billUpdate"; ?>" method="post" enctype="multipart/form-data">

                        <div class="card mt-2">
                            
                            <div class="card-content">
                                <div class="card-body py-3 form-row">
                                        

                                         <input type="hidden" class="form-control" name="blid" value="<?php echo $row->blid ;?>">

                                         <div class="form-group col-sm-4 mb-2"> 
                                            <label for="dt">Bill/Invoice No.:</label> 
                                            <input readonly="" type="text" class="form-control font-w-600 text-danger" name="billNo" value="<?php echo $row->billNo; ?>" style="background: aliceblue;">
                                        </div>

                                        <div class="form-group col-sm-4 mb-2"> 
                                            <label for="dt"> Bill Date:</label> 
                                            <input type="date" required="" class="form-control font-w-600 text-danger" name="billDate" value="<?php echo date("Y-m-d", strtotime($row->billDate)); ?>" style="background: aliceblue;">
                                        </div>

                                        <!-- <div class="form-group col-sm-3 mb-2"> 
                                            <label for="dt"> Booking Date:</label> 
                                            <input title="Booking Date" type="text" required="" class="form-control font-w-600 text-danger" name="bookingDate" id="bookingDate" readonly="" style="background: aliceblue;">
                                        </div>

                                        <div class="form-group col-sm-3 mb-2"> 
                                            <label for="dt"> Total Bill Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label> 
                                            <input title="Total Bill Amount" type="text" placeholder="" class="form-control text-danger font-w-600" name="totalBillAmt" id="totalBillAmt" required="" readonly="" style="background: aliceblue;text-align: center;">
                                        </div> -->
 
                                </div>
                            </div>
                            
                        </div>

                        <div class="card mt-2">
                            
                            <div class="card-content">
                                <div class="card-body py-3 form-row">
                                        

                                        <div class="form-group col-sm-6 mb-2">
                                          <div class="form-group">
                                            <label>Customer Name:</label>
                                             <select class="select2 form-control" name="cuid" required="" id="cuid" onchange="showOrderBookingPendingStatus(this.value);">
                                                <option value="" selected="" disabled="">---select---</option> 
                                                <?php  echo customerDropdown($row->cuid); ?>  
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-6 mb-2">
                                          <div class="form-group">
                                            <label>Order Booking No. (Pending):</label>
                                              <select class="select2 form-control" name="obid"  id="obid" onchange="showOrderBookingPendingDetail(this.value),showOrderBookingPendingTotalBill(this.value);" required="">
                                                 <?php  echo showPendingBookingNoList($row->obid); ?>
                                                
                                            </select>
                                          </div>
                                        </div>

                                        
                                </div>
                            </div>
                            
                        </div>

                        <div class="card mt-2">
                            
                            <div class="card-content">
                                <div class="card-body py-3 form-row">

                                    <table class="display table dataTable  table-bordered">
                                        <thead>
                                            <tr style="background: #c0ccce;">
                                                <th width="20%" style="text-align: center;">Port Of Discharge </th>
                                                <th width="20%" style="text-align: center;"> Loading Point </th>
                                                <th width="20%" style="text-align: center;">Off Loading Point</th>
                                                <th width="20%" style="text-align: center;"> Shipping Line  </th>
                                                <th width="20%" style="text-align: center;">Gross Weight </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-primary">
                                                   <textarea rows="2" name="portOfDischarge" class="form-control"><?php echo $row->portOfDischarge; ?></textarea>
                                                 </td>

                                                 <td class="text-primary">
                                                  <textarea rows="2" name="loadingPoint" class="form-control"><?php echo $row->loadingPoint; ?></textarea>
                                                 </td>

                                                 <td class="text-primary">
                                                  <textarea rows="2" name="offLoadingPoint" class="form-control"><?php echo $row->offLoadingPoint; ?></textarea>
                                                 </td>

                                                 <td class="text-primary">
                                                  <textarea rows="2" name="shippingLine" class="form-control"><?php echo $row->shippingLine; ?></textarea>
                                                 </td>

                                                 <td class="text-primary">
                                                  <textarea rows="2" name="grossWeight" class="form-control"><?php echo $row->grossWeight; ?></textarea>
                                                 </td>

                                                 
                                                 
                                            </tr>
                                        
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                            
                        </div>

                        <div class="card mt-2">
                            
                            <div class="card-content">
                                <div class="card-body py-3 form-row">

                                    <table class="display table dataTable  table-bordered">

                                        <thead>
                                            <tr style="background: #c0ccce;">
                                                <th width="50%" style="text-align: center;">Description-1</th>
                                                <th width="50%" style="text-align: center;"> Description-2 </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-primary">
                                                   <textarea rows="1" name="description1" class="form-control"><?php echo $row->description1; ?></textarea>
                                                 </td>

                                                 <td class="text-primary">
                                                  <textarea rows="1" name="description2" class="form-control"><?php echo $row->description2; ?></textarea>
                                                 </td>  
                                            </tr>
                                        
                                        </tbody>
                                    </table>


                                   

                                    <table class="display table dataTable  table-bordered">
                                        <thead>
                                            <tr style="background: #c0ccce;">
                                                <th width="5%" style="text-align: center;">S.No.</th>
                                                <!-- <th width="17%" style="text-align: center;">Order Date</th>
                                                <th width="19%" style="text-align: center;">Vehicle No. </th> -->
                                                <th width="20%" style="text-align: center;"> Container No. </th>
                                                <th width="40%" style="text-align: center;">GR No. / GR Date / Invoice No. </th>
                                                <th width="10%" style="text-align: center;">SAC </th>
                                                <th width="20%" style="text-align: center;"> Bill Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>) </th>
                                                
                                            </tr>
                                        </thead>

                                        
                                        <tbody id="obidlist">
                                          
                                          <tr><td colspan="5" style="text-align:center; color:#ff0000;"> Booking Order List Empty [Please select order booking no.] </td></tr>
                                          
                                          
                                            
                                            
                                          <!-- multi select loop end -->
                                        </tbody>
                                       
                                    </table>
                                        
                                </div>
                            </div>
                            
                        </div>


                        <div class="card mt-2">
                            
                            <div class="card-content">
                                <div class="card-body py-3 form-row">

                                    <table class="display table dataTable  table-bordered">
                                        <thead>
                                            <tr style="background: #c0ccce;">
                                                <th width="5%" style="text-align: center;">S.No.</th>
                                                <th width="55%" style="text-align: center;">Name of Other Charge</th>
                                                <th width="20%" style="text-align: center;"> Other Charge (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>) <b style="color: #ff0000;">*</b></th>
                                                <th width="20%" style="text-align: center;">Any Deduction (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-primary" style="text-align: center;">
                                                   1
                                                 </td>

                                                 <td class="text-primary">
                                                  <textarea rows="1" name="otherChargeText" placeholder="Type of charge..." class="form-control"><?php echo $row->portOfDischarge; ?></textarea>
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="text" placeholder="" class="form-control" name="otherChargeINR" id="otherChargeINR" value="<?php echo $row->portOfDischarge; ?>" onchange="mytotal()" required="" style="text-align: center;">
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="text" placeholder="" class="form-control" name="otherDeductionINR" id="otherDeductionINR" value="<?php echo $row->portOfDischarge; ?>" onchange="mytotal()" required="" style="text-align: center;">
                                                 </td>
                                                 
                                                 
                                            </tr>

                                            <tr>
                                                <td class="text-primary" style="text-align: center;">
                                                   2
                                                 </td>

                                                 <td class="text-primary">
                                                  <textarea rows="1" name="otherChargeText1" placeholder="Type of charge..." class="form-control"><?php echo $row->portOfDischarge; ?></textarea>
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="text" placeholder="" class="form-control" name="otherChargeINR1" id="otherChargeINR1" value="<?php echo $row->portOfDischarge; ?>" onchange="mytotal()" required="" style="text-align: center;">
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="text" placeholder="" class="form-control" name="otherDeductionINR1" id="otherDeductionINR1" value="<?php echo $row->portOfDischarge; ?>" onchange="mytotal()" required="" style="text-align: center;">
                                                 </td>
                                                 
                                                 
                                            </tr>

                                            <tr>
                                                <td class="text-primary" style="text-align: center;">
                                                   3
                                                 </td>

                                                 <td class="text-primary">
                                                  <textarea rows="1" name="otherChargeText2" placeholder="Type of charge..." class="form-control"><?php echo $row->portOfDischarge; ?></textarea>
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="text" placeholder="" class="form-control" name="otherChargeINR2" id="otherChargeINR2" value="<?php echo $row->portOfDischarge; ?>" onchange="mytotal()" required="" style="text-align: center;">
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="text" placeholder="" class="form-control" name="otherDeductionINR2" id="otherDeductionINR2" value="<?php echo $row->portOfDischarge; ?>" onchange="mytotal()" required="" style="text-align: center;">
                                                 </td>
                                                 
                                                 
                                            </tr>
                                        
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                            
                        </div>

                        

                        <div class="card mt-2">
                            
                            <div class="card-content">
                                <div class="card-body py-3 form-row">

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>GST Applicable (in %):</label>
                                              <select class="select2 form-control" name="gstApplicable"  id="gstApplicable" onchange="mytotal()" required="">
                                                <option value="" disabled="">---select---</option>
                                                <option value="0" selected="">0 %</option>
                                                <option value="5">5 %</option>
                                                <option value="12">12 %</option>
                                                <option value="18">18 %</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>GST Applicable (in <i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                              <input type="text" placeholder="" class="form-control font-w-600" name="gstAmt" id="gstAmt" style="background: aliceblue;text-align: center;" readonly="" onchange="mytotal()" value="0.00" required="">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Net Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                            <input type="hidden" placeholder="" class="form-control font-w-600" name="grossAmt" id="grossAmt" value="0.00" style="background: aliceblue;" readonly="" onchange="mytotal()">

                                            <input type="hidden" placeholder="" class="form-control font-w-600" name="netAmt" id="netAmt" value="0.00" style="background: aliceblue;text-align: center;" readonly="" onchange="mytotal()" required="">



                                            <input type="hidden" placeholder="" class="form-control font-w-600" name="otherChargeTotal" id="otherChargeTotal" value="0.00" style="background: aliceblue;text-align: center;" readonly="" onchange="mytotal()" required="">


                                            <input type="hidden" placeholder="" class="form-control font-w-600" name="grossAmtOrg" id="grossAmtOrg" value="0.00" style="background: aliceblue;text-align: center;" readonly="" onchange="mytotal()">

                                            

                                            <input type="hidden" placeholder="" class="form-control font-w-600" name="lessAdvance" id="lessAdvance" value="0.00" style="background: aliceblue;text-align: center;" readonly="" onchange="mytotal()" required="">

                                            <input type="text" placeholder="" class="form-control font-w-600" name="netAmtOrg" id="netAmtOrg" value="0.00" style="background: aliceblue;text-align: center;" readonly="" onchange="mytotal()" required="">

                                             
                                          </div>
                                        </div>
                                        
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group col-sm-12 mt-3" style="text-align: center; margin: 0px;"> 
                            <button title="Update" onclick="return confirm('Are you sure you want to update Bill?')" title="Update" type="submit" name="submit" class="btn btn-info"><i class="fas fa-sync"></i> Update</button>  
                        </div>
                           
                      </form> 


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



