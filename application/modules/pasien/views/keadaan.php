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
                <button type="button" id="simpan_keadaan" class="btn btn-sm btn-primary">Simpan</button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form>
              <h6 class="heading-small text-muted mb-4">Data Keadaaan Pasien</h6>
              <div class="pl-4">
                <div class="row">
                  <div class="col-lg-6 col-12">
                    <div class="form-group">
                      <label class="form-control-label" for="keadaan_pasien_e">E</label>
                      <select class="custom-select" id="keadaan_pasien_e" name="keadaan_pasien_e">
                        <option value="4">Pasien membuka mata spontan</option>
                        <option value="3">Jika pasien tidak bangun, berikan perintah kepada pasien seperti :buka mata anda</option>
                        <option value="2">Jika tidak berespon terhadap rangsangan verbal, kaji respon dengan rangsang </option>
                        <option value="1">Tidak ada respon </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6 col-12">
                    <div class="form-group">
                      <label class="form-control-label" for="keadaan_pasien_v">V</label>
                      <select class="custom-select" id="keadaan_pasien_v" name="keadaan_pasien_v">
                        <option value="5">Pasien menjawab pertanyaan dengan benar</option>
                        <option value="4">Pasien bingung, tidak menjawab dengan benar</option>
                        <option value="3">Pasien merespon dengan kata-kata tunggal</option>
                        <option value="2">Pasien merespon dengan suara mengerang saja </option>
                        <option value="1">Tidak ada respon </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-12">
                    <div class="form-group">
                      <label class="form-control-label" for="keadaan_pasien_m">M</label>
                      <select class="custom-select" id="keadaan_pasien_m" name="keadaan_pasien_m">
                        <option value="6">Pasien mengikuti perintah dengan benar</option>
                        <option value="5">Pasien mampu melokalisasi nyeri</option>
                        <option value="4">Pasien gagal melokalisasi nyeri</option>
                        <option value="3">Respon pasien fleksi abnormal</option>
                        <option value="2">Respon pasien ekstensi abnormal </option>
                        <option value="1">Tidak ada respon </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6 col-12">
                    <div class="form-group">
                      <label class="form-control-label" for="kesadaran">Kesadaran</label>
                      <select class="custom-select" id="kesadaran" name="kesadaran">
                        <option value="1">COMPOS MENTIS</option>
                        <option value="2">APATIS</option>
                        <option value="3">SOMNOLENT</option>
                        <option value="4">STUPOR</option>
                        <option value="5">COMA</option>
                      </select>
                    </div>
                    <!-- <div class="col-lg-6 col-12">
                    <div class="form-group">
                      <label class="form-control-label" for="keadaan_pasien_gjs">GCS</label>
                      <input type="number" class="form-control" id="keadaan_pasien_gjs" name="keadaan_pasien_gjs" placeholder="Rentang 3 s.d 15" autocomplete="off">
                    </div>
                  </div> -->
                  </div>
                  <div class="row">

                  </div>

                </div>

              </div>
              <!-- <hr class="my-4" /> -->
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card shadow-sm">
          <div class="card-header">
            <h3 class="card-title">Data Keadaan Pasien</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="tabel_aktivitas" class="table table-hover table-sm display">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>No.</th>
                    <th>Waktu</th>
                    <th>Keadaan</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
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


        // DataTable
        var dataTable = $('#tabel_aktivitas').DataTable({
          "serverSide": true,
          "responsive": true,
          "pageLength": 25,
          "order": [],
          "ajax": {
            "url": "<?php echo base_url(); ?>pasien/tabelkeadaan",
            "type": "POST",
            "data": function(data) {
              data.id_rawatan = '<?= $rawatan['id'] ?>'
            },
          },
          columnDefs: [{
            orderable: false,
            targets: [0, 1, 2, 3]
          }],
          autoWidth: !1,
          language: {
            search: "Cari",
            paginate: {
              "next": "<i class='ni ni-bold-right text-primary'></i>",
              "previous": "<i class='ni ni-bold-left text-primary'></i>"
            }
          },
        });

        // Edit Pegawai
        $('#simpan_keadaan').on('click', function() {
          var id_pasien = '<?= $pasien['id'] ?>'
          var id_rawatan = '<?= $rawatan['id'] ?>'
          var keadaan_pasien_e = $('#keadaan_pasien_e').val()
          var keadaan_pasien_v = $('#keadaan_pasien_v').val()
          var keadaan_pasien_m = $('#keadaan_pasien_m').val()
          var text_keadaan_pasien_e = $('#keadaan_pasien_e option:selected').text()
          var text_keadaan_pasien_v = $('#keadaan_pasien_v option:selected').text()
          var text_keadaan_pasien_m = $('#keadaan_pasien_m option:selected').text()
          // var keadaan_pasien_gjs = $('#keadaan_pasien_gjs').val()
          var kesadaran = $('#kesadaran').val()
          var text_kesadaran = $('#kesadaran option:selected').text()
          var status = '1';

          if (id_pasien == '' || id_rawatan == '' || keadaan_pasien_e == '' || keadaan_pasien_v == '' || keadaan_pasien_m == '' || kesadaran == '') {
            console.log('data belum lengkap');
            Swal.fire({
              icon: 'error',
              title: 'Data belum lengkap!',
              text: 'Mohon lengkapi data terlebih dahulu',
            });
          } else {
            $.ajax({
              url: '<?php echo base_url(); ?>pasien/simpankeadaan',
              method: 'POST',
              dataType: 'JSON',
              data: {
                id_pasien: id_pasien,
                id_rawatan: id_rawatan,
                keadaan_pasien_e: keadaan_pasien_e,
                keadaan_pasien_v: keadaan_pasien_v,
                keadaan_pasien_m: keadaan_pasien_m,
                text_keadaan_pasien_e: text_keadaan_pasien_e,
                text_keadaan_pasien_v: text_keadaan_pasien_v,
                text_keadaan_pasien_m: text_keadaan_pasien_m,
                // keadaan_pasien_gjs: keadaan_pasien_gjs,
                kesadaran: kesadaran,
                text_kesadaran: text_kesadaran,
              },
              success: function(data) {
                console.log(data);
                Swal.fire({
                  icon: 'success',
                  title: 'Data berhasil disimpan',
                  showConfirmButton: false,
                  timer: 1500
                })
                dataTable.ajax.reload();
                // window.location.href = "<?php base_url(); ?>pasien/pasienterdaftar";
              }
            });
          }

        });

        $(document).on('click', '.delete', function() {
          var id = $(this).attr('id');
          var notransaksi = $(this).attr('notransaksi');
          var status = 99;
          Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Hapus data ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, Saya Yakin'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: '<?php echo base_url(); ?>pasien/hapuskeadaan',
                method: 'POST',
                data: {
                  id: id,
                  status: status,
                  notransaksi: notransaksi
                },
                success: function(data) {
                  Swal.fire({
                    icon: 'success',
                    title: 'Data Berhasil Dihapus',
                    showConfirmButton: false,
                    timer: 2000
                  })
                  dataTable.ajax.reload();
                }
              });
            }
          })
        });
      });
    </script>