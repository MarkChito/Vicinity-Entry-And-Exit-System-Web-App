<?php

class login_model extends CI_Model
{
    public function MOD_LOGIN_USER($username, $password)
    {
        $sql = "SELECT * FROM `tbl_info_useraccounts` WHERE `username`=? AND `password`=?";
        $query = $this->db->query($sql,array($username, $password));
        
        return $query->result();
    }
}
