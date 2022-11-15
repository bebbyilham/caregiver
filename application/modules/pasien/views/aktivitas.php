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
                <button type="button" id="simpan_aktivitas" class="btn btn-sm btn-primary">Simpan</button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form>
              <h6 class="heading-small text-muted mb-4">Data Aktivitas Pasien</h6>
              <div class="pl-4">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="form-control-label" for="makan">Makan</label>
                      <select class="custom-select" id="makan" name="makan">
                        <option value="0">Tidak dapat dilakukan sendiri</option>
                        <option value="1">Memerlukan bantuan dalam beberapa hal</option>
                        <option value="2">Dapat melakukan sendiri</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="form-control-label" for="mandi">Mandi</label>
                      <select class="custom-select" id="mandi" name="mandi">
                        <option value="0">Tidak dapat dilakukan sendiri</option>
                        <option value="1">Dapat melakukan sendiri</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="form-control-label" for="kebersihan_diri">Kebersihan Diri</label>
                      <select class="custom-select" id="kebersihan_diri" name="kebersihan_diri">
                        <option value="0">Memerlukan bantuan sendiri</option>
                        <option value="1">Dapat melakuakn sendiri ( cukur, sikat gigi,dll)</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="form-control-label" for="berpakaian">Berpakaian</label>
                      <select class="custom-select" id="berpakaian" name="berpakaian">
                        <option value="0">Tidak dapat dilakukan sendiri</option>
                        <option value="1">Memerlukan bantuan minimal</option>
                        <option value="2">Dapat dilakukan sendiri</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="form-control-label" for="defekasi">Defekasi</label>
                      <select class="custom-select" id="defekasi" name="defekasi">
                        <option value="0">Inkontinensia Alvi</option>
                        <option value="1">Kadang terjadi inkontinensia</option>
                        <option value="2">Tidak terjadi inkontinensia</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="form-control-label" for="miksi">Miksi</label>
                      <select class="custom-select" id="miksi" name="miksi">
                        <option value="0">Inkontinensia Alvi atau menggunakan kateter</option>
                        <option value="1">Kadang terjadi inkontinensia</option>
                        <option value="2">Tidak terjadi inkontinensia</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="form-control-label" for="penggunaan_toilet">Penggunaan Toilet</label>
                      <select class="custom-select" id="penggunaan_toilet" name="penggunaan_toilet">
                        <option value="0">Tidak melakukan sendiri</option>
                        <option value="1">Memerlukan bantuan</option>
                        <option value="2">Mandiri</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="form-control-label" for="transfer">Transfer</label>
                      <select class="custom-select" id="transfer" name="transfer">
                        <option value="0">Tidak dapat melakukan, tidak ada keseimbangan</option>
                        <option value="1">Perlu bantuan beberapa orang, dapat duduk</option>
                        <option value="2">Perlu bantuan minimal</option>
                        <option value="3">Dapat melakukan sendiri</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="form-control-label" for="mobilitas">Mobilitas</label>
                      <select class="custom-select" id="mobilitas" name="mobilitas">
                        <option value="0">Immobilisasi</option>
                        <option value="1">Memerlukan kursi roda</option>
                        <option value="2">Berjalan dengan bantuan</option>
                        <option value="3">Mandiri/pakai tongkat</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="form-control-label" for="naik_tangga">Naik Tangga</label>
                      <select class="custom-select" id="naik_tangga" name="naik_tangga">
                        <option value="0">Tidak dapat melakukan</option>
                        <option value="1">Perlu bantuan</option>
                        <option value="2">Mandiri</option>
                      </select>
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
            <h3 class="card-title">Data Aktivitas Pasien</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="tabel_aktivitas" class="table table-hover table-sm display">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>No.</th>
                    <th>Waktu</th>
                    <th>Total Skor</th>
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


        // DataTable
        var dataTable = $('#tabel_aktivitas').DataTable({
          "serverSide": true,
          "responsive": true,
          "pageLength": 25,
          "order": [],
          "ajax": {
            "url": "<?php echo base_url(); ?>pasien/tabelaktivitas",
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
        $('#simpan_aktivitas').on('click', function() {
          var id_pasien = '<?= $pasien['id'] ?>'
          var id_rawatan = '<?= $rawatan['id'] ?>'
          var makan = $('#makan').val()
          var mandi = $('#mandi').val()
          var kebersihan_diri = $('#kebersihan_diri').val()
          var berpakaian = $('#berpakaian').val()
          var defekasi = $('#defekasi').val()
          var miksi = $('#miksi').val()
          var penggunaan_toilet = $('#penggunaan_toilet').val()
          var transfer = $('#transfer').val()
          var mobilitas = $('#mobilitas').val()
          var naik_tangga = $('#naik_tangga').val()
          var status = '1';

          if (id_pasien == '' || id_rawatan == '' || makan == '' || mandi == '' || kebersihan_diri == '' || berpakaian == '' || defekasi == '' || miksi == '' || penggunaan_toilet == '' || transfer == '' || mobilitas == '' || naik_tangga == '') {
            console.log('data belum lengkap');
            Swal.fire({
              icon: 'error',
              title: 'Data belum lengkap!',
              text: 'Mohon lengkapi data terlebih dahulu',
            });
          } else {
            $.ajax({
              url: '<?php echo base_url(); ?>pasien/simpanaktivitas',
              method: 'POST',
              dataType: 'JSON',
              data: {
                id_pasien: id_pasien,
                id_rawatan: id_rawatan,
                makan: makan,
                mandi: mandi,
                kebersihan_diri: kebersihan_diri,
                berpakaian: berpakaian,
                defekasi: defekasi,
                miksi: miksi,
                penggunaan_toilet: penggunaan_toilet,
                transfer: transfer,
                mobilitas: mobilitas,
                naik_tangga: naik_tangga,
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
                url: '<?php echo base_url(); ?>pasien/hapusaktivitas',
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