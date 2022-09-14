<?php
namespace App\Controllers;

use App\Models\PemilikModel;
use Myth\Auth\Password;
class Seller extends BaseController
{ 
    protected $validation;

	public function __construct()
    {
        // session_start();
       
          $this->session =  \Config\Services::session();
          $this->PM =new PemilikModel();
         
    }

    public function index()
	{  

    $data =[
            'titletab'=>'UMKM Batu Layang | Dashboard',
            'contenttit'=>'Dashboard',
            'activedash'=>'mm-active'
            ];

           // print_r($_SESSION);

       echo view('admin/headnav', $data);
	}

}