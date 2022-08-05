<!DOCTYPE html>
<html>
<head>
	<title>DATA CAT</title>
	<link rel="stylesheet" type="text/css" href="">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<style type="text/css">
		body { background-position: fixed;
			  background: url(<?php echo base_url();?>assets/image/dashboard.jpg);
			  background-size: auto;
			 
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
		div.isi{
			position: fixed;
			left: 480px;
			top: 130px;
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
		form input {
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
		    float: right;
		    width: calc(95% - 150px);
		  }

		  button {
		    float: right;
		    width: calc(100% - 200px);
		  }
		}
		input{
			float: right;
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
	    <a class="md" href="" style="background:#28FFA5; border-radius: 30px;">Data Cat</a>
	    	</li>
	    <li class="md">	<a class="md" href="">Data karyawan</a></li>
	    <li class="md"><a class="md" href="">Data pelanggan</a></li>
	    <li class="md">	<a class="md" href="">Data Pemasok</a></li>
	    </ul>
	</div>

<div class="navbar">
	
	<h3>TOKO CAT BAROKAH</h3>
	<div class="navbar1">
	<ul>
		<br>
		<li class="dashboard"><i class="fas fa-home"></i><a class="dashboard" href="catdashboard.php"><i></i>Dasboard</a></li>
		<hr><br>
		<li class="dashboard"><i class="fas fa-database"></i><a class="dashboard" href="" style="background:#28FFA5; border-radius: 20px;">Master Data</a></li>
		<hr style=""><br>
		<li class="dashboard"><i class="fas fa-cash-register"></i><a class="dashboard" href=""><i></i>Transaksi</a></li>
		<hr class="dashboard"><br>
		<li class="dashboard"><i class="fas fa-file-invoice"></i><a class="dashboard" href=""><i></i>Laporan</a></li>
		<hr>
	</ul>
	</div>
	<a href="" style="position: fixed;bottom: 10px;left: 190px;">About us</a>
	
</div>
<?php $query = $this->db->query("SELECT id_jenis_cat FROM jenis_cat");
			//if ($query->num_row() ==0) exit(1);
				$rows=$query->result(); ?>
<div> 
	<input class="cencel" type="button" value="cancel" onclick="javascript:history.go(-1);"/>
	<div class="isi">
	
	<form action="updatecat" method="post">
		<label for="id_cat">ID CAT    :</label>
		<input type="text" id="id_cat"  name="id_cat" readonly value="<?php echo $model->idcat ?>"><br>
		<label for="id_jenis_cat">ID JENIS CAT    :</label>
		<!-- <input type="text" id="id_cat"  name="id_cat"> -->
		<select name="id_jenis_cat">
			<?php foreach ( $rows as $row) {
			 ?>
			<option value="<?php echo $row->id_jenis_cat ?>"><?php echo $row->id_jenis_cat ?></option>
			<?php } ?>
		</select><br><br>
		<label for="warna">WARNA    :</label>
		<input type="text" id="warna" name="warna" value="<?php echo $model->warna ?>"><br>
		<label for="harga">HARGA CAT  :</label>
		<input type="text" id="harga" name="harga" value="<?php echo $model->harga ?>"><br>
		<label for="stock">STOCK CAT    :</label>
		<input type="text" id="stock" name="stock" value="<?php echo $model->stok ?>"><br>
		<label for="merk">MERK CAT    :</label>
		<input type="text" id="merk" name="merk" value="<?php echo $model->merek ?>"><br>
		<button type="Submit" name="tambah" >update</button>
	</form>
            </div>
       </div>
        
</body>
</html>	