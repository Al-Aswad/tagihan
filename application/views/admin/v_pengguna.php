<div class="row">
     <div class="col-12">
          <div class="card">
               <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Manajemen Akun</h3>
                    <a class="btn btn-primary offoset-end" href="<?= base_url('') . 'pengguna-tambah' ?>">Tambah</a>
               </div>
               <!-- /.card-header -->
               <div class="card-body pt-0">
                    <table id="example1" class="table table-bordered table-hover">
                         <thead>
                              <tr>
                                   <th>No</th>
                                   <th>NIK</th>
                                   <th>Nama</th>
                                   <th>TH</th>
                                   <th>Akses</th>
                                   <th>Aksi</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php $no = 1;
                              foreach ($akun as $a) { ?>
                                   <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $a->pengguna_nik; ?></td>
                                        <td><?= $a->pengguna_nama; ?></td>
                                        <td><?= $a->pengguna_th; ?></td>
                                        <td><?php if ($a->pengguna_akses == 1) {
                                                  echo "SU";
                                             } elseif ($a->pengguna_akses == 2) {
                                                  echo "Admin";
                                             } else {
                                                  echo "Kurir";
                                             }; ?></td>
                                        <td>
                                             <a class="btn btn-sm btn-warning" href="<?= base_url('') . 'pengguna-edit' ?>">Edit</a>
                                             <?php if ($this->session->userdata('pengguna_level') == 1) { ?>
                                                  <a class="btn btn-sm btn-danger" href="<?= base_url('') . 'pengguna-hapus' ?>">Hapus</a>
                                             <?php } ?>
                                        </td>
                                   </tr>
                              <?php }; ?>
                         </tbody>
                         <tfoot>
                              <tr>
                                   <th>No</th>
                                   <th>NIK</th>
                                   <th>Nama</th>
                                   <th>TH</th>
                                   <th>Akses</th>
                                   <th>Aksi</th>
                              </tr>
                         </tfoot>
                    </table>
               </div>
          </div>