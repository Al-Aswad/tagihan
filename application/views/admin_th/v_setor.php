<div class="row">
     <!-- left column -->
     <div class="col-md-4">
          <!-- general form elements -->
          <div class="card card-primary">
               <div class="card-header">
                    <h3 class="card-title">Form Setor ke Finance</h3>
               </div>
               <form action="<?= site_url('admin-setor-aksi') ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                         <div class="form-group">
                              <label for="th">TH *</label>
                              <input type="text" class="form-control" id="th" name="th" placeholder="TH" readonly value="<?= $this->session->userdata('pengguna_th');; ?>">
                              <small class="text-danger">
                                   <?= form_error('th'); ?>
                              </small>
                         </div>
                         <div class="form-group">
                              <label for="exampleInputPassword1">NIK *</label>
                              <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" readonly value="<?= $this->session->userdata('pengguna_nik');; ?>">
                              <small class="text-danger">
                                   <?= form_error('nik'); ?>
                              </small>
                         </div>
                         <div class="form-group">
                              <label for="exampleInputPassword1">POD-Time *</label>
                              <input type="text" class="form-control" id="pod" name="pod_time" placeholder="NIK" readonly value="<?= $setor->pod_time; ?>">
                              <small class="text-danger">
                                   <?= form_error('pod_time'); ?>
                              </small>
                         </div>
                         <div class="form-group">
                              <label for="exampleInputPassword1">Jumlah yang akan disetor * </label>
                              <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="0" readonly value="<?= $setor->sdh_setor; ?>">
                              <small class="text-danger">
                                   <?= form_error('jumlah'); ?>
                              </small>
                         </div>
                         <div class="form-group">
                              <label for="exampleInputPassword1">Keterangan </label>
                              <textarea name="ket" class="form-control" id="" cols="30" rows="3"></textarea>
                              <small class="text-danger">
                                   <?= form_error('ket'); ?>
                              </small>
                         </div>
                         <div class="form-group">
                              <label for="exampleInputFile">Bukti Transfer *</label>
                              <div class="input-group">
                                   <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="bukti_tf" onchange="readURL(this);" name="bukti_tf">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>

                                        <script>
                                             function img_pathUrl(input) {
                                                  $('#img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
                                             }
                                        </script>


                                   </div>
                              </div>
                              <small class="text-danger">
                                   <?= form_error('bukti_tf'); ?>
                              </small>
                              <script>
                                   $(function() {
                                        bsCustomFileInput.init();
                                   });
                              </script>
                         </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                         <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
               </form>
          </div>
     </div>
     <div class="col-md-8">
          <div class="card card-primary">
               <div class="card-header">
                    <h3 class="card-title">Bukti Transfer</h3>
               </div>
               <div class="card-body">
                    <div class="form-group">
                         <label class="text-danger" for="exampleInputEmail1">Nominal Bukti Transfer Harus Sesuai dengan Jumlah yang akan di setor *</label>
                    </div>
                    <img id="dis_gambar" src="#" alt="Bukti Transfer" />
                    <script>
                         function readURL(input) {
                              if (input.files && input.files[0]) {
                                   var reader = new FileReader();

                                   reader.onload = function(e) {
                                        $('#dis_gambar')
                                             .attr('src', e.target.result)
                                             // .width(600)
                                             .height(screen.height * 0.54);
                                   };
                                   reader.readAsDataURL(input.files[0]);
                              }
                         }
                    </script>
               </div>
          </div>
     </div>