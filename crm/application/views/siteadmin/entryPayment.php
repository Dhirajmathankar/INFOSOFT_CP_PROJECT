


        <!-- START: Main Content-->
        <main>
          
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-4 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Payment [Entry]</h4></div>

                            <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color:green;">
                                <?php if($this->session->flashdata('msg')!="") {?>  
                                    <?php echo $this->session->flashdata('msg');?>
                                  <?php } ?> </h6>
                            </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                                <li class="breadcrumb-item active">Payment [Entry]</li>
                            </ol>
                        </div>
                    </div>
                </div>
                
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    
                    <div class="col-12 col-lg-12 mt-1">
                        <button title="Back" class="btn btn-danger mb-1"><i class="fas fa-arrow-left"></i><a href="<?php echo base_url()."superadmindashbord/manage_payment"; ?>" style="color: #fff;"> Back</a></button>

                        <form class="" action="<?php echo base_url()."superadmindashbord/paymentSubmit"; ?>" method="post" enctype="multipart/form-data">

                        <div class="card">
                          
                            <div class="card-content">
                                <div class="card-body py-3 form-row">
                                    


                                      <input type="hidden" class="form-control" name="obid" id="obid">

                                        <div class="form-group col-sm-4 mb-2"> 
                                            <label for="dt"> Payment Date:</label> 
                                            <input type="date" required="" value="<?php echo date("Y-m-d") ?>" class="form-control text-danger font-w-600" name="paymentDate" style="background: aliceblue;">
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
                                                <?php  echo customerDropdown(); ?> 
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Bill/Invoice No. (Pending):</label>
                                              <select class="select2 form-control" name="blid"  id="billNoPending" onchange="showBillNoPendingDetail(this.value);" required="">
                                                
                                            </select>
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Bill/Invoice Date:</label>
                                             <input type="text" placeholder="" class="form-control" name="billDate" id="billDate" value="" style="background: aliceblue;" readonly="">
                                            
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Total Outstanding (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control" name="customerClosingBalance" id="customerClosingBalance" style="background: aliceblue;" readonly="">
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
                                             <input type="text" placeholder="" class="form-control font-w-600" name="billAmt" id="billAmt" onchange ="mytotal()" value="0" required="" style="background: aliceblue; text-align: center;" readonly="">

                                             <input type="hidden" placeholder="" class="form-control" name="remPendingBillAmt" id="remPendingBillAmt" onchange ="mytotal()">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Received Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control font-w-500" name="receivedAmt" id="receivedAmt" onchange ="mytotal()" required="" style=" text-align: center;">
                                          </div>
                                        </div>


                                        

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>TDS (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control font-w-500" name="tdsAmt" id="tdsAmt" onchange ="mytotal()" required="" value="0" style=" text-align: center;">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Total (Payment) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control font-w-600" name="receivedTotalAmt" id="receivedTotalAmt" style="background: aliceblue; text-align: center;" readonly=""  onchange ="mytotal()" value="0.00">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-12 mb-2">
                                          <div class="form-group">
                                            <label>Remarks:</label>
                                            <textarea rows="2" name="remarks1" class="form-control"></textarea>
                                          </div>
                                        </div>

                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group col-sm-12 mt-3" style="text-align: center; margin: 0px;"> 
                            <button onclick="return confirm('Are you sure you want to submit Payment?')" title="Save" type="submit" name="submit" id="submit" class="btn btn-info"><i class="fas fa-save"></i> Save</button>  
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



