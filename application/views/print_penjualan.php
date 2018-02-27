<!DOCTYPE html>
<head>
  <title>Laporan</title>
  <style>
  table{
    border-collapse: collapse;
    width:100%;
    margin:0 auto;
  }

  table th{
    border:1px solid #000;
    padding: 3px;
    font-weight: bold;
    text-align: center;
  }
  table td{
    border: 1px solid #000;
    padding: 3px;
    vertical-align: top;
  }
  </style>
</head>
<body>
  <table>
    <tr>
      <!-- <td colspan="1" style="border:0px"></td> -->
      <td colspan="" align="center" style="border: 0px"><br><br>
      <img src="assets/img/cashier.png" width="100" height="100" alt="">
      </td>

      <td colspan="" style="text-align: left; border: 0px">
      <br><br>
        <br><b>KEYHUT</b><br>
        Jl. Soekarno Hatta no. 9 Malang 65141<br>
        Telp.  +880-31-000-000 Fax +880-31-000-000<br>
        <a href="<?php echo base_url()?>http://www.google.co.id/"> hello@keyhut.com</a>
      </td>

      
    </tr>
  </table>
  <br><br><br><br><br><br><br>
  <table>
    <tr>
      <td colspan="6" style="border:0px">
        <hr size="3" style="background-color: black"></hr><br><br>
        <h2 style="text-align: center">Data Penjualan</h2>
      </td> 
    </tr>
    
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Tgl Order</th>
      <th>Harga</th>
      <th>qty</th>
      <th>Total Harga</th>
      
    </tr>

    <?php $no=0; foreach($penjualan as $key){
      $no++;
      ?>
      <tr>
        <td align="center"><?php echo $no; ?></td>
        <td align="center"><?php echo $key->nama_produk ?></td>
        <td align="center"><?php echo $key->tanggal_order ?></td>
        <td align="center"><?php echo $key->harga ?></td>
        <td align="center"><?php echo $key->qty ?></td>
        <td align="center"><?php echo $key->total_harga ?></td>
        
      </tr>
      <?php }?>
    </table>
  </body>
  </html>


