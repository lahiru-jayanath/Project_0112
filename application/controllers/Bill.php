<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bill extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model("Bill_model");
        $this->load->model("Stock_model");
        $this->load->helper("form");
    }

    public function index() {
        $table_details = $this->Bill_model->get_tables();
        $waiter_details = $this->Bill_model->get_all_waiters();
        $bill_type_details = $this->Bill_model->get_all_bill_type();
        $Bill_data = array(
            'table_details' => $table_details,
            'waiter_details' => $waiter_details,
            'bill_type_details' => $bill_type_details
        );
        $this->load->view('template/header');
        $this->load->view('billing', $Bill_data);
        $this->load->view('template/footer');
    }

    public function load_items() {
        $data = $_POST['catID'];
        $result_load_items = $this->Bill_model->load_items($data);
        echo json_encode($result_load_items);
    }

    public function create_new_bill() {
        //        $data = substr(time() . rand(1000, 9999), -8);

        $result_item_no = $this->Bill_model->get_last_cart_id();
        $data = str_pad($result_item_no, 8, "0", STR_PAD_LEFT);
        $this->session->set_userdata('current_session', $data);
        echo $data;
    }

    public function add_to_cart() {
        $item_table_id = 0;
        $item_table_type = "";
        $session_id = $this->input->get("id");
        $type = $this->input->get("type");
        $bill_type = $this->input->get("bill_type");

        $user_detail = ($this->session->all_userdata()['logged_user_details']);
        $user_id = $user_detail['uid'];

        if ($session_id != "") {

            $item_id = $this->input->get("item_id");

            if (strpos($item_id, 'F_') > 0) {
                $item_table_id = str_replace("IF_", "", $item_id);
                $item_table_type = "F";
            } else if (strpos($item_id, 'D_') > 0) {
                $item_table_id = str_replace("ID_", "", $item_id);
                $item_table_type = "D";
            } else if (strpos($item_id, 'B_') > 0) {
                $item_table_id = str_replace("IB_", "", $item_id);
                $item_table_type = "B";
            } else if (strpos($item_id, 'L_') > 0) {
                $item_table_id = str_replace("IL_", "", $item_id);
                $item_table_type = "L";
            }

            $data = array(
                'session_id' => $session_id,
                'type' => $item_table_type,
                'item_id' => $item_table_id,
                'selection' => "NO",
                'qty' => 0,
                'subtotal' => 0,
                'bill_type' => $bill_type,
                'user_id' => $user_id,
                'ltype' => $type
            );
            echo $result = $this->Bill_model->add_to_cart($data);
        } else {
            echo "ERROR";
        }
//echo $tem_id = $_POST['itemId'];
    }

    public function add_item_to_bill() {
        $data = $_POST['itemId'];
        $result_item_data = $this->Bill_model->get_item_data($data);
        echo json_encode($result_item_data);
    }

    public function save_table_items() {
        $data = $_POST['val'];
        print_r($data);
    }

    public function delete_bill() {
        $f_id = $this->input->get("id");
        $result = $this->Bill_model->delete_bill_by_id($f_id);
        if ($result) {
            $this->session->set_flashdata('delete_succ', 'Bill Successfully Deleted.');
            redirect('BillingHistory');
        } else {
            $this->session->set_flashdata('delete_error', 'Error on Delete.');
            redirect('BillingHistory');
        }
    }


    public function show_bill(){
        $b_id = $this->input->get("id");
        $bill_result = $this->Bill_model->show_bill_by_id($b_id);

        $show_bill = array(
            'show_bill' => $bill_result
        );
        $this->load->view('template/header');
        $this->load->view('menu/show_bill',$show_bill);
        $this->load->view('template/footer');
    }

    public function get_all_cart_items() {
        $session_id = $this->input->get("id");
        $result_item_data = $this->Bill_model->get_all_cart_items($session_id);

        $data_array = array();

        if (sizeof($result_item_data) > 0) {
            foreach ($result_item_data as $item) {
                $id = $item->iid;
                $session_id = $item->session_id;
                $type = $item->type;
                $item_id = $item->item_id;
                $selection = $item->selection;
                $qty = $item->qty;
                $ltype = $item->ltype;

                if ($type == "F") {
                    $result_food = $this->Stock_model->get_food_by_id($item_id);
                    if (sizeof($result_food) > 0) {
                        $temp_array = array(
                            'cart_id' => $id,
                            'item_type' => 'F',
                            'l_type' => '',
                            'item_id' => $result_food[0]->food_id,
                            'item_name' => $result_food[0]->food_name,
                            'item_price' => $result_food[0]->food_price,
                            'item_discount' => $result_food[0]->food_discount,
                            'qty' => $qty
                        );
                        array_push($data_array, $temp_array);
                    }
                } else if ($type == "D") {
                    $result_des = $this->Stock_model->get_dessert_by_id($item_id);
                    if (sizeof($result_des) > 0) {
                        $temp_array = array(
                            'cart_id' => $id,
                            'item_type' => 'D',
                            'l_type' => '',
                            'item_id' => $result_des[0]->dessert_id,
                            'item_name' => $result_des[0]->dessert_name,
                            'item_price' => $result_des[0]->dessert_price,
                            'item_discount' => $result_des[0]->dessert_discount,
                            'qty' => $qty
                        );
                        array_push($data_array, $temp_array);
                    }
                } else if ($type == "B") {
                    $result_bev = $this->Stock_model->get_bev_by_id($item_id);
                    if (sizeof($result_bev) > 0) {
                        $temp_array = array(
                            'cart_id' => $id,
                            'item_type' => 'B',
                            'l_type' => '',
                            'item_id' => $result_bev[0]->drink_id,
                            'item_name' => $result_bev[0]->drink_name,
                            'item_price' => $result_bev[0]->drink_salling_price,
                            'item_discount' => $result_bev[0]->drink_discount,
                            'qty' => $qty
                        );
                        array_push($data_array, $temp_array);
                    }
                } else if ($type == "L") {
                    $result_liq = $this->Stock_model->get_liq_by_id($item_id);
                    if (sizeof($result_liq) > 0) {
                        $liq_price = "";
                        if ($ltype == "BTL") {
                            $liq_price = $result_liq[0]->sell_price;
                        } else if ($ltype == "25ML") {
                            $liq_price = $result_liq[0]->price_25_shot;
                        } else if ($ltype == "50ML") {
                            $liq_price = $result_liq[0]->price_50_shot;
                        }

                        $temp_array = array(
                            'cart_id' => $id,
                            'item_type' => 'L',
                            'l_type' => $ltype,
                            'item_id' => $result_liq[0]->iid,
                            'item_name' => $result_liq[0]->liq_name,
                            'item_price' => $liq_price,
                            'item_discount' => $result_liq[0]->discount,
                            'qty' => $qty
                        );
                        array_push($data_array, $temp_array);
                    }
                }
            }

            echo json_encode($data_array);
        }

//echo json_encode($result_item_data);
    }

    function proceed_bill() {
        $item_id = $this->input->get("id");
        echo $result = $this->Bill_model->proceed_bill($item_id);
    }

    function delete_item_by_id() {
        $item_id = $this->input->get("id");
        $result = $this->Bill_model->delete_item_by_id($item_id);
        if ($result) {
            echo TRUE;
        } else {
            echo FALSE;
        }
    }

    function cancel_bill() {
        $item_id = $this->input->get("id");
        $this->session->set_userdata('current_session', '');
        $result = $this->Bill_model->cancel_bill($item_id);
        if ($result) {
            echo TRUE;
        } else {
            echo FALSE;
        }
    }

    function update_cart() {
        $cartid = $this->input->get("id");
        $cartid = str_replace("CI_", "", $cartid);
        $table_id = $this->input->get("table_id");
        $waiter_id = $this->input->get("waiter_id");
        $qty = $this->input->get("qty");
		$sub_total = $this->input->get("subtotal2");
        $result = $this->Bill_model->update_cart_item($cartid, $qty,$sub_total, $table_id, $waiter_id);
        echo json_encode($result);
    }

    public function get_all_bill_items($session_id) {
        $result_item_data = $this->Bill_model->get_all_cart_items($session_id);

        $data_array = array();

        if (sizeof($result_item_data) > 0) {
            foreach ($result_item_data as $item) {
                $id = $item->iid;
                $session_id = $item->session_id;
                $type = $item->type;
                $item_id = $item->item_id;
                $selection = $item->selection;
                $qty = $item->qty;
                $ltype = $item->ltype;
                $vbill_type = $item->vbill_type;
                $tbl_name = $item->tbl_name;

                if ($type == "F") {
                    $result_food = $this->Stock_model->get_food_by_id($item_id);
                    if (sizeof($result_food) > 0) {
                        $temp_array = array(
                            'cart_id' => $id,
                            'item_type' => 'F',
                            'item_id' => $result_food[0]->food_id,
                            'item_name' => $result_food[0]->food_name,
                            'item_price' => $result_food[0]->food_price,
                            'item_discount' => $result_food[0]->food_discount,
                            'qty' => $qty,
                            'bill_type' => $vbill_type,
                            'tbl_name' => $tbl_name
                        );
                        array_push($data_array, $temp_array);
                    }
                } else if ($type == "D") {
                    $result_des = $this->Stock_model->get_dessert_by_id($item_id);
                    if (sizeof($result_des) > 0) {
                        $temp_array = array(
                            'cart_id' => $id,
                            'item_type' => 'D',
                            'item_id' => $result_des[0]->dessert_id,
                            'item_name' => $result_des[0]->dessert_name,
                            'item_price' => $result_des[0]->dessert_price,
                            'item_discount' => $result_des[0]->dessert_discount,
                            'qty' => $qty,
                            'bill_type' => $vbill_type,
                            'tbl_name' => $tbl_name
                        );
                        array_push($data_array, $temp_array);
                    }
                } else if ($type == "B") {
                    $result_bev = $this->Stock_model->get_bev_by_id($item_id);
                    if (sizeof($result_bev) > 0) {
                        $temp_array = array(
                            'cart_id' => $id,
                            'item_type' => 'B',
                            'item_id' => $result_bev[0]->drink_id,
                            'item_name' => $result_bev[0]->drink_name,
                            'item_price' => $result_bev[0]->drink_salling_price,
                            'item_discount' => $result_bev[0]->drink_discount,
                            'qty' => $qty,
                            'bill_type' => $vbill_type,
                            'tbl_name' => $tbl_name
                        );
                        array_push($data_array, $temp_array);
                    }
                } else if ($type == "L") {
                    $result_liq = $this->Stock_model->get_liq_by_id($item_id);
                    if (sizeof($result_liq) > 0) {
                        $liq_price = "";
                        if ($ltype == "BTL") {
                            $liq_price = $result_liq[0]->sell_price;
                        } else if ($ltype == "25ML") {
                            $liq_price = $result_liq[0]->price_25_shot;
                        } else if ($ltype == "50ML") {
                            $liq_price = $result_liq[0]->price_50_shot;
                        }

                        $temp_array = array(
                            'cart_id' => $id,
                            'item_type' => 'L',
                            'l_type' => $ltype,
                            'item_id' => $result_liq[0]->iid,
                            'item_name' => $result_liq[0]->liq_name,
                            'item_price' => $liq_price,
                            'item_discount' => $result_liq[0]->discount,
                            'qty' => $qty,
                            'bill_type' => $vbill_type,
                            'tbl_name' => $tbl_name
                        );
                        array_push($data_array, $temp_array);
                    }
                }
            }

            return $data_array;
        }

//echo json_encode($result_item_data);
    }

    public function print_bill_check() {
        echo $user_detail = ($this->session->all_userdata()['current_session']);
    }

    public function print_bill() {
        $session = $this->input->get("id");
        echo "<center><h3>FINISHED</h3></center>";
        $this->session->set_userdata('current_session', '');
    }

    function view_bill() {
        $session = $this->input->get("id");
        $camed = $this->input->get("camed");

        $bill_data = $this->get_all_bill_items($session);
        if (sizeof($bill_data) > 0) {

            $sysdate = date('m-d-Y h:i:sa');
            echo " <div id='invoice-box' style=' max-width:88mm;
            margin:auto;
            padding:20px 0px 0px 0px;
            border:1px solid #eeee;
            font-size:11px;
            line-height:24px;
            font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color:#555;
            border:0px solid;'>

    <h3 style='text-align: center;  letter-spacing: 1px;'><b>Hotel Giragale </b> </h3>
    <p style='text-align: center; line-height: 1.6; letter-spacing: 1px;'> Mirissa <br/> 071 206 6987 / 077 123 465</p>

    <div style='width: 100%; border-top: 1px dotted red; border-bottom: 1px dotted red'>
        <span> Date </span> <span> $sysdate </span> <br/>
        <span> Casher </span> <span>Sahan Tharaka</span> <br/>
        <span> Invoice No </span> <span>  $session </span>
       <!-- <div style='width: 30%; border: 1px dotted orange; float: left'>Date</div>
        <div style='width: 60%; border: 1px dotted orange; float: left'>11-JUL-218 08:18:43 PM</div>
        <div style='width: 30%; border: 1px dotted orange; float: left'>Invoice No</div>
        <div style='width: 60%; border: 1px dotted orange; float: left''>03838920</div> -->

    </div>


                <div id='print_win'>
                    <table border=0 style='font-size:11px;'>
            <tr>
            <td style='font-size:13px; font-weight: bold; width:70%'>ITEM</td>
            <td style='font-size:13px; font-weight: bold; width:10%'>QTY</td>
            <td style='font-size:13px; font-weight: bold; text-align:right; width:30%'>PRICE</td>
            </tr>";
            $n = 0;$total=0;

            //$bill_type = 0;
            //var_dump($bill_data);die;
            foreach ($bill_data as $item) {
                $item_name = $item['item_name'];
                $qty = $item['qty'];
                $item_price = $item['item_price'] * $qty;
                $tbl_name = $item['tbl_name'];


                echo "<tr>";
                echo "<td style='font-size:13px;'>" . $item_name . "</td>";
                echo "<td style='font-size:13px;'>" . $qty . "</td>";
                echo "<td style='text-align:right;font-size:13px;'>" . $item_price . "</td>";
                echo "</tr>";
                $total += $item_price;
                $bill_type = $item['bill_type'];
            }
            echo "<tr style='background-color: grey;'>";
            echo "<td style='font-size:13px; font-weight: bold;'>  Total</td>";
            echo "<td> </td>";
            echo "<td style='text-align:right;font-size:13px; font-weight: bold;'> $total </td>";
            echo "</tr>";

            echo '</table>';
            if($bill_type == 1){

                echo "
                 <div style='width: 100%; border-top: 1px dotted red; border-bottom: 1px dotted red; margin-bottom: 20px'>
                    <span> Room No: $tbl_name</span>
                 </div>";

                echo "
                 <div style='width: 100%; border-top: 1px dotted red; border-bottom: 1px dotted red; margin-bottom: 20px'>
                    <span> Customer Signature: ...........................................</span>
                 </div>";
            }


            echo "</div>

                 <div align='center' style='width: 100%; border-top: 1px dotted red; border-bottom: 1px dotted red; margin-bottom: 20px'>
        <span> Thank You </span>

    </div>
            </div>";
        } else {
            
        }

        if ($camed != "VB") {
            echo '<div class="row">'
            . '<div class="col-sm-12">'
            . '<button style="width:100%;height:50px;background-color:#4B77BE;color:#fff;" onclick="prints()"> Save & Print</button>'
            . '</div>'
            . '</div>';
        }

        echo"<script>
            function prints(){  
                var prtContent = document.getElementById('print_win');
                var WinPrint = window.open('', '', 'left=0,top=0,width=320,height=480,toolbar=0,scrollbars=0,status=0');
                WinPrint.document.write(prtContent.innerHTML);
                WinPrint.document.close();
                WinPrint.focus();
                WinPrint.print();
                window.location.href = '" . base_url() . "/Bill/print_bill?id=" . $session . "';
                WinPrint.close();
            }
        </script>";
    }

}

//main class
