<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Stades extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->model('stades_model','stades');
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
			$data['title'] = "Liste des stades";
            $data['liste'] = $this->stades->getList();
			$this->load->view('stade_list', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}

	public function ajouter() {
				if($this->session->userdata('logged_in'))
		{
			$templateError = '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Erreur !</h4> [ERROR_MSG]. </div>';
            $searchError = '[ERROR_MSG]';
            $error=false;
            if ($this->input->post()){
				

				if(!$error){
					// TODO 
					$posts = $this->input->post(); // On va utiliser $posts pour faire le reste... Merci CI, on gère la suite
					
					if(empty($this->input->post('id'))) {
						$s = $this->stades->newStade($posts);
					} else { 
						$posts['id'] = $this->input->post('id');
						$s = $this->stades->updateStade($posts); 
					}
					if($s){
						if(empty($this->input->post('id'))) {
							$data['alert'] = '<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4>	<i class="icon fa fa-check"></i> Bravo!</h4>
								Nouveau stade ajout&eacute; avec succ&egrave;s.
							  </div>';
						}
						else {
							$data['alert'] = '<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4>	<i class="icon fa fa-check"></i> Bravo!</h4>
								Stade mis à jour avec succ&egrave;s.
							  </div>';
							  redirect("stades/updatejuice/".$this->input->post('id'));
						}
					} else {
					   $data['alert']='<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-       dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i> Erreur !</h4> Probl&egrave;me survenu lors de l\'enregistrement du nouveau stade. </div>'; 
					}
				}
			}
            $session_data = $this->session->userdata('logged_in');
			$data['name'] = $this->user->getInfo($session_data['id']);
			$data['title'] = "Ajouter un nouveau stade";
			$data['liste'] = $this->stades->getList();
			$this->load->view('stade_new', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}
	
}