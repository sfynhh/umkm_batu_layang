<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>NEC cimanggis</title>

    <link rel="icon" href="<?= base_url('images/icon.jpg') ?>" type="image/gif" sizes="16x16">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">


    <!-- Datatables -->
   <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>


    <!-- Jquery masking -->
    <script src="<?= base_url('jquery/jquery.mask.js') ?>"></script>

    <!-- Icon dan font-->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
<link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?= base_url('dashboard/dashboard.css') ?>" rel="stylesheet">

  </head>
  <body>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <?php 
          foreach($bukbes as $row){
            $namaakun = $row->nama_akun;
          }
         ?>
      <canvas class="my-4 w-100" id="myChart" width="900" height="380" hidden></canvas>
      <br>
        <?php 
          foreach($bukbes as $row){
            $namaakun = $row->nama_akun;
          }

          foreach ($sisasaldo as $x => $row) {
            if (substr($row->header_akun,0,1)==1)
            {
              if ($row->posisi_penerimaan=='Debet')
              {
                  if (date_create($tglakhir)!=date("Y-m-d")) {
                     $saldosisa[$x] =$row->nominal_pengeluaran-$row->nominal_penerimaan+$row->nominal_pendapatan;
                  }else{
                    $saldosisa[$x]=0;
                  }
              }
              else if ($row->posisi_penerimaan=='Credit')
              {
                  if (date_create($tglakhir)!=date("Y-m-d")) {
                     $saldosisa[$x] =$row->nominal_penerimaan-$row->nominal_pendapatan-$row->nominal_pengeluaran;
                  }else{
                    $saldosisa[$x]=0;
                  }
              }else
              {
                  if (date_create($tglakhir)!=date("Y-m-d")) {
                     $saldosisa[$x] =$row->nominal_penerimaan-$row->nominal_pendapatan-$row->nominal_pengeluaran;
                  }else{
                    $saldosisa[$x]=0;
                  }
              }
            }
            else if (substr($row->header_akun,0,1)==2||substr($row->header_akun,0,1)==3)
            {
                 if (date_create($tglakhir)!=date("Y-m-d")) {
                     $saldosisa[$x] =$row->nominal_pengeluaran-$row->nominal_penerimaan+$row->nominal_pendapatan;
                  }else{
                    $saldosisa[$x]=0;
                  }
            }
            else if (substr($row->header_akun,0,1)==4)
            {
                  if($row->posisi_pendapatan='Debet')
                  {
                    if (date_create($tglakhir)!=date("Y-m-d")) {
                       $saldosisa[$x] =$row->nominal_penerimaan+$row->nominal_pengeluaran-$row->nominal_pendapatan;
                    }else{
                       $saldosisa[$x]=0;
                    }
                  }
                  else if($row->posisi_pendapatan='Credit')
                  {
                    if (date_create($tglakhir)!=date("Y-m-d")) {
                       $saldosisa[$x] =$row->nominal_pendapatan-$row->nominal_penerimaan-$row->nominal_pengeluaran;
                    }else{
                       $saldosisa[$x]=0;
                    }
                  }
                  else
                  {
                    if (date_create($tglakhir)!=date("Y-m-d")) {
                       $saldosisa[$x] =$row->nominal_pendapatan-$row->nominal_penerimaan-$row->nominal_pengeluaran;
                    }else{
                       $saldosisa[$x]=0;
                    }
                  }
            }
            else if (substr($row->header_akun,0,1)==5)
            {
                  if (date_create($tglakhir)!=date("Y-m-d")) {
                       $saldosisa[$x] =$row->nominal_penerimaan-$row->nominal_pendapatan-$row->nominal_pengeluaran;
                    }else{
                       $saldosisa[$x]=0;
                    }
            }
          }
         ?>
         <?php $z=0; ?>
      <div class="table-responsive">
      <?php foreach($bukbes as $row): ?>
            <table class="table table-striped table-sm" >
                 
                <thead>
                  <tr>
                    <th rowspan="2">tanggal</th>
                    <th rowspan="2">Keterangan</th>
                    <th rowspan="2">Ref</th>
                    <th rowspan="2">Debet</th>
                    <th rowspan="2">Credit</th>
                    <th colspan="2">Saldo</th>
                  </tr>
                  <tr>
                    <th>Debet</th>
                    <th>Credit</th>
                  </tr>
                </thead>
                <tbody>
                  <tr> 
                    <td><?php echo $tglawal; ?></td>
                    <td>Saldo awal</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <?php if (substr($row->header_akun,0,1)==1){
                            if ($row->posisi_penerimaan=='Debet')
                            {
                              $saldo = ($row->saldo-$row->nominal_penerimaan+$row->nominal_pengeluaran+$row->nominal_pendapatan)+$saldosisa[$z];

                            } else if ($row->posisi_penerimaan=='Credit')
                            {
                            $saldo = ($row->saldo+$row->nominal_penerimaan-$row->nominal_pendapatan-$row->nominal_pengeluaran)+$saldosisa[$z];
                            }else{
                              $saldo = ($row->saldo+$row->nominal_penerimaan-$row->nominal_pendapatan-$row->nominal_pengeluaran)+$saldosisa[$z];
                            }

                            if ($saldo>=0){
                              ?> 
                              <td><?php echo number_format($saldo); ?></td>
                              <td>-</td>
                              <?php
                            }else{ ?>
                              <td>-</td>
                              <td><?php echo number_format($saldo); ?></td> 
                            <?php
                            }
                          } else if (substr($row->header_akun,0,1)==2){
                             $saldo = ($row->saldo-$row->nominal_penerimaan+$row->nominal_pengeluaran+$row->nominal_pendapatan)+$saldosisa[$z];
                             if ($saldo>=0){
                              ?> 
                              <td>-</td>
                              <td><?php echo number_format($saldo); ?></td>
                              <?php
                            }else{ ?>
                              <td><?php echo number_format($saldo); ?></td>
                              <td>-</td> 
                            <?php
                            }
                          }else if (substr($row->header_akun,0,1)==3){
                            $saldo = ($row->saldo-$row->nominal_penerimaan+$row->nominal_pengeluaran+$row->nominal_pendapatan)+$saldosisa[$z];
                            if ($saldo>=0){
                              ?> 
                              <td>-</td>
                              <td><?php echo number_format($saldo); ?></td>
                              <?php
                            }else{ ?>
                              <td><?php echo number_format($saldo); ?></td>
                              <td>-</td> 
                            <?php
                            }
                          }else if (substr($row->header_akun,0,1)==4){
                           if($row->posisi_pendapatan='Debet'){
                            $saldo = ($row->saldo+$row->nominal_penerimaan+$row->nominal_pengeluaran-$row->nominal_pendapatan)+$saldosisa[$z];
                           } else if($row->posisi_pendapatan='Credit'){
                            $saldo = ($row->saldo-$row->nominal_penerimaan-$row->nominal_pengeluaran+$row->nominal_pendapatan)+$saldosisa[$z];
                           }else {
                            $saldo = ($row->saldo-$row->nominal_penerimaan-$row->nominal_pengeluaran+$row->nominal_pendapatan)+$saldosisa[$z];
                           }
                           if ($saldo>=0){
                              ?> 
                              <td>-</td>
                              <td><?php echo number_format($saldo); ?></td>
                              <?php
                            }else{ ?>
                              <td><?php echo number_format($saldo); ?></td>
                              <td>-</td> 
                            <?php
                            }
                          }else if (substr($row->header_akun,0,1)==5){
                            $saldo = ($row->saldo+$row->nominal_penerimaan-$row->nominal_pendapatan-$row->nominal_pengeluaran)+$saldosisa[$z];
                            if ($saldo>=0){
                              ?> 
                              <td><?php echo number_format($saldo); ?></td>
                              <td>-</td>
                              <?php
                            }else{ ?>
                              <td>-</td>
                              <td><?php echo number_format($saldo); ?></td> 
                            <?php
                            }
                          } ?>
                        </tr>
                  
                    <?php 
                      $idakun=$row->nama_akun;?>
                      <h3>Buku besar <?php echo $idakun; ?></h3> 
                     <?php foreach ($isibukbes as $row):
                        if ($idakun==$row->namaakun) {
                           ?>
                           <tr>
                           <td><?php echo $row->tgl_jurnal; ?></td>
                           <td><?php echo $row->sumber; ?></td>
                           <?php if($row->sumber=='Jurnal Pendapatan'){ ?>
                             <td>01</td>
                           <?php } else if ($row->sumber=='Jurnal Penerimaan'){?>
                            <td>02</td>
                           <?php }else if ($row->sumber=='Jurnal Pengeluaran'){?>
                            <td>02</td>
                           <?php } 
                            if ($row->posisi_db_cr=='Debet') {?>
                              <td><?php echo number_format($row->nominal) ?></td>
                              <td>-</td>
                            <?php }else if($row->posisi_db_cr=='Credit'){?>
                              <td>-</td>
                              <td><?php echo number_format($row->nominal) ?></td>
                            <?php }

                        if (substr($row->id_akun,0,1)==1 || substr($row->id_akun,0,1)==5 ) 
                        {
                          if ($row->posisi_db_cr=='Debet') {
                                $saldo=$saldo+ $row->nominal;
                                if ($saldo>=0) { ?>
                                  <td><?php echo number_format(abs($saldo)) ?></td>
                                  <td>-</td>
                                <?php } else if ($saldo<0){ ?>
                                  <td>-</td>
                                  <td><?php echo number_format(abs($saldo)) ?></td>
                                <?php }
                                 }else if($row->posisi_db_cr=='Credit'){
                                  $saldo=$saldo-$row->nominal;
                                  if ($saldo>=0) { ?>
                                  <td><?php echo number_format(abs($saldo)) ?></td>
                                  <td>-</td>
                                <?php } else if ($saldo<0){ ?>
                                  <td>-</td>
                                  <td><?php echo number_format(abs($saldo)) ?></td>
                                <?php }
                               }
                             } 
                             else if (substr($row->id_akun,0,1)==2 || substr($row->id_akun,0,1)== 3 || substr($row->id_akun,0,1)== 4 ) 
                             {
                              if ($row->posisi_db_cr=='Debet') {
                                $saldo=$saldo-$row->nominal;
                                if ($saldo>=0) { ?>
                                  <td>-</td>
                                  <td><?php echo number_format(abs($saldo)) ?></td>
                                <?php } else if ($saldo<0){ ?>
                                  <td><?php echo number_format(abs($saldo)) ?></td>
                                  <td>-</td>
                                <?php }
                                 }else if($row->posisi_db_cr=='Credit'){
                                  $saldo=$saldo+$row->nominal;
                                  if ($saldo>=0) { ?>
                                  <td>-</td>
                                  <td><?php echo number_format(abs($saldo)) ?></td>
                                <?php } else if ($saldo<0){ ?>
                                  <td><?php echo number_format(abs($saldo)) ?></td>
                                  <td>-</td>
                                <?php }
                               }
                             }

                         ?>

                       </tr>
                     <?php 
                      }
                      endforeach; 
                      ?>
                </tbody>
              </table>
              <br>
        <?php $z++;
          endforeach; ?>
      </div>
    </main>
  </div>
</div>


<!-- Modals -->     

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>




    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="<?= base_url('dashboard/dashboard.js') ?>"></script>
  
      <script>
            $(document).ready(function() {
                $('#example').DataTable(
                  {
                    //untuk memodifikasi list filter baris yang ditampilkan
                    "lengthMenu": [ 10, 20, 30, 40,50],
                  }  
                );
            } );
    </script>

</body>