<section id="main-content">
    <section class="wrapper">
      
          
        <h3><i class="fa fa-angle-right"></i> Tambah Pegawai</h3><hr>
        <?php echo validation_errors(); ?> 

        <?php
          $attr = array('class' => 'form-horizontal style-form'); 
          echo form_open_multipart('pegawai/create',$attr);?> 
         <div class="row mt" >
              <div class="col-lg-8">
                  <div class="form-panel"> 
        
            <div class="form-group">
                <label class="col-sm-3 col-sm-3 control-label">Nama</label>
                <div class="col-sm-6">
                <input type="text" name="nama" class="form-control"> 
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 col-sm-3 control-label">Email</label>
                <div class="col-sm-6">
                <input type="email" name="email" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 col-sm-3 control-label">Telp</label>
                <div class="col-sm-6">
                <input type="text" name="telp" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 col-sm-3control-label">Username</label>
                <div class="col-sm-6">
                <input type="text" name="username" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                <input type="password" name="pass" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          
        <?php echo form_close(); ?>
                </div>
              </div>
            </div>
        
    </section>
</section>