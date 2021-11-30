<?php
defined('BASEPATH') or exit('no direct access allowed');

class User_model extends CI_Model
{

    public function getDataUser()
    {
        $this->db->select('*')
            ->from('user');
        $query = $this->db->get();
        return $query->result();
    }

    public function getQtyMember()
    {
        $query = $this->db->query('SELECT * FROM user WHERE role_id = 3 && is_active = 1');
        return $query->num_rows();
    }

    public function getQtyStaff()
    {
        $query = $this->db->query('SELECT * FROM user WHERE role_id = 2 && is_active = 1');
        return $query->num_rows();
    }

    public function getUserDetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        return $query->row();
    }

    public function delUser($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("user");
        return true;
    }

    public function EditDataUser($data, $id)
    {
        $this->db->where("id", $id);
        $this->db->update("user", $data);
        return true;
    }

    public function getProfile($id)
    {
        $this->db->select('*')
            ->from('user')
            ->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
}
