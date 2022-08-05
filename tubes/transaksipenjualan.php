<?php
class transaksipenjualan extends CI_controller{
 function __construct() {
        parent::__construct();
        $this->load->model(array('modelpenjualan'));
        // $this->load->helper('formatrp');
        $this->load->library('form_validation');
            }
    
    function index()
    {   
        if(isset($_POST['submit']))
        {  
           $this->modelpenjualan->upstok=$_POST['qty'];
           $this->modelpenjualan->idcat=$_POST['cat'];
           $this->modelpenjualan->simpan_detail();
           $this->modelpenjualan->updatestoksimpan();
           redirect('transaksipenjualan');
        }
        else if(isset($_POST['record'])){
            $tot=$_POST['idpenjualan'];
            $pembayaran=$_POST['pembayaran'];
            $sql=sprintf("SELECT id_cat, sum(subtotal) as bayar FROM detail_jual_j WHERE id_nota_penjualan=%d",$tot);
            $query=$this->db->query($sql)->result();
            $total=0;
            foreach ($query as $q ) {
               $total=$total+$q->bayar;
            }
            $this->modelpenjualan->simpannota($total);
            $this->modelpenjualan->jurnal($tot,$total,$pembayaran); 
            redirect('transaksipenjualan');
        }
        else
        { 
             $data['nota']=$this->modelpenjualan->idnot();
            
            // $id_nota=$this->db->get_where('nota_penjualan',array('id_nota_penjualan'=>$nota))->row_array();
            $data['cat']=$this->modelpenjualan->tampil_cat();
            $data['karyawan']=$this->modelpenjualan->tampil_karyawan();
            $data['pelanggan']=$this->modelpenjualan->tampil_pelanggan();
            $data['detail']=$this->modelpenjualan->tampil_detail_jual()->result();
            $this->load->view('penjualanview', $data);
            }
     }
    
    
    function hapusitem($id,$id1,$id2)
    {   
        $this->modelpenjualan->updatestokhapus($id1,$id2);
        $this->modelpenjualan->hapusdetail($id);
        redirect('transaksipenjualan');
    }
    function edititem($a,$b,$c){
        $d=$a;
        if(isset($_POST['simpan'])){
            $idcat=$this->input->post('cat');
            $qty=$this->input->post('qty');
            $this->modelpenjualan->updatedetail($idcat,$qty,$d);
            redirect('transaksipenjualan');
        }else{
            $detail=$this->db->get_where('detail_jual_j', array('id_detail_j'=>$a))->row_array();
            $data['idcat']=$detail['id_cat'];
            $data['qty']=$detail['jumlah_cat'];
            $data['id']=$detail['id_nota_penjualan'];
            $data['cat']=$this->modelpenjualan->tampil_cat();
            $this->modelpenjualan->editdetail($a,$b,$c);
            $data['detail']=$this->modelpenjualan->tampil_detail_jual()->result();
            $this->load->view('penjualanviewedit', $data);
        }
    }
}
    
?>