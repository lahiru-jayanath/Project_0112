<?php
/**
 * Created by PhpStorm.
 * User: Harsha
 * Date: 8/16/2018
 * Time: 9:57 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class BeerHistory extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model("Bill_model");
        $this->load->helper("form");
    }

    public function index() {
        // var_dump($bill_history_details);die;
       $item = array('7');
         $bill_history_details = $this->Bill_model->get_bill_history_details_from_beer(date("Y-m-d"),$item);
      
        $bill_history = array(
            'beer_history' => $bill_history_details
        );
       
        $this->load->view('template/header');
        $this->load->view('menu/beerHistory',$bill_history);
        $this->load->view('template/footer');
    }

   
    public function load_data_from_date(){
        
          $date_start = $this->input->post("date_start");
          $date_end = $this->input->post("end_date");
          $item_value = $this->input->post("item");
          
          if($item_value=='0'){
              
              $item = array(7);
          }
          else {
              $item = array($item_value);
          }
              
          
          $bill_history = $this->Bill_model->get_beer_bill_history_detail_from_date($date_start,$date_end,$item);
       //   print_r($bill_history);
          $html  = '<table class="table table-bordered table-striped table-condensed flip-content">
                                                <thead class="flip-content">
                                                <tr>
                                                  <th> # </th>
                                                    <th> Bill Number </th>
                                                    <th class="numeric"> Name </th>
                                                    <th class="numeric"> Table Or Room Number </th>
                                                    <th class="numeric"> Qty </th>
                                                     <th class="numeric"> Total </th>
                                                    <th class="numeric"> Action </th>
                                                </tr>
                                                </thead><thbody>';
               $n = 1;
                                                if (sizeof($bill_history) > 0) {

                                                foreach ($bill_history as $bill_history_result) { 
                                        $html .=  '<tr><td class="text-left">'.$n.' </td>';
                                        $html .=  '<td>'.$bill_history_result->session_id.'</td>';
                                        $html .=  '<td class="numeric text-right">'.$bill_history_result->liq_name.'</td>';
                                        $html .=  '<td class="numeric text-right">'.$bill_history_result->tbl_name.'</td>';
                                        $html .=  '<td class="numeric text-right">'.$bill_history_result->qty.'</td>';       
                                        $html .=  '<td class="numeric text-right">'.$bill_history_result->total.'</td>';       
                                        $html .= ' <td class="numeric text-center">
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