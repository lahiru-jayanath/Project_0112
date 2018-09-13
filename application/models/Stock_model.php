<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stock_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*     * *********************Food Item****************************************8 */

    public function add_new_food($data) {

        $p_name = $data['p_name'];
        $p_sel_price = $data['p_sel_price'];
        $p_discount = $data['p_discount'];
        $p_discription = $data['p_discription'];
        $date = date('Y-m-d H:i:s');
        $publish = 1;
        $user_detail = ($this->session->all_userdata()['logged_user_details']);
        $user_id = $user_detail['uid'];

        $save_data = array(
            'food_name' => $p_name,
            'food_description' => $p_discription,
            'food_price' => $p_sel_price,
            'food_discount' => $p_discount,
            'publish' => $publish,
            'date_created' => $date
        );

        $this->db->trans_start();
        $this->db->insert('tbl_food', $save_data);
        $last_insert_id = $this->db->insert_id();

        $stock_data = array(
            'product_id' => $last_insert_id,
            'product_type' => 'F',
            'qty' => 0,
            'purchase_price' => 0,
            'sell_price' => $p_sel_price,
            'discount' => $p_discount,
            'added_by' => $user_id,
            'added_at' => $date
        );
        $this->db->insert('tbl_stock', $stock_data);

        $this->db->trans_complete();
        return $this->db->trans_status();

        /* $query = $this->db->query("INSERT INTO tbl_food(food_name, food_description, food_price, food_discount,publish,date_created)
          VALUES ('$p_name','$p_discription','$p_sel_price','$p_discount',1,'$date')");
          return $query; */
    }

    public function edit_food($data) {
        $data_id = $data['p_id'];
        $p_name = $data['p_name'];
        $p_sel_price = $data['p_sel_price'];
        $p_discount = $data['p_discount'];
        $p_discription = $data['p_discription'];
        $date = date('Y-m-d H:i:s');
        $user_detail = ($this->session->all_userdata()['logged_user_details']);
        $user_id = $user_detail['uid'];

        $this->db->trans_start();
        $result = $this->db->query("UPDATE tbl_food SET food_name='$p_name', food_description='$p_discription', food_price=$p_sel_price, food_discount=$p_discount WHERE food_id=$data_id");

        $stock_data = array(
            'product_id' => $data_id,
            'product_type' => 'F',
            'qty' => 0,
            'purchase_price' => 0,
            'sell_price' => $p_sel_price,
            'discount' => $p_discount,
            'added_by' => $user_id,
            'added_at' => $date
        );

        $this->db->insert('tbl_stock', $stock_data);
        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function get_food_detail() {
        $sql_food = $this->db->query("SELECT * FROM tbl_food WHERE publish=1 order by food_id asc");
        return $sql_food->result();
    }

    public function get_food_by_id($id) {
        $sql_food = $this->db->query("SELECT * FROM tbl_food WHERE food_id=$id ORDER BY food_id DESC LIMIT 1");
        return $sql_food->result();
    }

    public function delete_food_by_id($id) {
        // $sql_food = $this->db->query("DELETE  FROM tbl_food WHERE food_id=$id");
        $sql_food = $this->db->query("UPDATE  tbl_food SET publish=0 WHERE food_id=$id");
        return $sql_food;
    }

    /*     * ************************************************************************************ */


    /*     * *********************Dessert Item****************************************8 */

    public function add_new_dessert($data) {
        $p_name = $data['p_name'];
        $p_sel_price = $data['p_sel_price'];
        $p_discount = $data['p_discount'];
        $p_discription = $data['p_discription'];
        $date = date('Y-m-d H:i:s');
        $publish = 1;
        $user_detail = ($this->session->all_userdata()['logged_user_details']);
        $user_id = $user_detail['uid'];

        $save_data = array(
            'dessert_name' => $p_name,
            'dessert_descripton' => $p_discription,
            'dessert_price' => $p_sel_price,
            'dessert_discount' => $p_discount,
            'publish' => $publish,
            'date_created' => $date
        );

        $this->db->trans_start();
        $this->db->insert('tbl_dessert', $save_data);
        $last_insert_id = $this->db->insert_id();

        $stock_data = array(
            'product_id' => $last_insert_id,
            'product_type' => 'D',
            'qty' => 0,
            'purchase_price' => 0,
            'sell_price' => $p_sel_price,
            'discount' => $p_discount,
            'added_by' => $user_id,
            'added_at' => $date
        );
        $this->db->insert('tbl_stock', $stock_data);

        $this->db->trans_complete();
        return $this->db->trans_status();

        /* $query = $this->db->query("INSERT INTO tbl_dessert(dessert_name, dessert_descripton, dessert_price, dessert_discount,publish,date_created)
          VALUES ('$p_name','$p_discription','$p_sel_price','$p_discount',1,'$date')");
          return $query; */
    }

    public function edit_dessert($data) {
        $data_id = $data['p_id'];
        $p_name = $data['p_name'];
        $p_sel_price = $data['p_sel_price'];
        $p_discount = $data['p_discount'];
        $p_discription = $data['p_discription'];
        $date = date('Y-m-d H:i:s');
        $user_detail = ($this->session->all_userdata()['logged_user_details']);
        $user_id = $user_detail['uid'];

        $this->db->trans_start();
        $result = $this->db->query("UPDATE tbl_dessert SET dessert_name='$p_name', dessert_descripton='$p_discription', dessert_price=$p_sel_price, dessert_discount=$p_discount WHERE dessert_id=$data_id");

        $stock_data = array(
            'product_id' => $data_id,
            'product_type' => 'D',
            'qty' => 0,
            'purchase_price' => 0,
            'sell_price' => $p_sel_price,
            'discount' => $p_discount,
            'added_by' => $user_id,
            'added_at' => $date
        );
        $this->db->insert('tbl_stock', $stock_data);

        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function get_dessert_detail() {
        $sql_food = $this->db->query("SELECT * FROM tbl_dessert WHERE publish=1 order by dessert_id asc");
        return $sql_food->result();
    }

    public function get_dessert_by_id($id) {
        $sql_food = $this->db->query("SELECT * FROM tbl_dessert WHERE dessert_id=$id ORDER BY dessert_id DESC LIMIT 1");
        return $sql_food->result();
    }

    public function delete_dessert_by_id($id) {
        $sql_food = $this->db->query("UPDATE  tbl_dessert SET publish=0 WHERE dessert_id=$id");
        return $sql_food;
    }

    /*     * ************************************************************************************ */


    /*     * *********************Beverage Item****************************************8 */

    // Insert new record for tbl_drink
    public function add_new_beverage($data) {

        $bev_name = $data['bev_name'];
        $b_quantity = $data['b_quantity'];
        $b_buy_price = $data['b_buy_price'];
        $b_sel_price = $data['b_sel_price'];
        $b_discount = $data['b_discount'];
        $b_discription = $data['b_discription'];
        $b_buy_date = $data['b_buy_date'];
        $date = date('Y-m-d H:i:s');
        $publish = 1;
        $user_detail = ($this->session->all_userdata()['logged_user_details']);
        $user_id = $user_detail['uid'];

        /* drink_name, drink_description, drink_price, 
         * drink_salling_price,drink_discount,drink_stock, publish, 
         * date_created,drink_current_stock,drink_purches_date 
         */

        $save_data = array(
            'drink_name' => $bev_name,
            'drink_description' => $b_discription,
            'drink_price' => $b_buy_price,
            'drink_salling_price' => $b_sel_price,
            'drink_discount' => $b_discount,
            'drink_stock' => $b_quantity,
            'drink_current_stock' => $b_quantity,
            'drink_purches_date' => $b_buy_date,
            'publish' => $publish,
            'date_created' => $date
        );

        $this->db->trans_start();
        $this->db->insert('tbl_drinks', $save_data);
        $last_insert_id = $this->db->insert_id();

        $stock_data = array(
            'product_id' => $last_insert_id,
            'product_type' => 'B',
            'qty' => $b_quantity,
            'purchase_price' => $b_buy_price,
            'sell_price' => $b_sel_price,
            'discount' => $b_discount,
            'purchase_date' => $b_buy_date,
            'added_by' => $user_id,
            'added_at' => $date
        );
        $this->db->insert('tbl_stock', $stock_data);

        $this->db->trans_complete();
        return $this->db->trans_status();

        /* $query = $this->db->query("INSERT INTO tbl_drinks(drink_name, drink_description, drink_price, drink_salling_price,drink_discount,drink_stock, publish, date_created,drink_current_stock,drink_purches_date) VALUES ('$bev_name','$b_discription','$b_buy_price','$b_sel_price','$b_discount','$b_quantity',1,'$date','$b_quantity','$b_buy_date')");
          return $query; */
    }

    public function edit_beverage($data) {
        $p_id = $data['p_id'];
        $bev_name = $data['bev_name'];
        $b_quantity = $data['b_quantity'];
        $b_buy_price = $data['b_buy_price'];
        $b_sel_price = $data['b_sel_price'];
        $b_discount = $data['b_discount'];
        $b_discription = $data['b_discription'];
        $b_buy_date = $data['b_buy_date'];
        $date = date('Y-m-d H:i:s');
        $user_detail = ($this->session->all_userdata()['logged_user_details']);
        $user_id = $user_detail['uid'];


        $this->db->trans_start();
        $result = $this->db->query("UPDATE tbl_drinks SET drink_name='$bev_name', drink_description='$b_discription', drink_price=$b_buy_price, drink_salling_price=$b_sel_price,drink_discount=$b_discount,drink_stock=$b_quantity,drink_purches_date='$b_buy_date' WHERE drink_id=$p_id");

        $stock_data = array(
            'product_id' => $p_id,
            'product_type' => 'B',
            'qty' => $b_quantity,
            'purchase_price' => $b_buy_price,
            'sell_price' => $b_sel_price,
            'discount' => $b_discount,
            'purchase_date' => $b_buy_date,
            'added_by' => $user_id,
            'added_at' => $date
        );
        $this->db->insert('tbl_stock', $stock_data);

        $this->db->trans_complete();
        return $this->db->trans_status();

// return $result;
    }

    public function get_bev_details() {
        $sql_food = $this->db->query("SELECT * FROM tbl_drinks WHERE publish=1 order by drink_id asc");
        return $sql_food->result();
    }

    public function get_bev_by_id($id) {
        $sql_food = $this->db->query("SELECT * FROM tbl_drinks WHERE drink_id=$id ORDER BY drink_id DESC LIMIT 1");
        return $sql_food->result();
    }

    public function delete_bev_by_id($id) {
        $sql_food = $this->db->query("UPDATE  tbl_drinks SET publish=0 WHERE drink_id=$id");
        return $sql_food;
    }

    /*     * ************************************************************************************ */



    /*     * *********************Liquor Item****************************************8 */

    public function get_liquor_brands() {
        $sql_brand = $this->db->query("SELECT * FROM tbl_m_liquor_brand order by brand_name ASC");
        return $sql_brand->result();
    }

    public function get_liquor_volumes() {
        $sql_volume = $this->db->query("SELECT * FROM tbl_m_liquor_volume WHERE type='BTL' order by liquor_volume ASC");
        return $sql_volume->result();
    }

    public function get_liquors() {
        $sql_volume = $this->db->query("SELECT * FROM tbl_liquor WHERE publish=1 order by iid ASC");
        return $sql_volume->result();
    }

    public function get_shots_by_id($id) {
        $sql_food = $this->db->query("SELECT * FROM tbl_m_liquor_volume WHERE iid=$id ORDER BY iid DESC LIMIT 1");
        return $sql_food->result();
    }

    public function get_liq_by_id($id) {
        $sql_food = $this->db->query("SELECT * FROM tbl_liquor WHERE iid=$id ORDER BY iid DESC LIMIT 1");
        return $sql_food->result();
    }

    public function delete_liq_by_id($id) {
        $sql_food = $this->db->query("UPDATE  tbl_liquor SET publish=0 WHERE iid=$id");
        return $sql_food;
    }

    public function add_new_liquor($data) {
        $liq_brand = $data['liq_brand'];
        $liq_volume = $data['liq_volume'];
        $liq_name = $data['liq_name'];
        $liq_quantity = $data['liq_quantity'];
        $liq_buy_date = $data['liq_buy_date'];
        $liq_buy_price = $data['liq_buy_price'];
        $liq_sel_price = $data['liq_sel_price'];
        $liq_discount = $data['liq_discount'];
        $liq_discription = $data['liq_discription'];
        $liq_no_25 = $data['liq_no_25'];
        $liq_25_price = $data['liq_25_price'];
        $liq_no_50 = $data['liq_no_50'];
        $liq_50_price = $data['liq_50_price'];

        $date = date('Y-m-d H:i:s');
        $publish = 1;
        $user_detail = ($this->session->all_userdata()['logged_user_details']);
        $user_id = $user_detail['uid'];

        $save_data = array(
            'brand' => $liq_brand,
            'volume' => $liq_volume,
            'liq_name' => $liq_name,
            'liq_qty' => $liq_quantity,
            'liq_current_stock' => $liq_quantity,
            'purchase_date' => $liq_buy_date,
            'buy_price' => $liq_buy_price,
            'sell_price' => $liq_sel_price,
            'discount' => $liq_discount,
            'description' => $liq_discription,
            'publish' => $publish,
            'date_created' => $date,
            'no_of_25_shot' => $liq_no_25,
            'price_25_shot' => $liq_25_price,
            'no_of_50_shot' => $liq_no_50,
            'price_50_shot' => $liq_50_price
        );

        $this->db->trans_start();
        $this->db->insert('tbl_liquor', $save_data);
        $last_insert_id = $this->db->insert_id();

        $stock_data = array(
            'product_id' => $last_insert_id,
            'product_type' => 'L',
            'qty' => $liq_quantity,
            'purchase_price' => $liq_buy_price,
            'sell_price' => $liq_sel_price,
            'discount' => $liq_discount,
            'purchase_date' => $liq_buy_date,
            'added_by' => $user_id,
            'added_at' => $date
        );
        $this->db->insert('tbl_stock', $stock_data);

        $this->db->trans_complete();
        return $this->db->trans_status();
        /* $query = $this->db->query("INSERT INTO tbl_liquor(brand, volume, liq_name, liq_qty,purchase_date,buy_price,sell_price,discount,description,publish,date_created)
          VALUES ($liq_brand,$liq_volume,'$liq_name',$liq_quantity,'$liq_buy_date',$liq_buy_price,$liq_sel_price,$liq_discount,'$liq_discription',1,'$date')");
          return $query; */
    }

    public function edit_liquor($data) {
        $p_id = $data['p_id'];
        $liq_brand = $data['liq_brand'];
        $liq_volume = $data['liq_volume'];
        $liq_name = $data['liq_name'];
        $liq_quantity = $data['liq_quantity'];
        $liq_buy_date = $data['liq_buy_date'];
        $liq_buy_price = $data['liq_buy_price'];
        $liq_sel_price = $data['liq_sel_price'];
        $liq_discount = $data['liq_discount'];
        $liq_discription = $data['liq_discription'];
        $liq_no_25 = $data['liq_no_25'];
        $liq_25_price = $data['liq_25_price'];
        $liq_no_50 = $data['liq_no_50'];
        $liq_50_price = $data['liq_50_price'];
        $date = date('Y-m-d H:i:s');
        $user_detail = ($this->session->all_userdata()['logged_user_details']);
        $user_id = $user_detail['uid'];


        $this->db->trans_start();
        $result = $this->db->query("UPDATE tbl_liquor SET brand=$liq_brand, volume=$liq_volume, liq_name='$liq_name', liq_qty=$liq_quantity,purchase_date='$liq_buy_date',buy_price=$liq_buy_price,sell_price=$liq_sel_price,discount=$liq_discount,description='$liq_discription',no_of_25_shot=$liq_no_25,price_25_shot=$liq_25_price,no_of_50_shot=$liq_no_50,price_50_shot=$liq_50_price,date_updated='$date' WHERE iid=$p_id");

        $stock_data = array(
            'product_id' => $p_id,
            'product_type' => 'L',
            'qty' => $liq_quantity,
            'purchase_price' => $liq_buy_price,
            'sell_price' => $liq_sel_price,
            'discount' => $liq_discount,
            'purchase_date' => $liq_buy_date,
            'added_by' => $user_id,
            'added_at' => $date
        );
        $this->db->insert('tbl_stock', $stock_data);

        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    /*     * ************************************************************************************ */

    public function addStock($last_insert_id,$b_quantity,$b_buy_price,$b_sel_price,$b_discount){
        $date = date('Y-m-d H:i:s');
        $p_date = date('Y-m-d');
       // $publish = 1;
        $user_detail = ($this->session->all_userdata()['logged_user_details']);
        $user_id = $user_detail['uid'];
  
        $stock_data = array(
            'product_id' => $last_insert_id,
            'product_type' => 'B',
            'qty' => $b_quantity,
            'purchase_price' => $b_buy_price,
            'sell_price' => $b_sel_price,
            'discount' => $b_discount,
            'purchase_date' => $p_date,
            'added_by' => $user_id,
            'added_at' => $date
        );
       return $this->db->insert('tbl_stock', $stock_data);
    }

    public function updateDrinkstable($drink_id,$b_quantity,$b_buy_price,$b_sel_price,$b_discount){
       $date = date('Y-m-d H:i:s');
        $p_date = date('Y-m-d');
    
        $stock_data = array(
           
            'drink_stock' => $b_quantity,
            'drink_salling_price' => $b_buy_price,
            'drink_price' => $b_sel_price,
            'drink_discount' => $b_discount,
            'drink_purches_date' => $p_date,            
            'date_created' => $date
        );
        $this->db->where('drink_id',$drink_id); 
        return $this->db->update('tbl_drinks',$stock_data);
    }
}

?>