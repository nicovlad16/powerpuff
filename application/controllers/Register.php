<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index() {

		$this->load->view('header');
		$this->load->view('register');
		$this->load->view('footer');
	}

	public function check() {

        $this->load->library('form_validation');
        $this->load->model('Account_model');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('affiliation', 'Affiliation', 'trim');
        $this->form_validation->set_rules('webpage', 'Webpage', 'trim');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('role', 'Role', 'trim|required');

        if($this->form_validation->run() == True) {

        	$p = $this->input->post();

            $user = $this->Account_model->get_user_by_username($p['username']);

        	$this->db->set('username', $p['username']);
        	$this->db->set('password', md5($p['password']));
        	$this->db->set('type', $p['role']);
        	$this->db->set('name', $p['name']);
        	$this->db->set('email', $p['email']);
        	$this->db->set('affiliation', $p['affiliation']);
        	$this->db->set('webpage', $p['webpage']);

        	if($this->db->insert('user')) {
	            $this->session->set_flashdata('success', "Register successfull!");
        	}

        } else {
            $this->session->set_flashdata('error', validation_errors());
        }
        redirect('register');
    }
}
