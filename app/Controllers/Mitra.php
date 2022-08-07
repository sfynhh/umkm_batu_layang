<?php 
namespace App\Controllers;

//load model database yang akan digunakan yaitu akun
use App\Models\ProdukModel;
// use Phpml\Association\Apriori;

class Mitra extends BaseController
{
	public function __construct()
    {
		$this->PM = new ProdukModel();
    }
    public function index()
	{	$data=[ 'content'=>'customer/Mitra/daftarmitra',
				'titletab'=>'Mitra',
				'activemitra'=>'active',
				'kategorisearch'=>$this->PM->getkategori(),
				'datacontent'=>[]
				];
		echo view('customer/headnav', $data);
	}
    public function detailmitra()
	{	$data=[ 'content'=>'customer/Mitra/detail_mitra',
				'titletab'=>'Detail Mitra',
				'activemitra'=>'active',
				'kategorisearch'=>$this->PM->getkategori(),
				'datacontent'=>[]
				];
		echo view('customer/headnav', $data);
	}
}

?>