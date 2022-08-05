<!DOCTYPE html>
<html>
<head>
	<title>dashboard toko cat barokah</title>
	<link rel="stylesheet" type="text/css" href="">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<style type="text/css">
		body {
			   background: url(<?php echo base_url();?>assets/image/dashboard.jpg);
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
			left: 350px;
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
		table {
			position: absolute;
			left: 420px;
			top:120px;
			border:2px;
			border-color: black;
			background:#28FFA5;
			width: 50%;
			padding:5px;
			border-collapse: collapse;
  			margin-top: 0px;
		}
		input{
			border: none;
			background: none;
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

	</style>
</head>
<body>
	<div class="ci">
		<ul>
		<li class="md"><a class="md" href="" style="background:#28FFA5; border-radius: 30px;">Data Cat</a></li>
	    <li class="md"><a class="md" href="karyawan">Data karyawan</a></li>
	    <li class="md"><a class="md" href="pelanggan">Data pelanggan</a></li>
	    <li class="md">	<a class="md" href="pemasok" >Data Pemasok</a></li>
	    <li class="md"><a class="md" href="investor">Data Investor</a></li>
	    <li class="md"><a class="md" href="akun_controller">Data Akun</a></li>
	    </ul>
	</div>

<div class="navbar">
	
	<h3>TOKO CAT BAROKAH</h3>
	<div class="navbar1">
	<ul>
		<br>
		<li class="dashboard"><i class="fas fa-home"></i><a class="dashboard" href="dashboard"><i></i>Dasboard</a></li>
		<hr><br>
		<li class="dashboard"><i class="fas fa-database"></i><a class="dashboard" href="" style="background:#28FFA5; border-radius: 20px;">Master Data</a></li>
		<hr style=""><br>
		<li class="dashboard"><i class="fas fa-cash-register"></i><a class="dashboard" href="transaksipenjualan"><i></i>Transaksi</a></li>
		<hr class="dashboard"><br>
		<li class="dashboard"><i class="fas fa-file-invoice"></i><a class="dashboard" href=""><i></i>Laporan</a></li>
		<hr>
	</ul>
	</div>
	<a href="" style="position: fixed;bottom: 10px;left: 190px;">About us</a>
	
</div>
<div><a class="dashboard" style="position: absolute;right: 465px;top: 70px; background:#28FFA5; border-radius: 30px;" href="masterdatacat/tambahcat">Tambah data</a>
<table border="1" cellspacing="0" cellpadding="0">
            <tr>
                <th >Id cat</th>
                <th>Warna</th>
                <th>Harga</th>
                <th>jenis cat</th>
                <th>merekt</th>
                <th colspan="2">action</th>
            </tr>
           <?php foreach ($rows as $row){ ?>
           	<tr>
           		<td><?php echo $row->id_cat; ?></td>
           		<td><?php echo $row->warna; ?></td>
           		<td><?php echo $row->harga; ?></td>
           		<td><?php echo $row->nama_jenis_cat; ?></td>
           		<td><?php echo $row->Merek; ?></td>
           		<td align="center">
				<a href="masterdatacat/updatecat/<?php echo $row->id_cat; ?>">Ubah</a>
				</td>
				<td align="center">
				<a href="masterdatacat/deletecat/<?php echo $row->id_cat; ?>">Hapus</a>
					</td>
           	</tr>
           <?php } ?>
            </table>
            </div>
</body>
</html>