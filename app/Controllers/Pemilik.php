<?php

namespace App\Controllers;

use \App\Models\UsersModel;
use Myth\Auth\Password;
use \App\Models\PemilikModel;
class Pemilik extends BaseController
{
    protected $validation;
   

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->userModel = new UsersModel();
        $this->PM = new PemilikModel();

    }

    public function index()
    {
     $data = [
        'titletab'         => ' UMKM Batu Layang | Pemilik',
        'contenttit'       => 'Data Pemiik',
        'content'          => 'admin/ms_pemilik/daftar_pemilik',
        'datacontent'      => [
            'pemilik'       => $this->PM->getPemilik()
        ]

    ];
    //dd($data['datacontent']['pemilik']);
    return view('admin/headnav', $data);
    }

    public function editjson()
    {

         $this->validation->setRules([
            'nama_pemilik' => [
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Nama Pemilik Belum diisi'
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
            $id = $this->request->getPost('id_pemilik');
            $data = array(
            'nama_pemilik_mitra'         => $this->request->getPost('nama_pemilik'),
            'email_pemilik_mitra'  => $this->request->getPost('email'),
            'no_telfon_pemilik_mitra'      => $this->request->getPost('no_telepon'),
            'alamat_pemilik_mitra' => $this->request->getPost('alamat'),
            );
            $this->PM->updatepemilik($data, $id);
            echo json_encode(array('status' => 'ok;', 'text' => ''));
            
         }else{
              $validation = $this->validation;
              $error=$validation->getErrors();
              //print_r($error);
              echo json_encode(array('status' => 'error;', 'text' => '', 'data'=>$error));
         }
    }

    
    public function delete()
    {
        $id = $this->request->getPost('id_pemilik');
        $this->PM->deletePemilik($id);
        //session()->setFlashdata('success', 'Data Departemen Berhasil Dihapus');

        echo json_encode(array('status' => 'ok;', 'text' => ''));
    }
}
    