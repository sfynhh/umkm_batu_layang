<?php
namespace App\Controllers;

use App\Models\akunModel;

class Coa extends BaseController
{
    public function __construct()
    {   //session_start();
        //load kelas RuangKursus Model
        $this->akunModel = new akunModel();
    }

    //form input akan diakses dari index
    public function index()
    {
        $data['akun'] = $this->akunModel->getAll();
        echo view('HeaderBootstrap');
        echo view('SidebarBootstrap');
        echo view('Coa/Listcoa', $data);
    }

   
}