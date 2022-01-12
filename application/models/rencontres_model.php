<?php
Class Rencontres_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('pronostics_model','pronosctics');
		$this->load->model('admin_config_model','admin_config');
	}

    public function getList($clause=null)
	{
		$query = $this->db->query("
			SELECT 
				r.id id_rencontre,
				eq1.name equipe_1,
				eq2.name equipe_2,
				score_eq1,
				score_eq2,
				DATE_FORMAT(date_heure, '%d/%m/%Y') as date,
				DATE_FORMAT(date_heure, '%k:%i') as heure,
				en_avant,
				c.nom competition_nom,
				c.id competition_id,
				s.id stade_id,
				s.nom stade_nom
			FROM ". TABLE_RENCONTRES ." r 
			JOIN ". TABLE_COMPETITIONS ." c ON c.id = r.id_competition 
			JOIN ". TABLE_EQUIPES ." eq1 ON eq1.id = r.equipe_id1 
			JOIN ". TABLE_EQUIPES ." eq2 ON eq2.id = r.equipe_id2
			LEFT JOIN ". TABLE_STADES ." s ON s.id = r.id_stade;");
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
	public function getTenLastMatchs() {
		$query = $this->db->query("SET lc_time_names = 'fr_FR'");
		$query = $this->db->query('SELECT DATE_FORMAT(r.date_heure, "%d %M") as date, DATE_FORMAT(r.date_heure, "%H:%i") as heure, eq1.name as eq1, eq2.name as eq2, r.score_eq1, r.score_eq2 FROM '. TABLE_RENCONTRES .' r 
									LEFT JOIN '. TABLE_EQUIPES .' eq1 ON eq1.id = r.equipe_id1 
									LEFT JOIN '. TABLE_EQUIPES .' eq2 ON eq2.id = r.equipe_id2 ORDER BY r.date_heure DESC LIMIT 9;');
		
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
	public function get($id)
	{
		$query = $this->db->query('
			SELECT 
				r.id id_rencontre,
				eq1.name equipe_1, eq1.id id1,
				eq2.name equipe_2, eq2.id id2,
				score_eq1,
				score_eq2, score_ouverture, score_min, 
				date_heure,
				en_avant,
				s.id stade_id, s.nom stade_nom
			FROM '. TABLE_RENCONTRES .' r 
			JOIN '. TABLE_EQUIPES .' eq1 ON eq1.id = r.equipe_id1 
			JOIN '. TABLE_EQUIPES .' eq2 ON eq2.id = r.equipe_id2 
			LEFT JOIN '. TABLE_STADES .' s ON s.id = r.id_stade 
			 WHERE r.id = '.$id.';');
		$row = $query->row();
		if (isset($row)) {
			return $row;
		}
		return false;
	}

	public function newRencontre($tab) {
		return $this->db->insert(TABLE_RENCONTRES, $tab);
	}

	public function updateRencontre($tab) {
		$this->load->database();
        $this->db->where('id', $tab['id']);
        return $this->db->update(TABLE_RENCONTRES, $tab);
	}
	
	public function updateScore($tab, $score_eq1, $score_eq2) {
		$this->load->database();
        $this->db->where('id', $tab['id']);
		$this->db->update(TABLE_RENCONTRES, $tab);
		return $this->updatePointsRencontre($tab['id'], $score_eq1, $score_eq2, $tab['score_ouverture'], $tab['score_min']);
	}
	
	public function updatePointsRencontre($id, $score_eq1, $score_eq2, $score_ouverture, $score_min) {
		
		$params = $this->admin_config->get();
		//echo "<pre>"; var_dump($params); die;
		// J'initialise le tableau joueurs ayant eu des modifications positive sur leurs pronostics
		$joueurs = array(); $flag = null;
		
		if($pronos = $this->pronosctics->getAllPronosRencontre($id)) {
			foreach($pronos as $pro) {
				$pts = 0;
				if(!is_null($pro->score_eq1) || !is_null($pro->score_eq2) ) { // il a mis des pronosctiques score
					if($pro->score_eq1 == $score_eq1 && $pro->score_eq2 == $score_eq2) { // Il a pronostiqué le bon score
						$this->db->where('id', $pro->id);
						$this->db->update(TABLE_PRONOSTICS, array('pts_obtenus' => $params->pt_prono_score));
						$this->saveNotificationToUser($pro->utilisateur_id, "Votre pronostique était bon! Bravo!!!");
						$pts = $params->pt_prono_score;
					}
					else { // Son pronostic est incorrect
						$this->db->where('id', $pro->id);
						$this->db->update(TABLE_PRONOSTICS, array('pts_obtenus' => 0));
					}
				} else { // Il a pronostiqué le vainqueur
					
				}
				
				if($pro->score_ouverture) { // Il a pronostiqué celui qui ouvre le score
					if($pro->score_ouverture == $score_ouverture) {
						$pts = $pts + $params->pt_prono_premier_buteur;
						$this->db->where('id', $pro->id);
						$this->db->update(TABLE_PRONOSTICS, array('pts_obtenus' => $pts));
					} else {
						
					}
					
				}
				
				if($pro->score_min) { // Il a pronostiqué l'intervalle de la minute d'ouverture du score
					if($pro->score_min == $score_min) {
						$pts = $pts + $params->pt_prono_ouverture_score;
						$this->db->where('id', $pro->id);
						$this->db->update(TABLE_PRONOSTICS, array('pts_obtenus' => $pts));
					} else {
						
					}
				}
				
				if($pts > 0) 
					$joueurs[] = $pro->utilisateur_id;
			}
			//echo "<pre>";
			//var_dump($joueurs);
			// Attribution des points Bonus
			if($joueurs) {
				
				$idC = $this->getIdCompetition($id);
				foreach($joueurs as $joueur) {
					
					$jeux = $this->pronosctics->getLastThreePronoPoints($joueur, $idC);
					//var_dump($jeux);
					if($jeux) { // S'il a au moins 1 pronostic
						
						if(count($jeux) == 3) { // S'il a déjà 3 pronosctiques, on va vérifier ceux qui n'ont pas encore reçu de bonus
							$nbbonus = 0;
							foreach($jeux as $jeu) {
								if($jeu->bonus_obtenus) {
									$nbbonus = $nbbonus + 1;
								}
							}
							$tmpArr = array_values($jeux);
							$p = array_shift($tmpArr);
							if($nbbonus == 0) {
								$this->pronosctics->addBonus($p->pid, 3);
							}
						}							
					}
					 //var_dump($jeu);
					
				}
			}
			//die;
			return true;
		} else {
			return true;
		}
	}
	
	public function saveNotificationToUser($oauth_uid, $msg) {
		
		return $this->db->insert(TABLE_NOTIFICATIONS_FB, array('id' => null,
																'utilisateur_id' => $oauth_uid,
																'msg' => $msg,
																'status' => 0
																)
								);
		
		/*$ch = curl_init(); 
		
        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://arcane-basin-34980.herokuapp.com/notifications.php?oauth_uid=".$oauth_uid."&msg=".$msg); 
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
		//curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false)

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch);     
		*/
	}
	
	public function addPointsToWinners($id_rencontre) {
		// D'abord xeux qui ont pronostiqué le bon vainqueur 
		$sql = "";
	}
	
	private function getIdCompetition($idR) {
		$query = $this->db->query('SELECT id_competition 
									FROM '. TABLE_RENCONTRES .' 
									WHERE id = '. $idR);
		
		$row = $query->row();
		if (isset($row)) {
			return $row->id_competition;
		}
	}
	
	public function mis_en_avant($id) {
		$query = $this->db->query('
			UPDATE '. TABLE_RENCONTRES .' SET `en_avant` = CASE
				WHEN `en_avant` = 0 THEN 1
				ELSE 0
				END
			WHERE id  in ('.$id.')  ;');
	}
	
	public function countRencontresDuJr() {
		$this->db->from(TABLE_RENCONTRES);
		$this->db->where('date_heure >= CURDATE()');
		return $this->db->count_all_results();
	}
}

?>
