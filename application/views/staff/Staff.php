<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
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
        $qtyMember = $this->User_model->getQtyMember();
        $data['qtyMember'] = $qtyMember;
        $qtyStaff = $this->User_model->getQtyStaff();
        $data['qtyStaff'] = $qtyStaff;
        $qtyBarang = $this->Barang_model->getQtyBarang();
        $data['qtyBarang'] = $qtyBarang;
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isi'] = $this->load->view('staff/dashboard', $data, TRUE);

        $this->load->view('staff/index', $data);
    }

    public function myprofile()
    {
        // $data['profile'] = $this->User_model->getProfile($id);
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isi'] = $this->load->view('user/myprofile', $data, TRUE);

        $this->load->view('staff/index', $data);
    }

    public function pengguna()
    {
        $recordUser = $this->User_model->getDataUser();
        $content = array('data_user' => $recordUser);
        $data['title'] = 'Kelola User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isi'] = $this->load->view('staff/pengguna', $content, TRUE);

        $this->load->view('staff/index', $data);
    }

    public function barang()
    {
        $recordBarang = $this->Barang_model->getDataBarang();
        $content = array('data_barang' => $recordBarang);
        $data['title'] = 'Kelola Barang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isi'] = $this->load->view('staff/barang', $content, TRUE);

        $this->load->view('staff/index', $data);
    }

    public function formtambahbarang()
    {
        $data['title'] = 'Tambah Data Barang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isi'] = $this->load->view('user/tambahbarang', $data, TRUE);

        $this->load->view('staff/index', $data);
    }

    public function tambahbarang()
    {
        $nama       = $this->input->Post('nama_barang');
        $kategori   = $this->input->Post('kategori_barang');
        $satuan     = $this->input->Post('satuan_barang');
        $stok       = $this->input->Post('stok_barang');
        $harga      = $this->input->Post('harga_barang');

        $data = array(
            'kode'      => '',
            'nama'      => $nama,
            'kategori'  => $kategori,
            'satuan'    => $satuan,
            'stok'      => $stok,
            'harga'     => $harga
        );

        $this->Barang_model->InsertDataBarang($data);
        redirect(base_url("staff/barang"));
    }

    public function hapusBarang()
    {
        $kode = $this->input->get('kode');
        $response = $this->Barang_model->delBarang($kode);
        if($response == true){
            echo '<script>
                alert("Sukses Hapus data");
                window.location="' . base_url('staff/barang') . '"
              </script>';
        } else {
            echo '<script>
                alert("Gagal Hapus data");
                window.location="' . base_url('staff/barang') . '"
              </script>';
        }
    }

    public function formUbahBarang($kode)
    {
        $recordBarang = $this->Barang_model->getBarangDetail($kode);
        $content = array('brg' => $recordBarang);
        $data['title'] = 'Ubah Data Barang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isi'] = $this->load->view('user/ubahbarang', $content, TRUE);

        $this->load->view('staff/index', $data);
    }

    public function ubahBarang()
    {
        $kode       = $this->input->Post('kode');
        $nama       = $this->input->Post('nama_barang');
        $kategori   = $this->input->Post('kategori_barang');
        $satuan     = $this->input->Post('satuan_barang');
        $stok       = $this->input->Post('stok_barang');
        $harga      = $this->input->Post('harga_barang');

        $data = array(
            'nama'      => $nama,
            'kategori'  => $kategori,
            'satuan'    => $satuan,
            'stok'      => $stok,
            'harga'     => $harga
        );

        $this->Barang_model->EditDataBarang($data, $kode);
        redirect(base_url("staff/barang"));
    }
}
