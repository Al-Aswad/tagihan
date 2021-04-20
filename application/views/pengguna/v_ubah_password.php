<div class="row">
     <!-- left column -->
     <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
               <div class="card-header">
                    <h3 class="card-title">Form Ubah Password</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form method="post" action="<?= base_url('ubah-password/aksi'); ?>">
                    <div class="card-body">
                         <div class="form-group">
                              <label for="text">NIK *</label>
                              <input type="text" class="form-control  <?= form_error('nik') ? 'is-invalid' : null ?>" name="nik" placeholder="NIK Karyawa" readonly value="<?= $nik; ?>">
                              <small class="text-danger p-0"><?= form_error('nik'); ?></small>
                         </div>
                         <div class="form-group">
                              <label for="text">Password lama *</label>
                              <input type="password" class="form-control  <?= form_error('password_lama') ? 'is-invalid' : null ?>" id="password" name="password_lama" placeholder="Password Lama">
                              <small class="text-danger p-0"><?= form_error('password_lama'); ?></small>
                              <div class="custom-control custom-checkbox">
                                   <input class="check-item custom-control-input custom-control-input-primary" onclick="show()" type="checkbox" id="show1" name="show3">
                                   <label for="show1" class="custom-control-label">Show</label>
                              </div>
                         </div>
                         <div class="form-group">
                              <label for="text">Password Baru *</label>
                              <input type="password" class="form-control  <?= form_error('password') ? 'is-invalid' : null ?>" id="password1" name="password" placeholder="Password">
                              <small class="text-danger p-0"><?= form_error('password'); ?></small>
                              <div class="custom-control custom-checkbox">
                                   <input class="check-item custom-control-input custom-control-input-primary" onclick="cee()" type="checkbox" id="show2" name="show3">
                                   <label for="show2" class="custom-control-label">Show</label>
                              </div>
                         </div>
                         <div class="form-group">
                              <label for="text">Password Confir *</label>
                              <input type="password" class="form-control  <?= form_error('password1') ? 'is-invalid' : null ?>" id="password2" name="password1" placeholder="Confirm Password">
                              <div class="custom-control custom-checkbox">
                                   <input class="check-item custom-control-input custom-control-input-primary" onclick="sss()" type="checkbox" id="show3" name="show3">
                                   <label for="show3" class="custom-control-label text-sm">Show</label>
                              </div>
                              <small class="text-danger p-0"><?= form_error('password1'); ?></small>
                         </div>
                    </div>
                    <div class="card-footer">
                         <button type="submit" class="btn btn-primary">Ubah</button>
                         <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
               </form>
               <script>
                    function show() {
                         var x = document.getElementById("password");
                         if (x.type === "password") {
                              x.type = "text";
                         } else {
                              x.type = "password";
                         }
                    }

                    function cee() {

                         var x1 = document.getElementById("password1");
                         if (x1.type === "password") {
                              x1.type = "text";
                         } else {
                              x1.type = "password";
                         }
                    }

                    function sss() {

                         var x2 = document.getElementById("password2");
                         if (x2.type === "password") {
                              x2.type = "text";
                         } else {
                              x2.type = "password";
                         }
                    }
               </script>
          </div>
          <!-- /.card -->