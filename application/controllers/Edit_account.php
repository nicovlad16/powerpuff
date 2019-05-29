<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_account extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('account_model', 'accm');
	}

    public function index()
    {

    	if(isset($_GET['id'])) {
		   $id = $_GET['id'];
		}

    	$data = array();
    	$data['user'] = $this->accm->get_user_by_id($id);
    	$data['id'] = $id;

        $this->load->view('header');
        $this->load->view('edit_account', $data);
        $this->load->view('footer');
    }

    public function save($id = 0) {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('affiliation', 'Affiliation', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim');
        $this->form_validation->set_rules('webpage', 'Webpage', 'trim');

        if($this->form_validation->run() == True) {

        	$p = $this->input->post();

        	$this->db->set('name', $p['name']);
        	$this->db->set('username', $p['username']);
        	$this->db->set('email', $p['email']);
        	$this->db->set('affiliation', $p['affiliation']);
        	$this->db->set('webpage', $p['webpage']);

        	if(isset($p['password']) and !empty($p['password'])) {

        		$this->db->set('password', md5($p['password']));
        	}

        	if($id == 0) {
	        	if($this->db->insert('user')) {
		            $this->session->set_flashdata('success', "User added successfull!");
	        	}
	        } else {
	        	$this->db->where('id', $id);
	        	if($this->db->update('user')) {
		            $this->session->set_flashdata('success', "User updated successfull!");
	        	}
	        }
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }

        if($id == 0) {
        	redirect('edit_account');
        } else {
        	redirect('edit_account?id='.$id);
        }
    }

}