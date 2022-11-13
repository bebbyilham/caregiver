<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Profil';
        $data['user'] = $this->db->join('user_role', 'user_role.id = user.role_id')->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['content'] = '';
        $page = 'user/index';
        echo modules::run('template/loadview', $data, $page);
        // echo modules::run('template/loadview', $data, $page);
    }
    public function ubahPassword()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->join('user_role', 'user_role.id = user.role_id')->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['content'] = '';
        $page = 'user/ubah_password';
        echo modules::run('template/loadview', $data, $page);
    }
    public function simpanPassword()
    {
        $data['user'] = $this->db->join('user_role', 'user_role.id = user.role_id')->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password1');
        if (!password_verify($current_password, $data['user']['password'])) {
            // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password sebelumnya salah. </div>');
            echo "Password sebelumnya salah.";
            // redirect('user/changepassword');
            //password sebelumnya tdk sama
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password sebelumnya salah. </div>');
                echo "Password sebelumnya salah.";
                // redirect('user/changepassword');
                //password sebelumnya tdk sama
            } else {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('id_user', $data['user']['id_user']);
                $this->db->update('user');
                echo "Password Berhasil diubah.";
            }
        }
    }
}
