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
                            <h3 class="card-title">Tambah Sub Menu</h3>
                        </div>
                        <form method="post" id="tambah_submenu">
                            <input type="hidden" id="id_submenu" name="id_submenu">
                            <input type="hidden" id="action" name="action" value="tambah">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="menu_id">Menu</label>
                                    <select class="custom-select rounded-0" id="menu_id" name="menu_id">
                                        <option selected>Pilih Menu</option>
                                        <?php foreach ($menu as $row) {
                                            echo '<option value="' . $row['id'] . '">' . $row['deskripsi'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <small><span class="text-danger" id="error_menu_id"></span></small>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control rounded-0" id="title" name="title" placeholder="Masukkan Sub Menu...">
                                    <small><span class="text-danger" id="error_title"></span></small>
                                </div>
                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input type="text" class="form-control rounded-0" id="url" name="url" placeholder="Masukkan URL...">
                                    <small><span class="text-danger" id="error_url"></span></small>
                                </div>
                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <input type="text" class="form-control rounded-0" id="icon" name="icon" placeholder="Masukkan Icon...">
                                    <small><span class="text-danger" id="error_icon"></span></small>
                                </div>
                                <div class="form-group">
                                    <label for="is_active">Status</label>
                                    <select class="custom-select rounded-0" id="is_active" name="is_active">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="action">Submit</button>
                                <button type="button" class="btn btn-success" id="clear">Clear</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Sub Menu</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabel_submenu" class="table table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Sub Menu</th>
                                            <th>Menu</th>
                                            <th>URL</th>
                                            <th>Icon</th>
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

<script>
    $(document).ready(function() {
        function Clear() {
            $('#tambah_submenu')[0].reset();
            $('#id_submenu').val('');
            $('#action').val('tambah');
        }

        $(document).on('click', '#clear', function() {
            Clear();
        });
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

        $(document).on('submit', '#tambah_submenu', function(event) {
            event.preventDefault();
            var menu_id = $('#menu_id').val();
            var title = $('#title').val();
            var url = $('#url').val();
            var icon = $('#icon').val();
            var is_active = $('#is_active').val();
            var error_menu_id = $('#error_menu_id').val();
            var error_title = $('#error_title').val();
            var error_url = $('#error_url').val();
            var error_icon = $('#error_icon').val();

            if ($('#menu_id').val() == 'Pilih Menu') {
                error_menu_id = 'Pilih Menu terlebih dahulu!';
                $('#error_menu_id').text(error_menu_id);
                menu_id = '';
            } else {
                error_menu_id = '';
                $('#error_menu_id').text(error_menu_id);
                menu_id = $('#menu_id').val();
            }

            if ($('#title').val() == '') {
                error_title = 'Title tidak boleh kosong!';
                $('#error_title').text(error_title);
                title = '';
            } else {
                error_title = '';
                $('#error_title').text(error_title);
                title = $('#title').val();
            }

            if ($('#url').val() == '') {
                error_url = 'URL tidak boleh kosong!';
                $('#error_url').text(error_url);
                url = '';
            } else {
                error_url = '';
                $('#error_url').text(error_url);
                url = $('#url').val();
            }

            if ($('#icon').val() == '') {
                error_icon = 'Icon tidak boleh kosong!';
                $('#error_icon').text(error_icon);
                icon = '';
            } else {
                error_icon = '';
                $('#error_icon').text(error_icon);
                icon = $('#icon').val();
            }

            if (error_menu_id != '' || error_title != '' || error_url != '' || error_icon != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahSubmenu',
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

        // Edit menu
        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/editSubmenu',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_submenu').val(id);
                    $('#action').val('edit');
                    $('#menu_id').val(data.menu_id);
                    $('#title').val(data.title);
                    $('#url').val(data.url);
                    $('#icon').val(data.icon);
                    $('#is_active').val(data.is_active);
                }
            });
        });

        $(document).on('click', '.delete', function() {
            var id = $(this).attr('id');

            if (confirm("Hapus Menu ini?")) {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/deleteSubmenu',
                    method: 'POST',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        dataTable.ajax.reload();
                        Clear();
                        toastr["success"](data);
                    }
                });
            }
        });
    });
</script>