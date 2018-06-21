<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pronostics extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->model('pronostics_model','pronostics');
		//$this->load->model('accounts','', TRUE);
		//$this->load->model('log_model','logs');
	}
	
	public function index()
	{	
		
	}

	public function liste($path = null, $id = null) {
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in'); 
			$data['name'] = $this->user->getInfo($session_data['id']);
			$data['title'] = "Liste des pronostics";
			// verification que le chemin de l'url correspond bien aux attentes
			$tmpArray = array('utilisateur', 'rencontre');
			$clause = null;
			if (!is_null($path) && !is_null($id) && in_array($path, $tmpArray)) {
				$clause = array('attr' => $path, 'val' => $id);
			}
            $data['liste'] = $this->pronostics->getList($clause);
			$this->load->view('pronostic_list', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}

}
?>