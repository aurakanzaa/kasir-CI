
<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          
          
            <h3><i class="fa fa-angle-right"></i> Tambah Produk</h3>
            <?php echo validation_errors(); ?>  
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <br>
                       <?php 
                        $attr = array('class' => 'form-horizontal style-form');
                       echo form_open_multipart('home/create',$attr);?>
                      
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Gambar</label>
                              <input type="file" name="userfile" size="20" >
                            
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Produk</label>
                              <div class="col-sm-5">
                                  <input type="text" name="nama_produk" class="form-control">
                              </div>
                          </div>
                         
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kategori</label>

                              <div class="col-sm-5">
                                  <select class="form-control" name="kategori">
                                  <?php foreach ($kategori as $key) {?>
                                    <option value="<?php echo $key->id_kategori; ?>"><?php echo $key->kategori; ?></option>
                                    <?php } ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                              <div class="col-sm-5">
                                  <textarea  id="" cols="10" rows="3" type="text" class="form-control" name="deskripsi"></textarea>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                              <strong class="col-sm-1 col-sm-0 control-label right">Rp.</strong>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control" name="harga">
                              </div>
                              <strong class="col-sm-1 col-sm-1 control-label">,00</strong>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pajak</label>
                              <div class="col-sm-1">
                                  <input type="text" class="form-control" name="pajak">
                              </div>
                              <strong class="col-sm-2 col-sm-2 control-label">%</strong>
                          </div>
                           
                           <input type="submit" class="btn btn-success" value="Buat" name="" id="">
                           
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->
            <?php echo form_close(); ?>
            
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->