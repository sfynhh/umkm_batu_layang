<!DOCTYPE html>
<html>
<head>
	<title>DATA CAT</title>
	<link rel="stylesheet" type="text/css" href="">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<style type="text/css">
		body {
			  background:  url(<?php echo base_url();?>assets/image/dashboard.jpg);
			  background-size: auto;
			  background-position: fixed;
			  background-repeat: no-repeat;
			  
		}
		.navbar {
			position: fixed;
			left: -30px;
			top: 0px;
			width: 350px;
			height: 100%;
			background:#4AECDD;
			border-radius: 30px;			
		
		}
		.navbar1 {
			position: fixed;
			left: -30px;
			top: 0px;
			width: 290px;
			height: 100%;
			top: 150px;
			background:#4AECDD;
			border-radius: 30px;			
		
		}
		div.ci{
			position: fixed;
			top:-90px;
			left: 400px;
			border-radius: 20px;
			background:#4AECDD;
			display: block;
			height: 150px

		}
		div.ci1{
			position: fixed;
			left: 50%;
			top: 20%;
			background:#4AECDD;
		     opacity: 0.6;
		
		}
		h3{
			padding-left: 130px;
			font-size: 30px;
			font-family: 'felix titling', sans-serif;

		}
		a.md {
			
			text-align: center;
			border-radius: 20px;
			padding: 5px;
			padding-right: 40px;
			padding-left: 40px;
			color: black;
			display: inline-block;
			text-decoration: none;
			margin-top: 90px;
			font-family: 'cambria math', italic;
			font-size: 20px
		}
		a.md:hover{
			background:#28FFA5;
			border-radius: 20px;
		}
		a.md:active{
			background:#1BCA81;
		}
		hr{ position: fixed;
			width: 10%;
			height: 1px;
			background:black;
			border: none;
			left: 100px;
		}
		li.dashboard{
			padding-left: 90px;
			padding-bottom: 10px;
			padding-top: 5px;
			width: 70%;

		}
		li.md{
			display: inline;
			padding-left: 10px;
			padding-right: 10px;
			padding-bottom: 30px;
			padding-top: 5px;
			width: 70%;

		}
		a.dashboard{ 
				 box-sizing: border-box;
			line-height: 20px;
			display: block;
			padding: 10px;
			font-size: 20px;
			text-decoration: none;
			font-family: 'cambria math', italic;
			color: black;
		}
		a.dashboard:hover{
			background:#28FFA5;
			border-radius: 20px;
		}
		a.dashboard:active{
			background:#1BCA81;
		}
		i{
			position: fixed;
			left: 50px;
			padding-top: 10px;
		}
		table.detail {
			position: absolute;
			right: 50px;
			top:100px;
			border:2px;
			border-color: black;
			background:#28FFA5;
			width: 50%;
			padding:5px;
			border-collapse: collapse;
  			margin-top: 0px;
		}
	/*	 tr th{
			color: black;
			border: 2px black;
			font-weight: normal;
		}
		 tr, td{
 		padding: 5px;
 		border: 2px black;
		}*/
		div.penjualan{
		position: absolute;
		width: 400px;
		top: 80px;
		left: 450px;	
		}
		div.bayar{
			position: absolute;
				width: 400px;
			right: 200px;
		}
		form {
  			padding: 1em;
  			background: #4AECDD;
  			border: 1px solid #c1c1c1;
  			margin-top: 2rem;
  			max-width: 600px;
  			margin-left: auto;
 			margin-right: auto;
  			padding: 1em;
		}
		/*form*/ input {
			  margin-bottom: 1rem;
			  background: #fff;
			  border: 1px solid #9c9c9c;
		}
		form button {
		  background: lightgrey;
		  padding: 0.7em;
		  border: 0;
		}

		label {
		  text-align: left;
		  display: block;
		  padding: 0.5em 1.5em 0.5em 0;
		}

		input {
		  width: 100%;
		  padding: 0.7em;
		  margin-bottom: 0.5rem;
		}
		
		input:focus {
		  outline: 3px solid gold;
		}
		@media (min-width: 350px) {
		  form {
		    overflow: hidden;
		  }

		  label {
		    float: left;
		    width: 250px;
		  }

		  input {
		    float: left;
		    width: calc(95% - 150px);
		  }

		  button {
		    float: right;
		    width: calc(100% - 200px);
		  }
		}
		input{
			float: left;
		}
		input.bayar{
			background:#4AECDD;
			float: right;
			border: none;
			font-family: 'cambria math', italic;
			font-size: 17px;
			text-align: right;
			height: 5px;	
		}

		select{ position: fixed;
			left: 650px; 
			top: 270px;
			margin-bottom: 1rem;
			  background: #fff;
			  border: 1px solid #9c9c9c;
			  width: 250px;
			  height: 30px;
				}
		input.cencel{
			position: absolute;
			width: 80px;
			left: 880px;
			top: 100px;
		}


	</style>
