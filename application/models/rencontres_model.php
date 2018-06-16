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
				en_avant
			FROM ". TABLE_RENCONTRES ." r 
			JOIN ". TABLE_EQUIPES ." eq1 ON eq1.id = r.equipe_id1 
			JOIN ". TABLE_EQUIPES ." eq2 ON eq2.id = r.equipe_id2;");
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
				eq1.name equipe_1,
				eq2.name equipe_2,
				score_eq1,
				score_eq2,
				date_heure,
				en_avant
			FROM '. TABLE_RENCONTRES .' r 
			JOIN '. TABLE_EQUIPES .' eq1 ON eq1.id = r.equipe_id1 
			JOIN '. TABLE_EQUIPES .' eq2 ON eq2.id = r.equipe_id2 WHERE r.id = '.$id.' ;');
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
		return $this->updatePointsRencontre($tab['id'], $score_eq1, $score_eq2);
	}
	
	public function updatePointsRencontre($id, $score_eq1, $score_eq2) {
		
		$params = $this->admin_config->get();
		
		if($pronos = $this->pronosctics->getAllPronosRencontre($id)) {
			foreach($pronos as $pro) {
				if(!is_null($pro->score_eq1) || !is_null($pro->score_eq2) ) { // il a mis des pronosctiques score
					if($pro->score_eq1 === $score_eq1 && $pro->score_eq2 === $score_eq2) {
						$this->db->where('id', $pro->id);
						$this->db->update(TABLE_PRONOSTICS, array('pts_obtenus' => $params->pt_prono_score));
						$this->saveNotificationToUser($pro->id_fb, "Votre pronostique était bon! Bravo!!!");
					}
					else {
						$this->db->where('id', $pro->id);
						$this->db->update(TABLE_PRONOSTICS, array('pts_obtenus' => 0));
					}
				} else { // Il a pronostiqué le vainqueur
					
				}
			}
			return true;
		} else {
			return true;
		}
	}
	
	public function saveNotificationToUser($id_fb, $msg) {
		
		return $this->db->insert(TABLE_NOTIFICATIONS_FB, array('id' => null,
																'id_fb' => $id_fb,
																'msg' => $msg,
																'status' => 0
																)
								);
		
		/*$ch = curl_init(); 
		
        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://arcane-basin-34980.herokuapp.com/notifications.php?id_fb=".$id_fb."&msg=".$msg); 
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
	
	public function getNextMatch() {
		$this->db->from(TABLE_RENCONTRES);
		$this->db->where('date_heure >= CURDATE()');
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
