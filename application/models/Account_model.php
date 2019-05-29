<?php
class Account_model extends CI_Model {

	public function __construct() {

		parent::__construct();
		$this->db = $this->load->database('default', True);
	}

	public function get_user_by_username($username) {

		$result = $this->db->get_where('user', array('username' => $username));
		return $result->row_array();
	}

	public function get_user_by_id($id) {

		$result = $this->db->get_where('user', array('id' => $id));
		return $result->row_array();
	}
}