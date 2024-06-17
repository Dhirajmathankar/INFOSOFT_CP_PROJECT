<style type="text/css">
     /* Adding some Css For good Looks*/
  span.error {
      display:block;
      visibility:hidden;
      color:red;
      font-size:90%;
  }
  /* Css For Table*/
  .container td {
      vertical-align:top;
  }
  .tablecontainer table {
      width:100%;
      border-collapse:collapse;
      /*border-top:1px solid red;
      border-right:1px solid red;*/
  }
  .tablecontainer th {
      border-bottom:2px solid red ! important;
  }
  .tablecontainer th, .tablecontainer td {
      text-align:center;
      font-size: 14px;
      color: var(--primarycolor) !important;
      /*border-left:1px solid red;*/
      padding : 5px;
      /*border-bottom: 1px solid red;*/
  }
  .ui.widget {
      font-size: 14px !important;
  }
</style>
<link rel="stylesheet" href="dist/vendors/bootstrap4-toggle/css/bootstrap4-toggle.min.css" />
<!--table row add item -->
        <!-- http://code.jquery.com/jquery-1.10.2.js -->
<script src="<?php echo base_url()."dist/"; ?>js/jquery-1.10.2.js"></script> 
<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Generate Bill</h4></div>

                    <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color:green;">
                        <?php if($this->session->flashdata('msg')!="") {?>  
                            <?php echo $this->session->flashdata('msg');?>
                          <?php } ?> </h6>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Generate Bill</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->
        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 col-lg-12 mt-1">
                <button title="Back" class="btn btn-danger mb-1"><i class="fas fa-arrow-left"></i><a href="<?php echo base_url()."superadmindashbord/manage_bill"; ?>" style="color: #fff;"> Back</a></button>

                <form class="" action="<?php echo base_url()."superadmindashbord/billSubmit"; ?>" method="post" enctype="multipart/form-data">

                <p><span style="font-size: 10px; color: Red;">Fields marked with * are mandatory</span></p>

                <div class="card mt-2">
                    <div class="card-header" style="background-color: #FD806D;">                               
                        <h4 class="card-title" style="color: #fff;">1. Party Detail</h4>                                
                    </div>
                   <div class="card-content ">
                        <div class="card-body py-3 form-row">
                          <div class="form-group col-md-12 mb-2">
                            <div class="form-group">
                                <input type="radio" checked="checked" value="no" name="paymentType" /> Credit
                                <input type="radio" value="yes" name="paymentType" /> Cash 
                                <table class="display table dataTable  table-bordered">
                                <tr>
                                    <th width="15%" class="text-primary">
                                     Customer Name: <span><font color="red">*</font></span>
                                    </th>

                                    <td width="55%" class="skin skin-flat">
                                    <select class="select2 form-control" name="cid" required="" id="cid" onchange="showcustomer(this.value);">
                                       <option value="" selected="" disabled="">---select---</option> 
                                        <?php echo customerDropdown(); ?> 
                                    </select>
                                    </td>
                                    <td width="5%">
                                        <a href="#" style="padding: 8px 12px;" class="btn btn-sm btn-outline-danger showCta" data-toggle="modal" data-target="#newcustomer">
                                            <i class="icon-pencil"></i> 
                                        </a>
                                    </td>
                                    <th width="10%" class="text-primary">
                                    Date: <span><font color="red">*</font></span> 
                                    </th>

                                    <td width="15%" class="text-primary">
                                      <input title="Booking Date" type="date" required="" value="<?php echo date("Y-m-d") ?>" class="form-control text-danger font-w-600" name="bookingDate" style="background: #ffe9cb;">
                                    </td> 
                                </tr>

                                <tr>
                                    <th width="15%" class="text-primary">
                                     Narration: 
                                    </th>

                                    <td width="60%"  colspan="2" class="text-primary">
                                      <input type="text" name="narration"  class="form-control">
                                    </td>
                                    <th width="10%" class="text-primary">
                                    GST No:
                                    </th>

                                    <td width="15%" class="text-primary">
                                      <input type="text" name="customerGSTNo" id="customerGSTNo" class="form-control">
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <th colspan="3"></th>
                                    <th width="10%" class="text-primary">
                                    Party Type:
                                    </th>
                                    <td width="15%" class="text-primary">
                                      <input type="text" name="partyType" id="partyType" class="form-control">
                                    </td>
                                </tr> -->
                                </table>
                            </div>
                          </div>   
                        </div>
                    </div>
                </div>
                
                <div class="card mt-2">
                    <div class="card-header" style="background-color: #FD806D;">                               
                        <h4 class="card-title" style="color: #fff;">2. Purchase Order Detail</h4>                                
                    </div>
                    <div class="card-content ">
                        <div class="card-body py-3 form-row">
                          <div class="form-group col-md-12 mb-2">
                            <div class="form-group">
                              <div class="Details display table dataTable  table-bordered">
