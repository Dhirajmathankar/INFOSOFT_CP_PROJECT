


        <!-- START: Main Content-->
        <main>
          
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-4 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Order Booking [Edit]</h4>

                              <span style="float: right; color: #555;"> <?php if ($row->updatedDateBooking) {
                                ?> <span title="Last Updated : <?php echo date("d-m-Y",strtotime($row->updatedDateBooking)) ?> <?php echo date("H:i A",strtotime($row->updatedTimeBooking)) ?>" style=" color: #555;"> Last Updated : <?php echo date("d-m-Y",strtotime($row->updatedDateBooking)) ?> <?php echo date("H:i A",strtotime($row->updatedTimeBooking)) ?></span><?php
                              } else{ ?><span style=" color: #555;"> Last Updated : 00-00-0000 </span> <?php } ?> | 
                              <span title="Current Status: <?php if ($row->statusBill=="Pending"){ echo 'Pending'; } ?><?php if ($row->statusBill=="Done"){ echo 'Done'; } ?>"> Current Status: <?php if ($row->statusBill=="Pending"){ echo 'Pending'; } ?><?php if ($row->statusBill=="Done"){ echo 'Done'; } ?></span></span>  

                            </div>

                            <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color:green;">
                                <?php if($this->session->flashdata('msg')!="") {?>  
                                    <?php echo $this->session->flashdata('msg');?>
                                  <?php } ?> </h6>
                            </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                                <li class="breadcrumb-item active">Order Booking [Edit]</li>
                            </ol>
                        </div>
                    </div>
                </div>
                
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    
                    <div class="col-12 col-lg-10 mt-1">
                        <button title="Back" class="btn btn-danger mb-1"><i class="fas fa-arrow-left"></i><a href="<?php echo base_url()."superadmindashbord/manage_order_booking"; ?>" style="color: #fff;"> Back</a></button>

                        <div class="card">
                          
                            <div class="card-header">                               
                                <h4 class="card-title" style="color: #fff;">Order Booking [Edit - Entry Form]</h4>                                
                            </div>
                            
                            <div class="card-content">
                                <div class="card-body py-3">
                                    <form class="form-row" action="<?php echo base_url()."superadmindashbord/orderBookingUpdate"; ?>" method="post" enctype="multipart/form-data">

                                        <input type="hidden" class="form-control" name="obid" value="<?php echo $row->obid ;?>">


                                        <div class="form-group col-sm-4 mb-2"> 
                                            <label for="dt"> Order Booking No.:</label> 
                                            <input readonly="" type="text" class="form-control font-w-600 text-danger" name="orderBookingNo" value="<?php echo $row->orderBookingNo; ?>" style="background: aliceblue;">
                                        </div>


                                        <div class="form-group col-sm-4 mb-2"> 
                                            <label for="dt">Order Booking Date:</label> 
                                            <input type="date" required="" class="form-control font-w-600 text-danger" name="bookingDate" value="<?php echo date("Y-m-d", strtotime($row->bookingDate)); ?>" style="background: aliceblue;">
                                        </div>


                                        <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                            <label for="dt"></label> 
                                             
                                        </div>


                                        

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Vehicle No.:</label>
                                             <select class="select2 form-control" name="blid" required="">
                                                <option value="" selected="" disabled="">---select---</option> 
                                                <?php  echo vehicleDropdown($row->bhid); ?> 
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Container No.:</label>
                                             <input type="text" placeholder="" class="form-control" name="containerNo" value="<?php echo $row->containerNo; ?>">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Customer Name:</label>
                                             <select class="select2 form-control" name="cuid" required="">
                                                <option value="" selected="" disabled="">---select---</option> 
                                                <?php  echo customerDropdown($row->cuid); ?> 
                                            </select>
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Booking Through:</label>
                                             <select class="select2 form-control" name="brid" required="">
                                                <option value="" selected="" disabled="">---select---</option> 
                                                <?php  echo brokerDropdown($row->brid); ?> 
                                            </select>
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Booking Packages:</label>
                                             <input type="text" placeholder="" class="form-control" name="bookingPackages" value="<?php echo $row->bookingPackages; ?>">
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                            <label for="dt"></label> 
                                             
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Booking Bill Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control font-w-600" name="bookingBillAmt" id="bookingBillAmt" onchange="mytotal()" value="<?php echo $row->bookingBillAmt; ?>" required="">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label> Diesel (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control" name="expensesDiesel" id="expensesDiesel" onchange="mytotal()" value="<?php echo $row->expensesDiesel; ?>" required="">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label> Toll (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control" name="expensesToll" id="expensesToll" onchange="mytotal()" value="<?php echo $row->expensesToll; ?>" required="">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Other-1  (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control" name="expensesOther1" id="expensesOther1" onchange="mytotal()" value="<?php echo $row->expensesOther1; ?>" required="">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Other-2 (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control" name="expensesOther2" id="expensesOther2" onchange="mytotal()" value="<?php echo $row->expensesOther2; ?>" required="">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Other-3 (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control" name="expensesOther3" id="expensesOther3" onchange="mytotal()" value="<?php echo $row->expensesOther3; ?>" required="">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Total (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control font-w-600" name="expensesTotal" id="expensesTotal" readonly="" style="background: aliceblue;" onchange="mytotal()" value="<?php echo $row->expensesTotal; ?>" required="">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Total Saving (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label>
                                             <input type="text" placeholder="" class="form-control font-w-600" name="bookingSaving" id="bookingSaving" readonly="" style="background: aliceblue;" onchange="mytotal()" value="<?php echo $row->bookingSaving; ?>" required="">
                                          </div>
                                        </div>


                                        <div class="form-group col-sm-12 mb-2" style="border-bottom: 1px dashed #555;"> 
                                            <label for="dt"></label> 
                                             
                                        </div>


                                        <div class="form-group col-sm-12 mb-2"> 
                                            <label>Booking Narration-1:</label>
                                              <textarea rows="2" name="bookingNarration" class="form-control"><?php echo $row->bookingNarration ;?></textarea>
                                               
                                        </div>

                                        <div class="form-group col-sm-12 mb-2"> 
                                            <label>Booking Narration-2:</label>
                                              <textarea rows="2" name="bookingNarration1" class="form-control"><?php echo $row->bookingNarration1 ;?></textarea>
                                               
                                        </div>

                                        
                                        <div class="form-group col-sm-12 mt-3" style="text-align: center; margin: 0px;"> 
                                            <button onclick="return confirm('Are you sure you want to update Order Booking?')" title="Update" type="submit" name="submit" class="btn btn-info"><i class="fas fa-save"></i> Update</button>  
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


function mytotal(){
    var bookingBillAmt = $('#bookingBillAmt').val();
    var expensesDiesel = $('#expensesDiesel').val();
    var expensesToll = $('#expensesToll').val();
    var expensesOther1 = $('#expensesOther1').val();
    var expensesOther2 = $('#expensesOther2').val();
    var expensesOther3 = $('#expensesOther3').val();
    var expensesTotal = $('#expensesTotal').val();
    var bookingSaving = $('#bookingSaving').val();
    
    var sum =  parseFloat(expensesDiesel) + parseFloat(expensesToll) + parseFloat(expensesOther1) + parseFloat(expensesOther2) + parseFloat(expensesOther3);

    $('#expensesTotal').val(sum.toFixed(2));
    var expensesTotal = parseFloat($('#expensesTotal').val());
 
    var tot1 =  (bookingBillAmt - expensesTotal);
    $('#bookingSaving').val(tot1.toFixed(2));
    var bookingSaving = parseFloat($('#bookingSaving').val());
    
}

</script>     



