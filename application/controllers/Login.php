<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->model("User_model");
    }

    public function index($msg = NULL) {
        $data['msg'] = $msg;
        $this->load->view('login', $data);
    }

    public function process() {

        // Validate the user can login
        $result = $this->User_model->login_validate();
        // Now we verify the result
        // If user did not validate, then show them login page again
        $msg_sucesss = '<h4 class="font-red text-center"><strong>Error!</strong> <br><br>Invalid Username or Password<h4>';
        $msg_unpublish = '<h4 class="font-red text-center"><strong>Sorry!</strong> <br><br>Your account has been unpublished.Please contact administrator.<h4>';

        $user_detail = ($this->session->all_userdata()['logged_user_details']);


        if (!$result) {
            $this->session->set_flashdata('login_error', $msg_sucesss);
            redirect('Login');
        } else {

            if ($result == 1 && $user_detail['user_group'] == 1) {
                redirect('Bill');
            }elseif($result == 1 && $user_detail['user_group'] != 1) {
                redirect('Dashboard');
            } else {
                $this->session->set_flashdata('login_error', $msg_unpublish);
                redirect('Login');
            }
        }
    }

    public function logout() {

        //$this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        //redirect('login', 'refresh');
        redirect('login');
    }

}

// main class 
