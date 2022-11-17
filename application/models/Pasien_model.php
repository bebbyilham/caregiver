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

        //tabel tanda_vital
        var $order_column_tanda_vital = array(null, 'name', null, 'status', 'created_at', null);
        public function make_query_tanda_vital()
        {
            // $id_tanda_vital = $_POST['idpasien'];
            $this->db->select('
            tanda_vital.id AS id,
            tanda_vital.id_pasien AS id_pasien,
            tanda_vital.id_rawatan AS id_rawatan,
            tanda_vital.no_transaksi AS no_transaksi,
            tanda_vital.sistolik AS sistolik,
            tanda_vital.diastolik AS diastolik,
            tanda_vital.suhu AS suhu,
            tanda_vital.nadi AS nadi,
            tanda_vital.pernapasan AS pernapasan,
            tanda_vital.status AS status,
            tanda_vital.created_at AS created_at,
            tanda_vital.updated_at AS updated_at
            ');
            $this->db->where('id_rawatan', $_POST['id_rawatan']);
            $this->db->where('status !=', 99);
            $this->db->from('tanda_vital');
            if (($_POST["search"]["value"])) {
                $this->db->like('created_at', $_POST["search"]["value"]);
            }

            if (isset($_POST["order"])) {
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else {
                $this->db->order_by('tanda_vital.created_at', 'DESC');
            }
        }


        public function make_datatables_tanda_vital()
        {
            $this->make_query_tanda_vital();

            if (
                $_POST["length"] != -1
            ) {
                $this->db->limit($_POST['length'], $_POST['start']);
            }
            $query = $this->db->get();
            return $query->result();
        }

        public function get_filtered_data_tanda_vital()
        {
            $this->make_query_tanda_vital();
            $query = $this->db->get();

            return $query->num_rows();
        }

        public function get_all_data_tanda_vital()
        {
            $this->db->select("*");
            $this->db->from('tanda_vital');
            return $this->db->count_all_results();
        }
        //end tanda_vital

        //tabel pemantauanalatmedik
        var $order_column_pemantauanalatmedik = array(null, 'name', null, 'status', 'created_at', null);
        public function make_query_pemantauanalatmedik()
        {
            // $id_pemantauanalatmedik = $_POST['idpasien'];
            $this->db->select('
            pemantauan_alat_medik.id AS id,
            pemantauan_alat_medik.id_pasien AS id_pasien,
            pemantauan_alat_medik.id_rawatan AS id_rawatan,
            pemantauan_alat_medik.no_transaksi AS no_transaksi,
            pemantauan_alat_medik.id_alat_medik AS id_alat_medik,
            pemantauan_alat_medik.ukuran AS ukuran,
            pemantauan_alat_medik.tanggal_pemasangan AS tanggal_pemasangan,
            pemantauan_alat_medik.nm_alat_medik AS nm_alat_medik,
            pemantauan_alat_medik.keterangan AS keterangan,
            pemantauan_alat_medik.status AS status,
            pemantauan_alat_medik.created_at AS created_at,
            pemantauan_alat_medik.updated_at AS updated_at
            ');
            $this->db->where('id_rawatan', $_POST['id_rawatan']);
            $this->db->where('status !=', 99);
            $this->db->from('pemantauan_alat_medik');
            if (($_POST["search"]["value"])) {
                $this->db->like('created_at', $_POST["search"]["value"]);
            }

            if (isset($_POST["order"])) {
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else {
                $this->db->order_by('pemantauan_alat_medik.created_at', 'DESC');
            }
        }


        public function make_datatables_pemantauanalatmedik()
        {
            $this->make_query_pemantauanalatmedik();

            if (
                $_POST["length"] != -1
            ) {
                $this->db->limit($_POST['length'], $_POST['start']);
            }
            $query = $this->db->get();
            return $query->result();
        }

        public function get_filtered_data_pemantauanalatmedik()
        {
            $this->make_query_pemantauanalatmedik();
            $query = $this->db->get();

            return $query->num_rows();
        }

        public function get_all_data_pemantauanalatmedik()
        {
            $this->db->select("*");
            $this->db->from('pemantauan_alat_medik');
            return $this->db->count_all_results();
        }
        //end pemantauanalatmedik

        //tabel catatan_perkembangan
        var $order_column_catatan_perkembangan = array(null, 'name', null, 'status', 'created_at', null);
        public function make_query_catatan_perkembangan()
        {
            // $id_catatan_perkembangan = $_POST['idpasien'];
            $this->db->select('
            catatan_perkembangan.id AS id,
            catatan_perkembangan.id_pasien AS id_pasien,
            catatan_perkembangan.id_rawatan AS id_rawatan,
            catatan_perkembangan.no_transaksi AS no_transaksi,
            catatan_perkembangan.id_petugas AS id_petugas,
            pegawai.nama_pegawai AS nama_pegawai,
            pegawai.gelar_depan AS gelar_depan,
            pegawai.gelar_belakang AS gelar_belakang,
            catatan_perkembangan.catatan AS catatan,
            catatan_perkembangan.created_at AS created_at,
            catatan_perkembangan.updated_at AS updated_at
            ');
            $this->db->where('id_rawatan', $_POST['id_rawatan']);
            $this->db->where('status !=', 99);
            $this->db->from('catatan_perkembangan');
            $this->db->join('pegawai', 'pegawai.id_pegawai = catatan_perkembangan.id_petugas', 'LEFT');
            if (($_POST["search"]["value"])) {
                $this->db->like('created_at', $_POST["search"]["value"]);
            }

            if (isset($_POST["order"])) {
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else {
                $this->db->order_by('catatan_perkembangan.created_at', 'DESC');
            }
        }


        public function make_datatables_catatan_perkembangan()
        {
            $this->make_query_catatan_perkembangan();

            if (
                $_POST["length"] != -1
            ) {
                $this->db->limit($_POST['length'], $_POST['start']);
            }
            $query = $this->db->get();
            return $query->result();
        }

        public function get_filtered_data_catatan_perkembangan()
        {
            $this->make_query_catatan_perkembangan();
            $query = $this->db->get();

            return $query->num_rows();
        }

        public function get_all_data_catatan_perkembangan()
        {
            $this->db->select("*");
            $this->db->from('catatan_perkembangan');
            return $this->db->count_all_results();
        }
        //end catatan_perkembangan
        //tabel integritas_kulit
        var $order_column_integritas_kulit = array(null, 'name', null, 'status', 'created_at', null);
        public function make_query_integritas_kulit()
        {
            // $id_integritas_kulit = $_POST['idpasien'];
            $this->db->select('
            integritas_kulit.id AS id,
            integritas_kulit.id_pasien AS id_pasien,
            integritas_kulit.id_rawatan AS id_rawatan,
            integritas_kulit.no_transaksi AS no_transaksi,
            integritas_kulit.kondisi_kulit AS kondisi_kulit,
            integritas_kulit.perawatan_kulit AS perawatan_kulit,
            integritas_kulit.image AS image,
            integritas_kulit.file_name AS file_name,
            integritas_kulit.created_at AS created_at,
            integritas_kulit.updated_at AS updated_at
            ');
            $this->db->where('id_rawatan', $_POST['id_rawatan']);
            $this->db->where('status !=', 99);
            $this->db->from('integritas_kulit');
            // $this->db->join('pegawai', 'pegawai.id_pegawai = integritas_kulit.id_petugas', 'LEFT');
            if (($_POST["search"]["value"])) {
                $this->db->like('created_at', $_POST["search"]["value"]);
            }

            if (isset($_POST["order"])) {
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else {
                $this->db->order_by('integritas_kulit.created_at', 'DESC');
            }
        }


        public function make_datatables_integritas_kulit()
        {
            $this->make_query_integritas_kulit();

            if (
                $_POST["length"] != -1
            ) {
                $this->db->limit($_POST['length'], $_POST['start']);
            }
            $query = $this->db->get();
            return $query->result();
        }

        public function get_filtered_data_integritas_kulit()
        {
            $this->make_query_integritas_kulit();
            $query = $this->db->get();

            return $query->num_rows();
        }

        public function get_all_data_integritas_kulit()
        {
            $this->db->select("*");
            $this->db->from('integritas_kulit');
            return $this->db->count_all_results();
        }
        //end integritas_kulit

        public function update_aktivitas($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('aktivitas', $data);
        }

        public function update_tanda_vital($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('tanda_vital', $data);
        }

        public function update_transaksi($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('transaksi', $data);
        }

        public function update_pemantauanalatmedik($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('pemantauan_alat_medik', $data);
        }

        public function update_catatan_perkembangan($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('catatan_perkembangan', $data);
        }

        public function update_integritas_kulit($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('integritas_kulit', $data);
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

        public function simpan_tanda_vital($data)
        {
            $this->db->insert('tanda_vital', $data);
        }

        public function simpan_pemantauanalatmedik($data)
        {
            $this->db->insert('pemantauan_alat_medik', $data);
        }
        public function simpan_catatan_perkembangan($data)
        {
            $this->db->insert('catatan_perkembangan', $data);
        }
        public function simpan_integritas_kulit($data)
        {
            $this->db->insert('integritas_kulit', $data);
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