<?php

namespace App\Models;

use CodeIgniter\Model;

class BTKLmodel extends Model
{
    protected $table = 'BTKL';

    //untuk memasukkan data pegawai
    public function insertData(){
        
        $idbtkl=$_POST['idbtkl'];
        $idproduksi= $_POST['idproduksi'];
        $namapegawai=$_POST['namapegawai'];
        $tarif = $_POST['nominal'];
        $dasar = $_POST['dasar'];
        if ($dasar!=null){
            $subtotal=$tarif*$dasar;
        }else{
            $subtotal=$tarif;
        }
        
        $hasil = $this->db->query("INSERT INTO btkl SET id_btkl=?,nama_pegawai=?, tarif=?, jam_kerja=?, subtotal=?,id_produksi =?", array($idbtkl, $namapegawai, $tarif, $dasar, $subtotal, $idproduksi));
        return $hasil;
    }
    public function jurnalBTKL($tgl){
      $idbtkl=$_POST['idbtkl'];
        $tarif = $_POST['nominal'];
        $dasar = $_POST['dasar'];
        if ($dasar!=null){
            $subtotal=$tarif*$dasar;
        }else{
            $subtotal=$tarif;
        }
        
       $sql1="INSERT INTO jurnal set tgl_jurnal = ?, no_bukti=?, id_coa='116', posisi_db_cr='Debet', nominal=?";
       $sql2="UPDATE coa set saldo = saldo+? where id_coa='116'";
        $hasil1 = $this->db->query($sql1,array($tgl, $idbtkl, $subtotal));
        $hasil2 = $this->db->query($sql2, array($subtotal));
      $sql3="INSERT INTO jurnal set tgl_jurnal = ?, no_bukti=?, id_coa='514', posisi_db_cr='Credit', nominal=?";
       $sql4="UPDATE COA set saldo = saldo+(-?) where id_coa='514'";
        $hasil3 = $this->db->query($sql3,array($tgl, $idbtkl, $subtotal));
        $hasil4 = $this->db->query($sql4, array($subtotal));
    }
        public function daftarproduksi(){
        $sql = "SELECT * From produksi where status='Dalam Proses'";
        $query = $this->db->query($sql);
        return $query->getResult();
    }
     public function idbtkl(){
        $sql ="SELECT CONCAT('BTKL', LPAD(IFNULL(max(SUBSTRING(id_btkl, 5, 4)),'0')+1,4, '0')) AS id_baru from btkl";
        
        // foreach ($query as $row) {
        //  $nopenbaru = $row->nopendaftaran_baru;      }
        // }
        return $query = $this->db->query($sql)->getResult();
    }

