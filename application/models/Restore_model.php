<?php
defined('BASEPATH') OR exit('no direct access allowed');

class Restore_model extends CI_Model {

    function droptabel()
    {
        $cek = $this->db->query("SHOW TABLES");

        if ($cek->num_rows()>0) {
            $query = $this->db->query('DROP TABLE user, user_role, barang');

            return $query;
        } else {
            return true;
        }
    }
}