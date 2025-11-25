<?php 
include 'koneksi.php';
$id=$_GET['id'];
mysqli_query($conn, "delete from supplier where id_supplier='$id'");
echo "<script>alert('Delete Data Berhasil');document.location='supplier.php'</script>";

?>