<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

	<thead>
		<tr>
			<th>no</th>
			<th>Gambar</th>
			<th>Nama</th>
			<th>Kategori</th>
			<th>Deskripsi</th>
			<th>Harga</th>
		 </tr>
	</thead>

	<tbody>

	<?php $i=1; foreach($buku as $key) { ?>

		<tr>
			<td align="center"><?php echo $i; ?></td>
			<td align="center"><img src=<?=base_url("bower_components/uploads")."/".$key->gambar?> alt="" align="center"></td>
			<td align="center"><?php echo $key->nama_produk ?></td>
			<td align="center"><?php echo $key->kategori ?></td>
			<td align="center"><?php echo $key->deskripsi ?></td>
			<td align="center"><?php echo $key->harga ?></td>

		 </tr>

	<?php $i++; } ?>

	</tbody>

</table>