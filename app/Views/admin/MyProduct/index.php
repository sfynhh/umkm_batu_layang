<div class="content-body">
 	<div class="container-fluid">

 		<div class="row page-titles">
 			<ol class="breadcrumb">
 				<li class="breadcrumb-item active"><a>Data Produk saya</a></li>
 			</ol>
 		</div>

 		<div class="card">
 			<div class="card-header">
    
                <a type="button" class="btn btn-rounded btn-primary" href="<?php echo base_url('TambahProduk') ?>"><span
                class="btn-icon-start text-primary"><i class="fa fa-plus color-primary"></i>
                </span>Add</a>
 				
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table id="example" class="display" style="min-width: 845px">
                     <thead >
                        <tr>
                            <th>Nama Produk </th>
                            <th>Deskripsi Prosuk</th>
                            <th>Stok Produk</th>
                             <th>Harga Produk</th>
                            <th>Tanggal Produksi</th>
                            <th>Tanggal Expired</th>
                            <?php if (in_groups('superadmin')) { ?>
                                <th>Pemilik produk</th>
                           <?php } ?>
                            <th>Foto Produk</th>
                            <th>QR Code</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($Getproduk as $val){ ?>
                         <tr>

                            <td><?php echo $val['nama_produk'] ?></td>
                            <td>
                                <div class="d-flex">
                                    <?php echo substr($val['deskripsi_produk'], 0, 20) ?>...
                                <a href="#"  data-bs-toggle="modal" data-bs-target="#modaldeskripsi<?php echo $val['id_produk'] ?>" class="btn btn-info shadow btn-xs sharp me-1" title="lihat Deskripsi lengkap"><i class="fa-solid fa-circle-info"></i></a>
                              </div>

                            </td>
                            <td><?php echo $val['stok_produk'] ?></td>
                            <td><?php echo rupiah($val['harga_produk']) ?></td>
                            <td><?php echo date('m-d-Y', strtotime($val['tgl_produksi']))?></td>
                             <td><?php echo date('m-d-Y', strtotime($val['tgl_expired']))?></td>
                              <?php if (in_groups('superadmin')) { ?>
                                <td><?php echo $val['nama_mitra'] ?></td>
                           <?php } ?>
                             <td><img src="/assetcustomer/img/<?php echo $val['foto_depan'] ?>" style="height: 100px; width: auto;"></td>
                             <td><button style="border: none;" title="Preview Qr Code dan Download" data-bs-toggle="modal" data-bs-target="#modalpreview<?php echo $val['id_produk'] ?>"><img src="/assetcustomer/img/Qrcode/<?php echo $val['qr_code'] ?>" style="height: 100px; width: auto;"></button></td>
                                                   

                            <td>
                            <div class="d-flex">
                                <a href="<?php echo base_url('UpdateProduk/'.$val['id_produk']) ?>"  class="btn btn-primary shadow btn-xs sharp me-1" title="ubah data"><i class="fas fa-pencil-alt"></i></a>
                                <a href="#" onclick='deletedata(<?php echo $val['id_produk']; ?>, "<?php echo $val['qr_code'] ?>")' class="btn btn-danger shadow btn-xs sharp me-1" title="hapus data"><i class="fa fa-trash"></i></a>
                               
                            </div>
                               
                              												
                        </td>                                              

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<?php foreach($Getproduk as $val) { ?>
    <div id="modalpreview<?php echo $val['id_produk']  ?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Priview Dan Cetak Qr Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="card-body" id="preview<?php echo $val['id_produk'] ?>" name="preview<?php echo $val['id_produk'] ?>">
                    <div class="text-center">
                       <img src="/assetcustomer/img/Qrcode/<?php echo $val['qr_code'] ?>" class="rounded mx-auto d-block" >
                    </div>

                   
                </div>

                <div class="modal-footer">

                    <a type="button" href="<?php echo base_url('MyProduct/downloadqr/'.$val['qr_code']) ?>" class="btn btn-primary"><i class="fa-solid fa-download  me-2"></i>Download</a>
                    <button type="button" class="btn btn-primary" onclick="printJS({printable: '/assetcustomer/img/Qrcode/<?php echo $val['qr_code'] ?>', type: 'image',imageStyle: 'width:65%;margin-bottom:20px;'})"><i class="fa-solid fa-print me-2"></i>cetak </button>
                </div>

            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php foreach($Getproduk as $val) { ?>
    <div id="modaldeskripsi<?php echo $val['id_produk']  ?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Deskripsi Prosuk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="card-body">
                    <div class="text-center">
                        <?php echo $val['deskripsi_produk'] ?>
                    </div >
                   
                </div>

            </div>
        </div>
    </div>
</div>
<?php } ?>
<script src="<?= base_url('assetadmin/js/print.min.js') ?>"></script>
<script type="text/javascript">
    
    $(document).ready(function($){
        
        $('#harga_produk').mask('000.000.000.000.000.000',{reverse: true});
        
    });
  
    function deletedata(id, filegambar) {
     Swal.fire({
      title: 'Yakin Ingin menghapus data ini?',
      text: "Data tidak akan bisa kembali",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {



            $.ajax({
             url:"<?php echo base_url('MyProduct/deleteproduk') ?>",
             global:false,
             async:true,
             type:'post',
             dataType:'json',
             data: ({
                id_produk:id,
                filegambar : filegambar
            }),
             success : function(e) {
                 if(e.status == 'ok;') 
                 {

                  location.reload()

              } 
          },
          error :function(xhr, status, error) {
              alert(xhr.responseText);
          }

      });


    }
})
}

    // $("form").submit(function(e) {
    //     e.preventDefault();
    //     var form = $('#formProduk')[0];
    //     var data = new FormData(form);
    //     $.ajax({
    //         url: 'simpan-data.php',
    //         type: 'post',
    //         enctype: 'multipart/form-data',
    //         data: data,
    //         processData: false,
    //         contentType: false,
    //         cache: false,
    //         success: function(data) {
             
    //           alert(data);

    //           //reload tabel tampilData 
    //           $("#tampilData").load(" #tampilData > *");
    //         }
    //     });
    // });
</script>