<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Blog_model');
        $this->load->model('Creator_model');
    }

    public function index()
    {
        $data['title'] = 'Blog';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['content'] = '';
        $page = 'blog/index';
        // echo modules::run('template/loadview', $data);
        echo modules::run('template/loadview', $data, $page);
    }

    public function tabelblog()
    {
        $fetch_data = $this->Blog_model->make_datatables_blog();
        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();
            $sub_array[] = $no;
            $sub_array[] = "<b>" . $row->name . "</b><br>" . strtoupper("$row->category");
            $sub_array[] = substr($row->description, 0, 25);
            if ($row->status == 'published') {
                $sub_array[] = '
                <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="badge badge-success">' . $row->status . '</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a id="' . $row->id . '" status="1" class="dropdown-item ubahstatus">Draft</a>
                            <a id="' . $row->id . '" status="2" class="dropdown-item ubahstatus">Published</a>
                        </div>
                </div>';
            } else {
                $sub_array[] = '
                <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="badge badge-secondary">' . $row->status . '</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a id="' . $row->id . '" status="1" class="dropdown-item ubahstatus">Draft</a>
                            <a id="' . $row->id . '" status="2" class="dropdown-item ubahstatus">Published</a>
                        </div>
                </div>';
            }
            $sub_array[] = '<span href="#" class="status badge badge-primary" title="Diunggah" >' . $row->created_at . '</span><br>' . '<span href="#" class="status badge badge-info" title="Diperbarui" >' . $row->updated_at . '</span><br>';
            $sub_array[] = '
            <a href="#" class="fa fa-image ml-2 mr-2 thumbnail" id="' . $row->id . '" berita="' . $row->name . '" category="' . $row->category . '" data-toggle="modal" data-target="#staticBackdrop" title="Thumbnail"></a>
            <a href="#" class="fa fa-images ml-2 mr-2 imageblog" id="' . $row->id . '" berita="' . $row->name . '" category="' . $row->category . '" data-toggle="modal" data-target="#staticBackdrop" title="Image Blog"></a>
            <a href="#" class="fa fa-info-circle ml-2 mr-2 info" id="' . $row->id . '" berita="' . $row->name . '" category="' . $row->category . '" data-toggle="modal" data-target="#staticBackdrop" title="Info"></a>';

            $data[] = $sub_array;
        }

        $output = array(
            "draw"                => intval($_POST['draw']),
            "recordsTotal"        => $this->Blog_model->get_all_data_blog(),
            "recordsFiltered"     => $this->Blog_model->get_filtered_data_blog(),
            "data"                => $data
        );
        echo json_encode($output);
    }

    public function tambahblog()
    {
        $data['title'] = 'Blog';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['content'] = '';
        $page = 'blog/tambah_blog';
        // echo modules::run('template/loadview', $data);
        echo modules::run('template/loadview', $data, $page);
    }

    public function getAllCreators()
    {
        $data = $this->Creator_model->fetch_all_creators();
        echo json_encode($data);
    }

    public function simpanblog()
    {
        $data = array(
            'name'            => $_POST['judul'],
            'category'        => $_POST['category'],
            'description'     => $_POST['description'],
            'status'          => $_POST['status'],
            'description'     => $_POST['description'],
            'creator_id'       => $_POST['creator'],
            'thumbnail'       => $_POST['thumbnail']
        );

        $this->Blog_model->simpan_blog($data);
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
