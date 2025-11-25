<html>
<head>
   <title>Transaksi Penjualan</title>
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<div class="container">
        <h2> Transaksi Penjualan </h2>
        <?php
        include "koneksi.php";
        include "id_fungsi.php";
 
        ?>
        <?php
        session_start();
        if((empty($_GET["destroy"])==FALSE)){
         session_destroy();
 
        }
        ?>
        <form name="form11" id="formBarang" method="post" action="aksi.php">
            <table class="table table-stripped">
                <tr>
                    <td>ID Penjualan </td>
                    <td>:</td>
                    <td><input type="text" name="id_transaksi" readonly value="<?php echo $nextNoTransaksi ?>">
                    </td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><input type="text" name="tanggal_transaksi" readonly value="<?php date_default_timezone_set("Asia/Jakarta");echo date("d-m-Y");?>" />
                    </td>
                </tr>
               
			        <tr>
                   
				   <tr>
                    <td>ID Customer</td>
                    <td>:</td>
                    <td>
                        <select name="customer">
                        <?php  
                            include 'koneksi.php';
                            $query = "SELECT id_customer, nama_customer FROM customer";
                            $exec = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($exec))
                            {
                                $IdCus = $row["id_customer"];
								$NamaCus = $row["nama_customer"];
                                echo "<option value='".$row['id_customer']."'>".$row['id_customer']." - ".$row['nama_customer']."</option>"; 
                            }
                        ?>
                        </select>
                    </td>
                </tr>
				   
                </tr>
			   
                <tr>
                    <td>Nama Produk</td>
                    <td>:</td>
                    <td>
                        <select name="NamaBrg" id="cmbBarang" >
                        <?php  
                            include 'koneksi.php';
                            $query = "SELECT * FROM barang";
                            $exec = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($exec))
                            {
                                $IdBrg = $row["id_barang"];
                                $NamaBrg = $row["nama_barang"];
                                $HargaBrg = $row["harga_jual"];
                                $Stok = $row["stok"];
									echo "<option value='".$IdBrg."' data-harga='".$HargaBrg."' data-stok='".$Stok."'>".$NamaBrg."</option>";
                            }
                        ?>
                        </select>
                    </td>
                </tr>
     
                <tr>
                    <td>Jumlah Barang</td>
                    <td>:</td>
                    <td><input type="number" required name="Stock" id="Stock" value="1" onChange="cekStokBarang()" /></td>
					<td><span id="stock-alert"></span></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
						<!--<button name="button" id="TambahBarang" class="btn btn-sm btn-primary">-->
						<a href="#" name="button" id="TambahBarang" class="btn btn-sm btn-primary" >
						<span class="glyphicon glyphicon-plus"></span>Tambah</a>
                        <!--<input type="submit" name="button" value="Tambah" id="TambahBarang"  />-->
                    </td>
                </tr>
            </table>
        <!--</form>    
        <form action="actiontrans2.php" method="post"> -->
 
        <table class="table table-bordered" id="detailBarang">
			<thead>
                            <tr style="background-color:#B22222">
                            <th style="text-align:center; color:white">No.</th>
                            <th style="text-align:center; color:white">Nama Barang</th>
                            <th style="text-align:center; color:white">Harga Barang</th>
                            <th style="text-align:center; color:white">Jumlah Barang</th>
                            <th style="text-align:center; color:white">Sub Total</th>
                            <th style="text-align:center; color:white" hidden>Kode Barang</th>
							</thead>
			<tbody id="listBarang">
			</tbody>
				<tbody id="footer">
					<tr>
					
					<tr>
						<td colspan=4>
						<?php echo "Grand Bayar";?>
						</td>
							<td>
							<?php //echo " Rp. $total";?>
							<input type="text" id="grandTotal" name="grandTotal" readonly />
							</td>
					</tr>
					
						<tr>
							<td colspan=4>Bayar</td>
							<td><input type="text" name="bayar" id="bayar" />
							</td>
						</tr>
						
						<tr>
							<td colspan=4>Kembali</td>
							<td><input type="text" name="kembali" id="kembali" readonly />
							</td>
						</tr>
					<tr>
					<td colspan=6>
						<button type="submit" name="submit" id="save" class="btn btn-sm btn-primary">
						<span class="glyphicon glyphicon-save"></span>Simpan</button>
						<!--<input type='submit' value="Save" name="Simpan" />-->
						<a href="penjualan.php" class="btn btn-sm btn-danger">Batal</a>
					</td>
					</tr>            
					</tr>
				</tbody>      
            </table>
        </form>
    </div>
	
	<script>
		var barang;
		var noUrut = 0;
		var listBarang = document.getElementById("listBarang");
		var listBarang = document.getElementById("listBarang");
		var rowBrg;
		var comboBarang;
		var idBrg;
		var namaBrg;
		var hargaBrg;
		var jmlBrg;
		var stokBrg;
		var totalHarga = 0;
		var grandTotal = document.getElementById("grandTotal");
		var bayar = document.getElementById("bayar");
		var kembali = document.getElementById("kembali");
	
		function tambahBarang(){
			jmlBrg = document.getElementById("Stock").value;
			comboBarang = document.getElementById("cmbBarang");
			idBrg = comboBarang.value;
			namaBrg = comboBarang.options[comboBarang.selectedIndex].innerText;
			hargaBrg = comboBarang.options[comboBarang.selectedIndex].getAttribute('data-harga');
			console.log("Id: "+ idBrg);
			console.log("Nama: "+ namaBrg);
			console.log("Harga: "+ hargaBrg);
			console.log("Jml: "+ jmlBrg);
			
			// Create an empty <tr> element and add it to the 1st position of the table:
			var row = listBarang.insertRow(-1);
				noUrut += 1;
			// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);

			// Add some text to the new cells:
			cell1.innerHTML = noUrut;
			cell2.innerHTML = idBrg + "  -  " + namaBrg + " " + createInput(idBrg, "idBarang", "hidden", "readonly");
			cell3.innerHTML = hargaBrg;
			cell4.innerHTML = jmlBrg + " " + createInput(jmlBrg, "jmlBrg", "hidden", "readonly");
			cell5.innerHTML = (parseInt(jmlBrg) * parseInt(hargaBrg));
			totalHarga = parseInt(totalHarga) + (parseInt(jmlBrg) * parseInt(hargaBrg));
			grandTotal.value = totalHarga;
		}
		
		function hitungKembali(){
			kembali.value = parseInt(bayar.value) - parseInt(grandTotal.value);
		}
		
		function createInput(inputValue, inputName, inputType, readOnly){
			var input;
			
			input = "<input type='"+ inputType +"' id='"+ inputName +"' name='"+ inputName +"[]' value='"+ inputValue +"' "+ readOnly +" />";
			
			return input;
		}
		
		function cekStokBarang(){
			var stokAlert = document.getElementById("stock-alert");
			var pesan = "";
			var inputStock = document.getElementById("Stock");
			comboBarang = document.getElementById("cmbBarang");
			idBrg = comboBarang.value;
			namaBrg = comboBarang.options[comboBarang.selectedIndex].innerText;
			var availableStock = comboBarang.options[comboBarang.selectedIndex].getAttribute('data-stok');
			stokAlert.innerHTML = "";
			console.log("Perminataan :" + inputStock.value + ", Tersedia : " + availableStock);
			if(parseInt(inputStock.value) > parseInt(availableStock)){
				pesan = "Jumlah barang melebihi stok tersedia (" + availableStock + ")";
				document.getElementById("TambahBarang").classList.add("disabled");
			}else{
				pesan = "Barang tersedia";
				document.getElementById("TambahBarang").classList.remove("disabled");
			}
			stokAlert.innerHTML = pesan;
		}
		
		
		// document.getElementById('formBarang').onsubmit = function() {
			// return false;
		// };
		document.getElementById("TambahBarang").onclick = tambahBarang;
		document.getElementById("bayar").onkeyup = hitungKembali;
		document.getElementById("Stock").onkeyup = cekStokBarang;
		//document.getElementById("stock-alert").mouse = cekStokBarang;
		
		
		
		
	</script>