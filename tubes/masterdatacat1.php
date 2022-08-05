<?php 
	class masterdatacat1 extends CI_Model{
		public $idcat;
		public $warna;
		public $harga;
		public $stok;
		public $idjeniscat;
		public $merek;

         public function datacat(){
         	$sql="SELECT id_cat, warna, harga, nama_jenis_cat, Merek FROM cat as a 
         	join jenis_cat as b on a.id_jenis_cat=b.id_jenis_cat order by id_cat";
         	$query=$this->db->query($sql);
         	return $query->result();
         }
         public function tampil_jenis(){
            $sql="SELECT * FROM jenis_cat";
            $this->db->query($sql);
         }
         public function tambahcat(){
         	$sql=sprintf("INSERT into cat VALUES ('%s','%s',%d,%d,'%s','%s')",
         	$this->idcat,
         	$this->warna,
         	$this->harga,
         	$this->stok,
         	$this->idjeniscat,
         	$this->merek);
		$this->db->query($sql);
         }
         public function hapuscat(){
		$sql=sprintf("DELETE FROM cat WHERE id_cat='%s'",$this->idcat);
		$this->db->query($sql);
	}
	public function updatecat(){
		$sql=sprintf("UPDATE cat SET warna ='%s', harga= %f, stok= %d, id_jenis_cat='%s', Merek='%s' WHERE id_cat='%s'",
			
         	$this->warna,
         	$this->harga,
         	$this->stok,
         	$this->idjeniscat,
         	$this->merek,
         	$this->idcat
		);
		$this->db->query($sql);
	}
	}
 ?> 