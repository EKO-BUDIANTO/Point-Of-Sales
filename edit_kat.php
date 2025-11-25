<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Kategori Barang</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>

<body>
<?php
include "koneksi.php";
if(isset($_POST['baten'])){
	$idkat=$_GET["id"];
	$namakat=$_POST["txtnamakat"];
	  $sql="update kategori set nama_kategori='$namakat' 
			where id_kategori='$idkat'";
	  $hasil=mysqli_query($conn, $sql);
	  header("location:kategori.php?pesan=sukses");
}
elseif(isset($_GET['id'])){
	$sql="select * from kategori where id_kategori='".$_GET['id']."'";
	$h=mysqli_query($conn, $sql);
	$b=mysqli_fetch_array($h);
}
	
	?>
<div class="container">
  <div class="panel panel-default">	
	<div class="panel-heading" style="font-size:24px;"><b>Edit Barang</b></div>
	<div class="panel-body">
		<form class="form-horizontal" action="" method="post">
			<div class="form-group">
				<label class="col-sm-3 control-label">ID Kategori :</label>
				<div class="col-sm-2">
					<input type="text" name="txtidkat" value="<?php echo $b ['id_kategori']; ?>" class="form-control" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Kategori :</label>
				<div class="col-sm-4">
					<input type="text" name="txtnamakat" value="<?php echo $b ['nama_kategori']; ?>" class="form-control" required>
				</div>
			</div>
				<label class="col-sm-3 control-label">&nbsp;</label>
				<button type="submit" name="baten" class="btn btn-primary">
				<span class="glyphicon glyphicon-save"></span>Simpan</button>
				<a href="kategori.php" class="btn btn-sm btn-danger">Batal</a>
		</form>
	</div>
	</div>
	</div>
</body>
</html>