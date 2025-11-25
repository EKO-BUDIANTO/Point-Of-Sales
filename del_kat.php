<?php 
include 'koneksi.php';
$id=$_GET['id'];
mysqli_query($conn, "delete from kategori where id_kategori='$id'");
echo "<script>alert('Delete Data Berhasil');document.location='kategori.php'</script>";

?>