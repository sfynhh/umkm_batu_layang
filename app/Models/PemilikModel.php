<?php

namespace App\Models;

use CodeIgniter\Model;

class PemilikModel extends Model
{
    protected $table = 'm_pemilik_mitra';

    public function idmenu(){
        $sql ="SELECT CONCAT('M', LPAD(IFNULL(max(SUBSTRING(id_menu, 2, 3)),'0')+1,3, '0')) AS id_baru from menu";
        
        return $query = $this->db->query($sql)->getResult();
    }

    //untuk memasukkan data pegawai
    public function getPemilikByid($id){
         $query = $this->db->table($this->table)
                    ->join('m_mitra', 'm_mitra.id_pemilik=m_pemilik_mitra.id_pemilik_mitra')
                    ->where('id_user_mitra', $id)->get()->getRowArray();
        return $query;
    }
    // public function jumlahmitra()
    // {
    //     $sql="SELECT count(*) as jumlah from m_mitra";
    //     return $this->db->query($sql)->getRowArray();
    // }
    // public function getmitrabyid($id){
    //      $query = $this->db->table($this->table)
    //                 ->join('m_pemilik_mitra', 'm_mitra.id_pemilik=m_pemilik_mitra.id_pemilik_mitra')
    //                 ->where('id_pemilik_mitra', $id)->get()->getRowArray();
    //     return $query;
    // }
    // //untuk mendapatkan data seluruh tabel pegawai
    // public function getAll(){
    //     return $this->findAll();
    // }

    // public function createPesan($data)
    // {
    //     $query = $this->db->table('pesan')->insert($data);
    //     return $query;
    // }

    // //untuk mendapatkan data kos sesuai dengan ID untuk diedit
    // public function editData($id){
    //     $dbResult = $this->db->query("SELECT * FROM menu WHERE id_menu = ?", array($id)); 
    //     return $dbResult->getResult();
    // }

    // //untuk mendapatkan data kos sesuai dengan ID untuk diedit
    // public function updateData(){
    //     $idmenu = $_POST['idmenu'];
    //     $namamenu = $_POST['namamenu'];
    //     $harga = $_POST['harga'];
    //     $status = $_POST['status'];
    //     $kategori = $_POST['kategori'];
    //     $hasil = $this->db->query("UPDATE menu SET id_menu = ?, nama_menu=?, harga=?, status=?, kategori=? WHERE id_menu =? ", array($idmenu, $namamenu, $harga, $status, $kategori, $idmenu));
    //     return $hasil;
    // }

    // //untuk menghapus data kos sesuai ID yang dipilih
    // public function deleteData($id){
    //     $hasil = $this->db->query("DELETE FROM Menu WHERE id_menu =? ", array($id));
    //     return $hasil;
    // }
    
}