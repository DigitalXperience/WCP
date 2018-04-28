<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Rencontres extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->model('rencontres_model','rencontres');
		$this->load->model('equipes_model', 'equipes');
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
					$this->input->post('date_heure', $this->input->post('r_date').' '.$this->input->post('r_heure'));
					// end TODO
					
					if(empty($this->input->post('id'))) {
						$s = $this->rencontres->newRencontre($this->input->post()); 
					} else { 
						$s = $this->rencontres->updateRencontre($this->input->post()); 
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
			$this->load->view('rencontre_new', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
	}
	
}