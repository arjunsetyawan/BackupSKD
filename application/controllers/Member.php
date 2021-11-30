<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('User_model');
        $this->load->model('Barang_model');
    }

    public function index()
    {
        $qtyBarang = $this->Barang_model->getQtyBarang();
        $data['qtyBarang'] = $qtyBarang;
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isi'] = $this->load->view('member/dashboard', $data, TRUE);

        $this->load->view('member/index', $data);
    }

    public function myprofile()
    {
        // $data['profile'] = $this->User_model->getProfile($id);
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isi'] = $this->load->view('user/myprofile', $data, TRUE);

        $this->load->view('Member/index', $data);
    }

    public function barang()
    {
        $recordBarang = $this->Barang_model->getDataBarang();
        $content = array('data_barang' => $recordBarang);
        $data['title'] = 'Kelola Barang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isi'] = $this->load->view('member/barang', $content, TRUE);

        $this->load->view('member/index', $data);
    }
}
