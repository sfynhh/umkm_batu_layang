<?php 
	class modellappenjualan Extends CI_Model{
		public function tampilpenjualan()
		{
			$sql="SELECT tanggal_np, sum(total_bayar) as jumlah_penjualan from nota_penjualan Group by tanggal_np";
			return $this->db->query($sql);
		}
		public function caritanggal($ta,$tak){
			$sql="SELECT tanggal_np, sum(total_bayar) as jumlah_penjualan from nota_penjualan where tanggal_np BETWEEN '$ta' and '$tak' Group by tanggal_np";
			$query=$this->db->query($sql);
			return $query->result();
		}
		public function tampilpenjualan1($a)
		{
			$sql="SELECT id_nota_penjualan, total_bayar as jumlah_penjualan, nama_karyawan, nama_pelanggan  from nota_penjualan join  karyawan on karyawan.id_karyawan=nota_penjualan.id_karyawan join pelanggan on pelanggan.id_pelanggan=nota_penjualan.id_pelanggan where tanggal_np='$a' order by id_nota_penjualan";
			$query=$this->db->query($sql);
			return $query->result();
		}
		public function tampilpenjualan2($b){
			$sql="SELECT concat(Merek,' ',warna) as nama_cat, id_nota_penjualan, harga, jumlah_cat as quantity, subtotal from detail_jual_j join cat on detail_jual_j.id_cat=cat.id_cat where id_nota_penjualan='$b'";
			$query=$this->db->query($sql);
			return $query->result();
		}
		
	}
 ?>