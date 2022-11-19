<?php

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
date_default_timezone_set('Asia/Jakarta');
//identitas pasien
$no_mr = $pasien['no_mr'];
$queryPasien = "SELECT p.no_mr, a.ket_agama AS ket_agama,referensi_pendidikan.ket_pendidikan,referensi_pekerjaan.ket_pekerjaan,referensi_sukubangsa.ket_sukubangsa,referensi_statusnikah.ket_statusnikah,hb.ket_hubungan AS hubungan_pasien,hb1.ket_hubungan AS hubungan_keluarga1,hb2.ket_hubungan AS hubungan_keluarga2
                FROM simrsj_master.pasien AS p
                LEFT JOIN simrsj_master.referensi_agama AS a
                ON a.id_agama = p.agama
                LEFT JOIN simrsj_master.referensi_pendidikan
                ON referensi_pendidikan.id_pendidikan = p.pendidikan
                LEFT JOIN simrsj_master.referensi_pekerjaan
                ON referensi_pekerjaan.id_pekerjaan = p.pekerjaan
                LEFT JOIN simrsj_master.referensi_sukubangsa
                ON referensi_sukubangsa.id_sukubangsa = p.suku_bangsa
                LEFT JOIN simrsj_master.referensi_statusnikah
                ON referensi_statusnikah.id_statusnikah = p.status_kawin
                LEFT JOIN simrsj_master.referensi_hubungan AS hb
                ON p.pj_hubungan = hb.id_hubungan
                LEFT JOIN simrsj_master.referensi_hubungan AS hb1
                ON p.kel_hubungan1 = hb1.id_hubungan
                LEFT JOIN simrsj_master.referensi_hubungan AS hb2
                ON p.kel_hubungan2 = hb2.id_hubungan
                WHERE p.no_mr = $no_mr";
$p = $this->db->query($queryPasien)->row_array();


//nama user
$id_pegawai = $user['pegawai_id'];
$queryPegawai = "SELECT pg.nama_pegawai
                FROM simrsj_aplikasi.user AS u
                JOIN simrsj_master.pegawai AS pg
                ON u.pegawai_id = pg.id_pegawai
                WHERE pg.id_pegawai = $id_pegawai";
$pg = $this->db->query($queryPegawai)->row_array();
//umur pasien
$lahir    = new DateTime($pasien['tanggal_lahir']);
$today        = new DateTime();
$umur = $today->diff($lahir);
$no_mr = $pasien['no_mr'];
if ($pasien['jenis_kelamin'] == 0) {
    $jk = "Perempuan";
} else {
    $jk = "Laki-laki";
}


$pdf = new \TCPDF();
$pdf->AddPage('P', 'mm', 'A4');
// define barcode style
$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);
$pdf->SetFont('', 'B', 14);
$pdf->Cell(85, 10, "RSJ. PROF. HB. SAANIN PADANG", 0, 0, 'L');
$pdf->SetFont('', 'B', 12);
$pdf->Cell(135, 10, "LEMBAR IDENTITAS PASIEN", 0, 1, 'C');
$pdf->SetFont('', '', 12);
$pdf->Cell(305, 0, "NOMOR REKAM MEDIK", 0, 1, 'C');
$pdf->SetFont('', 'B', 12);
$pdf->Cell(305, 0, $pasien['no_mr'], 0, 1, 'C');
$pdf->SetAutoPageBreak(true, 0);
// Add Header
// $pdf->Ln(5);
// $pdf->SetFont('', 'B', 12);
// $pdf->Cell(20, 8, "No", 1, 0, 'C');
// $pdf->Cell(100, 8, "Nama Pegawai", 1, 0, 'C');
// $pdf->Cell(120, 8, "Alamat", 1, 0, 'C');
// $pdf->Cell(37, 8, "Telp", 1, 1, 'C');
// $pdf->SetFont('', '', 12);
// $no = 0;
$pdf->SetFont('', '', 12);
// $pdf->Cell(255, 0, $pasien['no_mr'], 0, 1);
$pdf->write1DBarcode($pasien['no_mr'], 'C128', 25, 15, '', 18, 0.6, $style, 'N');

