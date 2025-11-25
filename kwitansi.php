<?php
include "pdf/class.ezpdf.php"; 
$pdf = new Cezpdf('A4','lanscape');
session_start();
echo "<link href='assets/css/stylelap.css' rel='stylesheet' type='text/css'>";
include "koneksi.php";
$today = date("d-m-Y h:i:s");

echo "<h2>Faktur Penjualan</h2>";


if(isset($_GET["id"])){
?>
<?php		
		   $sql = "select (detail_penjualan.jumlah * barang.harga_jual) as Totali, detail_penjualan.id_penjualan,customer.id_customer,customer.nama_customer,penjualan.tanggal_jual,detail_penjualan.id_barang,barang.nama_barang,barang.harga_jual,detail_penjualan.jumlah,penjualan.bayar,penjualan.kembali
		   from detail_penjualan
		   inner join penjualan on detail_penjualan.id_penjualan = penjualan.id_penjualan
		   inner join customer on penjualan.id_customer = customer.id_customer
		   inner join barang on detail_penjualan.id_barang = barang.id_barang 
		   where penjualan.id_penjualan ='".$_GET["id"]."'";
	$no=1;
$data = mysqli_query($conn, $sql);
$rr = mysqli_fetch_array($data);


$id_penjualan = $rr['id_penjualan'];
$nama_customer = $rr['nama_customer'];
$nama_barang = $rr['nama_barang'];
$harga_jual = $rr['harga_jual'];
$jumlah = $rr['jumlah'];
$total = $rr['Totali'];
$bayar = $rr['bayar'];
$kembali = $rr['kembali'];

echo "<table>
<tr><td colspan='5'>No Nota : $id_penjualan</td></tr>
<tr><td class='left'colspan='2'>Tanggal : $today </td></tr>
		<tr><td colspan='5'>Nama Customer : $nama_customer</td></tr></table>";

		?>
		
<table class='list'>

<thead>
<tr>
	<td class='left' width='25'>No.</td>
	<td class='left'>Nama Barang</td>
	<td class='left'>Harga Jual</td>
	<td class='left'>Jumlah</td>
	<td class='left'>Sub Total</td>
</tr>
</thead>

<?php		
		   $sql = "select (detail_penjualan.jumlah * barang.harga_jual) as Totali, detail_penjualan.id_penjualan,customer.id_customer,customer.nama_customer,penjualan.tanggal_jual,detail_penjualan.id_barang,barang.nama_barang,barang.harga_jual,detail_penjualan.jumlah,penjualan.bayar,penjualan.kembali
		   from detail_penjualan
		   inner join penjualan on detail_penjualan.id_penjualan = penjualan.id_penjualan
		   inner join customer on penjualan.id_customer = customer.id_customer
		   inner join barang on detail_penjualan.id_barang = barang.id_barang 
		   where penjualan.id_penjualan ='".$_GET["id"]."'";
	$no=1;
	$wow=0;
$data = mysqli_query($conn, $sql);
while($rr = mysqli_fetch_array($data)){

$today = $rr['tanggal_jual'];
$id_penjualan = $rr['id_penjualan'];
$nama_customer = $rr['nama_customer'];
$nama_barang = $rr['nama_barang'];
$harga_jual = $rr['harga_jual'];
$jumlah = $rr['jumlah'];
$total = $rr['Totali'];
$bayar = $rr['bayar'];
$kembali = $rr['kembali'];

	

echo "<tr><td class='left'>$no</td>
		<td class='left'>$nama_barang</td>
		<td class='left'>$harga_jual</td>
		<td class='left'>$jumlah</td>
		<td class='left'>$total</td>
	</tr>";
	$no++;
	$wow = $wow + $total;
echo "<br>";
}

echo "</table></td></tr>
<tr>
<td class='right'>Grand Total : $wow</td>
</tr>
<tr>
<td class='left'>&nbsp;</td><td class='right'>Bayar : $bayar</td>
</tr>
<tr>
<td class='left'>&nbsp;</td><td class='right'>Kembali : $kembali</td>
</tr>
</tbody>

</table>";
}
?>
<script type='text/javascript'>
	window.print();
</script>