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
            $sub_array[] = "<b>" . strtoupper("$row->nama") . "</b><br>" . $row->no_mr . "<br>" . $row->nik . "<br>" . strtoupper("$jk") . "<br>" . $y . " Tahun " . $m . " Bulan " . $d . " Hari";
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
        $last_row = $this->db->select('no_mr')->order_by('id', "desc")->limit(1)->get('pasien')->result();
        foreach ($last_row as $row) {
            $output = sprintf("%06d", $row->no_mr + 1);
        }
        $no_mr = $output;

        $data = array(
            'nama'          => $_POST['nama'],
            'nik'          => $_POST['nik'],
            'no_mr'          => $no_mr,
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
                                <a class="dropdown-item keadaan_pasien" href="' . base_url('pasien/keadaan/') . $row->id . '/' . $row->id_pasien . '" id="' . $row->id . '" id="' . $row->id . '" namapasien="' . $row->nama . '" >Keadaan Pasien</a>
                                <a class="dropdown-item tanda_vital" href="' . base_url('pasien/tandavital/') . $row->id . '/' . $row->id_pasien . '" id="' . $row->id . '" namapasien="' . $row->nama . '">Tanda Vital</a>
                                <a class="dropdown-item catatan_perkembangan" href="' . base_url('pasien/catatanperkembangan/') . $row->id . '/' . $row->id_pasien . '" id="' . $row->id . '" namapasien="' . $row->nama . '">Catatan Perkembangan</a>
                                <a class="dropdown-item medikasi" href="' . base_url('pasien/medikasi/') . $row->id . '/' . $row->id_pasien . '" id="' . $row->id . '" namapasien="' . $row->nama . '">Medikasi</a>
                                <a class="dropdown-item pemantauan_alat_medik" href="' . base_url('pasien/pemantauanalatmedik/') . $row->id . '/' . $row->id_pasien . '" id="' . $row->id . '" namapasien="' . $row->nama . '">Pemantauan Alat Medik</a>
                                <a class="dropdown-item integritas_kulit" href="' . base_url('pasien/integritaskulit/') . $row->id . '/' . $row->id_pasien . '" id="' . $row->id . '" namapasien="' . $row->nama . '">Integritas Kulit</a>
                                <a class="dropdown-item hasil_lab_penunjang" href="' . base_url('pasien/hasillab/') . $row->id . '/' . $row->id_pasien . '" id="' . $row->id . '" namapasien="' . $row->nama . '">Hasil Lab Penunjang</a>
                            </div>
            </div><br><br>
            <a class="text-primary cetakresume" href="#" id="' . $row->id . '" idpasien="' . $row->id_pasien . '" namapasien="' . $row->nama . '">
                                <i class="fas fa-print mr-2"></i>
            </a>
            </div>
            ';
            // $sub_array[] = $no;
            if ($row->jenis_kelamin == '1') {
                $jk = 'Laki-laki';
            } else {
                $jk = 'Perempuan';
            }
            $sub_array[] = "<b>" . strtoupper("$row->nama") . "</b><br>" . $row->no_mr . "<br>" . $row->nik . "<br>" . strtoupper("$jk") . "<br>" . $y . " Tahun " . $m . " Bulan " . $d . " Hari <br>" . $row->created_at;
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
    public function tabelrawatanpasien()
    {
        $fetch_data = $this->Pasien_model->make_datatables_rawatanpasien();

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
                                <a class="dropdown-item keadaan_pasien" href="' . base_url('pasien/keadaan/') . $row->id . '/' . $row->id_pasien . '" id="' . $row->id . '" id="' . $row->id . '" namapasien="' . $row->nama . '" >Keadaan Pasien</a>
                                <a class="dropdown-item tanda_vital" href="' . base_url('pasien/tandavital/') . $row->id . '/' . $row->id_pasien . '" id="' . $row->id . '" namapasien="' . $row->nama . '">Tanda Vital</a>
                                <a class="dropdown-item catatan_perkembangan" href="' . base_url('pasien/catatanperkembangan/') . $row->id . '/' . $row->id_pasien . '" id="' . $row->id . '" namapasien="' . $row->nama . '">Catatan Perkembangan</a>
                                <a class="dropdown-item medikasi" href="' . base_url('pasien/medikasi/') . $row->id . '/' . $row->id_pasien . '" id="' . $row->id . '" namapasien="' . $row->nama . '">Medikasi</a>
                                <a class="dropdown-item pemantauan_alat_medik" href="' . base_url('pasien/pemantauanalatmedik/') . $row->id . '/' . $row->id_pasien . '" id="' . $row->id . '" namapasien="' . $row->nama . '">Pemantauan Alat Medik</a>
                                <a class="dropdown-item integritas_kulit" href="' . base_url('pasien/integritaskulit/') . $row->id . '/' . $row->id_pasien . '" id="' . $row->id . '" namapasien="' . $row->nama . '">Integritas Kulit</a>
                                <a class="dropdown-item hasil_lab_penunjang" href="' . base_url('pasien/hasillab/') . $row->id . '/' . $row->id_pasien . '" id="' . $row->id . '" namapasien="' . $row->nama . '">Hasil Lab Penunjang</a>
                            </div>
            </div><br><br>
            <a class="text-primary cetakresume" href="#" id="' . $row->id . '" idpasien="' . $row->id_pasien . '" namapasien="' . $row->nama . '">
                                <i class="fas fa-print mr-2"></i>
            </a>
            </div>
            ';
            // $sub_array[] = $no;
            if ($row->jenis_kelamin == '1') {
                $jk = 'Laki-laki';
            } else {
                $jk = 'Perempuan';
            }
            $sub_array[] = "<b>" . strtoupper("$row->nama") . "</b><br>" . $row->no_mr . "<br>" . $row->nik . "<br>" . strtoupper("$jk") . "<br>" . $y . " Tahun " . $m . " Bulan " . $d . " Hari <br>" . $row->created_at;
            $sub_array[] = $row->diagnosa_sakit;

            $sub_array[] = "<b>" . $row->barthel_index_score . "</b><br>" . $row->barthel_index_score_date;
            $sub_array[] = "<span>" . $row->alergi . "</span>";


            $data[] = $sub_array;
        }

        $output = array(
            "draw"                => intval($_POST['draw']),
            "recordsTotal"        => $this->Pasien_model->get_all_data_rawatanpasien(),
            "recordsFiltered"     => $this->Pasien_model->get_filtered_data_rawatanpasien(),
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

    public function tandavital($id, $idpasien)
    {
        $data['title'] = 'Tanda Vital Pasien';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['pasien'] = $this->db->get_where('pasien', ['id' => $idpasien])->row_array();
        $data['rawatan'] = $this->db->get_where('rawatan', ['id' => $id])->row_array();

        $data['content'] = '';
        $page = 'pasien/tanda_vital';
        // echo modules::run('template/loadview', $data);
        echo modules::run('template/loadview', $data, $page);
    }


    public function simpantandavital()
    {
        $notransaksi = 'TV' . date("ymdhis");
        $data_tanda_vital = array(
            'id_pasien'             => $_POST['id_pasien'],
            'id_rawatan'             => $_POST['id_rawatan'],
            'no_transaksi'          => $notransaksi,
            'sistolik'                    => $_POST['sistolik'],
            'diastolik'                 => $_POST['diastolik'],
            'suhu'        => $_POST['suhu'],
            'nadi'                => $_POST['nadi'],
            'pernapasan'              => $_POST['pernapasan'],
            'status'                => 1,
        );
        $data_transaksi = array(
            'id_pasien'             => $_POST['id_pasien'],
            'no_transaksi'          => $notransaksi,
            'status'                => 1,
        );

        $this->Pasien_model->simpan_tanda_vital($data_tanda_vital);
        $this->Pasien_model->simpan_transaksi($data_transaksi);
        echo json_encode([
            'tanda_vital' => $data_tanda_vital,
            'transaksi' => $data_transaksi
        ]);
    }

    public function hapustanda_vital()
    {

        $data_tanda_vital = array(
            'status'                => $_POST['status'],
        );
        $data_transaksi = array(
            'status'                => $_POST['status'],
        );

        $this->Pasien_model->update_tanda_vital($data_tanda_vital, $_POST['id']);
        $this->Pasien_model->update_transaksi($data_transaksi, $_POST['notransaksi']);
        echo json_encode([
            'tanda_vital' => $data_tanda_vital,
            'transaksi' => $data_transaksi
        ]);
    }

    public function tabeltanda_vital()
    {
        $fetch_data = $this->Pasien_model->make_datatables_tanda_vital();
        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();
            $sub_array[] = '
            <a href="#" class="fa fa-times-circle ml-2 mr-2 text-danger delete" id="' . $row->id . '" notransaksi="' . $row->no_transaksi . '" data-toggle="modal" data-target="#staticBackdrop" title="delete"></a>';
            $sub_array[] = $no;
            $sub_array[] = $row->created_at;
            if ($row->sistolik < 60 || $row->sistolik > 130) {
                $sistolik = '<span class="badge badge-danger">' . $row->sistolik . ' - SISTOLIK</span>';
            } else {
                $sistolik = '<span class="badge badge-success">' . $row->sistolik . ' - SISTOLIK</span>';
            }
            if ($row->diastolik < 60 || $row->diastolik > 100) {
                $diastolik = '<span class="badge badge-danger">' . $row->diastolik . ' - DIASTOLIK</span>';
            } else {
                $diastolik = '<span class="badge badge-success">' . $row->diastolik . ' - DIASTOLIK</span>';
            }
            if ($row->suhu < 36 || $row->suhu > 37.5) {
                $suhu = '<span class="badge badge-danger">' . $row->suhu . ' - suhu</span>';
            } else {
                $suhu = '<span class="badge badge-success">' . $row->suhu . ' - suhu</span>';
            }
            if ($row->nadi < 60 || $row->nadi > 100) {
                $nadi = '<span class="badge badge-danger">' . $row->nadi . ' - nadi</span>';
            } else {
                $nadi = '<span class="badge badge-success">' . $row->nadi . ' - nadi</span>';
            }
            if ($row->pernapasan < 10 || $row->pernapasan > 20) {
                $pernapasan = '<span class="badge badge-danger">' . $row->pernapasan . ' - pernapasan</span>';
            } else {
                $pernapasan = '<span class="badge badge-success">' . $row->pernapasan . ' - pernapasan</span>';
            }
            $sub_array[] = '<div>'
                . $sistolik . '<br>'
                . $diastolik . '<br>'
                . $suhu . '<br>'
                . $nadi . '<br>'
                . $pernapasan . '<br></div>';
            $data[] = $sub_array;
        }

        $output = array(
            "draw"                => intval($_POST['draw']),
            "recordsTotal"        => $this->Pasien_model->get_all_data_tanda_vital(),
            "recordsFiltered"     => $this->Pasien_model->get_filtered_data_tanda_vital(),
            "data"                => $data
        );
        echo json_encode($output);
    }

    public function pemantauanalatmedik($id, $idpasien)
    {
        $data['title'] = 'Pemantauan Alat Medik Pasien';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['pasien'] = $this->db->get_where('pasien', ['id' => $idpasien])->row_array();
        $data['rawatan'] = $this->db->get_where('rawatan', ['id' => $id])->row_array();

        $data['content'] = '';
        $page = 'pasien/pemantauan_alat_medik';
        // echo modules::run('template/loadview', $data);
        echo modules::run('template/loadview', $data, $page);
    }


    public function simpanpemantauanalatmedik()
    {
        $notransaksi = 'PA' . date("ymdhis");
        $data_pemantauanalatmedik = array(
            'id_pasien'             => $_POST['id_pasien'],
            'id_rawatan'             => $_POST['id_rawatan'],
            'no_transaksi'          => $notransaksi,
            'id_alat_medik'                    => $_POST['alat_medik'],
            'ukuran'                 => $_POST['ukuran'],
            'keterangan'        => $_POST['keterangan'],
            'tanggal_pemasangan'                => $_POST['tanggal_pemasangan'],
            'nm_alat_medik'              => $_POST['nm_alat_medik'],
            'status'                => 1,
        );
        $data_transaksi = array(
            'id_pasien'             => $_POST['id_pasien'],
            'no_transaksi'          => $notransaksi,
            'status'                => 1,
        );

        $this->Pasien_model->simpan_pemantauanalatmedik($data_pemantauanalatmedik);
        $this->Pasien_model->simpan_transaksi($data_transaksi);
        echo json_encode([
            'pemantauanalatmedik' => $data_pemantauanalatmedik,
            'transaksi' => $data_transaksi
        ]);
    }

    public function hapuspemantauanalatmedik()
    {

        $data_pemantauanalatmedik = array(
            'status'                => $_POST['status'],
        );
        $data_transaksi = array(
            'status'                => $_POST['status'],
        );

        $this->Pasien_model->update_pemantauanalatmedik($data_pemantauanalatmedik, $_POST['id']);
        $this->Pasien_model->update_transaksi($data_transaksi, $_POST['notransaksi']);
        echo json_encode([
            'pemantauanalatmedik' => $data_pemantauanalatmedik,
            'transaksi' => $data_transaksi
        ]);
    }

    public function tabelpemantauanalatmedik()
    {
        $fetch_data = $this->Pasien_model->make_datatables_pemantauanalatmedik();
        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();
            $sub_array[] = '
            <a href="#" class="fa fa-times-circle ml-2 mr-2 text-danger delete" id="' . $row->id . '" notransaksi="' . $row->no_transaksi . '" data-toggle="modal" data-target="#staticBackdrop" title="delete"></a>';
            $sub_array[] = $no;
            $sub_array[] = $row->tanggal_pemasangan;
            $sub_array[] = $row->nm_alat_medik;
            $sub_array[] = $row->ukuran;
            $sub_array[] = $row->keterangan;


            $data[] = $sub_array;
        }

        $output = array(
            "draw"                => intval($_POST['draw']),
            "recordsTotal"        => $this->Pasien_model->get_all_data_pemantauanalatmedik(),
            "recordsFiltered"     => $this->Pasien_model->get_filtered_data_pemantauanalatmedik(),
            "data"                => $data
        );
        echo json_encode($output);
    }

    public function catatanperkembangan($id, $idpasien)
    {
        $data['title'] = 'Catatan Perkembangan Pasien';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['pasien'] = $this->db->get_where('pasien', ['id' => $idpasien])->row_array();
        $data['rawatan'] = $this->db->get_where('rawatan', ['id' => $id])->row_array();

        $data['content'] = '';
        $page = 'pasien/catatan_perkembangan';
        // echo modules::run('template/loadview', $data);
        echo modules::run('template/loadview', $data, $page);
    }


    public function simpancatatanperkembangan()
    {
        $notransaksi = 'CP' . date("ymdhis");
        $data_catatan_perkembangan = array(
            'id_pasien'             => $_POST['id_pasien'],
            'id_rawatan'             => $_POST['id_rawatan'],
            'no_transaksi'          => $notransaksi,
            'catatan'                    => $_POST['catatan'],
            'soap_s'                    => $_POST['soap_s'],
            'soap_o'                    => $_POST['soap_o'],
            'soap_a'                    => $_POST['soap_a'],
            'soap_p'                    => $_POST['soap_p'],
            'id_petugas'                    => $_POST['petugas'],
            'status'                => 1,
        );
        $data_transaksi = array(
            'id_pasien'             => $_POST['id_pasien'],
            'no_transaksi'          => $notransaksi,
            'status'                => 1,
        );

        $this->Pasien_model->simpan_catatan_perkembangan($data_catatan_perkembangan);
        $this->Pasien_model->simpan_transaksi($data_transaksi);
        echo json_encode([
            'catatan_perkembangan' => $data_catatan_perkembangan,
            'transaksi' => $data_transaksi
        ]);
    }

    public function hapuscatatanperkembangan()
    {

        $data_catatan_perkembangan = array(
            'status'                => $_POST['status'],
        );
        $data_transaksi = array(
            'status'                => $_POST['status'],
        );

        $this->Pasien_model->update_catatan_perkembangan($data_catatan_perkembangan, $_POST['id']);
        $this->Pasien_model->update_transaksi($data_transaksi, $_POST['notransaksi']);
        echo json_encode([
            'catatan_perkembangan' => $data_catatan_perkembangan,
            'transaksi' => $data_transaksi
        ]);
    }

    public function tabelcatatanperkembangan()
    {
        $fetch_data = $this->Pasien_model->make_datatables_catatan_perkembangan();
        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();
            $sub_array[] = '
            <a href="#" class="fa fa-times-circle ml-2 mr-2 text-danger delete" id="' . $row->id . '" notransaksi="' . $row->no_transaksi . '" data-toggle="modal" data-target="#staticBackdrop" title="delete"></a>';
            $sub_array[] = $no;
            $sub_array[] = '<span class="badge badge-primary">' . $row->gelar_depan . ' ' . $row->nama_pegawai . ' ' . $row->gelar_belakang . '</span><br>
            <span class="badge badge-warning">' . $row->created_at . '</span>';
            $sub_array[] =
                '<div><span>' . $row->catatan . ' </span><br>
            <span class="font-weight-bold">S</span><span> : ' . $row->soap_s . '</span><br>
            <span class="font-weight-bold">O</span><span> : ' . $row->soap_o . '</span><br>
            <span class="font-weight-bold">A</span><span> : ' . $row->soap_a . '</span><br>
            <span class="font-weight-bold">P</span><span> : ' . $row->soap_p . '</span>
            </div>
            ';
            $data[] = $sub_array;
        }

        $output = array(
            "draw"                => intval($_POST['draw']),
            "recordsTotal"        => $this->Pasien_model->get_all_data_catatan_perkembangan(),
            "recordsFiltered"     => $this->Pasien_model->get_filtered_data_catatan_perkembangan(),
            "data"                => $data
        );
        echo json_encode($output);
    }

    public function integritaskulit($id, $idpasien)
    {
        $data['title'] = 'Integritas Kulit Pasien';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['pasien'] = $this->db->get_where('pasien', ['id' => $idpasien])->row_array();
        $data['rawatan'] = $this->db->get_where('rawatan', ['id' => $id])->row_array();

        $data['content'] = '';
        $page = 'pasien/integritas_kulit';
        // echo modules::run('template/loadview', $data);
        echo modules::run('template/loadview', $data, $page);
    }


    public function simpanintegritaskulit()
    {
        $config['upload_path']          = './assets/img/kulit/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = '6024'; // 6024KB
        $config['encrypt_name']            = TRUE;

        $this->load->library('upload', $config);

        $this->upload->do_upload('upload_kondisi');
        $filename = $this->upload->data("file_name");
        // $data = array(

        //     'image'                 => base_url('assets/img/image_blog/') . $filename,
        //     'file_name'                 => $filename,
        //     'blog_id'                 => $this->input->post('id_blog')
        // );
        $notransaksi = 'IK' . date("ymdhis");
        $data_integritas_kulit = array(
            'id_pasien'             => $_POST['id_pasien'],
            'id_rawatan'             => $_POST['id_rawatan'],
            'no_transaksi'          => $notransaksi,
            'image'                 => base_url('assets/img/kulit/') . $filename,
            'file_name'                 => $filename,
            'kondisi_kulit'             => $_POST['kondisi_kulit'],
            'perawatan_kulit'             => $_POST['perawatan_kulit'],
            'status'                => 1,
        );
        $data_transaksi = array(
            'id_pasien'             => $_POST['id_pasien'],
            'no_transaksi'          => $notransaksi,
            'status'                => 1,
        );

        $this->Pasien_model->simpan_integritas_kulit($data_integritas_kulit);
        $this->Pasien_model->simpan_transaksi($data_transaksi);
        echo json_encode([
            'integritas_kulit' => $data_integritas_kulit,
            'transaksi' => $data_transaksi
        ]);
    }

    public function hapusintegritaskulit()
    {
        $file = $_POST['file'];
        unlink(FCPATH . 'assets/img/kulit/' . $file);

        $data_integritas_kulit = array(
            'status'                => $_POST['status'],
        );
        $data_transaksi = array(
            'status'                => $_POST['status'],
        );

        $this->Pasien_model->update_integritas_kulit($data_integritas_kulit, $_POST['id']);
        $this->Pasien_model->update_transaksi($data_transaksi, $_POST['notransaksi']);
        echo json_encode([
            'integritas_kulit' => $data_integritas_kulit,
            'transaksi' => $data_transaksi
        ]);
    }

    public function tabelintegritaskulit()
    {
        $fetch_data = $this->Pasien_model->make_datatables_integritas_kulit();
        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();
            $sub_array[] = '
            <a href="#" class="fa fa-times-circle ml-2 mr-2 text-danger delete" id="' . $row->id . '" notransaksi="' . $row->no_transaksi . '" data-toggle="modal" data-target="#staticBackdrop" title="delete"></a><br>
            <a href="#" class="fa fa-camera ml-2 mr-2 text-primary foto_kulit" id="' . $row->id . '" notransaksi="' . $row->no_transaksi . '" fotokulit="' . $row->image . '" data-toggle="modal" data-target="#staticBackdrop" title="delete"></a>';
            $sub_array[] = $no;
            // $sub_array[] = '<span class="badge badge-primary">' . $row->gelar_depan . ' ' . $row->nama_pegawai . ' ' . $row->gelar_belakang . '</span><br>
            // <span class="badge badge-warning">' . $row->created_at . '</span>';
            $sub_array[] = $row->created_at;
            $sub_array[] = $row->kondisi_kulit;
            $sub_array[] = $row->perawatan_kulit;

            $data[] = $sub_array;
        }

        $output = array(
            "draw"                => intval($_POST['draw']),
            "recordsTotal"        => $this->Pasien_model->get_all_data_integritas_kulit(),
            "recordsFiltered"     => $this->Pasien_model->get_filtered_data_integritas_kulit(),
            "data"                => $data
        );
        echo json_encode($output);
    }

    public function medikasi($id, $idpasien)
    {
        $data['title'] = 'Medikasi Pasien';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['pasien'] = $this->db->get_where('pasien', ['id' => $idpasien])->row_array();
        $data['rawatan'] = $this->db->get_where('rawatan', ['id' => $id])->row_array();

        $data['content'] = '';
        $page = 'pasien/medikasi';
        // echo modules::run('template/loadview', $data);
        echo modules::run('template/loadview', $data, $page);
    }


    public function simpanmedikasi()
    {
        $notransaksi = 'MP' . date("ymdhis");
        $data_medikasi = array(
            'id_pasien'             => $_POST['id_pasien'],
            'id_rawatan'             => $_POST['id_rawatan'],
            'no_transaksi'          => $notransaksi,
            'nama_obat'                    => $_POST['nama_obat'],
            'tanggal_medikasi'                    => $_POST['tanggal_medikasi'],
            'jam_medikasi'                    => $_POST['jam_medikasi'],
            'id_petugas'                    => $_POST['petugas'],
            'status'                => 1,
        );
        $data_transaksi = array(
            'id_pasien'             => $_POST['id_pasien'],
            'no_transaksi'          => $notransaksi,
            'status'                => 1,
        );

        $this->Pasien_model->simpan_medikasi($data_medikasi);
        $this->Pasien_model->simpan_transaksi($data_transaksi);
        echo json_encode([
            'medikasi' => $data_medikasi,
            'transaksi' => $data_transaksi
        ]);
    }

    public function hapusmedikasi()
    {

        $data_medikasi = array(
            'status'                => $_POST['status'],
        );
        $data_transaksi = array(
            'status'                => $_POST['status'],
        );

        $this->Pasien_model->update_medikasi($data_medikasi, $_POST['id']);
        $this->Pasien_model->update_transaksi($data_transaksi, $_POST['notransaksi']);
        echo json_encode([
            'medikasi' => $data_medikasi,
            'transaksi' => $data_transaksi
        ]);
    }

    public function tabelmedikasi()
    {
        $fetch_data = $this->Pasien_model->make_datatables_medikasi();
        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();
            $sub_array[] = '
            <a href="#" class="fa fa-times-circle ml-2 mr-2 text-danger delete" id="' . $row->id . '" notransaksi="' . $row->no_transaksi . '" data-toggle="modal" data-target="#staticBackdrop" title="delete"></a>';
            $sub_array[] = $no;
            $sub_array[] =
                '<div>
            <span>' . $row->tanggal_medikasi . '</span><br>
            <span>' . $row->jam_medikasi . '</span><br>
            </div>
            ';
            $sub_array[] =
                '<div>
            <span class="font-weight-bold">' . $row->nama_obat . '</span>
            </div>
            ';
            $data[] = $sub_array;
        }

        $output = array(
            "draw"                => intval($_POST['draw']),
            "recordsTotal"        => $this->Pasien_model->get_all_data_medikasi(),
            "recordsFiltered"     => $this->Pasien_model->get_filtered_data_medikasi(),
            "data"                => $data
        );
        echo json_encode($output);
    }

    public function keadaan($id, $idpasien)
    {
        $data['title'] = 'Keadaan Pasien';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['pasien'] = $this->db->get_where('pasien', ['id' => $idpasien])->row_array();
        $data['rawatan'] = $this->db->get_where('rawatan', ['id' => $id])->row_array();

        $data['content'] = '';
        $page = 'pasien/keadaan';
        // echo modules::run('template/loadview', $data);
        echo modules::run('template/loadview', $data, $page);
    }


    public function simpankeadaan()
    {
        $notransaksi = 'KP' . date("ymdhis");
        $data_keadaan = array(
            'id_pasien'             => $_POST['id_pasien'],
            'id_rawatan'             => $_POST['id_rawatan'],
            'no_transaksi'          => $notransaksi,
            'keadaan_pasien_e'                    => $_POST['keadaan_pasien_e'],
            'keadaan_pasien_v'                 => $_POST['keadaan_pasien_v'],
            'keadaan_pasien_m'        => $_POST['keadaan_pasien_m'],
            'text_keadaan_pasien_e'                    => $_POST['text_keadaan_pasien_e'],
            'text_keadaan_pasien_v'                 => $_POST['text_keadaan_pasien_v'],
            'text_keadaan_pasien_m'        => $_POST['text_keadaan_pasien_m'],
            'keadaan_pasien_gjs'                => $_POST['keadaan_pasien_gjs'],
            'kesadaran'              => $_POST['kesadaran'],
            'text_kesadaran'              => $_POST['text_kesadaran'],
            'status'                => 1,
        );
        $data_transaksi = array(
            'id_pasien'             => $_POST['id_pasien'],
            'no_transaksi'          => $notransaksi,
            'status'                => 1,
        );

        $this->Pasien_model->simpan_keadaan($data_keadaan);
        $this->Pasien_model->simpan_transaksi($data_transaksi);
        echo json_encode([
            'keadaan' => $data_keadaan,
            'transaksi' => $data_transaksi
        ]);
    }

    public function hapuskeadaan()
    {

        $data_keadaan = array(
            'status'                => $_POST['status'],
        );
        $data_transaksi = array(
            'status'                => $_POST['status'],
        );

        $this->Pasien_model->update_keadaan($data_keadaan, $_POST['id']);
        $this->Pasien_model->update_transaksi($data_transaksi, $_POST['notransaksi']);
        echo json_encode([
            'keadaan' => $data_keadaan,
            'transaksi' => $data_transaksi
        ]);
    }

    public function tabelkeadaan()
    {
        $fetch_data = $this->Pasien_model->make_datatables_keadaan();
        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();
            $sub_array[] = '
            <a href="#" class="fa fa-times-circle ml-2 mr-2 text-danger delete" id="' . $row->id . '" notransaksi="' . $row->no_transaksi . '" data-toggle="modal" data-target="#staticBackdrop" title="delete"></a>';
            $sub_array[] = $no;
            $sub_array[] = $row->created_at;
            $sub_array[] =
                '<div>
            <span class="font-weight-bold"> E :  </span><span>' . $row->keadaan_pasien_e . ' - ' . $row->text_keadaan_pasien_e . '</span><br>
            <span class="font-weight-bold"> V :  </span><span>' . $row->keadaan_pasien_v . ' - ' . $row->text_keadaan_pasien_v . '</span><br>
            <span class="font-weight-bold"> M :  </span><span>' . $row->keadaan_pasien_m . ' - ' . $row->text_keadaan_pasien_m . '</span><br>
            <span class="font-weight-bold"> GJS : </span><span>' . $row->keadaan_pasien_gjs . '</span><br>
            <span class="font-weight-bold"> Kesadaran : </span><span>' . $row->text_kesadaran . '</span><br>
            </div>
            ';

            $data[] = $sub_array;
        }

        $output = array(
            "draw"                => intval($_POST['draw']),
            "recordsTotal"        => $this->Pasien_model->get_all_data_keadaan(),
            "recordsFiltered"     => $this->Pasien_model->get_filtered_data_keadaan(),
            "data"                => $data
        );
        echo json_encode($output);
    }

    public function hasillab($id, $idpasien)
    {
        $data['title'] = 'Hasil Lab Penunjang Pasien';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['pasien'] = $this->db->get_where('pasien', ['id' => $idpasien])->row_array();
        $data['rawatan'] = $this->db->get_where('rawatan', ['id' => $id])->row_array();

        $data['content'] = '';
        $page = 'pasien/hasil_lab';
        // echo modules::run('template/loadview', $data);
        echo modules::run('template/loadview', $data, $page);
    }


    public function simpanhasillab()
    {
        $config['upload_path']          = './assets/img/hasillab/';
        $config['allowed_types']        = 'jpeg|jpg|png|pdf';
        $config['max_size']             = '10024'; // 6024KB
        $config['encrypt_name']            = TRUE;

        $this->load->library('upload', $config);

        $this->upload->do_upload('upload_hasil_lab');
        $filename = $this->upload->data("file_name");
        // $data = array(

        //     'image'                 => base_url('assets/img/image_blog/') . $filename,
        //     'file_name'                 => $filename,
        //     'blog_id'                 => $this->input->post('id_blog')
        // );
        $notransaksi = 'HL' . date("ymdhis");
        $data_hasil_lab = array(
            'id_pasien'             => $_POST['id_pasien'],
            'id_rawatan'             => $_POST['id_rawatan'],
            'id_petugas'             => $_POST['id_petugas'],
            'no_transaksi'          => $notransaksi,
            'image'                 => base_url('assets/img/hasillab/') . $filename,
            'file_name'                 => $filename,
            'keterangan'             => $_POST['keterangan'],
            'status'                => 1,
        );
        $data_transaksi = array(
            'id_pasien'             => $_POST['id_pasien'],
            'no_transaksi'          => $notransaksi,
            'status'                => 1,
        );

        // if ($_POST['keterangan'] == '' || $_POST['upload_hasil_lab'] == '') {
        //     $code = '201';
        //     $message = 'Data gagal disimpan';
        // } else {
        //     $code = '200';
        //     $message = 'Data berhasil disimpan';

        // }
        $this->Pasien_model->simpan_hasil_lab($data_hasil_lab);
        $this->Pasien_model->simpan_transaksi($data_transaksi);
        return json_encode([
            'code' => '201',
            'message' => 'Data berhasil disimpan',
            'hasil_lab' => $data_hasil_lab,
            'transaksi' => $data_transaksi
        ]);
    }

    public function hapushasillab()
    {
        $file = $_POST['file'];
        unlink(FCPATH . 'assets/img/hasillab/' . $file);

        $data_hasil_lab = array(
            'status'                => $_POST['status'],
        );
        $data_transaksi = array(
            'status'                => $_POST['status'],
        );

        $this->Pasien_model->update_hasil_lab($data_hasil_lab, $_POST['id']);
        $this->Pasien_model->update_transaksi($data_transaksi, $_POST['notransaksi']);
        echo json_encode([
            'hasil_lab' => $data_hasil_lab,
            'transaksi' => $data_transaksi
        ]);
    }

    public function tabelhasillab()
    {
        $fetch_data = $this->Pasien_model->make_datatables_hasil_lab();
        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();
            $sub_array[] = '
            <a href="#" class="fa fa-times-circle ml-2 mr-2 text-danger delete" id="' . $row->id . '" notransaksi="' . $row->no_transaksi . '" file="' . $row->file_name . '" data-toggle="modal" data-target="#staticBackdrop" title="delete"></a><br>
            <a href="' . $row->image . '" class="fa fa-camera ml-2 mr-2 text-primary foto_hasillab" id="' . $row->id . '" notransaksi="' . $row->no_transaksi . '" fotohasillab="' . $row->image . '" title="Hasil Lab" target="_blank"></a>';
            $sub_array[] = $no;
            // $sub_array[] = '<span class="badge badge-primary">' . $row->gelar_depan . ' ' . $row->nama_pegawai . ' ' . $row->gelar_belakang . '</span><br>
            // <span class="badge badge-warning">' . $row->created_at . '</span>';
            $sub_array[] = $row->created_at;
            $sub_array[] = $row->keterangan;

            $data[] = $sub_array;
        }

        $output = array(
            "draw"                => intval($_POST['draw']),
            "recordsTotal"        => $this->Pasien_model->get_all_data_hasil_lab(),
            "recordsFiltered"     => $this->Pasien_model->get_filtered_data_hasil_lab(),
            "data"                => $data
        );
        echo json_encode($output);
    }

    public function cetakresume($id, $idpasien, $tgl)
    {
        $data['title'] = 'Resume Medis';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['pasien'] = $this->db->get_where('pasien', ['id' => $idpasien])->row_array();
        $data['rawatan'] = $this->db->get_where('rawatan', ['id' => $id])->row_array();
        $data['jumlahrawatan'] = $this->db->get_where('rawatan', ['id_pasien' => $idpasien])->num_rows();
        $data['idrawatan'] = $id;
        $data['idpasien'] = $idpasien;
        $data['tgl'] = $tgl;

        $data['content'] = '';
        $page = 'pasien/cetakresume';
        $this->load->view($page, $data);
    }

    public function fetchSinglePasien()
    {
        $output = array();
        $data = $this->Pasien_model->fetch_single_pasien($_POST["id"]);
        foreach ($data as $row) {
            $output['id']   = $row->id;
            $output['nama']   = $row->nama;
            $output['nik']   = $row->nik;
            $output['no_mr']   = $row->no_mr;
            $output['jenis_kelamin']   = $row->jenis_kelamin;
            $output['tanggal_lahir']   = $row->tanggal_lahir;
            $output['alamat']   = $row->alamat;
            $output['notelp1']   = $row->notelp1;
            $output['notelp2']   = $row->notelp2;
            $output['nama_pj']   = $row->nama_pj;
            $output['notelp3']   = $row->notelp3;
            $output['call_ambulance']   = $row->call_ambulance;
            $output['created_at']   = $row->created_at;
        }
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
