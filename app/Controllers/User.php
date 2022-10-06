<?php

namespace App\Controllers;

use \App\Models\UsersModel;
use Myth\Auth\Password;

class User extends BaseController
{
    protected $validation;
    protected $departemenModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->userModel = new UsersModel();

    }

    public function index()
    {
     $data = [
        'titletab'         => ' UMKM Batu Layang | Users',
        'contenttit'       => 'Data User',
        'content'          => 'admin/ms_user/data_user',
        'datacontent'      => [
            'data_user'       => $this->userModel->getUsers(),
            'usergrup'        => $this->userModel->getUsersgrup()
            

        ]

    ];
    return view('admin/headnav', $data);
    }

    public function addJson()
    {
        
           $this->validation->setRules([
            'nama_pemilik' => [
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Nama Pegawai Belum diisi'
                ]
            ],
            'nama_mitra' => [
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Nama mitra Belum diisi'
                ]
            ],
            'email' => [
                'rules'=>'required|valid_email|is_unique[users.email]',
                'errors'=>[
                    'required'=>'keterangan Belum diisi',
                    'valid_email'=>'masukan email yang sesuai',
                    'is_unique'=>'email sudah tersedia'
                ]
            ],
            'username' => [
                'rules'=>'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
                'errors'=>[
                    'required'=>'username Belum diisi',
                    'alpha_numeric_space'=>'username Tidak boleh mengandung karakter selain huruf dan angka',
                    'min_length'=>'username terlalu Pendek',
                    'max_length'=>'username terlalu panjang',
                    'is_unique'=>'username sudah tersedia'
                    
                ]
            ],
            'password'=>[
                 'rules'=>'required|min_length[8]',
                 'errors'=>[
                        'required'=>'Create Password Belum diisi',
                        'min_length'=>'Pasword Terlalu Pendek'

                    ]
            ],
            'pass_confirm' => [
                'rules'=>'required|matches[password]',
                'errors'=>[
                    'required'=>'konfirmasi pasword Belum diisi',
                    'matches'=>'Pasword Tidak Sama'
                ]
            ]

        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $pw=$this->request->getPost('pass_confirm');
            $password_hash = Password::hash($pw);
            $data = array(
                'nama_pemilik' => $this->request->getPost('nama_pemilik'),
                'email' => $this->request->getPost('email'),
                'nama_mitra'=>$this->request->getPost('nama_mitra'),
                'username' => $this->request->getPost('username'),
                'password_hash'=> $password_hash,
                'active'=>1

            );
            $this->userModel->createUser($data);
             $idusernew=$this->userModel->getmaxiduser();
             $data2 = array(
                'group_id' => 2,
                'user_id' => $idusernew['idnew'],

            );
            $this->userModel->createUserGrup($data2);
            $id_user=$this->userModel->max_iduser();
            
            $datapemimilik=array(
                    'nama_pemilik_mitra' =>$this->request->getPost('nama_pemilik'),
                    'alamat_pemilik_mitra'=>$this->request->getPost('alamat'),
                    'no_telfon_pemilik_mitra'=>$this->request->getPost('no_telepon'),
                    'email_pemilik_mitra'=>$this->request->getPost('email'),
                    'id_user_mitra' =>$id_user-1,
            );
            $savedatapemilik=$this->userModel->createdatapemilik($datapemimilik);
            $id_pemilik =$this->userModel->max_idpemilik();
            $datamitra=array(
                    'nama_mitra'=>$this->request->getPost('nama_mitra'),
                    'alamat_mitra'=>$this->request->getPost('alamat'),
                    'no_telepon_mitra'=>$this->request->getPost('no_telepon'),
                    'email_mitra'=>$this->request->getPost('email'),
                    'id_pemilik'=>$id_pemilik-1,
            );
            
            $savedatamitra=$this->userModel->createdatamitra($datamitra);
            //session()->setFlashdata('success', 'Data Departemen Berhasil Ditambahkan');
             echo json_encode(array('status' => 'ok;', 'text' => '', 'cekid'=>$idusernew['idnew']));
            //return redirect()->to('Users');
        }else {
            // $data['validation'] = $this->validation;
           $validation = $this->validation;
           $error=$validation->getErrors();
            $dataname=$_POST;
                  //print_r($error);
                  echo json_encode(array('status' => 'error;', 'text' => '', 'data'=>$error,'dataname'=>$dataname));
             //return view('headnav', $data);
        } 
        
        

    }


    public function delete()
    {
        $id = $this->request->getPost('id_usr');
        $this->userModel->deleteUser($id);
        //session()->setFlashdata('success', 'Data Departemen Berhasil Dihapus');

        echo json_encode(array('status' => 'ok;', 'text' => ''));
    }
}
    