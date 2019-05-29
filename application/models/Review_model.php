<?php
class Review_model extends CI_Model {

	public function __construct() {

		parent::__construct();
		$this->db = $this->load->database('default', True);
	}

	public function get_all_pcmembers($proposal_id) {

		$this->db->select('u.*');
		$this->db->from('user u');
		$this->db->where('u.type <=', 3);

		return $this->db->get()->result_array();
	}

	public function get_answer($proposal_id, $uid) {

		$this->db->select('b.*');
		$this->db->from('bidding b');
		$this->db->where('b.uid', $uid);
		$this->db->where('b.pid', $proposal_id);

		return $this->db->get()->row_array();
	}

	public function check_assigned($proposal_id, $uid) {

		$this->db->select('r.*');
		$this->db->from('reviewers_paper r');
		$this->db->where('r.uid', $uid);
		$this->db->where('r.pid', $proposal_id);

		return $this->db->get()->row_array();
	}

	public function get_review($proposal_id, $uid) {

		$this->db->select('r.*');
		$this->db->from('review r');
		$this->db->where('r.uid', $uid);
		$this->db->where('r.pid', $proposal_id);

		return $this->db->get()->row_array();
	}

	public function get_reviews($proposal_id) {

		$this->db->select('r.*, u.name');
		$this->db->from('review r');
		$this->db->join('user u', 'u.id = r.uid');
		$this->db->where('r.pid', $proposal_id);

		return $this->db->get()->result_array();
	}

}
