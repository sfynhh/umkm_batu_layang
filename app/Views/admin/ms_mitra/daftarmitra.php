 <div class="content-body">
 	<div class="container-fluid">

 		<div class="row page-titles">
 			<ol class="breadcrumb">
 				<li class="breadcrumb-item "><a href="javascript:void(0)">Master Data</a></li>
 				<li class="breadcrumb-item active"><a href="javascript:void(0)">Data Mitra</a></li>
                
 			</ol>
 		</div>

 		<div class="card">
            <div class="card-body">
               <div class="table-responsive">
                  <table id="example" class="display" style="min-width: 845px">
                     <thead>
                        <tr>
                            <th>Nama Mitra</th>
                            <th>Alamat Mitra</th>
                            <th>No telepon Mitra</th>
                            <th>Email Mitra</th>
                            <th>Pemilik</th>
                            <th>aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($mitra as $val){ ?>
                         <tr>

                            <td><?php echo $val->nama_mitra ?></td>
                            <td><?php echo $val->alamat_mitra ?></td>
                            <td><?php echo $val->no_telepon_mitra ?></td>
                            <td><?php echo $val->email_mitra ?></td>
                             <td><?php echo $val->nama_pemilik_mitra ?></td>

                            <td>
                               <div class="d-flex">
                                <a href="#"  data-bs-toggle="modal" data-bs-target="#modaledit<?php echo $val->id_mitra ?>" class="btn btn-primary shadow btn-xs sharp me-1" title="ubah data"><i class="fas fa-pencil-alt"></i></a>
                                <a href="#" onclick='deletedata(<?php echo $val->id_mitra; ?>)' class="btn btn-danger shadow btn-xs sharp me-1" title="hapus data"><i class="fa fa-trash"></i></a>
                               
                            </div>												
                        </td>                                              

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>


</div>

<!-- MODAL TAMBAH -->
<?php foreach ($mitra as $val ) { ?>
<div id="modaledit<?php echo $val->id_mitra ?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>

            <div class="card-body">
                <div class="basic-form">
                 <form id="frmedit<?php echo $val->id_mitra ?>">
                    <input type="hidden" name="id_mitra" value="<?= $val->id_mitra ?>">
                    <div class="mb-3">
                        <label class="mb-1"><strong>Nama Mitra(Toko)</strong></label>
                        <input type="text" class="form-control form-custom " name="nama_mitra" aria-describedby="emailHelp" placeholder="nama mitra" value="<?= $val->nama_mitra ?>">
                    </div>

                    <div id="nama_mitra">
                        
                    </div>
                    <div class="mb-3">
                        <label class="mb-1"><strong><?=lang('Auth.email')?></strong></label>
                        <input type="email" class="form-control form-custom" name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= $val->email_mitra ?>">
                        <small id="emailHelp" class="form-text te form-customxt-muted"><?=lang('Auth.weNeverShare')?></small>
                    </div>
                    <div id="email">
                        
                    </div>
                    <div class="mb-3">
                        <label class="mb-1"><strong>No Telepon</strong></label>
                        <input type="number" class="form-control form-custom " name="no_telepon" aria-describedby="emailHelp" placeholder="Nomer Telepon" value="<?= $val->no_telepon_mitra ?>">
                    </div>
                    <div id="no_telepon">
                        
                    </div>
                    <div class="mb-3">
                        <label class="mb-1"><strong>Alamat</strong></label>
                        <input type="text" class="form-control form-custom " name="alamat" aria-describedby="emailHelp" placeholder="alamat" value="<?= $val->alamat_mitra ?>">
                    </div>
                    <div id="alamat">
                        
                    </div>
                  <div class="text-center mt-4">
                    <button type="button" class="btn btn-primary btn-block" onclick="edit(<?php echo $val->id_mitra ?>)">Ubah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

    <?php } ?>

<script type="text/javascript">
   function edit(id)
    {

       $.ajax({
         url:"<?php echo base_url('Mitra/editjson') ?>",
         global:false,
         async:true,
         type:'post',
         dataType:'json',
         data: $('#frmedit'+id).serialize(),
         success : function(e) {
           if(e.status == 'ok;') 
           {
             location.reload()
             //alert(e.cekid);
             $("#modaledit"+id).modal('hide');
          } 
          else{ 
            var msgeror='';
         
             $.each(e.dataname, function(key, value) {
                document.getElementById(key).innerHTML ="";
              });
            
            //console.log(e.data);
            $.each(e.data, function(key, value) {
             document.getElementById(key).innerHTML = `<p style="padding-top:10px;"> <span class="badge light badge-danger">`+value+`</span></p>`;
          });
            $("#modaledit"+id).modal('show');
         }
      },
      error :function(xhr, status, error) {
       alert(xhr.responseText);
    }

 });
}

function deletedata(id) {
     Swal.fire({
      title: 'Yakin Ingin menghapus data '+id+'?',
      text: "Data tidak akan bisa kembali",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {



        $.ajax({
         url:"<?php echo base_url('Mitra/delete') ?>",
         global:false,
         async:true,
         type:'post',
         dataType:'json',
         data: ({
            id_mitra:id,
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
</script>