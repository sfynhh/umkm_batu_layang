<?php
namespace App\Controllers;

use App\Models\Laporanproduksimodel;

class Laporanproduksi extends BaseController
{
    public function __construct()
    {   session_start();
        //load kelas transaksi Model
        $this->Laporanproduksimodel = new Laporanproduksimodel();
    }

    //form input akan diakses dari index
    public function index()
    {   
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
        //di cek dulu, agar validasi tidak terpicu pada saat awal method ini diakses
         if( !isset($_POST['tglawal']) and !isset($_POST['tglakhir'])){
            //kondisi awal ketika di akses, jadi tidak perlu memanggil validasi
            echo view('HeaderBootstrap');
            echo view('SidebarBootstrap');
            echo view('Laporanproduksi/inputtanggal');
        }
        else{
            $validation =  \Config\Services::validation();
            //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
            if (! $this->validate(
                        [ 
                           
                            'tglakhir' => 'required'  ],
                                [   // Errors
                                
                                    'tglakhir' => [
                                        'required' => 'tanggal tidak boleh kosong',
                                    ],
                                ]
                    )
            ){
                //kirim data error ke views, karena ada isian yang tidak sesuai rules
                 $data['validation']=  $this->validator;
                echo view('HeaderBootstrap');
                echo view('SidebarBootstrap');
                echo view('Laporanproduksi/inputtanggal');

            }else{
                //blok ini adalah blok jika sukses, yaitu panggil method insertData()
                //panggil metod dari kursus model untuk diinputkan datanya
                    $data['tglawal']=$_POST['tglawal'];
                    $data['tglakhir']=$_POST['tglakhir'];
                    $data['pemakaianbb'] =$this->Laporanproduksimodel->pemakaianbb($data['tglawal'], $data['tglakhir']);
                    $data['pemakaianbtkl'] =$this->Laporanproduksimodel->pemakaianbtkl($data['tglawal'], $data['tglakhir']);
                    $data['pemakaianbop'] =$this->Laporanproduksimodel->pemakaianbop($data['tglawal'], $data['tglakhir']);
                    $data['pdpawal'] =$this->Laporanproduksimodel->persediaanawal($data['tglawal'], $data['tglakhir']);
                     $data['pdpakhir'] =$this->Laporanproduksimodel->persediaanakhir();
                     echo view('HeaderBootstrap');
                    echo view('SidebarBootstrap');
                    echo view('Laporanproduksi/Laporanproduksi', $data);
            }
        }
    }
    public function cetaklabarugi($tglak){
        if(!isset($_SESSION['nama'])){
            return redirect()->to(base_url('Neccimanggis')); 
        }

        $data['tglakhir']=$tglak;
        $data['labarugi'] =$this->Labarugimodel->getpassiva($data['tglakhir']);;
        $html = view('Labarugi/Cetaklabarugi',$data);

        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Laporan Laba rugi.pdf'); 
    }

}