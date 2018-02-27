<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$session_data = $this->session->userdata('logged_in');
$data['username'] = $session_data['username'];
$data['id'] = $session_data['id'];
?>
<section id="main-content">
    <section class="wrapper">
      
          
        <h1><i class="fa fa-angle-right"></i> KASIR</h1><hr>
        
            <div class="row mt">
              <div class="col-lg-12">
                
                  <div class="form-panel">
                  <form action="<?php echo site_url('kasir/kembalian'); ?>" method="POST" >
                    <h5 class="left">Nama Cashier : <?= $session_data['username'];?></h5>
                    <h5 class="left">Id Cashier : <?= $session_data['id'];?></h5>

                    <table class="table table-hover">
                        <tr>
                            <td>Gambar</td>
                            <td>Produk</td>
                            <td>qty</td>
                            <td>Harga</td>
                            <td >Total Harga</td>
                            <td >Delete</td>
                        </tr>
                             
                        <?php foreach ($det as $key ):  ?>  
                            <tr>
                            <td><img src=<?=base_url("bower_components/uploads")."/".$key->gambar?> alt="" align="center"></td>
                            <td><?php echo $key->nama_produk ?></td>
                            <td ><?php echo $key->qty; ?></td>
                            <td ><?php echo $key->harga; ?></td>
                            <td><?php echo $key->total_harga; ?></td>
                            

                        
                            <td>
                                <a href="<?=site_url()?>/kasir/delete/<?php echo $key->id_detail ?>"><span button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></span></a>
                            </td>
                        </tr>
                          <?php endforeach; ?>
                        <!-- ini buat nampilin harga dari total belanjaan -->
                        <tr>
                            <td colspan="4" align="right">Jumlah</td>
                            <td>
                                <div class="col-sm-7">
                                    <input type="number" value="<?php echo $jum[0]->Total?>" class="form-control" name="harga" readonly="">
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        
                        <!-- ini buat masukin uang yang dikasih pelanggan ke kasir -->
                        <tr>
                            <td colspan="4" align="right">Uang</td>
                            <td>
                                <div class="col-sm-7">
                                    <input name="uang" type="number" class="form-control"  >
                                </div>
                            </td>
                            <td>
                                <!-- buat lanjut ke halaman berikutnya -> nampilin kembalian -->
                                <input type="submit" name="" value="BAYAR" class="btn btn-primary">
                            </td>
                        </tr>

                        
                    </table>
               </form>
                  </div>
                    
              </div>
            </div>
        
            

    </section>
</section>