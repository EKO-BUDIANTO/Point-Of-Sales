<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Barang</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>

<body>
<?php
if(isset($_POST["simpan"])){
	
	include_once "koneksi.php";
	$idbar=$_POST["id_barang"];
	$namabar=$_POST["nama_barang"];
	$idkat=$_POST["id_kategori"];
	$stok=$_POST["stok"];
	$tgl=$_POST["tgl_beli"];
	$beli=$_POST["harga_beli"];
	$jmlbeli=$_POST["jml_beli"];
	$jual=$_POST["harga_jual"];
	$sql="insert into barang (id_barang,nama_barang,id_kategori,stok,tgl_beli,harga_beli,jml_beli,harga_jual) values ('$idbar','$namabar','$idkat','$stok','$tgl','$beli','$jmlbeli','$jual')";
	$hasil=mysqli_query($conn, $sql) or die ("mysqli_error");
	echo  "<div style='margin-bottom:-55px' class='alert alert-success' role='alert' align='center'><span class='glyphicon glyphicon-ok'></span> Data Berhasil Di Simpan</div>";
}
?>
<div class="container">
  <div class="panel panel-default">	
	<div class="panel-heading" style="font-size:24px;"><b>Tambah Barang</b></div>
	<div class="panel-body">
		<form class="form-horizontal" action="" method="post">
			<div class="form-group">
				<label class="col-sm-3 control-label">ID Barang :</label>
				<div class="col-sm-2">
					<input type="text" name="id_barang" class="form-control" placeholder="ID Barang" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Barang :</label>
				<div class="col-sm-4">
					<input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">ID Kategori :</label>
				<div class="col-sm-4">
					<select name="id_kategori" class="form-control">
						<?php
						include_once "koneksi.php";
						$sql="select * from kategori";
						$a=mysqli_query($conn, $sql);
						while($bb=mysqli_fetch_array($a)){
						$kode = $bb['id_kategori'];
						$nama = $bb['nama_kategori'];
		
						echo "<option  value='$kode'>$kode,$nama</option>";
						}?>
	
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Stok :</label>
				<div class="col-sm-4">
					<input type="number" name="stok" class="form-control" placeholder="Stok" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Tanggal Beli :</label>
				<div class="col-sm-4">
					<input type="date" name="tgl_beli" class="form-control" placeholder="Tanggal" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Harga Beli :</label>
				<div class="col-sm-3">
					<input type="text" name="harga_beli" class="form-control" placeholder="Harga Beli" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Jumlah Beli :</label>
				<div class="col-sm-4">
					<input type="number" name="jml_beli" class="form-control" placeholder="Jumlah" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Harga Jual :</label>
				<div class="col-sm-3">
					<input type="text" name="harga_jual" class="form-control" placeholder="Harga Jual" required>
				</div>
			</div>
				<label class="col-sm-3 control-label">&nbsp;</label>
				<div class="col-sm-3">
				<button type="submit" name="simpan" class="btn btn-primary">
				<span class="glyphicon glyphicon-save"></span>Simpan</button>
				<a href="barang.php" class="btn btn-sm btn-danger">Batal</a>
				</div>
		</form>
		</div>
	</div>
	</div>
</body>
</html>