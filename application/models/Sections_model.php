<?php
class Sections_model extends CI_Model {

	public function __construct() {

		parent::__construct();
		$this->db = $this->load->database('default', True);
	}

	public function get_all_sections_from_conf($id) {

		$this->db->select('s.*, c.name');
		$this->db->from('session s');
		$this->db->join('conference c', 'c.id = s.cid');
		$this->db->where('s.cid', $id);

		return $this->db->get()->result_array();
	}

	public function get_section_by_id($id) {

		$this->db->select('s.*');
		$this->db->from('session s');
		$this->db->where('s.id', $id);

		return $this->db->get()->row_array();
	}

	public function check_attend($section_id, $uid) {

		$this->db->select('s.*');
		$this->db->from('session_participant s');
		$this->db->where('s.uid', $uid);
		$this->db->where('s.sid', $section_id);

		return $this->db->get()->row_array();
	}
}
