<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Competitions extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->model('competitions_model','competitions');
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
			$data['title'] = "Liste des comp&eacute;titions";
            $data['liste'] = $this->competitions->getList();
			$this->load->view('competition_list', $data);
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
				$date_heure_debut = date('Y-m-d', strtotime(str_replace('/','-', $this->input->post('c_date_debut')))) . " " . $this->input->post('c_heure_debut') . ":00"; //nouveau format
				$date_heure_fin = date('Y-m-d', strtotime(str_replace('/','-', $this->input->post('c_date_fin')))) . " " . $this->input->post('c_heure_fin') . ":00"; //nouveau format
				
				// verification de la date de debut par rapport du jour
				$date_du_jour = date("Y-m-d H:i:s");
				if ($date_du_jour > $date_heure_debut) {
					$data['alert']=str_replace($searchError, 'La date de d&eacute;but ne peut pas &ecirc;tre in&eacute;rieure &agrave; la date d\'aujourd\'hui', $templateError);
					$error=true;
				}
				// vérification de la différence des équipes
            	if ($date_heure_fin < $date_heure_debut) {
            		$data['alert']=str_replace($searchError, 'La date de d&eacute;but ne peut pas &ecirc;tre sup&eacute;rieure &agrave; la date de fin', $templateError);
					$error=true;
            	}

				if(!$error){
					// TODO 
					$posts = $this->input->post(); // On va utiliser $posts pour faire le reste... Merci CI, on gère la suite
					unset($posts['c_date_debut']); // on enlève date_debut et heure_debut
					unset($posts['c_heure_debut']);
					unset($posts['c_date_fin']); // on enlève date_fin et heure_fin
					unset($posts['c_heure_fin']);
					
					$posts['date_heure_debut'] = $date_heure_debut; // nouvelle variable
					$posts['date_heure_fin'] = $date_heure_fin; // nouvelle variable
					// end TODO
					
					if(empty($this->input->post('id'))) {
						$s = $this->competitions->newCompetition($posts);
					} else { 
						$posts['id'] = $this->input->post('id');
						$s = $this->competitions->updateCompetition($posts); 
					}
					if($s){
						if(empty($this->input->post('id'))) {
							$data['alert'] = '<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4>	<i class="icon fa fa-check"></i> Bravo!</h4>
								Nouvelle comp&eacute;tition ajout&eacute;e avec succ&egrave;s.
							  </div>';
						}
						else {
							$data['alert'] = '<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4>	<i class="icon fa fa-check"></i> Bravo!</h4>
								Comp&eacute;tition mise à jour avec succ&egrave;s.
							  </div>';
							  redirect("competitions/updatejuice/".$this->input->post('id'));
						}
					} else {
					   $data['alert']='<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-       dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i> Erreur !</h4> Probl&egrave;me survenu lors de l\'enregistrement de la nouvelle comp&eacute;tition. </div>'; 
					}
				}
			}
            $session_data = $this->session->userdata('logged_in');
			$data['name'] = $this->user->getInfo($session_data['id']);
			$data['title'] = "Ajouter une nouvelle comp&eacute;tition";
			$data['liste'] = $this->competitions->getList();
			$this->load->view('competition_new', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}
	
}