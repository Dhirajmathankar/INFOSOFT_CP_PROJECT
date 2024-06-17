


        <!-- START: Main Content-->
        <main>
          
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-4 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Payment [Edit]</h4>

                              <span style="float: right; color: #555;"> <?php if ($row->updatedDatePayment) {
                                ?> <span title="Last Updated : <?php echo date("d-m-Y",strtotime($row->updatedDatePayment)) ?> <?php echo date("H:i A",strtotime($row->updatedTimePayment)) ?>" style=" color: #555;"> Last Updated : <?php echo date("d-m-Y",strtotime($row->updatedDatePayment)) ?> <?php echo date("H:i A",strtotime($row->updatedTimePayment)) ?></span><?php
                              } else{ ?><span style=" color: #555;"> Last Updated : 00-00-0000 </span> <?php } ?> | 
                              <span title="Current Status: <?php if ($row->status=="Pending"){ echo 'Pending'; } ?><?php if ($row->status=="Done"){ echo 'Success'; } ?>"> Current Status: <?php if ($row->status=="Pending"){ echo 'Pending'; } ?><?php if ($row->status=="Done"){ echo 'Success'; } ?></span></span>  

                            </div>

                            <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color:green;">
                                <?php if($this->session->flashdata('msg')!="") {?>  
                                    <?php echo $this->session->flashdata('msg');?>
                                  <?php } ?> </h6>
                            </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                                <li class="breadcrumb-item active">Payment [Edit]</li>
                            </ol>
                        </div>
                    </div>
                </div>
                
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    
                    <div class="col-12 col-lg-12 mt-1">
                        <button title="Back" class="btn btn-danger mb-1"><i class="fas fa-arrow-left"></i><a href="<?php echo base_url()."superadmindashbord/manage_payment"; ?>" style="color: #fff;"> Back</a></button>

                        <form class="" action="<?php echo base_url()."superadmindashbord/paymentUpdate"; ?>" method="post" enctype="multipart/form-data">

                        <div class="card">
                            
                            <div class="card-content">
                                <div class="card-body py-3 form-row">
                                    

                                        <input type="hidden" class="form-control" name="pid" value="<?php echo $row->pid ;?>">

                                        <input type="hidden" class="form-control" name="obid" id="obid" value="<?php echo $row->obid ;?>">


                                        <div class="form-group col-sm-4 mb-2"> 
                                            <label for="dt">Payment/Voucher No.:</label> 
                                            <input readonly="" type="text" class="form-control font-w-600 text-danger" name="paymentNo" value="<?php echo $row->paymentNo; ?>" style="background: aliceblue;">
                                        </div>

                                        <div class="form-group col-sm-4 mb-2"> 
                                            <label for="dt"> Payment Date:</label> 
                                            <input type="date" required="" class="form-control font-w-600 text-danger" name="paymentDate" value="<?php echo date("Y-m-d", strtotime($row->paymentDate)); ?>" style="background: aliceblue;">
                                        </div>

                                </div>
                            </div>
                            
                        </div>

                        <div class="card mt-2">
                            
                            <div class="card-content">
                                <div class="card-body py-3 form-row">
                                    

                                        <div class="form-group col-sm-12 mb-2">
                                          <div class="form-group">
                                            <label>Customer Name:</label>
                                             <select class="select2 form-control" name="cuid" required="" id="cuid" onchange="showBillNoPendingList(this.value);">
                                                <option value="" selected="" disabled="">---select---</option> 
                                                <?php  echo customerDropdown($row->cuid); ?> 
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Bill/Invoice No. (Pending):</label>
                                              <select class="select2 form-control" name="blid"  id="billNoPending" onchange="showBillNoPendingDetail(this.value);" required="">
                                                <?php  echo showPendingBillNoList($row->blid); ?>
                                            </select>
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Bill/Invoice Date:</label>
                                             <input type="text" placeholder="" class="form-control" name="billDate" id="billDate" style="background: aliceblue;" value="<?php  echo date("d-m-Y",strtotime(billDetail($row->blid)->billDate)) ; ?>" readonly="">
                                            
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Total Outstanding (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control" name="customerClosingBalance" id="customerClosingBalance" style="background: aliceblue;" readonly="" value="<?php  echo customerDetail($row->cuid)->customerClosingBalance; ?>">
                                          </div>
                                        </div>
                                         
                                     
                                </div>
                            </div>
                            
                        </div>


                        <div class="card mt-2">
                            
                            <div class="card-content">
                                <div class="card-body py-3 form-row">
                                    


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Billing Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control font-w-600" name="billAmt" id="billAmt" value="<?php  echo billDetail($row->blid)->netAmt; ?>" required="" style="background: aliceblue; text-align: center;" readonly="" onchange="mytotal()">

                                             <input type="hidden" placeholder="" class="form-control" name="remPendingBillAmt" id="remPendingBillAmt" onchange="mytotal()">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Received Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input style=" text-align: center;" type="text" placeholder="" class="form-control font-w-500" name="receivedAmt" id="receivedAmt" onchange="mytotal()" value="<?php  echo $row->receivedAmt; ?>" required="" >
                                          </div>
                                        </div>


                                        

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>TDS (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input style=" text-align: center;" type="text" placeholder="" class="form-control font-w-500" name="tdsAmt" id="tdsAmt" onchange="mytotal()" required="" value="<?php  echo $row->tdsAmt; ?>">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Total Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control font-w-600" name="receivedTotalAmt" id="receivedTotalAmt" style="background: aliceblue; text-align: center;" readonly="" onchange="mytotal()" value="<?php  echo $row->receivedTotalAmt; ?>">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-12 mb-2">
                                          <div class="form-group">
                                            <label>Remarks:</label>
                                            <textarea rows="2" name="remarks1" class="form-control"><?php echo $row->remarks1;?></textarea>
                                          </div>
                                        </div>

                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group col-sm-12 mt-3" style="text-align: center; margin: 0px;"> 
                          <button onclick="return confirm('Are you sure you want to update Payment?')" title="Update" type="submit" name="submit"id="submit"  class="btn btn-info"><i class="fas fa-save"></i> Update</button>  
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
  function showBillNoPendingList(cuid){  
 $.ajax({
        dataType: "html",
    url:"<?php echo base_url()."superadmindashbord/show_Bill_No_Pending_List"; ?>",
    data: "cuid="+cuid, 
    type : "POST",
    success: function(result){  
       $("#billNoPending").html('<option value="" selected="" disabled="">--select--</option>'+result); 
    }   
  });
}
</script> 

<script type="text/javascript">
  function showBillNoPendingDetail(blid){  
 $.ajax({
        dataType: "html",
    url:"<?php echo base_url()."superadmindashbord/show_Pending_Bill_No_List_Details"; ?>",
    //data: "obid="+obid,
    data: "blid="+blid,  
    type : "POST",
    success: function(result){  
       var obj = jQuery.parseJSON(result); 
              
             //$("#bookingDate").val(obj.bookingDate);
              var billDate=obj.billDate;
              var result1=billDate.split('-'); 
              $("#billDate").val(result1[2]+'-'+result1[1]+'-'+result1[0]);



               $("#customerClosingBalance").val(obj.customerClosingBalance);
               $("#billAmt").val(obj.netAmt);

               $("#obid").val(obj.obid);

               //var bookingBillAmt=number_format(val(obj.bookingBillAmt),2);

              //$("#unitRate").val(obj.bookingBillAmt);
              //$("#totalAmt").val(obj.bookingBillAmt);
              //$("#invoiceAmt").val(obj.bookingBillAmt);
             
    }   
  });
}
</script>        
        




<script type="text/javascript">


function mytotal(){
    var receivedAmt = $('#receivedAmt').val();
    var tdsAmt = $('#tdsAmt').val();
    var receivedTotalAmt = $('#receivedTotalAmt').val();
    var billAmt = parseFloat($('#billAmt').val());
    $("#submit").attr("disabled", "disabled");
   

    var tot = parseFloat(receivedAmt) + parseFloat(tdsAmt);
    $('#receivedTotalAmt').val(tot.toFixed(2));
    var receivedTotalAmt = parseFloat($('#receivedTotalAmt').val());



    var remPendingBillAmt = parseFloat(billAmt) - parseFloat(receivedTotalAmt);
    $('#remPendingBillAmt').val(remPendingBillAmt.toFixed(2));


    if (receivedTotalAmt > billAmt) {
    alert("Total payment must be equal to Billing amount!");
    $("#submit").attr("disabled", "disabled");
    $("#submit").attr("title", "Total payment must be equal to Billing amount!");
    } 
    else if (receivedTotalAmt < billAmt) {alert("Total payment must be equal to Billing amount!");
    $("#submit").attr("disabled", "disabled");
    $("#submit").attr("title", "Total payment must be equal to Billing amount!");}
    else { $("#submit").removeAttr("disabled");}


   
    
}

</script>      



