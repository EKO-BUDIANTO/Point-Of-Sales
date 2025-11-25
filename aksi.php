<?php
session_start();
include "koneksi.php";
include "id_fungsi.php";

$id_transaksi = $_POST["id_transaksi"];
$customer = $_POST["customer"];
$tanggal_transaksi = $_POST["tanggal_transaksi"];
$idBrg = $_POST["idBarang"];
$jmlBrg = $_POST["jmlBrg"];
$bayar = $_POST["bayar"];
$kembali = $_POST["kembali"];
$txtJumlah	= $_POST['Stock'];

$date = date('Y-m-d', strtotime($tanggal_transaksi));

 
$query = "insert into penjualan(id_penjualan, id_customer, tanggal_jual, bayar, kembali ) values ('$id_transaksi','$customer', '$date', '$bayar','$kembali')";
$mysqlQ = mysqli_query($conn, $query);
// echo $query."<br>";
foreach($idBrg as $key => $n)
{
	//echo "idBrg ". $n ." jmlBrg ". $jmlBrg[$key];
	// insert ke tabel detail_penjualan	
	$qDetail = "INSERT INTO detail_penjualan (id_penjualan, id_barang, jumlah) VALUES ('$id_transaksi', '$n', $jmlBrg[$key])";
		$jml_new=$jmlBrg[$key];
	$sql = mysqli_query($conn, $qDetail);
	
	// update stok barang
	$mBarang = mysqli_fetch_array(mysqli_query($conn, "select stok from barang where id_barang='$n'"));
	$stok_jual2 = $mBarang["stok"];
	$stok_jual3 = $stok_jual2 - $jml_new;
	$query3 = mysqli_query($conn, "update barang set stok=$stok_jual3 where id_barang='$n'
	");
	// echo $qDetail . "<br/>";
}


echo "<script type='text/javascript'>alert('Data berhasil disimpan')</script>";
echo "<script>document.location.href='penjualan.php';</script>";	
 
?>