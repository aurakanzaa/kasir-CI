<?php 
	//$this->load->view('partials/header');
	$session_data = $this->session->userdata('logged_in');
?>


<section id="main-content">
    <section class="wrapper">
      
          
        <h3><i class="fa fa-angle-right"></i> Edit Profile</h3><hr>
        <?php echo validation_errors(); ?>  
       

        <?php
          $attr = array('class' => 'form-horizontal style-form');
        echo form_open_multipart('profile/updateProfile/'.$session_data['id'],$attr); 
        ?>
            <div class="row mt">
              <div class="col-lg-6">
                  <div class="form-panel"> 
        
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                      <input type="text" name="nama" placeholder="nama" value="<?php echo $profile[0]->nama ?>">
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Email</label>
                      <input type="text" name="email" placeholder="Email" value="<?php echo $profile[0]->email ?>">
                    </div>
                    
                    <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Ava Image</label>
                      <input type="file" name="ava" placeholder="Image" value="" size="20">
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Telp</label>
                      <input type="text" name="telp" placeholder="Telepon" value="<?php echo $profile[0]->telp ?>">
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Username</label>
                      <input type="text" name="username" placeholder="Username" value="<?php echo $profile[0]->username ?>">
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Password</label>
                      <input type="password" name="pass" placeholder="Password" value="<?php echo $profile[0]->pass ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
        <?php echo form_close(); ?>
                  
        
                  </div>
              </div>
            </div>
        
            

    </section>
</section>

