<style type="text/css">
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    /*overflow: auto;*/
    background-color:#54df7b;
	width: 100%;
	height:60px;
}
	img.pinggir{
		float: left;
		margin: 15px;
		width: 200px;
		height: 50px;
	}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: orange;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #9cecb2;
    min-width: 160px;
    box-shadow: 10px 8px 16px 10px rgba(0,0,0,0.2);
    z-index: 100;
}

.dropdown-content ul{
	min-height : 60px;
	z-index: 101;
}
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
.kanan{
	background-color: orange;
}
</style>
<ul>
  
  <li><a href="index.php">Home</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Master</a>
    <div class="dropdown-content">
      <a href="barang.php">Barang</a>
      <a href="kategori.php">Kategori</a>
      <a href="customer.php">Customer</a>
	  <a href="supplier.php">supplier</a>
    </div>
	
  </li>
  <li><a href="penjualan.php">Penjualan</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Laporan</a>
    <div class="dropdown-content">
      <a href="lapbarang.php">Barang</a>
      <a href="laporan.php">Penjualan</a>
  <li style="float:right"><a class="kanan" href="logout.php">Logout</a></li>
</ul>
