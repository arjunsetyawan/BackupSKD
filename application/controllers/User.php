<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $content['qtyMember'] = $qtyMember;
        $qtyStaff = $this->User_model->getQtyStaff();
        $content['qtyStaff'] = $qtyStaff;
        $qtyBarang = $this->Barang_model->getQtyBarang();
        $content['qtyBarang'] = $qtyBarang;
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isi'] = $this->load->view('user/dashboard', $content, TRUE);

        $this->load->view('user/index', $data);
    }

    public function myprofile()
    {
        // $data['profile'] = $this->User_model->getProfile($id);
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isi'] = $this->load->view('user/myprofile', $data, TRUE);

        $this->load->view('user/index', $data);
    }

    public function pengguna()
    {
        $recordUser = $this->User_model->getDataUser();
        $content = array('data_user' => $recordUser);
        $data['title'] = 'Kelola User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isi'] = $this->load->view('user/pengguna', $content, TRUE);

        $this->load->view('user/index', $data);
    }

    public function barang()
    {
        $recordBarang = $this->Barang_model->getDataBarang();
        $content = array('data_barang' => $recordBarang);
        $data['title'] = 'Kelola Barang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isi'] = $this->load->view('user/barang', $content, TRUE);

        $this->load->view('user/index', $data);
    }

    public function backup()
    {
        $data['title'] = 'Backup dan Restore';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isi'] = $this->load->view('user/backup', $data, TRUE);

        $this->load->view('user/index', $data);
    }

    public function formUbahUser($id)
    {
        $recordUser = $this->User_model->getUserDetail($id);
        $content = array('usr' => $recordUser);
        $data['title'] = 'Ubah Data User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isi'] = $this->load->view('user/ubahuser', $content, TRUE);

        $this->load->view('user/index', $data);
    }

    public function ubahUser()
    {
        $id     = $this->input->Post('id');
        $data   = array(
            'name'          => $this->input->Post('nama'),
            'email'         => $this->input->Post('email'),
            'image'         => $this->input->Post('image'),
            'password'      => $this->input->Post('password'),
            'role_id'       => $this->input->Post('role'),
            'is_active'     => $this->input->Post('status'),
            'date_created'  => $this->input->Post('date_created'),
        );

        $this->User_model->EditDataUser($data, $id);
        redirect(base_url("user/pengguna"));
    }

    public function hapusUser()
    {
        $id = $this->input->get('id');
        $response = $this->User_model->delUser($id);
        if($response == true){
            echo '<script>
                alert("Sukses Hapus data");
                window.location="' . base_url('User/pengguna') . '"
              </script>';
        } else {
            echo '<script>
                alert("Gagal Hapus data");
                window.location="' . base_url('User/pengguna') . '"
              </script>';
        }
    }

    public function formtambahbarang()
    {
        $data['title'] = 'Tambah Data Barang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isi'] = $this->load->view('user/tambahbarang', $data, TRUE);

        $this->load->view('user/index', $data);
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
        redirect(base_url("user/barang"));
    }

    public function hapusBarang()
    {
        $kode = $this->input->get('kode');
        $response = $this->Barang_model->delBarang($kode);
        if($response == true){
            echo '<script>
                alert("Sukses Hapus data");
                window.location="' . base_url('User/barang') . '"
              </script>';
        } else {
            echo '<script>
                alert("Gagal Hapus data");
                window.location="' . base_url('User/barang') . '"
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

        $this->load->view('user/index', $data);
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
        redirect(base_url("user/barang"));
    }
}
