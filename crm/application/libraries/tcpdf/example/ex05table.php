<?php


/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('EZZY Relocation');
$pdf->SetTitle('EZZY Relocation | Quotation');
$pdf->SetSubject('EZZY Relocation - Quotation');
$pdf->SetKeywords('EZZY Relocation, Quotation');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' - Quotation', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
  require_once(dirname(__FILE__).'/lang/eng.php');
  $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

$title = <<<EOD
<h3>Quotation Report</h3>
EOD;
$pdf->WriteHTMLCell(0, 0, '', '', $title, 0, 1, 0, true, C, true);
$table= '<table style="border:1px solid #000; padding: 6px;">';
$table.= '<tr style="background-color:#ddd;">
             <th style="border:1px solid #000;">S.No.</th>
             <th style="border:1px solid #000;">Name</th>
             <th style="border:1px solid #000;">Quotation No.</th>
             <th style="border:1px solid #000;">Transport From</th>
             <th style="border:1px solid #000;">Transport To</th>
          </tr>';
          $sn=1;
        foreach ($dataresult as $row) {
$table.= '<tr>
             <td style="border:1px solid #000;">'.$sn++.'</td>
             <td style="border:1px solid #000;">'.$row->clientName.'</td>
             <td style="border:1px solid #000;">'.$row->quotationNo.'</td>
             <td style="border:1px solid #000;">'.$row->transportFrom.'</td>
             <td style="border:1px solid #000;">'.$row->transportTo.'</td>
          </tr>';
          }
$table.= '</table>';


$pdf->WriteHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, L, true);


// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
ob_clean();
$pdf->Output('quotation.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+