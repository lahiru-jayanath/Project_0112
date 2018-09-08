<?php
date_default_timezone_set('Asia/Colombo');//Asia/Colombo
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bill_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->load->database();
        $this->load->helper('security');
    }

    public function load_items($data) {
        if ($data == "food") {
            $sql = "SELECT * FROM tbl_food WHERE publish=1 ORDER BY food_name ASC";
        } else if ($data == "beverage") {
            $sql = "SELECT * FROM tbl_drinks WHERE publish=1 ORDER BY drink_name ASC";
        } else if ($data == "dessert") {
            $sql = "SELECT * FROM tbl_dessert WHERE publish=1 ORDER BY dessert_name ASC";
        } else if ($data == "liquor") {
            $sql = "SELECT * FROM tbl_liquor WHERE publish=1 ORDER BY liq_name ASC";
        }
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function get_item_data($data) {
        if ($data[0] == 'F') {

            $sql = "SELECT * FROM tbl_food WHERE food_id = '" . $data[2] . "' ";
        } else if ($data[0] == 'D') {

            $sql = "SELECT * FROM tbl_drinks WHERE drink_id = '" . $data[2] . "'";
        } else if ($data[0] == 'I') {

            $sql = "SELECT * FROM tbl_dessert WHERE dessert_id = '" . $data[2] . "'";
        }

        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function get_tables() {
        $sql_volume = $this->db->query("SELECT * FROM tbl_m_tables WHERE publish=1 order by iid ASC");
        return $sql_volume->result();
    }

    public function get_all_waiters() {
        $sql_volume = $this->db->query("SELECT * FROM tbl_user WHERE user_group_id=4 AND publish=1 ORDER BY user_id ASC");
        return $sql_volume->result();
    }

    public function get_all_bill_type() {
        $sql_volume = $this->db->query("SELECT * FROM tbl_m_bill_type WHERE ipublish=1 ORDER BY ibill_type_id ASC");
        return $sql_volume->result();
    }

    public function add_to_cart($data) {
        $session_id = $data['session_id'];
        $type = $data['type'];
        $item_id = $data['item_id'];
        $selection = $data['selection'];
        $qty = $data['qty'];
        $bill_type = $data['bill_type'];
        $user_id = $data['user_id'];
        $ltype = $data['ltype'];
        $sub_total = $data['subtotal'];
        $date = date('Y-m-d H:i:s');

        $query = $this->db->query("INSERT INTO tbl_cart(session_id, type, item_id, selection,qty,sub_total,user_id,vbill_type,added_at,ltype)
                VALUES ('$session_id','$type',$item_id,'$selection',$qty,$sub_total,$user_id,$bill_type,'$date','$ltype')");
        return $query;
    }

    public function get_all_cart_items($sid) {
        $sql_volume = $this->db->query("SELECT crt.*,tb.tbl_name
                                        FROM tbl_cart crt
                                        LEFT JOIN tbl_m_tables tb ON tb.iid = crt.tbl_id
                                        WHERE session_id='$sid' order by crt.iid ASC");
        return $sql_volume->result();
    }

    public function delete_item_by_id($id) {
        $sql_food = $this->db->query("DELETE  FROM tbl_cart  WHERE iid=$id");
        return $sql_food;
    }

    public function proceed_bill($id) {
        $sql_cart = $this->db->query("SELECT *  FROM tbl_cart  WHERE session_id=$id AND status=0");
        $res_cart = $sql_cart->result();

        $this->db->trans_start();

        $val = 0;
        for ($i = 0; $i < sizeof($res_cart); $i++) {
            $iid = $res_cart[$i]->iid;
            $session_id = $res_cart[$i]->session_id;
            $type = $res_cart[$i]->type;
            $ltype = $res_cart[$i]->ltype;
            $item_id = $res_cart[$i]->item_id;
            $qty = $res_cart[$i]->qty;
            $user_id = $res_cart[$i]->user_id;
            $tbl_id = $res_cart[$i]->tbl_id;
            $waiter_id = $res_cart[$i]->waiter_id;
            $status = $res_cart[$i]->status;

            if ($type == "B") {
                $sql_cart_beverage = $this->db->query("UPDATE  tbl_drinks SET drink_current_stock=drink_current_stock-$qty  WHERE drink_id=$item_id");
            } else if ($type == "L") {

                $sql_liq = $this->db->query("SELECT A.volume as 'volume',A.no_of_25_shot as 'c_25',A.no_of_50_shot as 'c_50',B.no_of_25_shot,B.no_of_50_shot  FROM tbl_liquor A LEFT JOIN tbl_m_liquor_volume B ON A.volume=B.iid  WHERE A.iid=$item_id");
                $res_liq = $sql_liq->result();
                $no_of_25_shot = $res_liq[0]->no_of_25_shot;
                $no_of_50_shot = $res_liq[0]->no_of_50_shot;
                $c_25 = $res_liq[0]->c_25;
                $c_50 = $res_liq[0]->c_50;

                $ml_25_counter = floor($c_25 / $no_of_25_shot);
                $ml_50_counter = floor($c_50 / $no_of_50_shot);


                if ($ltype == "BTL") {


                    $sql_cart_liq1 = $this->db->query("UPDATE  tbl_liquor SET liq_current_stock=liq_current_stock-$qty  WHERE iid=$item_id");
                    $sql_cart_liq1 = $this->db->query("UPDATE  tbl_liquor SET no_of_25_shot=no_of_25_shot-$no_of_25_shot  WHERE iid=$item_id");
                    $sql_cart_liq1 = $this->db->query("UPDATE  tbl_liquor SET no_of_50_shot=no_of_50_shot-$no_of_50_shot  WHERE iid=$item_id");
                } else if ($ltype == "50ML") {
                    $sql_cart_liq1 = $this->db->query("UPDATE  tbl_liquor SET liq_current_stock=$ml_50_counter  WHERE iid=$item_id");
                    $sql_cart_liq1 = $this->db->query("UPDATE  tbl_liquor SET no_of_25_shot=no_of_25_shot-2  WHERE iid=$item_id");
                    $sql_cart_beverage = $this->db->query("UPDATE  tbl_liquor SET no_of_50_shot=no_of_50_shot-$qty  WHERE iid=$item_id");
                } else if ($ltype == "25ML") {
                    $sql_cart_liq1 = $this->db->query("UPDATE  tbl_liquor SET liq_current_stock=$ml_25_counter  WHERE iid=$item_id");
                    $sql_cart_liq1 = $this->db->query("UPDATE  tbl_liquor SET no_of_50_shot=no_of_50_shot-1  WHERE iid=$item_id");
                    $sql_cart_beverage = $this->db->query("UPDATE  tbl_liquor SET no_of_25_shot=no_of_25_shot-$qty  WHERE iid=$item_id");
                }
            }
            //$sql_cart_liquor = $this->db->query("UPDATE  tbl_cart SET status=1  WHERE iid=$iid");

            $sql_cart = $this->db->query("UPDATE  tbl_cart SET status=1  WHERE iid=$iid");
        }
//        $this->db->insert('tbl_liquor', $save_data);
//        $last_insert_id = $this->db->insert_id();
//
//        $stock_data = array(
//            'product_id' => $last_insert_id,
//            'product_type' => 'L',
//            'qty' => $liq_quantity,
//            'purchase_price' => $liq_buy_price,
//            'sell_price' => $liq_sel_price,
//            'discount' => $liq_discount,
//            'purchase_date' => $liq_buy_date,
//            'added_by' => $user_id,
//            'added_at' => $date
//        );
//        $this->db->insert('tbl_stock', $stock_data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE) {
            return $id;
        }
    }

    public function get_last_cart_id() {
        $res_sql = $this->db->query('SELECT max(session_id) as maxID FROM tbl_cart WHERE status=1');
        $res_cart = $res_sql->result(); //var_dump($res_cart[0]->maxID);die;
       // return $ltype = $res_cart[0]->AUTO_INCREMENT;
        //return $ltype = $res_cart+1; var_dump()

        return $ltype = $res_cart[0]->maxID+1; //var_dump($ltype);die;


           }


   /* public function cancel_bill($id) {
        $sql_food = $this->db->query("DELETE  FROM tbl_cart  WHERE session_id=$id");
        return $sql_food;
    } */

    public function cancel_bill($id) {
        $sql_food = $this->db->query("DELETE  FROM tbl_cart  WHERE session_id=$id AND status=0");
        return $sql_food;
    }

    public function delete_bill_by_id($id) {
        $sql_food = $this->db->query("DELETE  FROM tbl_cart  WHERE session_id=$id");
        return $sql_food;
    }

    public function get_bill_history_detail(){

        $cu_date = date("Y-m-d 00:00:00");

        $sql_bill_history = $this->db->query("SELECT crt.session_id,usr.user_fname as bill_owner,usrw.user_fname as waiter,mtbl.tbl_name,sum(crt.sub_total) as total
                                                FROM tbl_cart crt
                                                left join tbl_user usr on usr.user_id = crt.user_id
                                                left join tbl_user usrw on usrw.user_id = crt.waiter_id
                                                left join tbl_m_tables mtbl on mtbl.iid=crt.tbl_id
                                                WHERE added_at > '$cu_date'
                                                group by crt.session_id,usr.user_fname,usrw.user_fname");
        return $sql_bill_history->result();
    }

    public function show_bill_by_id($b_id) {

                $sql_show_bill = $this->db->query("SELECT crt.session_id,usr.user_fname as bill_owner,usrw.user_fname as waiter,mtbl.tbl_name,f.food_name,d.dessert_name,l.liq_name,b.drink_name,crt.qty,crt.sub_total
                                                    FROM tbl_cart crt
                                                    left join tbl_user usr on usr.user_id = crt.user_id
                                                    left join tbl_food f on f.food_id = crt.item_id and crt.type = 'F'
                                                    left join tbl_dessert d on d.dessert_id = crt.item_id and crt.type = 'D'
                                                    left join tbl_liquor l on l.iid = crt.item_id and crt.type = 'L'
                                                    left join tbl_drinks b on b.drink_id = crt.item_id and crt.type = 'B'
                                                    left join tbl_user usrw on usrw.user_id = crt.waiter_id
                                                    left join tbl_m_tables mtbl on mtbl.iid=crt.tbl_id
                                                    WHERE crt.session_id=$b_id");

        return $sql_show_bill->result();
    }

    public function load_by_date($date_start,$date_end){

        $sql_bill_by_date = $this->db->query("SELECT crt.session_id,usr.user_fname as bill_owner,usrw.user_fname as waiter,mtbl.tbl_name,sum(crt.sub_total) as total
                                                FROM tbl_cart crt
                                                left join tbl_user usr on usr.user_id = crt.user_id
                                                left join tbl_user usrw on usrw.user_id = crt.waiter_id
                                                left join tbl_m_tables mtbl on mtbl.iid=crt.tbl_id
                                                WHERE added_at BETWEEN $date_start AND $date_end
                                                group by crt.session_id,usr.user_fname,usrw.user_fname");
       // return $sql_bill_history->result();
        $asd = $sql_bill_history->result(); var_dump($asd);die;

    }

    public function update_cart_item($cartid, $qty, $sub_total, $table_id, $waiter_id) {

        $res_sql = $this->db->query("SELECT * FROM tbl_cart WHERE iid=$cartid order by iid DESC LIMIT 1");
        $res_cart = $res_sql->result();
        $type = $res_cart[0]->type;
        $ltype = $res_cart[0]->ltype;
        $item_id = $res_cart[0]->item_id;
        $checkState = false;

        $item_count = 0;
        if ($type == "B") {
            $res_sql_cat = $this->db->query("SELECT drink_id,drink_current_stock FROM tbl_drinks WHERE drink_id=$item_id");
            $res_item = $res_sql_cat->result();
            $item_count = $res_item[0]->drink_current_stock;
            $checkState = true;
        } else if ($type == "L") {
            $res_sql_cat = $this->db->query("SELECT iid,liq_current_stock,no_of_25_shot,no_of_50_shot FROM tbl_liquor WHERE iid=$item_id");
            $res_item = $res_sql_cat->result();

            if ($ltype == "BTL") {
                $item_count = $res_item[0]->liq_current_stock;
            } else if ($ltype == "25ML") {
                $item_count = $res_item[0]->no_of_25_shot;
            } else if ($ltype == "50ML") {
                $item_count = $res_item[0]->no_of_50_shot;
            }

            $checkState = true;
        }
        if ($checkState == true) {
            if ($item_count >= $qty) {
                $sql_bev = $this->db->query("UPDATE tbl_cart SET qty=$qty,sub_total=$sub_total,tbl_id=$table_id,waiter_id=$waiter_id  WHERE iid=$cartid");
                return array('count' => '', 'state' => $sql_bev);
            } else {
                return array('count' => $item_count, 'state' => '');
            }
        } else {
            $sql_bev = $this->db->query("UPDATE tbl_cart SET qty=$qty,sub_total=$sub_total,tbl_id=$table_id,waiter_id=$waiter_id  WHERE iid=$cartid");
            return array('count' => '', 'state' => $sql_bev);
        }
    }



    // ******************************************* Dashboard ***************************************************************

    public function getlistTodayincome(){
        $sql = "SELECT SUM(sub_total) as total , type FROM tbl_cart where added_at BETWEEN '".date('Y-m-d 00:00:00')."'  AND '".date('Y-m-d 23:59:59')."'  GROUP BY type";
        $query = $this->db->query($sql);
        return $query->result();

    }
    public function getlistLastdateIncome(){
        $sql = "SELECT SUM(sub_total) as total , type FROM tbl_cart where added_at BETWEEN '".date('Y-m-d 00:00:00',strtotime("-1 days"))."'  AND '".date('Y-m-d 23:59:59',strtotime("-1 days"))."'  GROUP BY type";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getlistLastweekIncome(){
        $sql = "SELECT SUM(sub_total) as total , type FROM tbl_cart where added_at BETWEEN '".date('Y-m-d 00:00:00',strtotime("-7 days"))."'  AND '".date('Y-m-d 23:59:59s',strtotime("-1 days"))."'  GROUP BY type";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getlistLastmonthIncome(){
        $sql = "SELECT SUM(sub_total) as total , type FROM tbl_cart where added_at BETWEEN '".date('Y-m-d 00:00:00',strtotime("first day of previous month"))."'  AND '".date('Y-m-d 23:59:59',strtotime("last day of previous month"))."'  GROUP BY type";
        $query = $this->db->query($sql);
        return $query->result();
    }

}

// main class
?>