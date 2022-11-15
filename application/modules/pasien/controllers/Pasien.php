<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Blog_model');
        $this->load->model('Creator_model');
        $this->load->model('Pasien_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['content'] = '';
        $page = 'user/index';
        // echo modules::run('template/loadview', $data);
        echo modules::run('template/loadview', $data, $page);
    }

    public function pasienterdaftar()
    {
        $data['title'] = 'Pasien Terdaftar';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['content'] = '';
        $page = 'pasien/pasien_terdaftar';
        // echo modules::run('template/loadview', $data);
        echo modules::run('template/loadview', $data, $page);
    }

    public function tabelpasien()
    {
        $fetch_data = $this->Pasien_model->make_datatables_pasien();

        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();
            $birthDate = new DateTime($row->tanggal_lahir);
            $today = new DateTime("today");
            if ($birthDate > $today) {
                exit("0 tahun 0 bulan 0 hari");
            }
            $y = $today->diff($birthDate)->y;
            $m = $today->diff($birthDate)->m;
            $d = $today->diff($birthDate)->d;
            $sub_array[] = '<div class="text-center">
            <div class="dropdown">
                            <a class="text-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v mr-2"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item rawatan_baru" href="#" id="' . $row->id . '" namapasien="' . $row->nama . '" >Rawatan Baru</a>
                                <a class="dropdown-item riwayat_rawatan" href="#" id="' . $row->id . '" namapasien="' . $row->nama . '" >Riwayat Rawatan</a>
                                <a class="dropdown-item detail_pasien" href="#" id="' . $row->id . '" namapasien="' . $row->nama . '">Detail Pasien</a>
                            </div>
            </div>
            </div>
            ';
            // $sub_array[] = $no;
            if ($row->jenis_kelamin == '1') {
                $jk = 'Laki-laki';
            } else {
                $jk = 'Perempuan';
            }
            $sub_array[] = "<b>" . strtoupper("$row->nama") . "</b><br>" . $row->nik . "<br>" . strtoupper("$jk") . "<br>" . $y . " Tahun " . $m . " Bulan " . $d . " Hari";
            $sub_array[] = substr($row->alamat, 0, 25);

            $sub_array[] = $row->notelp1 . "<br>" . $row->notelp2;
            $sub_array[] = "<b>" . $row->nama_pj . "</b><br>" . strtoupper("$row->notelp3");


            $data[] = $sub_array;
        }

        $output = array(
            "draw"                => intval($_POST['draw']),
            "recordsTotal"        => $this->Pasien_model->get_all_data_pasien(),
            "recordsFiltered"     => $this->Pasien_model->get_filtered_data_pasien(),
            "data"                => $data
        );
        echo json_encode($output);
    }

    public function registrasi()
    {
        $data['title'] = 'Registrasi Pasien';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['content'] = '';
        $page = 'pasien/registrasi';
        // echo modules::run('template/loadview', $data);
        echo modules::run('template/loadview', $data, $page);
    }

    public function getAllCreators()
    {
        $data = $this->Creator_model->fetch_all_creators();
        echo json_encode($data);
    }

    public function simpanpasien()
    {
        $data = array(
            'nama'          => $_POST['nama'],
            'nik'          => $_POST['nik'],
            'jenis_kelamin'  => $_POST['jeniskelamin'],
            'tanggal_lahir'  => $_POST['tanggallahir'],
            'alamat'        => $_POST['alamat'],
            'notelp1'       => $_POST['notelp1'],
            'notelp2'       => $_POST['notelp2'],
            'nama_pj'       => $_POST['nama_pj'],
            'notelp3'       => $_POST['notelp3'],
            'status'        => $_POST['status'],
        );

        $this->Pasien_model->simpan_pasien($data);
        echo json_encode($data);
    }

    public function rawatanbaru($id)
    {
        $data['title'] = 'Rawatan Baru';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['pasien'] = $this->db->get_where('pasien', ['id' => $id])->row_array();

        $data['content'] = '';
        $page = 'pasien/rawatan_baru';
        // echo modules::run('template/loadview', $data);
        echo modules::run('template/loadview', $data, $page);
    }


    public function simpanrawatan()
    {
        $notransaksi = 'CG' . date("ymdhis");
        $data_rawatan = array(
            'id_pasien'             => $_POST['id_pasien'],
            'no_transaksi'          => $notransaksi,
            'tgl_awal_rawatan'      => $_POST['tgl_awal_rawatan'],
            'diagnosa_sakit'        => $_POST['diagnosa_sakit'],
            'alergi'                => $_POST['alergi'],
            'barthel_index_score'   => $_POST['barthel_index_score'],
            'barthel_index_score_date' => $_POST['barthel_index_score_date'],
            'status'                => $_POST['status'],
        );
        $data_transaksi = array(
            'id_pasien'             => $_POST['id_pasien'],
            'no_transaksi'          => $notransaksi,
            'status'                => 1,
        );

        $this->Pasien_model->simpan_rawatan($data_rawatan);
        $this->Pasien_model->simpan_transaksi($data_transaksi);
        echo json_encode([
            'rawatan' => $data_rawatan,
            'transaksi' => $data_transaksi
        ]);
    }

    public function rawatan()
    {
        $data['title'] = 'Pasien Rawatan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['content'] = '';
        $page = 'pasien/rawatan';
        // echo modules::run('template/loadview', $data);
        echo modules::run('template/loadview', $data, $page);
    }

    public function tabelrawatan()
    {
        $fetch_data = $this->Pasien_model->make_datatables_rawatan();

        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();
            $birthDate = new DateTime($row->tanggal_lahir);
            $today = new DateTime("today");
            if ($birthDate > $today) {
                exit("0 tahun 0 bulan 0 hari");
            }
            $y = $today->diff($birthDate)->y;
            $m = $today->diff($birthDate)->m;
            $d = $today->diff($birthDate)->d;
            $sub_array[] = '<div class="text-center">
            <div class="dropdown">
                            <a class="text-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v mr-2"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <span class="small p-3 font-weight-bold text-dark">' . $row->nama . '</span>
                                <a class="dropdown-item aktivitas" href="' . base_url('pasien/aktivitas/') . $row->id . '/' . $row->id_pasien . '" id="' . $row->id . '" namapasien="' . $row->nama . '" >Aktivitas</a>
                                <a class="dropdown-item keadaan_pasien" href="#" id="' . $row->id . '" namapasien="' . $row->nama . '" >Keadaan Pasien</a>
                                <a class="dropdown-item tanda_vital" href="#" id="' . $row->id . '" namapasien="' . $row->nama . '">Tanda Vital</a>
                                <a class="dropdown-item catatan_perkembangan" href="#" id="' . $row->id . '" namapasien="' . $row->nama . '">Catatan Perkembangan</a>
                                <a class="dropdown-item medikasi" href="#" id="' . $row->id . '" namapasien="' . $row->nama . '">Medikasi</a>
                                <a class="dropdown-item pemantauan_alat_medik" href="#" id="' . $row->id . '" namapasien="' . $row->nama . '">Pemantauan Alat Medik</a>
                                <a class="dropdown-item integritas_kulit" href="#" id="' . $row->id . '" namapasien="' . $row->nama . '">Integritas Kulit</a>
                                <a class="dropdown-item hasil_lab_penunjang" href="#" id="' . $row->id . '" namapasien="' . $row->nama . '">Hasil Lab Penunjang</a>
                            </div>
            </div>
            </div>
            ';
            // $sub_array[] = $no;
            if ($row->jenis_kelamin == '1') {
                $jk = 'Laki-laki';
            } else {
                $jk = 'Perempuan';
            }
            $sub_array[] = "<b>" . strtoupper("$row->nama") . "</b><br>" . $row->nik . "<br>" . strtoupper("$jk") . "<br>" . $y . " Tahun " . $m . " Bulan " . $d . " Hari";
            $sub_array[] = $row->diagnosa_sakit;

            $sub_array[] = "<b>" . $row->barthel_index_score . "</b><br>" . $row->barthel_index_score_date;
            $sub_array[] = "<span>" . $row->alergi . "</span>";


            $data[] = $sub_array;
        }

        $output = array(
            "draw"                => intval($_POST['draw']),
            "recordsTotal"        => $this->Pasien_model->get_all_data_rawatan(),
            "recordsFiltered"     => $this->Pasien_model->get_filtered_data_rawatan(),
            "data"                => $data
        );
        echo json_encode($output);
    }

    public function aktivitas($id, $idpasien)
    {
        $data['title'] = 'Aktivitas Pasien';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['pasien'] = $this->db->get_where('pasien', ['id' => $idpasien])->row_array();
        $data['rawatan'] = $this->db->get_where('rawatan', ['id' => $id])->row_array();

        $data['content'] = '';
        $page = 'pasien/aktivitas';
        // echo modules::run('template/loadview', $data);
        echo modules::run('template/loadview', $data, $page);
    }


    public function simpanaktivitas()
    {
        $notransaksi = 'AP' . date("ymdhis");
        $data_aktivitas = array(
            'id_pasien'             => $_POST['id_pasien'],
            'id_rawatan'             => $_POST['id_rawatan'],
            'no_transaksi'          => $notransaksi,
            'makan'                    => $_POST['makan'],
            'mandi'                 => $_POST['mandi'],
            'kebersihan_diri'        => $_POST['kebersihan_diri'],
            'berpakaian'                => $_POST['berpakaian'],
            'defekasi'              => $_POST['defekasi'],
            'miksi'                 => $_POST['miksi'],
            'penggunaan_toilet'     => $_POST['penggunaan_toilet'],
            'transfer'              => $_POST['transfer'],
            'mobilitas'             => $_POST['mobilitas'],
            'naik_tangga'           => $_POST['naik_tangga'],
            'status'                => 1,
        );
        $data_transaksi = array(
            'id_pasien'             => $_POST['id_pasien'],
            'no_transaksi'          => $notransaksi,
            'status'                => 1,
        );

        $this->Pasien_model->simpan_aktivitas($data_aktivitas);
        $this->Pasien_model->simpan_transaksi($data_transaksi);
        echo json_encode([
            'aktivitas' => $data_aktivitas,
            'transaksi' => $data_transaksi
        ]);
    }

    public function hapusaktivitas()
    {

        $data_aktivitas = array(
            'status'                => $_POST['status'],
        );
        $data_transaksi = array(
            'status'                => $_POST['status'],
        );

        $this->Pasien_model->update_aktivitas($data_aktivitas, $_POST['id']);
        $this->Pasien_model->update_transaksi($data_transaksi, $_POST['notransaksi']);
        echo json_encode([
            'aktivitas' => $data_aktivitas,
            'transaksi' => $data_transaksi
        ]);
    }

    public function tabelaktivitas()
    {
        $fetch_data = $this->Pasien_model->make_datatables_aktivitas();
        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();
            $sub_array[] = '
            <a href="#" class="fa fa-times-circle ml-2 mr-2 text-danger delete" id="' . $row->id . '" notransaksi="' . $row->no_transaksi . '" data-toggle="modal" data-target="#staticBackdrop" title="delete"></a>';
            $sub_array[] = $no;
            $sub_array[] = $row->created_at;
            if ($row->total_skor >= 0 && $row->total_skor <= 4) {
                $sub_array[] = '
                 <span class="badge badge-danger">' . $row->total_skor . ' - KETERGANTUNGAN TOTAL</span>';
            } else if ($row->total_skor >= 5 && $row->total_skor <= 8) {
                $sub_array[] = '
                 <span class="badge badge-warning">' . $row->total_skor . ' - KETERGANTUNGAN BERAT</span>';
            } else if ($row->total_skor >= 9 && $row->total_skor <= 11) {
                $sub_array[] = '
                 <span class="badge badge-info">' . $row->total_skor . ' - KETERGANTUNGAN SEDANG</span>';
            } else if ($row->total_skor >= 12 && $row->total_skor <= 19) {
                $sub_array[] = '
                 <span class="badge badge-info">' . $row->total_skor . ' - KETERGANTUNGAN RINGAN</span>';
            } else if ($row->total_skor >= 20) {
                $sub_array[] = '
                 <span class="badge badge-success">' . $row->total_skor . ' - MANDIRI</span>';
            } else {
                $sub_array[] = '
                 <span class="badge badge-danger">' . $row->total_skor . '</span>';
            }
            $data[] = $sub_array;
        }

        $output = array(
            "draw"                => intval($_POST['draw']),
            "recordsTotal"        => $this->Pasien_model->get_all_data_aktivitas(),
            "recordsFiltered"     => $this->Pasien_model->get_filtered_data_aktivitas(),
            "data"                => $data
        );
        echo json_encode($output);
    }

    public function ubahstatusblog()
    {
        $data = array(
            'status'            => $_POST['status'],
        );

        $this->Blog_model->ubah_status_blog($data, $_POST['id']);
        echo json_encode($data);
    }

    public function imageblog($id)
    {
        $data['title'] = 'Image Blog';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['id_blog'] = $id;

        $data['content'] = '';
        $page = 'blog/image_blog';
        echo modules::run('template/loadview', $data, $page);
    }

    public function tabelimageblog()
    {
        $fetch_data = $this->Blog_model->make_datatables_image_blog();
        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();
            $sub_array[] = $no;
            $sub_array[] = substr($row->image, 0, 40) . '...';
            $sub_array[] = '
            <a href="#" class="fa fa-trash ml-2 mr-2 text-danger delete" id="' . $row->id . '" file="' . $row->file_name . '" data-toggle="modal" data-target="#staticBackdrop" title="delete"></a>';

            $data[] = $sub_array;
        }

        $output = array(
            "draw"                => intval($_POST['draw']),
            "recordsTotal"        => $this->Blog_model->get_all_data_image_blog(),
            "recordsFiltered"     => $this->Blog_model->get_filtered_data_image_blog(),
            "data"                => $data
        );
        echo json_encode($output);
    }

    public function simpanimageblog()
    {
        $config['upload_path']          = './assets/img/image_blog/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = '6024'; // 6024KB
        $config['encrypt_name']            = TRUE;

        $this->load->library('upload', $config);

        $this->upload->do_upload('file_blog');
        $filename = $this->upload->data("file_name");
        $data = array(

            'image'                 => base_url('assets/img/image_blog/') . $filename,
            'file_name'                 => $filename,
            'blog_id'                 => $this->input->post('id_blog')
        );
        $this->Blog_model->simpan_image_blog($data);
        echo json_encode($data);
    }

    public function hapusimageblog()
    {
        $id = $_POST['id'];
        $file = $_POST['file'];
        unlink(FCPATH . 'assets/img/image_blog/' . $file);
        $this->Blog_model->hapus_image_blog($id);
        echo json_encode('Foto berhasil dihapus');
    }
}
