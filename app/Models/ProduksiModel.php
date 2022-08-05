<?php 

namespace App\Models;

use CodeIgniter\Model;

class ProduksiModel extends Model
{
	protected $table = 'produksi';

	// public function getAll(){
	// 	return $this->findAll();
	// }

	public function daftarproduksi(){
		$sql = "SELECT DISTINCT a.*, b.id_menu From produksi as a join bom as b on (a.id_produksi=b.id_produksi)";
		$query = $this->db->query($sql);
		return $query->getResult();
	}
  public function idproduksi(){
        $sql ="SELECT CONCAT('PR', LPAD(IFNULL(max(SUBSTRING(id_produksi, 3, 4)),'0')+1,4, '0')) AS id_baru from produksi";
        
        // foreach ($query as $row) {
        //  $nopenbaru = $row->nopendaftaran_baru;      }
        // }
        return $query = $this->db->query($sql)->getResult();
    }


  public function getlistmenu(){
    $sql="SELECT * from menu";
    $query=$this->db->query($sql);
    return $query->getResult();
  }
   public function getlistbahan(){
    $sql="SELECT * from bahan_baku WHERE stok > 0 ";
    $query=$this->db->query($sql);
    return $query->getResult();
  }
public function selesaiproduksi($id)
{
  $sql = "UPDATE produksi SET status='selesai' where id_produksi=?";
  return $query = $this->db->query($sql, array($id));
}
  public function getlistbom(){
    $sql="SELECT a.*, b.harga_bahan from bom as a join bahan_baku as b on (a.kode_bahan=b.kode_bahan) having a.status=0 ";
    $query=$this->db->query($sql);
    return $query->getResult();
  }
  public function updatebom(){
    $sql="UPDATE bom  SET status=1 where status=0";
    $hasil=$this->db->query($sql);
  }
  public function getdetailproduksi($id){
    $sql="SELECT a.kode_bahan, b.nama_bahan, b.harga_bahan, a.qty, a.total From Bom as a join bahan_baku as b on (a.kode_bahan=b.kode_bahan) where id_produksi=?";
    $query=$this->db->query($sql, array($id));
    return $query->getResult();
  }
	 public function tambahbom($idbahan){
        $idproduksi=$_POST['idproduksi'];
        $idmenu=$_POST['idmenu'];
        $qty=$_POST['qtybahan'];
        $subtotal=preg_replace('/[^0-9 ]/i', '', $_POST['subtotal']);
        $hasil = $this->db->query("INSERT INTO bom SET id_produksi=?, kode_bahan = ?, id_menu=?, qty=?, total=?, status=0", array($idproduksi, $idbahan, $idmenu, $qty, $subtotal));
        return $hasil;
    }
    public function jurnalBB($tgl){
      $idproduksi=$_POST['idproduksi1'];
      $total=$_POST['total'];
       $sql1="INSERT INTO jurnal set tgl_jurnal = ?, no_bukti=?, id_coa='115', posisi_db_cr='Debet', nominal=?";
       $sql2="UPDATE coa set saldo = saldo+? where id_coa='115'";
        $hasil1 = $this->db->query($sql1,array($tgl, $idproduksi, $total));
        $hasil2 = $this->db->query($sql2, array($total));
      $sql3="INSERT INTO jurnal set tgl_jurnal = ?, no_bukti=?, id_coa='114', posisi_db_cr='Credit', nominal=?";
       $sql4="UPDATE COA set saldo = saldo-? where id_coa='114'";
        $hasil3 = $this->db->query($sql3,array($tgl, $idproduksi, $total));
        $hasil4 = $this->db->query($sql4, array($total));
    }
    public function updatebahanbaku($id){

    }
    public function deletebom($id){
        $hasil = $this->db->query("DELETE FROM bom WHERE idbom=? ", array($id));
        return $hasil;
    } 
    public function tambahproduksi($qty,$tgl){
        $idproduksi=$_POST['idproduksi1'];
        $total=$_POST['total'];
        $hasil = $this->db->query("INSERT INTO produksi SET id_produksi=?, tgl_produksi=?, qty_produksi=?, total_cost=?, status='Dalam Proses' ", array($idproduksi, $tgl, $qty, $total));
        return $hasil;
    }
    
    

    public function nominalBB($idproduksi){
    	 $sql = "SELECT total_cost From produksi WHERE id_produksi = ?";
          $query = $this->db->query($sql, array($idproduksi))->getResult();
          foreach ($query as $val) {
            $nominal=$val->total_cost;
          }

          return $nominal;
   }

   public function nominalBOP($idproduksi){
       $sql = "SELECT subtotal From bop WHERE id_produksi = ?";
          $query = $this->db->query($sql, array($idproduksi))->getResult();
          foreach ($query as $val) {
            $nominal=$val->subtotal;
          }

          return $nominal;
   }
   public function nominalBTKL($idproduksi){
       $sql = "SELECT subtotal From btkl WHERE id_produksi = ?";
          $query = $this->db->query($sql, array($idproduksi))->getResult();
          foreach ($query as $val) {
            $nominal=$val->subtotal;
          }

          return $nominal;
   }

    public function itembom(){
       $sql = "SELECT kode_bahan, idbom From bom";
          return $query = $this->db->query($sql)->getResult();
    }

    public function jurnalendproses($nominalbb, $nominalbtkl, $nominalbop, $tgl, $idproduksi){
      $total=$nominalbb+$nominalbtkl+$nominalbop;
      $tgl  = date('Y-m-d');
      $sql1="INSERT INTO jurnal set tgl_jurnal = ?, no_bukti=?, id_coa='118', posisi_db_cr='Debet', nominal=?";
      $sql2="UPDATE coa set saldo = saldo+? where id_coa='118'";
      $sql3="INSERT INTO jurnal set tgl_jurnal = ?, no_bukti=?, id_coa='115', posisi_db_cr='Credit', nominal=?";
      $sql4="UPDATE coa set saldo = saldo-? where id_coa='115'";
      $sql5="INSERT INTO jurnal set tgl_jurnal = ?, no_bukti=?, id_coa='116', posisi_db_cr='Credit', nominal=?";
      $sql6="UPDATE coa set saldo = saldo-? where id_coa='116'";
      $sql7="INSERT INTO jurnal set tgl_jurnal = ?, no_bukti=?, id_coa='117', posisi_db_cr='Credit', nominal=?";
      $sql8="UPDATE coa set saldo = saldo-? where id_coa='117'";
      $hasil1 = $this->db->query($sql1,array($tgl, $idproduksi, $total));
      $hasil2 = $this->db->query($sql2,array($total));
      $hasil3 = $this->db->query($sql3,array($tgl, $idproduksi, $nominalbb));
      $hasil4 = $this->db->query($sql4,array($nominalbb));
      $hasil5 = $this->db->query($sql5,array($tgl, $idproduksi, $nominalbtkl));
      $hasil6 = $this->db->query($sql6,array($nominalbtkl));
      $hasil7 = $this->db->query($sql7,array($tgl, $idproduksi, $nominalbop));
      $hasil8 = $this->db->query($sql8,array($nominalbop));
    }



}

 ?>