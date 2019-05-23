<?php
class Bidding_model extends CI_Model {

	public function __construct() {

		parent::__construct();
		$this->db = $this->load->database('default', True);
	}

	public function get_bid($reviewer_id, $paper_id) {

		$this->db->select('b.*');
		$this->db->from('bidding b');
		$this->db->where('b.uid', $reviewer_id);
		$this->db->where('b.pid', $paper_id);

		return $this->db->get()->row_array();
	}

}
