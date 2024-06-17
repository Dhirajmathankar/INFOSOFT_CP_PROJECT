<?php   //ALTER TABLE `admin_login` CHANGE `mobile` `mobile` VARCHAR(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Superadmindashbord extends CI_Controller {   
    function __construct()
    {
    parent::__construct(); 
    if($this->session->userdata('usertype')!="Superadmin")
    { 
    redirect(base_url().'login'); 
    } 
    $this->load->model('super_admin_model'); 
    $this->load->library('image_lib');
    $this->load->library('email');
    $this->load->library('form_validation'); 
    $this->load->helper('master_name_helper'); 
    $this->lang->load('locale','english'); 
    $language = '';
        if ($this->input->post('locale')) {
            $language = $this->input->post('locale');
            if($language == 'bn') {
                $this->lang->load('locale', 'bengali');
            } else if($language == 'hi') {
                $this->lang->load('locale', 'hindi');
            } else if($language == 'nl') {
                $this->lang->load('locale', 'dutch');
            } else if($language == 'fr') {
                $this->lang->load('locale', 'french');
            } else {
                $this->lang->load('locale', 'english');
            }
        } else {
            $this->lang->load('locale', 'english');
        }
        
        $data['language'] = $language == '' ? 'en' : $language;
         

    header('Cache-Control: no-store,no-cache,must-revalidate');    
    header('Cache-Control: post-check=0,pre-check=0',false);       
    header('Pragma:no-cache');
    if($this->session->userdata('username')=='' || (!$this->session->userdata('username')))
    {
        redirect(base_url().'', 'refresh');
    }
    } 
      
    public function resize($image_data,$width,$height) { 
    $cpathexp = explode("/",$image_data['full_path']);
    $last1 = array_reverse($cpathexp); $ccc = explode("?",$last1[0]);
    $img=$ccc[0];
    $config['image_library'] = 'gd2';
    $config['source_image'] = $image_data['full_path'];
    $config['new_image'] = $image_data['full_path'];  
    $config['width'] = $width;
    $config['height'] =$height; 
    $config['create_thumb'] = FALSE;
    $config['maintain_ratio'] = TRUE;
    $config['quality'] = '100%';
    $this->image_lib->clear(); 
    $this->image_lib->initialize($config);
    $src = $config['new_image'];
    $data['new_image'] = substr($src, 2);
    $data['img_src'] = base_url() . $data['new_image']; 
    $this->image_lib->resize(); 
    return $data;
    }
        
     
    public function index(){ 
        $this->load->view('admin_header');
        $this->load->view('welcome_message');
        $this->load->view('admin_footer');  
    }
    //Group Master Table start
    public function manage_group_master(){ 
    $data['fetch'] =$this->super_admin_model->manage_group_master($data);
    $this->load->view('admin_header');
    $this->load->view('siteadmin/manage_group_master',$data); 
    $this->load->view('admin_footer');
    } 
    //add Group Master Table start
    public function addGroup(){
    $this->load->view('admin_header');
    $this->load->view('siteadmin/addGroup'); 
    $this->load->view('admin_footer');
    }
    function groupSubmit()
    {   
    $data = array(
        'group_name'=>$this->input->post('group_name'),
        
        'status'=>"Active"
    );
    $res = $this->super_admin_model->groupSubmit($data);

    if($res>0)
    {   $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible" role="alert" style="border-radius: 4px;background: #50ad6c;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-check" aria-hidden="true"></i> Group Added Successfully!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
    }else{
        $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible" role="alert" style="border-radius: 4px;font-size: 16px;text-align: center;color: #fff;"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Server Error!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
    } 
    redirect(base_url().'superadmindashbord/manage_group_master'); 
    }
    public function groupEdit(){ 
    $gid= $this->uri->segment(3);        
    $data['row']=  $this->super_admin_model->groupEdit($gid); 
    $this->load->view('admin_header');
    $this->load->view('siteadmin/groupEdit',$data); 
    $this->load->view('admin_footer');
    } 
    public function groupUpdate(){
    $gid = $this->input->post('gid');
    $data = array(
    'group_name'=>$this->input->post('group_name'),
    'status'=>$this->input->post('status')
    ); 
    $res=  $this->super_admin_model->groupUpdate($gid,$data); 
    if($res>0)
    {   $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible" role="alert" style="border-radius: 4px;background: #50ad6c;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-check" aria-hidden="true"></i> Group Updated Successfully!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>'); 
        
    }else{
        $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible" role="alert" style="border-radius: 4px;font-size: 16px;text-align: center;color: #fff;"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Server Error!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
    }  
    redirect(base_url().'superadmindashbord/manage_group_master' ); 
    }
    public function groupDelete(){
    $gid =$this->uri->segment(3);
    $res= $this->super_admin_model->groupDelete($gid);
    if($res>0)
        {   $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible" role="alert" style="border-radius: 4px;background: #50ad6c;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-check" aria-hidden="true"></i> Group Info Deleted Successfully!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>'); 
            
        }else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible" role="alert" style="border-radius: 4px;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Server Error!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
        }  
        redirect(base_url().'superadmindashbord/manage_group_master' ); 
    } 

    //Product Master Table start
    public function product_master(){ 
    $data['fetch'] =$this->super_admin_model->product_master($data);
    $this->load->view('admin_header');
    $this->load->view('siteadmin/product_master',$data); 
    $this->load->view('admin_footer');
    } 
    //add Product Master Table start
    public function addProduct(){
    $this->load->view('admin_header');
    $this->load->view('siteadmin/addProduct'); 
    $this->load->view('admin_footer');
    } 
    //add Product Master Table start
    public function addProduct1(){
    $this->load->view('admin_header');
    $this->load->view('siteadmin/addProduct1'); 
    $this->load->view('admin_footer');
    }

    function productSubmit()
    {   
        // echo "<pre>";
        // print_r("hi hello");
        // exit();
        $table='product'; $getGeneratedId='product_id'; $auto_id='id'; $code='SGAG';
        $dynamicid =makeDynamicID($table,$getGeneratedId,$auto_id);  //pass table name Which You Want To make Dynamic ID
        $genratedID =  $code."-".str_pad(substr($dynamicid->id, 6) + 1, 4, 0, STR_PAD_LEFT);
        $data = array(
            'product_id'=>$genratedID,
            'product_name'=>$this->input->post('product_name'),
            'product_company_name'=>$this->input->post('product_company_name'),
            'gid'=>$this->input->post('gid'),
            'price'=>$this->input->post('price'),
            'hsn_code'=>$this->input->post('hsn_code'),
            'unit'=>$this->input->post('unit'),
            'gst'=>$this->input->post('gst'),
            'createdDate'=>date('Y-m-d'),
            'status'=>"Active"
        );
        $res = $this->super_admin_model->productSubmit($data);

        if($res>0)
        {   $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible" role="alert" style="border-radius: 4px;background: #50ad6c;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-check" aria-hidden="true"></i> Product Added Successfully!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>'); 
        }else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible" role="alert" style="border-radius: 4px;font-size: 16px;text-align: center;color: #fff;"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Server Error!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
        } 
        redirect(base_url().'superadmindashbord/product_master'); 
    }

    public function productEdit(){ 
    $pid= $this->uri->segment(3);        
    $data['row']=  $this->super_admin_model->productEdit($pid); 
    $this->load->view('admin_header');
    $this->load->view('siteadmin/productEdit',$data); 
    $this->load->view('admin_footer');
    } 

    public function productUpdate(){
    $pid = $this->input->post('pid');
    $data = array(
    'product_name'=>$this->input->post('product_name'),
    'gid'=>$this->input->post('gid'),
    'product_company_name'=>$this->input->post('product_company_name'),
    'price'=>$this->input->post('price'),
    'hsn_code'=>$this->input->post('hsn_code'),
    'unit'=>$this->input->post('unit'),
    'gst'=>$this->input->post('gst'),
    'status'=>$this->input->post('status')
    ); 

    //  echo "<pre>";
    // print_r($data);
    // exit();
    $res=  $this->super_admin_model->productUpdate($pid,$data); 
        if($res>0)
        {   $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible" role="alert" style="border-radius: 4px;background: #50ad6c;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-check" aria-hidden="true"></i> Product Updated Successfully!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>'); 
            
        }else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible" role="alert" style="border-radius: 4px;font-size: 16px;text-align: center;color: #fff;"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Server Error!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
        }  
        redirect(base_url().'superadmindashbord/product_master' ); 
    }
    public function productDelete(){
    $pid =$this->uri->segment(3);
    $res= $this->super_admin_model->productDelete($pid);
    if($res>0)
        {   $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible" role="alert" style="border-radius: 4px;background: #50ad6c;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-check" aria-hidden="true"></i> Product Info Deleted Successfully!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>'); 
            
        }else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible" role="alert" style="border-radius: 4px;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Server Error!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
        }  
        redirect(base_url().'superadmindashbord/product_master' ); 
    } 
    public function addcustomer(){ 
    $this->load->view('admin_header');
    $this->load->view('siteadmin/addcustomer'); 
    $this->load->view('admin_footer');
    }
    public function customer_master(){ 
    $data['fetch'] =$this->super_admin_model->manage_customer($data);
    $this->load->view('admin_header');
    $this->load->view('siteadmin/customer_master',$data); 
    $this->load->view('admin_footer');
    } 
    public function customerSubmit(){

    $data = array(    
        'customerName'=>ucwords($this->input->post('customerName')),
        'customerAddress' =>ucwords($this->input->post('customerAddress')),
        'customerCity' =>$this->input->post('customerCity'),
        'customerPINCode' =>$this->input->post('customerPINCode'),
        'customerState' =>$this->input->post('customerState'),
        'customerStateCode' =>$this->input->post('customerStateCode'),
        'customerMobileNo' =>$this->input->post('customerMobileNo'),
        'customerMobileNo1' =>$this->input->post('customerMobileNo1'),
        'customerEmailID' =>$this->input->post('customerEmailID'),
        'customerGSTNo' =>strtoupper($this->input->post('customerGSTNo')),
        'customerAdhaarNo' =>$this->input->post('customerAdhaarNo'),
        'customerPANNo' =>strtoupper($this->input->post('customerPANNo')),
        'customerOpeningBalance' =>$this->input->post('customerOpeningBalance'),
        'customerClosingBalance' =>$this->input->post('customerClosingBalance'),
        'partyType' =>$this->input->post('partyType'),
        'bankAccountNo' =>$this->input->post('bankAccountNo'),
        'bankifscCode' =>$this->input->post('bankifscCode'),
        'createdDateCustomer'=>date("Y-m-d H:i:s"),   
        'statusCustomer'=>$this->input->post('statusCustomer')
    ); 

    // echo "<pre>";
    // print_r($data);
    // exit();
    $res=  $this->super_admin_model->customerSubmit($data);   
        if($res>0)
        {   $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible" role="alert" style="border-radius: 4px;background: #50ad6c;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-check" aria-hidden="true"></i> Customer Info Added Successfully!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>'); 
            
        }else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible" role="alert" style="border-radius: 4px;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Server Error!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
        }  
        redirect(base_url().'superadmindashbord/customer_master' ); 
    }
    public function customerEdit(){ 
    $cid= $this->uri->segment(3);        
    $data['row']=  $this->super_admin_model->customerEdit($cid); 
    $this->load->view('admin_header');
    $this->load->view('siteadmin/customerEdit',$data); 
    $this->load->view('admin_footer');
    }
    public function customerUpdate(){
    $cid = $this->input->post('cid');
    $data = array(    
        'customerName'=>ucwords($this->input->post('customerName')),
        'customerAddress' =>ucwords($this->input->post('customerAddress')),
        'customerCity' =>$this->input->post('customerCity'),
        'customerPINCode' =>$this->input->post('customerPINCode'),
        'customerState' =>$this->input->post('customerState'),
        'customerStateCode' =>$this->input->post('customerStateCode'),
        'customerMobileNo' =>$this->input->post('customerMobileNo'),
        'customerMobileNo1' =>$this->input->post('customerMobileNo1'),
        'customerEmailID' =>$this->input->post('customerEmailID'),
        'customerGSTNo' =>strtoupper($this->input->post('customerGSTNo')),
        'customerAdhaarNo' =>$this->input->post('customerAdhaarNo'),
        'customerPANNo' =>strtoupper($this->input->post('customerPANNo')),
        'customerOpeningBalance' =>$this->input->post('customerOpeningBalance'),
        'customerClosingBalance' =>$this->input->post('customerClosingBalance'),
        'partyType' =>$this->input->post('partyType'),
        'bankAccountNo' =>$this->input->post('bankAccountNo'),
        'bankifscCode' =>$this->input->post('bankifscCode'),
        'createdDateCustomer'=>date("Y-m-d H:i:s"),   
        'statusCustomer'=>$this->input->post('statusCustomer')
    ); 

    // echo "<pre>";
    // print_r($data);
    // exit();
    $res=  $this->super_admin_model->customerUpdate($cid,$data);   
        if($res>0)
        {   $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible" role="alert" style="border-radius: 4px;background: #50ad6c;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-check" aria-hidden="true"></i> Customer Info Edit Successfully!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>'); 
            
        }else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible" role="alert" style="border-radius: 4px;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Server Error!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
        }  
        redirect(base_url().'superadmindashbord/customer_master' ); 
    }
    public function customerDelete(){
    $cid =$this->uri->segment(3);
    $res= $this->super_admin_model->customerDelete($cid);
    if($res>0)
        {   $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible" role="alert" style="border-radius: 4px;background: #50ad6c;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-check" aria-hidden="true"></i> Customer Info Deleted Successfully!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>'); 
            
        }else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible" role="alert" style="border-radius: 4px;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Server Error!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
        }  
        redirect(base_url().'superadmindashbord/customer_master' ); 
    }
    public function newCustomerSubmit(){

    $data = array(    
        'customerName'=>ucwords($this->input->post('customerName')),
        'customerAddress' =>ucwords($this->input->post('customerAddress')),
        'customerCity' =>$this->input->post('customerCity'),
        'customerMobileNo' =>$this->input->post('customerMobileNo'),
        'customerMobileNo1' =>$this->input->post('customerMobileNo1'),
        'customerAdhaarNo' =>$this->input->post('customerAdhaarNo'),
        'customerPANNo' =>strtoupper($this->input->post('customerPANNo')),
        'partyType' =>"Party Type-Cash",
        'createdDateCustomer'=>date("Y-m-d H:i:s"),   
        'statusCustomer'=>"Active"
    ); 

    // echo "<pre>";
    // print_r($data);
    // exit();
    $res=  $this->super_admin_model->newCustomerSubmit($data);   
        if($res>0)
        {   $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible" role="alert" style="border-radius: 4px;background: #50ad6c;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-check" aria-hidden="true"></i> Customer Info Added Successfully!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>'); 
            
        }else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible" role="alert" style="border-radius: 4px;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Server Error!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
        }  
        redirect(base_url().'superadmindashbord/entryBill' ); 
    } 

