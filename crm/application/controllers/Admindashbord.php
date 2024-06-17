<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/PHPExcel.php";
class Admindashbord extends CI_Controller { 
	function __construct()
	{
	parent::__construct(); 
	if(!($this->session->userdata('aid')))
	{ 
	redirect(base_url().'login'); 
	} 
 	$this->load->model('admin_model'); 
	$this->load->library('image_lib');
        $this->load->library('email'); 
        $this->load->library('excel');
        $this->load->helper('master_name_helper');
 	admin_header('Cache-Control: no-store,no-cache,must-revalidate');	   
	admin_header('Cache-Control: post-check=0,pre-check=0',false);	   
	admin_header('Pragma:no-cache');
	if($this->session->userdata('username')=='' || (!$this->session->userdata('username')))
	{
        redirect(base_url().'', 'refresh');
	}
	} 
   
	public function resize($image_data,$width,$height,$path) { 
	$cpathexp = explode("/",$image_data['full_path']);
	$last1 = array_reverse($cpathexp); $ccc = explode("?",$last1[0]);
	$img=$ccc[0];
	$config['image_library'] = 'gd2';
	$config['source_image'] = $image_data['full_path'];
	$config['new_image'] = $path . $img;
	$config['width'] = $width;
	$config['height'] =$height;
	$this->image_lib->initialize($config);
	$src = $config['new_image'];
	$data['new_image'] = substr($src, 2);
	$data['img_src'] = base_url() . $data['new_image'];
	// Call resize function in image library.
	$this->image_lib->resize();
	// Return new image contains above properties and also store in "uplods" folder.
	return $data;
	}
        
        
	 
	public function index(){    
            //$data['count_total_channel'] = $this->admin_model->count_total_channel(); 
            //$data['count_total_lco'] = $this->admin_model->count_total_lco();  
            //$data['countusers'] = $this->admin_model->num_user_rows(); 
            //$data['newtransection'] = $this->admin_model->newtransectioncount(); 
            //$data['totvendors'] = $this->admin_model->num_of_rows();  
            $arr= $this->admin_model->num_of_orderrows(); 
            $config['base_url'] = base_url("admindashbord/index");
            $config['per_page'] = 5;
            $config['total_rows'] = $arr[0]->cnt; 
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Prev';
            $config['next_tag_open'] = '<li class="pg-next">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="pg-prev">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>'; 
            $this->pagination->initialize($config); 
            $data['order'] = $this->admin_model->orderlist($config['per_page'],$this->uri->segment(3));  
            $this->load->view('admin_header');
            $this->load->view('welcome_message',$data);
            $this->load->view('admin_footer');
    	}
   
        public function manage_payment_cycle($offset=0){  
             // PAGINATION STRAT FROM HERE 
            $arr= $this->admin_model->num_of_rows(); 
            $config['base_url'] = base_url("admindashbord/manage_payment_cycle");
            $config['per_page'] = 5;
            $config['total_rows'] = $arr[0]->cnt; 
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Prev';
            $config['next_tag_open'] = '<li class="pg-next">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="pg-prev">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>'; 
            $this->pagination->initialize($config); 
            $data['fetch'] = $this->admin_model->lcolist($config['per_page'],$this->uri->segment(3));   
            $this->load->view('admin_header');            
            $this->load->view('siteadmin/manage_payment_cycle',$data); 
            // PAGINATION END            
            $this->load->view('admin_footer');
	}
         
        
        
        
        
        
  public function testing(){  
            $this->load->view('admin_header');
            $this->load->view('siteadmin/testing');
            $this->load->view('admin_footer');
    }      
        
        
        
        
        
        
        
        
        
	public function lco_registration(){ 
        //$data['allbusiness'] = $this->admin_model->showallbusiness();
       // $data['subslist']= $this->admin_model->subslist();
        $this->load->view('admin_header');
        $this->load->view('siteadmin/lco_registration');
        $this->load->view('admin_footer');
	}
        
    public function lco_view_edit(){ 
        $vid = $this->uri->segment(3);  
        $this->load->view('admin_header');
        $data['detail'] = $this->admin_model->lco_view($vid); 
       // print_r($data['detail']); exit;
        $this->load->view('siteadmin/loc_view',$data);
        $this->load->view('admin_footer');
   } 
         
    public function lco_payment($offset=0){  
        $vid = $this->uri->segment(3);  
        $arr= $this->admin_model->num_of_payment_rows($vid); 
        $config['base_url'] = base_url("admindashbord/manage_payment_cycle");
        $config['per_page'] = 5;
        $config['total_rows'] = $arr[0]->cnt; 
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['next_tag_open'] = '<li class="pg-next">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="pg-prev">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>'; 
        $this->pagination->initialize($config); 
        $data['fetch'] = $this->admin_model->lco_payment_detail($config['per_page'],$this->uri->segment(3)); 
        $this->load->view('admin_header');
       // $data['detail'] = $this->admin_model->lco_payment_detail($vid); 
        $this->load->view('siteadmin/lco_payment',$data);
        $this->load->view('admin_footer');
	} 
         
    public function add_lco_payment(){ 
        $sdate = date('Y-m-d',strtotime($this->input->post('start_date'))); 
        $edate = date('Y-m-d', strtotime($this->input->post('start_date'). ' + 1 month')); 
            $data = array( 
            'lcoid' => $this->input->post('lcoid'),
            'price' => $this->input->post('payment_price'),
            'payment_date' => $sdate,
            'pay_alert_date' => $edate,
            'datetime' => date('Y-m-d H:i:s')
            ); 
        $dataret=  $this->admin_model->add_lco_payment($data);  
        $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> LCO Payment Added..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
        redirect(base_url().'admindashbord/lco_payment/'.$this->input->post('lcoid'));  
  
    }
        
        
	public function lcolist($offset=0){  
             // PAGINATION STRAT FROM HERE 
            $arr= $this->admin_model->num_of_rows(); 
            $config['base_url'] = base_url("admindashbord/lcolist");
            $config['per_page'] = 5;
            $config['total_rows'] = $arr[0]->cnt; 
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Prev';
            $config['next_tag_open'] = '<li class="pg-next">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="pg-prev">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>'; 
            $this->pagination->initialize($config); 
            $data['fetch'] = $this->admin_model->lcolist($config['per_page'],$this->uri->segment(3));   
            $this->load->view('admin_header');            
            $this->load->view('siteadmin/lcolist',$data); 
            // PAGINATION END            
            $this->load->view('admin_footer');
	}
         

 

	public function addlco(){  
             $uid =make_userid();   
            if($uid[0]->lcoid==0){
                $userid = 'NH-1';
            }
            else{
                 $vv=  (int)$uid[0]->lcoid;
                 $vv=$vv+1; 
                $userid = 'NH-'.$vv;
            }  
            $password =  substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8);
 
        $data = array(
        'user_id'=> $userid,
        'fname' => $this->input->post('fname'),
        'lname' => $this->input->post('lname'),
        'gstin' => $this->input->post('gstin'),
        'adhar_no' => $this->input->post('adhar_no'),
        'gender' => $this->input->post('gender'), 
        'mobile' => $this->input->post('mobile'), 
        'emailid' => $this->input->post('emailid'),
        'password' => $password,
        'address' => $this->input->post('address'),
        'state' => $this->input->post('state'),
        'city' => $this->input->post('city'), 
        'business_area' => $this->input->post('business_area'),
        'pincode' => $this->input->post('pincode'),
        'totalsubcriber' => $this->input->post('total_subscriber'),
        'charge_subscriber' => $this->input->post('charge_subscriber'),
        'mso_name' => $this->input->post('mso_name'),
        'mso_contact_no' => $this->input->post('mso_contact_no'),
        'business_name'=> $this->input->post('business_name'),
        'inserted_date'=> date('Y-m-d H:i:s') 
	); 
        //print_r($data); exit;
        /*
	$check_vendor = $this->admin_model->check_lco($this->input->post('mobile'),$this->input->post('emailid')); 
        if($check_vendor>0){
            $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Unsuccess!</strong> Vendor Has Been Already Inserted..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
            redirect(base_url().'admindashbord/lcolist');   
        }*/
	$this->admin_model->addelcoinsert($data); 
        
        
       
        $to = $this->input->post('emailid');
        $subject = "Your Cable Id And Password";
        $txt = "Your Id Is: ".$userid." and Password Is: ".$password;
        $admin_headers = "From: webmaster@example.com" . "\r\n" .
        "CC: somebodyelse@example.com";
        
        mail($to,$subject,$txt,$admin_headers);
        
        
        
