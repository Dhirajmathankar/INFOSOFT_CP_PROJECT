


        <!-- START: Main Content-->
        <main>
          
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-4 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Maintenance [Edit]</h4>

                              <!-- <span style="float: right; color: #555;"> <?php if ($row->updatedDateM) {
                                ?> <span title="Last Updated : <?php echo date("d-m-Y",strtotime($row->updatedDateM)) ?> <?php echo date("H:i A",strtotime($row->updatedTimeM)) ?>" style=" color: #555;"> Last Updated : <?php echo date("d-m-Y",strtotime($row->updatedDateM)) ?> <?php echo date("H:i A",strtotime($row->updatedTimeM)) ?></span><?php
                              } else{ ?><span style=" color: #555;"> Last Updated : 00-00-0000 </span> <?php } ?> | 
                              <span title="Current Status: <?php if ($row->statusPayment=="Pending"){ echo 'Pending'; } ?><?php if ($row->statusPayment=="Done"){ echo 'Done'; } ?>"> Current Status: <?php if ($row->statusPayment=="Pending"){ echo 'Pending'; } ?><?php if ($row->statusPayment=="Done"){ echo 'Done'; } ?></span></span> -->  

                            </div>

                            <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color:green;">
                                <?php if($this->session->flashdata('msg')!="") {?>  
                                    <?php echo $this->session->flashdata('msg');?>
                                  <?php } ?> </h6>
                            </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                                <li class="breadcrumb-item active">Maintenance [Edit]</li>
                            </ol>
                        </div>
                    </div>
                </div>
                
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    
                    <div class="col-12 col-lg-10 mt-1">
                        <button title="Back" class="btn btn-danger mb-1"><i class="fas fa-arrow-left"></i><a href="<?php echo base_url()."superadmindashbord/manage_maintenance"; ?>" style="color: #fff;"> Back</a></button>

                        <!-- <button title="Edit" class="btn btn-info mb-1"><a href="registraton_form_edit.php?form=<?php echo $data['id'];?>" style="color: #fff;"><i class="fas fa-pencil"></i><i class="icon-pencil"></i> Edit</a></button> -->

                        <div class="card">
                          
                            <div class="card-header">                               
                                <h4 class="card-title" style="color: #fff;">Maintenance [Edit - Entry Form]</h4>                                
                            </div>
                            
                            <div class="card-content">
                                <div class="card-body py-3">
                                    <form class="form-row" action="<?php echo base_url()."superadmindashbord/maintenanceUpdate"; ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" class="form-control" name="mid" id="mid" value="<?php echo $row->mid ;?>">


                                        <div class="form-group col-sm-4 mb-2"> 
                                            <label for="dt">Maintenance No.:</label> 
                                            <input readonly="" type="text" class="form-control font-w-600 text-danger" name="maintenanceNo" value="<?php echo $row->maintenanceNo; ?>" style="background: aliceblue;">
                                        </div>

                                        <div class="form-group col-sm-4 mb-2"> 
                                            <label for="dt"> Updated Date:</label> 
                                            <input type="date" required="" class="form-control font-w-600 text-danger" name="updatedDateM" value="<?php echo date("Y-m-d") ?>" style="background: aliceblue;">
                                        </div>

                                        <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                            <label for="dt"></label> 
                                             
                                        </div>


                                        <div class="form-group col-sm-6 mb-2">
                                          <div class="form-group">
                                            <label>Vehicle No:</label>
                                             <select class="select2 form-control" name="bhid" required="" >
                                               
                                                <?php  echo vehicleDropdown($row->bhid); ?> 
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-6 mb-2">
                                          <div class="form-group">
                                            <label>Maintenance Amount:(<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control" value="<?php echo $row->maintenanceAmt ;?>" name="maintenanceAmt">
                                            
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-12 mb-2">
                                          <div class="form-group">
                                            <label>Remarks: (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control" name="remarks"  value="<?php echo $row->remarks;?>">
                                          </div>
                                        </div>
                                        
                                        <div class="form-group col-sm-12 mt-3" style="text-align: center; margin: 0px;"> 
                                            <button onclick="return confirm('Are you sure you want to update Maintenace?')" title="Update" type="submit" name="submit" class="btn btn-info"><i class="fas fa-sync"></i> Update</button>  
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
              
              var billDate=obj.billDate;
              var result1=billDate.split('-'); 
              $("#billDate").val(result1[2]+'-'+result1[1]+'-'+result1[0]);



               $("#customerClosingBalance").val(obj.customerClosingBalance);
               $("#billAmt").val(obj.invoiceAmt);

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
    alert("Total payment must be equal to billing amount!");
    $("#submit").attr("disabled", "disabled");
    $("#submit").attr("title", "Total payment must be equal to billing amount!");
    } 
    else if (receivedTotalAmt < billAmt) {alert("Total payment must be equal to billing amount!");
    $("#submit").attr("disabled", "disabled");
    $("#submit").attr("title", "Total payment must be equal to billing amount!");}
    else { $("#submit").removeAttr("disabled");}


   
    
}

</script>      


