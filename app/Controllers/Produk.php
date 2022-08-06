<?php

namespace App\Controllers;

//load model database yang akan digunakan yaitu akun
// use App\Models\AkunModel;
// use Phpml\Association\Apriori;

class Produk extends BaseController
{
	public function __construct()
    {
		//session_start();
        //load kelas AkunModel
        //$this->akunmodel = new AkunModel();
    }

	
	public function index()
	{	$data=[ 'content'=>'customer/Home',
				'titletab'=>'Home',
				'activehome'=>'active'
				];

		echo view('customer/headnav', $data);
	}
	public function produk_all($kategori, $toko)
	{	$data=[ 'content'=>'customer/produk/produk_all',
				'titletab'=>'Produk',
				'activeprod'=>'active'
				];
		echo view('customer/headnav', $data);
	}
	public function tentangkami()
	{	$data=[ 'content'=>'customer/tentangkami/tentangkami',
				'titletab'=>'Tentang Kami',
				'activetk'=>'active'
				];
		echo view('customer/headnav', $data);
	}
	public function contact()
	{	$data=[ 'content'=>'customer/contact/contact',
				'titletab'=>'Contact',
				'activektk'=>'active'
				];
		echo view('customer/headnav', $data);
	}
	public function detailmitra()
	{	$data=[ 'content'=>'customer/Mitra/detail_mitra',
				'titletab'=>'Detail Mitra',
				'activemitra'=>'active'
				];
		echo view('customer/headnav', $data);
	}


}
