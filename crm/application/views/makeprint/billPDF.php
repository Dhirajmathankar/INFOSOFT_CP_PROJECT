<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
   <head>
      <title>BILL PDF</title>
   </head>
   <body>
      <div style="padding:0px 5px 5px 0px;">
           <table role="presentation" border="0" cellpadding="5" cellspacing="0" width="100%" style=" ">
            <tr> 
               <td width="100%" style="border-right: 1px solid #000;border-top: 1px solid #000;text-align: center;border-left: 1px solid #000;">
                  
                  <span style=" font-size: 15px; font-weight: bold; color: #000;">TAX INVOICE</span><br>
                  <span style=" font-size: 22px; font-weight: 500; color: #000;">SHRI SAI INDUSTRIES</span><br>
                  <span style=" font-size: 13px;  font-weight: 500; color: #000;">NEAR Industrial Area Kosmi, Betul 460001</span><br><span style="font-size: 13px;  font-weight: 500; color: #000; text-align: center;"> GSTIN: 23A SEPB1610K1ZE</span><br>
                  <span style=" font-size: 13px;  font-weight: 500; color: #000;">Tel.: 9827226914, 9981811991 Email: shrisaiindustriesbetul@gamil.com</span><br>                        
               </td>
            </tr>
         </table>
         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style=" border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height: 18.5px;">
           <tr>
               <td width="50%" style="color: #000; font-size: 12px; border-right: 1px solid #000; text-align: left;">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="line-height: 15.5px;">
                     <tr>
                        <td width="33%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px;  text-align: left;">
                           Invoice No. :
                        </td>
                        <td colspan="2" width="77%" style="color: #000; font-size: 12px; padding: 5px 0px 5px 2px;  text-align: left;">
                           <?php echo $row->billid; ?>
                        </td>
                     </tr>
                     <tr>
                        <td width="33%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px;  text-align: left;">
                           Dated. :
                        </td>
                        <td colspan="2" width="77%" style="color: #000; font-size: 12px; padding: 5px 0px 5px 2px;  text-align: left;">
                           <?php echo $row->createdDate; ?>
                        </td>
                     </tr>
                     <tr>
                        <td width="33%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px;  text-align: left;">
                           Place of Supply. :
                        </td>
                        <td colspan="2" width="77%" style="color: #000; font-size: 12px; padding: 5px 0px 5px 2px;  text-align: left;">
                           <?php echo $fetch[0]->customerCity; ?>
                        </td>
                     </tr>
                  </table>
               </td>
               <td width="50%" style="color: #000; font-size: 12px; border-right: 1px solid #000; text-align: left;">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="line-height: 15.5px;">
                     <tr>
                        <td width="33%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px;  text-align: left;">
                           Reverse Charge. :
                        </td>
                        <td colspan="2" width="77%" style="color: #000; font-size: 12px; padding: 5px 0px 5px 2px;  text-align: left;">
                           P.O. No. :
                        </td>
                     </tr>
                     <tr>
                        <td width="33%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px;  text-align: left;">
                           P.O.DATE :
                        </td>
                        <td colspan="2" width="77%" style="color: #000; font-size: 12px; padding: 5px 0px 5px 2px;  text-align: left;">
                           
                        </td>
                     </tr>
                     <tr>
                        <td width="33%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px;  text-align: left;">
                           Place of Supply. :
                        </td>
                        <td colspan="2" width="77%" style="color: #000; font-size: 12px; padding: 5px 0px 5px 2px;  text-align: left;">
                           <?php echo $fetch[0]->customerCity; ?>
                        </td>
                     </tr>
                  </table>
               </td> 
            </tr>
         </table>
         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style=" border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height: 18.5px;">
           <tr>
               <td width="50%" style="color: #000; font-size: 12px; border-right: 1px solid #000; text-align: left;">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="line-height: 15.5px;">
                     <tr>
                        <td width="100%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 5px 5px 2px;  text-align: left;"><br>
                           Billed to. :
                        </td>
                     </tr>
                     <tr>
                        <td  width="100%" style="color: #000; font-size: 12px; padding: 5px 0px 5px 2px;  text-align: left;">
                           <?php echo $fetch[0]->customerName; ?><br>
                           <?php echo $fetch[0]->customerAddress; ?><br>
                           <?php echo $fetch[0]->customerCity; ?> , 
                           <?php echo $fetch[0]->customerState; ?> ,
                           <?php echo $fetch[0]->customerPINCode; ?>
                        </td>
                     </tr>
                     <tr>
                        <td width="33%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px;  text-align: left;">
                           Party Mobile No. :
                        </td>
                        <td colspan="2" width="77%" style="color: #000; font-size: 12px; padding: 5px 0px 5px 2px;  text-align: left;">
                           <?php echo $fetch[0]->customerMobileNo; ?>
                        </td>
                     </tr>
                     <tr>
                        <td width="33%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px;  text-align: left;">
                           GSTIN / UIN. : 
                        </td>
                        <td colspan="2" width="77%" style="color: #000; font-size: 12px; padding: 5px 0px 5px 2px;  text-align: left;">
                           <?php echo $fetch[0]->customerGSTNo; ?>
                        </td>
                     </tr>
                  </table>
               </td>
               <td width="50%" style="color: #000; font-size: 12px; border-right: 1px solid #000; text-align: left;">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="line-height: 15.5px;">
                     <tr>
                        <td width="100%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 5px 5px 2px;  text-align: left;"><br>
                           Shipped to. :
                        </td>
                     </tr>
                     <tr>
                        <td  width="100%" style="color: #000; font-size: 12px; padding: 5px 0px 5px 2px;  text-align: left;">
                           <?php echo $fetch[0]->customerName; ?><br>
                           <?php echo $fetch[0]->customerAddress; ?><br>
                           <?php echo $fetch[0]->customerCity; ?> , 
                           <?php echo $fetch[0]->customerState; ?> ,
                           <?php echo $fetch[0]->customerPINCode; ?>
                        </td>
                     </tr>
                     <tr>
                        <td width="33%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px;  text-align: left;">
                           Party Mobile No. :
                        </td>
                        <td colspan="2" width="77%" style="color: #000; font-size: 12px; padding: 5px 0px 5px 2px;  text-align: left;">
                           <?php echo $fetch[0]->customerMobileNo; ?>
                        </td>
                        <tr>
                        <td width="33%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px;  text-align: left;">
                           GSTIN / UIN. :
                        </td>
                        <td colspan="2" width="77%" style="color: #000; font-size: 12px; padding: 5px 0px 5px 2px;  text-align: left;">
                           <?php echo $fetch[0]->customerGSTNo; ?>
                        </td>
                     </tr>
                     </tr>
                  </table>
               </td> 
            </tr>
         </table>

         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style=" border-left:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;line-height: 22.5px;">
            
            <tr>
               <td width="5%" style="color: #000; font-size: 12px; border-right: 1px solid #000;border-bottom:1px solid #000; text-align: center;padding: 5px 0px 5px 2px;">
                 <span style="font-weight: bold;">S.No.&nbsp;</span>
               </td>
               <td width="27%" style="color: #000; font-size: 12px; border-right: 1px solid #000;border-bottom:1px solid #000; text-align: left;padding: 5px 0px 5px 2px;">
                  <span style="font-weight: bold;">Description of Goods</span>
               </td> 
               <td width="8%" style="color: #000; font-size: 10px; border-right: 1px solid #000;border-bottom:1px solid #000; text-align: left;padding: 5px 0px 5px 2px;">
                  <span style="font-weight: bold;">HSN/SAC <br>Code</span>
               </td>
               <td width="6%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000; border-bottom:1px solid #000;text-align: center;">
                  <span style="font-weight: bold;text-align: center;">Qty</span>
               </td>
               
               <td width="6%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;text-align: center;border-bottom:1px solid #000;border-right: 1px solid #000; ">
                  <span style="font-weight: bold;">Unit </span>
               </td>
               <td width="8%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;text-align: center;border-bottom:1px solid #000; border-right: 1px solid #000;">
                  <span style="font-weight: bold;">Price </span>
               </td>
               <td width="7%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;text-align: center;border-bottom:1px solid #000; border-right: 1px solid #000;">
                  <span style="font-weight: bold;">CGST Rate </span>
               </td> 
               <td width="8%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;text-align: center;border-bottom:1px solid #000; border-right: 1px solid #000;">
                  <span style="font-weight: bold;">CGST Amount </span>
               </td>   
               <td width="7%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;text-align: center;border-bottom:1px solid #000; border-right: 1px solid #000;">
                  <span style="font-weight: bold;">SGST Rate </span>
               </td> 
               <td width="8%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;text-align: center;border-bottom:1px solid #000; border-right: 1px solid #000;">
                  <span style="font-weight: bold;">SGST Amount </span>
               </td>   
               <td width="10%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;text-align: center;border-bottom:1px solid #000; ">
                  <span style="font-weight: bold;"> Amount<br>(Rs.) </span>
               </td>
            </tr>
            <!-- row-1 -->
            <?php $sn_count=1;
            if($fetch>0){ 
            foreach($item as $itemss){ ?>
            <tr>
               <td width="5%" style="color: #000; font-size: 12px; border-right: 1px solid #000; text-align: left;">
                 &nbsp;&nbsp;<?php echo $sn_count; ?>
               </td>
               <td width="27%" style="color: #000;  font-size: 12px; border-right: 1px solid #000; text-align: left;">
                  <?php echo ItemDetail($itemss->pid)->product_name; ?>
               </td> 
               <td width="8%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000; text-align: center;">
                 <?php echo ItemDetail($itemss->pid)->hsn_code; ?>
               </td>
              
               <td width="6%" style="color: #000; font-size: 12px; border-right: 1px solid #000; padding: 5px 0px 5px 2px; text-align: center; ">
                 <?php echo $itemss->qty; ?>
               </td> 
               <td width="6%" style="color: #000; font-size: 12px; border-right: 1px solid #000; padding: 5px 0px 5px 2px; text-align: center; ">
                 <?php echo $itemss->unit; ?>
               </td>   
               <td width="8%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000; text-align: center;">
                 <?php echo $itemss->price; ?>
               </td>
              
               <td width="7%" style="color: #000; font-size: 12px; border-right: 1px solid #000; padding: 5px 0px 5px 2px; text-align: center; ">
                 <?php echo $itemss->cgst; ?> %
               </td> 
               <td width="8%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000; text-align: center;">
                 <?php echo $itemss->cgstamount; ?>
               </td>
              
               <td width="7%" style="color: #000; font-size: 12px; border-right: 1px solid #000; padding: 5px 0px 5px 2px; text-align: center; ">
                 <?php echo $itemss->sgst; ?> %
               </td> 
               <td width="8%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000; text-align: center;">
                 <?php echo $itemss->sgstamount; ?>
               </td>
              
               <td width="10%" style="color: #000; font-size: 11px;  padding: 5px 0px 5px 2px; text-align: right; ">
                 <?php echo $itemss->total; ?>&nbsp;&nbsp;&nbsp;
               </td> 
            </tr>
            <?php $sn_count++; } } ?>
            
            <tr>
               <td width="5%" style="color: #000; font-size: 12px; border-right: 1px solid #000;border-top: 1px solid #000; text-align: left;">
                 &nbsp;&nbsp;
               </td>
               <td width="35%" style="color: #000; border-top: 1px solid #000; border-right: 1px solid #000;font-size: 12px; text-align: left;">
                  
               </td>
               <td colspan="2" width="6%" style="color: #000; border-top: 1px solid #000; font-size: 12px;  text-align: center;border-right: 1px solid #000;">
                  <?php echo $row->qtyTotal; ?>
               </td>  
               <td width="6%" style="color: #000; font-size: 12px;  padding: 5px 2px 5px 2px;border-right: 1px solid #000; border-top: 1px solid #000;text-align: center;">
                
               </td>
               <td colspan="2" width="38%" style="color: #000; font-size: 12px;  padding: 5px 2px 5px 2px;border-right: 1px solid #000; border-top: 1px solid #000;text-align: right;">
                  Total Rs.&#160;&#160;&#160;
               </td>
              
               <td width="10%" style="color: #000; font-size: 12px; border-top: 1px solid #000; padding: 5px 2px 5px 2px; text-align: right; ">
                <?php echo number_format($row->totalAmount,2); ?>&nbsp;&nbsp;
               </td>    
            </tr>
            <tr>
               <td width="15%" style="color: #000; border-top: 1px solid #000; border-right: 1px solid #000;font-size: 10px; text-align: left;">
                  <span style=" font-weight: bold; color: #000;">Taxable Amount.</span>
               </td>
               <td colspan="2" width="13%" style="color: #000; border-top: 1px solid #000; font-size: 10px;  text-align: left;border-right: 1px solid #000;">
                 <span style=" font-weight: bold; color: #000;">CGST Amount.</span>
               </td>  
               <td width="13%" style="color: #000; font-size: 10px;  padding: 5px 2px 5px 2px;border-right: 1px solid #000; border-top: 1px solid #000;text-align: center;">
                <span style=" font-weight: bold; color: #000;">SGST Amount.</span>
               </td>
               <td colspan="2" width="10%" style="color: #000; font-size: 10px;  padding: 5px 2px 5px 2px;border-right: 1px solid #000; border-top: 1px solid #000;text-align: left;">
                 <span style=" font-weight: bold; color: #000;">Total Taxt</span>
               </td>
              
               <td width="49%" style="color: #000; font-size: 12px; border-top: 1px solid #000; padding: 5px 2px 5px 2px; text-align: right; ">

               </td>    
            </tr>
            <tr>
               <td width="15%" style="color: #000; border-top: 1px solid #000; border-right: 1px solid #000;font-size: 10px; text-align: center;">
                  <span style=" font-weight: bold; color: #000;"><?php echo ($row->totalAmount-($row->cgstAmountTotal+$row->sgstAmountTotal)); ?></span>
               </td>
               <td colspan="2" width="13%" style="color: #000; border-top: 1px solid #000; font-size: 10px;  text-align: center;border-right: 1px solid #000;">
                 <span style=" font-weight: bold; color: #000;"><?php echo $row->cgstAmountTotal; ?></span>
               </td>  
               <td width="13%" style="color: #000; font-size: 10px;  padding: 5px 2px 5px 2px;border-right: 1px solid #000; border-top: 1px solid #000;text-align: center;">
                <span style=" font-weight: bold; color: #000;"><?php echo $row->sgstAmountTotal; ?></span>
               </td>
               <td colspan="2" width="10%" style="color: #000; font-size: 10px;  padding: 5px 2px 5px 2px;border-right: 1px solid #000; border-top: 1px solid #000;text-align: center;">
                 <span style=" font-weight: bold; color: #000;"><?php echo ($row->cgstAmountTotal+$row->sgstAmountTotal); ?></span>
               </td>
              
               <td width="49%" style="color: #000; font-size: 12px; border-top: 1px solid #000; padding: 5px 2px 5px 2px; text-align: right; ">
               </td>    
            </tr>
            <tr>
               <td width="100%" colspan="8" style="color: #000; font-size: 11px; border-top: 1px solid #000; text-align: left;">
                 <span style=" font-weight: bold; color: #000;"><?php echo number_converted_into_words($row->totalAmount) ;?> </span> 
               </td>
            </tr>
            <tr>
               <td width="13%" colspan="7" style="color: #000; font-size: 11px; border-top: 1px solid #000; text-align: left;">
                 <span style=" font-weight: bold; color: #000;">Bank Details: </span> 
               </td>
               <td width="87%" colspan="7" style="color: #000; font-size: 11px; border-top: 1px solid #000; text-align: left;"> 
                  <span style="padding-left: 20px;">ACC.No.-  60318742050  </span> 
                 <br>
                 <span style="padding-left: 20px;">IFSC : MAHB0000448 (BANK OF MAHARASHTRA BETUL) </span> 
               </td>
            </tr>
            <tr>
               <td width="40%" colspan="7"  style="color: #000; font-size: 9px; border-top: 1px solid #000;border-right: 1px solid #000; text-align: left;border-bottom: 1px solid #000;">
               <span style=" font-weight: bold; color: #000;">Terms & Condition </span>
              <br>  E.& O.E.<br> &#160;1. Goods once sold will not be taken back. 
              <br> &#160;2.  Interest @ 18% p.a. will be charged if the payment is not made with in the stipulated time..
              <br> &#160;3.Subject to 'Betul Madhya Pradesh' only.
               </td>
               <td width="60%" colspan="7" style="color: #000; font-size: 11px; border-top: 1px solid #000;border-bottom: 1px solid #000; text-align: left;"> 
                  <span style=" font-weight: bold; color: #000;">Receiver's Signature: </span>
               </td>
            </tr>
         </table>
      </div>
   </body>
</html>