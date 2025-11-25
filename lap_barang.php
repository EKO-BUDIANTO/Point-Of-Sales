<?php
include "koneksi.php";
//class ezpdf yg di panggil
include "pdf/class.ezpdf.php"; 
$pdf = new Cezpdf('A4','lanscape');

//Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('pdf/fonts/Times-Roman.afm');

//Tampilkan gambar di dokumen PDF
$pdf->addJpegFromFile('pdf/logo1.jpeg',40,772,70);

//Teks di tengah atas untuk judul header
$pdf->addText(265, 815, 14,'<b>Point Of Sales Vol.1</b>');
$pdf->addText(269, 800, 12,'<b>Daftar Barang</b>');
$pdf->addText(210, 785, 10,'Kramat Senen Blok b No.2');
//Garis atas untuk header
$pdf->line(2, 770, 590, 770);

//Garis bawah untuk footer
$pdf->line(2, 50, 590, 50);

//Teks kiri bawah
date_default_timezone_set("Asia/Jakarta");
$pdf->addText(410,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

//Koneksi ke database dan tampilkan datanya
$conn = mysqli_connect($server,$username,$pass,$db);
mysqli_select_db($conn, "1APOS");

$Dari=$_POST['Dari'];
$Sampai=$_POST['Sampai'];

$tampil = " select * from barang WHERE (tgl_beli BETWEEN '$Dari' AND '$Sampai');";
$sql = mysqli_query($conn, $tampil);  
$jml = mysqli_num_rows($sql);
if ($jml > 0){
$i = 1;
$sum = 0;
while($r = mysqli_fetch_array($sql)) {
$total = $r['harga_beli'] * $r['jml_beli'];
//Format Menampilkan data di ezPdf
 $data[$i]=array('No'=>$i,
       'Id Barang'=>"$r[id_barang]",
       'Nama Barang'=>"$r[nama_barang]",
       'Tanggal Beli'=>"$r[tgl_beli]",
       'Harga Beli'=>"$r[harga_beli]",
	   'Jumlah Beli'=>"$r[jml_beli]",
       'Total'=>"$total"
       );
 $i++;
 $sum = $sum + $total;
}

//Tampilkan Dalam Bentuk Table
$pdf->ezTable($data);

$pdf->ezText("\nGrand Total : $sum");
$pdf->ezText("\nPeriode: $Dari s/d $Sampai");

// Penomoran halaman
$pdf->ezStartPageNumbers(700, 20, 8);
$pdf->ezStream();
}

else{

 echo "
 <script>
 alert('Data Barang Tidak Ada');
 </script>
 ";

}
?>