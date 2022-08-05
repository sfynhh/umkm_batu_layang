<?php

namespace App\Models;

use CodeIgniter\Model;

class Bukubesarmodel extends Model
{
    protected $table = 'coa';
    public function getsaldoawalall($tglawal){
        $idakun=$_POST['idakun']; 
        $sql="SELECT a.id_coa, a.Nama_akun, Header_akun, saldo, ifnull(nominal_1,0) as nominal_transaksi, b.posisi_db_cr FROM coa as a 
            left join(SELECT id_coa, sum(nominal) as nominal_1, posisi_db_cr from jurnal 
            WHERE tgl_jurnal BETWEEN ? and CURDATE() GROUP BY id_coa) as b on (a.id_coa=b.id_coa)
            WHERE a.id_coa>22";

            return $hasil= $this->db->query($sql, array($tglawal))->getResult();
    }
    public function getbball($tglawal, $tglakhir){
        $idakun=$_POST['idakun'];
        $sql="SELECT a.*, b.Nama_akun From jurnal a join coa b ON (a.id_coa=b.id_coa)
                where tgl_jurnal BETWEEN ? AND ? ORDER BY tgl_jurnal ASC";

            return $hasil=$this->db->query($sql, array($tglawal, $tglakhir))->getResult();
    }
    public function getidakun(){
        $sql="SELECT id_coa, Nama_akun from coa WHERE id_coa>22 ";
        return $hasil=$this->db->query($sql)->getResult();
    }
    
   
  
}