<?php
	include "koneksi.php";
	include 'header.php';
	session_start();
	if(empty($_SESSION['user_id']))
	{
		header('Location: login.php');
	}
?>
<html>
<head>
<title>Halaman Utama</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<style>
div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 255px;
}

div.gallery:hover {
    border: 1px solid Blue;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div {
    padding: 1px;
    text-align: center;
}

button.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: center;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #ddd;
}

button.accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

button.accordion.active:after {
    content: "\2212";
}

div.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
</style>
</head>	
<button class="accordion">Menu</button>
	<div class="panel">
		<div class="gallery">
			<a href="kategori.php">Kategori Barang</a>
			<a href="kategori.php">
			<img src="image/kategori.jpg" alt="kategori" width="400" height="300">
			</a>
		</div>
		<div class="gallery">
			<a href="barang.php">Barang</a>
			<a href="barang.php">
			<img src="image/barang.jpg" alt="barang" width="400" height="300">
			</a>
		</div>
		<div class="gallery">
			<a href="customer.php">Customer</a>
			<a href="customer.php">
			<img src="image/customer1.jpg" alt="customer" width="400" height="300">
			</a>
		</div>
		<div class="gallery">
			<a href="supplier.php">Supplier</a>
			<a href="supplier.php">
			<img src="image/supplier1.jpg" alt="supplier" width="400" height="300">
			</a>
		</div>
		<div class="gallery">
			<a href="penjualan.php">Penjualan</a>
			<a href="penjualan.php">
			<img src="image/penjualan.jpg" alt="penjualan" width="400" height="300">
			</a>
		</div>
	</div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }
}
</script>
</html>
<?php 
include 'footer.php';
?>