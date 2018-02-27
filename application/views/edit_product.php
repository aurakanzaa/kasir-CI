<?php $this->load->view('partials/header'); ?>
<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
           <!-- <?php echo form_open_multipart('home/Update/'.$this->uri->segment(3)); ?> -->
          
            <h3><i class="fa fa-angle-right"></i> Edit Produk</h3>
            <?php echo validation_errors(); ?>  
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <br>
                      <?php 
                        $attr = array('class' => 'form-horizontal style-form');
                       echo form_open_multipart('home/Update/'.$this->uri->segment(3),$attr);?>
                       
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Gambar</label>
                              <img src=<?=base_url("bower_components/uploads/").$kasir[0]->gambar; ?> alt="">
                              <input type="file" name="userfile" size="20" >
                            
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Produk</label>
                              <div class="col-sm-5">
                                  <input type="text" name="nama_produk" class="form-control" value="<?php echo $kasir[0]->nama_produk; ?>">
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
                                  <textarea  id="" cols="10" rows="3" type="text" class="form-control" name="deskripsi" ><?php echo $kasir[0]->deskripsi; ?></textarea>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                              <strong class="col-sm-1 col-sm-0 control-label right">Rp.</strong>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control" name="harga" value="<?php echo $kasir[0]->harga; ?>">
                              </div>
                              <strong class="col-sm-1 col-sm-1 control-label">,00</strong>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pajak</label>
                              <div class="col-sm-1">
                                  <input type="text" class="form-control" name="pajak" value="<?php echo $kasir[0]->pajak; ?>">
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


<?php $this->load->view('partials/footer'); ?>