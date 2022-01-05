<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Rencontres extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->model('rencontres_model','rencontres');
		$this->load->model('equipes_model', 'equipes');
		$this->load->model('competitions_model', 'competitions');
		$this->load->model('stades_model', 'stades');
		$this->load->model('admin_config_model','admin_config');
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
			$data['title'] = "Liste des rencontres";
            $data['liste'] = $this->rencontres->getList();
			$this->load->view('rencontre_list', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}
	
	public function en_avant($id) {
		if($this->session->userdata('logged_in'))
		{
			$s = $this->rencontres->mis_en_avant($id);
			redirect("rencontres/liste/");
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
                // vérification de la différence des équipes
            	if ($this->input->post('equipe_id1') == $this->input->post('equipe_id2')) {
            		$data['alert']=str_replace($searchError, 'Les 2 équipes doivent être différentes', $templateError);
                        $error=true;
            	}

				if(!$error){
					// TODO 
					$posts = $this->input->post(); // On va utiliser $posts pour faire le reste... Merci CI, on gère la suite
					
					$date_heure = date('Y-m-d', strtotime(str_replace('/','-', $this->input->post('r_date')))) . " " . $this->input->post('r_heure') . ":00"; //nouveau format
					unset($posts['r_date']); // on enlève r_date et r_heure
					unset($posts['r_heure']);
					$posts['date_heure'] = $date_heure; // nouvelle variable
					// end TODO
					
					if(empty($this->input->post('id'))) {
						$s = $this->rencontres->newRencontre($posts);
					} else { 
						$posts['id'] = $this->input->post('id');
						$s = $this->rencontres->updateRencontre($posts); 
					}
					if($s){
						if(empty($this->input->post('id'))) {
							$data['alert'] = '<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4>	<i class="icon fa fa-check"></i> Bravo!</h4>
								Nouvelle rencontre ajoutée avec succès.
							  </div>';
						}
						else {
							$data['alert'] = '<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4>	<i class="icon fa fa-check"></i> Bravo!</h4>
								Rencontre mis à jour avec succès.
							  </div>';
							  redirect("rencontres/updatejuice/".$this->input->post('id'));
						}
					} else {
					   $data['alert']='<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-       dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i> Erreur !</h4> Problème survenu lors de l\'enregistrement de la nouvelle rencontre. </div>'; 
					}
				}
			}
            $session_data = $this->session->userdata('logged_in');
			$data['name'] = $this->user->getInfo($session_data['id']);
			$data['title'] = "Ajouter une nouvelle rencontre";
			$data['lstEquipes'] = $this->equipes->getList();
			$data['lstCompetitions'] = $this->competitions->getList();
			$data['lstStades'] = $this->stades->getList();
			$this->load->view('rencontre_new', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}
	
	public function updatescore($id)
	{
		if($this->session->userdata('logged_in'))
		{
			if ($this->input->post()){
				$error=false;
                // vérification des inputs vide
            	if ($this->input->post('score_eq1') == "") {
            		$data['alert']=str_replace($searchError, 'Les scores ne peuvent pas être vide', $templateError);
                        $error=true;
            	}
				
				if(!$error){
					if(empty($this->input->post('id'))) {
						
					} else { 
						$s = $this->rencontres->updateScore($this->input->post(), $this->input->post('score_eq1'), $this->input->post('score_eq2')); 
					}
					if($s){
						$data['alert'] = '<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4>	<i class="icon fa fa-check"></i> Bravo!</h4>
								Scores de la rencontre mis à jour avec succès.</br>'.$s.'
							  </div>';
							 // redirect("rencontres/liste/");
					} else {
					   $data['alert']='<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-       dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i> Erreur !</h4> Problème survenu lors de l\'enregistrement de la nouvelle rencontre. <br />'.$s.' </div>'; 
					}
				}
			}
			$session_data = $this->session->userdata('logged_in');
			$data['name'] = $this->user->getInfo($session_data['id']);
			$data['title'] = "Mise à jour du score";
            $data['current'] = $this->rencontres->get($id);
			$this->load->view('rencontre_update_score', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}
	
}