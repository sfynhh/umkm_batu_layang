<?php 
namespace App\Controllers;

//load model database yang akan digunakan yaitu akun
use App\Models\ProdukModel;// use Phpml\Association\Apriori;

class Produk extends BaseController
{
	public function __construct()
    {
		$this->PM = new ProdukModel();
    }
    public function produk_all($kategori, $toko)
	{	$data=[ 'content'=>'customer/produk/produk_all',
				'titletab'=>'Produk',
				'activeprod'=>'active',
				'kategorisearch'=>$this->PM->getkategori(),
				
				];
		echo view('customer/headnav', $data);
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