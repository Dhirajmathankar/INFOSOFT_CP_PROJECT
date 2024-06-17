<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PDF</title>
    <style>
 td, th {
  border: 1px solid #000;
}




table {
  width: 100%;
  border-collapse: collapse;
}
</style>



</head>
<body>
<div style="padding:0px 5px 5px 0px;">

       <button class="btn btn-sm btn-secondary"  onclick="window.print()">Print</button>

         <!-- <button class="btn btn-sm btn-secondary">Print</button> 
         <button class="btn btn-sm btn-secondary">Download</button> -->


    <table width="100%" >
    <tr >
        <td align="center">
            <img src="<?php echo base_url()."dist/"; ?>images/ashish-container-logo.png" alt="" width="70%">
        </td>
        <td width="75%" align="center" style="padding: 5px;">
            <span style=" font-size: 22px; text-align: left; font-weight: bold; color: #00ACEE;"> ASHISH CONTAINER SERVICE</span><br>
            <span style=" font-size: 13px; text-align: left; font-weight: 500; color: #333333;">236-A, HARI GANGA NAGAR, NEAR INDUSTOWN, HOSHANGABAD ROAD, BHOPAL - 462047</span><br>
            <span style=" font-size: 13px; text-align: left; font-weight: 500; color: #333333;">STATE : MAHARASHTRA STATE CODE: 27</span><br>
            <span style=" font-size: 13px; text-align: left; font-weight: 500; color: #333333;">GSTIN : 27AACCP4486A1ZJ</span><br>
            <span style=" font-size: 13px; text-align: left; font-weight: 500; color: #333333;">STATE : CIN : U63010UP2002PLC026577</span><span style=" font-size: 11px; text-align: left; font-weight: 500; color: #333333; padding-left: 20px;">PAN : AACCP4486A</span>
        </td>
    </tr>
    <tr >
        <td  width="25%" align="left" style="padding:5px; ">
            <span style=" font-size: 15px; text-align: left; font-weight: 800; color: #000;"><b>Invoice To:</b></span><br>
            <span style=" font-size: 13px; text-align: left; font-weight: 500; color: #333333;"><?php echo $row->customerAddress; ?> </span><br>
            <span style=" font-size: 13px; text-align: left; font-weight: 500; color: #333333;">City: <?php echo $row->customerCity; ?> </span><br>
            <span style=" font-size: 13px; text-align: left; font-weight: 500; color: #333333;">Phone: +91-<?php echo $row->customerMobileNo; ?> +91-<?php echo $row->customerMobileNo1; ?></span><br>
            <span style=" font-size: 13px; text-align: left; font-weight: 500; color: #333333;">Email ID: <?php echo $row->customerEmailID; ?></span><br>
            <span style=" font-size: 15px; text-align: left; font-weight: 800; color: #000;">Supply of State</span><span style=" font-size: 11px; text-align: left; font-weight: 500; color: #333333; padding-left: 20px;"><?php echo $row->customerState; ?></span><br>
            <span style=" font-size: 15px; text-align: left; font-weight: 800; color: #000;">STATE CODE:</span><span style=" font-size: 11px; text-align: left; font-weight: 500; color: #333333; padding-left: 20px;"><?php echo $row->customerStateCode; ?></span><br>
            <span style=" font-size: 15px; text-align: left; font-weight: 800; color: #000;">GSTIN :<?php echo $row->customerGSTNo; ?></span>
        </td>
        <td  width="75%" align="right" style=" " >
            <table cellpadding="0" cellspacing="0" width="100%" >
                <tr  >
                    <td width="35%" style="padding: 5px;">
                        <span style=" font-size: 15px; text-align: left; font-weight: 800; color: #000; "><b> Invoice No.: </b></span>
                        <span style=" font-size: 15px; text-align: right; margin-left: 100px; font-weight: 800; color: #000;"><b> Date: </b></span><br>
                         <span style=" font-size: 13px; margin-right: 80px; text-align: left; font-weight: 500; color: #000;"><b> <?php echo $row->billNo; ?> </b></span>
                        <span style=" font-size: 13px; text-align: right; font-weight: 500; color: #000;"><b> <?php echo date("d-m-Y",strtotime($row->billDate)) ; ?> <?php echo date("H:i A",strtotime($row->billTime)) ; ?> </b></span>
                    </td>
                    <td width="35%" style="padding: 5px;">
                        <span style=" font-size: 15px; text-align: left; font-weight: 800; color: #000;"><b> LR/GR No.  </b></span><br>
                        <span style=" font-size: 13px; text-align: right; font-weight: 600; color: #000;"><b> <?php echo $row->lrGrNo; ?> &nbsp;&nbsp; Date: <?php echo date("d-m-Y",strtotime($row->lrGrDate)); ?></b></span>
                    </td>
                    <td width="30%" style="padding: 5px;">
                    <span style=" font-size: 15px; text-align: left; font-weight: 800; color: #000;"><b> TRAILOR NO. </b></span><br>
                        <span style=" font-size: 13px; text-align: right; font-weight: 600; color: #000;"><b> <?php echo $row->vehicleNo; ?> </b></span>
                    </td>
                </tr>
            </table>
            <table cellpadding="0" cellspacing="0" width="100%" >
                <tr >
                    <td width="35%" rowspan="2" style="padding: 5px;">
                        <span style=" font-size: 12px; text-align: right; font-weight: 600; color: #000;"><b> ASHISH CONTAINER SERVICE, 236-A, HARI GANGA NAGAR, NEAR INDUSTOWN, HOSHANGABAD ROAD, BHOPAL - 462047</b></span>
                    </td>
                    <td width="35%" style="padding: 5px;">
                       <span style=" font-size: 15px; text-align: left; font-weight: 800; color: #000;"><b> Loading Point </b></span><br>
                        <span style=" font-size: 13px; text-align: right; font-weight: 600; color: #000;"><b> <?php echo $row->loadingPoint; ?></b></span>
                    </td>
                    </td>
                    <td width="30%" style="padding: 5px;">
                    <span style=" font-size: 15px; text-align: left; font-weight: 800; color: #000;"><b> Off Loading Point </b></span><br>
                        <span style=" font-size: 13px; text-align: right; font-weight: 600; color: #000;"><b> <?php echo $row->offLoadingPoint; ?> </b></span>
                    </td>
                </tr>
            </table>
            <table cellpadding="0" cellspacing="0" width="100%" >
                <tr >
                    <td width="35%" style="padding: 5px;">
                       <span style=" font-size: 15px; text-align: left; font-weight: 800; color: #000;"><b>Port of Discharge </b></span><br>
                       <span style=" font-size: 13px; text-align: right; font-weight: 600; color: #000;"><b> <?php echo $row->portOfDischarge; ?> </b></span>
                    </td>
                    </td>
                    <td width="30%" style="padding: 5px;">
                    <span style=" font-size: 15px; text-align: left; font-weight: 800; color: #000;"><b> Gr.Wt(Kg/MT) </b></span><br>
                    <span style=" font-size: 13px; text-align: right; font-weight: 600; color: #000;"><b> <?php echo $row->grossWeight; ?> </b></span>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr >
        <td colspan="2" >
            <table role="presentation" border="0" cellpadding="5" cellspacing="0" width="100%" style=" line-height: 16px;" >
                <tr >
                    <th width="7%" align="left">S. No.</th>
                    <th width="28%" align="left">Description</th>
                    <th width="10%" align="center">SAC </th>
                    <th width="10%" align="center">Qty/CBM</th>
                    <th width="10%" align="center">Curr</th>
                    <th width="10%" align="center">Unit Rate</th>
                    <th width="25%" align="right">Total Amount (INR)</th>
                   <!--  <th width="15%" align="center">Taxable Amount</th> -->
                </tr>
                <tr >
                    <td align="left" >1</td>
                    <td align="left"><?php echo $row->description1; ?></td>
                    <td align="center"><?php echo $row->sacNo; ?> </td>
                    <td align="center">1</td>
                    <td align="center"> INR</td>
                    <td align="center"><?php echo number_format($row->invoiceAmt,2); ?></td>
                    <td align="right"><?php echo number_format($row->invoiceAmt,2); ?></td>
                    <!-- <td align="center">0.00</td> -->
                </tr>

                <tr >
                    <td align="left" >2</td>
                    <td align="left"><?php echo $row->description2; ?></td>
                    <td align="center"><?php echo $row->sacNo; ?> </td>
                    <td align="center">1</td>
                    <td align="center"> INR</td>
                    <td align="center"></td>
                    <td align="right"></td>
                    <!-- <td align="center">0.00</td> -->
                </tr>

                <tr >
                    <td align="left" height="400px"></td>
                    <td align="left"></td>
                    <td  align="center"></td>
                    <td  align="center"></td>
                    <td  align="center"></td>
                    <td  align="center"></td>
                    <td align="right"></td>
                    <!-- <td align="center">0.00</td> -->
                </tr>

                <tr >
                    <td align="left"></td>
                    <td align="left"></td>
                    <td  align="center"></td>
                    <td  align="center"></td>
                    <!-- <td  align="center"></td> -->
                    <td colspan="2"  align="center"><b>INVOICE AMOUNT</b></td>
                    <td align="right"><b><?php echo number_format($row->invoiceAmt,2); ?></b></td>
                </tr>
                
                
            </table>
        </td>
    </tr>
</table>

</div>
</body>
</html>
