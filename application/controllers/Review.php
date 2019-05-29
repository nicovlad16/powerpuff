<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

	function __construct() {
		parent::__construct();

		$login = $this->session->userdata('login');
		if(!isset($login) || $login['type'] > 3) {
			redirect();
		}
		$this->load->model('conference_model', 'confm');
		$this->load->model('bidding_model', 'bidm');
		$this->load->model('review_model', 'revm');
	}

	public function index($id) { // review paper

		$data['id'] = $id;
		$data['paper'] = $this->confm->get_paper_by_id($id);
		$data['reviews'] = $this->revm->get_reviews($id);

		$this->load->view('header');
		$this->load->view('review_paper', $data);
		$this->load->view('footer');
	}

	public function save($id) {

		$this->load->library('form_validation');

        $this->form_validation->set_rules('qualifier', 'Qualifier', 'trim|required');
        $this->form_validation->set_rules('recomandation', 'Recomandation', 'trim');

        if($this->form_validation->run() == True) {

        	$p = $this->input->post();

        	$this->db->set('pid', $id);
        	$this->db->set('uid', $this->session->userdata('login')['id']);
        	$this->db->set('qualifier', $p['qualifier']);
        	$this->db->set('recomandation', $p['recomandation']);

        	if($this->db->insert('review')) {
	            $this->session->set_flashdata('success', "Conference added successfull!");
        	} else {
	            $this->session->set_flashdata('error', "There was an error. Please try again!");
        	}
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }

        redirect('review/index/'.$id);
	}

	public function assign($proposal_id) {

		$login = $this->session->userdata('login');
		if(!isset($login) || $login['type'] > 2) { // just chair/co-chair
			redirect();
		}

		$data['proposal_id'] = $proposal_id;
		$pc_members = $this->revm->get_all_pcmembers($proposal_id);

		$data['pc_members'] = array();
		$k = 0;
		foreach ($pc_members as $pcm) {
			$data['pc_members'][$k] = $pcm;
			$ans = !empty($this->revm->get_answer($proposal_id, $pcm['id'])) ? $this->revm->get_answer($proposal_id, $pcm['id'])['answer'] : -1;
			$data['pc_members'][$k]['answer'] = $ans;
			$assigned = !empty($this->revm->check_assigned($proposal_id, $pcm['id'])) ? 1 : 0;
			$data['pc_members'][$k]['assigned'] = $assigned;

			$k++;
		}

		$this->load->view('header');
		$this->load->view('assign', $data);
		$this->load->view('footer');
	}

	public function ass($proposal_id, $user_id) {

		$login = $this->session->userdata('login');
		if(!isset($login) || $login['type'] > 2) { // just chair/co-chair
			redirect();
		}

		$this->db->set('pid', $proposal_id);
		$this->db->set('uid', $user_id);
		if($this->db->insert('reviewers_paper')) {
			$this->session->set_flashdata('success', 'Reviewer assigned!');
			redirect('review/assign/'.$proposal_id);
		} else {
			$this->session->set_flashdata('error', "There was an error. Please try again!");
			redirect('review/assign/'.$proposal_id);
		}
	}
}
