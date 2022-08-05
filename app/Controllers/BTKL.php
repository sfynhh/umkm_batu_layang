<?php
namespace App\Controllers;

use App\Models\BTKLmodel;

class BTKL extends BaseController
{
    public function __construct()
    {   session_start();
        //load kelas transaksi Model
        $this->btklmodel = new BTKLmodel();
    }

    //form input akan diakses dari index
    public function index()
    {
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
        //di cek dulu, agar validasi tidak terpicu pada saat awal method ini diakses
        $data['idbtkl']=$this->btklmodel->idbtkl();
        $data['idproduksi']=$this->btklmodel->daftarproduksi();
         if( !isset($_POST['namapegawai']) and !isset($_POST['nominal']) and !isset($_POST['total'])){
            //kondisi awal ketika di akses, jadi tidak perlu memanggil validasi
           
            
            echo view('HeaderBootstrap');
            echo view('SidebarBootstrap');
            echo view('BTKL/Inputbtkl', $data);
        }
        else{
            $validation =  \Config\Services::validation();
            //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
            if (! $this->validate(
                        [   'namapegawai'=> 'required',
                            'nominal' => 'required',
                            'dasar' => 'required',
                        ],
                                [   // Errors
                                    'namapegawai' => [
                                        'required' => 'Nama Pegawai tidak boleh kosong'
                                    ],
                                    'nominal' => [
                                        'required' => 'Nominal tidak boleh kosong'
                                    ],
                                    'dasar' => [
                                        'required' => 'Jam kerja tidak boleh kosong'
                                    ]
                                ]
                    )
            ){
                $data['validation']=$this->validator;
                echo view('HeaderBootstrap');
                echo view('SidebarBootstrap');
                echo view('BOP/inputbop', $data);

            }else{
                //blok ini adalah blok jika sukses, yaitu panggil method insertData()
                //panggil metod dari kosan model untuk diinputkan datanya
                $hasil = $this->btklmodel->insertData();
                $hasil1 = $this->btklmodel->jurnalBTKL($_SESSION['tglproduksi']);
                return redirect()->to(base_url('BTKL/listbtkl')); 
            }
        }
    }

    public function listbtkl()
    {
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
        // $this->request->getFile();
        $data['btkl'] = $this->btklmodel->getAll();
        echo view('HeaderBootstrap');
        echo view('SidebarBootstrap');
        echo view('BTKL/listbtkl', $data);
    }
}