    public function getsaldokas(){
        $sql="SELECT saldo from akun where id_akun='111'";
        return $hasil= $this->db->query($sql)->getResult();
        }
    public function  jurnalpengeluaran(){
     if ($_POST['kategori_asset']=='kendaraan') {
      $tgl =substr($_POST['tgl'],0,10);
      $nodaftar = $_POST['no_beli'];
      $idkas = '111';
      $idkendaraan ='122';
      $nominal = preg_replace( '/[^0-9 ]/i', '', $_POST['total']);
      $sumber = 'Jurnal Pengeluaran';
      $sql1="INSERT INTO jurnal_pengeluaran set tgl_jurnal = ?, no_bukti=?, id_akun=?, posisi_db_cr='Debet', nominal=?, sumber=?";
      $sql2="INSERT INTO jurnal_pengeluaran set tgl_jurnal = ?, no_bukti=?, id_akun=?, posisi_db_cr='Credit', nominal=?, sumber=?";
      $sql3="UPDATE akun  SET saldo=saldo+? where id_akun=?";
      $hasil3= $this->db->query($sql3, array($nominal,  $idkendaraan));
      $sql4="UPDATE akun  SET saldo=saldo-? where id_akun=?";
      $hasil4= $this->db->query($sql4, array($nominal,  $idkas));
      $hasil1 = $this->db->query($sql1,array($tgl, $nodaftar, $idkendaraan, $nominal, $sumber));
      $hasil2 = $this->db->query($sql2,array($tgl, $nodaftar, $idkas, $nominal, $sumber));

     } else if ($_POST['kategori_asset']=='peralatan') {
          $tgl =substr($_POST['tgl'],0,10);
      $nodaftar = $_POST['no_beli'];
      $idkas = '111';
      $idasset ='121';
      $nominal = preg_replace( '/[^0-9 ]/i', '', $_POST['total']);
      $sumber = 'Jurnal Pengeluaran';
      $sql1="INSERT INTO jurnal_pengeluaran set tgl_jurnal = ?, no_bukti=?, id_akun=?, posisi_db_cr='Debet', nominal=?, sumber=?";
      $sql2="INSERT INTO jurnal_pengeluaran set tgl_jurnal = ?, no_bukti=?, id_akun=?, posisi_db_cr='Credit', nominal=?, sumber=?";
      $sql3="UPDATE akun  SET saldo=saldo+? where id_akun=?";
      $hasil3= $this->db->query($sql3, array($nominal,  $idasset));
      $sql4="UPDATE akun  SET saldo=saldo-? where id_akun=?";
      $hasil4= $this->db->query($sql4, array($nominal,  $idkas));
      $hasil1 = $this->db->query($sql1,array($tgl, $nodaftar, $idasset, $nominal, $sumber));
      $hasil2 = $this->db->query($sql2,array($tgl, $nodaftar, $idkas, $nominal, $sumber));

     } else if ($_POST['kategori_asset']=='tanah') {
          $tgl =substr($_POST['tgl'],0,10);
      $nodaftar = $_POST['no_beli'];
      $idkas = '111';
      $idasset ='123';
      $nominal = preg_replace( '/[^0-9 ]/i', '', $_POST['total']);
      $sumber = 'Jurnal Pengeluaran';
      $sql1="INSERT INTO jurnal_pengeluaran set tgl_jurnal = ?, no_bukti=?, id_akun=?, posisi_db_cr='Debet', nominal=?, sumber=?";
      $sql2="INSERT INTO jurnal_pengeluaran set tgl_jurnal = ?, no_bukti=?, id_akun=?, posisi_db_cr='Credit', nominal=?, sumber=?";
      $sql3="UPDATE akun  SET saldo=saldo+? where id_akun=?";
      $hasil3= $this->db->query($sql3, array($nominal,  $idasset));
      $sql4="UPDATE akun  SET saldo=saldo-? where id_akun=?";
      $hasil4= $this->db->query($sql4, array($nominal,  $idkas));
      $hasil1 = $this->db->query($sql1,array($tgl, $nodaftar, $idasset, $nominal, $sumber));
      $hasil2 = $this->db->query($sql2,array($tgl, $nodaftar, $idkas, $nominal, $sumber));

     } else if ($_POST['kategori_asset']=='gedung') {
          $tgl =substr($_POST['tgl'],0,10);
      $nodaftar = $_POST['no_beli'];
      $idkas = '111';
      $idasset ='126';
      $nominal = preg_replace( '/[^0-9 ]/i', '', $_POST['total']);
      $sumber = 'Jurnal Pengeluaran';
      $sql1="INSERT INTO jurnal_pengeluaran set tgl_jurnal = ?, no_bukti=?, id_akun=?, posisi_db_cr='Debet', nominal=?, sumber=?";
      $sql2="INSERT INTO jurnal_pengeluaran set tgl_jurnal = ?, no_bukti=?, id_akun=?, posisi_db_cr='Credit', nominal=?, sumber=?";
       $sql3="UPDATE akun  SET saldo=saldo+? where id_akun=?";
      $hasil3= $this->db->query($sql3, array($nominal,  $idasset));
      $sql4="UPDATE akun  SET saldo=saldo-? where id_akun=?";
      $hasil4= $this->db->query($sql4, array($nominal,  $idkas));
      $hasil1 = $this->db->query($sql1,array($tgl, $nodaftar, $idasset, $nominal, $sumber));
      $hasil2 = $this->db->query($sql2,array($tgl, $nodaftar, $idkas, $nominal, $sumber));

     }
     
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