<table width="100%">
    <thead>
        <tr style="background: #FFC371;">
        <th width="15%" style="text-align: center;">Item Name: </th>
        <th width="8%" style="text-align: center;"> Qty. </th>
        <th width="10%" style="text-align: center;">Unit </th>
        <th width="14%" style="text-align: center;">Price (in Rs)</th>
        <th width="8%" style="text-align: center;">CGST %</th>
        <th width="11%" style="text-align: center;">CGST Amount</th>
        <th width="8%" style="text-align: center;">SGST %</th>
        <th width="11%" style="text-align: center;">SGST Amount</th>
        <th width="15%" style="text-align: center;">Total Amount (in Rs)</th>
    </tr>
    </thead>
    <tbody > 
        <tr>
            <td class="text-primary" style="">
               <select class="select2 form-control" name="pid[]" id="pid" onchange="showItemDetails(this.value);">
                <option value="" selected="" disabled="">---select---</option>
                <?php echo productDropdown(); ?>
                </select>
            </td>

            <td class="text-primary">
              <input type="number" class="form-control font-w-600 qty" onkeyup="expensesSum1();" name="qty[]" id="qty" style="text-transform: uppercase;text-align: right;">
            </td>
            <td class="text-primary">
              <input type="text" class="form-control font-w-600 unit" name="unit[]" id="unit">
            </td>
            <td class="text-primary">
                <input type="text" placeholder="" class="form-control font-w-600 price"  name="price[]" onkeyup="expensesSum1();" id="price" style="text-align: right;">
            </td>
            <td class="text-primary">
                <input type="text" class="form-control font-w-600 cgst" onkeyup="expensesSum1();" name="cgst[]" id="cgst">
            </td>
            
            <td class="text-primary">
              <input type="text" placeholder="" class="form-control font-w-600 cgstamount" name="cgstamount[]" onkeyup="expensesSum1();" style="text-align: right;" id="cgstamount" value="0.00">
            </td>
            <td class="text-primary">
                <input type="text" class="form-control font-w-600 sgst" onkeyup="expensesSum1();" name="sgst[]" id="sgst">
            </td>
            
            <td class="text-primary">
              <input type="text" placeholder="" class="form-control font-w-600 sgstamount" name="sgstamount[]" onkeyup="expensesSum1();" style="text-align: right;" id="sgstamount" value="0.00">
            </td>
            <td class="text-primary" style="display: flex;">
              <input type="number" placeholder="" class="form-control font-w-600 total" name="total[]" onkeyup="expensesSum1();" id="total" value="0.00" readonly="" style="background: #ffe9cb;text-align: right;">
               <i name="add" id="add" title="Add more Orders" class="icon-plus align-middle  btn btn-info pull-right " style="margin-left: 2px;"></i>
            </td>
        </tr>
    </tbody> 
    <tbody>
        <tr>
            <th class="text-primary" style="text-align: right;font-size: 18px;"> </th>
            <td class="text-primary">
              <input type="number" class="form-control font-w-600 qtyTotal" name="qtyTotal" onkeyup="expensesSum1();" id="qtyTotal" value="0" readonly="" style="background: #ffe9cb;text-align: right;">
            </td>
            <td></td>
            <td class="text-primary">
              <input type="number" class="form-control font-w-600 itemTotal" name="itemTotal" onkeyup="expensesSum1();" id="itemTotal" value="0.00" readonly="" style="background: #ffe9cb;text-align: right;">
            </td>
            <td></td>
            <td class="text-primary">
              <input type="number" class="form-control font-w-600 cgstTotal" name="cgstTotal" onkeyup="expensesSum1();" id="cgstTotal" value="0.00" readonly="" style="background: #ffe9cb;text-align: center;">
            </td>
            <td></td>
            <td class="text-primary">
              <input type="number" class="form-control font-w-600 sgstTotal" name="sgstTotal" onkeyup="expensesSum1();" id="sgstTotal" value="0.00" readonly="" style="background: #ffe9cb;text-align: center;">
            </td>
            <td class="text-primary">
              <input type="number" class="form-control font-w-600 fullTotal" name="fullTotal" onkeyup="expensesSum1();" id="fullTotal" value="0.00" readonly="" style="background: #ffe9cb;text-align: center;">
            </td>
        </tr>
        <tr>
            <th colspan="8" class="text-primary" style="text-align: right;font-size: 18px;">Taxable Amount: </th>
            <td class="text-primary">
              <input type="number" class="form-control font-w-600 taxableTotal" name="taxableTotal" onkeyup="expensesSum1();" id="taxableTotal" value="0.00" readonly="" style="background: #ffe9cb;text-align: center;">
            </td>
        </tr>
        <tr>
            <th colspan="8" class="text-primary" style="text-align: right;font-size: 18px;">Total GST Amount: </th>
            <td class="text-primary">
              <input type="number" class="form-control font-w-600 gstTotal" name="gstTotal" onkeyup="expensesSum1();" id="gstTotal" value="0.00" readonly="" style="background: #ffe9cb;text-align: center;">
            </td>
        </tr>
        <tr>
            <th colspan="8" class="text-primary" style="text-align: right;font-size: 18px;"> Total Amount: </th>
            <td class="text-primary">
              <input type="number" class="form-control font-w-600 totalAmount" name="totalAmount" onkeyup="expensesSum1();" id="totalAmount" value="0.00" readonly="" style="background: #ffe9cb;text-align: center;">
            </td>
        </tr>
    </tbody>   
