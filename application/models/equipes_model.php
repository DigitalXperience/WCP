<?php
Class Equipes_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('competitions_model','competitions');
		$this->load->model('admin_config_model','admin_config');
	}

    public function getList($clause=null)
	{
		$query = $this->db->query('SELECT * FROM '. TABLE_EQUIPES .' WHERE id_competition = ' . $this->competitions->getActiveCompetition() . ';');
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}

	public function newEquipe($tab) {
		$tab['id_competition'] =  $this->competitions->getActiveCompetition();
		return $this->db->insert(TABLE_EQUIPES, $tab);
	}
	
}
?>
