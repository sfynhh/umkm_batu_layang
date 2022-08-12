<?php 
namespace App\Controllers;

//load model database yang akan digunakan yaitu akun
use App\Models\ProdukModel;
use App\Models\MitraModel;
// use Phpml\Association\Apriori;

class Produk extends BaseController
{
	public function __construct()
    {
		$this->PM = new ProdukModel();
		$this->MM = new MitraModel();
    }
    public function produk_all($kategori, $toko)
	{	$data=[ 'content'=>'customer/produk/produk_all',
				'titletab'=>'Produk',
				'activeprod'=>'active',
				'kategorisearch'=>$this->PM->getkategori(),
				'mitra'=>$this->MM->getmitra(),
				'datacontent'=>[
								'kategori'=>$this->PM->getkategori(),
								'mitra' =>$this->MM->getmitra(),
								'produk'=>$this->PM->getprodukall(),
								]
				];
		//print_r($this->PM->getprodukall());
		echo view('customer/headnav', $data);
	}
	public function produk_json()
	{
		$dataproduk = $this->PM->getprodukall();
		echo json_encode($dataproduk);
	}

	public function detail_produk()
	{
		
	}
	public function search()
	{
		return redirect()->to(base_url('ProdukSearch/'.$_POST['kategori'].'/'.$_POST['namaproduk'])); 
	}
	public function produksearch($kategori, $nama)
	{
		
	}	
}

?>