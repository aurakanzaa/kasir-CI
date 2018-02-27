<section id="main-content">
  <section class="wrapper site-min-height">
  <!-- left -->
   <div class="col-md-12 mt">
      <div class="content-panel">
        <br>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="<?php echo base_url('index.php/Pegawai/form_pegawai'); ?>"><button type="button" class="btn btn-success "><i class="fa fa-plus"> </i> Pegawai</button></a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="<?php echo base_url('index.php/Cetak/indexPegawai'); ?>"><button type="button" class="btn btn-warning "><i class="fa fa-print"> </i> Cetak Pegawai</button></a>
        <br><br>
        <table class="table table-hover">
          <h4><i class="fa fa-angle-right"></i> Data Pegawai</h4>
          <hr>

          <tbody>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Telp</th>
              <th>Username</th>
              <th>Password</th>
              <th>Opsi</th>
            </tr>
            <?php foreach ($peg as $key): ?>
              <tr>
                <th><?php echo $key->nama; ?></th>
                <th><?php echo $key->email; ?></th>
                <th><?php echo $key->telp; ?></th>
                <th><?php echo $key->username; ?></th>
                <th><?php echo $key->pass; ?></th>
                <td>
                  <a class="btn btn-theme03 btn-xs" href="<?php echo base_url('index.php/Pegawai/update'); ?>/<?php echo $key->id ?>">
                  <i class="fa fa-pencil"></i></a>

                  <a class="btn btn-danger btn-xs" href="<?php echo base_url('index.php/Pegawai/delete'); ?>/<?php echo $key->id ?>">
                  <i class="fa fa-trash-o"></i></a>
                </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
      
      </div>
    </div>

   <!--  right -->
     <!-- <div class="col-md-6 mt">
      <div class="content-panel">
      ajskaksj <br> asnaj
      </div>
    </div> -->
  </section>
</section>