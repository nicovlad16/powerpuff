<?php
class Conference_model extends CI_Model {

	public function __construct() {

		parent::__construct();
		$this->db = $this->load->database('default', True);
	}

	public function get_all_conferences() {

		$this->db->select('c.*');
		$this->db->from('conference c');

		return $this->db->get()->result_array();
	}

	public function get_conference_by_id($id) {

		$this->db->select('c.*');
		$this->db->from('conference c');
		$this->db->where('c.id', $id);

		return $this->db->get()->row_array();
	}

	public function get_papers_by_conf_id($id) {

		$this->db->select('p.*, c.name');
		$this->db->from('paper p');
		$this->db->join('conference c', 'p.cid = c.id');
		$this->db->where('p.cid', $id);

		return $this->db->get()->result_array();
	}

	public function get_paper_by_id($id) {

		$this->db->select('p.*, c.name');
		$this->db->from('paper p');
		$this->db->join('conference c', 'p.cid = c.id');
		$this->db->where('p.id', $id);

		return $this->db->get()->row_array();
	}
}
