
<!-- START: Add / remove row Dynamically -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<script src="<?php echo base_url()."dist/"; ?>/js/addremoveinput.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<!-- END: Add / remove row Dynamically -->

        <!-- START: Main Content-->
        <main>
          
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-4 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Order Booking [Entry]</h4></div>

                            <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color:green;">
                                <?php if($this->session->flashdata('msg')!="") {?>  
                                    <?php echo $this->session->flashdata('msg');?>
                                  <?php } ?> </h6>
                            </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                                <li class="breadcrumb-item active">Order Booking [Entry]</li>
                            </ol>
                        </div>
                    </div>
                </div>
                
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    
                    <div class="col-12 col-lg-12 mt-1">
                        <button title="Back" class="btn btn-danger mb-1"><i class="fas fa-arrow-left"></i><a href="<?php echo base_url()."superadmindashbord/manage_order_booking"; ?>" style="color: #fff;"> Back</a></button>

                        <!-- <button title="Edit" class="btn btn-info mb-1"><a href="registraton_form_edit.php?form=<?php echo $data['id'];?>" style="color: #fff;"><i class="fas fa-pencil"></i><i class="icon-pencil"></i> Edit</a></button> -->


                        <form class="" action="<?php echo base_url()."superadmindashbord/orderBookingSubmit"; ?>" method="post" enctype="multipart/form-data">

                        

                        <div class="card mt-2">
                          
                            
                            
                            <div class="card-content ">
                                <div class="card-body py-3 form-row">

                                       <div class="form-group col-sm-3 mb-2"> 
                                            <label for="dt"> Booking Date:</label> 
                                            <input title="Booking Date" type="date" required="" value="<?php echo date("Y-m-d") ?>" class="form-control text-danger font-w-600" name="bookingDate" style="background: aliceblue;">
                                        </div>


                                        <div class="form-group col-sm-3 mb-2"> 
                                            <label for="dt"> Total Bill Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>):</label> 
                                            <input title="Total Bill Amount" type="text" placeholder="" class="form-control text-danger font-w-600" name="totalBillAmt" id="totalBillAmt" required="" readonly="" style="background: aliceblue;text-align: center;">
                                        </div>

                                      <table class="display table dataTable  table-bordered">
                                        <thead>
                                            <tr style="background: #c0ccce;">
                                                
                                                <th width="50%"> Customer Name </th>
                                                <th width="50%">Booking Through </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                 <td class="text-primary">
                                                  <select class="select2 form-control" name="cuid" required="">
                                                      <option value="" selected="" disabled="">---select---</option> 
                                                      <?php  echo customerDropdown(); ?> 
                                                  </select>
                                                 </td>

                                                 <td class="text-primary">
                                                  <select class="select2 form-control" name="brid" required="">
                                                      <option value="" selected="" disabled="">---select---</option> 
                                                      <?php  echo brokerDropdown(); ?> 
                                                  </select>
                                                 </td>
                                            </tr>
                                        
                                        </tbody>

                                      </table>
                                        
                                </div>
                            </div>
                            
                        </div>


                        <div class="card mt-2">
                            
                            <div class="card-content">
                                <div class="card-body py-3 form-row" id="dynamic_field">
                                    <table class="display table dataTable  table-bordered">
                                        <thead>
                                            <tr style="background: #c0ccce;">
                                                <th width="2%" style="text-align: center;">SNo</th>
                                                <th width="17%" style="text-align: center;">Order Date</th>
                                                <th width="19%" style="text-align: center;">Vehicle No. </th>
                                                <th width="19%" style="text-align: center;"> Container No. </th>
                                                <th width="33%" style="text-align: center;">GR No. / GR Date / Invoice No. </th>
                                                <th width="10%" style="text-align: center;">SAC </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                          <!-- multi select loop start -->
                                            <tr>
                                                <td class="text-primary">
                                                   1
                                                 </td>
                                                 <td class="text-primary">
                                                   <input style="width: 157px; font-size: 14px;" type="date" placeholder="" class="form-control font-w-600 text-danger" name="orderDate[]"  value="<?php echo date("Y-m-d") ?>">
                                                 </td>
                                                <td class="text-primary" style="">
                                                   <select class="select2 form-control" name="bhid[]" required="" style="">
                                                        <option value="" selected="" disabled="">---select---</option> 
                                                        <?php  echo vehicleDropdown(); ?> 
                                                    </select>
                                                 </td>

                                                 <td class="text-primary">
                                                  <textarea required="" class="form-control font-w-600" name="containerNo[]" id="containerNo" style=" text-align: center;text-transform: uppercase;"></textarea>
                                                 </td>

                                                 <td class="text-primary" style="display: flex;">
                                                  <textarea required="" placeholder="" class="form-control font-w-600" name="otherPartyInvoiceNo[]" style=" text-align: center;text-transform: uppercase;"></textarea>
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="text" placeholder="" class="form-control font-w-600" name="bookingSACNo[]" value="996511" style=" text-align: center;text-transform: uppercase;">
                                                 </td>

                                                 
                                                 
                                            </tr>


                                            
                                          <!-- multi select loop end -->
                                        </tbody>

                                    </table>

                                    <table class="display table dataTable  table-bordered">
                                        <thead>
                                            <tr style="background: #eee;">
                                                <th width="16%" style="text-align: center;"> Bill Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>) </th>
                                                <th width="16%" style="text-align: center;"> Diesel (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>)  </th>
                                                <th width="16%" style="text-align: center;">Toll (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>) </th>
                                                <th width="16%" style="text-align: center;"> Other  (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>)  </th>
                                                <th width="16%" style="text-align: center;"> Total (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>)  </th>
                                                <th width="20%" style="text-align: center;"> Saving Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>) </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-primary">
                                                   <input type="number" placeholder="" class="form-control font-w-600 bookingInvoiceAmt" name="bookingInvoiceAmt[]" id="bookingInvoiceAmt" style=" text-align: center;" onkeyup="expensesSum1();" required="">
                                                 </td>
                                                 <td class="text-primary">
                                                  <input type="number" placeholder="" class="form-control font-w-600 expensesDiesel" name="expensesDiesel[]" id="expensesDiesel" value="0" style="text-align: center;" onkeyup="expensesSum1();">
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="number" placeholder="" class="form-control font-w-600 expensesToll" name="expensesToll[]" id="expensesToll" value="0" style="text-align: center;" onkeyup="expensesSum1();">
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="number" placeholder="" class="form-control font-w-600 expensesOther1" name="expensesOther1[]" id="expensesOther1" value="0" style="text-align: center;" onkeyup="expensesSum1();">
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="number" placeholder="" class="form-control font-w-600 expensesTotal" name="expensesTotal[]" id="expensesTotal" value="0.00" readonly="" style="background: aliceblue;text-align: center;" >
                                                 </td>

                                                 <td class="text-primary" style="display: flex;">
                                                  <input type="number" placeholder="" class="form-control font-w-600 bookingTotalSaving" name="bookingTotalSaving[]" id="bookingTotalSaving" value="0.00" readonly="" style="background: aliceblue;text-align: center;">
                                                   <i name="add" id="add" title="Add more Orders" class="icon-plus align-middle  btn btn-info pull-right " style="margin-left: 2px;"></i>
                                                 </td>
                                                 

                                                 
                                                 
                                            </tr>
                                        
                                        </tbody>


                                        

                                    </table>
                                        
                                </div>
                            </div>
                            
                        </div>


                        

                        <div class="card mt-2">
                          
                            
                            <div class="card-content ">
                                <div class="card-body py-3 form-row">

                                        <div class="form-group col-sm-12 mb-2"> 
                                            <label>Booking Narration :</label>
                                              <textarea rows="3" name="bookingNarration" class="form-control"></textarea>
                                               
                                        </div>

                                        
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group col-sm-12 mt-3" style="text-align: center; margin: 0px;"> 
                            <button onclick="return confirm('Are you sure you want to submit Order Booking?')" type="submit" name="submit" class="btn btn-info saveButton"><i class="fas fa-save"></i> Save</button>  
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
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;
                        
           $('#dynamic_field').append('<div  id="row'+i+'"><table class="display table dataTable table-bordered"><thead><tr style="background: #c0ccce;"><th width="2%" style="text-align: center;">SNo</th><th width="17%" style="text-align: center;">Order Date</th><th width="19%" style="text-align: center;">Vehicle No.</th><th width="19%" style="text-align: center;"> Container No.</th><th width="33%" style="text-align: center;">GR No. / GR Date / Invoice No.</th><th width="10%" style="text-align: center;">SAC</th></tr></thead><tbody><tr><td class="text-primary">'+i+'</td><td class="text-primary"> <input style="width: 157px; font-size: 14px;" type="date" placeholder="" class="form-control font-w-600 text-danger" name="orderDate[]" value="<?php echo date("Y-m-d") ?>"></td><td class="text-primary" style=""> <select class="select2 form-control" name="bhid[]" required="" style=""><option value="" selected="" disabled="">---select---</option> <?php echo vehicleDropdown(); ?> </select></td><td class="text-primary"> <textarea required="" class="form-control font-w-600" name="containerNo[]" id="containerNo" style=" text-align: center;text-transform: uppercase;"></textarea></td><td class="text-primary" style="display: flex;"><textarea required="" placeholder="" class="form-control font-w-600" name="otherPartyInvoiceNo[]" style=" text-align: center;text-transform: uppercase;"></textarea></td><td class="text-primary"> <input type="text" placeholder="" class="form-control font-w-600" name="bookingSACNo[]" value="996511" style=" text-align: center;text-transform: uppercase;"></td></tr></tbody></table><table class="display table dataTable table-bordered"><thead><tr style="background: #eee;"><th width="16%" style="text-align: center;"> Bill Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>)</th><th width="16%" style="text-align: center;"> Diesel (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>)</th><th width="16%" style="text-align: center;">Toll (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>)</th><th width="16%" style="text-align: center;"> Other (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>)</th><th width="16%" style="text-align: center;"> Total (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>)</th><th width="20%" style="text-align: center;"> Saving Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>)</th></tr></thead><tbody><tr><td class="text-primary"> <input type="number" placeholder="" class="form-control font-w-600 bookingInvoiceAmt" name="bookingInvoiceAmt[]" id="bookingInvoiceAmt" style=" text-align: center;" onkeyup="expensesSum1();" required=""></td><td class="text-primary"> <input type="number" placeholder="" class="form-control font-w-600 expensesDiesel" name="expensesDiesel[]" id="expensesDiesel" value="0" style="text-align: center;" onkeyup="expensesSum1();"></td><td class="text-primary"> <input type="number" placeholder="" class="form-control font-w-600 expensesToll" name="expensesToll[]" id="expensesToll" value="0" style="text-align: center;" onkeyup="expensesSum1();"></td><td class="text-primary"> <input type="number" placeholder="" class="form-control font-w-600 expensesOther1" name="expensesOther1[]" id="expensesOther1" value="0" style="text-align: center;" onkeyup="expensesSum1();"></td><td class="text-primary"> <input type="number" placeholder="" class="form-control font-w-600 expensesTotal" name="expensesTotal[]" id="expensesTotal" value="0.00" readonly="" style="background: aliceblue;text-align: center;" ></td><td class="text-primary" style="display: flex;"> <input type="number" placeholder="" class="form-control font-w-600 bookingTotalSaving" name="bookingTotalSaving[]" id="bookingTotalSaving" value="0.00" readonly="" style="background: aliceblue;text-align: center;"> <i name="remove" id="'+i+'" title="Remove this Order?" class="btn_remove icon-minus align-middle  btn btn-danger pull-right " style="margin-left: 2px;"></i></td></tr></tbody></table></div>');



     });
     
     $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id"); 
           var res = confirm('Remove this Order?');
           if(res==true){
           $('#row'+button_id+'').remove();  
           $('#'+button_id+'').remove();  
           }
      });


       
  
    });  
