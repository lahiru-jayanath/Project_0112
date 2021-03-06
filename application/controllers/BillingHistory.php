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
        $cu_date = $date_end->fromatdate("Y-m-d 00:00:00",$date_start);
        //var_dump($cu_date);die;
        $data = array(
            "start_date" => $date_start,
            "end_date" =>$date_end
        );

        $load_by_date = $this->Bill_model->load_by_date($date_start,$date_end);


    }
    public function load_data_from_date(){
        
          $date_start = $this->input->post("date_start");
          $date_end = $this->input->post("end_date");
          $bill_history = $this->Bill_model->get_bill_history_detail_from_date($date_start,$date_end);
       //   print_r($bill_history);
          $html  = '<table class="table table-bordered table-striped table-condensed flip-content">
                                                <thead class="flip-content">
                                                <tr>
                                                    <th> # </th>
                                                    <th> Bill Number </th>
                                                    <th class="numeric"> Bill Owner </th>
                                                    <th class="numeric"> Waiter </th>
                                                    <th class="numeric"> Table Or Room Number </th>
                                                    <th class="numeric"> Total </th>
                                                    <th class="numeric"> Action </th>
                                                </tr>
                                                </thead><thbody>';
               $n = 1;
                                                if (sizeof($bill_history) > 0) {

                                                foreach ($bill_history as $bill_history_result) { 
                                        $html .=  '<tr><td class="text-left">'.$n.' </td>';
                                        $html .=  '<td>'.$bill_history_result->session_id.'</td>';
                                        $html .=  '<td class="numeric text-right">'.$bill_history_result->bill_owner.'</td>';
                                        $html .=  '<td class="numeric text-right">'.$bill_history_result->waiter.'</td>';
                                        $html .=  '<td class="numeric text-right">'.$bill_history_result->tbl_name.'</td>';       
                                        $html .=  '<td class="numeric text-right">'.$bill_history_result->total.'</td>';       
                                        $html .= ' <td class="numeric text-center">
                                                                <a class="btn btn-sm btn-success text-center"  title="Edit" href="'.base_url().'ShowBill?id='.$bill_history_result->session_id.'" > <i class="fa fa-edit" style="margin-right: 10px;"></i> </a>
                                                                <a class="btn btn-sm btn-danger text-center"  style="text-align:center;"  title="Delete" href="'.base_url().'Bill/delete_bill?id='.$bill_history_result->session_id.'"  onclick="return confirm(`Are You Sure?`);"> <i class="fa fa-times" style="margin-right: 10px;"></i> </a>

                                                            </td>';
                                        $html .=    '</tr>';
                                                
                                          $n++;
                                                }
                                                
                                                }
                                                else {
                                                   
                                          $html .= '<div class="alert alert-danger">
                                                        <strong>Sorry!</strong> There is no data to display.
                                                    </div>';          
                                                }
          $html .= '                          
                                                </tbody>
                                            </table>';
         
          echo  $html;
        
    }
    public function beerHistory(){
        
        $this->load->view('template/header');
         $item = array('7');
        $data['beer_history'] = $this->Bill_model->get_bill_history_details_from_beer(date("Y-m-d"),$item);
       
        $this->load->view('menu/beerHistory',$data);
        $this->load->view('template/footer');
    }
   
}

// Main class
?>