<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model("Bill_model");
    }


	public function index()
	{
            //$billmodel = new Bill_model();
        $data['today_income'] = $this->Bill_model->getlistTodayincome();
        $data['lastday_income'] = $this->Bill_model->getlistLastdateIncome();
        $data['lastweek_income'] = $this->Bill_model->getlistLastweekIncome();
        $data['lastmonth_income'] = $this->Bill_model->getlistLastmonthIncome();
        $this->load->view('template/header');
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer');
    }
	
	
	
	
	
	
}//main class
