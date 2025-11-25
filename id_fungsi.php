<?php
$today = date("Ymd");
 
// cari id transaksi terakhir yang berawalan tanggal hari ini
$query = "SELECT max(id_penjualan) AS last FROM penjualan WHERE id_penjualan LIKE '$today%'";
$hasil = mysqli_query($conn, $query);
$data  = mysqli_fetch_array($hasil);
$lastNoTransaksi = $data['last'];
 
// baca nomor urut transaksi dari id transaksi terakhir
$lastNoUrut = substr($lastNoTransaksi, 8, 4);
 
// nomor urut ditambah 1
$nextNoUrut = $lastNoUrut + 1;
 
// membuat format nomor transaksi berikutnya
$nextNoTransaksi = $today.sprintf('%04s', $nextNoUrut);
?>