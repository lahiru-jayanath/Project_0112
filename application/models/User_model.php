<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->load->database();
        $this->load->helper('security');
    }

    public function login_validate() {
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $crp_pass = do_hash($password, 'md5');

        // Prep the query
        $this->db->where('user_login_username', $username);
        $this->db->where('user_login_password', $crp_pass);

        // Run the query
        $query = $this->db->get('tbl_user');
        // Let's check if there are any results
        if ($query->num_rows() == 1) {
            $data_set = $query->result_array();
            $user_id_no = $data_set[0]['user_id'];
            $user_full_name = $data_set[0]['user_fname'] . " " . $data_set[0]['user_lname'];
            $user_publish = $data_set[0]['publish'];
            $user_group = $data_set[0]['user_group_id'];

            $sessiondata = array(
                'uid' => $user_id_no,
                'full_name' => $user_full_name,
                'publish' => $user_publish,
                'user_group' => $user_group);
            
            if($user_publish == 0){
                return "UNPUBLISH";
            }
            
            $this->session->set_userdata('logged_user_details', $sessiondata);
//			    $data = array(
//                                'username' => $query->$row->username,
//                                'fname' => $query->$fn,
//                                'lname' => $query->$ln,
//                                'password' => $query->$password,
//                                'nick' => $query->$nick,
//                                'exp_user' => $query->$exp_user,
//                                'validated' => true
//                                );
//
//			$this->session->set_userdata('logged_in',$data); // this is the loggin session.................

            return true;
        } else {
            return false;
        }
    }

    public function add_new_user($data) {

        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $nic = $data['nic'];
        $user_unit = $data['user_unit'];
        $mobile = $data['mobile'];
        $user_name = $data['user_name'];
        $password = $data['password'];
        $crp_pass = do_hash($password, 'md5');
        $date = date('Y-m-d H:i:s');

        $query = $this->db->query("INSERT INTO tbl_user(user_fname, user_lname, user_nic, user_mobile, user_login_username, user_login_password, user_group_id, user_create_date, publish, user_last_update_date) VALUES ('$first_name','$last_name','$nic','$mobile','$user_name','$crp_pass','$user_unit','$date',1,'$date')");
        return $query;
    }

    public function get_user_details() {
        //$query = $this->db->get('TBL_USER');
        $query = $this->db->query("select ur.*,tug.*
 from tbl_user ur LEFT JOIN tbl_user_group tug ON ur.user_group_id = tug.group_id");
        return $query->result();
    }

    public function get_user_uni() {
        $query = $this->db->query("select * from tbl_user_group");
        return $query->result();
    }

    public function delete_user_by_id($id) {
        $sql_user = $this->db->query("UPDATE  tbl_user SET publish=0 WHERE user_id=$id");
        return $sql_user;
    }

}

// main class
?>