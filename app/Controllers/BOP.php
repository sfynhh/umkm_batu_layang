<?php
namespace App\Controllers;

use App\Models\BOPmodel;

class BOP extends BaseController
{
    public function __construct()
    {   session_start();
        //load kelas transaksi Model
        $this->BOPmodel = new BOPmodel();
    }

    //form input akan diakses dari index
    public function index()
    {
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
        //di cek dulu, agar validasi tidak terpicu pada saat awal method ini diakses
        $data['idbop']=$this->BOPmodel->idbom();
             $data['idproduksi']=$this->BOPmodel->daftarproduksi();
         if( !isset($_POST['jenisbop']) and !isset($_POST['nominal']) and !isset($_POST['keterangan'])){
            //kondisi awal ketika di akses, jadi tidak perlu memanggil validasi
           
            
            echo view('HeaderBootstrap');
            echo view('SidebarBootstrap');
            echo view('BOP/inputbop', $data);
        }
        else{
            $validation =  \Config\Services::validation();
            //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
            if (! $this->validate(
                        [
                            'nominal' => 'required',
                            'keterangan' => 'required',
                        ],
                                [   // Errors
                                    'nominal' => [
                                        'required' => 'Nominal tidak boleh kosong'
                                    ],
                                    'Keterangan' => [
                                        'required' => 'Keterangan tidak boleh kosong'
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
                $hasil = $this->BOPmodel->insertData();
                $hasil1 = $this->BOPmodel->jurnalBOP($_SESSION['tglproduksi']);
                return redirect()->to(base_url('BOP/ListBop')); 
            }
        }
    }

    public function ListBop()
    {
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
        // $this->request->getFile();
        $data['Bop'] = $this->BOPmodel->getAll();
        echo view('HeaderBootstrap');
        echo view('SidebarBootstrap');
        echo view('BOP/listbop', $data);
    }
}