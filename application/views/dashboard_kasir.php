<section id="main-content">
    <section class="wrapper">
      
          
        <h1><i class="fa fa-angle-right"></i> KASIR</h1><hr>
        
            <div class="row mt">
              <div class="col-lg-12">
             
                  <div class="form-panel">
                  
                    <table class="table table-hover">
                        <tr>
                            <td>Gambar</td>
                            <td>Produk</td>
                            <td>Deskripsi</td>
                            <td>Harga</td>
                        
                            <td></td>
                        </tr>
                             <?php foreach ($produk as $key ):  ?>  
                            <tr>
                            <td><img src=<?=base_url("bower_components/uploads")."/".$key->gambar?> alt="" align="center"></td>
                            <td><?php echo $key->nama_produk ?></td>
                            <td><?php echo $key->deskripsi; ?></td>
                            <td><?php echo $key->harga; ?></td>
                            

                        
                            <td>
                                <a href="<?=site_url()?>/kasir/index2/<?php echo $key->id_produk ?>"><span button class="btn btn-success">submit</span></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                 
        
                  </div>
              </div>
            </div>
        
            

    </section>
</section>