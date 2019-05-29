<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listener extends CI_Controller {

	function __construct() {
		parent::__construct();

		$login = $this->session->userdata('login');
		
		$this->load->model('conference_model', 'confm');
		$this->load->model('account_model', 'accountm');
	}

	public function index($data = array()) {

		$login = $this->session->userdata('login');

		$data['confs'] = $this->confm->get_all_conferences();
		$data['user'] = $this->accountm->get_user_by_id($login['id']);

		$this->load->view('header');
		$this->load->view('listener', $data);
		$this->load->view('footer');
	}

	public function add() {

		$this->load->view('header');
		$this->load->view('listener_add');
		$this->load->view('footer');
	}

	public function edit($id = 0) {

		$data['id'] = $id;
		$data['user'] = $this->accountm->get_user_by_id($id);

		$this->load->view('header');
		$this->load->view('listener_add', $data);
		$this->load->view('footer');
	}

	public function save($id = 0) {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim');

        if($this->form_validation->run() == True) {

        	$p = $this->input->post();

        	$this->db->set('name', $p['name']);
        	$this->db->set('username', $p['username']);
        	$this->db->set('email', $p['email']);
        	$this->db->set('type', 5);

        	if(isset($p['password']) and !empty($p['password'])) {

        		$this->db->set('password', md5($p['password']));
        	}

        	if($id == 0) {
	        	if($this->db->insert('user')) {
		            $this->session->set_flashdata('success', "Listener added successfull!");
	        	}
	        } else {
	        	$this->db->where('id', $id);
	        	if($this->db->update('user')) {
		            $this->session->set_flashdata('success', "Listener updated successfull!");
	        	}
	        }
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }

        if($id == 0) {
        	redirect('listener/add');
        } else {
        	redirect('listener/edit/'.$id);
        }
    }
}
