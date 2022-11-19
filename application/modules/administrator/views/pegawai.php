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
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Pegawai</h3>
                        </div>
                        <form method="post" id="tambah_pegawai">
                            <input type="hidden" id="id_pegawai" name="id_pegawai">
                            <input type="hidden" id="action" name="action" value="tambah">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_pegawai">Nama <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control rounded-0" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Tanpa Gelar">
                                    <small><span class="text-danger" id="error_nama_pegawai"></span></small>
                                </div>
                                <div class="form-group">
                                    <label for="gelar_depan">Gelar Depan</label>
                                    <input type="text" class="form-control rounded-0" id="gelar_depan" name="gelar_depan" placeholder="Gelar Depan">
                                </div>
                                <div class="form-group">
                                    <label for="gelar_belakang">Gelar Belakang</label>
                                    <input type="text" class="form-control rounded-0" id="gelar_belakang" name="gelar_belakang" placeholder="Gelar Belakang">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" class="form-control rounded-0" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" autocomplete="off">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <span class="fa fa-calendar-alt"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin </label>
                                    <select class="custom-select rounded-0" id="jenis_kelamin" name="jenis_kelamin">
                                        <option selected>Pilih Jenis Kelamin</option>
                                        <option value="1">Laki-laki</option>
                                        <option value="0">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="profesi">Profesi</label>
                                    <select class="custom-select rounded-0" id="profesi" name="profesi"></select>
                                    <small><span class="text-danger" id="error_profesi"></span></small>
                                </div>
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control rounded-0" id="nip" name="nip" placeholder="NIP">
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control rounded-0" id="nik" name="nik" placeholder="NIK">
                                </div>
                                <div class="form-group">
                                    <label for="status_pegawai">Status</label>
                                    <select class="custom-select rounded-0" id="status_pegawai" name="status_pegawai">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-success" id="clear">Clear</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Pegawai</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabel_pegawai" class="table table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Profesi</th>
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
        </div>
    </section>
</div>

