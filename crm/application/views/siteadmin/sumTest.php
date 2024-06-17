<table id="myTable" width="200">
<thead>
  <tr>
    <th>Item</th>
    <th>Qty</th>
    <th>Rate</th>
    <th>Tax</th>
    <th>Amount</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td><input type="text" name="item[]" class="item"></td>
    <td><input type="number" name="qty[]" class="qty" onkeyup="calc()"></td>
    <td><input type="number" name="rate[]" class="rate"></td>
    <td><input type="number" name="tax[]" class="tax"></td>
    <td><input type="number" name="amount[]" class="amount" readonly></td>
    <td><input type="button" value="Delete" class="delete-row btn btn-danger"/></td>
  </tr>
  <tr>
    <td><input type="text" name="item[]" class="item"></td>
    <td><input type="number" name="qty[]" class="qty" onkeyup="calc()"></td>
    <td><input type="number" name="rate[]" class="rate"></td>
    <td><input type="number" name="tax[]" class="tax"></td>
    <td><input type="number" name="amount[]" class="amount" readonly></td>
    <td><input type="button" value="Delete" class="delete-row btn btn-danger"/></td>
  </tr>
  </tbody>
</table>

// https://jsfiddle.net/tnv73mL4/

<!-- 1st -->
<script type="text/javascript">
  var myTable = $("#myTable");

$(document).on('click', '.delete-row', function() {
  $(this).parents('tr').remove();
});

$(document).on('keyup', 'input', function() {
  inputs = $(this).parents('tr');
  calc(inputs);
});

function calc(inputs){
   var qty = inputs.find('.qty').val();
   var rate = inputs.find('.rate').val();
   var tax = inputs.find('.tax').val();
   var mul = qty * rate;
   var tax = mul*(tax/100);
   var result = rate + tax;

   inputs.find('.amount').val(result);
}
</script>





<script type="text/javascript"> 
function mytotal(){  
  var gstApplicable = 0;var gstAmt = 0;
  var grossAmt = $('#grossAmt').val();
  var netAmt = $('#netAmt').val();
  var otherChargeINR = 0; var otherChargeINR1 = 0; var otherChargeINR2 = 0;
  var otherDeductionINR = 0; var otherDeductionINR1 = 0; var otherDeductionINR2 = 0;

   
  $(".extraCharges").each(function() { 
    if(!isNaN(this.value) && this.value.length!=0) {
    extraTotal += parseFloat(this.value);
    }
  });

  $(".deductionCharges").each(function() { 
    if(!isNaN(this.value) && this.value.length!=0) {
    deductionTotal += parseFloat(this.value);
    }
  });

$("#extraTotal").val(extraTotal.toFixed(2));
$("#deductionTotal").val(deductionTotal.toFixed(2));


 grossAmt += parseFloat(extraTotal);
 netAmt -= parseFloat(deductionTotal);


  gstAmt =  (netAmt * (gstApplicable/100));
  
  $('#gstAmt').val(gstAmt.toFixed(2));
    
  $("#grossAmt").val(grossAmt.toFixed(2));
  $("#netAmt").val(netAmt.toFixed(2));

        

} 
</script>




<!-- 2nd -->
<script type="text/javascript"> 
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
</script>


<!-- https://web.archive.org/web/20160329121000/https://ellislab.com/codeigniter/user-guide/database/active_record.html -->