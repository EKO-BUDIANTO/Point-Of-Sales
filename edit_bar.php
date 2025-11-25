<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Barang</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>

<body>
<?php
include "koneksi.php";
if(isset($_POST['baten'])){
	$idbar=$_GET["id"];
		$namabar=$_POST["txtnamabar"];
	  $idkat=$_POST["cmbidkat"];
	  $stok=$_POST["txtstok"];
	  $tgl=$_POST["txttgl"];
	  $beli=$_POST["txtbeli"];
	  $jmlbeli=$_POST["txtjmlbeli"];
	  $jual=$_POST["txtjual"];
	  $sql="update barang set nama_barang='$namabar',id_kategori='$idkat',stok=stok+$jmlbeli, tgl_beli='$tgl',
	  		harga_beli='$beli',jml_beli=$jmlbeli,harga_jual='$jual' 
			where id_barang='$idbar'";
//die($sql);
	  $hasil=mysqli_query($conn, $sql);
	  header("location:barang.php?pesan=sukses");
}
elseif(isset($_GET['id'])){
	$sql="select * from barang where id_barang='".$_GET['id']."'";
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
				<label class="col-sm-3 control-label">ID Barang :</label>
				<div class="col-sm-2">
					<input type="text" name="txtidbar" value="<?php echo $b ['id_barang']; ?>" class="form-control" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Barang :</label>
				<div class="col-sm-4">
					<input type="text" name="txtnamabar" value="<?php echo $b ['nama_barang']; ?>" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">ID Kategori :</label>
				<div class="col-sm-4">
					<select name="cmbidkat" value="<?php echo $b ['id_kategori']; ?>" class="form-control">
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
					<input type="number" name="txtstok" value="<?php echo $b ['stok']; ?>" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Tanggal Beli :</label>
				<div class="col-sm-4">
					<input type="date" name="txttgl" value="<?php echo $b ['tgl_beli']; ?>" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Harga Beli :</label>
				<div class="col-sm-4">
					<input type="text" name="txtbeli" value="<?php echo $b ['harga_beli']; ?>" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Jumlah Beli :</label>
				<div class="col-sm-4">
					<input type="number" name="txtjmlbeli" value="<?php echo $b ['jml_beli']; ?>" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Harga Jual :</label>
				<div class="col-sm-4">
					<input type="text" name="txtjual" value="<?php echo $b ['harga_jual']; ?>" class="form-control" required>
				</div>
			</div>
				<label class="col-sm-3 control-label">&nbsp;</label>
				<button type="submit" name="baten" class="btn btn-primary">
				<span class="glyphicon glyphicon-save"></span>Simpan</button>
				<a href="barang.php" class="btn btn-sm btn-danger">Batal</a>
		</form>
	</div>
	</div>
	</div>
</body>
</html>