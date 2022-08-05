<?php

namespace App\Models;

use CodeIgniter\Model;

class BBModel extends Model
{
    protected $table = 'bahan_baku';

    public function getAll(){
        return $this->findAll();
    }

      public function idbahan(){
        $sql ="SELECT CONCAT('BB', LPAD(IFNULL(max(SUBSTRING(kode_bahan, 3, 3)),'0')+1,3, '0')) AS id_baru from bahan_baku";
        
        // foreach ($query as $row) {
        //  $nopenbaru = $row->nopendaftaran_baru;      }
        // }
        return $query = $this->db->query($sql)->getResult();
    }
    public function tambahbahan(){
        $idbahan= $_POST['idbahan'];
        $namabahan = $_POST['namabahan'];
        $hargabahan= $_POST['hargabahan'];
        $stok = $_POST['stok'];
        // $notlp2= preg_replace( '/[^0-9 ]/i', '', $notlp);
        $kategori = $_POST['jenisbahan'];
        // $tgllahir = substr($_POST['tgllahir'],0,10);
        $hasil = $this->db->query("INSERT INTO bahan_baku SET kode_bahan= ?, nama_bahan=?, harga_bahan=?, stok=?, jenis_bahan=? ", array($idbahan, $namabahan, $hargabahan, $stok, $kategori));
        return $hasil;
    }

    //untuk mendapatkan data kos sesuai dengan ID untuk diedit
    public function editbahanbaku($id){
        $dbResult = $this->db->query("SELECT * FROM bahan_baku WHERE kode_bahan = ?", array($id));
        return $dbResult->getResult();
    }

    //untuk mendapatkan data kos sesuai dengan ID untuk diedit
    public function updatebahanbaku(){
        $idbahan= $_POST['idbahan'];
        $namabahan = $_POST['namabahan'];
        $hargabahan= $_POST['hargabahan'];
        $stok = $_POST['stok'];
        // $notlp2= preg_replace( '/[^0-9 ]/i', '', $notlp);
        $jenisbahan = $_POST['jenisbahan'];
        // $tgllahir=  substr($_POST['tgllahir'],0,10);
        $hasil = $this->db->query("UPDATE bahan_baku SET kode_bahan =?, nama_bahan=?, harga_bahan=?, stok=?, jenis_bahan=? WHERE kode_bahan =? ", array($idbahan, $namabahan, $hargabahan, $stok, $jenisbahan, $idbahan));
        return $hasil;
    }
//     //untuk menghapus data kos sesuai ID yang dipilih
    public function deletebahanbaku($id){
        $hasil = $this->db->query("DELETE FROM bahan_baku WHERE kode_bahan =? ", array($id));
        return $hasil;
    }
}