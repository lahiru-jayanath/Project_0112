<?php
/**
 * Created by PhpStorm.
 * User: Harsha
 * Date: 8/16/2018
 * Time: 9:57 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class BillingHistory extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model("Bill_model");
        $this->load->helper("form");
    }

    public function index() {
        $bill_history_details = $this->Bill_model->get_bill_history_detail();
       // var_dump($bill_history_details);die;
        $bill_history = array(
            'bill_history' => $bill_history_details
        );
        $this->load->view('template/header');
        $this->load->view('menu/billHistory',$bill_history);
        $this->load->view('template/footer');
    }

    public function load_from_date(){
        $date_start = $this->input->get("date_start");
        $date_end = $this->input->get("end_date");
        //var_dump($date_start);die;
        $data = array(
            "date_start" => $date_start,
            "date_end"  => $date_end
        );

        $result = $this->Bill_model->bill_by_date_filer($data);
    }
}

// Main class
?>