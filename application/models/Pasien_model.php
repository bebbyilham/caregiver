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
        //end pasien

        //tabel rawatan
        var $order_column_rawatan = array(null, 'name', null, 'status', 'created_at', null);
        public function make_query_rawatan()
        {
            // $id_rawatan = $_POST['idpasien'];
            $this->db->select('
            rawatan.id AS id,
            rawatan.id_pasien AS id_pasien,
            rawatan.diagnosa_sakit AS diagnosa_sakit,
            rawatan.barthel_index_score AS barthel_index_score,
            rawatan.barthel_index_score_date AS barthel_index_score_date,
            rawatan.alergi AS alergi,
            pasien.nama AS nama,
            pasien.nik AS nik,
            pasien.tanggal_lahir AS tanggal_lahir,
            pasien.jenis_kelamin AS jenis_kelamin
            ');
            // $this->db->where('jenis_layanan', 2);
            $this->db->from('rawatan');
            $this->db->join('pasien', 'pasien.id = rawatan.id_pasien', 'LEFT');
            if (($_POST["search"]["value"])) {
                $this->db->like('nama', $_POST["search"]["value"]);
            }

            if (isset($_POST["order"])) {
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else {
                $this->db->order_by('rawatan.created_at', 'ASC');
            }
        }


        public function make_datatables_rawatan()
        {
            $this->make_query_rawatan();

            if (
                $_POST["length"] != -1
            ) {
                $this->db->limit($_POST['length'], $_POST['start']);
            }
            $query = $this->db->get();
            return $query->result();
        }

        public function get_filtered_data_rawatan()
        {
            $this->make_query_rawatan();
            $query = $this->db->get();

            return $query->num_rows();
        }

        public function get_all_data_rawatan()
        {
            $this->db->select("*");
            $this->db->from('rawatan');
            return $this->db->count_all_results();
        }
        //end rawatan
        //tabel aktivitas
        var $order_column_aktivitas = array(null, 'name', null, 'status', 'created_at', null);
        public function make_query_aktivitas()
        {
            // $id_aktivitas = $_POST['idpasien'];
            $this->db->select('
            aktivitas.id AS id,
            aktivitas.id_pasien AS id_pasien,
            aktivitas.id_rawatan AS id_rawatan,
            aktivitas.no_transaksi AS no_transaksi,
            aktivitas.makan AS makan,
            aktivitas.mandi AS mandi,
            aktivitas.kebersihan_diri AS kebersihan_diri,
            aktivitas.berpakaian AS berpakaian,
            aktivitas.defekasi AS defekasi,
            aktivitas.miksi AS miksi,
            aktivitas.penggunaan_toilet AS penggunaan_toilet,
            aktivitas.transfer AS transfer,
            aktivitas.mobilitas AS mobilitas,
            aktivitas.naik_tangga AS naik_tangga,
            aktivitas.status AS status,
            aktivitas.created_at AS created_at,
            aktivitas.updated_at AS updated_at,
            (
            makan + 
            mandi+
            kebersihan_diri+
            berpakaian +
            defekasi +
            miksi +
            penggunaan_toilet +
            transfer +
            mobilitas +
            naik_tangga
            ) AS total_skor
            ');
            $this->db->where('id_rawatan', $_POST['id_rawatan']);
            $this->db->where('status !=', 99);
            $this->db->from('aktivitas');
            if (($_POST["search"]["value"])) {
                $this->db->like('nama', $_POST["search"]["value"]);
            }

            if (isset($_POST["order"])) {
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else {
                $this->db->order_by('aktivitas.created_at', 'DESC');
            }
        }


        public function make_datatables_aktivitas()
        {
            $this->make_query_aktivitas();

            if (
                $_POST["length"] != -1
            ) {
                $this->db->limit($_POST['length'], $_POST['start']);
            }
            $query = $this->db->get();
            return $query->result();
        }

        public function get_filtered_data_aktivitas()
        {
            $this->make_query_aktivitas();
            $query = $this->db->get();

            return $query->num_rows();
        }

        public function get_all_data_aktivitas()
        {
            $this->db->select("*");
            $this->db->from('aktivitas');
            return $this->db->count_all_results();
        }
        //end aktivitas

        public function update_aktivitas($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('aktivitas', $data);
        }

        public function update_transaksi($data, $id)
        {
            $this->db->where('no_transaksi', $id);
            $this->db->update('transaksi', $data);
        }

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
        public function simpan_rawatan($data)
        {
            $this->db->insert('rawatan', $data);
        }
        public function simpan_transaksi($data)
        {
            $this->db->insert('transaksi', $data);
        }
        public function simpan_aktivitas($data)
        {
            $this->db->insert('aktivitas', $data);
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