</table>
                            </div>
                          </div>   
                        </div>
                    </div>
                </div>

                <table class="display table dataTable  table-bordered">
                    <tr>
                       <td  width="100%" class="text-primary" style="text-align: center;">
                         <button onclick="return confirm('Are you sure you want to submit Bill?')" title="Submit" type="submit" name="submit" class="btn btn-warning mt-2 mb-2"><i class="fas fa-save"></i> Submit</button>
                       </td>
                    </tr>
                </table>
                </form> 
            </div>
        </div>
        <!-- END: Card DATA-->
    </div>
</main>
<!-- Add New Customer -->
<div class="modal fade" id="newcustomer">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus"></i> Add Contact
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="icon-close"></i>
                </button>
            </div>
            <form class="add-contact-form" action="<?php echo base_url()."superadmindashbord/newCustomerSubmit"; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-name">
                                <label for="contact-name" class="col-form-label">Name:</label>
                                <input type="text" name="customerName" class="form-control" required="" >                        
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-email">
                                <label for="contact-email" class="col-form-label">Address:</label>
                                <input type="text" name="customerAddress" class="form-control">   
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-email">
                                <label for="contact-email" class="col-form-label">City:</label>
                                <input type="text" name="customerCity" class="form-control">   
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-occupation">
                                <label for="contact-occupation" class="col-form-label">Mobile No.</label>
                                <input type="text" name="customerMobileNo" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="contact-phone">
                                <label for="contact-phone" class="col-form-label">Alt Mobile No.</label>
                                <input type="text" name="customerMobileNo1" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-phone">
                                <label for="contact-phone" class="col-form-label">Adhaar Card No.</label>
                                <input type="text" name="customerAdhaarNo" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-phone">
                                <label for="contact-phone" class="col-form-label">PAN Card No.</label>
                                <input type="text" name="customerPANNo" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger mb-1">Add New Customer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END: Content-->
<script type="text/javascript">
function showcustomer(cid){  
$.ajax({
    dataType: "html",
    url:"<?php echo base_url()."superadmindashbord/show_customer"; ?>",
    data: "cid="+cid, 
    type : "POST",
    success: function(result){  
    var obj = jQuery.parseJSON(result);
    $("#customerGSTNo").val(obj.customerGSTNo);
    $("#partyType").val(obj.partyType);
    }   
  });
}
</script> 
<script type="text/javascript">
  function showItemDetails(pid){  
 $.ajax({
    dataType: "html",
 url:"<?php echo base_url()."superadmindashbord/show_Item_Details"; ?>",
    data: "pid="+pid, 
    type : "POST",
    success: function(result){  
    var obj = jQuery.parseJSON(result);
    $("#unit").val(obj.unit);
    $("#price").val(obj.price);
    $("#sgst").val(obj.sgst);
    $("#cgst").val(obj.cgst)
    }
  });
}
</script>

