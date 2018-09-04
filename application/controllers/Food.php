<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Food extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model("Stock_model");
        $this->load->helper("form");
    }

    public function index() {
        $foods_details = $this->Stock_model->get_food_detail();

        $food_detail = array(
            'food_detail' => $foods_details
        );
        $this->load->view('template/header');
        $this->load->view('menu/food_menu', $food_detail);
        $this->load->view('template/footer');
    }

    public function add_main_food() {
        $product_name = $this->input->get('product_name');
        $p_sel_price = $this->input->get('p_sel_price');
        $p_discount = $this->input->get('p_discount');
        $p_discription = $this->input->get('p_discription');


        $data = array(
            'p_id' => 0,
            'p_name' => $product_name,
            'p_sel_price' => $p_sel_price,
            'p_discount' => $p_discount,
            'p_discription' => $p_discription
        );
        $result = $this->Stock_model->add_new_food($data);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function add_edit_food() {
        $page_origin = $this->input->post('page_origin');
        $data_id = $this->input->post('data_id');
        $data_type = $this->input->post('data_type');
        $product_name = $this->input->post('product_name');
        $p_sel_price = $this->input->post('p_sel_price');
        $p_discount = $this->input->post('p_discount');
        $p_discription = $this->input->post('p_discription');

        $data = array(
            'p_id' => $data_id,
            'p_name' => $product_name,
            'p_sel_price' => $p_sel_price,
            'p_discount' => $p_discount,
            'p_discription' => $p_discription
        );

        if ($data_type == "ADD") {
            $result = $this->Stock_model->add_new_food($data);
        } else if ($data_type == "EDIT") {
            $result = $this->Stock_model->edit_food($data);
        }

        if ($result) {

            if ($page_origin == "BILL") {
                $this->session->set_flashdata('add_succ', 'Successfully Saved.');
                redirect('Bill');
            } else {
                $this->session->set_flashdata('add_succ', 'Successfully Saved.');
                redirect('Food');
            }
        } else {
            if ($page_origin == "BILL") {
                $this->session->set_flashdata('add_error', 'Error on saving.');
                redirect('Bill');
            } else {
                $this->session->set_flashdata('add_error', 'Error on saving.');
                redirect('Food');
            }
        }
    }

    public function delete_foods() {
        $f_id = $this->input->get("id");
        $result = $this->Stock_model->delete_food_by_id($f_id);
        if ($result) {
            $this->session->set_flashdata('delete_succ', 'Food Item Successfully Deleted.');
            redirect('Food');
        } else {
            $this->session->set_flashdata('delete_error', 'Error on Delete.');
            redirect('Food');
        }
    }

    public function get_foods_by_id() {
        $f_id = $this->input->get("id");
        $result = $this->Stock_model->get_food_by_id($f_id);
        if (sizeof($result) > 0) {

            $data_array = array(
                "food_id" => $result[0]->food_id,
                "food_name" => $result[0]->food_name,
                "food_description" => $result[0]->food_description,
                "food_price" => $result[0]->food_price,
                "food_discount" => $result[0]->food_discount
            );
            echo json_encode($data_array);
        } else {
            echo "NO_DATA";
        }
    }

}

// Main class
?>