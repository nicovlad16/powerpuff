<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {

		$this->load->model('conference_model', 'confm');

		$data['confs'] = $this->confm->get_all_conferences();

		$this->load->view('header');
		$this->load->view('home', $data);
		$this->load->view('footer');
	}

	public function details($id) {

		$this->load->model('conference_model', 'confm');
		$this->load->model('sections_model', 'secm');

		$data['sections'] = $this->secm->get_all_sections_from_conf($id);

		$this->load->view('header');
		$this->load->view('sections_public', $data);
		$this->load->view('footer');
	}
}
