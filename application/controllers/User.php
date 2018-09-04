<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->model("User_model");
        $this->load->helper("form");
    }

    public function index() {
        $user_detail = $this->User_model->get_user_details();
        $user_unit = $this->User_model->get_user_uni();
        //print_r($user_unit);die;
        $data = array(
            'user' => $user_detail,
            'user_unit' => $user_unit
        );

        $this->load->view('template/header');
        $this->load->view('user', $data);
        $this->load->view('template/footer');
    }

    public function add_new_user() {

        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $nic = $this->input->post('nic');
        $user_unit = $this->input->post('user_unit');
        $mobile = $this->input->post('mobile');
        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');

        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'nic' => $nic,
            'user_unit' => $user_unit,
            'mobile' => $mobile,
            'user_name' => $user_name,
            'password' => $password
        );
        $result = $this->User_model->add_new_user($data);

        if ($result) {
            $this->session->set_flashdata('add_succ', 'Successfully Added A New User');
            redirect('User');
        } else {
            $this->session->set_flashdata('add_error', 'Error');
            redirect('User');
        }
    }

    public function remove_user() {
        $f_id = $this->input->get("id");
        $result = $this->User_model->delete_user_by_id($f_id);
        if ($result) {
            $this->session->set_flashdata('delete_succ', 'User Successfylly Removed.');
            redirect('User');
        } else {
            $this->session->set_flashdata('delete_error', 'Error on Delete.');
            redirect('User');
        }
    }

}
