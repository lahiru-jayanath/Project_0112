<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model("Bill_model");;
    }


	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('dashboard');
		$this->load->view('template/footer');
	}
	
	
	
	
	
	
}//main class
