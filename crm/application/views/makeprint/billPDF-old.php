<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
   <head>
      <title>BILL PDF</title>
   </head>
   <body>
      <div style="padding:0px 5px 5px 0px;">
         

         
        
         <table role="presentation" border="0" cellpadding="5" cellspacing="0" width="100%" style=" line-height: 18px;">
            <tr>
               <td width="25%" style="text-align: center;border-left: 1px solid #000;border-top: 1px solid #000;">
                  
                  <span style=" float: center;"> <img src="<?php echo base_url()."dist/"; ?>/images/acs.jpg"></span><br>
                   <span style=" font-size: 22px; text-align: left; font-weight: bold; color: #000; letter-spacing: 1px;">BILL INVOICE</span>
                   <br>
                   <span style=" font-size: 16px; text-align: left; font-weight: bold; color: #555; letter-spacing: 3px;">ORIGINAL</span>
               </td>


               <td width="75%" style="border-right: 1px solid #000;border-top: 1px solid #000;">
                  <span style=" font-size: 22px; text-align: left; font-weight: bold; color: #00ACEE;">ASHISH CONTAINER SERVICE</span><br>
                  
                  <span style=" font-size: 11px; text-align: left; font-weight: 500; color: #000; text-transform: uppercase;">236-A Hari Ganga Nagar, Near Indus Town, Hoshangabad Road, Bhopal - 462 026 (MP)</span><br>

                  <span style=" font-size: 11px; text-align: left; font-weight: 500; color: #000;">TEL NO. +91-9977425237, +91-8959905237</span><br>
                  <span style=" font-size: 11px; text-align: left; font-weight: 500; color: #000;">EMAIL : mohan_dhoke2008@yahoo.com, mohan@ashishcontainer.com </span><br>

                  <span style=" font-size: 11px; text-align: left; font-weight: 500; color: #000;">STATE : MADHYA PRADESH &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; STATE CODE: 23 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; GSTIN : 23ASKPD8937BIZX</span><br>

                  <span  style="font-weight: 500; font-size: 11px; color: #000;">Service Tax No. : ASKPD8937BSD001 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PAN : ASKPD8937B</span>                        
               </td>
               
               
            </tr>
         </table>

         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style=" border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height: 16.5px;">
           <tr>
               <td width="40%" style="color: #000; font-size: 12px; border-right: 1px solid #000; text-align: left;">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="line-height: 16.5px;">
                     <tr>
                        <td colspan="2" width="100%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px;  text-align: left;">
                           Invoice To :
                        </td>   
                     </tr>
                     <tr>
                        <td colspan="2" width="100%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px;  text-align: left;">
                           <?php echo $row->customerName; ?>
                        </td>   
                     </tr>
                     <tr>
                        <td colspan="2" width="100%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px;  text-align: left;">
                           <?php echo $row->customerAddress; ?>
                        </td>   
                     </tr>
                     <tr>
                        <td colspan="2" width="100%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px;  text-align: left;">
                           <?php echo $row->customerCity; ?> <?php echo $row->customerPINCode; ?> 
                        </td>   
                     </tr>

                     <?php if ($row->customerMobileNo) { ?>
                     <tr>
                        <td colspan="2" width="100%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px;  text-align: left;">     
                           Phone : +91-<?php echo $row->customerMobileNo; ?>   
                           <?php if ($row->customerMobileNo1) { ?> +91-<?php echo $row->customerMobileNo1; ?> <?php } ?>
                        </td>   
                     </tr>
                     <?php } ?>

                     
                     <tr>
                        <td colspan="2" width="100%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px;  text-align: left;">    <?php if ($row->customerEmailID) { ?> 
                           Email : <?php echo $row->customerEmailID; ?>
                        <?php } ?> <br>  
                        </td>   
                     </tr>
                     

                     <tr>
                        <td width="50%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px;  text-align: left;">
                           Supply of State :
                        </td>
                        <td width="50%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px;  text-align: left;">
                           <?php echo $row->customerState; ?>
                        </td>   
                     </tr>
                     <tr>
                        <td width="50%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px;  text-align: left;">
                           STATE CODE :
                        </td>
                        <td width="50%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px;  text-align: left;">
                           <?php echo $row->customerStateCode; ?>
                        </td>   
                     </tr> 
                     <tr>
                        <td width="50%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px;  text-align: left;">
                           GSTIN/UIN :
                        </td>
                        <td width="50%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px;  text-align: left;">
                           <?php echo $row->customerGSTNo; ?>
                        </td>   
                     </tr>   
                     
                  </table>
               </td>
               <td width="40%" style="color: #000; font-size: 12px; border-right: 1px solid #000; text-align: left;">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="line-height: 18.5px;">
                     <tr>
                        <td width="50%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px;  text-align: left;">
                           Invoice No. :
                        </td>
                        <td width="50%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px;  text-align: left;">
                           Date :
                        </td>   
                     </tr>
                     <tr>
                        <td width="50%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px;  text-align: left;">
                           <?php echo $row->billNo; ?>
                        </td>
                        <td width="50%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px;  text-align: left;">
                          <?php echo date("d M, Y",strtotime($row->billDate)) ; ?> <?php echo date("H:i A",strtotime($row->billTime)) ; ?>
                        </td>   
                     </tr><br>

                     
                     <tr>
                        <td colspan="2" width="100%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px;  text-align: left;"> 
                             &nbsp;&nbsp;<?php echo $row->customerName; ?>
                        </td>   
                     </tr>
                     <tr>
                        <td colspan="2" width="100%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px;  text-align: left;"> 
                             &nbsp;&nbsp;<?php echo $row->customerAddress; ?>
                        </td>   
                     </tr>
                     <tr>
                        <td colspan="2" width="100%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px;  text-align: left;">
                            &nbsp;&nbsp;<?php echo $row->customerCity; ?> <?php if ($row->customerPINCode) { ?>- <?php echo $row->customerPINCode; ?> <?php } ?> (<?php echo $row->customerState; ?>) INDIA. <br> 
                        </td>   
                     </tr>   
                     
                  </table>
               </td> 
                <td width="20%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px; ">
                  <span style="font-weight: bold;"> </span>
               </td>  
            </tr>  
            
         </table>

         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style=" border-left:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;line-height: 16.5px;">
            <tr>
               <td width="20%" style="color: #000; font-size: 12px; font-weight: bold; padding: 5px 0px 5px 2px; border-right: 1px solid #000; text-align: left;">&nbsp;&nbsp;&nbsp; LR/GR No. Date :
               </td> 
               <td width="20%" style="color: #000; font-size: 12px;font-weight: bold; border-right: 1px solid #000; text-align: left;">&nbsp;&nbsp;TRAILOR NO. :
               </td> 
               <td colspan="2" width="60%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px; ">
                  <span style="font-weight: bold;"> </span>
               </td>   
            </tr>
            <tr>
               <td width="20%" style="color: #000; font-size: 12px; font-weight: 500; padding: 5px 0px 5px 2px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                  &nbsp;&nbsp;<?php echo $row->lrGrNo; ?> <?php echo date("d M, Y",strtotime($row->lrGrDate)) ; ?>
               </td> 
               <td width="20%" style="color: #000; font-size: 12px;font-weight: 500; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">&nbsp;&nbsp;<?php echo $row->vehicleNo; ?>
               </td> 
               <td colspan="2" width="60%" style="color: #000;border-bottom: 1px solid #000; font-size: 12px;  padding: 5px 0px 5px 2px; ">
                  <span style="font-weight: 500;"> </span>
               </td>   
            </tr>
            <tr>
               <td width="20%" style="color: #000; font-size: 12px; border-right: 1px solid #000; text-align: left;">
                 <span style="font-weight: bold;">&nbsp;&nbsp;Loading Point</span>
               </td>
               <td width="20%" style="color: #000; font-size: 12px; border-right: 1px solid #000; text-align: left;">
                  <span style="font-weight: bold;">Off Loading Point</span>
               </td> 
               <td colspan="2" width="60%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px; ">
                  <span style="font-weight: bold;">Shipping Line</span>
               </td>   
            </tr> 
            <tr>
               <td width="20%" style="color: #000; font-size: 12px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                 &nbsp;<?php echo $row->loadingPoint; ?>
               </td>
               <td width="20%" style="color: #000; font-size: 12px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                  <?php echo $row->offLoadingPoint; ?>
               </td> 
               <td colspan="2" width="60%" style="color: #000;border-bottom: 1px solid #000; font-size: 12px;  padding: 5px 0px 5px 2px; ">
                  <?php echo $row->shippingLine; ?>
               </td>   
            </tr> 
            <tr>
               <td width="20%" style="color: #000; font-size: 12px; border-right: 1px solid #000; text-align: left;">
                 <span style="font-weight: bold;">&nbsp;&nbsp;Port of Discharge</span>
               </td>
               <td width="20%" style="color: #000; font-size: 12px; border-right: 1px solid #000; text-align: left;">
                  <span style="font-weight: bold;">Gr.Wt(Kg/MT)</span>
               </td> 
               <td width="35%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000; ">
                  <span style="font-weight: bold;">Job Reference</span>
               </td>
               <td width="25%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px; ">
                  <span style="font-weight: bold;">Ex. Rate :</span>
               </td>   
            </tr>
            <tr>
               <td width="20%" style="color: #000; font-size: 12px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                 &nbsp;&nbsp;<?php echo $row->portOfDischarge; ?>
               </td>
               <td width="20%" style="color: #000; font-size: 12px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                  <?php echo $row->grossWeight; ?>
               </td> 
               <td width="35%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000;border-bottom: 1px solid #000; ">
                  <?php echo $row->jobReference; ?>
               </td>
               <td width="25%" style="color: #000; font-size: 12px;border-bottom: 1px solid #000;  padding: 5px 0px 5px 2px; ">
                 <?php echo $row->exRate; ?>
               </td>   
            </tr> 
            <tr>
               <td width="20%" style="color: #000; font-size: 12px; border-right: 1px solid #000; text-align: left;">
                 <span style="font-weight: bold;"><br></span>
               </td>
               <td width="20%" style="color: #000; font-size: 12px; border-right: 1px solid #000; text-align: left;">
                  <span style="font-weight: bold;"><br></span>
               </td> 
               <td width="35%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000; ">
                  <span style="font-weight: bold;"><br></span>
               </td>
               <td width="25%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px; ">
                  <span style="font-weight: bold;"><br></span>
               </td>   
            </tr>  
            
         </table>



         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style=" border-left:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;line-height: 20.5px;">
            
            <tr>
               <td width="7%" style="color: #000; font-size: 12px; border-right: 1px solid #000;border-bottom:1px solid #000; text-align: left;">
                 <span style="font-weight: bold;">&nbsp;&nbsp;S.No.</span>
               </td>
               <td width="35%" style="color: #000; font-size: 12px; border-right: 1px solid #000;border-bottom:1px solid #000; text-align: left;">
                  <span style="font-weight: bold;">Description</span>
               </td> 
               <td width="10%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000; border-bottom:1px solid #000;text-align: center;">
                  <span style="font-weight: bold;text-align: center;">SAC</span>
               </td>
               <td width="10%" style="color: #000; font-size: 12px;border-right:1px solid #000;border-bottom:1px solid #000;  padding: 5px 0px 5px 2px;text-align: center; ">
                  <span style="font-weight: bold;text-align: center;">Qty/CBM</span>
               </td>
               <td width="8%" style="color: #000; font-size: 12px;border-right:1px solid #000;border-bottom:1px solid #000;  padding: 5px 0px 5px 2px; text-align: center;">
                  <span style="font-weight: bold;">Curr</span>
               </td> 
               <td width="15%" style="color: #000; font-size: 12px;border-right:1px solid #000;border-bottom:1px solid #000;  padding: 5px 0px 5px 2px; text-align: center;">
                  <span style="font-weight: bold;">Unit Rate</span>
               </td> 
               <td width="15%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;text-align: center;border-bottom:1px solid #000; ">
                  <span style="font-weight: bold;">Total Amount (INR) </span>
               </td>    
            </tr>
            <!-- row-1 -->
            <tr>
               <td width="7%" style="color: #000; font-size: 12px; border-right: 1px solid #000;ACS text-align: left;"><br>
                 &nbsp;&nbsp;1 <br>
               </td>
               <td width="35%" style="color: #000; font-size: 12px; border-right: 1px solid #000;ACS text-align: left;">
                  <?php echo $row->description1; ?>
               </td> 
               <td width="10%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000;ACS text-align: center;">
                  <?php echo $row->sacNo; ?>
               </td>
               <td width="10%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000;ACS text-align: center;">
                  1
               </td>
               <td width="8%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000;ACS text-align: center;">
                 INR
               </td>
               <td width="15%" style="color: #000; font-size: 12px;border-right:1px solid #000;ACS  padding: 5px 0px 5px 2px;text-align: center; ">
                 <?php echo number_format($row->bookingBillAmt,2); ?>
               </td>
               <td width="15%" style="color: #000; font-size: 12px;ACS  padding: 5px 0px 5px 2px; text-align: right; ">
                 <?php echo number_format($row->bookingBillAmt,2); ?>&nbsp;&nbsp;
               </td>    
            </tr>

            <!-- row-2  -->
            <tr>
               <td width="7%" style="color: #000; font-size: 12px; border-right: 1px solid #000; text-align: left;"><br>
                 &nbsp;&nbsp; <br>
               </td>
               <td width="35%" style="color: #000; font-size: 12px; border-right: 1px solid #000; text-align: left;">
                  <?php echo $row->description2; ?>
               </td> 
               <td width="10%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000; text-align: center;">
                  
               </td>
               <td width="10%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000; text-align: center;">
                  
               </td>
               <td width="8%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000; text-align: center;">
                 
               </td>
               <td width="15%" style="color: #000; font-size: 12px;border-right:1px solid #000;  padding: 5px 0px 5px 2px;text-align: center; ">
                 
               </td>
               <td width="15%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px; text-align: right; ">
                 
               </td>    
            </tr>

            <!-- row-3  -->
            <tr>
               <td width="7%" style="color: #000; font-size: 12px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;"><br>
                 &nbsp;&nbsp;2 <br>
               </td>
               <td width="35%" style="color: #000; font-size: 12px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                  <?php echo $row->otherChargeText; ?>
               </td> 
               <td width="10%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  <?php echo $row->sacNo; ?>
               </td>
               <td width="10%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  1
               </td>
               <td width="8%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                 INR
               </td>
               <td width="15%" style="color: #000; font-size: 12px;border-right:1px solid #000;border-bottom: 1px solid #000;  padding: 5px 0px 5px 2px;text-align: center; ">
                 <?php echo number_format($row->otherChargeINR,2); ?>
               </td>
               <td width="15%" style="color: #000; font-size: 12px;border-bottom: 1px solid #000;  padding: 5px 0px 5px 2px; text-align: right; ">
                 <?php echo number_format($row->otherChargeINR,2); ?>&nbsp;&nbsp;
               </td>    
            </tr>


            <!-- Gross Amount  -->
            <tr>
               <td width="7%" style="color: #000; font-size: 12px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;"><br>
                 &nbsp;&nbsp;
               </td>
               <td width="35%" style="color: #000; font-size: 12px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                  
               </td> 
               <td width="10%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  
               </td>
               <td width="10%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                 
               </td>
               <td colspan="2" bgcolor="#D3D3D3" width="23%" style="color: #000; font-size: 12px;border-right:1px solid #000;border-bottom: 1px solid #000;  padding: 5px 0px 5px 2px;text-align: right; ">
                 <span style="font-weight: bold;"> Gross Amount &nbsp;</span>
               </td>
               <td width="15%" style="color: #000; font-size: 12px;border-bottom: 1px solid #000;  padding: 5px 0px 5px 2px; text-align: right; ">
                 <span style="font-weight: bold;"><?php echo number_format($row->grossAmt,2); ?>&nbsp;&nbsp;</span>
               </td>    
            </tr>


            <!-- Grand Total  -->
            <tr>
               <td rowspan="2" width="7%" style="color: #000; font-size: 12px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;"><br>
                 &nbsp;&nbsp;
               </td>
               <td rowspan="2" width="35%" style="color: #000; font-size: 12px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                  
               </td> 
               <td rowspan="2" width="10%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  
               </td>
               <td rowspan="2" width="10%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                 
               </td>
               <td colspan="2" width="23%" style="color: #000; font-size: 12px;border-right:1px solid #000;  padding: 5px 0px 5px 2px;text-align: left; ">
                 <span style="font-weight: bold;"> Grand Total &nbsp;</span>
               </td>
               <td width="15%" style="color: #000; font-size: 12px; padding: 5px 0px 5px 2px; text-align: right; ">
                 <span style="font-weight: 500;"><?php echo number_format($row->grossAmt,2); ?>&nbsp;&nbsp;</span>
               </td>    
            </tr>

            <!-- Less Advance  -->
            <tr>
               
               <td colspan="2" width="23%" style="color: #000; font-size: 12px;border-right:1px solid #000;border-bottom: 1px solid #000;  padding: 5px 0px 5px 2px;text-align: left; ">
                 <span style="font-weight: bold;"> Less Advance &nbsp;</span>
               </td>
               <td width="15%" style="color: #000; font-size: 12px;border-bottom: 1px solid #000;  padding: 5px 0px 5px 2px; text-align: right; ">
                 <span style="font-weight: 500;"><?php echo number_format($row->otherDeductionINR,2); ?>&nbsp;&nbsp;</span>
               </td>    
            </tr>

            <!-- Net Amount  -->
            <tr>
               <td width="7%" style="color: #000; font-size: 12px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;"><br>
                 &nbsp;&nbsp;
               </td>
               <td width="35%" style="color: #000; font-size: 12px; border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: left;">
                  
               </td> 
               <td width="10%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                  
               </td>
               <td width="10%" style="color: #000; font-size: 12px;  padding: 5px 0px 5px 2px;border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: center;">
                 
               </td>
               <td colspan="2" bgcolor="#D3D3D3" width="23%" style="color: #000; font-size: 12px;border-right:1px solid #000;border-bottom: 1px solid #000;  padding: 5px 0px 5px 2px;text-align: right; ">
                 <span style="font-weight: bold;"> Net Amount &nbsp;</span>
               </td>
               <td width="15%" style="color: #000; font-size: 12px;border-bottom: 1px solid #000;  padding: 5px 0px 5px 2px; text-align: right; ">
                 <span style="font-weight: bold;"><?php echo number_format($row->invoiceAmt,2); ?>&nbsp;&nbsp;</span>
               </td>    
            </tr>

            <!-- Rs in words  -->
            <tr>
               <td colspan="7" width="100%" style="color: #000; font-size: 12px; border-bottom: 1px solid #000; text-align: left;">
                 Rs. (in words) : <?php echo $row->invoiceAmtInWords; ?> Only.
               </td>   
            </tr>


            <tr>
               <td colspan="7" width="100%" style="color: #000; font-size: 12px; text-align: center;">
                <span style="font-weight: bold;"> GST TO BE BORNE & PAID BY PARTY UNDER REVERSE CHARGES</span> <br>
               </td>   
            </tr>

            <tr>
               <td colspan="7" width="100%" style="color: #000; font-size: 12px;  text-align: right;">
                <span style="font-weight: bold;"> For Ashish Container service&nbsp;&nbsp;&nbsp;</span> <br>
               </td>   
            </tr>

            <tr>
               <td colspan="6" width="90%" style="color: #000; font-size: 12px;  text-align: right;">
                <span style="font-weight: bold;"> Signatory</span> <br>
               </td>
               <td width="10%" style="color: #000; font-size: 12px; text-align: right;">
                <span style="font-weight: bold;"> </span> <br>
               </td>    
            </tr>

            <tr>
               <td colspan="7" width="100%" style="color: #000;border-top: 1px solid #000; font-size: 12px; text-align: left;">
                <span style="font-weight: bold;"> Terms and Conditions :</span> 
               </td>   
            </tr>

            <tr>
               <td colspan="7" width="100%" style="color: #000; font-size: 12px; text-align: left;">
                <span style="font-weight: bold;"> 1. Interest @21% will be charged if the bill is not paid within 15 days</span> 
               </td>   
            </tr> 
            <tr>
               <td colspan="7" width="100%" style="color: #000; font-size: 12px; text-align: left;">
                <span style="font-weight: bold;"> 2. Any querry/ dispute for this will not be accepted after 15 days of the bill</span> 
               </td>   
            </tr>
            <tr>
               <td colspan="7" width="100%" style="color: #000; font-size: 12px; text-align: left;">
                <span style="font-weight: bold;"> 3. Service Tax No. ASKPD8937BSD001</span> 
               </td>   
            </tr>
            <tr>
               <td colspan="7" width="100%" style="color: #000; font-size: 12px; text-align: left;">
                <span style="font-weight: bold;"> 4. GST NO. 23ASKPD8937BIZX</span> 
               </td>   
            </tr>
            <tr>
               <td colspan="7" width="100%" style="color: #000; font-size: 12px; text-align: left;">
                <span style="font-weight: bold;"> 5. Pan card no. ASKPD8937B</span> 
               </td>   
            </tr> 
            <tr>
               <td colspan="7" width="100%" style="color: #000;border-bottom: 1px solid #000; font-size: 12px; text-align: left;">
                <span style="font-weight: bold;"> 6. GST paid by Consigor / consignee</span> 
               </td>   
            </tr>     
            
            
         </table>


         
        <!--  <span style="margin-top: 20px; float: right;"> <img src="<?php echo base_url()."mdist/"; ?>/images/car.png"></span> -->
      </div>
   </body>
</html>