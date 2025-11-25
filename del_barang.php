<?php 
include 'koneksi.php';
$id=$_GET['id'];
mysqli_query($conn, "delete from barang where id_barang='$id'");
echo "<script>alert('Delete Data Berhasil');document.location='barang.php'</script>";

?>