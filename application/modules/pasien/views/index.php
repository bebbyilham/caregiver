  <!-- Header -->
  <div class="header bg-gradient-orange pb-6">
      <div class="container-fluid">
          <div class="header-body">
              <div class="row align-items-center py-4">
                  <div class="col-lg-6 col-7">
                      <h6 class="h2 text-white d-inline-block mb-0"><?= $title; ?></h6>
                  </div>
                  <div class="col-lg-6 col-5 text-right">
                      <a href="<?php echo base_url(); ?>blog/tambahblog" class="tambah_blog btn btn-sm btn-neutral">Tambah</a>
                  </div>
              </div>
              <!-- Card stats -->
              <div class="row">




              </div>
          </div>
      </div>
  </div>
  <div class="container-fluid mt--6 shadow-sm">
      <div class="row">
          <div class="col-lg-12">
              <?= $this->session->flashdata('message'); ?>
          </div>
      </div>
      <div class="row">
          <div class="col">
              <div class="card shadow-sm">
                  <div class="card-header">
                      <h3 class="card-title">Daftar Blog</h3>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table id="tabel_blog" class="table table-hover table-sm display">
                              <thead>
                                  <tr>
                                      <th style="width: 5%;">No.</th>
                                      <th style="width: 25%;">Blog</th>
                                      <th style="width: 40%;">Deskripsi</th>
                                      <th style="width: 10%;">Status</th>
                                      <th style="width: 10%;">Tanggal</th>
                                      <th class="text-center" style="width: 10%;">#</th>
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
                  <form method="post" id="tambah_user">
                      <div class="modal-body">
                          <input type="hidden" name="pegawai_id" id="pegawai_id">
                          <input type="hidden" id="id_user" name="id_user">
                          <input type="hidden" name="action_modal" id="action_modal" value="edit">
                          <input type="hidden" name="nama_akun" id="nama_akun">
                          <div class="form-group">
                              <label for="judul">Judul</label>
                              <input type="text" class="form-control rounded-0" id="judul" name="judul" placeholder="Judul">
                              <small><span class="text-danger" id="error_judul"></span></small>
                          </div>
                          <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" class="form-control rounded-0" id="password" name="password" placeholder="Password">
                              <small><span class="text-danger" id="error_password"></span></small>
                          </div>
                          <div class="form-group">
                              <label for="password2">Ulangi Password</label>
                              <input type="password" class="form-control rounded-0" id="password2" name="password2" placeholder="Ulangi Password">
                              <small><span class="text-danger" id="error_password2"></span></small>
                          </div>
                          <div class="form-group">
                              <label for="role_id">Role</label>
                              <select class="custom-select rounded-0" id="role_id" name="role_id"></select>
                              <small><span class="text-danger" id="error_role_id"></span></small>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <script>
          $(document).ready(function() {
              $('#loading').hide();
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

              // image blog
              $(document).on('click', '.imageblog', function() {
                  var id = $(this).attr('id');
                  window.open('<?= base_url(); ?>blog/imageblog/' + id);
              });

              $(document).on("click", ".ubahstatus", function() {
                  let id = $(this).attr('id')
                  let status = $(this).attr('status')
                  Swal.fire({
                      title: 'Apakah Kamu Yakin?',
                      text: "Upload file nilai ini?",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      cancelButtonText: 'Batal',
                      confirmButtonText: 'Ya, Saya Yakin'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          $.ajax({
                              url: '<?php echo base_url(); ?>blog/ubahstatusblog',
                              method: 'POST',
                              data: {
                                  id: id,
                                  status: status
                              },
                              success: function(data) {
                                  // console.log(data);
                                  Swal.fire({
                                      icon: 'success',
                                      title: 'Status berhasil diubah',
                                      showConfirmButton: false,
                                      timer: 1500
                                  })
                                  dataTable.ajax.reload();
                              }
                          });
                      }
                  })

              })


          });
      </script>