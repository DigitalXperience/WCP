<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Utilisateurs extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->model('utilisateurs_model','utilisateurs');
		//$this->load->model('accounts','', TRUE);
		//$this->load->model('log_model','logs');
	}
	
	public function index()
	{	
		
	}

	public function liste() {
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['name'] = $this->user->getInfo($session_data['id']);
			$data['title'] = "Liste des utilisateurs";
            $data['liste'] = $this->utilisateurs->getList();
			$this->load->view('utilisateur_list', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}

}
?>