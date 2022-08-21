<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'Produk';

    public function idmenu(){
        $sql ="SELECT CONCAT('M', LPAD(IFNULL(max(SUBSTRING(id_menu, 2, 3)),'0')+1,3, '0')) AS id_baru from menu";
        
        return $query = $this->db->query($sql)->getResult();
    }
    public function getTabelmodel(){
       
    }

    //untuk memasukkan data pegawai
    public function getkategori(){
         $query = $this->db->table('ms_kategori_produk')->get()->getResult();
        return $query;
    }
    public function jumlahproduk()
    {
        $sql="SELECT count(*) as jumlah from m_produk";
        return $this->db->query($sql)->getRowArray();
    }
    //untuk mendapatkan data seluruh tabel pegawai
    public function getAll(){
        return $this->findAll();
    }
    public function getprodukall(){

    $query = $this->db->table('m_produk')->select('*')
            ->join('m_mitra', 'm_produk.produk_id_mitra=m_mitra.id_mitra')->get()->getResultArray();
    return $query;

    }
    public function getprodukbykategori($id){

    $query = $this->db->table('m_produk')->select('*')
            ->join('m_mitra', 'm_produk.produk_id_mitra=m_mitra.id_mitra')
            ->where('produk_id_kategori', $id)->get()->getResultArray();
    return $query;

    }
    public function getprodukbykategorimitra($id, $id_mitra){

    $query = $this->db->table('m_produk')->select('*')
            ->join('m_mitra', 'm_produk.produk_id_mitra=m_mitra.id_mitra')
            ->where('produk_id_kategori', $id)
            ->where('produk_id_mitra', $id_mitra)->get()->getResultArray();
    return $query;

    }
     
    public function getprodukbymitra($id){

    $query = $this->db->table('m_produk')->select('*')
            ->join('m_mitra', 'm_produk.produk_id_mitra=m_mitra.id_mitra')
            ->where('produk_id_mitra', $id)->get()->getResultArray();
    return $query;

    }

    public function produkdetail($id){

    $query = $this->db->table('m_produk')->select('*')
            ->join('m_mitra', 'm_produk.produk_id_mitra=m_mitra.id_mitra')
            ->join('ms_kategori_produk', 'm_produk.produk_id_kategori=ms_kategori_produk.id_kategori')
            ->where('m_produk.id_produk', $id)->get()->getRowArray();
    return $query;

    }

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