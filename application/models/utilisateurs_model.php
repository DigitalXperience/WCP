<?php
Class Utilisateurs_model extends CI_Model
{

    public function getList($clause=null)
	{
		$query = $this->db->query('
			SELECT 
				u.id id,
				u.nom nom,
				u.genre genre,
				u.numero numero,
				u.email email,
				utilisateur_id,
				sum(pts_obtenus) pts
			FROM '. TABLE_UTILISATEURS .' u
			LEFT JOIN '. TABLE_PRONOSTICS .' p ON u.id = p.utilisateur_id
			GROUP BY utilisateur_id, u.id
			');
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
}
?>
