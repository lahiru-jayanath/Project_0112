<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Beverage extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->model("Stock_model");
        $this->load->helper("form");
    }

    public function index() {
        $bev_details = $this->Stock_model->get_bev_details();
        $stock_data = array('31','32','33');
        $bev_data = array(
            'bev_details' => $bev_details,
            'stock_data' => $stock_data
        );
        //var_dump($bev_data);die;
        $this->load->view('template/header');
        $this->load->view('menu/beverage_menu', $bev_data);
        $this->load->view('template/footer');
    }

    public function add_edit_beverage() {
        $data_id = $this->input->post('data_id');
        $data_type = $this->input->post('data_type');

        $bev_name = $this->input->post('bev_name');
        $b_quantity = $this->input->post('b_quantity');
        $b_buy_price = $this->input->post('b_buy_price');
        $b_sel_price = $this->input->post('b_sel_price');
        $b_discount = $this->input->post('b_discount');
        $b_discription = $this->input->post('b_discription');
        $b_buy_date = $this->input->post('b_buy_date');


        $data = array(
            'p_id' => $data_id,
            'bev_name' => $bev_name,
            'b_quantity' => $b_quantity,
            'b_buy_price' => $b_buy_price,
            'b_sel_price' => $b_sel_price,
            'b_discount' => $b_discount,
            'b_discription' => $b_discription,
            'b_buy_date' => $b_buy_date
        );

        if ($data_type == "ADD") {
            $result = $this->Stock_model->add_new_beverage($data);
        } else if ($data_type == "EDIT") {
            $result = $this->Stock_model->edit_beverage($data);
        }
       
        if ($result) {
            $this->session->set_flashdata('add_succ', 'Successfully Saved.');
            redirect('Beverage');
        } else {
            $this->session->set_flashdata('add_error', 'Error on saving.');
            redirect('Beverage');
        }
    }

    public function delete_bev() {
        $f_id = $this->input->get("id");
        $result = $this->Stock_model->delete_bev_by_id($f_id);
        if ($result) {
            $this->session->set_flashdata('delete_succ', 'Food Item Successfully Deleted.');
            redirect('Beverage');
        } else {
            $this->session->set_flashdata('delete_error', 'Error on Delete.');
            redirect('Beverage');
        }
    }

    public function get_bev_by_id() {
        $f_id = $this->input->get("id");
        $result = $this->Stock_model->get_bev_by_id($f_id);
        if (sizeof($result) > 0) {

            $data_array = array(
                "drink_id" => $result[0]->drink_id,
                "drink_name" => $result[0]->drink_name,
                "drink_description" => $result[0]->drink_description,
                "drink_price" => $result[0]->drink_price,
                "drink_salling_price" => $result[0]->drink_salling_price,
                "drink_discount" => $result[0]->drink_discount,
                "drink_purches_date" => $result[0]->drink_purches_date,
                "drink_stock" => $result[0]->drink_stock,
                "drink_current_stock" => $result[0]->drink_current_stock
            );
            echo json_encode($data_array);
        } else {
            echo "NO_DATA";
        }
    }

    public function addStock(){
       
        $product_id = $this->input->post('product_id');
        $qty = $this->input->post('qty');
        $buy_price = $this->input->post('buy_price');
        $selling_price = $this->input->post('selling_price');
        $discount = $this->input->post('discount');

       //$sum_current_qty = 0;
       $product_details = $this->Stock_model->get_bev_by_id_current($product_id);
       $sum_current_qty = $qty + $product_details->drink_current_stock;

        $html = $this->Stock_model->addStock($product_id, $qty, $buy_price, $selling_price, $discount);
        
        $html .= $this->Stock_model->updateDrinkstable($product_id,$qty,$buy_price,$selling_price,$discount,$sum_current_qty);
                                                        
        echo $html;
    }
}


//main class
?>