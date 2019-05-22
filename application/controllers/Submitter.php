<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submitter extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Conference_model', 'confm');
    }

    public function index() {

        $login = $this->session->userdata('login');
		if(!isset($login) || $login['type'] != 4) {
			redirect();
		}

        $this->load->model('Account_model');
        
        $user = $this->Account_model->get_user_by_username($login['username']);

        $data = array();
        $data['user'] = $user;
        $data['confs'] = $this->confm->get_all_conferences();

		$this->load->view('header');
		$this->load->view('submitter', $data);
		$this->load->view('footer');
	}

    public function register() {

        $this->load->view('header');
        $this->load->view('submitter_register');
        $this->load->view('footer');
    }

	public function check() {

        $this->load->library('form_validation');
        $this->load->model('Account_model');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('affiliation', 'Affiliation', 'trim');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('role', 'Role', 'trim|required');

        if($this->form_validation->run() == True) {

            $p = $this->input->post();

            $user = $this->Account_model->get_user_by_username($p['username']);

            if(isset($user) and !empty($user)) {

                 $this->session->set_flashdata('error_dublicate', "User already in the database!");
                 redirect('submitter/register');
            }

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
        redirect('submitter/register');
    }

    public function submit($conference_id) {

        $this->load->model('Conference_model');

        $data['conf'] = $this->Conference_model->get_conference_by_id($conference_id);
        $data['id'] = $conference_id;

        $this->load->view('header');
        $this->load->view('submit', $data);
        $this->load->view('footer');
    }

    public function save($id = 0) {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('keywords', 'Keywords', 'trim|required');
        $this->form_validation->set_rules('topics', 'Topics', 'trim|required');
        $this->form_validation->set_rules('meta_info', 'Meta info', 'trim|required');
        $this->form_validation->set_rules('abstract', 'Abstract', 'trim|required');
        $this->form_validation->set_rules('paper', 'Paper', 'trim');

        if($this->form_validation->run() == True) {

            $login = $this->session->userdata('login');
            $p = $this->input->post();

            $this->db->set('title', $p['title']);
            $this->db->set('keywords', $p['keywords']);
            $this->db->set('topics', $p['topics']);
            $this->db->set('meta_info', $p['meta_info']);
            $this->db->set('abstract', $p['abstract']);
            $this->db->set('paper', $p['paper']);
            $this->db->set('uid', $login['id']);

            $this->load->helper(array('form','url'));
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf';
            $config['max_size']    = 0;
     
            $this->load->library('upload', $config);
     
            if (!$this->upload->do_upload())
            {
                $this->data['error'] = $this->upload->display_errors();
                $this->data['page_data'] = 'submitter/submit';
                $this->load->view('submit', $this->data);
             }
            else
            {
                  print_r($this->upload->data());
            }

            if($id == 0) {
                if($this->db->insert('paper')) {
                    $this->session->set_flashdata('success', "Paper added successfull!");
                }
            } else {
                $this->db->where('paper', $id);
                if($this->db->update('conference')) {
                    $this->session->set_flashdata('success', "Paper updated successfull!");
                }
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }

        if($id == 0) {
            redirect('submitter/submit');
        } else {
            redirect('submitter/edit/'.$id);
        }
    }
}
