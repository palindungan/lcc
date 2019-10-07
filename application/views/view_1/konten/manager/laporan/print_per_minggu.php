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
      <table style="width:100%; border-collapse: collapse;" border="1">
  <caption>Data Laporan</caption>
  <tr>
  <th width="5%" style="text-align: center;">No</th>
  <th width="14%" style="text-align: center;">Nama Customer</th>
  <th width="14%" style="text-align: center;">Tanggal</th>
  <th width="14%" style="text-align: center;">Nama Barang</th>
  <th width="14%" style="text-align: center;">Harga Jual</th>
  <th width="5%" style="text-align: center;">Jumlah Barang</th>
  <th width="14%" style="text-align: center;">Total</th>
  </tr>
<?php 
$no_minggu = 1;
$total_minggu = "";
foreach($minggu as $row_minggu){ 
?>
<tr>
  <td style="text-align: center;"><?= $no_minggu++; ?></td>
  <td style="text-align: left;"><?= $row_minggu->nama_customer; ?></td>
  <td style="text-align: center;"><?= $row_minggu->tanggal_penjualan; ?></td>
  <td style="text-align: center;"><?= $row_minggu->nama_barang; ?></td>
  <td style="text-align: right;"><?= rupiah($row_minggu->harga_jual) ?></td>
  <td style="text-align: center;"><?= $row_minggu->jumlah_barang; ?></td>
  <td style="text-align: right;"><?= rupiah($row_minggu->total_harga) ?></td>
</tr>
<?php 
$total_minggu += $row_minggu->total_harga;
} 
?>
<h4 style="float: right;">Sub Total : <?= rupiah($total_minggu) ?></h4>
</table>
    </div>
  </div>

</body>

</html>
