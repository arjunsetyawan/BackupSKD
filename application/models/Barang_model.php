<?php
defined('BASEPATH') OR exit('no direct access allowed');

class Barang_model extends CI_Model {

    public function getDataBarang() {
        $this->db->select('*');
        $this->db->from('barang');
        $query = $this->db->get();
        return $query->result();
    }

    public function getQtyBarang() {
        $query = $this->db->query('SELECT * FROM barang');
        return $query->num_rows();
    }

    public function InsertDataBarang($data)
    {
        $this->db->Insert('barang', $data);
    }

    public function delBarang($kode)
    {
        $this->db->where("kode", $kode);
        $this->db->delete("barang");
        return true;
    }

    public function getBarangDetail($kode)
    {
        $this->db->where('kode', $kode);
        $query = $this->db->get('barang');
        return $query->row();
    }

    public function EditDataBarang($data, $kode)
    {
        $this->db->where("kode", $kode);
        $this->db->update("barang", $data);
        return true;
    }
}