<!DOCTYPE html>
<html >
<head>
	<title>DATA CAT</title>
	<link rel="stylesheet" type="text/css" href="">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!-- framework bootstrap -->
 <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="<?php echo base_url('assets/'); ?>datepicker/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>datepicker/css/datepicker.css">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="<?php echo base_url('assets/'); ?>js/datepicker.js"></script>
   
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
			right:40px;
			top:155px;
			border:2px;
			border-color: black;
			background:#28FFA5;
			width: 50%;
			padding:5px;
			border-collapse: collapse;
			border-radius: 15px;
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
		div.container{
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
  			border: 0px solid #c1c1c1;
  			border-radius: 10px;
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
		    float: left;
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
			right: 100px;
			top: 270px;
		}
		button.back{
			position: fixed;
			width: 180px;
			height: 34px;
			border: none;	
			left: 640px;
			top: 267px;
			background: lightgrey;
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

	<a href="" style="position: fixed;bottom: 10px;left: 190px;">About us</a>
	<div class="container">
		<?php 
  		echo form_open('lappenjualan');
 		?>
		  <form action="lappenjualan" action="post">
		    <div class="form-group">
		      <label  class="control-label col-sm-1" >Tanggal awal:</label>
		      <div class="col-sm-3">
		        <input type="text"  name="tanggal1" id="tanggal1"  class="form-control datepicker" value="<?php echo $tgla ?>">
		      </div>
		        <label  class="control-label col-sm-1" >Tanggal akhir:</label>
		      <div class="col-sm-3">
		        <input type="text"  name="tanggal2" id="tanggal2"  class="form-control datepicker" value="<?php echo $tglakh ?>">
		      </div>
		      <button type="submit" name="cari" class="">cari</button><br><br>  

		    </div>
		  
	</div>
	<script>
  $( function() {
    $( "#tanggal1" ).datepicker({
    });});
   $( function() {
    $( "#tanggal2" ).datepicker();});
  </script>
	<!--  <script type="text/javascript">
  		$( function() {
 		  $( "#tanggal" ).datepicker({
  		    autoclose:true,
  		    todayHighlight:true,
   		   format:'yyyy-mm-dd',
    		 language: 'id'
    		});
 		 });
  	</script> -->
  	<div>
	<table class="detail" border = 2>
    <tr >
    	<th colspan="6">Laporan Penjualan</th>
    </tr>
    <tr><th>No</th>
        <th>Tanggal penjualan</th>
        <th>jumlah penjualan</th>
        <th>Action</th>
    </tr>
    <?php
    $no=1;
    $total=0;
    foreach ($laporan as $lap)
    { ?>
    	<tr>
    		<td><?php echo $no ;?></td>
    		<td><?php echo $lap->tanggal_np ;?></td>
    		<td align="right"><?php echo format_rp($lap->jumlah_penjualan); ?></td>
    		<td align="center"><a href="lappenjualan/lappernota/<?php echo $lap->tanggal_np; ?>">Inspect</a></td>
    	</tr>
       
  <?php $total=$total+$lap->jumlah_penjualan;
         $no++; };
    ?>
    <tr>
    	<td colspan="2"><p align="center" style="height: 9px">Total</p></td>
    	<td align="right" id="total" ><?php echo format_rp($total);?></td>

    </tr>
    	<div class="">
    		<button class="back" type="submit" name="back" class="">kembali</button>  
    </div>
    </form>

<div class="navbar">
	
	<h3>TOKO CAT BAROKAH</h3>
	<div class="navbar1">
	<ul>
		<br>
		<li class="dashboard"><i class="fas fa-home"></i><a class="dashboard" href="dashboard"><i></i>Dasboard</a></li>
		<hr><br>
		<li class="dashboard"><i class="fas fa-database"></i><a class="dashboard" href="masterdatacat"><i></i>Master Data</a></li>
		<hr style=""><br>
		<li class="dashboard"><i class="fas fa-cash-register"></i><a class="dashboard" href="transaksipenjualan" ><i></i>Transaksi</a></li>
		<hr class="dashboard"><br>
		<li class="dashboard"><i class="fas fa-file-invoice"></i><a style="background:#28FFA5; border-radius: 20px;" class="dashboard" href=""><i></i>Laporan</a></li>
		<hr>
	</ul>
	</div>

 
        
</body>
</html>