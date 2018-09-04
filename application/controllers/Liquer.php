<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Liquer extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->model("Stock_model");
        $this->load->helper("form");
    }

    public function index() {
        $liquor_m_brands = $this->Stock_model->get_liquor_brands();
        $liquor_m_volumes = $this->Stock_model->get_liquor_volumes();
        $liquor_details = $this->Stock_model->get_liquors();

        $liquor_m_detail = array(
            'brands' => $liquor_m_brands,
            'volumes' => $liquor_m_volumes,
            'liquors' => $liquor_details
        );

        $this->load->view('template/header');
        $this->load->view('menu/liquer_menu', $liquor_m_detail);
        $this->load->view('template/footer');
    }

    public function add_edit_liquor() {
        $data_id = $this->input->post('data_id');
        $data_type = $this->input->post('data_type');

        $liq_brand = $this->input->post('liq_brand');
        $liq_volume = $this->input->post('liq_volume');
        $liq_name = $this->input->post('liq_name');
        $liq_quantity = $this->input->post('liq_quantity');
        $liq_buy_date = $this->input->post('liq_buy_date');
        $liq_buy_price = $this->input->post('liq_buy_price');
        $liq_sel_price = $this->input->post('liq_sel_price');
        $liq_discount = $this->input->post('liq_discount');
        $liq_discription = $this->input->post('liq_discription');

        $liq_no_25 = $this->input->post('liq_no_25');
        $liq_25_price = $this->input->post('liq_25_price');
        $liq_no_50 = $this->input->post('liq_no_50');
        $liq_50_price = $this->input->post('liq_50_price');

        if ($liq_brand == 0 || $liq_volume == 0) {
            $this->session->set_flashdata('add_error', 'Select a Brand & a Volume.');
            redirect('Liquer');
            return;
        }

        $data = array(
            'p_id' => $data_id,
            'liq_brand' => $liq_brand,
            'liq_volume' => $liq_volume,
            'liq_name' => $liq_name,
            'liq_quantity' => $liq_quantity,
            'liq_buy_date' => $liq_buy_date,
            'liq_buy_price' => $liq_buy_price,
            'liq_sel_price' => $liq_sel_price,
            'liq_discount' => $liq_discount,
            'liq_discription' => $liq_discription,
            'liq_no_25' => $liq_no_25,
            'liq_25_price' => $liq_25_price,
            'liq_no_50' => $liq_no_50,
            'liq_50_price' => $liq_50_price
        );

        if ($data_type == "ADD") {
            $result = $this->Stock_model->add_new_liquor($data);
        } else if ($data_type == "EDIT") {
            $result = $this->Stock_model->edit_liquor($data);
        }


        if ($result) {
            $this->session->set_flashdata('add_succ', 'Successfully Saved.');
            redirect('Liquer');
        } else {
            $this->session->set_flashdata('add_error', 'Error on saving.');
            redirect('Liquer');
        }
    }

    public function get_liq_by_id() {
        $f_id = $this->input->get("id");
        $result = $this->Stock_model->get_liq_by_id($f_id);
        if (sizeof($result) > 0) {

            $data_array = array(
                "iid" => $result[0]->iid,
                "brand" => $result[0]->brand,
                "volume" => $result[0]->volume,
                "liq_name" => $result[0]->liq_name,
                "liq_qty" => $result[0]->liq_qty,
                "purchase_date" => $result[0]->purchase_date,
                "buy_price" => $result[0]->buy_price,
                "sell_price" => $result[0]->sell_price,
                "discount" => $result[0]->discount,
                "description" => $result[0]->description,
                "no_of_25_shot" => $result[0]->no_of_25_shot,
                "price_25_shot" => $result[0]->price_25_shot,
                "no_of_50_shot" => $result[0]->no_of_50_shot,
                "price_50_shot" => $result[0]->price_50_shot
            );
            echo json_encode($data_array);
        } else {
            echo "NO_DATA";
        }
    }

    public function delete_liq() {
        $f_id = $this->input->get("id");
        $result = $this->Stock_model->delete_liq_by_id($f_id);
        if ($result) {
            $this->session->set_flashdata('delete_succ', 'Liquor Item Successfully Deleted.');
            redirect('Liquer');
        } else {
            $this->session->set_flashdata('delete_error', 'Error on Delete.');
            redirect('Liquer');
        }
    }

    public function get_shots_by_id() {
        $data_id = $this->input->get('id');
        $result = $this->Stock_model->get_shots_by_id($data_id);
        echo json_encode($result);
    }

}

?>