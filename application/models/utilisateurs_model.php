<?php
Class Utilisateurs_model extends CI_Model
{

    public function getList($clause=null)
	{
		$query = $this->db->query('
			SELECT 
				*
			FROM '. TABLE_UTILISATEURS .';');
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
}
?>
