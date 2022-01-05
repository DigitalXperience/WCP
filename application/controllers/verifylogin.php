<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
	// die("index!");
	//This method will have the credentials validation
	$this->load->library('form_validation');
	$this->load->helper('security');
	$this->load->helper(array('form', 'url'));
	//var_dump($_POST); die;
	$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
	$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_database');
	//die("index 2!");
	
	if($this->form_validation->run() == FALSE)
	{
		//Field validation failed.  User redirected to login page
		//$this->load->view('login');
		//echo validation_errors();
		echo "false";
	}
	else
	{
		//Go to private area
		redirect('/dashboard/');
	}

 }

function check_database($password) {
	//Field validation succeeded.  Validate against database
	$username = $this->input->post('username');
	//die("check_database!");
	//query the database
	$result = $this->user->login($username, $password);
	//var_dump($result); die;
	if($result)
	{
		$sess_array = array();
		foreach($result as $row)
		{
			$sess_array = array(
				'id' => $row->id,
				'username' => $row->user,
				'logged_in' => TRUE
			);
			$this->session->set_userdata('logged_in', $sess_array);
		}
		//var_dump($this->session->userdata()); die;
		return TRUE;
	}
	else
	{
		$this->form_validation->set_message('check_database', 'Invalid username or password');
		return false;
	}
}
}
?>