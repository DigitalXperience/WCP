<?php
Class Pronostics_model extends CI_Model
{

    public function getList($clause=null)
	{
		$query = $this->db->query('
			SELECT 
				p.id id,
				r.date_heure rencontre_date_heure,
				eq1.name equipe_1,
				p.score_eq1 score_eq1,
				eq2.name equipe_2,
				p.score_eq2 score_eq2,
				u.nom utilisateur_nom,
				eq3.name vainqueur,
				p.dateheure date_heure
			FROM '. TABLE_PRONOSTICS .' p
			LEFT JOIN '. TABLE_RENCONTRES .' r ON r.id = p.rencontre_id 
			LEFT JOIN '. TABLE_EQUIPES .' eq1 ON eq1.id = r.equipe_id1 
			LEFT JOIN '. TABLE_EQUIPES .' eq2 ON eq2.id = r.equipe_id2 
			LEFT JOIN '. TABLE_EQUIPES .' eq3 ON eq3.id = p.vainqueur_id 
			LEFT JOIN '. TABLE_UTILISATEURS .' u ON u.id = p.utilisateur_id;');
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
	public function getAllPronosRencontre($id_rencontre) {
		$query = $this->db->query('SELECT * FROM '. TABLE_PRONOSTICS .' WHERE rencontre_id = ' . $id_rencontre . ';');
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
	public function getFiveLastPronos() {
		$sql = 'SELECT pr.score_eq1, pr.score_eq2, eq.vainqueur, DATE_FORMAT(pr.dateheure, "%d %M à %H:%i") as dateheure, eq1.name as eq1, eq2.name as eq2, u.nom, u.id_fb FROM '. TABLE_PRONOSTICS .' pr 
									LEFT JOIN '. TABLE_UTILISATEURS .' u ON u.id = pr.utilisateur_id 
									LEFT JOIN '. TABLE_RENCONTRES .' r ON r.id = pr.rencontre_id 
									LEFT JOIN '. TABLE_EQUIPES .' eq1 ON eq1.id = r.equipe_id1 
									LEFT JOIN '. TABLE_EQUIPES .' eq ON eq.id = r.vainqueur_id  
									LEFT JOIN '. TABLE_EQUIPES .' eq2 ON eq2.id = r.equipe_id2 ORDER BY pr.dateheure DESC LIMIT 5;';
		//var_dump($sql); die;
		$query = $this->db->query("SET lc_time_names = 'fr_FR'");
		$query = $this->db->query('SELECT pr.score_eq1, pr.score_eq2, eq.name, DATE_FORMAT(pr.dateheure, "%d %M à %H:%i") as dateheure, eq1.name as eq1, eq2.name as eq2, u.nom, u.id_fb FROM '. TABLE_PRONOSTICS .' pr 
									LEFT JOIN '. TABLE_UTILISATEURS .' u ON u.id = pr.utilisateur_id 
									LEFT JOIN '. TABLE_RENCONTRES .' r ON r.id = pr.rencontre_id 
									LEFT JOIN '. TABLE_EQUIPES .' eq1 ON eq1.id = r.equipe_id1 
									LEFT JOIN '. TABLE_EQUIPES .' eq ON eq.id = pr.vainqueur_id  
									LEFT JOIN '. TABLE_EQUIPES .' eq2 ON eq2.id = r.equipe_id2 ORDER BY pr.dateheure DESC LIMIT 5;');
		
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
	public function countPronosticsDuJr() {
		$this->db->from(TABLE_PRONOSTICS);
		$this->db->where('dateheure >= CURDATE()');
		return $this->db->count_all_results();
	}
	
	public function countPronostiqueurs() {
		return $this->db->count_all(TABLE_UTILISATEURS);
	}
	
	public function countPronostiqueursInactifs() {
		$this->db->from(TABLE_UTILISATEURS);
		$this->db->where('`id` NOT IN (SELECT DISTINCT `utilisateur_id` FROM '. TABLE_PRONOSTICS .' )');
		return $this->db->count_all_results();
	}
	
}
?>