$pdf->Image(base_url('assets/img/foto_pasien/') . $pasien['foto_pasien'], 145, 35, 35, 35, '', '', '', true, 150, '', false, false, 1, false, false, false);
$content .= '<tcpdf method="write2DBarcode" params="' . $params . '" />';
$content .= '<table class="table-bordered">

                        <tr>
                            <td style="width: 20%">Tanggal Masuk</td>
                            <td style="width: 35%">: ' . date('d-m-Y', strtotime($tgl_masuk)) . '</td>
                        </tr>
                        <tr>
                            <td class="align-baseline">Nama Pasien</td>
                            <td class="align-baseline">: ' . $pasien['nama_pasien'] . '</td>
                        </tr>
                        <tr>
                            <td class="align-baseline">Jenis Kelamin</td>
                            <td class="align-baseline">: ' . $jk . '</td>
                        </tr>
                        <tr>
                            <td class="align-baseline">Tanggal Lahir</td>
                            <td class="align-baseline">: ' . date('d-m-Y', strtotime($pasien['tanggal_lahir'])) . '</td>
                        </tr>
                        <tr>
                            <td class="align-baseline">Umur</td>
                            <td class="align-baseline">: ' . $umur->y . ' Tahun ' . $umur->m . ' Bulan ' . $umur->d . ' Hari</td>
                        </tr>
                        <tr>
                            <td class="align-baseline">Pernikahan</td>
                            <td>: ' . $p['ket_statusnikah'] . '</td>
                        </tr>
                        <tr>
                            <td class="align-baseline">Pendidikan</td>
                            <td class="align-baseline">: ' . $p['ket_pendidikan'] . '</td>
                        </tr>
                        <tr>
                            <td class="align-baseline">Pekerjaan</td>
                            <td class="align-baseline">: ' . $p['ket_pekerjaan'] . '</td>
                        </tr>
                        <tr>
                            <td class="align-baseline">Agama</td>
                            <td class="align-baseline">: ' . $p['ket_agama'] . '</td>
                        </tr>
                        <tr>
                            <td class="align-baseline">Suku Bangsa</td>
                            <td class="align-baseline">: ' . $p['ket_sukubangsa'] . '</td>
                        </tr>


                        <tr>
                            <td class="align-baseline">Jumlah Anak</td>
                            <td class="align-baseline">: ' . $pasien['jumlah_anak'] . '</td>
                        </tr>
                        <tr>
                            <td class="align-baseline">Ibu Kandung</td>
                            <td class="align-baseline">: ' . $pasien['nama_ibu'] . '</td>
                        </tr>
                        <tr>
                            <td class="align-baseline">Ayah</td>
                            <td class="align-baseline">: ' . $pasien['nama_ayah'] . '</td>
                        </tr>
                        <tr>
                            <td class="align-baseline">Alamat</td>
                            <td class="align-baseline">: ' . $pasien['alamat_pasien'] . '</td>
                        </tr>
                        <tr>
                            <td class="align-baseline">Jumlah Keluarga Serumah</td>
                            <td height="30" class="align-baseline">: ' . $pasien['jumlah_keluarga'] . '</td>
                        </tr>

                    </table>';

$content .= '<table class="table-bordered">
                    <tr>
                        <td style="width: 30%">Nama Penanggung Jawab</td>
                        <td style="width: 30%">: ' . $pasien['pj_pasien'] . '</td>
                    </tr>
                    <tr>
                        <td class="align-baseline">Hubungan dengan Pasien</td>
                        <td class="align-baseline">: ' . $p['hubungan_pasien'] . '</td>
                    </tr>
                    <tr>
                        <td class="align-baseline">Alamat Penanggung Jawab</td>
                        <td class="align-baseline">: ' . $pasien['pj_alamat'] . '</td>
                    </tr>
                    <tr>
                        <td class="align-baseline">No. Telepon/ Hp</td>
                        <td height="30" class="align-baseline">: ' . $pasien['pj_hp'] . '</td>
                    </tr>
                    </br>
                </table>';

$content .= ' <table class="table-bordered">
                    <tr>
                        <td class=""><b>Telepon Keluarga yang Dapat dihubungi</b></td>
                    </tr>
                </table>';
$content .= '<table border="1" cellspacing="0" cellpadding="2">
                    <tr>
                        <td class="text-center">Nama</td>
                        <td class="text-center">No. Telepon</td>
                        <td class="text-center">Hubungan dengan Pasien</td>
                    </tr>
                    <tr>
                        <td class="align-baseline">' . $pasien['kel_nama1'] . '</td>
                        <td class="align-baseline">' . $pasien['kel_hp1'] . '</td>
                        <td class="align-baseline">' . $p['hubungan_keluarga1'] . '</td>
                    </tr>
                    <tr>
                        <td class="align-baseline">' . $pasien['kel_nama2'] . '</td>
                        <td class="align-baseline">' . $pasien['kel_hp2'] . '</td>
                        <td class="align-baseline">' . $p['hubungan_keluarga2'] . '</td>
                    </tr>
                </table>';
$content .=
    '<table class="table-bordered" cellpadding="4">
                        <tr>
                         <td style="width: 50%"></td>
                         <td style="width: 50%; height: 60px;text-align: center;">Tanggal Cetak, ' . setlocale(LC_ALL, 'id_ID') . '' . tgl_indo(date('Y-m-d')) . ' ' . date('H:i:s') . '</td>';
$content .= '</td></tr></table>';
$content .= '<table class="table-bordered cellpadding="4"">
                        <tr>
                        <td style="width: 51%; "></td>
                        <td style="width: 49%; height:60px;text-align: center;">' . $pg['nama_pegawai'] . '</td>
                        </tr>
                    </table>';


$pdf->SetFont('', '', 10);
$pdf->writeHTML($content, true, 0, true, 0);
ob_end_clean();
$pdf->Output('Resume Medis Pasien.pdf');
?>



<!-- ./wrapper -->
<!-- Page specific script -->