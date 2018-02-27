<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <br>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo base_url('index.php/kat/form_kategori'); ?>"><button type="button" class="btn btn-success "><i class="fa fa-plus"> </i> Tambah Kategori</button></a>
    <br>
    
    <div class="col-md-12 mt">
      <div class="content-panel">
        <table class="table table-hover">
          
          <h4><i class="fa fa-angle-right"></i> Kategori Produk</h4>
          <hr>
          <tbody>
            <tr>
              <th>Kategori</th>
              <th align="center">Edit | Delete</th>
            </tr>
            <?php foreach ($kat as $key): ?>
            <tr>
              <th><?php echo $key->kategori ?></th>
              <td>
                <a class="btn btn-primary btn-xs" href="<?php echo base_url('index.php/kat/update'); ?>/<?php echo $key->id_kategori ?>">
                  <i class="fa fa-pencil"></i>
                </a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btn btn-danger btn-xs" href="<?php echo base_url('index.php/kat/delete'); ?>/<?php echo $key->id_kategori ?>">
                  <i class="fa fa-trash-o"></i>
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      </div><!-- /col-md-12 -->
      
    </section>
    </section><!-- /MAIN CONTENT -->