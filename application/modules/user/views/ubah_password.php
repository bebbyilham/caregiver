<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="text-bold"><i class="fas fa-key mr-2"></i><?= $title; ?></h3>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card shadow card-olive">
                <div class="card-header">
                    <h3 class="card-title">Form Ubah Password</h3>
                </div>
                <form method="post" id="ubah_profil">
                    <input type="hidden" id="id_submenu" name="id_submenu">
                    <input type="hidden" id="action" name="action" value="tambah">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="new_password1">Username</label>
                            <input type="text" class="form-control rounded-0" id="new_password1" name="new_password1" value="<?= $user['username']; ?>" readonly>
                            <small><span class="text-danger" id="error_new_password1"></span></small>
                        </div>
                        <div class="form-group">
                            <label for="current_password">Password Lama</label>
                            <input type="password" class="form-control rounded-0" id="current_password" name="current_password">
                            <small><span class="text-danger" id="error_current_password"></span></small>
                        </div>
                        <div class="form-group">
                            <label for="current_password">Password Baru</label>
                            <input type="password" class="form-control rounded-0" id="new_password1" name="new_password1">
                            <small><span class="text-danger" id="error_new_password1"></span></small>
                        </div>
                        <div class="form-group">
                            <label for="current_password">Konfirmasi Password</label>
                            <input type="password" class="form-control rounded-0" id="new_password2" name="new_password2">
                            <small><span class="text-danger" id="error_new_password2"></span></small>
                        </div>
                        <button type="submit" class="btn btn-primary float-right" id="action">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {

        // Datatables menu
        dataTable = $('#tabel_submenu').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelSubmenu",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0, 4, 6]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#ubah_profil', function(event) {
            event.preventDefault();
            var current_password = $('#current_password').val();
            var new_password1 = $('#new_password1').val();
            var new_password2 = $('#new_password2').val();
            var error_current_password = $('#error_current_password').val();
            var error_new_password1 = $('#error_new_password1').val();
            var error_new_password2 = $('#error_new_password2').val();

            if ($('#current_password').val() == 'Pilih Menu') {
                error_current_password = 'Pilih Menu terlebih dahulu!';
                $('#error_current_password').text(error_current_password);
                current_password = '';
            } else {
                error_current_password = '';
                $('#error_current_password').text(error_current_password);
                current_password = $('#current_password').val();
            }

            if ($('#new_password1').val() == '') {
                error_new_password1 = 'new_password1 tidak boleh kosong!';
                $('#error_new_password1').text(error_new_password1);
                new_password1 = '';
            } else {
                error_new_password1 = '';
                $('#error_new_password1').text(error_new_password1);
                new_password1 = $('#new_password1').val();
            }

            if ($('#new_password2').val() == '') {
                error_new_password2 = 'new_password2 tidak boleh kosong!';
                $('#error_new_password2').text(error_new_password2);
                new_password2 = '';
            } else {
                error_new_password2 = '';
                $('#error_new_password2').text(error_new_password2);
                new_password2 = $('#new_password2').val();
            }

            if (error_current_password != '' || error_new_password1 != '' || error_new_password2 != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>user/simpanPassword',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert(data)
                    }
                });
            }
        });

    });
</script>