<?php
Class Equipes_model extends CI_Model
{

    public function getList($clause=null)
	{
		$query = $this->db->query('SELECT * FROM '. TABLE_EQUIPES .';');
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}

	public function newEquipe($tab) {
		return $this->db->insert(TABLE_EQUIPES, $tab);
	}
	
}
?>
