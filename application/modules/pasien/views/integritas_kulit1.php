  <!-- Header -->
  <div class="header bg-gradient-orange pb-6">
      <div class="container-fluid">
          <div class="header-body">
              <div class="row align-items-center py-4">
                  <div class="col-lg-6 col-7">
                      <h6 class="h2 text-white d-inline-block mb-0"><?= $title; ?></h6>
                  </div>
                  <div class="col-lg-6 col-5 text-right">
                      <button type="button" id="tambah_image_blog" class="btn btn-sm btn-neutral">Tambah</button>
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
                      <h3 class="card-title">Foto Blog</h3>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table id="tabel_image_blog" class="table table-hover table-sm display">
                              <thead>
                                  <tr>
                                      <th style="width: 5%;">No.</th>
                                      <th style="width: 25%;">URL</th>
                                      <th style="width: 10%;">#</th>
                                  </tr>
                              </thead>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Modal Create User -->
      <div class="modal fade" id="modal_image_blog" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title text-primary"></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form method="post" id="form_image_blog">
                      <div class="modal-body">
                          <div class="form-group">
                              <input type="text" name="id_blog" id="id_blog" value="<?php echo $id_blog ?>">
                              <label for="file_blog">Pilih Foto</label>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="file_blog" name="file_blog" lang="en">
                                  <label class="custom-file-label" for="file_blog">Select file</label>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <div class="text-right">
                              <button type="submit" class="btn btn-primary ">Simpan</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <script>
          $(document).ready(function() {
              $('#loading').hide();
              // DataTable
              var dataTable = $('#tabel_image_blog').DataTable({
                  "serverSide": true,
                  "responsive": true,
                  "pageLength": 25,
                  "order": [],
                  "ajax": {
                      "url": "<?php echo base_url(); ?>blog/tabelimageblog",
                      "type": "POST",
                      "data": function(data) {
                          data.id_blog = <?= $id_blog; ?>
                      },

                  },
                  columnDefs: [{
                      orderable: false,
                      targets: [0, 1, 2]
                  }],
                  autoWidth: !1,
                  language: {
                      search: "Cari"
                  },
              });

              // image blog
              $('#tambah_image_blog').on('click', function() {

                  $('#modal_image_blog').modal('show');
                  $('.modal-title').text('Tambah Foto');
              });

              //submit image
              $(document).on('submit', '#form_image_blog', function(event) {
                  event.preventDefault();
                  var id_blog = $(this).attr('id');
                  $('#judul').val()
                  var file_blog = $('#file_blog').val();





                  if (file_blog == '') {
                      Swal.fire({
                          icon: 'error',
                          title: 'File belum diupload!',
                          text: 'Mohon lengkapi data terlebih dahulu',
                      });
                  } else {
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
                                  url: '<?php echo base_url(); ?>blog/simpanimageblog',
                                  method: 'POST',
                                  data: new FormData(this),
                                  contentType: false,
                                  processData: false,
                                  success: function(data) {
                                      Swal.fire({
                                          icon: 'success',
                                          title: 'Foto berhasil ditambahkan',
                                          showConfirmButton: false,
                                          timer: 2000
                                      })
                                      dataTable.ajax.reload();
                                      $('#modal_image_blog').modal('hide');
                                      $('#form_image_blog')[0].reset();
                                  }
                              });
                          }
                      })
                  }
              });

              $(document).on('click', '.delete', function() {
                  var id = $(this).attr('id');
                  var file = $(this).attr('file');
                  Swal.fire({
                      title: 'Apakah Kamu Yakin?',
                      text: "Hapus file ini?",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      cancelButtonText: 'Batal',
                      confirmButtonText: 'Ya, Saya Yakin'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          $.ajax({
                              url: '<?php echo base_url(); ?>blog/hapusimageblog',
                              method: 'POST',
                              data: {
                                  id: id,
                                  file: file,
                              },
                              success: function(data) {
                                  Swal.fire({
                                      icon: 'success',
                                      title: data,
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