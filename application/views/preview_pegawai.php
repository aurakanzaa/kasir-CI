<!DOCTYPE html>
<html>
<head>
  <title>Laporan</title>
  <style>
  table{
    border-collapse: collapse;
    width:70%;
    margin: 0 auto;
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
      <!-- <td colspan="" style="border:0px"></td> -->
      <td colspan="" align="center" style="border: 0px"><br><br>
      <img src="<?php echo base_url('/assets/img/cashier.png'); ?>" alt="" align="center" width="100" height="100"> 
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

  <table>
    <tr>
      <td colspan="7" style="border:0px">
        <hr size="3" style="background-color: black"></hr>
        <h2 style="text-align: center">Daftar Pegawai</h2>
      </td> 
    </tr>

    <tr>
      <th>no</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Ava</th>
      <th>Telp</th>
      <th>Username</th>
      <th>Role</th>

    </tr>

    <?php $no=0; foreach($pegawai as $key){
      $no++;
      ?>
      <tr>
        <td align="center"><?php echo $no; ?></td>
        <td align="center"><?php echo $key->nama ?></td>
        <td align="center"><?php echo $key->email ?></td>
        <td align="center"><img src=<?=base_url("bower_components/uploads")."/".$key->ava?> alt="" align="center"></td>
        <td align="center"><?php echo $key->telp ?></td>
        <td align="center"><?php echo $key->username ?></td>
        <td align="center"><?php echo $key->role ?></td>
        
      </tr>
      <?php }?>
    </table>
    <p style="text-align: center"><a href="<?php echo base_url()?>index.php/Cetak/cetakPegawai">Cetak PDF</a></p>
    
</body>
</html>