	$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Vendor Has Been Inserted..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
	redirect(base_url().'admindashbord/lcolist'); 
    exit(); 
	} 
        
	public function updatelco(){   
        $data = array( 
        'fname' => $this->input->post('fname'),
	    'lname' => $this->input->post('lname'),
        'gstin' => $this->input->post('gstin'),
        'adhar_no' => $this->input->post('adhar_no'),
	    'gender' => $this->input->post('gender'), 
        'mobile' => $this->input->post('mobile'), 
        'emailid' => $this->input->post('emailid'),
        'password' => $this->input->post('password'),
        'address' => $this->input->post('address'),
        'city' => $this->input->post('city'),
        'pincode' => $this->input->post('pincode'),
        'status' => $this->input->post('status'), 
        'business_name'=> $this->input->post('business_name') 
	); 
	$res = $this->admin_model->lcoupdate($this->input->post('lcoid'), $data);  
        if($res==true){
	$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Vendor Has Been Updated..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
        } else {
         $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Unsuccess!</strong> Vendor Has Been Not Updated..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');    
        }
        redirect(base_url().'admindashbord/lcolist');  
        exit();
	}
        
        
	public function lco_delet(){   
        $data = array(
        'status' => 0
	);
	$res = $this->admin_model->lcoupdate($this->uri->segment(3), $data); 
         if($res==true){
	$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> LCO Has Deactive Successfully..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
         } else {
         $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Unsuccess!</strong> LCO Has Been Not Deactive..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');    
         }
         redirect(base_url().'admindashbord/lcolist');  
         exit();
	}
         
         
	public function showservics(){   
	$list['data'] = $this->admin_model->showservics($this->input->post('bid')); 
        $list['showservics']='1';
        $this->load->view('siteadmin/ajax_get_data',$list);        
        }
        
	public function userlist($offset=0){  
             // PAGINATION STRAT FROM HERE 
            $arr= $this->admin_model->num_user_rows(); 
            $config['base_url'] = base_url("admindashbord/userlist");
            $config['per_page'] = 5;
            $config['total_rows'] = $arr[0]->cnt; 
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Prev';
            $config['next_tag_open'] = '<li class="pg-next">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="pg-prev">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>'; 
            $this->pagination->initialize($config); 
            $data['fetch'] = $this->admin_model->userlist($config['per_page'],$this->uri->segment(3));   
            $this->load->view('admin_header');            
            $this->load->view('siteadmin/userlist',$data); 
            // PAGINATION END            
            $this->load->view('admin_footer');
	}
        
        
        // public function user_notifi_ajax(){  
        //     $arr= $this->admin_model->user_notifi_ajax();
        //      echo '1';
        // }
         
     
        
        
        
        
	//  BUSINESS LISTING QUERIES
        public function chanellist($offset=0){  
             // PAGINATION STRAT FROM HERE 
            $arr= $this->admin_model->totel_business_rows(); 
            $config['base_url'] = base_url("admindashbord/chanellist");
            $config['per_page'] = 5;
            $config['total_rows'] = $arr[0]->cnt;  
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Prev';
            $config['next_tag_open'] = '<li class="pg-next">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="pg-prev">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>'; 
            $this->pagination->initialize($config); 
            $data['fetch'] = $this->admin_model->chanellist($config['per_page'],$this->uri->segment(3)); 
            $data['packs'] = $this->admin_model->packslist(); 
            
            $this->load->view('admin_header');            
            $this->load->view('siteadmin/chanellist',$data); 
            // PAGINATION END            
            $this->load->view('admin_footer');
	} 
         
        
        public function chanel_view_edit(){ 
            $vid = $this->uri->segment(3);  
            $this->load->view('admin_header');
            $data['detail'] = $this->admin_model->chanel_view($vid);
            $data['packs'] = $this->admin_model->packslist(); 
            $this->load->view('siteadmin/chanel_view',$data);
            $this->load->view('admin_footer');
	}
        
        
        public function addchenal(){ 
             
            $file_name="";	
	
               if(!empty($_FILES['chanel_icon']['name']))	
            { 	
                $file_name=time()."-".$_FILES['chanel_icon']['name'];
                $config = array(
                'upload_path' => "./uploads/chanel",
                'allowed_types' => "jpg|jpeg|png",
                'max_size' => "0",
                'file_name' => $file_name
                ); 
                // Create a new 'f' element of the $_FILES object, and assign the name, type, tmp_name, error, and size properties to the corresponding 'chanel_icon' of this iteration of the FOR loop.
                $_FILES['f']['name'] =  $_FILES['chanel_icon']['name'];
                $_FILES['f']['type'] = $_FILES['chanel_icon']['type'];
                $_FILES['f']['tmp_name'] = $_FILES['chanel_icon']['tmp_name'];
                $_FILES['f']['error'] = $_FILES['chanel_icon']['error'];
                $_FILES['f']['size'] = $_FILES['chanel_icon']['size'];

                $this->load->library('upload', $config);
                $this->upload->initialize($config);            
                if (! $this->upload->do_upload('f'))
                {
                    $data['errors'] = $this->upload->display_errors();
                }
                else
                {   
                    $image_data = $this->upload->data();    
                    $data = $this->resize($image_data,50,50,'./uploads/chanel/'); 
                    $data['errors'] = "SUCCESS";
                } 
            }else{ $file_name = 'no_image.png';} 
            
            if($this->input->post('pack_no')){
          foreach ($this->input->post('pack_no') as $pack_no) { 
            $data = array(
            'chanel_name' => $this->input->post('chanel_name'),  
            'pack_value' => $this->input->post('pack_value'),  
            'chanel_value' => $this->input->post('chanel_value'), 
            'pack_no' => $pack_no, 
            'chanel_icon' =>$file_name, 
            'status' => $this->input->post('status')
            );  
            $this->admin_model->addchanelinsert($data); 
          }  
            }else{
                $data = array('chanel_name' => $this->input->post('chanel_name'),  
                'pack_no' => 0, 
                'pack_value' => $this->input->post('pack_value'),  
                'chanel_value' => $this->input->post('chanel_value'), 
                'chanel_icon' =>$file_name, 
                'status' => $this->input->post('status')
                );  
                $this->admin_model->addchanelinsert($data);  
            }
           $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Vendor Has Been Inserted..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
           redirect(base_url().'admindashbord/chanellist');
           exit();  
	} 
       
        
        public function updatechanel(){ 
             if(!empty($_FILES['chanel_icon']['name']))	
            { 	
                $file_name=time()."-".$_FILES['chanel_icon']['name'];
                $config = array(
                'upload_path' => "./uploads/chanel",
                'allowed_types' => "jpg|jpeg|png",
                'max_size' => "0",
                'file_name' => $file_name
                ); 
                // Create a new 'f' element of the $_FILES object, and assign the name, type, tmp_name, error, and size properties to the corresponding 'chanel_icon' of this iteration of the FOR loop.
                $_FILES['f']['name'] =  $_FILES['chanel_icon']['name'];
                $_FILES['f']['type'] = $_FILES['chanel_icon']['type'];
                $_FILES['f']['tmp_name'] = $_FILES['chanel_icon']['tmp_name'];
                $_FILES['f']['error'] = $_FILES['chanel_icon']['error'];
                $_FILES['f']['size'] = $_FILES['chanel_icon']['size']; 
                $this->load->library('upload', $config);
                $this->upload->initialize($config);            
                if (! $this->upload->do_upload('f'))
                {
                    $data['errors'] = $this->upload->display_errors();
                }
                else
                {   
                    $image_data = $this->upload->data();    
                    $data = $this->resize($image_data,50,50,'./uploads/chanel/'); 
                    unlink('./uploads/chanel/'.$this->input->post('old_chanel_icon'));
                    $data['errors'] = "SUCCESS";
                } 
            }else{
                $file_name=$this->input->post('old_chanel_icon');
            } 
           if($this->input->post('pack_no')!=0){
                $check_slots = $this->admin_model->check_slots($this->input->post('pack_no')); 
            }  
           $data = array('chanel_name' => $this->input->post('chanel_name'),  
           'pack_no' => $this->input->post('pack_no'),
           'pack_value' => $this->input->post('pack_value'),  
           'chanel_value' => $this->input->post('chanel_value'), 
           'chanel_icon' =>$file_name,
           'status' => $this->input->post('status')
           ); 
            $this->admin_model->updatechanel($this->input->post('chid'),$data); 
            $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>Business Has Been Updated..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
            redirect(base_url().'admindashbord/chanellist');
	}
        
        
         
        public function delet_chenal(){ 
            $banner_id = $this->uri->segment(3);  
            $data = $this->admin_model->delet_chanel($banner_id); 
            unlink('./uploads/chanel/'.$data[0]->chanel_icon);
            $this->load->view('admin_header');
            $data['detail'] = $this->admin_model->chanel_del_action($banner_id); 
            redirect(base_url().'admindashbord/chanellist');
        }
	 //  END OF BUSINESS LISTING 
         
        
        
         public function addbanner(){ 
              
                if(!empty($_FILES['banner']['name']))	
                { 	
                $file_name=time()."-".$_FILES['banner']['name'];
                $config = array(
                'upload_path' => "./uploads/banner",
                'allowed_types' => "jpg|jpeg|png",
                'max_size' => "0",
                'file_name' => $file_name
                ); 
                // Create a new 'f' element of the $_FILES object, and assign the name, type, tmp_name, error, and size properties to the corresponding 'chanel_icon' of this iteration of the FOR loop.
                $_FILES['f']['name'] =  $_FILES['banner']['name'];
                $_FILES['f']['type'] = $_FILES['banner']['type'];
                $_FILES['f']['tmp_name'] = $_FILES['banner']['tmp_name'];
                $_FILES['f']['error'] = $_FILES['banner']['error'];
                $_FILES['f']['size'] = $_FILES['banner']['size'];

                $this->load->library('upload', $config);
                $this->upload->initialize($config);            
                    if (! $this->upload->do_upload('f'))
                    {
                      $data['errors'] = $this->upload->display_errors();
                    }
                    else
                    {   
                      $image_data = $this->upload->data();    
                      $data = $this->resize($image_data,50,50,'./uploads/banner/'); 
                      $data['errors'] = "SUCCESS";
                    } 
                }  
                $data = array(
                    'title' => $this->input->post('title'), 
                    'banner_type' => $this->input->post('banner_type'), 
                    'business_type' => $this->input->post('business_type'), 
                    'banner_img' =>$file_name
                );  
                $this->admin_model->addbanner($data); 
              
           
           $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Vendor Has Been Inserted..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
           redirect(base_url().'admindashbord/bunnerlist');  
           exit();
	} 
       
             public function bunnerlist($offset=0){  
             // PAGINATION STRAT FROM HERE 
            $arr= $this->admin_model->totel_bunner_rows(); 
             $data['allbusiness'] = $this->admin_model->showallbusiness();
             
            $config['base_url'] = base_url("admindashbord/bunnerlist");
            $config['per_page'] = 5;
            $config['total_rows'] = $arr[0]->cnt;  
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Prev';
            $config['next_tag_open'] = '<li class="pg-next">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="pg-prev">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>'; 
            $this->pagination->initialize($config); 
            $data['fetch'] = $this->admin_model->bunnerlist($config['per_page'],$this->uri->segment(3));   
            $this->load->view('admin_header');            
            $this->load->view('siteadmin/bunnerlist',$data); 
            // PAGINATION END            
            $this->load->view('admin_footer');
	} 
          
        
        
        public function banner_del(){ 
            $banner_id = $this->uri->segment(3);  
            $data = $this->admin_model->banner_del($banner_id); 
            unlink('./uploads/banner/'.$data[0]->banner_img);
            $this->load->view('admin_header');
            $data['detail'] = $this->admin_model->banner_del_action($banner_id); 
            redirect(base_url().'admindashbord/bunnerlist');
	    }
   // BUNNER LIST END
       
        
	//  BROADCAST LISTING QUERIES
        public function manage_broadcast($offset=0){  
             // PAGINATION STRAT FROM HERE 
            $arr= $this->admin_model->totel_broadcast_rows(); 
            $config['base_url'] = base_url("admindashbord/manage_broadcast");
            $config['per_page'] = 5;
            $config['total_rows'] = $arr[0]->cnt;  
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Prev';
            $config['next_tag_open'] = '<li class="pg-next">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="pg-prev">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>'; 
            $this->pagination->initialize($config); 
            $data['fetch'] = $this->admin_model->broadcastlist($config['per_page'],$this->uri->segment(3));
            
             $data['showalllco'] = $this->admin_model->showalllco();
             //echo '<pre>'; print_r($data);
            $this->load->view('admin_header');            
            $this->load->view('siteadmin/manage_broadcast',$data); 
            // PAGINATION END            
            $this->load->view('admin_footer');
	    } 
         
        
	
        public function addbroadcast(){ 
             
            $file_name="";	
	
               if(!empty($_FILES['chanel_icon']['name']))	
            { 	
                $file_name=time()."-".$_FILES['chanel_icon']['name'];
                $config = array(
                'upload_path' => "./uploads/broadcast",
                'allowed_types' => "jpg|jpeg|png",
                'max_size' => "0",
                'file_name' => $file_name
                ); 
                // Create a new 'f' element of the $_FILES object, and assign the name, type, tmp_name, error, and size properties to the corresponding 'chanel_icon' of this iteration of the FOR loop.
                $_FILES['f']['name'] =  $_FILES['chanel_icon']['name'];
                $_FILES['f']['type'] = $_FILES['chanel_icon']['type'];
                $_FILES['f']['tmp_name'] = $_FILES['chanel_icon']['tmp_name'];
                $_FILES['f']['error'] = $_FILES['chanel_icon']['error'];
                $_FILES['f']['size'] = $_FILES['chanel_icon']['size'];

                $this->load->library('upload', $config);
                $this->upload->initialize($config);            
                if (! $this->upload->do_upload('f'))
                {
                    $data['errors'] = $this->upload->display_errors();
                }
                else
                {   
                    $image_data = $this->upload->data();    
                    $data = $this->resize($image_data,50,50,'./uploads/broadcast/'); 
                    $data['errors'] = "SUCCESS";
                } 
            }else{ $file_name = 'no_image.png';} 
            
          /*  if($this->input->post('pack_no')){
          foreach ($this->input->post('pack_no') as $pack_no) { 
            $data = array(
            'chanel_name' => $this->input->post('chanel_name'),  
            'pack_value' => $this->input->post('pack_value'),  
            'chanel_value' => $this->input->post('chanel_value'), 
            'pack_no' => $pack_no, 
            'chanel_icon' =>$file_name, 
            'status' => $this->input->post('status')
            );  
            $this->admin_model->addchanelinsert($data); 
          }  
            }else{*/
                $data = array( 
                'broad_cast_type' => $this->input->post('broad_cast_type'), 
                'ids' => implode(",", $this->input->post('ids')),  
                'images' =>$file_name 
                );  
                 
                $this->admin_model->addbroadcastinsert($data); 
                
           // }
           $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Vendor Has Been Inserted..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
           redirect(base_url().'admindashbord/manage_broadcast');  
           exit();
	} 
       
        
        public function  broadcast_delet(){
            $packid = $this->uri->segment(3); 
            
            $data1 = $this->admin_model->one_broadcast_detail($packid); 
               
            
            $data = $this->admin_model->pack_broadcast($packid);
             
            unlink('./uploads/broadcast/'.$data1[0]->images);
            
            if($data==1){ 
                $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success! </strong> Broadcast Delet Successfully..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
                redirect(base_url().'admindashbord/manage_broadcast');   
            }
        } 
        
        //  END OF BROADCAST LISTING  
        
        
        
        
        
        
        
	//  SUBSCRIPTION LISTING QUERIES
        public function manage_test($offset=0){  
             // PAGINATION STRAT FROM HERE 
            $arr= $this->admin_model->totel_test_rows(); 
            $config['base_url'] = base_url("admindashbord/manage_test");
            $config['per_page'] = 5;
            $config['total_rows'] = $arr[0]->cnt;  
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Prev';
            $config['next_tag_open'] = '<li class="pg-next">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="pg-prev">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>'; 
            $this->pagination->initialize($config); 
            $data['fetch'] = $this->admin_model->testlist($config['per_page'],$this->uri->segment(3));   
            $this->load->view('admin_header');            
            $this->load->view('siteadmin/manage_test',$data);  
            $this->load->view('admin_footer');
	   } 
         
        
        public function test_delet(){
            $testid = $this->uri->segment(3); 
            $data = $this->admin_model->test_delet($testid); 
            if($data==1){ 
                //$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success! </strong> Test Delet Successfully..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
                //redirect(base_url().'admindashbord/manage_test');   
                echo '1';
                exit();
            }
        } 

        public function test_view_edit(){ 
            $vid = $this->uri->segment(3);  
            $this->load->view('admin_header');
            $data['detail'] = $this->admin_model->test_view($vid); 
            $this->load->view('siteadmin/test_view',$data);
            $this->load->view('admin_footer');
	}
        
        
        public function updatetest(){ 
            $detail = array(
                    'table' => "test", 
                    'coloumnname' => "order_no",  
                    'test_type' => $this->input->post('test_type'),
                    'values' => $this->input->post('order_no')
                ); 
            $ret_val = $this->admin_model->check_value_exist($detail); 
                if($ret_val==0){ 
                    $this->session->set_flashdata('msg','<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning! </strong> Value Already Inserted..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
                 redirect(base_url().'admindashbord/updatetest');  
                 exit(); 
                }
                  
           $data = array('testname' => $this->input->post('testname'),
           'order_no' => $this->input->post('order_no'),
           'cost' => $this->input->post('cost'),
           'test_type' => $this->input->post('test_type'),
           'status' => $this->input->post('status')
           );   
            $data1=$this->admin_model->updatetest($this->input->post('tid'),$data);              
            $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>test Has Been Updated..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
            redirect(base_url().'admindashbord/manage_test');
            exit();
	}
        
	public function addtest(){
        if ($this->input->post('order_no')!="") {
            
                $detail = array(
                 'table' => "test", 
                 'coloumnname' => "order_no", 
                 'values' => $this->input->post('order_no')
                );  
                $ret_val = $this->admin_model->check_value_exist($detail);//table,coloumn 
                if($ret_val[0]->cnt>0){
                 $this->session->set_flashdata('msg','<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning! </strong> Value Already Inserted..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
                 redirect(base_url().'admindashbord/manage_test');  
                 exit(); 
                }
                
            $file_name="";	
	/*
               if(!empty($_FILES['test_icon']['name']))	
            { 	
                $file_name=time()."-".$_FILES['test_icon']['name'];
                $config = array(
                'upload_path' => "./uploads/tests",
                'allowed_types' => "jpg|jpeg|png",
                'max_size' => "0",
                'file_name' => $file_name
                ); 
                // Create a new 'f' element of the $_FILES object, and assign the name, type, tmp_name, error, and size properties to the corresponding 'chanel_icon' of this iteration of the FOR loop.
                $_FILES['f']['name'] =  $_FILES['test_icon']['name'];
                $_FILES['f']['type'] = $_FILES['test_icon']['type'];
                $_FILES['f']['tmp_name'] = $_FILES['test_icon']['tmp_name'];
                $_FILES['f']['error'] = $_FILES['test_icon']['error'];
                $_FILES['f']['size'] = $_FILES['test_icon']['size'];

                $this->load->library('upload', $config);
                $this->upload->initialize($config);            
                if (! $this->upload->do_upload('f'))
                {
                    $data['errors'] = $this->upload->display_errors();
                }
                else
                {   
                    $image_data = $this->upload->data();    
                    $data = $this->resize($image_data,50,50,'./uploads/tests/'); 
                    $data['errors'] = "SUCCESS";
                } 
            }else{ $file_name = 'no_image.png';} 
            */

           $data = array('testname' => $this->input->post('testname'),
           'order_no' => $this->input->post('order_no'),
           'cost' => $this->input->post('cost'),
          // 'test_icon'=>  $file_name,
           'status' => $this->input->post('status')
           );  
//print_r($data); exit();
           $data = $this->admin_model->addtestinsert($data); 
           $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success! </strong> Test Has Been Inserted..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
           redirect(base_url().'admindashbord/manage_test'); 
           exit();
          // echo $data;  
            # code...
         } else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error! </strong> Test Has Been Empty..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
           redirect(base_url().'admindashbord/manage_test'); 
           exit();
         }       
	} 



    public function test_list(){   
    $test_type = $this->uri->segment(3);
        $list['data'] = $this->admin_model->test_list($test_type); 
        $list['showtest']='1';
        $this->load->view('siteadmin/ajax_get_data',$list);        
        }

    public function show_test_values(){ 
    $item_id = $this->uri->segment(3);
    $fetch['test_detail']='1';
    $fetch['test_det'] = $this->admin_model->show_test_values($item_id); 
    $this->load->view('siteadmin/ajax_get_data',$fetch);
    }





    //  END OF SUBSCRIPTION LISTING  
        
        
    //  END OF DOCTOR LISTING 
    public function manage_doctor($offset=0){  
         // PAGINATION STRAT FROM HERE 
        $arr= $this->admin_model->totel_doctor_rows(); 
        $config['base_url'] = base_url("admindashbord/manage_doctor");
        $config['per_page'] = 5;
        $config['total_rows'] = $arr[0]->cnt;  
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['next_tag_open'] = '<li class="pg-next">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="pg-prev">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>'; 
        $this->pagination->initialize($config); 
        $data['fetch'] = $this->admin_model->doctorlist($config['per_page'],$this->uri->segment(3));   
        $this->load->view('admin_header');            
        $this->load->view('siteadmin/manage_doctor',$data);  
        $this->load->view('admin_footer');
    }          
        
    public function doctor_delet(){
        $doctorid = $this->uri->segment(3); 
        $data = $this->admin_model->doctor_delet($doctorid); 
        if($data==1){  
            echo '1';
            exit();
        }
    }         
    
    public function doctor_view_edit(){ 
        $vid = $this->uri->segment(3);  
        $this->load->view('admin_header');
        $data['detail'] = $this->admin_model->doctor_view($vid); 
        $this->load->view('siteadmin/doctor_view',$data);
        $this->load->view('admin_footer');
    }       
    
    public function updatedoctor(){ 
        $detail = array(
                'table' => "doctor", 
                'coloumnname' => "doctor_name", 
                'values' => $this->input->post('doctorname')
            );  
        $ret_val = $this->admin_model->check_value_exist($detail); //table,coloumn
            if($ret_val==0){  
                $this->session->set_flashdata('msg','<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning! </strong> Value Already Inserted..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
                 redirect(base_url().'admindashbord/updatedoctor');  
                 exit(); 
            }
       $data = array('doctor_name' => $this->input->post('doctorname'),
       'contact_no' => $this->input->post('contact_no'), 
       'status' => $this->input->post('status')
       );   
        $data1=$this->admin_model->updatedoctor($this->input->post('did'),$data); 
        echo($data1); exit(); 
    }
        
    public function adddoctor(){ 
                $detail = array(
                 'table' => "doctor", 
                 'coloumnname' => "contact_no", 
                 'values' => $this->input->post('contact_no')
                );  
                $ret_val = $this->admin_model->check_value_exist($detail);//table,coloumn 
                if($ret_val[0]->cnt>0){ 
                 $this->session->set_flashdata('msg','<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning! </strong> Value Already Inserted..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
                 redirect(base_url().'admindashbord/adddoctor');  
                 exit(); 
                } 
           $data = array('doctor_name' => $this->input->post('doctorname'),
           'contact_no' => $this->input->post('contact_no'), 
           'status' => $this->input->post('status')
           );   
           $data = $this->admin_model->adddoctorinsert($data); 
           echo $data;         
    } 
        //  END OF DOCTOR LISTING    
  
 

       
    //  END OF refer_by LISTING 
    public function manage_refer_by($offset=0){  
         // PAGINATION STRAT FROM HERE 
        $arr= $this->admin_model->totel_refer_by_rows(); 
        $config['base_url'] = base_url("admindashbord/manage_refer_by");
        $config['per_page'] = 5;
        $config['total_rows'] = $arr[0]->cnt;  
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['next_tag_open'] = '<li class="pg-next">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="pg-prev">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>'; 
        $this->pagination->initialize($config); 
        $data['fetch'] = $this->admin_model->refer_bylist($config['per_page'],$this->uri->segment(3));   
        $this->load->view('admin_header');            
        $this->load->view('siteadmin/manage_refer_by',$data);  
        $this->load->view('admin_footer');
    }          
        
    public function refer_by_delet(){
        $refer_byid = $this->uri->segment(3); 
        $data = $this->admin_model->refer_by_delet($refer_byid); 
        if($data==1){  
            echo '1';
            exit();
        }
    }         
    
    public function refer_by_view_edit(){ 
        $vid = $this->uri->segment(3);  
        $this->load->view('admin_header');
        $data['detail'] = $this->admin_model->refer_by_view($vid); 
        $this->load->view('siteadmin/refer_by_view',$data);
        $this->load->view('admin_footer');
    }       
    
    public function updaterefer_by(){ 
       /* $detail = array(
                'table' => "refer_by", 
                'coloumnname' => "refer_byname", 
                'values' => $this->input->post('refer_byname')
            );  
        $ret_val = $this->admin_model->check_value_exist($detail); //table,coloumn
            if($ret_val==0){  
                echo "Exist";
                exit(); 
            }*/
       $data = array('refer_byname' => $this->input->post('refer_byname'),
       'contact_no' => $this->input->post('contact_no'), 
       'status' => $this->input->post('status')
       );   
        $data1=$this->admin_model->updaterefer_by($this->input->post('rid'),$data); 
        echo($data1); exit(); 
    }
        
    public function addrefer_by(){ 
                $detail = array(
                 'table' => "refer_by", 
                 'coloumnname' => "contact_no", 
                 'values' => $this->input->post('contact_no')
                );  
                $ret_val = $this->admin_model->check_value_exist($detail);//table,coloumn 
                if($ret_val[0]->cnt>0){ 
                 $this->session->set_flashdata('msg','<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning! </strong> Value Already Inserted..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
                 redirect(base_url().'admindashbord/addrefer_by');  
                 exit(); 
                } 
           $data = array('refer_byname' => $this->input->post('refer_byname'),
           'contact_no' => $this->input->post('contact_no'), 
           'status' => $this->input->post('status')
           );   
           $data = $this->admin_model->addrefer_byinsert($data); 
           echo $data;         
    } 
        //  END OF refer_by LISTING    
 



    //  START OF IPD LISTING 
    public function manage_ipd(){   
        $this->load->view('admin_header');
        $data['doctorlist'] = $this->admin_model->doctorlist(); 
        $data['test'] = $this->admin_model->test_list("IPD");
        $data['refer_by'] = $this->admin_model->refer_bylist(); 
        $this->load->view('siteadmin/manage_ipd',$data);
        $this->load->view('admin_footer');
    } 
 
    public function addipd(){ 
         if($this->input->post('totalfees')!=0 || $this->input->post('totalfees')!=''){
        $fullname= $this->input->post('mr_miss')." ".$this->input->post('patient_name');
        $gurdian_name= $this->input->post('gur')." ".$this->input->post('gurdian_name');
        $data = array('patient_name' => $fullname,
            'gurdian_name'=>$gurdian_name, 
            'num_of_test' => $this->input->post('num_of_test'), 
            'tot_discount' => $this->input->post('tot_discount'), 
            'totalfees' => $this->input->post('totalfees'), 
            'netamount' => $this->input->post('netamount'),
            'date_of_admission' => date("Y-m-d",strtotime($this->input->post('date_of_admission'))), 
            'date_of_discharge' => date("Y-m-d",strtotime($this->input->post('date_of_discharge'))), 
           'address' => $this->input->post('address'), 
           'city' => $this->input->post('city'), 
           'mobile_no' => $this->input->post('mobile_no'), 
           'dob' => date("Y-m-d",strtotime($this->input->post('dob'))), 
           'age' => $this->input->post('age'), 
           'marital_status' => $this->input->post('marital_status'), 
           'refer_by' => $this->input->post('refer_by'), 
           'doctor_id' => $this->input->post('doctor_id'), 
           'email' => $this->input->post('email'), 
           'blood_group' => $this->input->post('blood_group'), 
           'patient_weight' => $this->input->post('patient_weight'), 
           'pay_mode' => $this->input->post('pay_mode'), 
           'remark' => $this->input->post('remark'), 
           'patient_weight' => $this->input->post('patient_weight'),
           'pay_mode' => "", 
           'remark' => $this->input->post('remark'),  
           'created_date' => date("Y-m-d",strtotime($this->input->post('created_date'))),
           'status' => 1
        );
        
                $data = $this->admin_model->add_ipd_insert($data); 
                $ipd_id =$this->db->insert_id();
            
        foreach ($this->input->post('test_id') as $key => $value) {
            $data = array(
                'ipd_id'=>$ipd_id, 
                'test_id' => $value, 
                'notes' => $this->input->post('notes')[$key], 
                'co' => $this->input->post('co')[$key],   
                'rate' => $this->input->post('rate')[$key],  
                'basic' => $this->input->post('basic')[$key],  
                'discount' => $this->input->post('discount')[$key], 
                'subtotal' => $this->input->post('subtotal')[$key] 
            ); 
                $data = $this->admin_model->add_ipd_detail($data); 
        }  
        foreach ($this->input->post('cheque_number') as $key => $value) { 
            $data = array(
               'ipd_or_opd_id'=>$ipd_id, 
               'pay_table'=>"IPD",  
               'pay_mode'=>"Cheque",
               'cheque_number' => $value,   
               'amount' => $this->input->post('cheque_amt')[$key],   
               'cheque_bank' => $this->input->post('cheque_bank')[$key] 
            );
             
                $data = $this->admin_model->add_payment($data); 
        } 

        if(!empty($this->input->post('pay_in_cash')) ){    
            $data = array(
               'ipd_or_opd_id'=>$ipd_id, 
               'pay_table'=>"IPD", 
               'pay_mode'=>"Cash", 
               'amount' => $this->input->post('cash')
            );
            $data = $this->admin_model->add_payment($data); 
        }
        if(!empty($this->input->post('pay_in_swape_matchine')) ){
            $data = array(
               'ipd_or_opd_id'=>$ipd_id, 
               'pay_table'=>"IPD", 
               'pay_mode'=>"Swape",    
               'amount' => $this->input->post('swape_matchine')
            );
            $data = $this->admin_model->add_payment($data); 
        }
  }
          $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>IPD Entered Successfull..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
            redirect(base_url().'admindashbord/manage_ipd');
            exit();                  
    } 






 

public function updateipd11(){ 

if($this->input->post('totalfees')!=0 || $this->input->post('totalfees')!=''){
            $fullname= $this->input->post('mr_miss')." ".$this->input->post('patient_name');
            $gurdian_name= $this->input->post('gur')." ".$this->input->post('gurdian_name');
            $data = array('patient_name' => $fullname,
            'gurdian_name'=>$gurdian_name, 
            'num_of_test' => $this->input->post('num_of_test'), 
            'tot_discount' => $this->input->post('tot_discount'), 
            'totalfees' => $this->input->post('totalfees'), 
            'netamount' => $this->input->post('netamount'),
            'date_of_admission' => date("Y-m-d",strtotime($this->input->post('date_of_admission'))), 
            'date_of_discharge' => date("Y-m-d",strtotime($this->input->post('date_of_discharge'))), 
           'address' => $this->input->post('address'), 
           'city' => $this->input->post('city'), 
           'mobile_no' => $this->input->post('mobile_no'), 
           'dob' => date("Y-m-d",strtotime($this->input->post('dob'))), 
           'age' => $this->input->post('age'), 
           'marital_status' => $this->input->post('marital_status'), 
           'refer_by' => $this->input->post('refer_by'), 
           'doctor_id' => $this->input->post('doctor_id'), 
           'email' => $this->input->post('email'), 
           'blood_group' => $this->input->post('blood_group'), 
           'patient_weight' => $this->input->post('patient_weight'), 
           'pay_mode' => $this->input->post('pay_mode'), 
           'remark' => $this->input->post('remark'), 
           'patient_weight' => $this->input->post('patient_weight'),
           'pay_mode' => "", 
           'remark' => $this->input->post('remark'),  
           'created_date' => date("Y-m-d",strtotime($this->input->post('created_date'))),
           'status' => 1
        );
                $ipd_id =$this->input->post('ipd_id');

                $this->admin_model->updateipd($ipd_id,$data); 
            }   
        foreach ($this->input->post('test_id') as $key => $value) {
            $data = array(
                'ipd_id'=>$ipd_id, 
                'test_id' => $value, 
                'notes' => $this->input->post('notes')[$key], 
                'co' => $this->input->post('co')[$key],   
                'rate' => $this->input->post('rate')[$key],  
                'basic' => $this->input->post('basic')[$key],  
                'discount' => $this->input->post('discount')[$key], 
                'subtotal' => $this->input->post('subtotal')[$key] 
            ); 
                $this->admin_model->update_ipd_detail($this->input->post('ipd_det_id')[$key],$data); 
        }


                foreach ($this->input->post('cheque_number') as $key => $value) { 
            $data = array(
               'ipd_or_opd_id'=>$ipd_id, 
               'pay_table'=>"IPD",  
               'pay_mode'=>"Cheque",
               'cheque_number' => $value,   
               'amount' => $this->input->post('cheque_amt')[$key],   
               'cheque_bank' => $this->input->post('cheque_bank')[$key] 
            );
             
                $this->admin_model->update_payment($this->input->post('cheque_payment_detail_pid')[$key],$data); 
        } 

           if(!empty($this->input->post('pay_in_cash')) ){    
            $data = array(
               'ipd_or_opd_id'=>$ipd_id, 
               'pay_table'=>"IPD", 
               'pay_mode'=>"Cash", 
               'amount' => $this->input->post('cash')
            );
            $this->admin_model->update_payment($this->input->post('pay_in_cash_pid'), $data); 
        }
        if(!empty($this->input->post('pay_in_swape_matchine')) ){
            $data = array(
               'ipd_or_opd_id'=>$ipd_id, 
               'pay_table'=>"IPD", 
               'pay_mode'=>"Swape",    
               'amount' => $this->input->post('swape_matchine')
            );
            $this->admin_model->update_payment($this->input->post('pay_in_swape_matchine_pid'),$data); 
        }

        $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>IPD Entered Successfull..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
            redirect(base_url().'admindashbord/manage_ipd');
            exit();
 
}


  
 







    public function manage_ipd_report(){ 
        $this->load->view('admin_header'); 
        $start_date= $this->input->post('start_date');
        $end_date= $this->input->post('end_date');
        if(!empty($start_date) && !empty($start_date)){  
            $data["showdata"] = $this->admin_model->ipd_report_export(date("Y-m-d",strtotime($start_date)),date("Y-m-d",strtotime($end_date)));  

            $data["start_date"] = $start_date;
            $data["end_date"] = $end_date; 
        }else{$data["showdata"]=""; }  
        $this->load->view('siteadmin/manage_ipd_report',$data);
        $this->load->view('admin_footer');
    }

     
 
/*
    public function manage_ipd_report_action() { 

//  THIS CODE IS FOR EXCEL EXPORT BUT IT NOT PRINT DATA IN EXCEL

        $data = array(
           'start_date'=>$this->input->post('start_date'), 
           'end_date'=>$this->input->post('end_date')
        );
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel'); 
        $empInfo=$this->admin_model->ipd_report_export($data);

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set admin_header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Patient Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Gurdian Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Address');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'DOB');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Contact_No');       
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['patient_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['gurdian_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['address']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['city']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['mobile_no']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(ROOT_UPLOAD_IMPORT_PATH.$fileName);
        // download file
        admin_header("Content-Type: application/vnd.ms-excel");
        redirect(HTTP_UPLOAD_IMPORT_PATH.$fileName);        
    }

*/



 public function manage_ipd_report_action() {
 /*// create file name
        $fileName = 'mobile-'.time().'.xls';  
 // load excel library
        $this->load->library('excel'); 
        $mobiledata=$this->admin_model->ipd_report_export(); 
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set admin_header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Patient Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Gurdian Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Address');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'City');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Contact No');       
        // set Row
        $rowCount = 2;
        foreach ($mobiledata  as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element->patient_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element->gurdian_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element->address);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element->city);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element->mobile_no);
            $rowCount++;
        }
 
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save($fileName);
 // download file
        admin_header("Content-Type: application/vnd.ms-excel");
         //redirect(site_url().$fileName);      
*/

        $start_date= $this->input->post('start_date');
        $end_date= $this->input->post('end_date');
        $myData = $this->admin_model->ipd_report_export(date("Y-m-d",strtotime($start_date)),date("Y-m-d",strtotime($end_date)));          
        // file name
        $filename = 'IPD_Report_'.date('Ymd').'.csv';
        admin_header("Content-Description: File Transfer");
        admin_header("Content-Disposition: attachment; filename=$filename");
        admin_header("Content-Type: application/csv; ");
        // file creation
        $file=fopen('php://output', 'w'); 
        $admin_header=array("ID NO","DATE","NAME OF PATIENT","CASH","CHEQUE","SWAPE","TOTAL AMOUNT");
        fputcsv($file, $admin_header); 
        foreach ($myData as $line){
            if($line->pay_mode=="Cash"){ $paid_cash=$line->amount; }else{ $paid_cash=""; }
            if($line->pay_mode=="Cheque"){ $paid_cheque=$line->amount; }else{ $paid_cheque=""; }
            if($line->pay_mode=="Swape"){ $paid_swape=$line->amount; }else{ $paid_swape=""; }
            $created_date = date("d-m-Y",strtotime($line->created_date));
            fputcsv($file,array($line->pid,$created_date,$line->patient_name,$paid_cash,$paid_cheque,$paid_swape, $line->amount));
        } 
        fclose($file);
        exit;
    }   
    //  END OF IPD LISTING






    //  START OF OPD LISTING 
    public function manage_opd(){   
        $this->load->view('admin_header');
        $data['doctorlist'] = $this->admin_model->doctorlist(); 
        $data['test'] = $this->admin_model->test_list("OPD");
        $data['refer_by'] = $this->admin_model->refer_bylist(); 
        $this->load->view('siteadmin/manage_opd',$data);
        $this->load->view('admin_footer');
    } 
 
    public function addopd(){   
        $fullname= $this->input->post('mr_miss')." ".$this->input->post('patient_name');
        $gurdian_name= $this->input->post('gur')." ".$this->input->post('gurdian_name');
        $data = array('patient_name' => $fullname,
            'gurdian_name'=>$gurdian_name, 
           'address' => $this->input->post('address'), 
           'charges_for' => $this->input->post('charges_for'),  
           'city' => $this->input->post('city'), 
           'mobile_no' => $this->input->post('mobile_no'), 
           'dob' => date("Y-m-d",strtotime($this->input->post('dob'))), 
           'age' => $this->input->post('age'), 
           'marital_status' => $this->input->post('marital_status'), 
           'refer_by' => $this->input->post('refer_by'), 
           'doctor_id' => $this->input->post('doctor_id'), 
           'email' => $this->input->post('email'), 
           'blood_group' => $this->input->post('blood_group'), 
           'patient_weight' => $this->input->post('patient_weight'), 
           'pay_mode' => $this->input->post('pay_mode'), 
           'remark' => $this->input->post('remark'), 
           'patient_weight' => $this->input->post('patient_weight'),
           'pay_mode' => "", 
           'remark' => $this->input->post('remark'), 
           'created_date' => date("Y-m-d",strtotime($this->input->post('created_date'))),
           'status' => 1
        );    
        $data = $this->admin_model->add_opd_insert($data);        
        $opd_id =$this->db->insert_id();   
       
        foreach ($this->input->post('cheque_number') as $key => $value) {
            $data = array(
               'ipd_or_opd_id'=>$opd_id, 
               'pay_table'=>"OPD",  
               'pay_mode'=>"Cheque",
               'cheque_number' => $value,   
               'amount' => $this->input->post('cheque_amt')[$key],   
               'cheque_bank' => $this->input->post('cheque_bank')[$key] 
            );
            $data = $this->admin_model->add_payment($data); 
        }

        if(!empty($this->input->post('pay_in_cash')) ){
            $data = array(
               'ipd_or_opd_id'=>$opd_id, 
               'pay_table'=>"OPD", 
               'pay_mode'=>"Cash", 
               'amount' => $this->input->post('cash')
            );
            $data = $this->admin_model->add_payment($data); 
        }
        if(!empty($this->input->post('pay_in_swape_matchine')) ){
            $data = array(
               'ipd_or_opd_id'=>$opd_id, 
               'pay_table'=>"OPD", 
               'pay_mode'=>"Swape",    
               'amount' => $this->input->post('swape_matchine')
            );
            $data = $this->admin_model->add_payment($data); 
        }

        $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>OPD Entered Successfull..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
            redirect(base_url().'admindashbord/manage_opd');
            exit();                        
    } 

    
    public function manage_opd_report(){ 
        $this->load->view('admin_header'); 
        $start_date= $this->input->post('start_date');
        $end_date= $this->input->post('end_date');
        if(!empty($start_date) && !empty($start_date)){  
            $data["showdata"] = $this->admin_model->opd_report_export(date("Y-m-d",strtotime($start_date)),date("Y-m-d",strtotime($end_date)));  

            $data["start_date"] = $start_date;
            $data["end_date"] = $end_date;

        }else{$data["showdata"]=""; }  
        $this->load->view('siteadmin/manage_opd_report',$data);
        $this->load->view('admin_footer');
    }


 public function manage_opd_report_action() {
  
        $start_date= $this->input->post('start_date');
        $end_date= $this->input->post('end_date');
        $myData = $this->admin_model->opd_report_export(date("Y-m-d",strtotime($start_date)),date("Y-m-d",strtotime($end_date)));          
        // file name
        $filename = 'OPD_Report_'.date('Ymd').'.csv';
        admin_header("Content-Description: File Transfer");
        admin_header("Content-Disposition: attachment; filename=$filename");
        admin_header("Content-Type: application/csv; ");
        // file creation
        $file=fopen('php://output', 'w'); 
        $admin_header=array("ID NO","DATE","NAME OF PATIENT","CASH","CHEQUE","SWAPE","TOTAL AMOUNT");
        fputcsv($file, $admin_header); 
        foreach ($myData as $line){
            if($line->pay_mode=="Cash"){ $paid_cash=$line->amount; }else{ $paid_cash=""; }
            if($line->pay_mode=="Cheque"){ $paid_cheque=$line->amount; }else{ $paid_cheque=""; }
            if($line->pay_mode=="Swape"){ $paid_swape=$line->amount; }else{ $paid_swape=""; }
            $created_date = date("d-m-Y",strtotime($line->created_date));
            fputcsv($file,array($line->pid,$created_date,$line->patient_name,$paid_cash,$paid_cheque,$paid_swape, $line->amount));
        } 
        fclose($file);
        exit;
    }  

/*
        
    public function refer_by_delet(){
        $refer_byid = $this->uri->segment(3); 
        $data = $this->admin_model->refer_by_delet($refer_byid); 
        if($data==1){  
            echo '1';
            exit();
        }
    }         
   
   
*/ 

public function opd_search_listing(){  
$opd_search= $this->input->post('opd_search');

if (!empty($this->input->post('opd_date'))) {
 $opd_date= date("Y-m-d",strtotime($this->input->post('opd_date')));   
}else{ $opd_date=""; }

$data['fetch'] = $this->admin_model->opd_search_listing($opd_search,$opd_date);     
$this->load->view('admin_header');            
$this->load->view('siteadmin/opd_listing',$data);  
$this->load->view('admin_footer');
}

public function opd_listing($offset=0){  
             // PAGINATION STRAT FROM HERE 
            $arr= $this->admin_model->totel_opd_rows(); 
            $config['base_url'] = base_url("admindashbord/opd_listing");
            $config['per_page'] = 10;
            $config['total_rows'] = $arr[0]->cnt; 
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Prev';
            $config['next_tag_open'] = '<li class="pg-next">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="pg-prev">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>'; 
            $this->pagination->initialize($config); 
            $data['fetch'] = $this->admin_model->opd_listing($config['per_page'],$this->uri->segment(3));     
            $this->load->view('admin_header');            
            $this->load->view('siteadmin/opd_listing',$data);  
            $this->load->view('admin_footer');
 
    } 
 public function opd_view_edit(){ 
        $vid = $this->uri->segment(3);  
        $this->load->view('admin_header');
        $data['doctorlist'] = $this->admin_model->doctorlist(); 
        $data['test'] = $this->admin_model->test_list("OPD");
        $data['refer_by'] = $this->admin_model->refer_bylist(); 
        $data['detail'] = $this->admin_model->opd_view_edit($vid);         
        $data['cheque_payment_detail']= $this->admin_model->payment_detail($vid,"OPD","Cheque");
        $data['swape_payment_detail']= $this->admin_model->payment_detail($vid,"OPD","Swape");         
        $data['cash_payment_detail']= $this->admin_model->payment_detail($vid,"OPD","Cash"); 
        $this->load->view('siteadmin/opd_view_edit',$data);
        $this->load->view('admin_footer');
    } 
 
    public function updateopd(){   
        $fullname= $this->input->post('mr_miss')." ".$this->input->post('patient_name');
        $gurdian_name= $this->input->post('gur')." ".$this->input->post('gurdian_name');
        $opd_id=$this->input->post('opd_id');     
        $data = array('patient_name' => $fullname,
            'gurdian_name'=>$gurdian_name, 
           'address' => $this->input->post('address'), 
           'charges_for' => $this->input->post('charges_for'),  
           'city' => $this->input->post('city'), 
           'mobile_no' => $this->input->post('mobile_no'), 
           'dob' => date("Y-m-d",strtotime($this->input->post('dob'))), 
           'age' => $this->input->post('age'), 
           'marital_status' => $this->input->post('marital_status'), 
           'refer_by' => $this->input->post('refer_by'), 
           'doctor_id' => $this->input->post('doctor_id'), 
           'email' => $this->input->post('email'), 
           'blood_group' => $this->input->post('blood_group'), 
           'patient_weight' => $this->input->post('patient_weight'), 
           'pay_mode' => $this->input->post('pay_mode'), 
           'remark' => $this->input->post('remark'), 
           'patient_weight' => $this->input->post('patient_weight'),
           'pay_mode' => "", 
           'remark' => $this->input->post('remark'),  
           'status' => 1
        );            
         $this->admin_model->updateopd($opd_id,$data); 

        foreach ($this->input->post('cheque_number') as $key => $value) {
            $data = array(
               'ipd_or_opd_id'=>$opd_id, 
               'pay_table'=>"OPD",  
               'pay_mode'=>"Cheque",
               'cheque_number' => $value,   
               'amount' => $this->input->post('cheque_amt')[$key],   
               'cheque_bank' => $this->input->post('cheque_bank')[$key] 
            );
            if(!empty($this->input->post('cheque_amt')[$key])){ 
                if(!empty($this->input->post('cheque_payment_detail_pid')[$key])){
                 $this->admin_model->update_payment($this->input->post('cheque_payment_detail_pid')[$key],$data); 
                }else{ $data = $this->admin_model->add_payment($data); }
            }
        }

        if(!empty($this->input->post('pay_in_cash')) ){
            $data = array(
               'ipd_or_opd_id'=>$opd_id, 
               'pay_table'=>"OPD", 
               'pay_mode'=>"Cash", 
               'amount' => $this->input->post('cash')
            );
            if(!empty($this->input->post('pay_in_cash_pid'))){
                 $this->admin_model->update_payment($this->input->post('pay_in_cash_pid'),$data); 
            }else{ $data = $this->admin_model->add_payment($data); } 
        }
        if(!empty($this->input->post('pay_in_swape_matchine'))){
            $data = array(
               'ipd_or_opd_id'=>$opd_id, 
               'pay_table'=>"OPD", 
               'pay_mode'=>"Swape",    
               'amount' => $this->input->post('swape_matchine')
            );
            if(!empty($this->input->post('pay_in_swape_matchine_pid'))){
                 $this->admin_model->update_payment($this->input->post('pay_in_swape_matchine_pid'),$data);
            }else{ $data = $this->admin_model->add_payment($data); }
             
        }
        $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>OPD Entered Successfull..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
            redirect(base_url().'admindashbord/manage_opd');
            exit();                        
    } 

    public function delete_opd(){ 
        $opd_id = $this->uri->segment(3);  
        $data = $this->admin_model->delete_opd($opd_id);  
        redirect(base_url().'admindashbord/opd_listing');
    }
 
    //  END OF OPD LISTING

 












public function ipd_search_listing(){  
$ipd_search= $this->input->post('ipd_search'); 
if (!empty($this->input->post('ipd_date'))) {
 $ipd_date= date("Y-m-d",strtotime($this->input->post('ipd_date')));   
}else{ $ipd_date=""; } 
$data['fetch'] = $this->admin_model->ipd_search_listing($ipd_search,$ipd_date);     
$this->load->view('admin_header');            
$this->load->view('siteadmin/ipd_listing',$data);  
$this->load->view('admin_footer');
}

public function ipd_listing($offset=0){  
     // PAGINATION STRAT FROM HERE 
    $arr= $this->admin_model->totel_ipd_rows(); 
    $config['base_url'] = base_url("admindashbord/ipd_listing");
    $config['per_page'] = 10;
    $config['total_rows'] = $arr[0]->cnt; 
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
    $config['cur_tag_close'] = '</a></li>';
    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Prev';
    $config['next_tag_open'] = '<li class="pg-next">';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li class="pg-prev">';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>'; 
    $this->pagination->initialize($config); 
    $data['fetch'] = $this->admin_model->ipd_listing($config['per_page'],$this->uri->segment(3));     
    $this->load->view('admin_header');            
    $this->load->view('siteadmin/ipd_listing',$data);  
    $this->load->view('admin_footer');
} 

 public function ipd_view_edit(){ 
        $vid = $this->uri->segment(3);  
        $this->load->view('admin_header');
        $data['doctorlist'] = $this->admin_model->doctorlist(); 
        $data['test'] = $this->admin_model->test_list("IPD");
        $data['refer_by'] = $this->admin_model->refer_bylist(); 
        $data['detail'] = $this->admin_model->ipd_view_edit($vid); 
        $data['ipd_detail'] = $this->admin_model->get_ipd_detail($vid); 

        $data['cheque_payment_detail']= $this->admin_model->payment_detail($vid,"IPD","Cheque");
        $data['swape_payment_detail']= $this->admin_model->payment_detail($vid,"IPD","Swape");         
        $data['cash_payment_detail']= $this->admin_model->payment_detail($vid,"IPD","Cash"); 
        $this->load->view('siteadmin/ipd_view_edit',$data);
        $this->load->view('admin_footer');
    } 

/* 
    public function updateipd(){   
        $fullname= $this->input->post('mr_miss')." ".$this->input->post('patient_name');
        $gurdian_name= $this->input->post('gur')." ".$this->input->post('gurdian_name');
        $ipd_id=$this->input->post('ipd_id');     
        $data = array('patient_name' => $fullname,
            'gurdian_name'=>$gurdian_name, 
           'address' => $this->input->post('address'), 
           'charges_for' => $this->input->post('charges_for'),  
           'city' => $this->input->post('city'), 
           'mobile_no' => $this->input->post('mobile_no'), 
           'dob' => date("Y-m-d",strtotime($this->input->post('dob'))), 
           'age' => $this->input->post('age'), 
           'marital_status' => $this->input->post('marital_status'), 
           'refer_by' => $this->input->post('refer_by'), 
           'doctor_id' => $this->input->post('doctor_id'), 
           'email' => $this->input->post('email'), 
           'blood_group' => $this->input->post('blood_group'), 
           'patient_weight' => $this->input->post('patient_weight'), 
           'pay_mode' => $this->input->post('pay_mode'), 
           'remark' => $this->input->post('remark'), 
           'patient_weight' => $this->input->post('patient_weight'),
           'pay_mode' => "", 
           'remark' => $this->input->post('remark'),  
           'status' => 1
        );            
         $this->admin_model->updateipd($ipd_id,$data); 

        foreach ($this->input->post('cheque_number') as $key => $value) {
            $data = array(
               'ipd_or_opd_id'=>$ipd_id, 
               'pay_table'=>"IPD",  
               'pay_mode'=>"Cheque",
               'cheque_number' => $value,   
               'amount' => $this->input->post('cheque_amt')[$key],   
               'cheque_bank' => $this->input->post('cheque_bank')[$key] 
            );
            if(!empty($this->input->post('cheque_amt')[$key])){ 
                if(!empty($this->input->post('cheque_payment_detail_pid')[$key])){
                 $this->admin_model->update_payment($this->input->post('cheque_payment_detail_pid')[$key],$data); 
                }else{ $data = $this->admin_model->add_payment($data); }
            }
        }

        if(!empty($this->input->post('pay_in_cash')) ){
            $data = array(
               'ipd_or_opd_id'=>$ipd_id, 
               'pay_table'=>"IPD", 
               'pay_mode'=>"Cash", 
               'amount' => $this->input->post('cash')
            );
            if(!empty($this->input->post('pay_in_cash_pid'))){
                 $this->admin_model->update_payment($this->input->post('pay_in_cash_pid'),$data); 
            }else{ $data = $this->admin_model->add_payment($data); } 
        }
        if(!empty($this->input->post('pay_in_swape_matchine'))){
            $data = array(
               'ipd_or_opd_id'=>$ipd_id, 
               'pay_table'=>"IPD", 
               'pay_mode'=>"Swape",    
               'amount' => $this->input->post('swape_matchine')
            );
            if(!empty($this->input->post('pay_in_swape_matchine_pid'))){
                 $this->admin_model->update_payment($this->input->post('pay_in_swape_matchine_pid'),$data);
            }else{ $data = $this->admin_model->add_payment($data); }
             
        }
        $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>IPD Entered Successfull..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
            redirect(base_url().'admindashbord/manage_ipd');
            exit();                        
    } 
*/
    public function delete_ipd(){ 
        $ipd_id = $this->uri->segment(3);  
        $data = $this->admin_model->delete_ipd($ipd_id);  
        redirect(base_url().'admindashbord/ipd_listing');
    }
 
    //  END OF IPD LISTING

 





























































	//  SERVICES LISTING QUERIES
        public function serviceslist($offset=0){  
             // PAGINATION STRAT FROM HERE 
            $arr= $this->admin_model->totel_services_rows(); 
            $config['base_url'] = base_url("admindashbord/serviceslist");
            $config['per_page'] = 5;
            $config['total_rows'] = $arr[0]->cnt; 
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Prev';
            $config['next_tag_open'] = '<li class="pg-next">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="pg-prev">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>'; 
            $this->pagination->initialize($config); 
            $data['fetch'] = $this->admin_model->serviceslist($config['per_page'],$this->uri->segment(3));    
            $data['allbusiness'] = $this->admin_model->showallbusiness();  
            $this->load->view('admin_header');            
            $this->load->view('siteadmin/serviceslist',$data); 
            // PAGINATION END            
            $this->load->view('admin_footer');
	} 
        
	public function addservicestype(){  
         $data = array('business_typ' => $this->input->post('business_type'),
            'services_type' => $this->input->post('services_type'),
            'tags' => $this->input->post('tags'),
            'status' => $this->input->post('status')
	);  
	$this->admin_model->addservicesinsert($data); 
	$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Services Has Been Inserted..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
	redirect(base_url().'admindashbord/serviceslist');  
    exit();
	} 
        
        
        public function services_view(){ 
            $sid = $this->uri->segment(3);  
            $this->load->view('admin_header');
            $data['allbusiness'] = $this->admin_model->showallbusiness();  
            $data['detail'] = $this->admin_model->services_view($sid); 
            $this->load->view('siteadmin/services_view',$data);
            $this->load->view('admin_footer');
	}
        
         public function updateservicestype(){ 
            $data = array('business_typ' => $this->input->post('business_type'),
            'business_typ' => $this->input->post('business_typ'),
            'services_type' => $this->input->post('services_type'),
            'tags' => $this->input->post('tags'),
            'status' => $this->input->post('status')
            );  
            $this->admin_model->updateservicestype($this->input->post('sid'),$data); 
            $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>Business Has Been Updated..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
            redirect(base_url().'admindashbord/serviceslist');
	}
        
        
        //  END OF BUSINESS LISTING
        
         
			
			
	public function changepassword(){
	$this->load->view('siteadmin/newpassword');
	}
	
		
	public function newpassword(){
	if($this->input->post())
	{
	$data = array('pass' => $this->input->post('pass'),
		  'npass' => $this->input->post('npass'),
		  'cpass' => $this->input->post('cpass'),
		  );  
	if($this->input->post('npass')!=$this->input->post('cpass')){
	$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong>  New Password And Confirm Password Do Not Match..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
	redirect(base_url().'admindashbord/changepassword');
	}
	else{
	$data['passs'] = $this->admin_model->pass($data);
	if($data['passs']==1){
	$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Password Has Been Changed..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
	redirect(base_url().'admindashbord/changepassword');
	} else{
	$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Enter The Correct Password ..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
	redirect(base_url().'admindashbord/changepassword');
	}
	}
	}else{
	$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Something Went Wrong..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
	redirect(base_url().'admindashbord/changepassword');
	} 
	$this->load->view('siteadmin/newpassword');
	}
	 
        
		
	public function updatepricelist(){
		if($this->input->post())
		{
	if(!empty($_FILES['userfile']['name']))	
	{
	$file_name=time()."-".$_FILES['userfile']['name'];
	$config = array(
	'upload_path' => "./uploads/",
	'allowed_types' => "gif|jpg|jpeg|png",
	'max_size' => "0",
	'file_name' => $file_name
	);
	$this->load->library('upload', $config);
	if ($this->upload->do_upload()) {
	//If image upload in folder, set also this value in "$image_data".
	$image_data = $this->upload->data(); 
	$data = $this->resize($image_data,50,50,'./uploads/'); // echo('./uploads/'.$file_name); exit;
	unlink('./uploads/'.$file_name);
	unlink('./uploads/ads/'.$this->input->post('old_image'));
	} }
	else
	{
	$file_name=$this->input->post('old_image');	
	} 
	
	$eid= $this->input->post('eid'); 
		$data = array( 
		'cat_id' => $this->input->post('cat_id'), 
		'pname' => $this->input->post('pname'), 
		'price' => number_format($this->input->post('price'), 2),
		'pstatus' => $this->input->post('status'), 
		'service_type' => $this->input->post('service_type'),
		'pimg' => $file_name
		); 
		$h = $this->admin_model->priceupdate($data,$eid);
		if($h==1){
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Category Update Successfull..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
		redirect(base_url().'admindashbord/pricelist');  
		}else{ 
		$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong>   Error In Data Information..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
		redirect(base_url().'admindashbord/pricelist');  
		}
	}else{$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong>  Something Went Wrong..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
		redirect(base_url().'admindashbord/pricelist'); }}
		 
	  
	
	public function addcategoryinsert(){
	if($this->input->post())
	{
	$file_name="";	
	if(!empty($_FILES['userfile']['name']))	
	{
	$file_name=time()."-".$_FILES['userfile']['name'];
	$config = array(
	'upload_path' => "./uploads/",
	'allowed_types' => "gif|jpg|jpeg|png",
	'max_size' => "0",
	'file_name' => $file_name
	);
	$this->load->library('upload', $config);
	if ($this->upload->do_upload()) {
	//If image upload in folder, set also this value in "$image_data".
	$image_data = $this->upload->data();
	$data = $this->resize($image_data,200,200,'./uploads/');
	unlink('./uploads/'.$file_name);
	} 
	else
	{
	$file_name="";	
	}
	} 
	
	$data = array('category' => $this->input->post('category'),
	'img' => $file_name,
	'status' => $this->input->post('status'));
	$ch = $this->admin_model->addcategoryinsert($data);
	if($ch==1){
	$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Data Insert Successfull..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
	redirect(base_url().'admindashbord/addcategorypage');  
	}else{ 
	$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error - </strong> Data Not Inserted..! </div>');
	redirect(base_url().'admindashbord/addcategorypage');  
	}
	}
	else
	{
	$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error - </strong> Something Went Wrong !! </div>');
	redirect(base_url().'admindashbord/addcategorypage');  
 	}
 	}
	
	 
		
public function frontgaleryupdate(){ 
if(!empty($_FILES['userfile']['name']))	
{ 
$file_name=time()."-".$_FILES['userfile']['name'];
$config = array(
'upload_path' => "./uploads/front_galery",
'allowed_types' => "gif|jpg|jpeg|png",
'max_size' => "0",
'file_name' => $file_name
);
$this->load->library('upload', $config);
if ($this->upload->do_upload()) {
//If image upload in folder, set also this value in "$image_data".
$image_data = $this->upload->data(); 
$data = $this->resize($image_data,640,280,'./uploads/'); // echo('./uploads/'.$file_name); exit;
//unlink('./uploads/ads/'.$file_name); 
	unlink('./uploads/'.$file_name);
	unlink('./uploads/front_galery/'.$this->input->post('old_image'));
	} }
	else
	{
	$file_name=$this->input->post('old_image');	
	}
	$frid = $this->input->post('frid');
	$data = array( 
		'heading' => $this->input->post('heading'), 
		'img' => $file_name, 
		'detail' => $this->input->post('detail'),
		'status' => 1
		);  
		$h = $this->admin_model->galeryupdate($data,$frid); 
		redirect(base_url().'admindashbord/addgalery');  
		}
		
		
	
	 
	
		public function categoryupdate(){   
		if($this->input->post())
		{   
 		if(!empty($_FILES['userfile']['name']))	
		{
		$file_name=time()."-".$_FILES['userfile']['name'];
		$config = array(
		'upload_path' => "./uploads/",
		'allowed_types' => "gif|jpg|jpeg|png",
		'max_size' => "0",
		'file_name' => $file_name
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload()) {
		//If image upload in folder, set also this value in "$image_data".
		$image_data = $this->upload->data(); 
		$data = $this->resize($image_data,200,200,'./uploads/'); // echo('./uploads/'.$file_name); exit;
		unlink('./uploads/'.$file_name);
		unlink('./uploads/ads/'.$this->input->post('old_image'));
		} }
		else
		{
		$file_name=$this->input->post('old_image');	
		} 
 		$eid= $this->input->post('eid'); 
 		$data = array( 
		'category' => $this->input->post('category'), 
		'img' => $file_name, 
		'status' => $this->input->post('status') 
		); 
		$h = $this->admin_model->categoryupdate($data,$eid);
		if($h==1){
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Category Update Successfull..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
		redirect(base_url().'admindashbord/addcategorypage');  
		}else{ 
		$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong>Error In Data Information..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
		redirect(base_url().'admindashbord/addcategorypage');  
		}
		}else{
		$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong>Something Went Wrong..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
		redirect(base_url().'admindashbord/addcategorypage');  
		}}  
			
			
			
			
		 
		
		
		public function ordermess($num,$mess_body){ 
		$u_phone= $num; //$user_mob[0]->mob; // Alresdy Have Country code
		$sms_msg=urlencode($mess_body); 
		$sms_str="https://rest.nexmo.com/sms/json?api_key=a8ad4f27&api_secret=cffb4043e85fb264&to=$u_phone&from=14859635751&text=$sms_msg";  
		$sms=json_decode(file_get_contents($sms_str));
		}
		
		public function orderstatusmail($to,$from_email,$subject,$message){ 
                    $config['mailtype'] = 'html';
                    $config['protocol'] = 'sendmail'; 
                    $config['charset'] = 'iso-8859-1';
                    $config['wordwrap'] = TRUE;
                    $this->load->library('image_lib', $config);
                    $this->email->initialize($config);  
                    $this->email->from($from_email, 'GEM Laundry'); 
                    $this->email->to($to);
                    $this->email->subject($subject); 
                    $this->email->message($message); 
                    if($this->email->send()){ 
                    //$this->session->set_flashdata("msg","Email sent successfully. "); 
                    } 
                    //	echo $message; 
                    //exit; 
		}
                
                

                public function order_notifi_ajax(){  
                    $arr= $this->admin_model->order_notifi_ajax();
                     echo '1';
                }


		
		
	public function pickupready($v1){  
	$data = array('pickup_status'=>1 );	
	$ch=$this->admin_model->pickupready($data,$v1);  
	$admin_det=$this->admin_model->admin_det();  
	$user_mob = $this->admin_model->userdet_byorder($v1);  
	if($ch==1){
	//  SMS FOR Custopmer ON ORDER START 
	$mess_body ='CONGRATULATIONS! Your Order Picked Up Successfully THANKYOU'; 
	if($user_mob[0]->reminder==1){ 
	$this->ordermess($user_mob[0]->mob,$mess_body);
	}
	$this->orderstatusmail($user_mob[0]->email,$this->session->userdata('admin_email'),'Your Order Status',$mess_body);
	// SMS FOR Custopmer ON ORDER END
	
	//  SMS FOR Custopmer ON ORDER START
	$mess_body =$v1.'   - This Order Is Successfully Picked Up';  
	$this->ordermess($admin_det['mob'],$mess_body);
	$this->orderstatusmail($this->session->userdata('admin_email'),$user_mob[0]->email,'Customer Order Status',$mess_body);
	// SMS FOR Custopmer ON ORDER END
	}
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Order is picked up..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>');
	redirect(base_url().'admindashbord/orderlist');  
	}
		
	 
		
		
		

}
?>