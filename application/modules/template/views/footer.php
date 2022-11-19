<footer class="footer pt-0">
    <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
                <span>&copy; besignlabs <?= date('Y'); ?>
            </div>
        </div>
        <!-- <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                    <a href="https://rsjhbsaanin.sumbarprov.go.id/" class="nav-link" target="_blank"><i class="ni ni-world mr-1"></i>Website</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('user/about'); ?>" class="nav-link" target="_blank">About Us</a>
                </li>

            </ul>
        </div> -->
    </div>
</footer>
</div>



<!-- Footer -->


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin untuk keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Keluar" jika anda yakin.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- Argon Scripts -->
<!-- Core -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/js-cookie/js.cookie.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="<?php echo base_url(); ?>assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/chart.js/dist/Chart.extension.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
<!-- Datatables JS -->
<script src="<?php echo base_url(); ?>assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
<!-- SweetAlert2 JS -->
<script src="<?php echo base_url(); ?>assets/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>
<!-- Argon JS -->
<script src="<?php echo base_url(); ?>assets/js/argon.js?v=1.1.0"></script>
<!-- Demo JS - remove this in your project -->
<script src="<?php echo base_url(); ?>assets/js/demo.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/dist/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/dist/plugins/daterangepicker/daterangepicker.js"></script>
<!-- selectpicker -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>assets/dist/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url(); ?>assets/dist/plugins/toastr/toastr.min.js"></script>
<!-- Datetimepicker -->
<script src="<?= base_url(); ?>assets/dist/js/jquery.datetimepicker.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/dist/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="<?= base_url(); ?>assets/js/fontawesome.all.min.js"></script>





<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('HH:MM', {
        'placeholder': 'hh:mm'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()


    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });

    });
</script>

</body>

</html>