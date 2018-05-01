<?php
Class Admin_config_model extends CI_Model
{

    public function get($clause=null)
	{
		$query = $this->db->query('
			SELECT * FROM '. TABLE_CONFIG .' ;');
		$row = $query->result();
		if (isset($row))
		{
			$obj = new stdClass;
			$obj->pt_prono_issue = $row[0]->valeur;
			$obj->pt_prono_score = $row[1]->valeur;
			return $obj;
		}
		
		return false;
	}
	
}
?>