</head>
<body>
	<div class="ci">
		<ul>
			<li class="md">	
	    <a class="md" href="" style="background:#28FFA5; border-radius: 30px;">Penjualan</a>
	    	</li>
		<li class="md">	<a class="md" href="">Pembelian</a></li>
		<li class="md">	<a class="md" href="">Pembayaran</a></li>
		<li class="md">	<a class="md" href="">Retur pembelian</a></li>
		<li class="md">	<a class="md" href="">Retur penjualan</a></li>
		<li class="md">	<a class="md" href="">penerimaan(modal)</a></li>
		
	    
	   
	    </ul>
	</div>


	<div class="penjualan">
		<datalist id="cat" >
    <?php
    foreach ($cat->result() as $c)
    { ?>
         <!-- // echo "<option value='$c->merek_cat'>";  -->
         	<option value="<?php echo $c->id_cat ?>"><?php echo $c->merek_cat;echo " (Stok : ".$c->stok.")";?></option>
         	<!-- <option><?php echo "Stok : ".$c->stok; ?></option> -->
   <?php }
    ?>
    
</datalist>
	<datalist id="karyawan">

    <?php
    foreach ($karyawan->result() as $k)
    {?>
         	<option value="<?php echo $k->id_karyawan?>"><?php echo $k->nama_karyawan ?></option>
      <?php } ?>  
    
    
    
</datalist>
	<datalist id="pelanggan">

    <?php

    foreach ($pelanggan->result() as $p)
    {?>
         <!-- echo "<option value='$p->nama_pelanggan'>";  -->
         	<option value="<?php echo $p->id_pelanggan?>"><?php echo $p->nama_pelanggan ?></option>
     <?php  }
     ?>
   
    
