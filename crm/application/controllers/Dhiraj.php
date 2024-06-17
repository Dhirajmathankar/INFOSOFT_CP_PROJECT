<?php 
class Dhiraj extends CI_Controller {   

   public function index(){
	$user_id = $this->input->post("id");
	echo "<h1>$user_id</h1>";

	// if ($user_id != "") {
	// 	$user_id = $this->input->post("id");
	// 	$this->load->model('Dhiraj_model'); 
	// 	$retrive_data = $this->Dhiraj_model->data_retrive_condition($user_id);
	// 	echo "HELLO DHRIAJ MATHANKAR AND THIS IS NCIE BROTHER ";
	// }
	// else {
		    $this->load->model('Dhiraj_model');
		    $data = $this->Dhiraj_model->manage_group_master();
			$this->load->view('FileDoc/Header');
			$this->load->view('FileDoc/Home', $data);
			$this->load->view('FileDoc/Footer');
		// }
    }

	public function user_login(){
		$this->load->view('FileDoc/Header');
		$this->load->view("FileDoc/Login_page");
		$this->load->view('FileDoc/Footer');
		echo "THIS IS USER LOGIN PAGE USE  AND FUNTION NAME USER_LOGIN";
	}
	
	public function user_data_get(){
        $this->load->helper('form');
	    $this->load->helper('url');

	    $user_id = $this->input->post("id");
		$emai = $this->input->post("email");
		$lastname = $this->input->post("name");
		$fristname = $this->input->post("last");
		$user_age = $this->input->post("age");
        $array = array(
            'firstname' => $fristname,
            'lastname' => $lastname,
            'email' =>  $emai,
            'age' => $user_age
         );
		$this->load->model('Dhiraj_model');  
		$this->Dhiraj_model->data_insert($array);
		echo "This is user email = ".$user_email."This is user password = ". $user_pass ."this is user waddress ". $user_address . "this is user city ".$user_city;
		redirect(base_url().'dhiraj'); 
		
       $this->load->view("FileDoc/Succes");
	}

	public function delete_opetaion() {
		$delete_id = $this->input->post("id");
		$this->load->model('Dhiraj_model'); 
		$this->Dhiraj_model->delete_iteam_row($delete_id);
		echo "DHIRAJ YOU ARE REACH ON THE DELETE PAGE " . $delete_id;
		redirect(base_url().'dhiraj'); 
	}

	public function update_operation(){
		$Update_id = $this->input->post("id");
		echo "THIS IS YOUR UPDATE ID THEN YOU REDIRECT DHIRAJ SECOND PAGE ON THE DHIRAJ" . $Update_id;
	}

	public function Demo_project_dhriaj(){
		$Update_id = $this->input->post("id");
		echo "THIS IS YOUR UPDATE ID THEN YOU REDIRECT DHIRAJ SECOND PAGE ON THE DHIRAJ" . $Update_id;
	}
}
?>