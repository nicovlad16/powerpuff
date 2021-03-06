<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conferences extends CI_Controller {

	function __construct() {
		parent::__construct();

		$login = $this->session->userdata('login');
		if(!isset($login) || $login['type'] > 3) {
			redirect();
		}
		$this->load->model('conference_model', 'confm');
	}

	public function index($data = array()) {

		$data['confs'] = $this->confm->get_all_conferences();

		$this->load->view('header');
		$this->load->view('conferences', $data);
		$this->load->view('footer');
	}

	public function add() {

		$this->load->view('header');
		$this->load->view('conference_add');
		$this->load->view('footer');
	}

	public function edit($id = 0) {

		$data['id'] = $id;
		$data['conf'] = $this->confm->get_conference_by_id($id);

		$this->load->view('header');
		$this->load->view('conference_add', $data);
		$this->load->view('footer');
	}

	public function save($id = 0) {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('date_start', 'Date start', 'trim|required');
        $this->form_validation->set_rules('date_end', 'Date end', 'trim|required');
        $this->form_validation->set_rules('location', 'Location', 'trim|required');
        $this->form_validation->set_rules('abstract_deadline', 'Abstract deadline', 'trim|required');
        $this->form_validation->set_rules('paper_deadline', 'Paper deadline', 'trim');

        if($this->form_validation->run() == True) {

        	$p = $this->input->post();

        	$this->db->set('name', $p['name']);
        	$this->db->set('date_start', $p['date_start']);
        	$this->db->set('date_end', $p['date_end']);
        	$this->db->set('location', $p['location']);
        	$this->db->set('abstract_deadline', $p['abstract_deadline']);
        	$this->db->set('paper_deadline', $p['paper_deadline']);

        	if($id == 0) {
	        	if($this->db->insert('conference')) {
		            $this->session->set_flashdata('success', "Conference added successfull!");
	        	}
	        } else {
	        	$this->db->where('id', $id);
	        	if($this->db->update('conference')) {
		            $this->session->set_flashdata('success', "Conference updated successfull!");
	        	}
	        }
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }

        if($id == 0) {
        	redirect('conferences/add');
        } else {
        	redirect('conferences/edit/'.$id);
        }
    }

	public function proposals($id) {

		$this->load->model('review_model', 'revm');
		$abstracts = $this->confm->get_papers_by_conf_id($id);
		//$assigned = !empty($this->revm->check_assigned($proposal_id, $abs['id'])) ? 1 : 0;
		$data['abstracts'] = array();
		$k = 0;
		foreach ($abstracts as $abs) {
			$data['abstracts'][$k] = $abs;
			$assigned = !empty($this->revm->check_assigned($abs['id'], $this->session->userdata('login')['id'])) ? 1 : 0;
			$data['abstracts'][$k]['assigned'] = $assigned;

			$k++;
		}

		$this->load->view('header');
		$this->load->view('bid_conference', $data);
		$this->load->view('footer');
	}

	public function view_paper($id) {

		$this->load->model('review_model', 'revm');
		
		$data['id'] = $id;
		$data['paper'] = $this->confm->get_paper_by_id($id);
		$data['reviews'] = $this->revm->get_reviews($id);

		$this->load->view('header');
		$this->load->view('view_paper', $data);
		$this->load->view('footer');
	}

	public function accept($id) {

		$this->db->set('answer', 1);
		$this->db->where('id', $id);
		if($this->db->update('paper')) {
			$this->session->set_flashdata('success', 'Paper accepted successfully!');
		}

		redirect('conferences/view_paper/'.$id);
    }

	public function reject($id) {

		$this->db->set('answer', 0);
		$this->db->where('id', $id);
		if($this->db->update('paper')) {
			$this->session->set_flashdata('success', 'Paper rejected successfully!');
		}

		redirect('conferences/view_paper/'.$id);
    }
}
