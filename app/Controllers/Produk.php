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
    public function index(){
    	$data=[ 'content'=>'customer/produk/produk_all',
				'titletab'=>'Produk',
				'activeprod'=>'active',
				'kategorisearch'=>$this->PM->getkategori(),
				'mitra'=>$this->MM->getmitra(),
				'datacontent'=>[
								'kategori'=>$this->PM->getkategori(),
								'mitra' =>$this->MM->getmitra(),
								'viewmenu'=>'search',
								'idkategori'=>$this->request->getPost('kategori'),
								'namaproduk'=>$this->request->getPost('namaproduk')
								]
				
				];
	echo view('customer/headnav', $data);

    }
    public function produksearch_json(){
    	$id=$this->request->getPost('id_kat');
    	$nameproduk =$this->request->getPost('nama_produk');
    	if ($id=='all'){
			$dataproduk = $this->PM->getprodukbyname($nameproduk);
    	}else{
    		$dataproduk = $this->PM->getproduksearch($id, $nameproduk);
    	}
		
		//$dataproduk = $this->PM->getprodukall();
		echo json_encode($dataproduk);
    }
    public function produk_all($kategori)
	{	
		$data=[ 'content'=>'customer/produk/produk_all',
				'titletab'=>'Produk',
				'activeprod'=>'active',
				'kategorisearch'=>$this->PM->getkategori(),
				'mitra'=>$this->MM->getmitra(),
				'datacontent'=>[
								'kategori'=>$this->PM->getkategori(),
								'mitra' =>$this->MM->getmitra(),
								'idkategori'=>$kategori,
								]
				
				];
		if(!isset($_POST['cari'])){
			if($kategori=='all'){
			$data['datacontent']['viewmenu']='default';

			}
			else{
			$data['datacontent']['viewmenu']='kategori';

			}
		echo view('customer/headnav', $data);
		}else{
			// $idktgr=$this->request->getPost('kategori');
			 echo 'hai';
		}
		
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
								'produkdetail'=>$this->PM->produkdetail($id),
								'foto_produk'=>$this->PM->fotobyidproduk($id)
								]
				];

		echo view('customer/headnav', $data);
	}
	public function search()
	{
		return redirect()->to(base_url('ProdukSearch/'.$_POST['kategori'].'/'.$_POST['namaproduk'])); 
	}
	
}

?>