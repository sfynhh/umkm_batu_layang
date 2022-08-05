<?php 
namespace App\Controllers;

use App\models\ProduksiModel;

class Produksi extends BaseController
{
	public function __construct(){
        session_start();
		$this->produksimodel = new ProduksiModel();
	}
	public function index(){
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
		$data['produksi'] = $this->produksimodel->daftarproduksi();
		echo view('HeaderBootstrap');
		echo view('SidebarBootstrap');
		echo view('produksi/daftarproduksi', $data);
	}
    public function listmenu(){
        $data['produksi']=$this->produksimodel->getlistmenu();
        echo view('HeaderBootstrap');
        echo view('SidebarBootstrap');
        echo view('produksi/listmenu', $data);
    }
    public function detailproduksi($id,$idmenu, $status, $tgl){
        $data['id_produksi']=$id;
        $data['id_menu']=$idmenu;
        $data['status']=$status;
        $data['tgl']=$tgl;
        $data['detail']=$this->produksimodel->getdetailproduksi($id);
        echo view('HeaderBootstrap');
        echo view('SidebarBootstrap');
        echo view('produksi/detailproduksi', $data);
    }
    public function selesai($idproduksi, $tgl)
    {
        $this->produksimodel->selesaiproduksi($idproduksi);
         $nominalbb = $this->produksimodel->nominalBB($idproduksi);
        $nominalbop = $this->produksimodel->nominalBOP($idproduksi);
        $nominalbtkl = $this->produksimodel->nominalBTKL($idproduksi);
        $jurnal = $this->produksimodel->jurnalendproses($nominalbb, $nominalbtkl, $nominalbop,$tgl, $idproduksi);
         return redirect()->to(base_url('Produksi'));
    }
    public function isibom($idmenu, $qty= null, $tgl = null){
        $data['idmenu']=$idmenu;
        $data['qtymenu']=$qty;
        $data['tgl']=$tgl;
         $data['idproduksi']=$this->produksimodel->idproduksi();
         $data['listbahan']=$this->produksimodel->getlistbahan();
         $data['listbom']=$this->produksimodel->getlistbom();
        echo view('HeaderBootstrap');
        echo view('SidebarBootstrap');
        echo view('produksi/inputbom', $data);
    }
    public function deletebom($id,$idmenu){
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
        $this->produksimodel->deletebom($id);

        return redirect()->to(base_url('produksi/isibom/'.$idmenu.'/'.$_SESSION['qtyproduksi'].'/'.$_SESSION['tglproduksi'])); 
    }
	public function isibomproses(){
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
		//di cek dulu, agar validasi tidak terpicu pada saat awal method ini diakses

         $data['idmenu']=$_POST['idmenu'];
         $data['idproduksi']=$this->produksimodel->idproduksi();
         $data['listbahan']=$this->produksimodel->getlistbahan();
         $data['listbom']=$this->produksimodel->getlistbom();
            $validation =  \Config\Services::validation();
            //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
            if (! $this->validate(
                        [
                            'qtymenu' => 'required|numeric|is_natural',
                            'tglproduksi' => 'required',
                            'qtybahan' => 'required|numeric|is_natural',
                        ],
                                [   // Errors
                                    'qtymenu' => [
                                        'required' => 'qtymenu tidak boleh kosong',
                                		'numeric' => 'qtymenu telepon harus angka',
                               			'is_natural' => 'qtymenu harus dalam angka natural bukan minus (0 s/d 9)',
                                    ],
                                    'tglproduksi' => [
                                        'required' => 'nama tidak boleh kosong'
                                    ],
                                    'qtybahan' => [
                                         'required' => 'qtymenu tidak boleh kosong',
                                        'numeric' => 'qtymenu telepon harus angka',
                                        'is_natural' => 'qtymenu harus dalam angka natural bukan minus (0 s/d 9)',
                                    ],
                                    
                                ]
                    )
            ){
                $data['validation']=$this->validator;
                //kirim data error ke views, karena ada isian yang tidak sesuai rules
                echo view('HeaderBootstrap');
                echo view('SidebarBootstrap');
                echo view('Produksi/inputbom', $data);

            }else{
                //blok ini adalah blok jika sukses, yaitu panggil method insertData()
                //panggil metod dari kosan model untuk diinputkan datanya
                    $_SESSION['tglproduksi']=substr($_POST['tglproduksi'],0,10);
                    $_SESSION['qtyproduksi']=$_POST['qtymenu'];
                    $idbahan=explode('|',$_POST['bahan']);
                    $hasil = $this->produksimodel->tambahbom($idbahan[0]);
                    if($hasil->connID->affected_rows>0){
                                 ?>
                                     <script type="text/javascript">
                                        alert("Sukses ditambahkan");
                                    </script>
                                  <?php   
                                 }
                    return redirect()->to(base_url('Produksi/isibom/'.$data['idmenu'].'/'.$_SESSION['qtyproduksi'].'/'.$_SESSION['tglproduksi']));

            }
        
	}

    public function isiproduksiproses(){
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
        //di cek dulu, agar validasi tidak terpicu pada saat awal method ini diakses
         $data['idproduksi']=$this->produksimodel->idproduksi();
         $data['listbahan']=$this->produksimodel->getlistbahan();
         $data['listbom']=$this->produksimodel->getlistbom();
            $validation =  \Config\Services::validation();
            //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
            if (! $this->validate(
                        [
                            'idproduksi1' => 'required',
                            'idmenu1' => 'required',
                            'total' => 'required',
                        ],
                                [   // Errors
                                    'idproduksi1' => [
                                        'required' => 'qtymenu tidak boleh kosong'
                                    ],
                                    'idmenu1' => [
                                        'required' => 'nama tidak boleh kosong'
                                    ],
                                    'total' => [
                                         'required' => 'qtymenu tidak boleh kosong',
                                    ],
                                    
                                ]
                    )
            ){
                $data['validation']=$this->validator;
                //kirim data error ke views, karena ada isian yang tidak sesuai rules
                echo view('HeaderBootstrap');
                echo view('SidebarBootstrap');
                echo view('Produksi/inputbom', $data);

            }else{
                //blok ini adalah blok jika sukses, yaitu panggil method insertData()
                //panggil metod dari kosan model untuk diinputkan datanya
                    $hasil = $this->produksimodel->tambahproduksi($_SESSION['qtyproduksi'],$_SESSION['tglproduksi']);
                    $hasil1 = $this->produksimodel->jurnalBB($_SESSION['tglproduksi']);
                    $this->produksimodel->updatebom();
                    if($hasil->connID->affected_rows>0){
                                 ?>
                                     <script type="text/javascript">
                                        alert("Sukses ditambahkan");
                                    </script>
                                  <?php   
                                 }
                    return redirect()->to(base_url('Produksi'));

            }
        
    }

    public function coba(){
        $arr=[];
        $data=$this->produksimodel->itembom();
        foreach ($data as $key) {
             $ar=[];
            $ar['id']=$key->idbom;
            $ar['kode_bahan']=$key->kode_bahan;
            array_push($arr, $ar); 
        }
        
        print_r($arr);
        echo $arr[0]['id'];

        // $daftarmenu='';
        // foreach ($arr as $value) {
        //     $daftarmenu.=$value . ',';
        // }
        // echo $daftarmenu;
    }

    public function endproses($idproduksi, $tgl){
        
        return redirect()->to(base_url('Produksi'));
    }
    

    
}

 