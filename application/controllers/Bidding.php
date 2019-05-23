<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidding extends CI_Controller {

	function __construct() {
		parent::__construct();

		$login = $this->session->userdata('login');
		if(!isset($login) || $login['type'] > 3) {
			redirect();
		}
		$this->load->model('conference_model', 'confm');
		$this->load->model('bidding_model', 'bidm');
	}

	public function index($id) {

		$data['id'] = $id;
		$data['abs'] = $this->confm->get_paper_by_id($id);

		$login = $this->session->userdata('login');
		$bid = $this->bidm->get_bid($login['id'], $id);
		if(isset($bid) && !empty($bid)) {
			$data['voted'] = 1;
		} else {
			$data['voted'] = 0;
		}

		$this->load->view('header');
		$this->load->view('bid_abstract', $data);
		$this->load->view('footer');
	}

	public function set_yes($id) {

		$login = $this->session->userdata('login');

		$this->db->set('uid', $login['id']);
		$this->db->set('answer', 1);
		$this->db->set('pid', $id);
		
		if($this->db->insert('bidding')) {
			$this->session->set_flashdata('success', 'Bid added successfully');
		}

		redirect('bidding/index/'.$id);
    }

	public function set_no($id) {

		$login = $this->session->userdata('login');

		$this->db->set('uid', $login['id']);
		$this->db->set('answer', 0);
		$this->db->set('pid', $id);
		
		if($this->db->insert('bidding')) {
			$this->session->set_flashdata('success', 'Bid added successfully');
		}

		redirect('bidding/index/'.$id);
    }
}
