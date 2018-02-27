<section id="main-content">
    <section class="wrapper">
      
          
        <h3><i class="fa fa-angle-right"></i> Edit Data Pegawai</h3><hr>
        <?php echo validation_errors(); ?>  
       

      
       <?php
          $attr = array('class' => 'form-horizontal style-form'); 
          echo form_open_multipart('pegawai/update/'.$this->uri->segment(3),$attr);?>   
        
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                <div class="col-sm-4">
                    <input type="text" name="nama" class="form-control" value="<?php echo $login[0]->nama; ?>">
               </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Email</label>
                <div class="col-sm-4">
                    <input type="email" name="email" class="form-control" value="<?php echo $login[0]->email; ?>" >
               </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Telp</label>
                <div class="col-sm-4">
                    <input type="text" name="telp" class="form-control" value="<?php echo $login[0]->telp; ?>">
               </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Username</label>
                <div class="col-sm-4">
                    <input type="text" name="username" class="form-control" value="<?php echo $login[0]->username; ?>">
               </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Password</label>
                <div class="col-sm-4">
                    <input type="password" name="pass" class="form-control" value="<?php echo $login[0]->pass; ?>">
               </div>
            </div>

           <!--  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Role</label>

                              <div class="col-sm-3">
                                  <select class="form-control" name="role">
                                  
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option>
                                  </select>
                              </div>
                          </div> -->

        
            <button type="submit" class="btn btn-primary">Submit</button>
        
        <?php echo form_close(); ?>

    </section>
</section>