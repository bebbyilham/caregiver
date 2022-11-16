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
                <button type="button" id="simpan_pemantauan_almed" class="btn btn-sm btn-primary">Simpan</button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form>
              <h6 class="heading-small text-muted mb-4">Data Pemantauan Alat Medik Pasien</h6>
              <div class="pl-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="alat_medik">Alat Medik</label>
                      <select class="custom-select" id="alat_medik" name="alat_medik">
                        <option value="1">KANUL OKSIGEN</option>
                        <option value="2">NGT</option>
                        <option value="3">KATHETER</option>
                        <option value="4">IV LINE</option>
                        <option value="5">LAIN-LAIN</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="ukuran">Ukuran</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="ukuran" name="ukuran" autocomplete="off">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="keterangan">Keterangan</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" autocomplete="off">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="tanggal_pemasangan">Tanggal Pemasangan</label>
                      <input type="text" class="form-control" id="tanggal_pemasangan" name="tanggal_pemasangan" placeholder="Pilih Tanggal..." value="<?= date('Y-m-d') ?>" autocomplete="off">
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
    <div class="row">
      <div class="col">
        <div class="card shadow-sm">
          <div class="card-header">
            <h3 class="card-title">Data Tanda Vital Pasien</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="tabel_aktivitas" class="table table-hover table-sm display">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>No.</th>
                    <th>Tanggal Pemasangan</th>
                    <th>Alat Medik</th>
                    <th>Ukuran</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
              </table>
            </div>
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

        </div>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $('#tanggal_pemasangan').datetimepicker({
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
            "url": "<?php echo base_url(); ?>pasien/tabelpemantauanalatmedik",
            "type": "POST",
            "data": function(data) {
              data.id_rawatan = '<?= $rawatan['id'] ?>'
            },
          },
          columnDefs: [{
            orderable: false,
            targets: [0, 1, 2, 3, 4, 5]
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
        $('#simpan_pemantauan_almed').on('click', function() {
          var id_pasien = '<?= $pasien['id'] ?>'
          var id_rawatan = '<?= $rawatan['id'] ?>'
          var alat_medik = $('#alat_medik option:selected').val()
          var ukuran = $('#ukuran').val()
          var keterangan = $('#keterangan').val()
          var tanggal_pemasangan = $('#tanggal_pemasangan').val()
          var nm_alat_medik = $('#alat_medik option:selected').text()
          var status = '1';

          if (id_pasien == '' || id_rawatan == '' || alat_medik == '' || ukuran == '' || keterangan == '' || nm_alat_medik == '' || tanggal_pemasangan == '') {
            console.log('data belum lengkap');
            Swal.fire({
              icon: 'error',
              title: 'Data belum lengkap!',
              text: 'Mohon lengkapi data terlebih dahulu',
            });
          } else {
            $.ajax({
              url: '<?php echo base_url(); ?>pasien/simpanpemantauanalatmedik',
              method: 'POST',
              dataType: 'JSON',
              data: {
                id_pasien: id_pasien,
                id_rawatan: id_rawatan,
                alat_medik: alat_medik,
                ukuran: ukuran,
                keterangan: keterangan,
                tanggal_pemasangan: tanggal_pemasangan,
                nm_alat_medik: nm_alat_medik
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
                $('#ukuran').val('')
                $('#keterangan').val('')
                $('#tanggal_pemasangan').val('')
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
                url: '<?php echo base_url(); ?>pasien/hapustanda_vital',
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