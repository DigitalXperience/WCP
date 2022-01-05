<?php
Class Competitions_model extends CI_Model
{

    public function getList($clause=null)
	{
		$query = $this->db->query('SELECT * FROM '. TABLE_COMPETITIONS .';');
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}

	public function newCompetition($tab) {
		return $this->db->insert(TABLE_COMPETITIONS, $tab);
	}
	
	public function updateCompetition($tab) {
		$this->load->database();
        $this->db->where('id', $tab['id']);
        return $this->db->update(TABLE_COMPETITIONS, $tab);
	}
	
}
?>
