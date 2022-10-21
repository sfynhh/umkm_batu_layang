<div class="content-body">
 	<div class="container-fluid">

 		<div class="row page-titles">
 			<ol class="breadcrumb">
 				<li class="breadcrumb-item active"><a>Data Fotot Produk</a></li>
 			</ol>
 		</div>

 		<div class="card">
 			<div class="card-header">
    
                <a type="button" class="btn btn-rounded btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambah"><span
                class="btn-icon-start text-primary"><i class="fa fa-plus color-primary"></i>
                </span>Add</a>
 				
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table id="example" class="display" style="min-width: 845px">
                     <thead >
                        <tr>
                            <th>Nama Produk </th>
                     
                        
                            <?php if (in_groups('superadmin')) { ?>
                                <th>Pemilik produk</th>
                           <?php } ?>
                            <th>Foto Produk</th>
                           
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($Getproduk as $val){ ?>
                         <tr>

                            <td><?php echo $val['nama_produk'] ?></td>
                       
                        
                              <?php if (in_groups('superadmin')) { ?>
                                <td><?php echo $val['nama_mitra'] ?></td>
                           <?php } ?>
                             <td><img src="/assetcustomer/img/<?php echo $val['path_foto'] ?>" style="height: 100px; width: auto;"></td>
                             <td>
                            <div class="d-flex">
                                <a href="#"  data-bs-toggle="modal" data-bs-target="#modaledit<?php echo $val['id_foto'] ?>" class="btn btn-primary shadow btn-xs sharp me-1" title="ubah data"><i class="fas fa-pencil-alt"></i></a>
                                <a href="#" onclick='deletedata(<?php echo $val['id_foto']; ?>, "<?php echo $val['path_foto'] ?>")' class="btn btn-danger shadow btn-xs sharp me-1" title="hapus data"><i class="fa fa-trash"></i></a>
                               
                            </div>
                               
                              												
                        </td>                                              

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<div id="modaltambah" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Foto Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>

            <div class="card-body">
                <div class="basic-form">
                     <!-- <form id="frmtambah"> -->
                    <?php echo form_open_multipart('MyProduct/tambahfoto') ?>
                        
                        <div class="mb-3">
                            <label class="mb-1"><strong>Nama kategori</strong></label>
                            <select id="id_produk"  class="default-select form-control wide form-custom" name="id_produk" value="<?= set_value('id_produk')?>">
                                    <?php foreach($getnamaproduk as $val){ ?>
                                        <option value="<?php echo $val['id_produk']; ?>" <?= set_value('id_produk')==$val['id_produk'] ?'selected':'';?>>
                                            <?php echo $val['nama_produk'].' ('.$val['nama_mitra'].')' ?>

                                        </option>
                                    <?php } ?>

                            </select>
                        </div>

                        <div id="nama_kategori">
                            
                        </div>
                        <div class=" mb-3">
                                <label><strong>Foto Produk</strong></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Upload</span>
                                <div class="form-file">
                                    <input type="file" class="form-file-input form-control form-custom" name="foto_produk" required>
                                </div>
                            </div>
                            </div>
                        <div class="text-center mt-4" style="padding-top:40px">
                        <button type="submit" class="btn btn-primary btn-block">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($Getproduk as $value ) { ?>
<div id="modaledit<?php echo $value['id_foto'] ?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>

            <div class="card-body">
                <div class="basic-form">
                 <!-- <form id="frmedit<?php echo $value['id_foto'] ?>"> -->
                    <?php echo form_open_multipart('MyProduct/ubahdatafoto') ?>
                    <input type="hidden" name="id_foto" value="<?= $value['id_foto'] ?>">
                    <div class="mb-3">
                     <label class="mb-1"><strong>Nama kategori</strong></label>
                     <select id="id_produk"  class="default-select form-control wide form-custom" name="id_produk" value="<?= set_value('id_produk')?>">
                        <?php foreach($getnamaproduk as $val){ ?>
                            <option value="<?php echo $val['id_produk']; ?>" <?= $value['id_produk']==$val['id_produk'] ?'selected':'';?>>
                                <?php echo $val['nama_produk'].' ('.$val['nama_mitra'].')' ?>

                            </option>
                        <?php } ?>

                    </select>
                </div>
                <div class=" mb-3">
                                <input type="hidden" name="foto_produk_old" value="<?php echo str_replace("product/","", $value['path_foto']) ?>">
                                <label><strong>Foto Produk</strong></label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Upload</span>
                                    <div class="form-file">
                                        <input type="file" class="form-file-input form-control form-custom" name="foto_produk" value="">
                                        <?php echo str_replace("product/","", $value['path_foto']) ?>
                                    </div>
                                </div>
                            </div>
                <div class="text-center mt-4"  style="padding-top:40px">
                    <button type="submit" class="btn btn-primary btn-block">Ubah Data</button>
                </div>
            </form>
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
             url:"<?php echo base_url('MyProduct/deletefotoproduk') ?>",
             global:false,
             async:true,
             type:'post',
             dataType:'json',
             data: ({
                id_foto :id,
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