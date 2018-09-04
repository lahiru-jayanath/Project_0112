<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Helper extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->model("Stock_model");
        $this->load->helper("form");
    }

    function getBrandName() {
        return "test-bran";
    }

}

?>