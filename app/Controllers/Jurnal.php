<?php
namespace App\Controllers;

use App\Models\Jurnalmodel;

class Jurnal extends BaseController
{
    public function __construct()
    {   session_start();
        //load kelas transaksi Model
        $this->Jurnalmodel = new Jurnalmodel();
    }

    //form input akan diakses dari index
    public function index()
    {       
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
        //di cek dulu, agar validasi tidak terpicu pada saat awal method ini diakses
         if( !isset($_POST['tglawal']) and !isset($_POST['tglakhir'])){
            
            echo view('HeaderBootstrap');
            echo view('SidebarBootstrap');
            echo view('Jurnal/InputTanggal');
        }
        else{
            $validation =  \Config\Services::validation();
            //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
            if (! $this->validate(
                        [
                            'tglawal' => 'required',
                            'tglakhir' => 'required'                        ],
                                [   // Errors
                                
                                    
                                    'tglawal' => [
                                        'required' => 'tanggal tidak boleh kosong'
                                    ],
                                    'tglakhir' => [
                                        'required' => 'total tidak boleh kosong',
                                    ],
                                ]
                    )
            ){
                //kirim data error ke views, karena ada isian yang tidak sesuai rules
                echo view('HeaderBootstrap');
                echo view('SidebarBootstrap');
                echo view('Jurnal/InputTanggal',[
                    'validation' => $this->validator,
                ]);

            }else{
                //blok ini adalah blok jika sukses, yaitu panggil method insertData()
                //panggil metod dari kursus model untuk diinputkan datanya
                $data['tglawal']=$_POST['tglawal'];
                $data['tglakhir']=$_POST['tglakhir'];
                echo view('HeaderBootstrap');
                echo view('SidebarBootstrap');
                
                    $data['jurnal'] = $this->Jurnalmodel->jurnal($data['tglawal'], $data['tglakhir']);
                    echo view('Jurnal/Jurnal', $data);
                
            }
        }
    }

    public function cetakjurnalpendapatan($tglaw,$tglak){
        if(!isset($_SESSION['nama'])){
            return redirect()->to(base_url('Neccimanggis')); 
        }

        $data['tglakhir']=$tglak;
        $data['tglawal'] =$tglaw;
         $data['jurnal'] = $this->Jurnalmodel->jurnal_pendapatan($data['tglawal'], $data['tglakhir']);  
        $html = view('Jurnalpendapatan/Cetakjurnalpendapatan',$data);

        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Laporan Jurnal Pendapatan.pdf'); 
    }
    public function cetakjurnalpenerimaan($tglaw,$tglak){
        if(!isset($_SESSION['nama'])){
            return redirect()->to(base_url('Neccimanggis')); 
        }

        $data['tglakhir']=$tglak;
        $data['tglawal'] =$tglaw;
        $data['jurnal'] = $this->Jurnalmodel->jurnal_penerimaan($data['tglawal'], $data['tglakhir']);;  
        $html = view('Jurnalpenerimaan/cetakjurnalpenerimaan',$data);

        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Laporan Jurnal Pendapatan.pdf'); 
    }
}