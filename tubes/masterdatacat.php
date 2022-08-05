<?php 
 	class masterdatacat extends Ci_Controller{
 		public $model = null;
 		public function __construct(){
 			parent::__construct();
 			$this->load->model('masterdatacat1');
 			$this->model=$this->masterdatacat1;
 		}

 		public function index(){
 			$rows=$this->model->datacat();
		$this->load->view('datacat', ['rows'=>$rows]);
 		}

 		public function tambahcat(){
 			if(isset($_POST['tambah'])){
 				$this->model->idcat=$_POST['id_cat'];
 				$this->model->warna=$_POST['warna'];
 				$this->model->harga=$_POST['harga'];
 				$this->model->stok=$_POST['stock'];
 				$this->model->idjeniscat=$_POST['id_jenis_cat'];
 				$this->model->merek=$_POST['merk'];
 				$this->model->tambahcat();
 				redirect('masterdatacat');

 			}else{
 				$query = $this->db->query("SELECT * FROM jenis_cat");
			//if ($query->num_row() ==0) exit(1);
				$data['rows'] =$query->result();
				$data['jeniscat']=$this->model->tampil_jenis();
 					$this->load->view('datacattambah', $data);
 			}
 		}
 			public function deletecat($pk) {
		//menentukan kode yang akan di hapus
		$this->model->idcat = $pk;
		//menghapus baris data di dalam tabel barang
		$this->model->hapuscat();
		//mengarahkan kembali ke halaman utama/index
		redirect('masterdatacat');
	}
		public function updatecat($pk) {
		//belum implementasi
		if (isset($_POST['tambah'])) {
		
				$this->model->warna=$_POST['warna'];
				$this->model->harga=$_POST['harga'];
				$this->model->stok=$_POST['stock'];
				$this->model->idjeniscat=$_POST['id_jenis_cat'];
				$this->model->merek=$_POST['merk'];
				$this->model->idcat=$_POST['id_cat'];
				$this->model->updatecat();
			redirect('masterdatacat');
		}else{
			$query = $this->db->query("SELECT * FROM cat WHERE 
			id_cat='$pk'");
			//if ($query->num_row() ==0) exit(1);
				$row =$query->row();
				$this->model->idcat=$row->id_cat;
				$this->model->warna=$row->warna;
				$this->model->harga=$row->harga;
				$this->model->stok=$row->stok;
				$this->model->idjeniscat=$row->id_jenis_cat;
				$this->model->merek=$row->Merek;
				$this->load->view('updatecat', ['model'=>$this->model]);
		}
 	}}
 ?>