<?php if (!defined('BASEPATH')) exit('no direct access allowed');

class Utilitas extends CI_controller
{
        public function __construct()
        {
                parent::__construct();

                $this->load->model('Restore_model');

                date_default_timezone_set('Asia/Jakarta');
        }

        public  function backupdb()
        {
                // Load Clas Utilitas Database
                $this->load->dbutil();

                $tanggal = date("Y-m-d-H-i-s");

                // nyiapin aturan untuk file backup
                $aturan = array(
                        'format'        => 'zip',
                        'filename'      => 'backupskd_' . $tanggal . '.sql',
                        'add_drop'      => 'TRUE',
                        'add_insert'    => 'TRUE',
                        'newline'       => "\n",
                        'foreign_key_checks'    => FALSE,
                );


                $backup = &$this->dbutil->backup($aturan);

                $nama_file = 'backup-on-' . $tanggal . '.zip';
                // $simpan = '/backup' . $nama_file;

                // $this->load->helper('file');
                // write_file($simpan, $backup);


                $this->load->helper('download');
                force_download($nama_file, $backup);
        }

        public function restoredb()
        {
                $this->Restore_model->droptabel();

                $fileinput = $_FILES['datafile'];
                $nama = $_FILES['datafile']['name'];

                if (isset($fileinput)) {
                        $lokasi_file = $fileinput['tmp_name'];
                        $direktori = "database/$nama";
                        move_uploaded_file($lokasi_file, $direktori);
                }

                //restore database
                $isi_file = file_get_contents($direktori);
                $string_query = rtrim($isi_file, "\n;");
                $array_query = explode(";", $string_query);

                foreach ($array_query as $query) {
                        $this->db->query($query);
                }

                unlink($direktori);

                echo "
                <script>
                        alert('Database berhasil direstore');
                        document.location.href = '/backupSKD/User/backup';
                        </script>
                ";
        }

        public  function backupproject()
        {
                
        }
}
