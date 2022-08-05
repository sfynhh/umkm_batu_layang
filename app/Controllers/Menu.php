<?php
namespace App\Controllers;

use App\Models\MenuModel;

class Menu extends BaseController
{
    public function __construct()
    {  // session_start();
        //load kelas RuangKursus Model
        $this->MenuModel = new MenuModel();
    }

    //form input akan diakses dari index
    public function index()
    {
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
        //di cek dulu, agar validasi tidak terpicu pada saat awal method ini diakses
        $data['idmenu']=$this->MenuModel->idmenu();
         if( !isset($_POST['idmenu']) and !isset($_POST['nama']) and !isset($_POST['harga']) and !isset($_POST['qty']) and !isset($_POST['Ketegori'])){
            //kondisi awal ketika di akses, jadi tidak perlu memanggil validasi
            echo view('HeaderBootstrap');
            echo view('SidebarBootstrap');
            echo view('Menu/InputMenu', $data);
        }
        else{
            $validation =  \Config\Services::validation();
            //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
            if (! $this->validate(
                        [
                            
                            'namamenu' => 'required',
                            'harga' => 'required',
                            
                        ],
                                [   // Errors
                                    
                                    'namamenu' => [
                                        'required' => 'Menu tidak boleh kosong'
                                    ],
                                    'harga' => [
                                        'required' => 'Harga tidak boleh kosong'
                                    ]
                                ]
                    )
            ){
                //kirim data error ke views, karena ada isian yang tidak sesuai rules
                $data['validation']=$this->validator;
                echo view('HeaderBootstrap');
                echo view('SidebarBootstrap');
                echo view('Menu/InputMenu', $data);

            }else{
                //blok ini adalah blok jika sukses, yaitu panggil method insertData()
                //panggil metod dari kosan model untuk diinputkan datanya
                $hasil = $this->MenuModel->insertData();
                return redirect()->to(base_url('Menu/ListMenu')); 
            }
        }
    }

    public function listmenu()
    {
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
        $data['Menu'] = $this->MenuModel->getAll();
        echo view('HeaderBootstrap');
        echo view('SidebarBootstrap');
        echo view('Menu/ListMenu', $data);
    }

    public function editmenu($id){
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
        $data['menu'] = $this->MenuModel->editData($id);
        echo view('HeaderBootstrap');
        echo view('SidebarBootstrap');
        echo view('Menu/EditMenu', $data);
    }

    public function editmenuproses(){
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
        // $id = $_POST['idmenu'];
        // $nik = $_POST['nik'];
        // $nama_pegawai = $_POST['nama_pegawai'];
        // $alamat = $_POST['alamat'];
        // $no_telepon = $_POST['no_telepon'];
        // $no_rekening = $_POST['no_rekening'];

        $validation =  \Config\Services::validation();
        if (! $this->validate([
                            'idmenu' => 'required',
                            'namamenu' => 'required',
                            'harga' => 'required|numeric|is_natural',
                            'status' => 'required',
                            'kategori'=> 'required',
                        ],
                                [   // Errors
                                    'idmenu' => [
                                        'required' => 'id menu tidak tidak boleh kosong',
                                    ],
                                    'namamenu' => [
                                        'required' => 'nama menu tidak boleh kosong'
                                    ],
                                    'harga' => [
                                        'required' => 'harga tidak boleh kosong',
                                        'numeric' => 'harga harus angka',
                                        'is_natural' => 'harga harus dalam angka natural bukan minus (0 s/d 9)'
                                    ],
                                    'status' => [
                                        'required' => 'status tidak boleh kosong'
                                    ]
                ]
        ))
        {                
            
            echo view('HeaderBootstrap');
            echo view('SidebarBootstrap');
            echo view('Menu/EditMenu',[
                'validation' => $this->validator,
                'pegawai' => $this->MenuModel->editData($id),
                'idmenu' => $this->MenuModel->idmenu()
            ]);

        }
        else
        {
            //panggil metod dari kosan model untuk diinputkan datanya
            $hasil = $this->MenuModel->updateData();
            if($hasil->connID->affected_rows>0){
                ?>
                <script type="text/javascript">
                    alert("Sukses diupdate");
                </script>
                <?php   
            }
            $data['Menu'] = $this->MenuModel->getAll();
            echo view('HeaderBootstrap');
            echo view('SidebarBootstrap');
            echo view('Menu/ListMenu', $data);
        }    
    }

    public function deletemenu($id){
        // if(!isset($_SESSION['nama'])){
        //     return redirect()->to(base_url('Neccimanggis')); 
        // }
        $this->MenuModel->deleteData($id);

        return redirect()->to(base_url('Menu/ListMenu')); 
    }
}    