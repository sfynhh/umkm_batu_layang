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


}
