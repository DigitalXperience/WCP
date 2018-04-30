<?php
Class Rencontres_model extends CI_Model
{

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
	
	public function updateScore($tab) {
		$this->load->database();
        $this->db->where('id', $tab['id']);
        return $this->db->update(TABLE_RENCONTRES, $tab);
	}
	
	public function addPointsToWinners($id_rencontre) {
		// D'abord xeux qui ont pronostiqué le bon vainqueur 
		$sql = "";
	}
	
	public function mis_en_avant($id) {
		$query = $this->db->query('
			UPDATE '. TABLE_RENCONTRES .' SET `en_avant` = CASE
				WHEN `en_avant` = 0 THEN 1
				ELSE 0
				END
			WHERE id  in ('.$id.')  ;');
	}
}
?>
