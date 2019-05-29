<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sections extends CI_Controller {

	function __construct() {
		parent::__construct();

		$login = $this->session->userdata('login');
		if(!isset($login) || $login['type'] > 3) {
			redirect();
		}
		$this->load->model('conference_model', 'confm');
		$this->load->model('sections_model', 'secm');
	}

	public function index($id) {

		$data['id'] = $id;
		$sections = $this->secm->get_all_sections_from_conf($id);
		$data['sections'] = array();
		$k = 0;
		foreach ($sections as $section) {
			$data['sections'][$k] = $section;
			$attend = !empty($this->secm->check_attend($section['id'], $this->session->userdata('login')['id'])) ? 1 : 0;
			$data['sections'][$k]['attend'] = $attend;

			$k++;
		}

		$this->load->view('header');
		$this->load->view('sections', $data);
		$this->load->view('footer');
	}

	public function add() {

		$data['conferences'] = $this->confm->get_all_conferences();

		$this->load->view('header');
		$this->load->view('section_add', $data);
		$this->load->view('footer');
	}

	public function edit($id = 0) {

		$data['id'] = $id;
		$data['conferences'] = $this->confm->get_all_conferences();
		$data['section'] = $this->secm->get_section_by_id($id);

		$this->load->view('header');
		$this->load->view('section_add', $data);
		$this->load->view('footer');
	}

	public function save($id = 0) {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('conference', 'Conference', 'trim|required');
        $this->form_validation->set_rules('hour_start', 'Hour start', 'trim|required');
        $this->form_validation->set_rules('hour_end', 'Hour end', 'trim|required');
        $this->form_validation->set_rules('room', 'Room', 'trim|required');

        if($this->form_validation->run() == True) {

        	$p = $this->input->post();

        	$this->db->set('cid', $p['conference']);
        	$this->db->set('hour_start', $p['hour_start']);
        	$this->db->set('hour_end', $p['hour_end']);
        	$this->db->set('room', $p['room']);

        	if($id == 0) {
	        	if($this->db->insert('session')) {
		            $this->session->set_flashdata('success', "Section added successfull!");
	        	}
	        } else {
	        	$this->db->where('id', $id);
	        	if($this->db->update('session')) {
		            $this->session->set_flashdata('success', "Section updated successfull!");
	        	}
	        }
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }

        if($id == 0) {
        	redirect('sections/add');
        } else {
        	redirect('sections/edit/'.$id);
        }
    }

	public function attend($sid, $cid) {

		$this->db->set('uid', $this->session->userdata('login')['id']);
		$this->db->set('sid', $sid);

		if($this->db->insert('session_participant')) {
			$this->session->set_flashdata('success', 'Your seat has been reserved!');
		}

		redirect('sections/index/'.$cid);
    }
}
