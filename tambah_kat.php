<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Kategori Barang</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>

<body>
<?php
if(isset($_POST["simpan"])){
	
	include_once "koneksi.php";
	$idkat=$_POST["id_kategori"];
	$namakat=$_POST["nama_kategori"];
	$sql="insert into kategori (id_kategori,nama_kategori)
	values ('$idkat','$namakat')";
	$hasil=mysqli_query($conn, $sql) or die ("mysqli_error");
	echo  "<div style='margin-bottom:-55px' class='alert alert-success' role='alert' align='center'><span class='glyphicon glyphicon-ok'></span>  Data Berhasil Di Simpan</div>";
}
?>
<div class="container">
  <div class="panel panel-default">	
	<div class="panel-heading" style="font-size:24px;"><b>Tambah Kategori Barang</b></div>
	<div class="panel-body">
		<form class="form-horizontal" action="" method="post">
			<div class="form-group">
				<label class="col-sm-3 control-label">ID Kategori :</label>
				<div class="col-sm-2">
					<input type="text" name="id_kategori" class="form-control" placeholder="ID Kategori" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Kategori :</label>
				<div class="col-sm-4">
					<input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" required>
				</div>
			</div>
				<label class="col-sm-3 control-label">&nbsp;</label>
				<button type="submit" name="simpan" class="btn btn-primary">
				<span class="glyphicon glyphicon-save"></span>Simpan</button>
				<a href="kategori.php" class="btn btn-sm btn-danger">Batal</a>
		</form>
		</div>
	</div>
	</div>
</body>
</html>