<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row my-2">
                <div class="col-6">
                    <h1 class="text-bold"><i class="fas fa-database mr-2"></i><?= $title; ?></h1>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Master</h3>

                            <p>simrsj_master.sql</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-folder"></i>
                        </div>
                        <a href="<?= base_url('admin/backupDatabaseMaster'); ?>" class="small-box-footer">Backup <i class="fas fa-download"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Aplikasi</h3>

                            <p>simrsj_aplikasi.sql</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-monitor"></i>
                        </div>
                        <a href="<?= base_url('admin/backupDatabaseAplikasi'); ?>" class="small-box-footer">Backup <i class="fas fa-download"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>Webservice</sup></h3>

                            <p>simrsj_webservice,sql</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pull-request"></i>
                        </div>
                        <a href="<?= base_url('admin/backupDatabaseWebservice'); ?>" class="small-box-footer">Backup <i class="fas fa-download"></i></a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>



<script>
    $(document).ready(function() {
        function Clear() {
            $('#form_order_barang')[0].reset();
            $('#tanggal_order_barang').val('');
            $('#error_tanggal_order_barang').text('');
        }

        // Tabel Order Barang
        dataTable = $('#tabel_order_barang').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>depofarmasiranap/tabelOrderBarang",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0, 5]
            }],
            autoWidth: !1
        });

        $('#tanggal_order_barang').datetimepicker({
            timepicker: false,
            datepicker: true,
            scrollInput: false,
            theme: 'success',
            format: 'd-m-Y',
            minDate: '0',
        });

        $('.btn_order_barang').on('click', function() {
            $('#modalOrderBarang').modal('show');
            $('.modal-title').text('Form Order Barang');
            $('#tanggal_order_barang').val('');
            $('#error_tanggal_order_barang').text('');
        });

        $(document).on('submit', '#form_order_barang', function(event) {
            event.preventDefault();
            var tanggal_order_barang = $('#tanggal_order_barang').val();
            var error_tanggal_order_barang = $('#error_tanggal_order_barang').val();

            if ($('#tanggal_order_barang').val() == '') {
                error_tanggal_order_barang = 'Tanggal Faktur tidak boleh kosong!';
                $('#error_tanggal_order_barang').text(error_tanggal_order_barang);
                tanggal_order_barang = '';
            } else {
                error_tanggal_order_barang = '';
                $('#error_tanggal_order_barang').text(error_tanggal_order_barang);
                tanggal_order_barang = $('#tanggal_order_barang').val();
            }

            if (error_tanggal_order_barang != '') {
                toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>depofarmasiranap/tambahOrderBarang',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        dataTable.ajax.reload();
                        Clear();
                        $('#modalOrderBarang').modal('hide');
                        toastr["success"](data);
                    }
                });
            }
        });

        $(document).on('click', '.hapus_faktur', function() {
            var id = $(this).attr('id');

            if (confirm('Apakah Anda Yakin? Hapus Faktur ini?')) {
                $.ajax({
                    url: "<?php echo base_url(); ?>depofarmasiranap/hapusOrderBarang",
                    method: "POST",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        dataTable.ajax.reload();
                        toastr["success"](data);
                    }
                });
            }
        })

        $(document).on('click', '.hapus_list_barang', function() {
            var id = $(this).attr('id');

            if (confirm('Apakah Anda yakin? dengan menghapus data ini, seluruh barang yang telah anda input akan terhapus')) {
                $.ajax({
                    url: "<?php echo base_url(); ?>depofarmasiranap/hapusListBarang",
                    method: "POST",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        dataTable.ajax.reload();
                        toastr["success"](data);
                    }
                });
            }
        })

        $(document).on('click', '.input_barang', function() {
            var id = $(this).attr('id');
            window.location.href = "<?php base_url(); ?>inputBarang/" + id;
        })

        $(document).on('click', '.edit_order', function() {
            var id = $(this).attr('id');

            if (confirm('Anda Yakin? edit order ini?')) {
                $.ajax({
                    url: "<?php echo base_url(); ?>depofarmasiranap/editOrderBarang",
                    method: "POST",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        dataTable.ajax.reload();
                    }
                });
            }
        })

        $(document).on('click', '.kirim_order', function() {
            var id = $(this).attr('id');

            if (confirm('Anda Yakin, pastikan data sudah benar? kirim order ini?')) {
                $.ajax({
                    url: "<?php echo base_url(); ?>depofarmasiranap/kirimOrderBarang",
                    method: "POST",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        dataTable.ajax.reload();
                        toastr['success'](data);
                    }
                });
            }
        })

        $(document).on('click', '.print_order', function() {
            var id = $(this).attr('id');
            window.open('<?= base_url(); ?>cetak/cetakPermintaanBarang/' + id);
        })
    });
</script>