<!-- Modal Create User -->
<div class="modal fade" id="modal_create_user" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="tambah_user">
                <div class="modal-body">
                    <input type="hidden" name="pegawai_id" id="pegawai_id">
                    <input type="hidden" id="id_user" name="id_user">
                    <input type="hidden" name="action_modal" id="action_modal" value="edit">
                    <input type="hidden" name="nama_akun" id="nama_akun">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control rounded-0" id="username" name="username" placeholder="Username">
                        <small><span class="text-danger" id="error_username"></span></small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control rounded-0" id="password" name="password" placeholder="Password">
                        <small><span class="text-danger" id="error_password"></span></small>
                    </div>
                    <div class="form-group">
                        <label for="password2">Ulangi Password</label>
                        <input type="password" class="form-control rounded-0" id="password2" name="password2" placeholder="Ulangi Password">
                        <small><span class="text-danger" id="error_password2"></span></small>
                    </div>
                    <div class="form-group">
                        <label for="role_id">Role</label>
                        <select class="custom-select rounded-0" id="role_id" name="role_id"></select>
                        <small><span class="text-danger" id="error_role_id"></span></small>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        function Clear() {
            $('#tambah_pegawai')[0].reset();
            $('#id_pegawai').val('');
            $('#action').val('tambah');
            $('#error_nama_pegawai').text('');
            $('#error_profesi').text('');
        }

        $('#tanggal_lahir').datetimepicker({
            timepicker: false,
            datepicker: true,
            scrollInput: false,
            theme: 'success',
            format: 'd-m-Y',
        });

        $(document).on('click', '#clear', function() {
            Clear();
        });

        // Datatables Pegawai
        dataTable = $('#tabel_pegawai').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>administrator/tabelPegawai",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0, 4]
            }],
            autoWidth: !1
        });

        // GET Profesi
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/getProfesi",
            method: "POST",
            async: false,
            dataType: 'JSON',
            success: function(data) {
                var html = '';
                var i;
                html += '<option selected>Pilih Profesi</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i].id_profesi + '">' + data[i].ket_profesi + '</option>';
                }
                $('#profesi').html(html);
            }
        });

        // GET ROLE
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/getRole",
            method: "POST",
            async: false,
            dataType: 'JSON',
            success: function(data) {
                var html = '';
                var i;
                html += '<option selected>Pilih Role</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i].id + '">' + data[i].role + '</option>';
                }
                $('#role_id').html(html);
            }
        });

        // Tambah Pegawai
        $(document).on('submit', '#tambah_pegawai', function(event) {
            event.preventDefault();
            var nama_pegawai = $('#nama_pegawai').val();
            var profesi = $('#profesi').val();
            var error_profesi = $('#error_profesi').val();
            var error_nama_pegawai = $('#error_nama_pegawai').val();

            if ($('#nama_pegawai').val() == '') {
                error_nama_pegawai = 'Nama Pegawai tidak boleh kosong';
                $('#error_nama_pegawai').text(error_nama_pegawai);
                nama_pegawai = '';
            } else {
                error_nama_pegawai = '';
                $('#error_nama_pegawai').text(error_nama_pegawai);
                nama_pegawai = $('#nama_pegawai').val();
            }
            if ($('#profesi').val() == 'Pilih Profesi') {
                error_profesi = 'Pilih Profesi';
                $('#error_profesi').text(error_profesi);
                profesi = '';
            } else {
                error_profesi = '';
                $('#error_profesi').text(error_profesi);
                profesi = $('#profesi').val();
            }

            if (error_nama_pegawai != '' || error_profesi != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>administrator/tambahPegawai',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        dataTable.ajax.reload();
                        Clear();
                        toastr["success"](data);
                    }
                });
            }
        });

        // Edit Pegawai
        $(document).on('click', '.edit_pegawai', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>administrator/editPegawai',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_pegawai').val(id);
                    $('#action').val('edit');
                    $('#nama_pegawai').val(data.nama_pegawai);
                    $('#gelar_depan').val(data.gelar_depan);
                    $('#gelar_belakang').val(data.gelar_belakang);
                    $('#tempat_lahir').val(data.tempat_lahir);
                    $('#tanggal_lahir').val(data.tanggal_lahir);
                    $('#jenis_kelamin').val(data.jenis_kelamin);
                    $('#profesi').val(data.profesi);
                    $('#nip').val(data.nip);
                    $('#nik').val(data.nik);
                    $('#status_pegawai').val(data.status_pegawai);
                }
            });
        });

        // Edit Pegawai
        $(document).on('click', '.create_user', function() {
            var id = $(this).attr('id');
            $('#error_password').text('');
            $('#error_password2').text('');
            $('#tambah_user')[0].reset();
            $.ajax({
                url: '<?php echo base_url(); ?>administrator/fetchSingleUser',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_pegawai').val(id);
                    $('#modal_create_user').modal('show');
                    $('.modal-title').text(data.nama_akun);
                    $('#pegawai_id').val(id);
                    $('#id_user').val(data.id_user);
                    if (data.id_user == null) {
                        $('#action_modal').val('tambah')
                    } else {
                        $('#action_modal').val('edit')
                    }
                    $('#nama_akun').val(data.nama_akun);
                    $('#username').val(data.username);
                    if (data.role_id == null) {
                        $('#role_id').val('Pilih Role');
                    } else {
                        $('#role_id').val(data.role_id);
                    }
                }
            });
        });

        // Tambah User
        $(document).on('submit', '#tambah_user', function(event) {
            event.preventDefault();
            var role_id = $('#role_id').val();
            var username = $('#username').val();
            var password = $('#password').val();
            var password2 = $('#password2').val();
            var error_role_id = $('#error_role_id').val();
            var error_username = $('#error_username').val();
            var error_password = $('#error_password').val();
            var error_password2 = $('#error_password2').val();

            if ($('#role_id').val() == 'Pilih Role') {
                error_role_id = 'Role tidak boleh kosong';
                $('#error_role_id').text(error_role_id);
                role_id = '';
            } else {
                error_role_id = '';
                $('#error_role_id').text(error_role_id);
                role_id = $('#role_id').val();
            }
            if ($('#username').val() == '') {
                error_username = 'Username tidak boleh kosong';
                $('#error_username').text(error_username);
                username = '';
            } else {
                error_username = '';
                $('#error_username').text(error_username);
                username = $('#username').val();
            }
            if ($('#password').val() == '') {
                error_password = 'Password tidak boleh kosong';
                $('#error_password').text(error_password);
                password = '';
            } else {
                error_password = '';
                $('#error_password').text(error_password);
                password = $('#password').val();
            }
            if ($('#password2').val() == '') {
                error_password2 = 'Konfirmasi Password tidak boleh kosong';
                $('#error_password2').text(error_password2);
                password2 = '';
            } else {
                error_password2 = '';
                $('#error_password2').text(error_password2);
                password2 = $('#password2').val();
            }

            if (error_role_id != '' || error_username != '' || error_password != '' || error_password2 != '') {
                toastr["error"]("Data Belum Lengkap!");
            } else if (password != password2) {
                toastr["error"]("Konfirmasi Password tidak sama!");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>administrator/tambahUser',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#tambah_user')[0].reset();
                        $('#modal_create_user').modal('hide');
                        toastr["success"](data);
                    }
                });
            }
        });
    });
</script>