<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Barcode-<?= $row->nama ?></title>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/notika/css/bootstrap.min.css">
</head>

<body>
	<?php 
		echo '<span style="font-size:20px;font-weight:bold;">'.$row->nama.'<span>';
	?>
	<div class=" container-fluid">
		<div class="row">
			<table width="100%">

				<?php
				for($i=1;$i<9;$i++)
				{
				?>
				<tr>
					<th width=" 25%" height="50px" width="50px" style="text-align:center;vertical-align: bottom;">
						<?php $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
						echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode,$generator::TYPE_CODE_128)) . '"><br>'; 
						?>
					</th>
					<th width="25%" height="50px" width="50px" style="text-align:center;vertical-align: bottom;">
						<?php $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
						echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode,$generator::TYPE_CODE_128)) . '"><br>'; 
						?>
					</th>
					<th width="25%" height="50px" width="50px" style="text-align:center;vertical-align: bottom;">
						<?php $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
						echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode,$generator::TYPE_CODE_128)) . '"><br>'; 
						?>
					</th>
					<th width="25%" height="50px" width="50px" style="text-align:center;vertical-align: bottom;">
						<?php $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
						echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode,$generator::TYPE_CODE_128)) . '"><br>'; 
						?>
					</th>
				</tr>
				<tr>
					<th width="25%" height="30px" width="50px" style="text-align:center;vertical-align: top;">
						<?= $row->barcode ?>
					</th>
					<th width="25%" height="30px" width="50px" style="text-align:center;vertical-align: top;">
						<?= $row->barcode ?>
					</th>
					<th width="25%" height="30px" width="50px" style="text-align:center;vertical-align: top;">
						<?= $row->barcode ?>
					</th>
					<th width="25%" height="30px" width="50px" style="text-align:center;vertical-align: top;">
						<?= $row->barcode ?>
					</th>
				</tr>
				<?php
				} 
				?>
			</table>
		</div>
	</div>

</body>

</html>
