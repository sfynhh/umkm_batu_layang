<?php
namespace App\Controllers;

use App\Models\BBModel;

class Bahanbaku extends BaseController
{

	public function __construct()
    {
        session_start();
       
        $this->BBmodel = new BBModel();
         
    }

    public function index()
	{  //if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
        //tambahkan pengecekan login
        // if(!isset($_SESSION['nama'])){
        // //     return redirect()->to(base_url('home')); 
        // }

        //cek dulu apakah kondisi form sudah diisi atau belum, kalau belum berarttidak perlu memanggil fungsi validasi
        $data['idbahan']=$this->BBmodel->idbahan();
        if(isset($_POST['idbahan']) and isset($_POST['namabahan']) and isset($_POST['hargabahan'])){
                //
                $validation =  \Config\Services::validation();

                 if (! $this->validate(
                    [

                        'namabahan' => 'required',
                        'hargabahan' => 'required',
                        'stok'=> 'required|numeric'
                        ],[   // Errors
                            'namabahan' => [
                                'required' => 'Nama bahan tidak boleh kosong'
                            ],
                            'hargabahan' => [
                                'required' => 'harga tidak boleh kosong'
                            ],
                            'stok'=> [
                                'required'=> 'kuantitas tidak boleh kosong',
                                'numeric'=> 'kuantitas harus angka'
                            ]
                        ]
                ))
                {                
                    $data['validation']=$this->validator;
                    echo view('HeaderBootstrap');
                    echo view('SidebarBootstrap');
                    echo view('Bahanbaku/Inputbahan', $data);

                }
                else
                {
                    //panggil metod dari kosan model untuk diinputkan datanya
                    $hasil = $this->BBmodel->tambahbahan();
                    if($hasil->connID->affected_rows>0){
                        ?>
                        <script type="text/javascript">
                            alert("Sukses ditambahkan");
                        </script>
                        <?php	
                    }
                    $data['bahanbaku'] = $this->BBmodel->getAll();
                    echo view('HeaderBootstrap');
                    echo view('SidebarBootstrap');
                    echo view('Bahanbaku/daftarbahanbaku', $data);
                }    
                //
        }else{
                $validation =  \Config\Services::validation();
                $data['validation']=$validation;
                    //kondisi awal ketika di akses, jadi tidak perlu memanggil validasi
                    echo view('HeaderBootstrap');
                    echo view('SidebarBootstrap');
                    echo view('Bahanbaku/Inputbahan', $data);
        }
	}

    public function listbahanbaku(){
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
        //tambahkan pengecekan login
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('home')); 
        // }

        $data['bahanbaku'] = $this->BBmodel->getAll();
        echo view('HeaderBootstrap');
        echo view('SidebarBootstrap');
        echo view('Bahanbaku/daftarbahanbaku', $data);
    }
     public function deletebahanbaku($id){
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
        //tambahkan pengecekan login
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('home')); 
        // }

     $this->BBmodel->deletebahanbaku($id);

     return redirect()->to(base_url('Bahanbaku/listbahanbaku')); 
    }

    public function editbahanbaku($id){
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }

        // //tambahkan pengecekan login
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('home')); 
        // }

        $data['bahanbaku'] = $this->BBmodel->editbahanbaku($id);
        echo view('HeaderBootstrap');
        echo view('SidebarBootstrap');
        echo view('Bahanbaku/editBahanbaku', $data);
    }
        public function editbahanbakuproses(){
        //     if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
        // //tambahkan pengecekan login
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('home')); 
        // }
        
        $id = $_POST['idbahan'];
        $validation =  \Config\Services::validation();

        if (! $this->validate([

                        'namabahan' => 'required',
                        'hargabahan' => 'required',
                        'stok'=> 'required|numeric'
        ],
                [   // Errors
                     'namabahan' => [
                                'required' => 'Nama bahan tidak boleh kosong'
                            ],
                            'hargabahan' => [
                                'required' => 'harga tidak boleh kosong'
                            ],
                            'stok'=> [
                                'required'=> 'kuantitas tidak boleh kosong',
                                'numeric'=> 'kuantitas harus angka'
                            ]
                ]
        ))
        {                
            
            echo view('HeaderBootstrap');
            echo view('SidebarBootstrap');
            echo view('Bahanbaku/editBahanbaku',['validation' => $this->validator,'bahanbaku'=> $this->BBmodel->editbahanbaku($id)
            ]);

        }
        else
        {
            //panggil metod dari kosan model untuk diinputkan datanya
            $hasil = $this->BBmodel->updatebahanbaku();
            if($hasil->connID->affected_rows>0){ ?> 
                <script type="text/javascript">
                    alert("Sukses diupdate");
//                 </script>
<?php  
        
             }
            $data['bahanbaku'] = $this->BBmodel->getAll();
            echo view('HeaderBootstrap');
            echo view('SidebarBootstrap');
            echo view('Bahanbaku/daftarbahanbaku', $data);
        }    
    }
}?>

<!-- 

//     public function editkosanproses(){

//         //tambahkan pengecekan login
//         if(!isset($_SESSION['nama'])){
//             return redirect()->to(base_url('home')); 
//         }
        
//         $id = $_POST['id_kos'];
//         $nama = $_POST['namakosan'];
//         $jk = $_POST['jeniskosan'];
//         $alamat = $_POST['alamat'];
//         $telepon = $_POST['telepon'];
        

//         $validation =  \Config\Services::validation();

//         if (! $this->validate([
//                 'namakosan' => 'required',
//                 'alamat' => 'required',
//                 'telepon' => 'required|numeric'
//         ],
//                 [   // Errors
//                     'namakosan' => [
//                         'required' => 'Nama kosan tidak boleh kosong',
//                     ],
//                     'alamat' => [
//                         'required' => 'Alamat kosan tidak boleh kosong'
//                     ],
//                     'telepon' => [
//                         'required' => 'Nomor telepon tidak boleh kosong',
//                         'numeric' => 'Nomor telepon harus angka'
//                     ]
//                 ]
//         ))
//         {                
            
//             echo view('HeaderBootstrap');
//             echo view('SidebarBootstrap');
//             echo view('kosan/Editkosan',[
//                 'validation' => $this->validator,
//                 'koskosan' => $this->kosanmodel->editData($id)
//             ]);

//         }
//         else
//         {
//             //panggil metod dari kosan model untuk diinputkan datanya
//             $hasil = $this->kosanmodel->updateData();
//             if($hasil->connID->affected_rows>0){ 
               <script type="text/javascript">
//                     alert("Sukses diupdate");
//                 </script> -->

               <?php	
//             }
//             $data['koskosan'] = $this->kosanmodel->getAll();
//             echo view('HeaderBootstrap');
//             echo view('SidebarBootstrap');
//             echo view('kosan/Daftarkosan', $data);
//         }    
//     }

//     public function deletekosan($id){
//         //tambahkan pengecekan login
//         if(!isset($_SESSION['nama'])){
//             return redirect()->to(base_url('home')); 
//         }

// 		$this->kosanmodel->deleteData($id);

// 		return redirect()->to(base_url('kosan/daftarkosan')); 
// 	}
// }