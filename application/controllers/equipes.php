<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Equipes extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->model('equipes_model','equipes');
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
			$data['title'] = "Liste des équipes";
            $data['liste'] = $this->equipes->getList();
			$this->load->view('equipe_list', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}
	
}