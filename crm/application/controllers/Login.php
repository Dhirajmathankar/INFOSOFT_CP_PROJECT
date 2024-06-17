<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {

	function __construct()
	{
	parent::__construct();
      
	}
	
	function index()
	{ 
            $this->load->view('login'); 
            
	}
	function adminlogin()
	{ 
            $this->load->view('adminlogin'); 
            
	}
	function employeelogin()
	{ 
            $this->load->view('employeelogin'); 
            
	}

	function communityofficer()
	{ 
            $this->load->view('welcome_community_login'); 
            
	}
	    
	function signup_login_check(){
		// Check for admin input in login form

		

		$data = array(
			//'user_type' => $this->input->post('usertype'),
			'user_name' => $this->input->post('username'), 
			'user_password' => $this->input->post('password')
		);  
	    $this->load->model('login_model');
		$result = $this->login_model->common_admin_login($data);    
		if(isset($result[0]->aid))
		{
		if ($result[0]->aid>0) {
		$session_data = array(
		'username' => $this->input->post('username'),
		'password' => $this->input->post('password'),
	    'aid'=> $result[0]->aid,
	    'fullname'=> $result[0]->fullname,
	    'login_id'=> $result[0]->login_id, 
	    'usertype'=> $result[0]->user_type,
	    'designation'=> $result[0]->emp_type,
		'admin_email'=>$result[0]->emailid,
		'cityofCluster'=>$result[0]->cityofCluster,
	    'mobile'=>$result[0]->mobile 
		);
		$this->session->set_userdata($session_data); 
	        $this->session->set_flashdata('msg','Super Admin Login Successfully...!'); 

	        
	    if($result[0]->user_type=="Superadmin"){    
			redirect(base_url().'superadmindashbord');  
		} 
		// elseif ($result[0]->user_type=="Cityadmin"){
		// $this->session->set_userdata($session_data); 
	 //        $this->session->set_flashdata('msg','City Admin Login Successfully...!');    
		// 	redirect(base_url().'superadmindashbord'); 
		// }
		// elseif ($result[0]->user_type=="Communityadmin"){
		// $this->session->set_userdata($session_data); 
	 //        $this->session->set_flashdata('msg','Login Successfully...!');    
		// 	redirect(base_url().'Communityofficeradmin');  
		// }
		// elseif ($result[0]->user_type=="Communityadmin"){
		// $this->session->set_userdata($session_data); 
	 //        $this->session->set_flashdata('msg','Community Admin Login Successfully...!');    
		// 	redirect(base_url().'Communityadmindashbord');  
		// }
		
		// elseif ($result[0]->user_type=="Stateadmin"){   
		// 	redirect(base_url().'Stateadmindashbord');
		// }
		// elseif ($result[0]->user_type=="Districtadmin"){    
		// 	redirect(base_url().'Districtadmindashbord');
		// }
		// elseif ($result[0]->user_type=="Blockadmin"){    
		// 	redirect(base_url().'Blockadmindashbord');
		// }
		// elseif ($result[0]->user_type=="Villageadmin"){    
		// 	redirect(base_url().'Villageadmindashbord');
		// }
		else{
			$this->session->set_flashdata('msg','User Type Not Define.'); 
			$this->session->set_flashdata('msg','Invalid credentials.'); 
			redirect(base_url().'login');
		}  
		} 
	        $this->session->set_flashdata('msg','User Not Found.'); 
		}
		else{
		$this->session->set_flashdata('msg','Invalid credentials.');  
		redirect(base_url().'login');
		} 
		
	}





	function signup_login_community_check(){
		// Check for community admin input in login form

		

		$data = array(
			//'user_type' => $this->input->post('usertype'),
			'user_name' => $this->input->post('username'), 
			'user_password' => $this->input->post('password')
		);  
	    $this->load->model('login_model');
		$result = $this->login_model->common_admin_login($data);    
		if(isset($result[0]->aid))
		{
		if ($result[0]->aid>0) {
		$session_data = array(
		'username' => $this->input->post('username'),
		'password' => $this->input->post('password'),
	    'aid'=> $result[0]->aid,
	    'fullname'=> $result[0]->fullname,
	    'login_id'=> $result[0]->login_id, 
	    'usertype'=> $result[0]->user_type,
	    'designation'=> $result[0]->emp_type,
		'admin_email'=>$result[0]->emailid,
		'cityofCluster'=>$result[0]->cityofCluster,
	    'mobile'=>$result[0]->mobile 
		);
		$this->session->set_userdata($session_data); 
	        $this->session->set_flashdata('msg','Super Admin Login Successfully...!'); 

	        
	    
		if ($result[0]->user_type=="Communityadmin"){
		$this->session->set_userdata($session_data); 
	        $this->session->set_flashdata('msg','Login Successfully...!');    
			redirect(base_url().'Communityofficeradmin');  
		}
		
		else{
			$this->session->set_flashdata('msg','User Type Not Define.'); 
			$this->session->set_flashdata('msg','Invalid credentials...!'); 
			redirect(base_url().'login/communityofficer');
		}  
		} 
	        $this->session->set_flashdata('msg','User Not Found.'); 
		}
		else{
		$this->session->set_flashdata('msg','Invalid credentials...!');  
		redirect(base_url().'login/communityofficer');
		} 
		
	}
  
/*
	function employee_login_check(){
		// Check for admin input in login form
		$data = array(
			'user_type' => "Employee",
			'user_name' => $this->input->post('username'), 
			'user_password' => $this->input->post('password')
		);   
	    $this->load->model('login_model');
		$result = $this->login_model->common_admin_login($data); 
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		if(isset($result[0]->aid))
		{
		if ($result[0]->aid>0) {
		$session_data = array(
		'username' => $this->input->post('username'),
		'password' => $this->input->post('password'),
	    'aid'=> $result[0]->aid,
		'admin_email'=>$result[0]->emailid,
	    'mobile'=>$result[0]->mobile, 
	    'state_id'=>$result[0]->state_id,
	    'distric_id'=>$result[0]->distric_id, 
	    'village_id'=>$result[0]->village_id, 
	    'superior'=>$result[0]->superior, 
		);
		$this->session->set_userdata($session_data); 
	        $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>  Login Successfull..!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button></div>'); 
		redirect(base_url().'employeedashbord');    
		}
		}
		else{
		$this->session->set_flashdata('msg','Please Enter Correct Info.');
	        $this->session->set_flashdata('msg','<div class="alert alert-info">Please Enter Correct Info.</div>'); 
		redirect(base_url().'login/login');
		} 
		
	}
*/

}
?>