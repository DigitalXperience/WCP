<?php
Class Stades_model extends CI_Model
{

    public function getList($clause=null)
	{
		$query = $this->db->query('SELECT * FROM '. TABLE_STADES .';');
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}

	public function newStade($tab) {
		return $this->db->insert(TABLE_STADES, $tab);
	}
	
	public function updateStade($tab) {
		$this->load->database();
        $this->db->where('id', $tab['id']);
        return $this->db->update(TABLE_STADES, $tab);
	}
	
}
?>