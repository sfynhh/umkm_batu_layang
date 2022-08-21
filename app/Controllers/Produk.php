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
    public function produk_all()
	{	

		$data=[ 'content'=>'customer/produk/produk_all',
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
	public function produkbykategori_json()
	{
		$id=$this->request->getPost('id_kat');
		$dataproduk = $this->PM->getprodukbykategori($id);
		//$dataproduk = $this->PM->getprodukall();
		echo json_encode($dataproduk);
	}
	public function produkbykategorimitra_json()
	{
		$id=$this->request->getPost('id_kat');
		$idmitra=$this->request->getPost('id_mitra');
		$dataproduk = $this->PM->getprodukbykategorimitra($id, $idmitra);
		//$dataproduk = $this->PM->getprodukall();
		echo json_encode($dataproduk);
	}
	public function produkbymitra_json()
	{
		$id=$this->request->getPost('id_mitra');
		$dataproduk = $this->PM->getprodukbymitra($id);
		//$dataproduk = $this->PM->getprodukall();
		echo json_encode($dataproduk);
	}

	public function detail_produk($id)
	{
		$data=[ 'content'=>'customer/produk/detail_produk',
				'titletab'=>'Produk Detail',
				'activeprod'=>'active',
				'kategorisearch'=>$this->PM->getkategori(),
				'mitra'=>$this->MM->getmitra(),
				'datacontent'=>[
								'kategori'=>$this->PM->getkategori(),
								'mitra' =>$this->MM->getmitra(),
								'produk'=>$this->PM->getprodukall(),
								'produkdetail'=>$this->PM->produkdetail($id)
								]
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