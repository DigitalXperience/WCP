<?php
Class Competitions_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('pronostics_model','pronosctics');
		$this->load->model('admin_config_model','admin_config');
	}

    public function getList($clause=null)
	{
		$query = $this->db->query("SELECT * FROM ". TABLE_COMPETITIONS );
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
	public function getActiveCompetition() {
		//$query = $this->db->query("SET lc_time_names = 'fr_FR'");
		$query = $this->db->query('SELECT id FROM '. TABLE_COMPETITIONS .' WHERE status = 1 LIMIT 1;');
		
		$row = $query->row();
		if (isset($row))
		{
			return $row->id;
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
}

?>
