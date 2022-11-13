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
                <h3 class="mb-0">Pasien Baru</h3>
              </div>
              <div class="col-4 text-right">
                <button type="button" id="simpan_pasien" class="btn btn-sm btn-primary">Simpan</button>
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
                      <label class="form-control-label" for="nama">Nama</label>
                      <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="nik">NIK</label>
                      <input type="number" id="nik" name="nik" class="form-control" placeholder="Nomor KTP">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="jenis_kelamin">Jenis Kelamin</label>
                      <select class="custom-select rounded-0" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="1">Laki-laki</option>
                        <option value="2">Perempuan</option>=
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Tanggal Lahir</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Pilih Tanggal..." autocomplete="off">
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <span class="fa fa-calendar-alt"></span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="alamat">Alamat</label>
                      <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat Lengkap">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="notelp1">No. Telepon 1</label>
                      <input type="number" id="notelp1" name="notelp1" class="form-control" placeholder="Nomor Telepon 1">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="notelp2">No. Telepon 2</label>
                      <input type="number" id="notelp2" name="notelp2" class="form-control" placeholder="Nomor Telepon 2">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="nama_pj">Nama Istri/Suami/Keluarga</label>
                      <input type="text" id="nama_pj" name="nama_pj" class="form-control" placeholder="Nama Istri/Suami/Keluarga">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="category">Nomor Telepon</label>
                      <input type="number" id="notelp3" name="notelp3" class="form-control" placeholder="Nomor Telepon">
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
        $('#simpan_pasien').on('click', function() {
          var nama = $('#nama').val()
          var nik = $('#nik').val()
          var jeniskelamin = $('#jenis_kelamin option:selected').val()
          var tanggallahir = $('#tanggal_lahir').val()
          var alamat = $('#alamat').val()
          var notelp1 = $('#notelp1').val()
          var notelp2 = $('#notelp2').val()
          var nama_pj = $('#nama_pj').val()
          var notelp3 = $('#notelp3').val()
          var status = '1';

          if (nama == '' || nik == '' || jeniskelamin == '' || tanggallahir == '' || notelp1 == '' || notelp2 == '' || nama_pj == '' || notelp3 == '') {
            console.log('data belum lengkap');
            Swal.fire({
              icon: 'error',
              title: 'Data belum lengkap!',
              text: 'Mohon lengkapi data terlebih dahulu',
            });
          } else {
            $.ajax({
              url: '<?php echo base_url(); ?>pasien/simpanpasien',
              method: 'POST',
              data: {
                nama: nama,
                nik: nik,
                jeniskelamin: jeniskelamin,
                tanggallahir: tanggallahir,
                alamat: alamat,
                notelp1: notelp1,
                notelp2: notelp2,
                nama_pj: nama_pj,
                notelp3: notelp3,
                status: status,
              },
              success: function(data) {
                console.log(data);
                Swal.fire({
                  icon: 'success',
                  title: 'Data Pasien berhasil disimpan',
                  showConfirmButton: false,
                  timer: 1500
                })
                window.location.href = "<?php base_url(); ?>pasien/pasienterdaftar";
              }
            });
          }

        });
      });
    </script>