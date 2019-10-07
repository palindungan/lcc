<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap 101 Template</title>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/notika/css/bootstrap.min.css">
</head>

<body>

	<div class=" container-fluid">
		<div class="row">
			<caption>Data Laporan Hari Ini</caption>
			<table width="100%" class="table" border="1">
				<tr>
					<th width="5%" style="text-align: center;background:black;color:white;">No</th>
					<th width="18%" style="text-align: center;background:black;color:white;">Nama Customer</th>
					<th width="18%" style="text-align: center;background:black;color:white;">Tanggal</th>
					<th width="18%" style="text-align: center;background:black;color:white;">Nama Barang</th>
					<th width="18%" style="text-align: center;background:black;color:white;">Harga Jual</th>
					<th width="5%" style="text-align: center;background:black;color:white;">Qty</th>
					<th width="18%" style="text-align: center;background:black;color:white;">Total</th>
				</tr>
				<?php 
$no_hari = 1;
$total_hari=0;
foreach($hari as $row_hari){ 
?>
				<tr>
					<td style="text-align: center;"><?= $no_hari++; ?></td>
					<td style="text-align: left;"><?= $row_hari->nama_customer; ?></td>
					<td style="text-align: center;"><?= $row_hari->tanggal_penjualan; ?></td>
					<td style="text-align: center;"><?= $row_hari->nama_barang; ?></td>
					<td style="text-align: right;"><?= rupiah($row_hari->harga_jual) ?></td>
					<td style="text-align: center;"><?= $row_hari->jumlah_barang; ?></td>
					<td style="text-align: right;"><?= rupiah($row_hari->total_harga) ?></td>
				</tr>
				<?php 
$total_hari += $row_hari->total_harga;
} 
?>
				<?php 
if($total_hari == "")
{
    echo "0" ;
}
else {
    echo '<h4 style="float: right;">Sub Total :  .'.rupiah($total_hari).'</h4>"';
}
?>
			</table>
		</div>
	</div>

</body>

</html>
