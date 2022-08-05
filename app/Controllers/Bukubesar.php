<?php
namespace App\Controllers;

use App\Models\Bukubesarmodel;

class Bukubesar extends BaseController
{
    public function __construct()
    {   session_start();
        //load kelas transaksi Model
        $this->Bukubesarmodel = new Bukubesarmodel();
    }

    //form input akan diakses dari index
    public function index()
    {       
            // if(!isset($_SESSION['nama'])){
            // return redirect()->to(base_url('Neccimanggis')); 
            // }
        //di cek dulu, agar validasi tidak terpicu pada saat awal method ini diakses
         if( !isset($_POST['tglawal']) and !isset($_POST['tglakhir'])){
            //kondisi awal ketika di akses, jadi tidak perlu memanggil validasi
            // print_r($data['nopengeluaran']);
            $data['id_akun']=$this->Bukubesarmodel->getidakun();
            echo view('HeaderBootstrap');
            echo view('SidebarBootstrap');
            echo view('Bukubesar/Inputakun',$data);
        }
        else{
            $validation =  \Config\Services::validation();
            //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
            if (! $this->validate(
                        [   'idakun' => 'required',
                            'tglawal' => 'required',
                            'tglakhir' => 'required'                        ],
                                [   // Errors
                                
                                    'idakun'=> [
                                        'required'=>'id_akun tidak boleh kosong'
                                    ],
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
                 $data['id_akun']=$this->Bukubesarmodel->getidakun();
                 $data['validation']=  $this->validator;
                echo view('HeaderBootstrap');
                echo view('SidebarBootstrap');
                echo view('Bukubesar/Inputakun', $data);

            }else{
                //blok ini adalah blok jika sukses, yaitu panggil method insertData()
                //panggil metod dari kursus model untuk diinputkan datanya
                if($_POST['idakun']=='All'){
                    $data['tglakhir']=$_POST['tglakhir'];
                    $data['tglawal'] = $_POST['tglawal'];
                    // $data['sisasaldo']=$this->Bukubesarmodel->saldosisaall();
                    $data['bukbes'] = $this->Bukubesarmodel->getsaldoawalall($data['tglawal']);
                    $data['isibukbes'] = $this->Bukubesarmodel->getbball($data['tglawal'], $data['tglakhir']);
                     echo view('HeaderBootstrap');
                    echo view('SidebarBootstrap');
                    echo view('bukubesar/BukubesarAll', $data);
                }else{
                    $data['tglakhir']=$_POST['tglakhir'];
                    $data['tglawal'] = $_POST['tglawal'];
                    // $data['sisasaldo']=$this->Bukubesarmodel->saldosisa();
                    $data['bukbes'] = $this->Bukubesarmodel->getsaldoawalbyidakun($data['tglawal']);
                    $data['isibukbes'] = $this->Bukubesarmodel->getbbbyidakun($data['tglawal'], $data['tglakhir']);
                     echo view('HeaderBootstrap');
                    echo view('SidebarBootstrap');
                    echo view('Bukubesar/Bukubesar', $data);}
            }
        }
    }
    public function cetakLaporanall($tglaw,$tglak){
        if(!isset($_SESSION['nama'])){
            return redirect()->to(base_url('Neccimanggis')); 
        }

        $data['tglakhir']=$tglak;
        $data['tglawal'] =$tglaw;
        $data['bukbes'] = $this->Bukubesarmodel->getsaldoawalall($data['tglawal']);
        $data['isibukbes'] = $this->Bukubesarmodel->getbball($data['tglawal'], $data['tglakhir']);
        $html = view('Bukubesar/CetakBBall',$data);

        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Laporan Buku Besar.pdf'); 
    }

}