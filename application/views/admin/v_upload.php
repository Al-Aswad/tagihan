<div class="row">
     <div class="col-md-6">
          <div class="card card-success">
               <div class="card-header">
                    <h3 class="card-title">Upload PAD/COD</h3>
               </div>
               <form action="<?= base_url('') . 'upload-cod' ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                         <div class="form-group">
                              <label for="exampleInputFile">File Signed Waybill</label>
                              <div class="input-group">
                                   <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="cod">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
                                   </div>
                                   <!-- <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                   </div> -->
                              </div>
                         </div>
                    </div>
                    <div class="card-footer">
                         <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
               </form>
          </div>
     </div>
     <div class="col-md-6">
          <div class="card card-warning">
               <div class="card-header">
                    <h3 class="card-title">Upload Cash</h3>
               </div>
               <form action="<?= base_url('') . 'upload-cash' ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                         <div class="form-group">
                              <label for="exampleInputFile">File Waybill History</label>
                              <div class="input-group">
                                   <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="cash">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih file </label>
                                   </div>
                                   <!-- <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                   </div> -->
                              </div>
                         </div>
                    </div>
                    <div class="card-footer">
                         <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
               </form>
          </div>
     </div>