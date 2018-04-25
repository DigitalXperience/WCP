<?php
Class Rencontres_model extends CI_Model
{

    public function getList($clause=null)
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
			JOIN '. TABLE_EQUIPES .' eq2 ON eq2.id = r.equipe_id2;');
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
}
?>