</datalist>
	<?php 
		echo form_open('transaksipenjualan');
	 ?>
	 	<label for="id_penjualan">Id nota   :</label>
      <input type="text" name="idpenjualan" id="id_penjualan" readonly value="<?php foreach ($nota as $n){ echo $n->id_nota_penjualan+1;}?>"><br>
      <label for="tgl">Tanggal penjualan   :</label>
      <input type="text" name="date" id="tgl" value="<?php echo date ("Y-m-d") ?>"><br>
      <label for="cat">merek cat(warna) :</label>
      <input list="cat" name="cat" id="cat" placeholder="masukan nama cat" class="form-control" ><br>
      <?php echo form_error('cat'); ?>
      <label for="QTY">Quantity :</label>
      <input type="number" name="qty" max="<?php ?>" placeholder="qty" class="form-control"><br>
       <?php echo form_error('qty'); ?>
         <button type="submit" name="submit" class="">Simpan</button><br><br>
      <label for="karyawan">Karyawan  :</label>
      <input list="karyawan" name="karyawan" id="karyawan" placeholder="nama karyawan"><br>
      <label for="pelanggan">pelanggan   :</label>
      <input list="pelanggan" name="pelanggan" id="pelanggan" placeholder="nama pelanggan"><br>
         <button type="submit" name="record" class="">Record</button>
         
            </div>
	
     </div>
	<table class="detail" border = 2>
    <tr >
    	<th colspan="7">Detail Transaksi</th>
    </tr>
    <tr><th>No</th>
        <th>Nama Barang</th>
        <th>Qty</th>
        <th>Harga</th>
        <th>Subtotal</th>
        <th colspan="2">Cancel</th>
    </tr>
    <?php
    $no=1;
    $total=0;
    foreach ($detail as $r)
    { $r->subtotal=$r->qty*$r->harga; ?>
    	<tr>
    		<td><?php echo $no ;?></td>
    		<td><?php echo $r->merek_cat ;?></td>
    		<td><?php echo $r->qty; ?></td>
    		<td><?php echo 	format_rp($r->harga); ?></td>
    		<td align="right"><?php echo format_rp($r->subtotal); ?></td>
    		<td><?php echo anchor('transaksipenjualan/hapusitem/'.$r->id_detail_j.'/'.$r->qty.'/'.$r->id_cat,'hapus');?></td>
    		<td><a href="transaksipenjualan/edititem/<?php echo $r->id_detail_j; ?>/<?php echo $r->qty ?>/<?php echo $r->id_cat ?>">edit</a></td>
    	</tr>
       <!--  // echo "<tr>
        //     <td>$no</td>
        //     <td>$r->nama_barang</td>
        //     <td>$r->qty</td>
        //     <td>$r->harga</td>
        //     <td>".$r->qty*$r->harga."</td>
        //     <td>".anchor('transaksi/hapusitem/'.$r->t_detail_id,'Hapus')."</td></tr>";
        // to$tal=$total+($r->qty*$r->harga);
        // $no++; -->
  <?php $total=$total+$r->subtotal;
         $no++; };
    ?>
    <tr>
    	<td colspan="4"><p align="center" style="height: 9px">Total</p></td>
    	<td align="right" id="total" ><?php echo format_rp($total);?></td>

    </tr>
    <tr>
    	
 		  <td colspan="4"><p  align="center">Pembayaran</p></td>
    	<td align="right" >Rp. <input style="height: 9px" class="bayar" type="number" name="pembayaran" id="bayar" placeholder="masukan pembayaran" onfocus="mulaihitung()" onblur="berhentihitung()"></td>
    </tr>
    <tr>
    	<td colspan="4"><p  align="center">Kembalian</p></td>
    	<td align="right">Rp.<input class="bayar" type="tex" name="Kembalian" readonly placeholder="0" id="Kembalian"></td>
    </tr>
</table>
</form>
	<script type="text/javascript">

		function mulaihitung(){
			Interval=setInterval("hitung()", 1);
		}
		function hitung(){
			totalbelanja= "<?php echo $total; ?>"
			bayar = parseInt(document.getElementById("bayar").value);
			
			if (bayar>totalbelanja) {
					Kembalian = bayar-totalbelanja;
			document.getElementById("Kembalian").value = Kembalian;
			}else if(bayar<totalbelanja){
				Kembalian = bayar-totalbelanja;
				document.getElementById("Kembalian").value = Kembalian;
			} else{
					Kembalian =0;
				document.getElementById("Kembalian").value = Kembalian;
			}
		
		}
		function berhentihitung(){
			clearInterval(interval);

		}
	</script>
</div>

<div class="navbar">
	
	<h3>TOKO CAT BAROKAH</h3>
	<div class="navbar1">
	<ul>
		<br>
		<li class="dashboard"><i class="fas fa-home"></i><a class="dashboard" href="dashboard"><i></i>Dasboard</a></li>
		<hr><br>
		<li class="dashboard"><i class="fas fa-database"></i><a class="dashboard" href="masterdatacat"><i></i>Master Data</a></li>
		<hr style=""><br>
		<li class="dashboard"><i class="fas fa-cash-register"></i><a class="dashboard" href="" style="background:#28FFA5; border-radius: 20px;"><i></i>Transaksi</a></li>
		<hr class="dashboard"><br>
		<li class="dashboard"><i class="fas fa-file-invoice"></i><a class="dashboard" href="lappenjualan"><i></i>Laporan</a></li>
		<hr>
	</ul>
	</div>
		<a href="" style="position: fixed;bottom: 10px;left: 190px;">About us</a>

 
        
</body>
</html>