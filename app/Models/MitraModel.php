<?php

namespace App\Models;

use CodeIgniter\Model;

class MitraModel extends Model
{
    protected $table = 'm_mitra';

    public function idmenu(){
        $sql ="SELECT CONCAT('M', LPAD(IFNULL(max(SUBSTRING(id_menu, 2, 3)),'0')+1,3, '0')) AS id_baru from menu";
        
        return $query = $this->db->query($sql)->getResult();
    }

    //untuk memasukkan data pegawai
    public function getmitra(){
         $query = $this->db->table($this->table)
                    ->join('m_pemilik_mitra', 'm_mitra.id_pemilik=m_pemilik_mitra.id_pemilik_mitra')->get()->getResult();
        return $query;
    }
    public function jumlahmitra()
    {
        $sql="SELECT count(*) as jumlah from m_mitra";
        return $this->db->query($sql)->getRowArray();
    }
    public function getmitrabyid($id){
         $query = $this->db->table($this->table)
                    ->join('m_pemilik_mitra', 'm_mitra.id_pemilik=m_pemilik_mitra.id_pemilik_mitra')
                    ->where('id_pemilik_mitra', $id)->get()->getRowArray();
        return $query;
    }
    //untuk mendapatkan data seluruh tabel pegawai
    public function getAll(){
        return $this->findAll();
    }

    public function createPesan($data)
    {
        $query = $this->db->table('pesan')->insert($data);
        return $query;
    }

    
    public function updatemitra($data, $id)
    {
        $query = $this->db->table('m_mitra')->update($data, array('id_mitra' => $id));
        return $query;
    }
    public function deleteMitra($id)
    {
        $query = $this->db->table('m_mitra')->delete(array('id_mitra' => $id));
        return $query;
    }
}