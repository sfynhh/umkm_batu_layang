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
		 $this->validation =  \Config\Services::validation();
    }
    public function index()
	{	$data=[ 'content'=>'customer/Mitra/daftarmitra',
				'titletab'=>'Mitra',
				'activemitra'=>'active',
				'kategorisearch'=>$this->PM->getkategori(),
				'mitra'=>$this->MM->getmitra(),
				'datacontent'=>[
								'mitra'=>$this->MM->getmitra()
								]
				];
		echo view('customer/headnav', $data);
	}

	public function DaftarMitra()
	{	$data=[ 'content'=>'admin/ms_mitra/daftarmitra',
				'titletab'=>'UMKM Batu Layang | Daftar Mitra',
				 'contenttit'       => 'Daftar Mitra',
				'activemitra'=>'active',
				'datacontent'=>[
								'mitra'=>$this->MM->getmitra()
								]
				];
		echo view('admin/headnav', $data);
	}

	public function editjson()
    {

         $this->validation->setRules([
            'nama_mitra' => [
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Nama MItra Belum diisi'
                ]
            ],
            'email' => [
                'rules'=>'required',
                'errors'=>[
                    'required'=>'nama email Belum diisi'
                ]
            ],
            'no_telepon'=>[
                'rules'=> 'required',
                'errors'=>[
                    'required'=>'No telepon belum diisi'
                ]
            ],
            'alamat'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'alamat belum diisi'
                ]
            ]


         ]);

         $isDataValid = $this->validation->withRequest($this->request)->run();
         if($isDataValid){
            $id = $this->request->getPost('id_mitra');
            $data = array(
            'nama_mitra' => $this->request->getPost('nama_mitra'),
            'email_mitra' => $this->request->getPost('email'),
            'no_telepon_mitra' => $this->request->getPost('no_telepon'),
            'alamat_mitra' => $this->request->getPost('alamat'),
            );
            $this->MM->updatemitra($data, $id);
            echo json_encode(array('status' => 'ok;', 'text' => ''));
            
         }else{
              $validation = $this->validation;
              $error=$validation->getErrors();
              //print_r($error);
              echo json_encode(array('status' => 'error;', 'text' => '', 'data'=>$error));
         }
    }


    public function detailmitra($id)
	{	$data=[ 'content'=>'customer/Mitra/detail_mitra',
				'titletab'=>'Detail Mitra',
				'activemitra'=>'active',
				'kategorisearch'=>$this->PM->getkategori(),
				'mitra'=>$this->MM->getmitra(),
				'datacontent'=>[
								'kategori'=>$this->PM->getkategori(),
								'detailmitra'=>$this->MM->getmitrabyid($id),
							 ]
				];
		echo view('customer/headnav', $data);
	}

	public function produkbymitra()
	{
		$id=$this->request->getPost('id_mitra');
		$dataproduk = $this->PM->getprodukbymitra($id);
		//$dataproduk = $this->PM->getprodukall();
		echo json_encode($dataproduk);
	}
	public function delete()
    {
        $id = $this->request->getPost('id_mitra');
        $this->MM->deleteMitra($id);
        //session()->setFlashdata('success', 'Data Departemen Berhasil Dihapus');

        echo json_encode(array('status' => 'ok;', 'text' => ''));
    }
}

?>