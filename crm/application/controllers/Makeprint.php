<?php
    
    if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Makeprint extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->library('Pdf');
            $this->load->model('super_admin_model');
            $this->load->helper('master_name_helper');
        }




        ///Testing Demo PDF HTML Loop
        public function bill_invoice_pdf() {       
           $blid = $this->uri->segment(3);
          $data['row'] = $this->super_admin_model->printPDF($blid);

          
          $this->load->view('makeprint/printPDF',$data ,TRUE);
         // echo "<pre>";
         //   print_r($data['fetch']);
         //   exit();
         //redirect(base_url().'superadmindashbord/manage_bill');
        } 





        // Generate Quotation PDF File
         public function billPDF() {
                        
           $htmlContent='';
           $bid = $this->uri->segment(3);
           $cid = $this->uri->segment(4);
           $data['row'] = $this->super_admin_model->billPDF($bid);
           $data['fetch'] = $this->super_admin_model->customerDetails($cid);
           $data['item'] = $this->super_admin_model->itemDetails($bid);
           // $pid = $data['item']->itempid;
           // echo "<pre>";
           // print_r($pid);
           // exit();


            $htmlContent = $this->load->view('makeprint/billPDF', $data, TRUE);
            $this->createPDF($htmlContent);
            redirect(base_url().'superadmindashbord/manage_bill'); 
         }


        // create pdf file 
        public function createPDF($html) {
            ob_start(); 
            // Include the main TCPDF library (search for installation path).
            $this->load->library('Pdf');



            
            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('SSI');
            $pdf->SetTitle('SSI | BILL PDF');
            $pdf->SetSubject('SSI - BILL');
            $pdf->SetKeywords('SSI, BILL');

            // set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

            // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            
            $pdf->SetPrintHeader(false);
            $pdf->SetPrintFooter(false);

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(0);
            $pdf->SetFooterMargin(0);

            // set auto page breaks
            //$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->SetAutoPageBreak(TRUE, 0);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }       

            // set font
            $pdf->SetFont('Helvetica', '', 10);

            // add a page
            $pdf->AddPage();

            // output the HTML content
            $pdf->writeHTML($html, true, false, true, false, '');

            // QRCODE Start new style
            // set style for barcode
            $style = array(
                
                'vpadding' => 'auto',
                'hpadding' => 'auto',
                'fgcolor' => array(0,0,0),
                'bgcolor' => false, //array(255,255,255)
                'module_width' => 1, // width of a single module in points
                'module_height' => 1 // height of a single module in points
            );
            //$pdf->write2DBarcode('$style', 'QRCODE,H', 165, 45, 50, 50, $style, 'N');

            /*$style = array(
                'border' => 2,
                'vpadding' => 'auto',
                'hpadding' => 'auto',
                'fgcolor' => array(0,0,0),
                'bgcolor' => false, //array(255,255,255)
                'module_width' => 1, // width of a single module in points
                'module_height' => 1 // height of a single module in points
            );*/

            // QRCODE,H : QR-CODE Best error correction
            
            //$pdf->Text(140, 205, '');
            // QRCODE END



            // reset pointer to the last page
            $pdf->lastPage();       
            ob_end_clean();
            //Close and output PDF document
            $pdf->Output(date("d_M_Y").'_SSI_Bill_Invoice.pdf', 'I'); 

            // "abc".date("d_M_Y").".xls"       
        }


    }
?>