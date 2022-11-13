 <?php
    class Pasien_model extends CI_Model
    {
        //tabel pasien
        var $order_column = array(null, 'name', null, 'status', 'created_at', null);
        public function make_query_pasien()
        {
            // $id_pasien = $_POST['idpasien'];
            $this->db->select('*');
            // $this->db->where('jenis_layanan', 2);
            $this->db->from('pasien');
            if (($_POST["search"]["value"])) {
                $this->db->like('nama', $_POST["search"]["value"]);
            }

            if (isset($_POST["order"])) {
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else {
                $this->db->order_by('id', 'ASC');
            }
        }


        public function make_datatables_pasien()
        {
            $this->make_query_pasien();

            if ($_POST["length"] != -1) {
                $this->db->limit($_POST['length'], $_POST['start']);
            }
            $query = $this->db->get();
            return $query->result();
        }

        public function get_filtered_data_pasien()
        {
            $this->make_query_pasien();
            $query = $this->db->get();

            return $query->num_rows();
        }

        public function get_all_data_pasien()
        {
            $this->db->select("*");
            $this->db->from('pasien');
            return $this->db->count_all_results();
        }
        //end blog

        //image blog
        var $order_column_image_pasien = array(null, 'name', null, 'status', 'created_at', null);
        public function make_query_image_pasien()
        {
            // $id_pasien = $_POST['idpasien'];
            $this->db->select('*');
            $this->db->where('blog_id', $_POST['id_pasien']);
            $this->db->from('image_pasiens');
            if (($_POST["search"]["value"])) {
                $this->db->like('no_registrasi', $_POST["search"]["value"]);
            }

            if (isset($_POST["order"])) {
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else {
                $this->db->order_by('id', 'ASC');
            }
        }


        public function make_datatables_image_pasien()
        {
            $this->make_query_image_pasien();

            if ($_POST["length"] != -1) {
                $this->db->limit($_POST['length'], $_POST['start']);
            }
            $query = $this->db->get();
            return $query->result();
        }

        public function get_filtered_data_image_pasien()
        {
            $this->make_query_image_pasien();
            $query = $this->db->get();

            return $query->num_rows();
        }

        public function get_all_data_image_pasien()
        {
            $this->db->select("*");
            $this->db->from('image_pasiens');
            return $this->db->count_all_results();
        }
        //end image blog

        public function simpan_pasien($data)
        {
            $this->db->insert('pasien', $data);
        }
        public function simpan_image_pasien($data)
        {
            $this->db->insert('image_pasiens', $data);
        }
        public function ubah_status_pasien($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('blogs', $data);
        }
        public function hapus_image_pasien($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('image_pasiens');
        }
    }
    ?>