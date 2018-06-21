<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->model('accounts','',TRUE);
		$this->load->model('log_model','logs');
		$this->load->model('pronostics_model','pronostics');
		$this->load->model('rencontres_model','rencontres');
	}
	
	public function index()
	{	if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['nbusers'] = $this->user->getTotal();
			$data['today_pronos'] = $this->pronostics->countPronosticsDuJr();
			$data['nb_pronostiqueurs'] = $this->pronostics->countPronostiqueurs();
			$data['nb_pronostiques'] = $this->pronostics->countPronostiques();
			$data['pronostiques'] = $this->pronostics->getFiveLastPronos();
			$data['nb_pronostiqueurs_inactifs'] = $this->pronostics->countPronostiqueursInactifs();
			$data['today_matchs'] = $this->rencontres->countRencontresDuJr();
			$data['last_matchs'] = $this->rencontres->getTenLastMatchs();
			$data['title'] = "Tableau de bord";
			$this->load->view('dashboard', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
		
	}
	
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('/dashboard/');
	}
}