<div class="row">
     <!-- left column -->
     <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-warning">
               <div class="card-header">
                    <h3 class="card-title">Form Edit User</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form method="post" action="<?= base_url('pengguna-edit/aksi'); ?>">
                    <div class="card-body">
                         <div class="form-group">
                              <label for="text">NIK *</label>
                              <input type="hidden" class="form-control  <?= form_error('nik') ? 'is-invalid' : null ?>" name="id" value="<?= $pengguna->pengguna_id ?>">
                              <input type="text" class="form-control  <?= form_error('nik') ? 'is-invalid' : null ?>" name="nik" placeholder="NIK Karyawa" value="<?= $this->input->post('nik') ?? $pengguna->pengguna_nik ?>">
                              <small class="text-danger p-0"><?= form_error('nik'); ?></small>
                         </div>
                         <div class="form-group">
                              <label for="text">Nama *</label>
                              <input type="text" class="form-control  <?= form_error('nama') ? 'is-invalid' : null ?>" name="nama" placeholder="Nama" value="<?= $this->input->post('nama') ?? $pengguna->pengguna_nama ?>">
                              <small class="text-danger p-0"><?= form_error('nama'); ?></small>
                         </div>
                         <div class="form-group">
                              <label for="text">Akses</label>
                              <select class="form-control  <?= form_error('akses') ? 'is-invalid' : null ?>" name="akses">
                                   <option class="form-control" value="">-Pilih Akses-</option>
                                   <option class="form-control" value="1" <?php if ($pengguna->pengguna_akses == 1) {
                                                                                echo "SELECTED";
                                                                           }; ?>>Super Admin</option>
                                   <option class="form-control" value="2" <?php if ($pengguna->pengguna_akses == 2) {
                                                                                echo "SELECTED";
                                                                           }; ?>>Admin</option>
                              </select>
                              <small class="text-danger p-0"><?= form_error('akses'); ?></small>
                         </div>
                         <div class="form-group">
                              <label for="text">TH *</label>
                              <select class="form-control  <?= form_error('th') ? 'is-invalid' : null ?>" name="th">
                                   <option class="form-control" value="">-Pilih TH-</option>
                                   <?php
                                   foreach ($th as $t) { ?>
                                        <option class="form-control" value="<?= $t->th; ?>"><?= $t->th; ?></option>
                                   <?php } ?>
                              </select>
                              <small class="text-danger p-0"><?= form_error('th'); ?></small>
                         </div>
                    </div>
                    <div class="card-footer">
                         <button type="submit" class="btn btn-primary">Update</button>
                         <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
               </form>
          </div>
          <!-- /.card -->