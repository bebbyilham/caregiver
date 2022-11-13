<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="text-bold"><i class="fas fa-briefcase-medical mr-2"></i><?= $title; ?></h3>
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
                            <h3 class="card-title">Tambah Menu</h3>
                        </div>
                        <form method="post" id="tambah_menu">
                            <input type="hidden" id="id_menu" name="id_menu">
                            <input type="hidden" id="action" name="action" value="tambah">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="menu">Menu</label>
                                    <input type="text" class="form-control rounded-0" id="menu" name="menu" placeholder="Masukkan Menu...">
                                    <small><span class="text-danger" id="error_menu"></span></small>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" class="form-control rounded-0" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi...">
                                    <small><span class="text-danger" id="error_deskripsi"></span></small>
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
                            <h3 class="card-title">Tabel Menu</h3>
                        </div>
                        <div class="card-body">
                            <table id="tabel_menu" class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No.</th>
                                        <th style="width: 50%">Menu</th>
                                        <th style="width: 25%">Deskripsi</th>
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

<script>
    $(document).ready(function() {
        function Clear() {
            $('#tambah_menu')[0].reset();
            $('#id_menu').val('');
            $('#action').val('tambah');
        }

        $(document).on('click', '#clear', function() {
            Clear();
        });
        // Datatables menu
        dataTable = $('#tabel_menu').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelMenu",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0, 2]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_menu', function(event) {
            event.preventDefault();
            var menu = $('#menu').val();
            var deskripsi = $('#deskripsi').val();
            var error_menu = $('#error_menu').val();
            var error_deskripsi = $('#error_deskripsi').val();

            if ($('#menu').val() == '') {
                error_menu = 'Menu tidak boleh kosong';
                $('#error_menu').text(error_menu);
                menu = '';
            } else {
                error_menu = '';
                $('#error_menu').text(error_menu);
                menu = $('#menu').val();
            }

            if ($('#deskripsi').val() == '') {
                error_deskripsi = 'Deskripsi tidak boleh kosong';
                $('#error_deskripsi').text(error_deskripsi);
                deskripsi = '';
            } else {
                error_deskripsi = '';
                $('#error_deskripsi').text(error_deskripsi);
                deskripsi = $('#deskripsi').val();
            }


            if (error_menu != '' || error_deskripsi) {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahMenu',
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
                url: '<?php echo base_url(); ?>admin/editMenu',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#id_menu').val(id);
                    $('#action').val('edit');
                    $('#menu').val(data.menu);
                    $('#deskripsi').val(data.deskripsi);
                }
            });
        });

        $(document).on('click', '.delete', function() {
            var id = $(this).attr('id');

            if (confirm("Hapus Menu ini?")) {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/deleteMenu',
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