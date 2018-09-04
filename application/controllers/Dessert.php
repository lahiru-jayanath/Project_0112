<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dessert extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->model("Stock_model");
        $this->load->helper("form");
    }

    public function index() {
        $desserts_details = $this->Stock_model->get_dessert_detail();

        $desserts_detail = array(
            'desserts_detail' => $desserts_details
        );
        $this->load->view('template/header');
        $this->load->view('menu/desserts_menu', $desserts_detail);
        $this->load->view('template/footer');
    }

    public function add_edit_dessert() {
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
            $result = $this->Stock_model->add_new_dessert($data);
        } else if ($data_type == "EDIT") {
            $result = $this->Stock_model->edit_dessert($data);
        }

      
        if ($result) {
            $this->session->set_flashdata('add_succ', 'Successfully Saved.');
            redirect('Dessert');
        } else {
            $this->session->set_flashdata('add_error', 'Error on saving.');
            redirect('Dessert');
        }
    }

    public function delete_dessert() {
        $f_id = $this->input->get("id");
        $result = $this->Stock_model->delete_dessert_by_id($f_id);
        if ($result) {
            $this->session->set_flashdata('delete_succ', 'Food Item Successfully Deleted.');
            redirect('Dessert');
        } else {
            $this->session->set_flashdata('delete_error', 'Error on Delete.');
            redirect('Dessert');
        }
    }

    public function get_dessert_by_id() {
        $f_id = $this->input->get("id");
        $result = $this->Stock_model->get_dessert_by_id($f_id);
        if (sizeof($result) > 0) {

            $data_array = array(
                "dessert_id" => $result[0]->dessert_id,
                "dessert_name" => $result[0]->dessert_name,
                "dessert_descripton" => $result[0]->dessert_descripton,
                "dessert_price" => $result[0]->dessert_price,
                "dessert_discount" => $result[0]->dessert_discount
            );
            echo json_encode($data_array);
        } else {
            echo "NO_DATA";
        }
    }

}

// Main class
?>