</script>


<script type="text/javascript">
  $(document).on('keyup', 'input', function() {
          inputs = $(this).parents('tr');
          expensesSum1(inputs);
        });

        function expensesSum1(inputs){
          

           var expensesDiesel = inputs.find('.expensesDiesel').val();
           var expensesToll = inputs.find('.expensesToll').val();
           var expensesOther1 = inputs.find('.expensesOther1').val();
           var bookingInvoiceAmt = inputs.find('.bookingInvoiceAmt').val();
          
           var expensesTotal = parseFloat(expensesDiesel) + parseFloat(expensesToll) + parseFloat(expensesOther1);

           inputs.find('.expensesTotal').val(expensesTotal.toFixed(2));

           var bookingTotalSaving = parseFloat(bookingInvoiceAmt) - parseFloat(expensesTotal);
           inputs.find('.item_qty').val(item_qty.toFixed(2));


           var sales_order_total_qty = 0;
   
            $(".item_qty").each(function() { 
              if(!isNaN(this.value) && this.value.length!=0) {
              sales_order_total_qty += parseFloat(this.value);
              }
            });

          $("#sales_order_total_qty").val(sales_order_total_qty.toFixed(2));

           
        } 
</script>




<!-- <script type="text/javascript"> 
function billSum(){  
  var totalBillAmt = 0;
   
  $(".bookingInvoiceAmt").each(function() { 
    if(!isNaN(this.value) && this.value.length!=0) {
    totalBillAmt += parseFloat(this.value);
    }
  });

$("#totalBillAmt").val(totalBillAmt);

} 
</script>  -->




<!-- <script type="text/javascript"> 
function expensesSum(){  
  var expensesTotal = 0;var expensesDiesel = 0;var expensesToll = 0;var expensesOther1 = 0; var bookingTotalSaving = 0; var bookingInvoiceAmt = 0;
   
  $(".expenses").each(function() { 
    if(!isNaN(this.value) && this.value.length!=0) {
    expensesTotal += parseFloat(this.value);
    }
  });

$("#expensesTotal").val(expensesTotal.toFixed(2));

var bookingInvoiceAmt = $('#bookingInvoiceAmt').val();

var bookingTotalSaving = parseFloat(bookingInvoiceAmt) - parseFloat(expensesTotal);
$("#bookingTotalSaving").val(bookingTotalSaving.toFixed(2));


        if (bookingInvoiceAmt > 0) {
            $('.saveButton').attr('disabled', false);
            $('.saveButton').attr('title', 'click here to Submit');
        } 
        

} 
</script> -->

