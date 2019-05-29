<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $this->load->view('header');
        $this->load->view('login');
        $this->load->view('footer');
    }

    public function check() {

        $this->load->library('form_validation');
        $this->load->model('Account_model');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() == True) {

            $p = $this->input->post();
            
            $user = $this->Account_model->get_user_by_username($p['username']);

            if(isset($user) and !empty($user)) {

                if(md5($p['password']) == $user['password']) { 

                    $user_data = array(
                        'id' => $user['id'], 
                        'username' => $user['username'], 
                        'is_logged_in' => 1, 
                        'type' => $user['type']
                    );
                    $this->session->set_userdata('login', $user_data);

                    $this->session->set_flashdata('success', "Ai fost logat cu succes!");

                    if($user['type'] == 4) {
                        redirect('submitter');
                    }

                    if($user['type'] == 5) {
                        redirect('listener');
                    }
                    redirect('');

                } else {

                    $this->session->set_flashdata('error_pass', "Parola introdusa este gresita!");

                }

            } else {
                $this->session->set_flashdata('error_username', "Nu exista username-ul acesta in baza de date!");
            }
        } else {

            $this->session->set_flashdata('error_date', "Datele introduse sunt incorecte!");
        }

        redirect('login');
    }

    public function logout() {
        
        $this->session->unset_userdata('login', $sess_array);

        $this->session->set_flashdata('success_logout', "Tocmai ai fost delogat!");
        
        redirect('');
        
    }
}
