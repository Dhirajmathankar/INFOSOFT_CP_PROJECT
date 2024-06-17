
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
                                    

                                        <div class="form-group col-sm-4 mb-2"> 
                                            <label for="dt"> Booking Date:</label> 
                                            <input type="date" required="" value="<?php echo date("Y-m-d") ?>" class="form-control text-danger font-w-600" name="bookingDate" style="background: aliceblue;">
                                        </div>

                                        <div class="form-group col-sm-8 mb-2">
                                          <div class="form-group">
                                            <label>Customer Name:</label>
                                             <select class="select2 form-control" name="cuid" required="">
                                                <option value="" selected="" disabled="">---select---</option> 
                                                <?php  echo customerDropdown(); ?> 
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>Booking Packages:</label>
                                             <input type="text" placeholder="" class="form-control" name="bookingPackages" style="text-transform: capitalize;">
                                          </div>
                                        </div>

                                        


                                        <div class="form-group col-sm-8 mb-2">
                                          <div class="form-group">
                                            <label>Booking Through:</label>
                                             <select class="select2 form-control" name="brid" required="">
                                                <option value="" selected="" disabled="">---select---</option> 
                                                <?php  echo brokerDropdown(); ?> 
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
                                            <tr style="background: #eee;">
                                                <th width="17%" style="text-align: center;">Vehicle Nos. </th>
                                                <th width="17%" style="text-align: center;"> Container Nos. </th>
                                                <th width="11%" style="text-align: center;">GR Nos.</th>
                                                <th width="10%" style="text-align: center;"> GR Date  </th>
                                                <th width="18%" style="text-align: center;">Invoice Nos. </th>
                                                <th width="10%" style="text-align: center;">SAC </th>
                                                <th width="17%" style="text-align: center;">Bill Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>) </th>
                                            </tr>
                                        </thead>
                                        <tbody id="dynamic_field">

                                          <!-- multi select loop start -->
                                            <tr>
                                                <td class="text-primary" style="font-size: 14px;">
                                                   <select class="select2 form-control" name="bhid[]" required="" style="">
                                                        <option value="" selected="" disabled="">---select---</option> 
                                                        <?php  echo vehicleDropdown(); ?> 
                                                    </select>
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="text" placeholder="" class="form-control font-w-600" name="containerNo[]" id="containerNo" style="font-size: 14px; text-align: center;text-transform: uppercase;">
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="text" placeholder="" class="form-control font-w-600" name="lrGrNo[]" style="font-size: 14px; text-align: center;text-transform: uppercase;">
                                                 </td>

                                                 <td class="text-primary">
                                                   <input style="font-size: 14px;width: 155px; " type="date" placeholder="" class="form-control font-w-600" name="lrGrDate[]"  value="<?php echo date("Y-m-d") ?>">
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="text" placeholder="" class="form-control font-w-600" name="otherPartyInvoiceNo[]" style="font-size: 14px; text-align: center;text-transform: uppercase;">
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="text" placeholder="" class="form-control font-w-600" name="bookingSACNo[]" value="996511" style="font-size: 14px; text-align: center;text-transform: uppercase;">
                                                 </td>

                                                 <td class="text-primary" style="display: flex;">
                                                  <input type="number" placeholder="" class="form-control font-w-600 bookingInvoiceAmt1" name="bookingInvoiceAmt[]" id="bookingInvoiceAmt" style="font-size: 14px; text-align: center;" onkeyup="billSum();" required="">
                                                  <!-- <i name="add" id="add" title="Add more rows" class="icon-plus align-middle  btn btn-info pull-right " style="margin-left: 2px;"></i> -->
                                                 </td>

                                                 
                                                 
                                            </tr>


                                            <tr>
                                                 <td width="100%" colspan="7" class="text-primary" style="text-align: right;">
                                                  
                                                  <i name="add" id="add" title="Add more rows" class="icon-plus align-middle  btn btn-info pull-right " style="margin-left: 2px;"></i>
                                                 </td>

                                                 
                                                 
                                            </tr>
                                          <!-- multi select loop end -->
                                        </tbody>

                                    </table>
                                        
                                </div>
                            </div>
                            
                        </div>


                        <div class="card mt-2">
                          
                            
                            <div class="card-content ">
                                <div class="card-body py-3 form-row">
                                    
                                      <table class="display table dataTable  table-bordered">
                                        <thead>
                                            <tr style="background: #eee;">
                                                
                                                <th width="16%" style="text-align: center;"> Diesel (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>)  </th>
                                                <th width="16%" style="text-align: center;">Toll (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>) </th>
                                                <th width="16%" style="text-align: center;"> Other  (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>)  </th>
                                                <th width="16%" style="text-align: center;"> Total (Expenses) (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>)  </th>
                                                <th width="16%" style="text-align: center;">Total Saving (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>) </th>
                                                <th width="20%" style="text-align: center;">Total Bill Amount (<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>) </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                

                                                 <td class="text-primary">
                                                  <input type="number" placeholder="" class="form-control" name="expensesDiesel" id="expensesDiesel" style="text-align: center;" onkeyup="billSum();">
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="number" placeholder="" class="form-control" name="expensesToll" id="expensesToll" style="text-align: center;" onkeyup="billSum();">
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="number" placeholder="" class="form-control" name="expensesOther1" id="expensesOther1" style="text-align: center;" onkeyup="billSum();">
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="number" placeholder="" class="form-control font-w-600" name="expensesTotal" id="expensesTotal" readonly="" style="background: aliceblue;text-align: center;" >
                                                 </td>

                                                 <td class="text-primary">
                                                  <input type="number" placeholder="" class="form-control font-w-600" name="bookingTotalSaving" id="bookingTotalSaving" readonly="" style="background: aliceblue;text-align: center;">
                                                 </td>
                                                 <td class="text-primary">
                                                   <input type="number" placeholder="" class="form-control font-w-600" name="totalBillAmt" id="totalBillAmt" required="" style="background: aliceblue;text-align: center;">
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
                            <button onclick="return confirm('Are you sure you want to submit Order Booking?')" title="Save" type="submit" name="submit" class="btn btn-info"><i class="fas fa-save"></i> Save</button>  
                        </div>
                             
                        </form> 
                    </div>
                    
                </div>
                <!-- END: Card DATA-->
            </div>
           
        </main>
        <!-- END: Content-->
        <!-- Modal -->
        




