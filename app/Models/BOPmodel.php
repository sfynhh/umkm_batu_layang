<?php

namespace App\Models;

use CodeIgniter\Model;

class BOPmodel extends Model
{
    protected $table = 'Bop';

    //untuk memasukkan data pegawai
    public function insertData(){
        
        $idbop=$_POST['idbop'];
        $idproduksi= $_POST['idproduksi'];
        $jenisbop=$_POST['jenisbop'];
        $tarif = $_POST['nominal'];
        $dasar = $_POST['dasar'];
        if ($dasar!=null){
            $subtotal=$tarif*$dasar;
        }else{
            $subtotal=$tarif;
        }
        $keterangan = $_POST['keterangan'];
        
        $hasil = $this->db->query("INSERT INTO bop SET id_bop=?,jenis_bop=?, tarif=?, jam_kerja=?, subtotal=?, Keterangan=?, id_produksi =?", array($idbop, $jenisbop, $tarif, $dasar, $subtotal, $keterangan, $idproduksi));
        return $hasil;
    }
        public function daftarproduksi(){
        $sql = "SELECT * From produksi where status='Dalam Proses'";
        $query = $this->db->query($sql);
        return $query->getResult();
    }
     public function idbom(){
        $sql ="SELECT CONCAT('BOP', LPAD(IFNULL(max(SUBSTRING(id_bop, 4, 4)),'0')+1,4, '0')) AS id_baru from bop";
        
        // foreach ($query as $row) {
        //  $nopenbaru = $row->nopendaftaran_baru;      }
        // }
        return $query = $this->db->query($sql)->getResult();
    }

    public function getsaldokas(){
        $sql="SELECT saldo from akun where id_akun='111'";
        return $hasil= $this->db->query($sql)->getResult();
        }
    public function  jurnalBOP($tgl){
      $idbop=$_POST['idbop'];
        $jenisbop=$_POST['jenisbop'];
        $tarif = $_POST['nominal'];
        $dasar = $_POST['dasar'];
        if($jenisbop=='BP'){
            $id_coa='119';
        } elseif ($jenisbop=='BTKL') {
             $id_coa='514';
        }elseif ($jenisbop=='Biaya lain-lain') {
             $id_coa='517';
        }
        if ($dasar!=null){
            $subtotal=$tarif*$dasar;
        }else{
            $subtotal=$tarif;
        }
        
       $sql1="INSERT INTO jurnal set tgl_jurnal = ?, no_bukti=?, id_coa='117', posisi_db_cr='Debet', nominal=?";
       $sql2="UPDATE coa set saldo = saldo+? where id_coa='117'";
        $hasil1 = $this->db->query($sql1,array($tgl, $idbop, $subtotal));
        $hasil2 = $this->db->query($sql2, array($subtotal));
      $sql3="INSERT INTO jurnal set tgl_jurnal = ?, no_bukti=?, id_coa=?, posisi_db_cr='Credit', nominal=?";
       $sql4="UPDATE COA set saldo = saldo+(-?) where id_coa=?";
        $hasil3 = $this->db->query($sql3,array($tgl, $idbop, $id_coa, $subtotal));
        $hasil4 = $this->db->query($sql4, array($subtotal, $id_coa));
         
    }
      

   
    public function getAll(){
        return $this->findAll();
    }


    //untuk menghapus data kos sesuai ID yang dipilih
    public function deleteData($id){
        $hasil = $this->db->query("DELETE FROM transaksi_pengeluaran WHERE id_transaksi =? ", array($id));
        return $hasil;
    }
   
}