<?php
namespace App\Controllers;

use App\Models\PemilikMOdel;
use Myth\Auth\Password;
class Seller extends BaseController
{ 
    protected $validation;

	public function __construct()
    {
        // session_start();
       
          $this->session =  \Config\Services::session();
          $this->PM =new PemilikMOdel();
         
    }

    public function index()
	{  
       $datasesion=$this->PM->getPemilikByid(user()->id);
       $this->session->set($datasesion);

    $data =[
            'titletab'=>'UMKM Batu Layang | Dashboard',
            'contenttit'=>'Dashboard',
            'activedash'=>'mm-active'
            ];

           // print_r($_SESSION);

       echo view('admin/headnav', $data);
	}

}