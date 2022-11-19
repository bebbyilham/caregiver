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

        // $queryRawatan = "SELECT 
        //                     p.nama AS nama,
        //                     p.tanggal_lahir AS tanggal_lahir


        //                     FROM rawatan AS rw
        //                     LEFT JOIN pasien AS p ON p.id  = rw.id_pasien
        //                     WHERE rw.id = $id_rawatan
        //                     ";

        // $rawatan = $this->db->query($queryRawatan)->result_array();

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
                            keadaan.updated_at AS updated_at
                          
                            
                            FROM keadaan 
                            WHERE keadaan.id_rawatan = $id_rawatan AND keadaan.status != 99
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
                            WHERE integritas_kulit.id_rawatan = $id_rawatan AND integritas_kulit.status != 99
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
                    <h6 class="text-center">PERAWATAN KE </h6>
                </div>
            </div>
        </div>
        <br>

        <tr class="tg-0pky">TELAH DILAKUKAN PERAWATAN PASIEN ATAS NAMA
            <br><b><?php echo strtoupper($pasien['nama']); ?></b>
            <br>USIA <?php echo $y . " TAHUN " . $m . " BULAN " . $d . " HARI"; ?>
        </tr>

        <br>
        <br>
        <tr>
            <td class="tg-0pky"><b>KEADAAN PASIEN</b> :</td>
        </tr>
        <table class="tg">
            <tbody>

                <?php foreach ($keadaan as $k) : ?>
                    <?php
                    // $i++;
                    ?>
                    <tr>
                        <td class="tg-0lax"><span><?php echo $k['created_at']; ?></span></td>
                        <td class="tg-0lax" colspan="3">
                            E : <?php echo $k['text_keadaan_pasien_e']; ?>
                            <br>
                            V : <?php echo $k['text_keadaan_pasien_v']; ?>
                            <br>
                            M : <?php echo $k['text_keadaan_pasien_m']; ?>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <tr>
            <td class="tg-0pky"><b>TANDA VITAL</b> :</td>
        </tr>
        <table class="tg">
            <tbody>
                <tr>
                    <td class="tg-0lax"><span>Waktu</span></td>
                    <td class="tg-0lax">Total Skor
                    </td>
                </tr>
                <?php foreach ($tanda_vital as $tv) : ?>
                    <?php
                    // $i++;
                    ?>

                    <tr>
                        <td class="tg-0lax"><span><?php echo $tv['created_at']; ?></span></td>
                        <td class="tg-0lax" colspan="3">
                            SISTOLIK : <?php echo $tv['sistolik']; ?>
                            <br>
                            DIASTOLIK : <?php echo $tv['diastolik']; ?>
                            <br>
                            SUHU : <?php echo $tv['suhu']; ?>
                            <br>
                            NADI : <?php echo $tv['nadi']; ?>
                            <br>
                            PERNAPANSAN : <?php echo $tv['pernapasan']; ?>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <tr class="tg-0pky"><b>SCORE BARTEL INDEX</b> : <?php echo $rawatan['barthel_index_score']; ?>
        </tr>
        <br>
        <br>
        <tr>
            <td class="tg-0pky"><b>CATATAN PERKEMBANGAN</b> :</td>
        </tr>
        <table class="tg">
            <tbody>
                <tr>
                    <td class="tg-0lax"><span>Petugas</span></td>
                    <td class="tg-0lax">Catatan
                    </td>
                </tr>
                <?php foreach ($catatan_perkembangan as $cp) : ?>
                    <?php
                    // $i++;
                    ?>

                    <tr>
                        <td class="tg-0lax"><span><?php echo $cp['gelar_depan'] . ' ' . $cp['nama_pegawai'] . ' ' . $cp['gelar_belakang']; ?></span><br><span><?php echo $cp['created_at']; ?></span></td>
                        <td class="tg-0lax" colspan="3">
                            <?php echo $cp['catatan']; ?>
                            <br>
                            S : <?php echo $cp['soap_s']; ?>
                            <br>
                            O : <?php echo $cp['soap_o']; ?>
                            <br>
                            A : <?php echo $cp['soap_a']; ?>
                            <br>
                            P : <?php echo $cp['soap_p']; ?>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <tr>
            <td class="tg-0pky"><b>PEMANTAUAN ALAT MEDIK</b> :</td>
        </tr>
        <table class="tg">
            <tbody>
                <tr>
                    <td class="tg-0lax"><span>Tanggal Pemasangan</span></td>
                    <td class="tg-0lax">Alat Medik</td>
                    <td class="tg-0lax">Ukuran</td>
                    <td class="tg-0lax">Keterangan</td>
                </tr>
                <?php foreach ($pemantauan_almed as $pa) : ?>
                    <?php
                    // $i++;
                    ?>

                    <tr>
                        <td class="tg-0lax"><span><?php echo $pa['tanggal_pemasangan']; ?></span></td>
                        <td class="tg-0lax"><span><?php echo $pa['nm_alat_medik']; ?></span></td>
                        <td class="tg-0lax"><span><?php echo $pa['ukuran']; ?></span></td>
                        <td class="tg-0lax"><span><?php echo $pa['keterangan']; ?></span></td>

                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <tr>
            <td class="tg-0pky"><b>KONDISI KULIT</b> :</td>
        </tr>
        <table class="tg">
            <tbody>
                <tr>
                    <td class="tg-0lax"><span>Waktu</span></td>
                    <td class="tg-0lax">Kondisi Kulit</td>
                    <td class="tg-0lax">Perawatan</td>
                </tr>
                <?php foreach ($integritas_kulit as $ik) : ?>
                    <?php
                    // $i++;
                    ?>

                    <tr>
                        <td class="tg-0lax"><span><?php echo $ik['created_at']; ?></span></td>
                        <td class="tg-0lax"><span><?php echo $ik['kondisi_kulit']; ?></span></td>
                        <td class="tg-0lax"><span><?php echo $ik['perawatan_kulit']; ?></span></td>

                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <tr>
            <td class="tg-0pky"><b>OBAT YANG TELAH DIBERIKAN</b> :</td>
        </tr>
        <table class="tg">
            <tbody>
                <tr>
                    <td class="tg-0lax"><span>Waktu Pemberian</span></td>
                    <td class="tg-0lax">Nama Obat</td>
                </tr>
                <?php foreach ($medikasi as $mp) : ?>
                    <?php
                    // $i++;
                    ?>

                    <tr>
                        <td class="tg-0lax"><span><?php echo $mp['tanggal_medikasi']; ?></span><br><span><?php echo $mp['jam_medikasi']; ?></span></td>
                        <td class="tg-0lax"><span><?php echo $mp['nama_obat']; ?></span></td>

                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <tr class="tg-0pky"><b>ALERGI</b> : <?php echo $rawatan['alergi']; ?>
        </tr>
        <br>

        <br>
        <div class="row">
            <div class="col-12">
                <div class="float-right">
                    <div class="text-center">Jakarta, <?php echo $tgl; ?></div>
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