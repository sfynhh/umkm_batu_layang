 <div class="content-body">
 	<div class="container-fluid">

 		<div class="row page-titles">
 			<ol class="breadcrumb">
 				<li class="breadcrumb-item "><a href="javascript:void(0)">Master Data</a></li>
 				<li class="breadcrumb-item active"><a href="javascript:void(0)">Data Kategori</a></li>
                
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
                            <th>Id</th>
                            <th>nama kategori</th>
                            
                            <th>aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($kategori as $val){ ?>
                         <tr>

                            <td><?php echo $val->id_kategori ?></td>
                            <td><?php echo $val->nama_kategori ?></td>

                            <td>
                               <div class="d-flex">
                                <a href="#"  data-bs-toggle="modal" data-bs-target="#modaledit<?php echo $val->id_kategori ?>" class="btn btn-primary shadow btn-xs sharp me-1" title="ubah data"><i class="fas fa-pencil-alt"></i></a>
                                <a href="#" onclick='deletedata(<?php echo $val->id_kategori; ?>)' class="btn btn-danger shadow btn-xs sharp me-1" title="hapus data"><i class="fa fa-trash"></i></a>
                               
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

<div id="modaltambah" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>

            <div class="card-body">
                <div class="basic-form">
                 <form id="frmtambah">
                    
                    <div class="mb-3">
                        <label class="mb-1"><strong>Nama kategori</strong></label>
                        <input type="text" class="form-control form-custom " name="nama_kategori" aria-describedby="emailHelp" placeholder="nama kategori" value="<?= set_value('nama_kategori') ?>">
                    </div>

                    <div id="nama_kategori">
                        
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


<?php foreach ($kategori as $val ) { ?>
<div id="modaledit<?php echo $val->id_kategori ?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>

            <div class="card-body">
                <div class="basic-form">
                 <form id="frmedit<?php echo $val->id_kategori ?>">
                    <input type="hidden" name="id_kategori" value="<?= $val->id_kategori ?>">
                    <div class="mb-3">
                        <label class="mb-1"><strong>Nama kategori</strong></label>
                        <input type="text" class="form-control form-custom " name="nama_kategori" aria-describedby="emailHelp" placeholder="nama mitra" value="<?= $val->nama_kategori ?>">
                    </div>

                    <div id="nama_kategori">
                        
                    </div>
                  <div class="text-center mt-4">
                    <button type="button" class="btn btn-primary btn-block" onclick="edit(<?php echo $val->id_kategori ?>)">Ubah Data</button>
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
         url:"<?php echo base_url('MyProduct/editKategori') ?>",
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

function add()
    {

       $.ajax({
         url:"<?php echo base_url('MyProduct/addKategori') ?>",
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
         url:"<?php echo base_url('MyProduct/deleteKategori') ?>",
         global:false,
         async:true,
         type:'post',
         dataType:'json',
         data: ({
            id_kategori:id,
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