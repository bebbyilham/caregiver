<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tanda-pengenal-tab" data-toggle="pill" href="#tanda-pengenal" role="tab" aria-controls="tanda-pengenal" aria-selected="true">Tanda Pengenal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="agama-tab" data-toggle="pill" href="#agama" role="tab" aria-controls="agama" aria-selected="false">Agama</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="warga-negara-tab" data-toggle="pill" href="#warga-negara" role="tab" aria-controls="warga-negara" aria-selected="false">Warga Negara</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="suku-bangsa-tab" data-toggle="pill" href="#suku-bangsa" role="tab" aria-controls="suku-bangsa" aria-selected="false">Suku Bangsa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="status-nikah-tab" data-toggle="pill" href="#status-nikah" role="tab" aria-controls="status-nikah" aria-selected="false">Status Nikah</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pendidikan-tab" data-toggle="pill" href="#pendidikan" role="tab" aria-controls="pendidikan" aria-selected="false">Pendidikan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pekerjaan-tab" data-toggle="pill" href="#pekerjaan" role="tab" aria-controls="pekerjaan" aria-selected="false">Pekerjaan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="hubungan-tab" data-toggle="pill" href="#hubungan" role="tab" aria-controls="hubungan" aria-selected="false">Hubungan Pasien</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profesi-tab" data-toggle="pill" href="#profesi" role="tab" aria-controls="profesi" aria-selected="false">Profesi Pegawai</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="wisma-tab" data-toggle="pill" href="#wisma" role="tab" aria-controls="wisma" aria-selected="false">Wisma</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="kelas-tab" data-toggle="pill" href="#kelas" role="tab" aria-controls="kelas" aria-selected="false">Kelas Kamar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="penjamin-tab" data-toggle="pill" href="#penjamin" role="tab" aria-controls="penjamin" aria-selected="false">Penjamin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="satuan_labor-tab" data-toggle="pill" href="#satuan_labor" role="tab" aria-controls="satuan_labor" aria-selected="false">Satuan Labor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="grup-tindakan-lab-tab" data-toggle="pill" href="#grup-tindakan-lab" role="tab" aria-controls="grup-tindakan-lab" aria-selected="false">Grup Tindakan Labor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="jenis-bahan-radiologi-tab" data-toggle="pill" href="#jenis-bahan-radiologi" role="tab" aria-controls="jenis-bahan-radiologi" aria-selected="false">Jenis Bahan Radiologi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="cara-keluar-tab" data-toggle="pill" href="#cara-keluar" role="tab" aria-controls="cara-keluar" aria-selected="false">Cara Keluar</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <!-- TANDA PENGENAL  -->
                                <div class="tab-pane fade show active" id="tanda-pengenal" role="tabpanel" aria-labelledby="tanda-pengenal-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="card card-primary">
                                                        <form method="post" id="tambah_tanda_pengenal">
                                                            <input type="hidden" id="id_tanda_pengenal" name="id_tanda_pengenal">
                                                            <input type="hidden" id="action" name="action" value="tambah">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="pengenal">Tanda Pengenal</label>
                                                                    <input type="text" class="form-control rounded-0" id="pengenal" name="pengenal" placeholder="Tanda Pengenal">
                                                                    <small><span class="text-danger" id="error_pengenal"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status_pengenal">Status</label>
                                                                    <select class="custom-select rounded-0" id="status_pengenal" name="status_pengenal">
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-success" id="clear1">Refresh</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="card card-danger">
                                                        <div class="card-body">
                                                            <table id="tabel_pengenal" class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No.</th>
                                                                        <th style="width: 50%">Tanda Pengenal</th>
                                                                        <th style="width: 25%">Status</th>
                                                                        <th style="width: 20%">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- AGAMA -->
                                <div class="tab-pane fade" id="agama" role="tabpanel" aria-labelledby="agama-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="card card-primary">
                                                        <form method="post" id="tambah_agama">
                                                            <input type="hidden" id="id_agama" name="id_agama">
                                                            <input type="hidden" id="action1" name="action1" value="tambah">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="ket_agama">Agama</label>
                                                                    <input type="text" class="form-control rounded-0" id="ket_agama" name="ket_agama" placeholder="Agama">
                                                                    <small><span class="text-danger" id="error_ket_agama"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status_agama">Status</label>
                                                                    <select class="custom-select rounded-0" id="status_agama" name="status_agama">
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-success" id="clear2">Refresh</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="card card-danger">
                                                        <div class="card-body">
                                                            <table id="tabel_agama" class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No.</th>
                                                                        <th style="width: 50%">Agama</th>
                                                                        <th style="width: 25%">Status</th>
                                                                        <th style="width: 20%">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- WARGANEGARA -->
                                <div class="tab-pane fade" id="warga-negara" role="tabpanel" aria-labelledby="warga-negara-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="card card-primary">
                                                        <form method="post" id="tambah_warganegara">
                                                            <input type="hidden" id="id_warganegara" name="id_warganegara">
                                                            <input type="hidden" id="action2" name="action2" value="tambah">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="ket_warganegara">Warga Negara</label>
                                                                    <input type="text" class="form-control rounded-0" id="ket_warganegara" name="ket_warganegara" placeholder="Warga Negara">
                                                                    <small><span class="text-danger" id="error_ket_warganegara"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status_warganegara">Status</label>
                                                                    <select class="custom-select rounded-0" id="status_warganegara" name="status_warganegara">
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-success" id="clear3">Refresh</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="card card-danger">
                                                        <div class="card-body">
                                                            <table id="tabel_warganegara" class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No.</th>
                                                                        <th style="width: 50%">Warga Negara</th>
                                                                        <th style="width: 25%">Status</th>
                                                                        <th style="width: 20%">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- SUKU BANGSA -->
                                <div class="tab-pane fade" id="suku-bangsa" role="tabpanel" aria-labelledby="suku-bangsa-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="card card-primary">
                                                        <form method="post" id="tambah_sukubangsa">
                                                            <input type="hidden" id="id_sukubangsa" name="id_sukubangsa">
                                                            <input type="hidden" id="action3" name="action3" value="tambah">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="ket_sukubangsa">Suku Bangsa</label>
                                                                    <input type="text" class="form-control rounded-0" id="ket_sukubangsa" name="ket_sukubangsa" placeholder="Suku Bangsa">
                                                                    <small><span class="text-danger" id="error_ket_sukubangsa"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status_sukubangsa">Status</label>
                                                                    <select class="custom-select rounded-0" id="status_sukubangsa" name="status_sukubangsa">
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-success" id="clear4">Refresh</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="card card-danger">
                                                        <div class="card-body">
                                                            <table id="tabel_sukubangsa" class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No.</th>
                                                                        <th style="width: 50%">Suku Bangsa</th>
                                                                        <th style="width: 25%">Status</th>
                                                                        <th style="width: 20%">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- STATUS NIKAH -->
                                <div class="tab-pane fade" id="status-nikah" role="tabpanel" aria-labelledby="status-nikah-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="card card-primary">
                                                        <form method="post" id="tambah_statusnikah">
                                                            <input type="hidden" id="id_statusnikah" name="id_statusnikah">
                                                            <input type="hidden" id="action4" name="action4" value="tambah">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="ket_statusnikah">Status Nikah</label>
                                                                    <input type="text" class="form-control rounded-0" id="ket_statusnikah" name="ket_statusnikah" placeholder="Status Pernikahan">
                                                                    <small><span class="text-danger" id="error_ket_statusnikah"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status_statusnikah">Status</label>
                                                                    <select class="custom-select rounded-0" id="status_statusnikah" name="status_statusnikah">
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-success" id="clear5">Refresh</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="card card-danger">
                                                        <div class="card-body">
                                                            <table id="tabel_statusnikah" class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No.</th>
                                                                        <th style="width: 50%">Status Nikah</th>
                                                                        <th style="width: 25%">Status</th>
                                                                        <th style="width: 20%">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- PENDIDIKAN -->
                                <div class="tab-pane fade" id="pendidikan" role="tabpanel" aria-labelledby="pendidikan-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="card card-primary">
                                                        <form method="post" id="tambah_pendidikan">
                                                            <input type="hidden" id="id_pendidikan" name="id_pendidikan">
                                                            <input type="hidden" id="action5" name="action5" value="tambah">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="ket_pendidikan">Pendidikan</label>
                                                                    <input type="text" class="form-control rounded-0" id="ket_pendidikan" name="ket_pendidikan" placeholder="Pendidikan">
                                                                    <small><span class="text-danger" id="error_ket_pendidikan"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status_pendidikan">Status</label>
                                                                    <select class="custom-select rounded-0" id="status_pendidikan" name="status_pendidikan">
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-success" id="clear6">Refresh</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="card card-danger">
                                                        <div class="card-body">
                                                            <table id="tabel_pendidikan" class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No.</th>
                                                                        <th style="width: 50%">Pendidikan</th>
                                                                        <th style="width: 25%">Status</th>
                                                                        <th style="width: 20%">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- PEKERJAAN -->
                                <div class="tab-pane fade" id="pekerjaan" role="tabpanel" aria-labelledby="pekerjaan-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="card card-primary">
                                                        <form method="post" id="tambah_pekerjaan">
                                                            <input type="hidden" id="id_pekerjaan" name="id_pekerjaan">
                                                            <input type="hidden" id="action6" name="action6" value="tambah">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="ket_pekerjaan">Pekerjaan</label>
                                                                    <input type="text" class="form-control rounded-0" id="ket_pekerjaan" name="ket_pekerjaan" placeholder="Pekerjaan">
                                                                    <small><span class="text-danger" id="error_ket_pekerjaan"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status_pekerjaan">Status</label>
                                                                    <select class="custom-select rounded-0" id="status_pekerjaan" name="status_pekerjaan">
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-success" id="clear7">Refresh</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="card card-danger">
                                                        <div class="card-body">
                                                            <table id="tabel_pekerjaan" class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No.</th>
                                                                        <th style="width: 50%">Pekerjaan</th>
                                                                        <th style="width: 25%">Status</th>
                                                                        <th style="width: 20%">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- HUBUNGAN DENGAN PASIEN -->
                                <div class="tab-pane fade" id="hubungan" role="tabpanel" aria-labelledby="hubungan-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="card card-primary">
                                                        <form method="post" id="tambah_hubungan">
                                                            <input type="hidden" id="id_hubungan" name="id_hubungan">
                                                            <input type="hidden" id="action7" name="action7" value="tambah">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="ket_hubungan">Hubungan</label>
                                                                    <input type="text" class="form-control rounded-0" id="ket_hubungan" name="ket_hubungan" placeholder="Hubungan Pasien">
                                                                    <small><span class="text-danger" id="error_ket_hubungan"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status_hubungan">Status</label>
                                                                    <select class="custom-select rounded-0" id="status_hubungan" name="status_hubungan">
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-success" id="clear8">Refresh</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="card card-danger">
                                                        <div class="card-body">
                                                            <table id="tabel_hubungan" class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No.</th>
                                                                        <th style="width: 50%">Hubungan Pasien</th>
                                                                        <th style="width: 25%">Status</th>
                                                                        <th style="width: 20%">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- PROFESI PEGAWAI -->
                                <div class="tab-pane fade" id="profesi" role="tabpanel" aria-labelledby="profesi-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="card card-primary">
                                                        <form method="post" id="tambah_profesi">
                                                            <input type="hidden" id="id_profesi" name="id_profesi">
                                                            <input type="hidden" id="action8" name="action8" value="tambah">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="ket_profesi">Profesi</label>
                                                                    <input type="text" class="form-control rounded-0" id="ket_profesi" name="ket_profesi" placeholder="Nama Profesi">
                                                                    <small><span class="text-danger" id="error_ket_profesi"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status_profesi">Status</label>
                                                                    <select class="custom-select rounded-0" id="status_profesi" name="status_profesi">
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-success" id="clear9">Refresh</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="card card-danger">
                                                        <div class="card-body">
                                                            <table id="tabel_profesi" class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No.</th>
                                                                        <th style="width: 50%">Nama Profesi</th>
                                                                        <th style="width: 25%">Status</th>
                                                                        <th style="width: 20%">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- WISMA -->
                                <div class="tab-pane fade" id="wisma" role="tabpanel" aria-labelledby="wisma-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="card card-primary">
                                                        <form method="post" id="tambah_wisma">
                                                            <input type="hidden" id="id_wisma" name="id_wisma">
                                                            <input type="hidden" id="action9" name="action9" value="tambah">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="nama_wisma">Nama Wisma</label>
                                                                    <input type="text" class="form-control rounded-0" id="nama_wisma" name="nama_wisma" placeholder="Nama Wisma">
                                                                    <small><span class="text-danger" id="error_nama_wisma"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status_wisma">Status</label>
                                                                    <select class="custom-select rounded-0" id="status_wisma" name="status_wisma">
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-success" id="clear10">Refresh</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="card card-danger">
                                                        <div class="card-body">
                                                            <table id="tabel_wisma" class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No.</th>
                                                                        <th style="width: 50%">Nama Wisma</th>
                                                                        <th style="width: 25%">Status</th>
                                                                        <th style="width: 20%">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- KELAS KAMAR -->
                                <div class="tab-pane fade" id="kelas" role="tabpanel" aria-labelledby="kelas-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="card card-primary">
                                                        <form method="post" id="tambah_kelas">
                                                            <input type="hidden" id="id_kelas" name="id_kelas">
                                                            <input type="hidden" id="action10" name="action10" value="tambah">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="nama_kelas">Nama Kelas</label>
                                                                    <input type="text" class="form-control rounded-0" id="nama_kelas" name="nama_kelas" placeholder="Kelas Kamar Perawatan">
                                                                    <small><span class="text-danger" id="error_nama_kelas"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="kode_kelas">Kode</label>
                                                                    <input type="text" class="form-control rounded-0" id="kode_kelas" name="kode_kelas" placeholder="Kelas Kamar Perawatan">
                                                                    <small><span class="text-danger" id="error_kode_kelas"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status_kelas">Status</label>
                                                                    <select class="custom-select rounded-0" id="status_kelas" name="status_kelas">
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-success" id="clear11">Refresh</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="card card-danger">
                                                        <div class="card-body">
                                                            <table id="tabel_kelas" class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No.</th>
                                                                        <th style="width: 25%">Nama Kelas</th>
                                                                        <th style="width: 25%">Kode Kelas</th>
                                                                        <th style="width: 25%">Status</th>
                                                                        <th style="width: 20%">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- PENJAMIN -->
                                <div class="tab-pane fade" id="penjamin" role="tabpanel" aria-labelledby="penjamin-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="card card-primary">
                                                        <form method="post" id="tambah_penjamin">
                                                            <input type="hidden" id="id_penjamin" name="id_penjamin">
                                                            <input type="hidden" id="action11" name="action11" value="tambah">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="nama_penjamin">Nama Penjamin</label>
                                                                    <input type="text" class="form-control rounded-0" id="nama_penjamin" name="nama_penjamin" placeholder="Nama Penjamin">
                                                                    <small><span class="text-danger" id="error_nama_penjamin"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="kode_penjamin">Kode</label>
                                                                    <input type="text" class="form-control rounded-0" id="kode_penjamin" name="kode_penjamin" placeholder="Kode Penjamin">
                                                                    <small><span class="text-danger" id="error_kode_penjamin"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status_penjamin">Status</label>
                                                                    <select class="custom-select rounded-0" id="status_penjamin" name="status_penjamin">
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-success" id="clear12">Refresh</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="card card-danger">
                                                        <div class="card-body">
                                                            <table id="tabel_penjamin" class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No.</th>
                                                                        <th>Nama Penjamin</th>
                                                                        <th>Kode</th>
                                                                        <th>Status</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- SATUAN LABOR -->
                                <div class="tab-pane fade" id="satuan_labor" role="tabpanel" aria-labelledby="satuan_labor-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="card card-primary">
                                                        <form method="post" id="tambah_satuan_labor">
                                                            <input type="hidden" id="id_satuan_labor" name="id_satuan_labor">
                                                            <input type="hidden" id="action13" name="action13" value="tambah">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="nama_satuan_labor">Nama Satuan</label>
                                                                    <input type="text" class="form-control rounded-0" id="nama_satuan_labor" name="nama_satuan_labor" placeholder="Nama Satuan">
                                                                    <small><span class="text-danger" id="error_nama_satuan_labor"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status_satuan_labor">Status</label>
                                                                    <select class="custom-select rounded-0" id="status_satuan_labor" name="status_satuan_labor">
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-success" id="clear13">Refresh</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="card card-danger">
                                                        <div class="card-body">
                                                            <table id="tabel_satuan_labor" class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No.</th>
                                                                        <th>Nama Satuan</th>
                                                                        <th>Status</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- GRUP TINDAKAN LABOR -->
                                <div class="tab-pane fade" id="grup-tindakan-lab" role="tabpanel" aria-labelledby="grup-tindakan-lab-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="card card-primary">
                                                        <form method="post" id="tambah_grup_labor">
                                                            <input type="hidden" id="id_grup_labor" name="id_grup_labor">
                                                            <input type="hidden" id="action14" name="action14" value="tambah">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="nama_kategori_tindakan_labor">Nama Grup</label>
                                                                    <input type="text" class="form-control rounded-0" id="nama_kategori_tindakan_labor" name="nama_kategori_tindakan_labor" placeholder="Nama Satuan">
                                                                    <small><span class="text-danger" id="error_nama_kategori_tindakan_labor"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status_kategori_tindakan_labor">Status</label>
                                                                    <select class="custom-select rounded-0" id="status_kategori_tindakan_labor" name="status_kategori_tindakan_labor">
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-success" id="clear14">Refresh</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="card card-danger">
                                                        <div class="card-body">
                                                            <table id="tabel_kategori_tindakan_labor" class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No.</th>
                                                                        <th>Nama Kategori</th>
                                                                        <th>Status</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- BAHAN RADIOLOGI -->
                                <div class="tab-pane fade" id="jenis-bahan-radiologi" role="tabpanel" aria-labelledby="jenis-bahan-radiologi-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="card card-primary">
                                                        <form method="post" id="tambah_bahan_radiologi">
                                                            <input type="hidden" id="id_bahan_radiologi" name="id_bahan_radiologi">
                                                            <input type="hidden" id="action15" name="action15" value="tambah">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="nama_bahan_radiologi">Jenis Bahan Radiologi</label>
                                                                    <input type="text" class="form-control rounded-0" id="nama_bahan_radiologi" name="nama_bahan_radiologi" placeholder="Nama Satuan">
                                                                    <small><span class="text-danger" id="error_nama_bahan_radiologi"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status_bahan_radiologi">Status</label>
                                                                    <select class="custom-select rounded-0" id="status_bahan_radiologi" name="status_bahan_radiologi">
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-success" id="clear15">Refresh</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="card card-danger">
                                                        <div class="card-body">
                                                            <table id="tabel_bahan_radiologi" class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No.</th>
                                                                        <th>Nama Bahan</th>
                                                                        <th>Status</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- CARA KELUAR -->
                                <div class="tab-pane fade" id="cara-keluar" role="tabpanel" aria-labelledby="cara-keluar-tab">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="card card-primary">
                                                        <form method="post" id="tambah_cara_keluar">
                                                            <input type="hidden" id="id_cara_keluar" name="id_cara_keluar">
                                                            <input type="hidden" id="action16" name="action16" value="tambah">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="cara_keluar">Cara Keluar</label>
                                                                    <input type="text" class="form-control rounded-0" id="cara_keluar" name="cara_keluar" placeholder="Cara Keluar">
                                                                    <small><span class="text-danger" id="error_cara_keluar"></span></small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status_cara_keluar">Status</label>
                                                                    <select class="custom-select rounded-0" id="status_cara_keluar" name="status_cara_keluar">
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-success" id="clear16">Refresh</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="card card-danger">
                                                        <div class="card-body">
                                                            <table id="tabel_cara_keluar" class="table table-bordered table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 5%">No.</th>
                                                                        <th>Cara Keluar</th>
                                                                        <th>Status</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        // CARA KELUAR ------------------------------
        // ------------------------------------------
        $(document).on('click', '#clear16', function() {
            $('#tambah_cara_keluar')[0].reset();
        });
        // Datatables Pengenal
        dataTable16 = $('#tabel_cara_keluar').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelCaraKeluar",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0, 3]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_cara_keluar', function(event) {
            event.preventDefault();
            var cara_keluar = $('#cara_keluar').val();
            var error_cara_keluar = $('#error_cara_keluar').val();

            if ($('#cara_keluar').val() == '') {
                error_cara_keluar = 'Data tidak boleh kosong';
                $('#error_cara_keluar').text(error_cara_keluar);
                cara_keluar = '';
            } else {
                error_cara_keluar = '';
                $('#error_cara_keluar').text(error_cara_keluar);
                cara_keluar = $('#cara_keluar').val();
            }

            if (error_cara_keluar != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahCaraKeluar',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        dataTable16.ajax.reload();
                        $('#tambah_cara_keluar')[0].reset();
                        $('#id_cara_keluar').val('');
                        $('#action16').val('tambah');
                        toastr["success"](data);
                    }
                });
            }
        });

        // Edit menu
        $(document).on('click', '.edit_cara_keluar', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/editCaraKeluar',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_cara_keluar').val(id);
                    $('#action16').val('edit');
                    $('#cara_keluar').val(data.cara_keluar);
                    $('#status_cara_keluar').val(data.status_cara_keluar);
                }
            });
        });









        // TANDA PENGENAL----------------------------
        // ------------------------------------------
        $(document).on('click', '#clear1', function() {
            $('#tambah_tanda_pengenal')[0].reset();
        });
        // Datatables Pengenal
        dataTable1 = $('#tabel_pengenal').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelPengenal",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0, 3]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_tanda_pengenal', function(event) {
            event.preventDefault();
            var pengenal = $('#pengenal').val();
            var error_pengenal = $('#error_pengenal').val();

            if ($('#pengenal').val() == '') {
                error_pengenal = 'Pengenal tidak boleh kosong';
                $('#error_pengenal').text(error_pengenal);
                pengenal = '';
            } else {
                error_pengenal = '';
                $('#error_pengenal').text(error_pengenal);
                pengenal = $('#pengenal').val();
            }


            if (error_pengenal != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahPengenal',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        toastr["success"](data);
                        dataTable1.ajax.reload();
                        $('#tambah_tanda_pengenal')[0].reset();
                        $('#id_tanda_pengenal').val('');
                        $('#action').val('tambah');
                    }
                });
            }
        });

        // Edit menu
        $(document).on('click', '.edit_pengenal', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/editPengenal',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_tanda_pengenal').val(id);
                    $('#action').val('edit');
                    $('#pengenal').val(data.pengenal);
                    $('#status_pengenal').val(data.status_pengenal);
                }
            });
        });





        // AGAMA-------------------------------------
        // ------------------------------------------
        $(document).on('click', '#clear2', function() {
            $('#tambah_agama')[0].reset();
        });
        // Datatables Pengenal
        dataTable2 = $('#tabel_agama').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelAgama",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0, 3]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_agama', function(event) {
            event.preventDefault();
            var agama = $('#ket_agama').val();
            var error_ket_agama = $('#error_ket_agama').val();

            if ($('#ket_agama').val() == '') {
                error_ket_agama = 'Agama tidak boleh kosong';
                $('#error_ket_agama').text(error_ket_agama);
                ket_agama = '';
            } else {
                error_ket_agama = '';
                $('#error_ket_agama').text(error_ket_agama);
                ket_agama = $('#ket_agama').val();
            }


            if (error_ket_agama != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahAgama',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        toastr["success"](data);
                        dataTable2.ajax.reload();
                        $('#tambah_agama')[0].reset();
                        $('#id_agama').val('');
                        $('#action1').val('tambah');
                    }
                });
            }
        });

        // Edit menu
        $(document).on('click', '.edit_agama', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/editAgama',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_agama').val(id);
                    $('#action1').val('edit');
                    $('#ket_agama').val(data.ket_agama);
                    $('#status_agama').val(data.status_agama);
                }
            });
        });




        // WARGANEGARA-------------------------------
        // ------------------------------------------
        $(document).on('click', '#clear3', function() {
            $('#tambah_warganegara')[0].reset();
        });
        // Datatables Pengenal
        dataTable3 = $('#tabel_warganegara').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelWarganegara",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0, 3]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_warganegara', function(event) {
            event.preventDefault();
            var ket_warganegara = $('#ket_warganegara').val();
            var error_ket_warganegara = $('#error_ket_warganegara').val();

            if ($('#ket_warganegara').val() == '') {
                error_ket_warganegara = 'Warga Negara tidak boleh kosong';
                $('#error_ket_warganegara').text(error_ket_warganegara);
                ket_warganegara = '';
            } else {
                error_ket_warganegara = '';
                $('#error_ket_warganegara').text(error_ket_warganegara);
                ket_warganegara = $('#ket_warganegara').val();
            }


            if (error_ket_warganegara != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahWarganegara',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        toastr["success"](data);
                        dataTable3.ajax.reload();
                        $('#tambah_warganegara')[0].reset();
                        $('#id_warganegara').val('');
                        $('#action2').val('tambah');
                    }
                });
            }
        });

        // Edit menu
        $(document).on('click', '.edit_warganegara', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/editWarganegara',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_warganegara').val(id);
                    $('#action2').val('edit');
                    $('#ket_warganegara').val(data.ket_warganegara);
                    $('#status_warganegara').val(data.status_warganegara);
                }
            });
        });




        // SUKU BANGSA-------------------------------
        // ------------------------------------------
        $(document).on('click', '#clear4', function() {
            $('#tambah_sukubangsa')[0].reset();
        });
        // Datatables Pengenal
        dataTable4 = $('#tabel_sukubangsa').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelSukubangsa",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0, 3]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_sukubangsa', function(event) {
            event.preventDefault();
            var ket_sukubangsa = $('#ket_sukubangsa').val();
            var error_ket_sukubangsa = $('#error_ket_sukubangsa').val();

            if ($('#ket_sukubangsa').val() == '') {
                error_ket_sukubangsa = 'Suku Bangsa tidak boleh kosong';
                $('#error_ket_sukubangsa').text(error_ket_sukubangsa);
                ket_sukubangsa = '';
            } else {
                error_ket_sukubangsa = '';
                $('#error_ket_sukubangsa').text(error_ket_sukubangsa);
                ket_sukubangsa = $('#ket_sukubangsa').val();
            }


            if (error_ket_sukubangsa != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahSukubangsa',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        toastr["success"](data);
                        dataTable4.ajax.reload();
                        $('#tambah_sukubangsa')[0].reset();
                        $('#id_sukubangsa').val('');
                        $('#action3').val('tambah');
                    }
                });
            }
        });

        // Edit menu
        $(document).on('click', '.edit_sukubangsa', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/editSukubangsa',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_sukubangsa').val(id);
                    $('#action3').val('edit');
                    $('#ket_sukubangsa').val(data.ket_sukubangsa);
                    $('#status_sukubangsa').val(data.status_sukubangsa);
                }
            });
        });



        // STATUS NIKAH------------------------------
        // ------------------------------------------
        $(document).on('click', '#clear5', function() {
            $('#tambah_statusnikah')[0].reset();
        });
        // Datatables Pengenal
        dataTable5 = $('#tabel_statusnikah').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelStatusnikah",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0, 3]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_statusnikah', function(event) {
            event.preventDefault();
            var ket_statusnikah = $('#ket_statusnikah').val();
            var error_ket_statusnikah = $('#error_ket_statusnikah').val();

            if ($('#ket_statusnikah').val() == '') {
                error_ket_statusnikah = 'Status Nikah tidak boleh kosong';
                $('#error_ket_statusnikah').text(error_ket_statusnikah);
                ket_statusnikah = '';
            } else {
                error_ket_statusnikah = '';
                $('#error_ket_statusnikah').text(error_ket_statusnikah);
                ket_statusnikah = $('#ket_statusnikah').val();
            }


            if (error_ket_statusnikah != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahStatusnikah',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        toastr["success"](data);
                        dataTable5.ajax.reload();
                        $('#tambah_statusnikah')[0].reset();
                        $('#id_statusnikah').val('');
                        $('#action4').val('tambah');
                    }
                });
            }
        });

        // Edit menu
        $(document).on('click', '.edit_statusnikah', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/editStatusnikah',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_statusnikah').val(id);
                    $('#action4').val('edit');
                    $('#ket_statusnikah').val(data.ket_statusnikah);
                    $('#status_statusnikah').val(data.status_statusnikah);
                }
            });
        });



        // PENDIDIKAN--------------------------------
        // ------------------------------------------
        $(document).on('click', '#clear6', function() {
            $('#tambah_pendidikan')[0].reset();
        });
        // Datatables Pengenal
        datatTable6 = $('#tabel_pendidikan').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelPendidikan",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0, 3]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_pendidikan', function(event) {
            event.preventDefault();
            var ket_pendidikan = $('#ket_pendidikan').val();
            var error_ket_pendidikan = $('#error_ket_pendidikan').val();

            if ($('#ket_pendidikan').val() == '') {
                error_ket_pendidikan = 'Pendidikan tidak boleh kosong';
                $('#error_ket_pendidikan').text(error_ket_pendidikan);
                ket_pendidikan = '';
            } else {
                error_ket_pendidikan = '';
                $('#error_ket_pendidikan').text(error_ket_pendidikan);
                ket_pendidikan = $('#ket_pendidikan').val();
            }


            if (error_ket_pendidikan != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahPendidikan',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        toastr["success"](data);
                        datatTable6.ajax.reload();
                        $('#tambah_pendidikan')[0].reset();
                        $('#id_pendidikan').val('');
                        $('#action5').val('tambah');
                    }
                });
            }
        });

        // Edit menu
        $(document).on('click', '.edit_pendidikan', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/editPendidikan',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_pendidikan').val(id);
                    $('#action5').val('edit');
                    $('#ket_pendidikan').val(data.ket_pendidikan);
                    $('#status_pendidikan').val(data.status_pendidikan);
                }
            });
        });



        // PEKERJAAN---------------------------------
        // ------------------------------------------
        $(document).on('click', '#clear7', function() {
            $('#tambah_pekerjaan')[0].reset();
        });
        // Datatables Pengenal
        dataTable7 = $('#tabel_pekerjaan').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelPekerjaan",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0, 3]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_pekerjaan', function(event) {
            event.preventDefault();
            var ket_pekerjaan = $('#ket_pekerjaan').val();
            var error_ket_pekerjaan = $('#error_ket_pekerjaan').val();

            if ($('#ket_pekerjaan').val() == '') {
                error_ket_pekerjaan = 'pekerjaan tidak boleh kosong';
                $('#error_ket_pekerjaan').text(error_ket_pekerjaan);
                ket_pekerjaan = '';
            } else {
                error_ket_pekerjaan = '';
                $('#error_ket_pekerjaan').text(error_ket_pekerjaan);
                ket_pekerjaan = $('#ket_pekerjaan').val();
            }


            if (error_ket_pekerjaan != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahPekerjaan',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        toastr["success"](data);
                        dataTable7.ajax.reload();
                        $('#tambah_pekerjaan')[0].reset();
                        $('#id_pekerjaan').val('');
                        $('#action6').val('tambah');
                    }
                });
            }
        });

        // Edit menu
        $(document).on('click', '.edit_pekerjaan', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/editPekerjaan',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_pekerjaan').val(id);
                    $('#action6').val('edit');
                    $('#ket_pekerjaan').val(data.ket_pekerjaan);
                    $('#status_pekerjaan').val(data.status_pekerjaan);
                }
            });
        });



        // HUBUNGAN----------------------------------
        // ------------------------------------------
        $(document).on('click', '#clear8', function() {
            $('#tambah_hubungan')[0].reset();
        });
        // Datatables Pengenal
        dataTable8 = $('#tabel_hubungan').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelHubungan",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0, 3]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_hubungan', function(event) {
            event.preventDefault();
            var ket_hubungan = $('#ket_hubungan').val();
            var error_ket_hubungan = $('#error_ket_hubungan').val();

            if ($('#ket_hubungan').val() == '') {
                error_ket_hubungan = 'Ket. Hubungan tidak boleh kosong';
                $('#error_ket_hubungan').text(error_ket_hubungan);
                ket_hubungan = '';
            } else {
                error_ket_hubungan = '';
                $('#error_ket_hubungan').text(error_ket_hubungan);
                ket_hubungan = $('#ket_hubungan').val();
            }


            if (error_ket_hubungan != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahHubungan',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        toastr["success"](data);
                        dataTable8.ajax.reload();
                        $('#tambah_hubungan')[0].reset();
                        $('#id_hubungan').val('');
                        $('#action7').val('tambah');
                    }
                });
            }
        });

        // Edit Hubungan
        $(document).on('click', '.edit_hubungan', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/editHubungan',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_hubungan').val(id);
                    $('#action7').val('edit');
                    $('#ket_hubungan').val(data.ket_hubungan);
                    $('#status_hubungan').val(data.status_hubungan);
                }
            });
        });


        // PROFESI----------------------------------
        // ------------------------------------------
        $(document).on('click', '#clear9', function() {
            $('#tambah_profesi')[0].reset();
        });
        // Datatables Profesi
        dataTable9 = $('#tabel_profesi').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelProfesi",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0, 3]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_profesi', function(event) {
            event.preventDefault();
            var ket_profesi = $('#ket_profesi').val();
            var error_ket_profesi = $('#error_ket_profesi').val();

            if ($('#ket_profesi').val() == '') {
                error_ket_profesi = 'Nama ket_profesi tidak boleh kosong';
                $('#error_ket_profesi').text(error_ket_profesi);
                ket_profesi = '';
            } else {
                error_ket_profesi = '';
                $('#error_ket_profesi').text(error_ket_profesi);
                ket_profesi = $('#ket_profesi').val();
            }


            if (error_ket_profesi != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahProfesi',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        toastr["success"](data);
                        dataTable9.ajax.reload();
                        $('#tambah_profesi')[0].reset();
                        $('#id_profesi').val('');
                        $('#action8').val('tambah');
                    }
                });
            }
        });

        // Edit Profesi
        $(document).on('click', '.edit_profesi', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/editProfesi',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_profesi').val(id);
                    $('#action8').val('edit');
                    $('#ket_profesi').val(data.ket_profesi);
                    $('#status_profesi').val(data.status_profesi);
                }
            });
        });



        // WISMA-------------------------------------
        // ------------------------------------------
        $(document).on('click', '#clear10', function() {
            $('#tambah_wisma')[0].reset();
        });
        // Datatables Wisma
        dataTable10 = $('#tabel_wisma').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelWisma",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0, 3]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_wisma', function(event) {
            event.preventDefault();
            var nama_wisma = $('#nama_wisma').val();
            var error_nama_wisma = $('#error_nama_wisma').val();

            if ($('#nama_wisma').val() == '') {
                error_nama_wisma = 'Nama nama_wisma tidak boleh kosong';
                $('#error_nama_wisma').text(error_nama_wisma);
                nama_wisma = '';
            } else {
                error_nama_wisma = '';
                $('#error_nama_wisma').text(error_nama_wisma);
                nama_wisma = $('#nama_wisma').val();
            }


            if (error_nama_wisma != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahWisma',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        toastr["success"](data);
                        dataTable10.ajax.reload();
                        $('#tambah_wisma')[0].reset();
                        $('#id_wisma').val('');
                        $('#action9').val('tambah');
                    }
                });
            }
        });

        // Edit Wisma
        $(document).on('click', '.edit_wisma', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/editWisma',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_wisma').val(id);
                    $('#action9').val('edit');
                    $('#nama_wisma').val(data.nama_wisma);
                    $('#status_wisma').val(data.status_wisma);
                }
            });
        });



        // KELAS KAMAR RAWATAN-----------------------
        // ------------------------------------------
        $(document).on('click', '#clear11', function() {
            $('#tambah_kelas')[0].reset();
        });
        // Datatables Wisma
        dataTable11 = $('#tabel_kelas').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelKelas",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0, 3]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_kelas', function(event) {
            event.preventDefault();
            var nama_kelas = $('#nama_kelas').val();
            var kode_kelas = $('#kode_kelas').val();
            var error_kode_kelas = $('#error_kode_kelas').val();
            var error_nama_kelas = $('#error_nama_kelas').val();

            if ($('#nama_kelas').val() == '') {
                error_nama_kelas = 'Nama nama_kelas tidak boleh kosong';
                $('#error_nama_kelas').text(error_nama_kelas);
                nama_kelas = '';
            } else {
                error_nama_kelas = '';
                $('#error_nama_kelas').text(error_nama_kelas);
                nama_kelas = $('#nama_kelas').val();
            }
            if ($('#kode_kelas').val() == '') {
                error_kode_kelas = 'Kode Kelas tidak boleh kosong';
                $('#error_kode_kelas').text(error_kode_kelas);
                kode_kelas = '';
            } else {
                error_kode_kelas = '';
                $('#error_kode_kelas').text(error_kode_kelas);
                kode_kelas = $('#kode_kelas').val();
            }


            if (error_nama_kelas != '' || error_kode_kelas != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahKelas',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        toastr["success"](data);
                        dataTable11.ajax.reload();
                        $('#tambah_kelas')[0].reset();
                        $('#id_kelas').val('');
                        $('#action10').val('tambah');
                    }
                });
            }
        });

        $(document).on('click', '.edit_kelas', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/editKelas',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_kelas').val(id);
                    $('#action10').val('edit');
                    $('#nama_kelas').val(data.nama_kelas);
                    $('#kode_kelas').val(data.kode_kelas);
                    $('#status_kelas').val(data.status_kelas);
                }
            });
        });















        // PENJAMIN----------------------------------
        // ------------------------------------------
        $(document).on('click', '#clear12', function() {
            $('#tambah_penjamin')[0].reset();
        });
        // Datatables Penjamin
        dataTable12 = $('#tabel_penjamin').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelPenjamin",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_penjamin', function(event) {
            event.preventDefault();
            var nama_penjamin = $('#nama_penjamin').val();
            var kode_penjamin = $('#kode_penjamin').val();
            var error_nama_penjamin = $('#error_nama_penjamin').val();
            var error_kode_penjamin = $('#error_kode_penjamin').val();

            if ($('#nama_penjamin').val() == '') {
                error_nama_penjamin = 'Nama Penjamin tidak boleh kosong';
                $('#error_nama_penjamin').text(error_nama_penjamin);
                nama_penjamin = '';
            } else {
                error_nama_penjamin = '';
                $('#error_nama_penjamin').text(error_nama_penjamin);
                nama_penjamin = $('#nama_penjamin').val();
            }
            if ($('#kode_penjamin').val() == '') {
                error_kode_penjamin = 'Kode Penjamin tidak boleh kosong';
                $('#error_kode_penjamin').text(error_kode_penjamin);
                kode_penjamin = '';
            } else {
                error_kode_penjamin = '';
                $('#error_kode_penjamin').text(error_kode_penjamin);
                kode_penjamin = $('#kode_penjamin').val();
            }


            if (error_nama_penjamin != '' || error_kode_penjamin != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahPenjamin',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        toastr["success"](data);
                        dataTable12.ajax.reload();
                        $('#tambah_penjamin')[0].reset();
                        $('#id_penjamin').val('');
                        $('#action11').val('tambah');
                    }
                });
            }
        });

        // Edit Penjamin
        $(document).on('click', '.edit_penjamin', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/editPenjamin',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_penjamin').val(id);
                    $('#action11').val('edit');
                    $('#nama_penjamin').val(data.nama_penjamin);
                    $('#kode_penjamin').val(data.kode_penjamin);
                    $('#status_penjamin').val(data.status_penjamin);
                }
            });
        });












        // SATUAN LAB--------------------------------
        // ------------------------------------------
        $(document).on('click', '#clear13', function() {
            $('#tambah_satuan_labor')[0].reset();
        });
        // Datatables Satuan Labor
        dataTable13 = $('#tabel_satuan_labor').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelSatuanLabor",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_satuan_labor', function(event) {
            event.preventDefault();
            var nama_satuan_labor = $('#nama_satuan_labor').val();
            var error_nama_satuan_labor = $('#error_nama_satuan_labor').val();

            if ($('#nama_satuan_labor').val() == '') {
                error_nama_satuan_labor = 'Nama Penjamin tidak boleh kosong';
                $('#error_nama_satuan_labor').text(error_nama_satuan_labor);
                nama_satuan_labor = '';
            } else {
                error_nama_satuan_labor = '';
                $('#error_nama_satuan_labor').text(error_nama_satuan_labor);
                nama_satuan_labor = $('#nama_satuan_labor').val();
            }

            if (error_nama_satuan_labor != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahSatuanLabor',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#tambah_satuan_labor')[0].reset();
                        $('#id_satuan_labor').val('');
                        $('#action13').val('tambah');
                        toastr["success"](data);
                        dataTable13.ajax.reload();
                    }
                });
            }
        });

        // Edit Satuan Labor
        $(document).on('click', '.edit_satuan_labor', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/editSatuanLabor',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_satuan_labor').val(id);
                    $('#action13').val('edit');
                    $('#nama_satuan_labor').val(data.nama_satuan_labor);
                    $('#status_satuan_labor').val(data.status_satuan_labor);
                }
            });
        });












        // GRUP TINDAKAN LABOR-----------------------
        // ------------------------------------------
        $(document).on('click', '#clear14', function() {
            $('#tambah_grup_labor')[0].reset();
        });
        // Datatables Grup Labor
        dataTable14 = $('#tabel_kategori_tindakan_labor').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelGrupLabor",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_grup_labor', function(event) {
            event.preventDefault();
            var nama_kategori_tindakan_labor = $('#nama_kategori_tindakan_labor').val();
            var error_nama_kategori_tindakan_labor = $('#error_nama_kategori_tindakan_labor').val();

            if ($('#nama_kategori_tindakan_labor').val() == '') {
                error_nama_kategori_tindakan_labor = 'Nama Penjamin tidak boleh kosong';
                $('#error_nama_kategori_tindakan_labor').text(error_nama_kategori_tindakan_labor);
                nama_kategori_tindakan_labor = '';
            } else {
                error_nama_kategori_tindakan_labor = '';
                $('#error_nama_kategori_tindakan_labor').text(error_nama_kategori_tindakan_labor);
                nama_kategori_tindakan_labor = $('#nama_kategori_tindakan_labor').val();
            }

            if (error_nama_kategori_tindakan_labor != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahGrupLabor',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#tambah_grup_labor')[0].reset();
                        $('#id_grup_labor').val('');
                        $('#action14').val('tambah');
                        toastr["success"](data);
                        dataTable14.ajax.reload();
                    }
                });
            }
        });

        // Edit Grup Labor
        $(document).on('click', '.edit_grup_labor', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/editGrupLabor',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_grup_labor').val(id);
                    $('#action14').val('edit');
                    $('#nama_kategori_tindakan_labor').val(data.nama_kategori_tindakan_labor);
                    $('#status_kategori_tindakan_labor').val(data.status_kategori_tindakan_labor);
                }
            });
        });





        // BAHAN RADIOLOGI---------------------------
        // ------------------------------------------
        $(document).on('click', '#clear15', function() {
            $('#tambah_bahan_radiologi')[0].reset();
        });
        // Datatables Grup Labor
        dataTable15 = $('#tabel_bahan_radiologi').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelBahanRadiologi",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_bahan_radiologi', function(event) {
            event.preventDefault();
            var nama_bahan_radiologi = $('#nama_bahan_radiologi').val();
            var error_nama_bahan_radiologi = $('#error_nama_bahan_radiologi').val();

            if ($('#nama_bahan_radiologi').val() == '') {
                error_nama_bahan_radiologi = 'Nama Penjamin tidak boleh kosong';
                $('#error_nama_bahan_radiologi').text(error_nama_bahan_radiologi);
                nama_bahan_radiologi = '';
            } else {
                error_nama_bahan_radiologi = '';
                $('#error_nama_bahan_radiologi').text(error_nama_bahan_radiologi);
                nama_bahan_radiologi = $('#nama_bahan_radiologi').val();
            }

            if (error_nama_bahan_radiologi != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahBahanRadiologi',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#tambah_bahan_radiologi')[0].reset();
                        $('#id_bahan_radiologi').val('');
                        $('#action15').val('tambah');
                        toastr["success"](data);
                        dataTable15.ajax.reload();
                    }
                });
            }
        });

        // Edit Bahan Radiologi
        $(document).on('click', '.edit_bahan_radiologi', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/editBahanRadiologi',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_bahan_radiologi').val(id);
                    $('#action15').val('edit');
                    $('#nama_bahan_radiologi').val(data.nama_bahan_radiologi);
                    $('#status_bahan_radiologi').val(data.status_bahan_radiologi);
                }
            });
        });
    });
</script>