<!-- <script type="text/javascript">


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

</script>  --> 




<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;             
           $('#dynamic_field').append('<tr id="row'+i+'"><td class="text-primary" style="font-size: 14px;"><select class="select2 form-control" name="bhid[]" required="" style=""><option value="" selected="" disabled="">---select---</option><?php  echo vehicleDropdown(); ?></select></td><td class="text-primary"><input type="text" placeholder="" class="form-control font-w-600" name="containerNo[]" id="containerNo" style="font-size: 14px; text-align: center;text-transform: uppercase;"></td><td class="text-primary"><input type="text" placeholder="" class="form-control font-w-600" name="lrGrNo[]" style="font-size: 14px; text-align: center;text-transform: uppercase;"></td><td class="text-primary"><input style="font-size: 14px;width: 153px; " type="date" placeholder="" class="form-control font-w-600" name="lrGrDate[]"  value="<?php echo date("Y-m-d") ?>"></td><td class="text-primary"><input type="text" placeholder="" class="form-control font-w-600" name="otherPartyInvoiceNo[]" style="font-size: 14px; text-align: center;text-transform: uppercase;"></td><td class="text-primary"><input type="text" placeholder="" class="form-control font-w-600" name="bookingSACNo[]" value="996511" style="font-size: 14px; text-align: center;text-transform: uppercase;"></td><td class="text-primary" style="display: flex;"><input type="number" placeholder="" class="form-control font-w-600 bookingInvoiceAmt1" name="bookingInvoiceAmt[]" onkeyup="billSum();" style="font-size: 14px; text-align: center;" required=""> <i name="remove" id="'+i+'" title="Remove this row" class="btn_remove icon-minus align-middle  btn btn-danger pull-right " style="margin-left: 2px;"></i></td></tr>');
     });
     
     $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id"); 
           var res = confirm('Remove this row?');
           if(res==true){
           $('#row'+button_id+'').remove();  
           $('#'+button_id+'').remove();  
           }
      });  
  
    });  
</script>




<script type="text/javascript"> 
function billSum(){  
  var totalBillAmt = 0;
   
  $(".bookingInvoiceAmt1").each(function() { 
    if(!isNaN(this.value) && this.value.length!=0) {
    totalBillAmt += parseFloat(this.value);
    }
  });

$("#totalBillAmt").val(totalBillAmt);

} 
</script>

