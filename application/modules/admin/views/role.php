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
                            <h3 class="card-title">Tambah Role</h3>
                        </div>
                        <form method="post" id="tambah_role">
                            <input type="hidden" id="id_role" name="id_role">
                            <input type="hidden" id="action" name="action" value="tambah">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <input type="text" class="form-control rounded-0" id="role" name="role" placeholder="Masukkan Role...">
                                    <small><span class="text-danger" id="error_role"></span></small>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="action">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Role</h3>
                        </div>
                        <div class="card-body">
                            <table id="tabel_role" class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No.</th>
                                        <th style="width: 75%">Role</th>
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
        // Datatables Role
        dataTable = $('#tabel_role').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url(); ?>admin/tabelRole",
                "type": "POST",
            },
            columnDefs: [{
                orderable: !1,
                targets: [0, 2]
            }],
            autoWidth: !1
        });

        $(document).on('submit', '#tambah_role', function(event) {
            event.preventDefault();
            var role = $('#role').val();           
            var error_role = $('#error_role').val();
            
            if ($('#role').val() == '') {
                error_role = 'Role tidak boleh kosong';
                $('#error_role').text(error_role);
                role = '';
            } else {
                error_role = '';
                $('#error_role').text(error_role);
                role = $('#role').val();
            }

            
        if (error_role != '' ) {
            toastr["error"]("Data belum lengkap");
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/tambahRole',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        dataTable.ajax.reload();
                        $('#tambah_role')[0].reset();
                        $('#id_role').val('');
                        $('#action').val('tambah');
                        toastr["success"](data);
                    }
                });
            }
        });

        // Access Role
		$(document).on('click', '.access', function() {
			var id = $(this).attr('id');

			document.location.href = "<?= base_url('admin/roleAccess/'); ?>" + id;
		});

        // Edit Role
        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');

            $.ajax({
				url: '<?php echo base_url(); ?>admin/editRole',
				method: 'POST',
				data: {
					id: id
				},
				dataType: 'JSON',
				success: function(data) {					
					$('#id_role').val(id);
					$('#action').val('edit');
                    $('#role').val(data.role);
				}
			});
        });

        $(document).on('click', '.delete', function() {
			var id = $(this).attr('id');

			if (confirm("Hapus Role ini?")) {
				$.ajax({
					url: '<?php echo base_url(); ?>admin/deleteRole',
					method: 'POST',
					data: {
						id: id
					},
					success: function(data) {
                        dataTable.ajax.reload();
                        $('#tambah_role')[0].reset();
						toastr["success"](data);
					}
				});
			}
		});
    });
</script>