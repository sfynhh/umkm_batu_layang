<?php

namespace App\Controllers;

//load model database yang akan digunakan yaitu akun
use App\Models\ProdukModel;
use App\Models\MitraModel;
// use Phpml\Association\Apriori;

class Home extends BaseController
{
	public function __construct()
    {
		//session_start();
        //load kelas AkunModel
         $this->validation =  \Config\Services::validation();
        $this->PM = new ProdukModel();
        $this->MM = new MitraModel();
       

    }

	
	public function index()
	{	$data=[ 'content'=>'customer/Home',
				'titletab'=>'Home',
				'activehome'=>'active',
				'kategorisearch'=>$this->PM->getkategori(),
				'mitra'=>$this->MM->getmitra(),
				'datacontent'=>[ 
								'kategori'=>$this->PM->getkategori(),
								]
				];

		
		//print_r($data['Kategori']);
		//print_r($data['datacontent']['mitra']);
		echo view('customer/headnav', $data);
	}
	
	public function tentangkami()
	{	$data=[ 'content'=>'customer/tentangkami/tentangkami',
				'titletab'=>'Tentang Kami',
				'activetk'=>'active',
				'mitra'=>$this->MM->getmitra(),
				'kategorisearch'=>$this->PM->getkategori(),
				'datacontent'=>[
								'jumlahproduk'=>$this->PM->jumlahproduk(),
								'jumlahmitra'=>$this->MM->jumlahmitra(),
								]
				];
		echo view('customer/headnav', $data);
	}
	public function contact()
	{	$data=[ 'content'=>'customer/contact/contact',
				'titletab'=>'Contact',
				'activektk'=>'active',
				'mitra'=>$this->MM->getmitra(),
				'kategorisearch'=>$this->PM->getkategori(),
				'datacontent'=>[]
				];
		echo view('customer/headnav', $data);
	}


	public function addjson(){
		$this->validation->setRules([
            'nama' => [
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Nama Tunjangan Belum diisi'
                ]
            ],
            'email'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'email Belum diisi'
                ]
             ]


         ]);

         $isDataValid = $this->validation->withRequest($this->request)->run();
         if($isDataValid){
            $data = array(
            'nama_pengirim' => $this->request->getPost('nama'),
            'email_pengirim' => $this->request->getPost('email'),
            'pesan' => $this->request->getPost('message'),

            
            );
            $this->MM->createPesan($data);
           
            //echo 'hai';
            echo json_encode(array('status' => 'ok;', 'text' => ''));
            
         }else{
              $validation = $this->validation;
              $error=$validation->getErrors();
          	  $dataname=$_POST;
              //print_r($error);
              echo json_encode(array('status' => 'error;', 'text' => '', 'data'=>$error,'dataname'=>$dataname));        
               }
	}
	


}
