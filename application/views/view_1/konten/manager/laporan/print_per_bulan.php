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
  <th width="14%">No</th>
  <th width="14%">Nama Customer</th>
  <th width="14%">Tanggal</th>
  <th width="14">Nama Barang</th>
  <th width="14">Harga Jual</th>
  <th width="14%">Jumlah Barang</th>
  <th width="14%">Total</th>
  </tr>
<?php 
$no_bulan = 1;
foreach($bulanan as $row_bulan){ 
?>
<tr>
  <td><?= $no_bulan++; ?></td>
  <td><?= $row_bulan->nama_customer; ?></td>
  <td><?= $row_bulan->tanggal_penjualan; ?></td>
  <td><?= $row_bulan->nama_barang; ?></td>
  <td><?= $row_bulan->harga_jual; ?></td>
  <td><?= $row_bulan->jumlah_barang; ?></td>
  <td><?= $row_bulan->total_harga; ?></td>
</tr>
<?php } ?>
</table>
    </div>
  </div>

</body>

</html>
