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

            // if ($row->jenis_kelamin == '1') {
            //     $sub_array[] = '
            //     <div class="dropdown">
            //             <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            //               <span class="badge badge-success">Laki-laki</span>
            //             </a>
            //             <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            //                 <a id="' . $row->id . '" status="1" class="dropdown-item ubahstatus">Draft</a>
            //                 <a id="' . $row->id . '" status="2" class="dropdown-item ubahstatus">Published</a>
            //             </div>
            //     </div>';
            // } else {
            //     $sub_array[] = '
            //     <div class="dropdown">
            //             <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            //               <span class="badge badge-secondary">Perempuan</span>
            //             </a>
            //             <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            //                 <a id="' . $row->id . '" status="1" class="dropdown-item ubahstatus">Draft</a>
            //                 <a id="' . $row->id . '" status="2" class="dropdown-item ubahstatus">Published</a>
            //             </div>
            //     </div>';
            // }
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