<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;
                        
           $('#dynamic_field').prepend(`<tr id="row`+i+`">
            <td class="text-primary" id="row`+i+`">
               <select class="select2 form-control" name="pid[]" id="pid" onchange='showItemDetails(this.value);'>
                <option value="" selected="" disabled="">---select---</option>
                <?php echo productDropdown(); ?>
                </select>
                <input type="hidden" name="rowdata" id="rowdata`+i+`" style=" text-align: center;text-transform: uppercase;">
            </td>

            <td class="text-primary">
              <input type="number" class="form-control font-w-600 qty" onkeyup="expensesSum1();" name="qty[]" id="qty" style=" text-align: center;text-transform: uppercase;">
            </td>
            <td class="text-primary">
              <input type="text" class="form-control font-w-600 unit" name="unit[]" id="unit">
            </td>
            <td class="text-primary">
                <input type="text" placeholder="" class="form-control font-w-600 price"  name="price[]" onkeyup="expensesSum1();" id="price" style="text-align: right;">
            </td>
            <td class="text-primary">
                <input type="text" class="form-control font-w-600 cgst" onkeyup="expensesSum1();" name="cgst[]" id="cgst">
            </td>
            
            <td class="text-primary">
              <input type="text" placeholder="" class="form-control font-w-600 cgstamount" name="cgstamount[]" onkeyup="expensesSum1();" style="text-align: right;" id="cgstamount" value="0.00">
            </td>
            <td class="text-primary">
                <input type="text" class="form-control font-w-600 sgst" onkeyup="expensesSum1();" name="sgst[]" id="sgst">
            </td>
            
            <td class="text-primary">
              <input type="text" placeholder="" class="form-control font-w-600 sgstamount" name="sgstamount[]" onkeyup="expensesSum1();" style="text-align: right;" id="sgstamount" value="0.00">
            </td>
            <td class="text-primary" style="display: flex;">
              <input type="number" placeholder="" class="form-control font-w-600 total" name="total[]" onkeyup="expensesSum1();" id="total" value="0.00" readonly="" style="background: #ffe9cb;text-align: right;">
               <i name="remove" id="`+i+`" title="Remove this Order?" class="btn_remove icon-minus align-middle  btn btn-danger pull-right " style="margin-left: 2px;"></i>
            </td></tr>`);
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
   var qty = inputs.find('.qty').val();
   var sgst = inputs.find('.sgst').val();
   var cgst = inputs.find('.cgst').val();
   var price = inputs.find('.price').val();
   
   var sum = parseFloat(price) * parseFloat(qty);
  
   var cgstamount = (sum*(cgst/100));

   inputs.find('.cgstamount').val(cgstamount.toFixed(2));

   var sgstamount = (sum*(sgst/100));

   inputs.find('.sgstamount').val(sgstamount.toFixed(2));

   var total = parseFloat(sum) + parseFloat(cgstamount) + parseFloat(sgstamount);
   inputs.find('.total').val(total.toFixed(0));

   var qty = inputs.find('.qty').val();

    var qtyTotal = 0;
    $('.qty').each(function() { 
      if(!isNaN(this.value) && this.value.length!=0) {
      qtyTotal += parseFloat(this.value);
      }
    });

    $("#qtyTotal").val(qtyTotal); //total qty show
    
    var price = inputs.find('.price').val();
    var itemTotal = 0;
    $('.price').each(function() { 
      if(!isNaN(this.value) && this.value.length!=0) {
      itemTotal += parseFloat(this.value);
      }
    });

    $("#itemTotal").val(itemTotal);//total price show


    var cgstamount = inputs.find('.cgstamount').val();
    var cgstTotal = 0;
    $('.cgstamount').each(function() { 
      if(!isNaN(this.value) && this.value.length!=0) {
      cgstTotal += parseFloat(this.value);
      }
    });

    $("#cgstTotal").val(cgstTotal);//total cgst show

    var sgstamount = inputs.find('.sgstamount').val();
    var sgstTotal = 0;
    $('.sgstamount').each(function() { 
      if(!isNaN(this.value) && this.value.length!=0) {
      sgstTotal += parseFloat(this.value);
      }
    });

    $("#sgstTotal").val(sgstTotal);//total sgst show

    var total = inputs.find('.total').val();
    var fullTotal = 0;
    $('.total').each(function() { 
      if(!isNaN(this.value) && this.value.length!=0) {
      fullTotal += parseFloat(this.value);
      }
    });

    $("#fullTotal").val(fullTotal);//total sgst show

    var gstTotal = parseFloat(sgstTotal) + parseFloat(cgstTotal);
    $("#gstTotal").val(gstTotal);

    var taxableTotal = parseFloat(fullTotal) - parseFloat(gstTotal);
    $("#taxableTotal").val(taxableTotal);

    var totalAmount = parseFloat(taxableTotal) + parseFloat(gstTotal);
    $("#totalAmount").val(totalAmount);
}
</script>
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var demovalue = $(this).val(); 
        $("div.myDiv").hide();
        $("#show"+demovalue).show();
    });
});
</script>
<script type="text/javascript">
$('input[type="radio"]').change(function(){
    if (this.checked){
        $('.showCta').toggle(this.value === 'yes');
        if(this.value === 'yes'){
            $("#partyType").val("Party Cash");
        }else{
            $("#partyType").val("");
        }
    }
}).change();

</script>