<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {

		$this->db->select('*');
		$this->db->from('user');
		print_r($this->db->get()->result_array());

		$this->load->view('welcome_message');
	}
}
