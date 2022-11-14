  <!-- Header -->
  <div class="header bg-gradient-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0"><?= $title; ?></h6>
          </div>
          <!-- <div class="col-lg-6 col-5 text-right">
            <a href="<?php echo base_url(); ?>blog" class="tambah_blog btn btn-sm btn-neutral">Kembali</a>
          </div> -->
        </div>
        <!-- Card stats -->
        <div class="row">
          <?php
          $birthDate = new DateTime($pasien['tanggal_lahir']);
          $today = new DateTime("today");
          if ($birthDate > $today) {
            exit("0 tahun 0 bulan 0 hari");
          }
          $y = $today->diff($birthDate)->y;
          $m = $today->diff($birthDate)->m;
          $d = $today->diff($birthDate)->d;
          if ($pasien['jenis_kelamin'] == 1) {
            $jk = 'Laki-laki';
          } else {
            $jk = 'Perempuan';
          }
          ?>



        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid mt--6 shadow-sm">
    <div class="row">
      <div class="col">
        <div class="card shadow-sm">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0"><?= $pasien['nama'] ?></h3><span><?= '(' . $jk . ' - ' . $y . ' Tahun ' . $m . ' Bulan ' . $d . ' Hari)' ?></span>
              </div>
              <div class="col-4 text-right">
                <button type="button" id="simpan_rawatan" class="btn btn-sm btn-primary">Simpan</button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form>
              <h6 class="heading-small text-muted mb-4">Data Pasien</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="nama">Diagnosa</label>
                      <input type="text" id="diagnosa_sakit" name="diagnosa_sakit" class="form-control" placeholder="Diagnosa Sakit">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <label class="form-control-label" for="nama">Tanggal Rawatan</label>
                    <input type="text" class="form-control" id="tgl_awal_rawatan" name="tgl_awal_rawatan" placeholder="Pilih Tanggal..." value="<?= date('Y-m-d') ?>" autocomplete="off">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="nama">Alergi</label>
                      <textarea class="form-control" id="alergi" rows="3"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="barthel_index_score">Barthel Index Score</label>
                      <input type="text" class="form-control" id="barthel_index_score" name="barthel_index_score" placeholder="Total Skor" autocomplete="off">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Waktu</label>
                      <input type="text" class="form-control" id="barthel_index_score_date" name="barthel_index_score_date" placeholder="Pilih Tanggal..." value="<?= date('Y-m-d') ?>" autocomplete="off">
                    </div>
                  </div>
                </div>

              </div>
              <!-- <hr class="my-4" /> -->
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Create User -->
    <div class="modal fade" id="modal_tambah_blog" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title text-primary"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!-- <form method="post" id="tambah_user">
                      <div class="modal-body">
                          <input type="hidden" name="pegawai_id" id="pegawai_id">
                          <input type="hidden" id="id_user" name="id_user">
                          <input type="hidden" name="action_modal" id="action_modal" value="edit">
                          <input type="hidden" name="nama_akun" id="nama_akun">
                          <div class="form-group">
                              <label for="judul">Judul</label>
                              <input type="text" class="form-control rounded-0" id="judul" name="judul" placeholder="Judul">
                          </div>
                          <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" class="form-control rounded-0" id="password" name="password" placeholder="Password">
                          </div>
                          <div class="form-group">
                              <label for="password2">Ulangi Password</label>
                              <input type="password" class="form-control rounded-0" id="password2" name="password2" placeholder="Ulangi Password">
                          </div>
                          <div class="form-group">
                              <label for="role_id">Role</label>
                              <select class="custom-select rounded-0" id="role_id" name="role_id"></select>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </form> -->
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $('#tanggal_lahir').datetimepicker({
          timepicker: false,
          datepicker: true,
          scrollInput: false,
          theme: 'success',
          format: 'Y-m-d',
          maxDate: '+2y',
        });
        $('#loading').hide();
        //   $("#deskripsi").summernote('code', '');
        $('#description').summernote({
          toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
          ],
        });

        $.ajax({
          url: "<?php echo base_url(); ?>blog/getAllCreators",
          method: "POST",
          dataType: 'JSON',
          success: function(data) {
            console.log(data);
            var html = '';
            var i;
            html += '<option selected value="0">Pilih Kreator</option>';
            for (i = 0; i < data.length; i++) {
              html += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
            }
            $('#creator').html(html);
            $('#creator').selectpicker('refresh');
          }
        });
        // DataTable
        var dataTable = $('#tabel_blog').DataTable({
          "serverSide": true,
          "responsive": true,
          "pageLength": 25,
          "order": [],
          "ajax": {
            "url": "<?php echo base_url(); ?>blog/tabelblog",
            "type": "POST",
          },
          columnDefs: [{
            orderable: false,
            targets: [0, 2, 5]
          }],
          autoWidth: !1,
          language: {
            search: "Cari"
          },
        });

        // Edit Pegawai
        $('#simpan_rawatan').on('click', function() {
          var id_pasien = '<?= $pasien['id'] ?>'
          var tgl_awal_rawatan = $('#tgl_awal_rawatan').val()
          var diagnosa_sakit = $('#diagnosa_sakit').val()
          var alergi = $('#alergi').val()
          var barthel_index_score = $('#barthel_index_score').val()
          var barthel_index_score_date = $('#barthel_index_score_date').val()
          var status = '1';

          if (id_pasien == '' || tgl_awal_rawatan == '' || diagnosa_sakit == '' || alergi == '') {
            console.log('data belum lengkap');
            Swal.fire({
              icon: 'error',
              title: 'Data belum lengkap!',
              text: 'Mohon lengkapi data terlebih dahulu',
            });
          } else {
            $.ajax({
              url: '<?php echo base_url(); ?>pasien/simpanrawatan',
              method: 'POST',
              dataType: 'JSON',
              data: {
                id_pasien: id_pasien,
                tgl_awal_rawatan: tgl_awal_rawatan,
                diagnosa_sakit: diagnosa_sakit,
                alergi: alergi,
                barthel_index_score: barthel_index_score,
                barthel_index_score_date: barthel_index_score_date,
                status: status,
              },
              success: function(data) {
                console.log(data);
                Swal.fire({
                  icon: 'success',
                  title: 'Data berhasil disimpan',
                  showConfirmButton: false,
                  timer: 1500
                })
                // window.location.href = "<?php base_url(); ?>pasien/pasienterdaftar";
              }
            });
          }

        });
      });
    </script>