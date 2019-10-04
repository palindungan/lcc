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
    <th style="text-align: center;">No</th>
    <th style="text-align: center;">Tanggal</th>
    <th style="text-align: center;">Total</th>
    <th style="text-align: center;">Bayar</th>
    <th style="text-align: center;">Kembalian</th>
  </tr>
<?php 
$no = 1;
foreach($bulanan as $row_bulan){ 
?>
<tr>
    <td style="text-align: center;"><?php echo $no++ ?></td>
    <td style="text-align: center;"><?php echo $row_bulan->tanggal ?></td>
    <td style="text-align:right; "><?php echo $row_bulan->total ?></td>
    <td style="text-align:right; "><?php echo $row_bulan->bayar ?></td>
    <td style="text-align:right; "><?php echo $row_bulan->kembalian ?></td>
</tr>
<?php } ?>
</table>
    </div>
  </div>

</body>

</html>
