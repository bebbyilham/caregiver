<div class="header bg-gradient-orange pb-6">
    <div class="container-fluid">

    </div>
</div>
<!-- Content Wrapper. Contains page content -->
<div class="container-fluid mt--6">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h6 class="h2 text-white d-inline-block mb-0"><?= $role['role']; ?></h6>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Role Akses</h3>
                        </div>
                        <div class="card-body">
                            <table id="tabel_role" class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">No</th>
                                        <th style="width: 80%;">Menu</th>
                                        <th style="width: 10%;">Access</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($menu as $m) : ?>
                                        <tr>
                                            <td><?= $i; ?> </th>
                                            <td><?= $m['deskripsi']; ?></td>
                                            <td class="text-center">


                                                <label class="css-control css-control-sm css-control-primary css-switch">
                                                    <input type="checkbox" class="css-control-input check" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>
                                    " data-menu=" <?= $m['id']; ?>">
                                                    <span class="css-control-indicator"></span>
                                                </label>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
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
        $('.check').on('click', function() {
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');

            $.ajax({
                url: "<?= base_url('admin/changeaccess'); ?>",
                type: 'POST',
                data: {
                    menuId: menuId,
                    roleId: roleId
                },
                success: function(data) {
                    Swal.fire({
                                       icon: 'success',
                                       title: data,
                                       showConfirmButton: false,
                                       timer: 1500
                                })
                }
            });
        });
    });
</script>