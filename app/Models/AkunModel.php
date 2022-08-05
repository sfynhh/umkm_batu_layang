<?php

namespace App\Models;

use CodeIgniter\Model;

class akunModel extends Model
{
    protected $table = 'Coa';

    //untuk mendapatkan data seluruh tabel akun
    public function getAll(){
        return $this->findAll();
    }

    public function data_penjualan(){
        $sql="SELECT id_penjualan, item from data_penjualan";
        $query = $this->db->query($sql)->getResult();
        $arr=[];
        foreach ($query as $row) {
            $ar=[];
            $ar['id']=$row->id_penjualan;
            $ar['item']=$row->item;
            array_push($arr, $ar);
        }

        // $data_item = array(
        //                 array("id" => 1, "item" => "Sabun,Sampo,Handuk,Lap"),
        //                 array("id" => 2, "item" => "Handuk,Bedak,Sampo,Sabun,Sikat Gigi"),
        //                 array("id" => 3, "item" => "Sabun,Handuk,Sampo,Sikat Gigi"),
        //                 array("id" => 4, "item" => "Sampo,Sabun,Bedak,Handuk"),
        //                 array("id" => 5, "item" => "Sabun,Pasta Gigi,Sampo"),
        //                 array("id" => 6, "item" => "Sabun,Handuk,Sikat Gigi,Sampo"),
        //                 array("id" => 7, "item" => "Sampo,Sikat Gigi,Handuk"),
        //                 array("id" => 8, "item" => "Sampo,Lap,Handuk,Sabun"),
        //                 array("id" => 9, "item" => "Sampo,Lap,Pasta Gigi,Sampo"),
        //                 array("id" => 10, "item" => "Handuk,Lap,Sikat Gigi")
        //             );
        return $arr;
    }

    public function jumlah_data($data_item){
        $arr = [];
        for ($i = 0; $i < count($data_item); $i++) {
            $ar = [];
            $val = explode(",", $data_item[$i]["item"]);
            for ($j = 0; $j < count($val); $j++) {
                $ar[] = $val[$j];
            }
            array_push($arr, $ar);
        }

        return $arr;
    }

    public function frekuensiItem($data)
    {
        $arr = [];
        for ($i = 0; $i < count($data); $i++) {
            $jum = array_count_values($data[$i]);
            
            foreach ($jum as $key => $v) {
                if (array_key_exists($key, $arr)) {
                    $arr[$key] += 1;
                } else {
                    $arr[$key] = 1;
                }
            }
        }
        return $arr;
    }
    public function eliminasiItem($data, $minSupport)
    {
        $arr = [];
        foreach ($data as $key => $v) {
            if ($v >= $minSupport) {
                $arr[$key] = $v;
            }
        }
        return $arr;
    }
    public function pasanganItem($data_filter)
    {
        $n = 0;
        $arr = [];
        foreach ($data_filter as $key1 => $v1) {
            $m = 1;
            foreach ($data_filter as $key2 => $v2) {
                $str = explode("_", $key2);
                for ($i = 0; $i < count($str); $i++) {

                    if (!strstr($key1, $str[$i])) {
                        if ($m > $n + 1 && count($data_filter) > $n + 1) {
                            $arr[$key1 . "_" . $str[$i]] = 0;
                        }
                    }
                }
                $m++;
            }
            $n++;
        }
        return $arr;
    }

    public function frekuensiPasanganItem($data_pasangan, $data)
    {
        $arr = $data_pasangan;
        $ky = "";
        $kali = 0;
        foreach ($data_pasangan as $key1 => $k) {
            for ($i = 0; $i < count($data); $i++) {
                $kk = explode("_", $key1);
                $jm = 0;
                for ($k = 0; $k < count($kk); $k++) {

                    for ($j = 0; $j < count($data[$i]); $j++) {
                        if ($data[$i][$j] == $kk[$k]) {
                            $jm += 1;
                            break;
                        }
                    }
                }
                if ($jm > count($kk) - 1) {
                    $arr[$key1] += 1;
                }
            }
        }
        return $arr;
    }
}