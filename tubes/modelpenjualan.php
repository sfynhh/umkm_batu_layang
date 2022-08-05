<?php 
	class modelpenjualan Extends CI_Model{
		public $upstok;
		public $idcat;
		public function tampil_detail_jual(){
			$query="SELECT a.id_detail_j, b.id_cat, concat(b.Merek,' ', b.warna) as merek_cat,  a.jumlah_cat as qty, b.harga, a.subtotal from detail_jual_j as a join cat as b on a.id_cat=b.id_cat where a.statuss=0";
			return $this->db->query($query);
		}
		public function tampil_cat (){
			$query="SELECT id_cat, concat(Merek,' ', warna) as merek_cat, harga, stok from cat where stok >0";
			return $this->db->query($query);
		}
		public function tampil_karyawan(){	
			$query="SELECT * from karyawan";
			return $this->db->query($query);
		}
		public function tampil_pelanggan(){
			$query="SELECT * from pelanggan";
			return $this->db->query($query);
		}
		public function simpan_detail(){
			$id_cat = $this->input->post('cat');
			$cat=$this->db->get_where('cat', array('id_cat'=>$id_cat))->row_array();
			$id_nota = $this->input->post('idpenjualan');
			$jumlah_cat=$this->input->post('qty');
			$data=array('id_cat'=>$id_cat,
						'id_nota_penjualan'=>$id_nota,
					     'jumlah_cat'=>$jumlah_cat,
					 	'subtotal'=>$cat['harga']*$jumlah_cat,
					     'statuss'=>0);
			$this->db->insert('detail_jual_j',$data);
		}
		public function jurnal($idnot,$nom,$byr){
			$posisi1='debet';
			$posisi2='credit';
			$piutang=$nom-$byr;
			if ($byr>=$nom)
			{
			$dataD=array('id_akun'=>'111',
						 'id_nota_penjualan'=>$idnot,
						  'posisi_db_cr'=>$posisi1,
						  'nominal'=>$nom);
			$dataC=array('id_akun'=>'411',
						 'id_nota_penjualan'=>$idnot,
						  'posisi_db_cr'=>$posisi2,
						  'nominal'=>$nom);
			$sql1=sprintf("UPDATE akun set saldo=saldo+%d WHERE id_akun='111'",$nom );
			$sql2=sprintf("UPDATE akun set saldo=saldo+%d WHERE id_akun='411'",$nom );
			$this->db->insert('j_penjualan',$dataD);
			$this->db->insert('j_penjualan',$dataC);
			$this->db->query($sql1);
			$this->db->query($sql2);
			}else{
			$dataD1=array('id_akun'=>'111',
						 'id_nota_penjualan'=>$idnot,
						  'posisi_db_cr'=>$posisi1,
						  'nominal'=>$byr);
			$dataD2=array('id_akun'=>'112',
						 'id_nota_penjualan'=>$idnot,
						  'posisi_db_cr'=>$posisi1,
						  'nominal'=>$piutang);
			$dataC=array('id_akun'=>'411',
						 'id_nota_penjualan'=>$idnot,
						  'posisi_db_cr'=>$posisi2,
						  'nominal'=>$nom);
			$sql1=sprintf("UPDATE akun set saldo=saldo+%d WHERE id_akun='111'",$nom );
			$sql2=sprintf("UPDATE akun set saldo=saldo+%d WHERE id_akun='411'",$nom );
			$sql3=sprintf("UPDATE akun set saldo=saldo+%d WHERE id_akun='112'",$piutang);
			$this->db->insert('j_penjualan',$dataD1);
			$this->db->insert('j_penjualan',$dataD2);
			$this->db->insert('j_penjualan',$dataC);
			$this->db->query($sql1);
			$this->db->query($sql2);
			$this->db->query($sql3);}
		}
			
		public function hapusdetail($pk){
			$sql=sprintf("DELETE from detail_jual_j where id_detail_j=%d", $pk );
			$this->db->query($sql);
		}
		public function idnot(){
			$sql="SELECT * from nota_penjualan where id_nota_penjualan=(SELECT max(id_nota_penjualan) from nota_penjualan)";
			$query=$this->db->query($sql);
			return $query->result();

		}
		public function simpannota($total){
			$id_nota=$this->input->post('idpenjualan');
			$tanggal=$this->input->post('date');
			// $bayar=$total;
			$idkaryawan=$this->input->post('karyawan');
			$idpel=$this->input->post('pelanggan');
			$data=array('id_nota_penjualan'=>$id_nota,
						'tanggal_np'=>$tanggal,
						'total_bayar'=>$total,
						'id_karyawan'=>$idkaryawan,
						'id_pelanggan'=>$idpel);
			$this->db->insert('nota_penjualan',$data);
			$this->db->query("update detail_jual_j set statuss='1' where statuss='0'");
		}
		public function updatestoksimpan(){
			$sql=sprintf("UPDATE cat set stok=stok-%d WHERE id_cat='%s'",$this->upstok,$this->idcat);
			$this->db->query($sql);
		}
		public function updatestokhapus($up, $a){
			$sql=sprintf("UPDATE cat set stok=stok+%d WHERE id_cat='%s'",$up,$a);
			$this->db->query($sql);
		}
		public function editdetail($i,$s,$c){
			$this->db->query("update detail_jual_j set statuss='2' where id_detail_j='$i'");
			$sql=sprintf("UPDATE cat set stok=stok+%d WHERE id_cat='%s'",$s,$c);
			$this->db->query($sql);
		}
		public function updatedetail($i,$q,$k){
			$sql1="UPDATE detail_jual_j set id_cat='$i', jumlah_cat=$q, statuss=0 where id_detail_j=$k";
			$sql2=sprintf("UPDATE cat set stok=stok-%d WHERE id_cat='%s'",$q,$i);
			$this->db->query($sql1);
			$this->db->query($sql2);
		}
	}
 ?>