 <?php 
	class lappenjualan extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model(array('modellappenjualan'));
		}			

		function index()
		{
			if(isset($_POST['cari']))
			{
				$data['tgla']=$this->input->post('tanggal1');
				$data['tglakh']=$this->input->post('tanggal2');
				$data['laporan']=$this->modellappenjualan->caritanggal($data['tgla'],$data['tglakh']);
				$this->load->view('lappenjualan_v', $data);
			}
			else if(isset($_POST['back'])){
				redirect('lappenjualan');
			}
			else
			{
			$data['tgla']=null;
			$data['tglakh']=null;
			$data['laporan']= $this->modellappenjualan->tampilpenjualan()->result();
			$this->load->view('lappenjualan_v', $data);
			}
		}
		function lappernota($nota)
		{
		    
			$data['idnota']=null;
			$data['tgl']=$nota;
			$data['laporan']= $this->modellappenjualan->tampilpenjualan1($nota);
			$this->load->view('lappenjualan_vnota', $data);
			
		}

		function lapdetail($id){
			$data['idnot']=$id;
			$data['laporan']= $this->modellappenjualan->tampilpenjualan2($id);
			$this->load->view('lappenjualan_vdetail', $data);
		}

		}
 ?>