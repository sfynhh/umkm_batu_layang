<?php

namespace App\Models;

use CodeIgniter\Model;

class Laporanproduksimodel extends Model
{
    protected $table = 'prouksi';
    public function pemakaianbb($tglawal, $tglakhir){
        $sql = "SELECT sum(total_cost) as nominal, tgl_produksi  from produksi where tgl_produksi BETWEEN ? AND ? ";
          return $query = $this->db->query($sql, array($tglawal,$tglakhir))->getResult();
    }
    public function pemakaianbtkl($tglawal, $tglakhir){
        $sql = "SELECT sum(subtotal) as nominal, tgl_produksi  from produksi a join btkl b on(a.id_produksi=b.id_produksi) having tgl_produksi BETWEEN ? AND ? ";
          return $query = $this->db->query($sql, array($tglawal,$tglakhir))->getResult();
    }
    public function pemakaianbop($tglawal, $tglakhir){
        $sql = "SELECT sum(subtotal) as nominal, tgl_produksi from produksi a join bop b on(a.id_produksi=b.id_produksi) having tgl_produksi BETWEEN ? AND ? ";
          return $query = $this->db->query($sql, array($tglawal,$tglakhir))->getResult();
    }

    public function persedian($tglawal, $tglakhir){
        $sql = "SELECT sum(subtotal) as nominal, tgl_produksi from produksi a join bop b on(a.id_produksi=b.id_produksi) having tgl_produksi BETWEEN ? AND ? ";
          return $query = $this->db->query($sql, array($tglawal,$tglakhir))->getResult();
    }
    public function persediaanawal($tglawal, $tglakhir){
         $sql="SELECT a.id_coa, a.Nama_akun, Header_akun, saldo, ifnull(nominal_1,0) as nominal_transaksi, b.posisi_db_cr FROM coa as a 
            left join(SELECT id_coa, sum(nominal) as nominal_1, posisi_db_cr from jurnal 
            WHERE tgl_jurnal BETWEEN ? and ? GROUP BY id_coa) as b on (a.id_coa=b.id_coa)
            WHERE a.id_coa=113";

            return $hasil= $this->db->query($sql, array($tglawal, $tglakhir))->getResult();
    }


    public function persediaanakhir(){
        $sql="SELECT sum(saldo) as nominal from coa where id_coa BETWEEN 115 and 117";
        return $hasil= $this->db->query($sql)->getResult();
    }


  
}