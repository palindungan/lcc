<?php
 // Define relative path from this script to mPDF
 $nama_dokumen='Nama Dokumen';
// include "mpdf60/mpdf.php";
 require_once('assets/vendor/mpdf60/mpdf.php');
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--START-->
<table style="width:100%; border-collapse: collapse;" border="1">
  <caption>Data Laporan</caption>
  <tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Total</th>
    <th>Bayar</th>
    <th>Kembalian</th>
  </tr>
<?php 
$no = 1;
foreach($hari as $row_hari){ 
?>
<tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $row_hari->tanggal ?></td>
    <td style="text-align:right; "><?php echo $row_hari->total ?></td>
    <td style="text-align:right; "><?php echo $row_hari->bayar ?></td>
    <td style="text-align:right; "><?php echo $row_hari->kembalian ?></td>
</tr>
<?php } ?>
</table>
<!--END-->
 
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>