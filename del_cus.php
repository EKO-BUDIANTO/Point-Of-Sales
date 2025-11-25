<?php 
include 'koneksi.php';
$id=$_GET['id'];
mysqli_query($conn, "delete from customer where id_customer='$id'");
echo "<script>alert('Delete Data Berhasil');document.location='customer.php'</script>";

?>