<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Adminlogout extends CI_Controller {

	function __construct()
	{
	parent::__construct();
	}
	
	function index()
	{
	$this->session->sess_destroy();
        $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>Logout Successfull..!<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
	redirect(base_url().'login');
	}
}
?>