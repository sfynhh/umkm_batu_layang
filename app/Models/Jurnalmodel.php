<?php

namespace App\Models;

use CodeIgniter\Model;

class Jurnalmodel extends Model
{
    protected $table = 'jurnal_pendapatan';

    //untuk memasukkan data ruang_kursus
    public function jurnal($tglawal, $tglakhir){
        $sql = "SELECT a.*, b.Nama_akun From jurnal a join coa b ON (a.id_coa=b.id_coa) where tgl_jurnal between ? And ?";
          return $query = $this->db->query($sql, array($tglawal,$tglakhir))->getResult();;
    }

    //untuk mendapatkan data seluruh tabel ruang kursus
    public function getAll(){
        return $this->findAll();
    }
     

  
}