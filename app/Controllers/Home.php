<?php

namespace App\Controllers;

//load model database yang akan digunakan yaitu akun
use App\Models\ProdukModel;
// use Phpml\Association\Apriori;

class Home extends BaseController
{
	public function __construct()
    {
		//session_start();
        //load kelas AkunModel
        $this->PM = new ProdukModel();
    }

	
	public function index()
	{	$data=[ 'content'=>'customer/Home',
				'titletab'=>'Home',
				'activehome'=>'active',
				'kategorisearch'=>$this->PM->getkategori(),
				'datacontent'=>[]
				];
		//print_r($data['Kategori']);
		echo view('customer/headnav', $data);
	}
	
	public function tentangkami()
	{	$data=[ 'content'=>'customer/tentangkami/tentangkami',
				'titletab'=>'Tentang Kami',
				'activetk'=>'active',
				'kategorisearch'=>$this->PM->getkategori(),
				'datacontent'=>[]
				];
		echo view('customer/headnav', $data);
	}
	public function contact()
	{	$data=[ 'content'=>'customer/contact/contact',
				'titletab'=>'Contact',
				'activektk'=>'active',
				'kategorisearch'=>$this->PM->getkategori(),
				'datacontent'=>[]
				];
		echo view('customer/headnav', $data);
	}
	


}
