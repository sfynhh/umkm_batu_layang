<?php
namespace App\Controllers;

use App\Models\ProdukModel;
use Myth\Auth\Password;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;


class MyProduct extends BaseController
{

	public function __construct()
    {
        // session_start();
         $this->validation =  \Config\Services::validation();
        $this->ProM = new ProdukModel();
        $this->writer = new PngWriter();
         
    }

    public function index()
	{  

    $data =[
            'titletab'=>'UMKM BATU LAYANG | Produk Saya',
            'contenttit'=>'Produk Saya',
            'active'=>'active',
            'content'=>'admin/MyProduct/index',
            'datacontent'=>[
                            'Getproduk'=>$this->ProM->getprodukbymitra($_SESSION['id_mitra']),
                            'kategori'=>$this->ProM->getkategori()
                            ]
            ];
        echo view('admin/headnav', $data);
	}

    public function tambah(){
       // if(!isset($_SESSION)){
       //   return redirect()->to(base_url('login')); 
       // }

     $data =[
        'titletab'=>'UMKM BATU LAYANG | Produk Saya',
        'contenttit'=>'Tambah Produk',
        'active'=>'active',
        'content'=>'admin/MyProduct/tambah',
        'datacontent'=>[
                        'kategori'=>$this->ProM->getkategori()
                        ]
    ];
    if(!isset($_POST['button'])){
      echo view('admin/headnav', $data);
      }else{
        $this->validation->setRules([
            'nama_produk' => [
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Nama Produk Belum diisi'
                ]
            ],
            'id_kategori'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Kategori Belum dipilih'
                    ]
                ],
            'deskripsi'=>[
                'rules'=> 'required',
                'errors'=>[
                    'required'=>'deskripsi belum diisi'
                ]
            ],
            'stok'=>[
                'rules'=> 'required',
                'errors'=>[
                    'required'=>'stok belum diisi'
                ]
            ],
            'harga_produk'=>[
                'rules'=> 'required',
                'errors'=>[
                    'required'=>'Harga Produk belum diisi'
                ]
            ],
            'tgl_produksi'=>[
                'rules'=> 'required',
                'errors'=>[
                    'required'=>'Tanggal Produksi belum diisi'
                ]
            ],
            'tgl_expired'=>[
                'rules'=> 'required',
                'errors'=>[
                    'required'=>'Tanggal expired belum diisi'
                ]
            ],


         ]);

         $isDataValid = $this->validation->withRequest($this->request)->run();
         $filefoto =$this->request->getFile('foto_produk');
         if ($filefoto->getError()==4) {
             $namafoto='default.jpg';
         }else{
             $filefoto->move('assetcustomer/img/product');
             $namafoto=$filefoto->getName();
         }
         if($isDataValid){
            $idmax=$this->ProM->maxid();
           $qrCode = QrCode::create(base_url('Produkdetail/'.$idmax))
           ->setEncoding(new Encoding('UTF-8'))
           ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
           ->setSize(300)
           ->setMargin(10)
           ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
           ->setForegroundColor(new Color(0, 0, 0))
           ->setBackgroundColor(new Color(255, 255, 255));

             $dir ="assetcustomer/img/Qrcode";
        // Create generic logo
           $logo = Logo::create( FCPATH .'/assetcustomer/img/logo/umkmlogo.png')
           ->setResizeToWidth(150);

        // Create generic label
           $label = Label::create('umkmbatulayang.com')
           ->setTextColor(new Color(54, 230, 48));

           $result = $this->writer->write($qrCode, $logo, $label);
           $namaQr= $this->request->getPost('nama_produk').$_SESSION['id_mitra'].'_'. $idmax.'.png';

           $result->saveToFile( FCPATH .$dir.'/'.$namaQr);


            $data = array(
            'nama_produk' => $this->request->getPost('nama_produk'),
            'produk_id_kategori' => $this->request->getPost('id_kategori'),
            'deskripsi_produk' => $this->request->getPost('deskripsi'),
            'stok_produk'=>$this->request->getPost('stok'),
            'harga_produk' => str_replace(".", "", $this->request->getPost('harga_produk')),
            'produk_id_mitra'=>$_SESSION['id_mitra'],
            'tgl_produksi'=> date("Y-m-d", strtotime($this->request->getPost('tgl_produksi'))),
            'tgl_expired'=> date("Y-m-d", strtotime($this->request->getPost('tgl_expired'))),
            'foto_depan'=>'product/'.$namafoto,
            'qr_code'=>$namaQr
            );
    
             $this->ProM->addproduct($data);
             return redirect()->to('MyProduct');
         
            
         }else{
            $data['validation'] = $this->validation;
            return view('admin/headnav', $data);      
        }

      }
    }

     public function deleteproduk()
    {
        $id = $this->request->getPost('id_produk');
        $this->ProM->deleteProduk($id);
        echo json_encode(array('status' => 'ok;', 'text' => ''));
    }

    public function updateProduk($id){
         $data =[
        'titletab'=>'UMKM BATU LAYANG | Produk Saya',
        'contenttit'=>'edit Produk',
        'active'=>'active',
        'content'=>'admin/MyProduct/edit',
        'datacontent'=>[
                        'kategori'=>$this->ProM->getkategori(),
                        'val' =>$this->ProM->produkdetail($id)
                        ]
    ];
    if(!isset($_POST['button'])){
      echo view('admin/headnav', $data);
      }else{
        $this->validation->setRules([
            'nama_produk' => [
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Nama Produk Belum diisi'
                ]
            ],
            'id_kategori'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Kategori Belum dipilih'
                    ]
                ],
            'deskripsi'=>[
                'rules'=> 'required',
                'errors'=>[
                    'required'=>'deskripsi belum diisi'
                ]
            ],
            'stok'=>[
                'rules'=> 'required',
                'errors'=>[
                    'required'=>'stok belum diisi'
                ]
            ],
            'harga_produk'=>[
                'rules'=> 'required',
                'errors'=>[
                    'required'=>'Harga Produk belum diisi'
                ]
            ],
            'tgl_produksi'=>[
                'rules'=> 'required',
                'errors'=>[
                    'required'=>'Tanggal Produksi belum diisi'
                ]
            ],
            'tgl_expired'=>[
                'rules'=> 'required',
                'errors'=>[
                    'required'=>'Tanggal expired belum diisi'
                ]
            ],


         ]);

         $isDataValid = $this->validation->withRequest($this->request)->run();
         $filefoto =$this->request->getFile('foto_produk');
         $id_produk=$this->request->getPost('id_produk');
         //print_r($filefoto);
             if ($filefoto->getError()==4) {
                 $namafoto=$this->request->getPost('foto_produk_old');
             }else{
                 $filefoto->move('assetcustomer/img/product');
                 $namafoto=$filefoto->getName();
             }
             if($isDataValid){
                $data = array(
                'nama_produk' => $this->request->getPost('nama_produk'),
                'produk_id_kategori' => $this->request->getPost('id_kategori'),
                'deskripsi_produk' => $this->request->getPost('deskripsi'),
                'stok_produk'=>$this->request->getPost('stok'),
                'harga_produk' => str_replace(".", "", $this->request->getPost('harga_produk')),
                'produk_id_mitra'=>$this->request->getPost('id_mitra'),
                'tgl_produksi'=> date("Y-m-d", strtotime($this->request->getPost('tgl_produksi'))),
                'tgl_expired'=> date("Y-m-d", strtotime($this->request->getPost('tgl_expired'))),
                'foto_depan'=>'product/'.$namafoto,
                );
        
                $this->ProM->updateproduct($data, $id_produk);

                return redirect()->to('MyProduct');
                //echo json_encode(array('status' => 'ok;', 'text' => ''));
             }else{
                  $data['validation'] = $this->validation;
            return view('admin/headnav', $data);   
            }
        }
    }

     public function downloadqr($namaqr)
     {
         return $this->response->download('assetcustomer/img/Qrcode/'.$namaqr, null);
     }

   
}