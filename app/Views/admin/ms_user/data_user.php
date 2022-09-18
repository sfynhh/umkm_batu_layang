 <div class="content-body">
 	<div class="container-fluid">

 		<div class="row page-titles">
 			<ol class="breadcrumb">
 				<li class="breadcrumb-item "><a href="javascript:void(0)">Master Data</a></li>
 				<li class="breadcrumb-item active"><a href="javascript:void(0)">Data Departemen</a></li>
                
 			</ol>
 		</div>

 		<div class="card">
 			<div class="card-header">
 				<button type="button" class="btn btn-rounded btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambah"><span
                class="btn-icon-start text-primary"><i class="fa fa-plus color-primary"></i>
                </span>Add</button>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table id="example" class="display" style="min-width: 845px">
                     <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Nama MItra</th>
                            <th>Email</th>

                            <th>aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data_user as $val){ ?>
                         <tr>

                            <td><?php echo $val['nama_pemilik'] ?></td>
                            <td><?php echo $val['username'] ?></td>
                            <td><?php echo $val['nama_mitra'] ?></td>
                            <td><?php echo $val['email'] ?></td>
                         
                            

                            <td>
                               <div class="d-flex">
                                <!-- <a href="#"  data-bs-toggle="modal" data-bs-target="#modaledit<?php// echo $val['user_id'] ?>" class="btn btn-primary shadow btn-xs sharp me-1" title="ubah data"><i class="fas fa-pencil-alt"></i></a> -->
                                <a href="#" onclick='deletedata(<?php echo $val['user_id']; ?>)' class="btn btn-danger shadow btn-xs sharp me-1" title="hapus data"><i class="fa fa-trash"></i></a>
                               
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
<div id="modaltambah" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>

            <div class="card-body">
                <div class="basic-form">
                 <form id="frmtambah">
                    <div class="mb-3">
                        <label class="mb-1"><strong>Nama Pemilik</strong></label>
                        <input type="text" class="form-control form-custom" name="nama_pemilik" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="<?= set_value('nama_pemilik') ?>">
                    </div>
                    <div id="nama_pemilik">
                        
                    </div>
                    <div class="mb-3">
                        <label class="mb-1"><strong><?=lang('Auth.email')?></strong></label>
                        <input type="email" class="form-control form-custom" name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= set_value('email') ?>">
                        <small id="emailHelp" class="form-text te form-customxt-muted"><?=lang('Auth.weNeverShare')?></small>
                    </div>
                    <div id="email">
                        
                    </div>
                    <div class="mb-3">
                        <label class="mb-1"><strong>No Telepon</strong></label>
                        <input type="number" class="form-control form-custom " name="no_telepon" aria-describedby="emailHelp" placeholder="Nomer Telepon" value="<?= set_value('no_telepon') ?>">
                    </div>
                    <div id="no_telepon">
                        
                    </div>
                    <div class="mb-3">
                        <label class="mb-1"><strong>Alamat</strong></label>
                        <input type="text" class="form-control form-custom " name="alamat" aria-describedby="emailHelp" placeholder="alamat" value="<?= set_value('alamat') ?>">
                    </div>
                    <div id="alamat">
                        
                    </div>
                    <div class="mb-3">
                        <label class="mb-1"><strong>Nama Mitra(Toko)</strong></label>
                        <input type="text" class="form-control form-custom " name="nama_mitra" aria-describedby="emailHelp" placeholder="nama mitra" value="<?= set_value('nama_mitra') ?>">
                    </div>

                    <div id="nama_mitra">
                        
                    </div>
                    <div class="mb-3">
                        <label for="username"><strong><?=lang('Auth.username')?></strong></label>
                        <input type="text" class="form-control form-custom" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= set_value('username') ?>">
                    </div>
                    <div id="username">
                        
                    </div>
                    <div class="mb-3">
                        <label class="mb-1"><strong>Password</strong></label>
                        <input type="password" name="password" class="form-control form-custom" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                    </div>
                    <div id="password">
                        
                    </div>
                    <div class="mb-3">
                      <label for="pass_confirm"><?=lang('Auth.repeatPassword')?></label>
                      <input type="password" name="pass_confirm" class="form-control form-custom " placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                  </div>
                  <div id="pass_confirm">
                      
                  </div>
                  <div class="text-center mt-4">
                    <button type="button" class="btn btn-primary btn-block" onclick="add()">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

<script type="text/javascript">
   function add()
    {

       $.ajax({
         url:"<?php echo base_url('User/addjson') ?>",
         global:false,
         async:true,
         type:'post',
         dataType:'json',
         data: $('#frmtambah').serialize(),
         success : function(e) {
           if(e.status == 'ok;') 
           {
             location.reload()
             //alert(e.cekid);
             $("#modaltambah").modal('hide');
          } 
          else{ 
            var msgeror='';
             console.log(e.dataname)
             console.log(e.data)
             $.each(e.dataname, function(key, value) {
                document.getElementById(key).innerHTML ="";
              });
            
            //console.log(e.data);
            $.each(e.data, function(key, value) {
             document.getElementById(key).innerHTML = `<p style="padding-top:10px;"> <span class="badge light badge-danger">`+value+`</span></p>`;
          });
            $("#modaltambah").modal('show');
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
         url:"<?php echo base_url('User/delete') ?>",
         global:false,
         async:true,
         type:'post',
         dataType:'json',
         data: ({
            id_usr:id,
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