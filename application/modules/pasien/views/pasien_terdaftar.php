  <!-- Header -->
  <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
          <div class="header-body">
              <div class="row align-items-center py-4">
                  <div class="col-lg-6 col-7">
                      <h6 class="h2 text-white d-inline-block mb-0"><?= $title; ?></h6>
                  </div>
                  <div class="col-lg-6 col-5 text-right">
                      <a href="<?php echo base_url(); ?>pasien/registrasi" class="tambah_blog btn btn-sm btn-neutral">Tambah</a>
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
                      <h3 class="card-title">Daftar Pasien</h3>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table id="tabel_pasien" class="table table-hover table-sm display">
                              <thead>
                                  <tr>
                                      <th class="text-center" style="width: 10%;">#</th>
                                      <!-- <th style="width: 5%;">No.</th> -->
                                      <th style="width: 25%;">Nama</th>
                                      <th style="width: 20%;">Alamat</th>
                                      <!-- <th style="width: 40%;">Jenis Kelamin</th> -->
                                      <th style="width: 10%;">No. Telp</th>
                                      <th style="width: 10%;">Penanggung Jawab</th>
                                  </tr>
                              </thead>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal fade" id="riwayatrawatanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <form method="post" id="form_print">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tanggal Resume Medis</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class="table-responsive">
                              <table id="tabel_rawatan" class="table table-hover table-sm display">
                                  <thead>
                                      <tr>
                                          <th class="text-center" style="width: 10%;">#</th>
                                          <!-- <th style="width: 5%;">No.</th> -->
                                          <th style="width: 25%;">Data Pasien</th>
                                          <th style="width: 20%;">Diagnosa</th>
                                          <!-- <th style="width: 40%;">Jenis Kelamin</th> -->
                                          <th style="width: 10%;">BI Score</th>
                                          <th style="width: 10%;">Alergi</th>
                                      </tr>
                                  </thead>
                              </table>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                          <input type="hidden" name="idpasien" id="idpasien">
                          <button type="button" class="btn btn-primary" id="btn_print">Print</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
      <div class="modal fade" id="detailpasienModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <form method="post" id="form_print">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tanggal Resume Medis</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class="table-responsive">
                              <table id="tabel_rawatan" class="table table-hover table-sm display">
                                  <tbody>
                                      <tr>
                                          <td>Nama</td>
                                          <td>:</td>
                                          <td class="detail_nama">Nama</td>
                                      </tr>
                                      <tr>
                                          <td>NIK</td>
                                          <td>:</td>
                                          <td class="detail_nik"></td>
                                      </tr>
                                      <tr>
                                          <td>No. Rekam Medis</td>
                                          <td>:</td>
                                          <td class="detail_no_mr"></td>
                                      </tr>
                                      <tr>
                                          <td>Jenis Kelamin</td>
                                          <td>:</td>
                                          <td class="detail_jenis_kelamin"></td>
                                      </tr>
                                      <tr>
                                          <td>Tanggal Lahir</td>
                                          <td>:</td>
                                          <td class="detail_tanggal_lahir"></td>
                                      </tr>
                                      <tr>
                                          <td>Alamat</td>
                                          <td>:</td>
                                          <td class="detail_alamat"></td>
                                      </tr>
                                      <tr>
                                          <td>No. Telp</td>
                                          <td>:</td>
                                          <td class="detail_notelp1"></td>
                                      </tr>
                                      <tr>
                                          <td>Nama Keluarga</td>
                                          <td>:</td>
                                          <td class="detail_nama_pj"></td>
                                      </tr>
                                      <tr>
                                          <td>No. Telp Keluarga</td>
                                          <td>:</td>
                                          <td class="detail_notelp3"></td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                          <input type="hidden" name="idpasien" id="idpasien">
                          <button type="button" class="btn btn-primary" id="btn_print">Print</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
      <script>
          $(document).ready(function() {
              $('#loading').hide();

              // DataTable
              var dataTable = $('#tabel_pasien').DataTable({
                  "serverSide": true,
                  "responsive": true,
                  "pageLength": 25,
                  "order": [],
                  "ajax": {
                      "url": "<?php echo base_url(); ?>pasien/tabelpasien",
                      "type": "POST",
                  },
                  columnDefs: [{
                      orderable: false,
                      targets: [0, 1, 2, 3, 4]
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

              var dataTable2 = $('#tabel_rawatan').DataTable({
                  "serverSide": true,
                  "responsive": true,
                  "pageLength": 25,
                  "order": [],
                  "ajax": {
                      "url": "<?php echo base_url(); ?>pasien/tabelrawatanpasien",
                      "type": "POST",
                      "data": function(data) {
                          data.id_pasien = $('#idpasien').val()
                      },
                  },
                  columnDefs: [{
                      orderable: false,
                      targets: [0, 1, 2, 3, 4]
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

              // rawatan_baru
              $(document).on('click', '.rawatan_baru', function() {
                  var id = $(this).attr('id');
                  window.open('<?= base_url(); ?>pasien/rawatanbaru/' + id);
              });

              // riwayat rawatan
              $(document).on('click', '.riwayat_rawatan', function() {
                  var id = $(this).attr('id');
                  var namapasien = $(this).attr('namapasien');
                  $('.modal-title').text(namapasien);
                  $('#idpasien').val(id);
                  dataTable2.ajax.reload();
                  $('#riwayatrawatanModal').modal('show');
              });
              // detail pasien
              $(document).on('click', '.detail_pasien', function() {
                  var id = $(this).attr('id');
                  var namapasien = $(this).attr('namapasien');
                  $('.modal-title').text(namapasien);
                  $('#idpasien').val(id);
                  $.ajax({
                      url: '<?php echo base_url(); ?>pasien/fetchSinglePasien',
                      method: 'POST',
                      data: {
                          id: id
                      },
                      dataType: 'json',
                      success: function(data) {
                          $('#detailpasienModal').modal('show');
                          console.log(data);
                          $('.detail_nama').text(data.nama);
                          $('.detail_nik').text(data.nik);
                          $('.detail_no_mr').text(data.no_mr);
                          $('.detail_jenis_kelamin').text(data.jenis_kelamin);
                          $('.detail_tanggal_lahir').text(data.tanggal_lahir);
                          $('.detail_alamat').text(data.alamat);
                          $('.detail_notelp1').text(data.notelp1);
                          $('.detail_nama_pj').text(data.nama_pj);
                          $('.detail_notelp3').text(data.notelp3);
                      }
                  });

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