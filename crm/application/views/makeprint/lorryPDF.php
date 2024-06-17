<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
   <head>
      <title>Lorry Receipt</title>
   </head>
   <body>
      <div style="padding:0px 5px 5px 0px;">
         

         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="70%" >
            <tr>
               <td bgcolor="#ff0000" style=" color: #FFFFFF; text-align: center; font-weight: bold; font-size: 16px; ">
                  CONSIGNMENT NOTE
               </td> 
            </tr>
         </table>

         

         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style=" line-height: 18px;">
            <tr>
               <td width="50%" style="text-align: right;">
                  <span style=" font-size: 10px; font-weight: bold; color: #333333; text-align: right!important;">Subject to Goa Jurisdiction</span><br>
                  <span style="margin-top: 20px; float: right;"> <img src="<?php echo base_url()."mdist/"; ?>/images/lorry.jpg"></span>
               </td>


               <td width="50%">
                  <!-- <span style=" font-size: 22px; text-align: left; font-weight: bold; color: #00ACEE;">EZZY RELOCATIONS</span><br> -->
                  <br> <br>
                  <span style=" font-size: 11px; text-align: left; font-weight: 500; color: #000;"><img width="100%" src="<?php echo base_url()."mdist/"; ?>/images/address.jpg"> 16/1-2-2/A, kazarwada, Bethoda, Ponda, North Goa, Goa, 403401</span><br>

                  <span style=" font-size: 11px; text-align: left; font-weight: 500; color: #000;"><img width="100%" src="<?php echo base_url()."mdist/"; ?>/images/web.jpg"> www.ezzyrelocations.com, www.ezzyrelocations.in</span><br>

                  <span style=" font-size: 11px; text-align: left; font-weight: 500; color: #000;"><img width="100%" src="<?php echo base_url()."mdist/"; ?>/images/phone.jpg"> +91-8928-<span style=" color: #ff0000;">55555</span>-9, +91-8928-<span style=" color: #ff0000;">55555</span>-6</span><br>

                  <span  style="font-weight: 500; font-size: 11px; color: #000;"> <img width="110%" src="<?php echo base_url()."mdist/"; ?>/images/mesg.jpg">  info@ezzyrelocations.com</span>                        
               </td>
               
               
            </tr>
         </table>



         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top: 20px;">
            <tr>
               <td bgcolor="#ff0000" style=" color: #ff0000; text-align: center; font-weight: bold; font-size: 2px; ">
                  CONSIGNMENT NOTE
               </td> 
               
            </tr>
         </table>

         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top: 20px;">
            <tr>
               <td width="100%" >
                  <span style=" font-size: 16px; text-align: left; font-weight: bold;"> &nbsp;</span>                           
               </td>
               
            </tr>
         </table>


         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style=" border:1px solid #000;line-height: 16.5px;">
           <tr>
               <td width="8%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  From
               </td>
               <td width="20%" style="color: #000; font-size: 12px; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  <?php echo strtoupper($row->lorryFromCity);  ?>
               </td> 
               <td width="18%" style="color: #000; font-size: 11px; font-weight: bold; padding: 5px 0px 5px 2px; border-bottom: 1px solid #000;border-right: 1px solid #000; text-align: center;">
                  Consignment Note No.
               </td> 
                <td width="20%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px; border-bottom: 1px solid #000;border-right: 1px solid #000; text-align: center;">
                  <?php echo strtoupper($row->consignmentNoteNo);  ?>
               </td> 
                <td colspan="2" width="34%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px; border-bottom: 1px solid #000;">
                  <span style="font-weight: bold;"> Date</span> <span style="color: #000; font-size: 11px; font-weight: 500;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo date("d M, Y", strtotime($row->lorryDate)); ?> <?php echo date("H:i A", strtotime($row->lorryTime)); ?></span>
               </td>  
            </tr>
            <tr>
               <td width="8%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  To
               </td>
               <td width="20%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  <?php echo strtoupper($row->lorryToCity);  ?>
               </td> 
               <td width="18%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px; border-bottom: 1px solid #000;border-right: 1px solid #000; text-align: center;">
                  Lorry No.
               </td> 
                <td width="20%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px; border-bottom: 1px solid #000;border-right: 1px solid #000; text-align: center;">
                   <?php echo strtoupper($row->lorryNo);  ?>
               </td> 
                <td width="17%" style="color: #333; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px; border-bottom: 1px solid #000; text-align: center;border-right: 1px solid #000;">
                  <span style="color: #000; font-size: 11px; font-weight: bold;">  <input type="checkbox" name="atOwnerRisk" value="1" <?php if ($row->atOwnerRisk=="1") {echo 'checked';} ?>><label for="atOwnerRisk">At Owner's Risk</label></span>
               </td> 
               <td width="17%" style="color: #333; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px; border-bottom: 1px solid #000; text-align: center;">
                  
                  <span style="color: #000; font-size: 11px; font-weight: 500;">  <input type="checkbox" name="transitInsurance" value="1"  <?php if ($row->transitInsurance=="1") {echo 'checked';} ?>><label for="transitInsurance">Transit Insurance</label></span>

                  <!-- <input type="checkbox" name="agree" value="1" checked="checked" /> <label for="agree">I agree </label> -->
               </td>  
            </tr>
            
            
         </table>


         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top: 20px;">
            <tr>
               <td width="100%" >
                  <span style=" font-size: 16px; text-align: left; font-weight: bold;"> &nbsp;</span>                           
               </td>
               
            </tr>
         </table>


         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style=" border:1px solid #000;line-height: 16.5px;">
           <tr>
               <td width="50%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  Consignor's Name & Address:
               </td>
               <td width="50%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  Consignee's Name & Address:
               </td>  
            </tr>
            <tr>
               <td width="50%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                  Name : <?php echo strtoupper( $row->consignorName); ?>
               </td>
               <td width="50%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                  Name : <?php echo strtoupper( $row->consigneeName); ?>
               </td>  
            </tr>
            <tr>
               <td width="50%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                   Address : <?php echo ucwords($row->consignorAddress); ?>
                  
               </td>
               <td width="50%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                  Address : <?php echo ucwords($row->consigneeAddress); ?>
               </td>  
            </tr>
            <tr>
               <td width="50%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                  Mobile No. : <?php echo $row->consignorMobileNo; ?>
               </td>
               <td width="50%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                  Mobile No. : <?php echo $row->consigneeMobileNo; ?>
               </td>  
            </tr>
         </table>





         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style=" border:1px solid #000;line-height: 16.5px;">
           <tr>
               <td rowspan="2" width="10%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                  No. OF PACKAGE
               </td>
               <td rowspan="2" width="40%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  FULL DESCRIPTION OF CONTENTS
               </td>
               <td colspan="2" width="20%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                  WEIGHT/VOLUME
               </td> 
               <td rowspan="2" width="10%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  AMOUNT
               </td> 
               <td rowspan="2" width="20%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  PAYMENT
               </td>    
            </tr>
            <tr> 
               <td width="8%" style="color: #000; font-size: 10px; font-weight: bold; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  ACTUAL
               </td> 
               <td width="12%" style="color: #000; font-size: 10px; font-weight: bold; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  VOLUMETRIC
               </td>    
            </tr>

            <tr>
               <td rowspan="4" width="10%" style="color: #000; font-size: 11px; font-weight: 500; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  <?php echo $row->noOfPackage; ?>
               </td>
               <td rowspan="4" width="40%" style="color: #000; font-size: 11px; font-weight: 500; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  <?php echo $row->fullDescriptionContents; ?>
               </td>
               <td rowspan="4" width="8%" style="color: #000; font-size: 11px; font-weight: 500; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  <?php echo $row->weightActual; ?>
               </td> 
               <td rowspan="4" width="12%" style="color: #000; font-size: 11px; font-weight: 500; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                 <?php echo $row->volumetric; ?>
               </td> 
               <td rowspan="4" width="10%" style="color: #000; font-size: 11px; font-weight: 500; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  <?php echo $row->totalAmount; ?>
               </td> 
               <td width="20%" style="color: #000; font-size: 11px; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                  <span style=" font-weight: bold;">PAID</span> <?php if ($row->paymentPaid=="1") {
                    echo ": Yes";
                  } else {echo ": No";} ?>
               </td>    
            </tr>
            <tr>
               <td width="20%" style="color: #000; font-size: 11px;  padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                  <span style=" font-weight: bold;"> TBB BILL NO.</span> <br> <?php echo $row->paymentTBB; ?>
               </td>    
            </tr>
            <tr>
               <td width="20%" style="color: #000; font-size: 11px; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                  <span style=" font-weight: bold;">TO PAY</span> <?php if ($row->paymentToPay=="1") {
                    echo ": Yes";
                  } else {echo ": No";} ?>
               </td>    
            </tr>

            
         </table>


         


         <table role="presentation" border="0" cellpadding="8" cellspacing="0" width="100%" style="padding-top: 10px;">
            <tr>
               <td width="100%" style="color: #000; font-size: 11px; padding: 5px 0px 5px 2px; text-align: center;border-right: 1px solid #000;border-left: 1px solid #000;">  
                  <span style=" font-weight: bold;" >TRANSIT RISK COVERAGE</span> <span style=" font-weight: bold;" > [ NOTE-</span> IT'S COMPULSORY TO FILL BELOW DETAILS<span style=" font-weight: bold;" > ]</span> 
               </td> 
            </tr>
         </table>


         

         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="line-height: 16px;">
            <tr>
               <td width="4%" style="color: #000; font-size: 11px; font-weight: bold; padding: 5px 0px 5px 2px;border-left: 1px solid #000;">
                  1.
               </td> 
               <td width="96%" style="color: #000000; font-size: 11px; padding: 5px 0px 5px 2px;line-height: 16.8px;border-right: 1px solid #000;">
                  I am ready to pay transit risk coverage charges in   <span style="font-weight: bold;">WHICH ONLY ACCIDENTAL DAMAGE OR SHORTAGE IS COVERED</span> on my declared value of household goods/two wheeler/others <span style="font-weight: bold;">Rs. <?php echo $row->totalAmount; ?>/-</span> as per packing inventory.
               </td> 
            </tr>
             <tr>
               <td width="4%" style="color: #000; font-size: 11px; font-weight: bold; padding: 5px 0px 5px 2px;border-left: 1px solid #000;">
                  2.
               </td> 
               <td width="96%" style="color: #000000; font-size: 11px; padding: 5px 0px 5px 2px;line-height: 16.8px;border-right: 1px solid #000;">
                  I am ready to pay comprehensive risk coverage charges on my declared value of household goods/two wheeler/four wheere/others <span style="font-weight: bold;">Rs. <?php echo $row->totalAmount; ?>/-</span> as per packing inventory.
               </td> 
            </tr>
             <tr>
               <td width="4%" style="color: #000; font-size: 11px; font-weight: bold; padding: 5px 0px 5px 2px;border-left: 1px solid #000;">
                  3.
               </td> 
               <td width="96%" style="color: #000000; font-size: 11px; padding: 5px 0px 5px 2px;line-height: 16.8px;border-right: 1px solid #000;">
                  I am not interested to coverage the goods.Iunderstand that in that case <span style="font-weight: bold; ">EZZY RELOCATIONS SHALL NOT BE RESPONSIBLE TO COMPENSATE ME FOR ANY</span> <span style="font-weight: bold;">LOSS ON LOSS ON ACCOUNT OF DAMAGES/BREAKAGE WHATSOEVER.</span>
               </td> 
            </tr>
            
         </table>


         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top: 10px;border-right: 1px solid #000;">
            <tr>
               <td width="100%" style="color: #000; font-size: 11px; padding: 5px 0px 5px 2px; text-align: left;border-left: 1px solid #000;">
                  <span style=" font-weight: bold;" >DISCLAIMER :</span>
               </td> 
            </tr>
         </table>

         <table role="presentation" border="0" cellpadding="5" cellspacing="0" width="100%" style="padding-top: 10px;border-left: 1px solid #000;">
            <tr>
               <td width="100%" style="color: #000; font-size: 11px; padding: 5px 0px 5px 2px; text-align: left;border-right: 1px solid #000;border-bottom: 1px solid #000;">
                  I hareby declare that the consignment tendered for carriage to Ezzy Relocations. <span style="font-weight: bold;">Does not contain any valuable articles, case cards, important document and cell phones, ornaments (Gold/silver or any other preclous material).</span>  Thus <span style="font-weight: bold;">EZZY RELOCATIONS.</span> Shell not be responsible in the event of loss of any such item in any scenario.
               </td> 
            </tr>
         </table>


         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top: 10px;border-right: 1px solid #000;">
            <tr>
               <td width="100%" style="color: #000; font-size: 11px; padding: 5px 0px 5px 2px; text-align: left;border-left: 1px solid #000;">
                  <span style=" font-weight: bold;" >DECLARATION :</span>
               </td> 
            </tr>
         </table>

         <table role="presentation" border="0" cellpadding="5" cellspacing="0" width="100%" style="padding-top: 10px;border-left: 1px solid #000;">
            <tr>
               <td width="100%" style="color: #000; font-size: 11px; padding: 5px 0px 5px 5px; text-align: left;border-right: 1px solid #000;border-bottom: 1px solid #000;">
                  I hereby declare that the goods/house hold articles, handed over to EZZY RELOCATIONS, do not contain any contraband, expiosive, inflammable, illegal or damage is prohibited articles. I further declare that in case the present declaration or any part the there of is found to be false/incorrect or in case any loss or damage is caused due to any such wrongful declarations or otherwise,then in that event I shall be solely responsible for all penalties, challans, charges, prosecutions, leveies, etc. arising there form, and shall be further liable to indemnify, <span style="font-weight: bold;"> Ezzy Relocations</span> toward the loss/damages suffered by it.
               </td> 
            </tr>
         </table>

         <table role="presentation" border="0" cellpadding="8" cellspacing="0" width="100%" style="padding-top: 10px;border-left: 1px solid #000;">
            <tr>
               <td width="60%" style="color: #000; font-size: 10px; padding: 5px 0px 5px 5px; text-align: left;border-right: 1px solid #000;border-bottom: 1px solid #000;">
                  I/WE HAVE CAREFULLY CHECKED AND VERIFIED THE CONTENT FILLED THIS.<br><br><br><br>
                  <span style=" font-weight: bold;" >Consignor's Signature</span>
               </td> 
               <td width="40%" style="color: #000; font-size: 10px; padding: 5px 0px 5px 5px; text-align: right;border-right: 1px solid #000;border-bottom: 1px solid #000; margin-top: 20px;">
                  <br><br><br><br><br>
                  <span style=" font-weight: bold; text-align: right;" >Dispatch Incharge &nbsp;&nbsp;</span>
               </td> 
            </tr>
         </table>

         <table role="presentation" border="0" cellpadding="2" cellspacing="0" width="100%" style="padding-top: 10px;border-right: 1px solid #000;">
            <tr>
               <td width="100%" bgcolor="#000" style="color: #000; font-size: 12px; padding: 5px 0px 5px 2px; text-align: center;border-left: 1px solid #000;">
                  <span style=" font-weight: bold; color: #ffffff" >ACKNOWLEDGMENT - ( TO BE FILL AT DESTINATION )</span>
               </td> 
            </tr>
         </table>

         <table role="presentation" border="0" cellpadding="8" cellspacing="0" width="100%" style="padding-top: 10px;border-left: 1px solid #000;">
            <tr>
               <td colspan="2" width="100%" style="color: #000; font-size: 11px; padding: 5px 0px 5px 5px; text-align: left;border-right: 1px solid #000;">
                  Dear Mr./Ms. <span style=" font-weight: bold;"> <?php echo $row->ackMrMs; ?></span>  <br><br> &nbsp;Ezzy Relocation has been appointed as delivery supervisor to undertake final of consignment.
               </td> 
               
            </tr>
            <tr>
               <td colspan="2" width="100%" style="color: #000; font-size: 11px; padding: 5px 0px 5px 5px; text-align: left;border-right: 1px solid #000;">
                  Your consignment of <span style="font-weight: bold;">total <span style="padding: 10px;"><?php echo $row->ackTotalPackage; ?></span> Packages </span>  as per packing inventory has delivered <span style="font-weight: bold;"> IN GOOD ORDER AND CONDITION. </span>
               </td> 
               
            </tr>

            <tr>
               <td colspan="2" width="100%" style="color: #000; font-size: 11px; padding: 5px 0px 5px 5px; text-align: left;border-right: 1px solid #000;">
                 <span style="font-weight: bold;">Remarks:</span>  (If any)  <?php echo $row->ackRemarks; ?>  
               </td> 
               
            </tr>

            <tr>
               <td colspan="2" width="100%" style="color: #000; font-size: 11px; padding: 5px 0px 5px 5px; text-align: left;border-right: 1px solid #000;">
                 <span style="font-weight: bold;">ALL Item</span> (Household goods/two wheerler/four wheere/others) received <span style="font-weight: bold;">IN GOOD ORDER AND CONDITION.</span>
               </td> 
               
            </tr>

            <tr>
               <td width="50%" style="color: #000; font-size: 11px; padding: 5px 0px 5px 5px; text-align: left;">
                 <span style="font-weight: bold;">Consigment received by: </span> <?php echo $row->ackReceivedBy; ?> 
               </td> 
               <td width="50%" style="color: #000; font-size: 11px; padding: 5px 0px 5px 5px; text-align: left;border-right: 1px solid #000;">
                 <span style="font-weight: bold;">Contact No.:</span>  <?php echo $row->ackReceivedMobileNo; ?>
               </td>
            </tr>
            <tr>
               <td width="50%" style="color: #000; font-size: 11px; padding: 5px 0px 5px 5px; text-align: left;border-bottom: 1px solid #000;"> <br><br>
                 <span style="font-weight: bold;"> Date: </span> <span style="color: #000; font-size: 11px; font-weight: 500;"> <?php 
                 if ($row->ackDate==null) { echo "";} 
                 else {echo date("d M, Y", strtotime($row->ackDate)); ?> <?php echo date("H:i A", strtotime($row->ackTime)); } ?> </span>
               </td> 
               <td width="50%" style="color: #000; font-size: 11px; padding: 5px 0px 5px 5px; text-align: left;border-bottom: 1px solid #000;border-right: 1px solid #000;"> <br><br>
                 <span style="font-weight: bold;">Consignee's Signature: </span>  
               </td>
            </tr>
         </table>

         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top: 20px;">
            <tr>
               <td width="100%" >
                  <span style=" font-size: 16px; text-align: left; font-weight: bold;"> &nbsp;</span>                           
               </td>
               
            </tr>
         </table>

         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" >
            <tr>
               <td width="30%" style=" color: #FFFFFF; text-align: center; font-weight: bold; font-size: 16px; ">
                  CONSIGNMENT NOTE
               </td> 
               <td bgcolor="#ff0000" width="70%" style=" color: #ff0000; text-align: center; font-weight: bold; font-size: 16px; ">
                  CONSIGNMENT NOTE
               </td> 
            </tr>
         </table>


        <!--  <span style="margin-top: 20px; float: right;"> <img src="<?php echo base_url()."mdist/"; ?>/images/car.png"></span> -->
      </div>
   </body>
</html>