//Bill Table
    public function manage_bill(){ 
    $data['fetch'] =$this->super_admin_model->manage_bill($data);
    $this->load->view('admin_header');
    $this->load->view('siteadmin/manage_bill',$data); 
    $this->load->view('admin_footer');
    } 
    public function entryBill(){
    $this->load->view('admin_header');
    //$this->load->view('siteadmin/testentryBill'); 
    $this->load->view('siteadmin/entryBill'); 
    $this->load->view('admin_footer');
    }
    public function show_customer(){   
        $cid = $this->input->post('cid');
        echo json_encode(showCustomerDetail($cid));  
        exit();
    }
    public function show_Item_Details(){   
        $pid = $this->input->post('pid');
        echo json_encode(showItemDetails($pid));  
        exit();
    }

    function billSubmit()
    {   
        $data = $this->input->post('data');
        $rowdata=$data["billRecord"];
        $count=count($rowdata);

        $table='bill_master'; $getGeneratedId='billid'; $auto_id='id'; $code='SGAG';
        $dynamicid =makeDynamicID($table,$getGeneratedId,$auto_id);  //pass table name Which You Want To make Dynamic ID
        $genratedID =  $code."-".str_pad(substr($dynamicid->id, 6) + 1, 4, 0, STR_PAD_LEFT);
        
        $data = array(
            'billid'=>$genratedID,
            'paymentType'=>$data["modeofPayment"],//no == credit,yes== cash
            'cid'=>$data["cid"],
            'customerGSTNo'=>$data["customerGSTNo"],
            'narration'=>$data["remark"],
            'qtyTotal'=>$data["qtyTotal"],
            'priceTotal'=>$data["fullTotal"],
            'gstTotal'=>$data["gstTotal"],
            'customerStateCode'=>$data["customerStateCode"],
            'totalAmount'=>$data["totalAmount"],
            'createdDate'=>date('Y-m-d H:i:s'),
            'status'=>"Active"
        );
        $res = $this->super_admin_model->billSubmit($data);


        $bid = $this->db->insert_id();
        
        for($i=0; $i < $count; $i++) {
            $data1=array(
                'bid'=>$bid,
                'pid'=>$rowdata[$i]["pid"],
                'qty'=>$rowdata[$i]["qty"],
                'unit'=>$rowdata[$i]["unit"],
                'price'=>$rowdata[$i]["price"],
                'gst'=>$rowdata[$i]["gst"],
                'gstamount'=>$rowdata[$i]["gstTotal"],
                'total'=>$rowdata[$i]["total"]
            );
        $this->super_admin_model->itemdataSubmit($data1);
        }

        echo json_encode("success");
    }

    public function billDelete(){
    $bid =$this->uri->segment(3);
    $res= $this->super_admin_model->billDelete($bid);
    $res1= $this->super_admin_model->billItemDelete($bid);
    if($res>0)
        {   $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible" role="alert" style="border-radius: 4px;background: #50ad6c;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-check" aria-hidden="true"></i> Bill Deleted Successfully!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>'); 
            
        }else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible" role="alert" style="border-radius: 4px;font-size: 14px;text-align: center;color: #fff;"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Server Error!<button title="close" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
        }  
        redirect(base_url().'superadmindashbord/manage_bill' ); 
    } 

    public function dhiraj_index(){
        $this->load->view('viewdhiraj');
    }

}
?>