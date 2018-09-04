<?php
/**
 * Created by PhpStorm.
 * User: Harsha
 * Date: 8/16/2018
 * Time: 9:57 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class ShowBill extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model("Bill_model");
        $this->load->helper("form");
    }

    public function index() {
        $b_id = $this->input->get("id");
        $bill_result = $this->Bill_model->show_bill_by_id($b_id);

        $show_bill = array(
            'show_bill' => $bill_result
        );
        $this->load->view('template/header');
        $this->load->view('menu/show_bill',$show_bill);
        $this->load->view('template/footer');
    }


}

// Main class
?>