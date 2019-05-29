<?php
class Paper_model extends CI_Model {

	public function __construct() {

		parent::__construct();
		$this->db = $this->load->database('default', True);
	}

	public function get_paper_by_uid_cid($uid, $cid) {

		$result = $this->db->get_where('paper', array('uid' => $uid, 'cid' => $cid));
		return $result->row_array();
	}

	public function get_paper_by_id($id) {

		$result = $this->db->get_where('paper', array('id' => $id));
		return $result->row_array();
	}
}