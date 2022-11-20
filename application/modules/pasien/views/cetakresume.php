<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESUME MEDIS</title>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url(); ?>assets/img/LOGOhbs.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" type="text/css" />

</head>

<body>
    <div class="container my-5">

        <style type="text/css">
            h6 {
                font-family: Arial, sans-serif;
                font-weight: bold;
            }

            .tg {
                border-collapse: collapse;
                border-spacing: 0;
            }

            .tg td {
                border-color: black;
                border-style: solid;
                border-width: 1px;
                font-family: Arial, sans-serif;
                font-size: 14px;
                overflow: hidden;
                padding: 10px 5px;
                word-break: normal;
            }

            .tg th {
                border-color: black;
                border-style: solid;
                border-width: 1px;
                font-family: Arial, sans-serif;
                font-size: 14px;
                font-weight: bold;
                overflow: hidden;
                padding: 10px 5px;
                word-break: normal;
            }

            .tg .tg-73oq {
                border-color: #000000;
                text-align: left;
                vertical-align: top
            }

            .tg .tg-0pky {
                border-color: #ffffff;
                text-align: left;
                vertical-align: top
            }
        </style>

        <?php
        $id_pasien = $idpasien;
        $id_rawatan = $idrawatan;
        $id_pegawai = $user['pegawai_id'];

        // $queryPerawatan = "SELECT 
        //                     p.nama AS nama,
        //                     SUM(rw.id_pasien) AS jumlah_rawatan


        //                     FROM rawatan AS rw
        //                     LEFT JOIN pasien AS p ON p.id  = rw.id_pasien
        //                     WHERE pd.id = $id_pasien
        //                     ";

        // $perawatan = $this->db->query($queryPerawatan)->result_array();

        //pegawai
        $queryPegawai = "SELECT 
                            pegawai.nama_pegawai AS nama_pegawai,
                            pegawai.gelar_depan AS gelar_depan,
                            pegawai.gelar_belakang AS gelar_belakang
                          
                            
                            FROM pegawai 
                            WHERE pegawai.id_pegawai = $id_pegawai
                            ";
        $pegawai = $this->db->query($queryPegawai)->result_array();
        //keadaan
        $queryKeadaan = "SELECT 
                            keadaan.id AS id,
                            keadaan.id_pasien AS id_pasien,
                            keadaan.id_rawatan AS id_rawatan,
                            keadaan.no_transaksi AS no_transaksi,
                            keadaan.keadaan_pasien_e AS keadaan_pasien_e,
                            keadaan.keadaan_pasien_v AS keadaan_pasien_v,
                            keadaan.keadaan_pasien_m AS keadaan_pasien_m,
                            keadaan.text_keadaan_pasien_e AS text_keadaan_pasien_e,
                            keadaan.text_keadaan_pasien_v AS text_keadaan_pasien_v,
                            keadaan.text_keadaan_pasien_m AS text_keadaan_pasien_m,
                            keadaan.keadaan_pasien_gjs AS keadaan_pasien_gjs,
                            keadaan.kesadaran AS kesadaran,
                            keadaan.text_kesadaran AS text_kesadaran,
                            keadaan.created_at AS created_at,
                            keadaan.updated_at AS updated_at,
                            (keadaan.keadaan_pasien_e+keadaan.keadaan_pasien_v+keadaan.keadaan_pasien_m) AS skor_gjs
                          
                            
                            FROM keadaan 
                            WHERE keadaan.id_rawatan = $id_rawatan AND keadaan.status != 99 ORDER BY keadaan.id DESC LIMIT 1
                            ";
        $keadaan = $this->db->query($queryKeadaan)->result_array();
        //tandavital
        $queryTandavital = "SELECT 
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
                          
                            
                            FROM tanda_vital
                            WHERE tanda_vital.id_rawatan = $id_rawatan AND tanda_vital.status != 99
                            ";
        $tanda_vital = $this->db->query($queryTandavital)->result_array();

        //catatan perkembangan
        $queryCatatanPerkembangan = "SELECT 
                            catatan_perkembangan.id AS id,
                            catatan_perkembangan.id_pasien AS id_pasien,
                            catatan_perkembangan.id_rawatan AS id_rawatan,
                            catatan_perkembangan.no_transaksi AS no_transaksi,
                            catatan_perkembangan.id_petugas AS id_petugas,
                            catatan_perkembangan.soap_s AS soap_s,
                            catatan_perkembangan.soap_o AS soap_o,
                            catatan_perkembangan.soap_a AS soap_a,
                            catatan_perkembangan.soap_p AS soap_p,
                            pegawai.nama_pegawai AS nama_pegawai,
                            pegawai.gelar_depan AS gelar_depan,
                            pegawai.gelar_belakang AS gelar_belakang,
                            catatan_perkembangan.catatan AS catatan,
                            catatan_perkembangan.created_at AS created_at,
                            catatan_perkembangan.updated_at AS updated_at
                          
                            
                            FROM catatan_perkembangan
                            JOIN pegawai ON pegawai.id_pegawai = catatan_perkembangan.id_petugas
                            WHERE catatan_perkembangan.id_rawatan = $id_rawatan AND catatan_perkembangan.status != 99
                            ";
        $catatan_perkembangan = $this->db->query($queryCatatanPerkembangan)->result_array();

        //pemantauan alat medik
        $queryPemantauanAlmed = "SELECT 
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
                          
                            
                            FROM pemantauan_alat_medik
                            WHERE pemantauan_alat_medik.id_rawatan = $id_rawatan AND pemantauan_alat_medik.status != 99
                            ";
        $pemantauan_almed = $this->db->query($queryPemantauanAlmed)->result_array();
        //integritas kulit
        $queryIntegritasKulit = "SELECT 
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
                          
                            
                            FROM integritas_kulit 
                            WHERE integritas_kulit.id_rawatan = $id_rawatan AND integritas_kulit.status != 99  ORDER BY integritas_kulit.id DESC LIMIT 1
                            ";
        $integritas_kulit = $this->db->query($queryIntegritasKulit)->result_array();
        //integritas kulit
        $queryMedikasi = "SELECT 
                             medikasi.id AS id,
                            medikasi.id_pasien AS id_pasien,
                            medikasi.id_rawatan AS id_rawatan,
                            medikasi.no_transaksi AS no_transaksi,
                            medikasi.id_petugas AS id_petugas,
                            medikasi.nama_obat AS nama_obat,
                            medikasi.tanggal_medikasi AS tanggal_medikasi,
                            medikasi.jam_medikasi AS jam_medikasi,
                            medikasi.created_at AS created_at,
                            medikasi.updated_at AS updated_at
                          
                            
                            FROM medikasi
                            WHERE medikasi.id_rawatan = $id_rawatan AND medikasi.status != 99
                            ";
        $medikasi = $this->db->query($queryMedikasi)->result_array();

        $tgl_lahir = $pasien['tanggal_lahir'];
        $birthDate = new DateTime($pasien['tanggal_lahir']);
        $today = new DateTime("today");
        if ($birthDate > $today) {
            exit("0 tahun 0 bulan 0 hari");
        }
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        ?>
        <div class="row">
            <div class="col-12">
                <div class="col-12">
                    <h6 class="text-center">HEBRINGS</h6>
                    <h6 class="text-center">PERAWATAN KE <?php echo $jumlahrawatan; ?>

                    </h6>
                </div>
            </div>
        </div>
        <br>

        <tr class="tg-0pky">TELAH DILAKUKAN PERAWATAN PASIEN ATAS NAMA
            <br><b><?php echo strtoupper($pasien['nama']); ?></b>
            <br><?php echo date("d/m/Y", strtotime($tgl_lahir)); ?>
            <br>USIA <?php echo $y . " TAHUN " . $m . " BULAN " . $d . " HARI"; ?>
        </tr>

        <br>
        <br>
        <table class="tg">
            <tbody>
                <tr>
                    <td class="tg-0pky"><b>KONDISI PASIEN</b></td>
                    <td class="tg-0pky">:</td>

                    <?php foreach ($keadaan as $k) : ?>

                        <td class="tg-0pky"><?php echo $k['text_kesadaran']; ?></td>

                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td class="tg-0pky"><b>TANDA VITAL</b></td>
                    <td class="tg-0pky">:</td>
                    <?php foreach ($tanda_vital as $tv) : ?>

                        <td class="tg-0pky">TD: <?php echo $tv['sistolik'] . '/' . $tv['diastolik'] . ' mmHg N: ' . $tv['nadi'] . ' x/menit' ?></td>

                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td class="tg-0pky"><b>ALAT MEDIS YANG TERPASANG</b></td>
                    <td class="tg-0pky">:</td>
                    <td class="tg-0pky">
                        <?php foreach ($pemantauan_almed as $pa) : ?>

                            <?php echo '(' . date("d/m/Y", strtotime($pa['tanggal_pemasangan'])) . ') ' . $pa['nm_alat_medik'] ?><br>

                        <?php endforeach; ?>
                    </td>
                </tr>
                <tr>
                    <td class="tg-0pky"><b>OBAT</b></td>
                    <td class="tg-0pky">:</td>
                    <td class="tg-0pky">
                        <?php foreach ($medikasi as $mp) : ?>

                            <?php echo $mp['nama_obat'] ?><br>

                        <?php endforeach; ?>
                    </td>
                </tr>
                <tr>
                    <td class="tg-0pky"><b>TANGGAL KONTROL TERAKHIR</b></td>
                    <td class="tg-0pky">:</td>
                </tr>
                <tr>
                    <td class="tg-0pky"><b>Lain-lain</b></td>
                    <td class="tg-0pky">:</td>
                    <td class="tg-0pky">
                        <?php foreach ($integritas_kulit as $ik) : ?>

                            <?php echo $ik['kondisi_kulit'] ?><br>

                        <?php endforeach; ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <br>
        <div class="row">
            <div class="col-12">
                <div class="float-right">
                    <div class="text-center">Jakarta, <?php echo date("d/m/Y", strtotime($tgl)); ?></div>
                    <br>
                    <?php foreach ($pegawai as $pw) : ?>
                        <br>
                        <div class="text-center"><?php echo $pw['gelar_depan'] . ' ' . $pw['nama_pegawai'] . ' ' . $pw['gelar_belakang']; ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    window.print();
</script>