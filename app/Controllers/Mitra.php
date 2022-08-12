<?php 
namespace App\Controllers;

//load model database yang akan digunakan yaitu akun
use App\Models\ProdukModel;
use App\Models\MitraModel;
// use Phpml\Association\Apriori;

class Mitra extends BaseController
{
	public function __construct()
    {
		$this->PM = new ProdukModel();
		$this->MM = new MitraModel();
    }
    public function index()
	{	$data=[ 'content'=>'customer/Mitra/daftarmitra',
				'titletab'=>'Mitra',
				'activemitra'=>'active',
				'kategorisearch'=>$this->PM->getkategori(),
				'mitra'=>$this->MM->getmitra(),
				'datacontent'=>[]
				];
		echo view('customer/headnav', $data);
	}
    public function detailmitra()
	{	$data=[ 'content'=>'customer/Mitra/detail_mitra',
				'titletab'=>'Detail Mitra',
				'activemitra'=>'active',
				'kategorisearch'=>$this->PM->getkategori(),
				'mitra'=>$this->MM->getmitra(),
				'datacontent'=>[]
				];
		echo view('customer/headnav', $data);
	}
}

?>