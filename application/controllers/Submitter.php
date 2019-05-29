<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submitter extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Conference_model', 'confm');
        $this->load->model('Paper_model', 'paperm');
        $this->load->model('Account_model');
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
        $data['papers'] = array();

        //here we verify if the user logged in has already submitted a paper to a given conference
        //we build an array with indexes the id`s of the conference, 
        //and values: 1 if exist paper submited to that conference, 0 otherwise
        //we make this to build the edit method for the paper submitted in front-end

        foreach ($data['confs'] as $conf) {

            $paper = $this->paperm->get_paper_by_uid_cid($login['id'], $conf['id']);
            if(isset($paper) and !empty($paper)) {

                $data['papers'][$conf['id']] = 1;
                $data['papers']['pid'] = $paper['id'];
            } else {

                $data['papers'][$conf['id']] = 0;
            }
        }

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

    	$login = $this->session->userdata('login');
		if(!isset($login) || $login['type'] != 4) {
			redirect();
		}

        $this->load->model('Conference_model');

        $data['conf'] = $this->Conference_model->get_conference_by_id($conference_id);
        $data['id_conference'] = $conference_id;

        $this->load->view('header');
        $this->load->view('submit', $data);
        $this->load->view('footer');
    }

    public function edit_paper($paper_id = 0, $conference_id = 0) {

    	$login = $this->session->userdata('login');
		if(!isset($login) || $login['type'] != 4) {
			redirect();
		}

        $this->load->model('Conference_model');
        $login = $this->session->userdata('login');

        $data['conf'] = $this->Conference_model->get_conference_by_id($conference_id);
        $data['id_conference'] = $conference_id;
        $data['paper'] = $this->paperm->get_paper_by_id($paper_id);
        $data['id'] = $data['paper']['id'];

        $this->load->view('header');
        $this->load->view('submit', $data);
        $this->load->view('footer');
    }

    public function save($id = 0) {

    	$login = $this->session->userdata('login');
		if(!isset($login) || $login['type'] != 4) {
			redirect();
		}

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

            $file = FALSE;

            if($_FILES) {

                $file = $this->do_uploade();
                if(isset($file) and !empty($file)) {

                    $this->db->set('file', $file);
                }
                               
            }

            $this->db->set('title', $p['title']);
            $this->db->set('keywords', $p['keywords']);
            $this->db->set('topics', $p['topics']);
            $this->db->set('meta_info', $p['meta_info']);
            $this->db->set('paper', $p['paper']);
            $this->db->set('abstract', $p['abstract']);
            $this->db->set('uid', $login['id']);
            $this->db->set('cid', $p['conference_id']);



            if($id == 0) {

                if($this->db->insert('paper')) {
                    $this->session->set_flashdata('success', "Paper added successfull!");
                }
            } else {
                $this->db->where('id', $id);
                if($this->db->update('paper')) {
                    $this->session->set_flashdata('success', "Paper updated successfull!");
                }
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }


        if($id == 0) {
            redirect('submitter/');
        } else {

            redirect('submitter/edit_paper/'.$id.'/'.$p['conference_id']);
        }
    }

    function do_uploade() {

    	$login = $this->session->userdata('login');
		if(!isset($login) || $login['type'] != 4) {
			redirect();
		}

        $config['upload_path'] = './files';
        $config['allowed_types'] = 'gif|jpg|png|pdf';

        $this->load->library('upload', $config);
        if($this->upload->do_upload('pdf')) { 
            return $_FILES['pdf']['name']; 
        } else { 
            return; 
        } 
        
    }
}
