<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Input Transaksi</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <?php
        if(isset($validation)){ 
          echo $validation->listErrors();
          
        }
       
      ?>
        <div class="row">
        <?= form_open('pembelian') ?>
        <?php  
        //foreach ($nopengeluaran as $row) {
            //$nopeng = $row->nopengeluaran_baru;
          //}
           ?>
                
                <div class="mb-3">
                    <label for="nama_asset" class="form-label">Nama Asset </label>
                    <input type="text" class="form-control" id="nama_asset" name="nama_asset" value="<?= set_value('nama_asset')?>" placeholder="Diisi dengan Nama Asset">
                </div>
                <div class="mb-3">
                    <label for="harga_satuan">harga satuan</label>
                    <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" value="<?= set_value('harga_satuan')?>" placeholder="Diisi dengan harga satuan">
                </div>
                <div class="mb-3">
                    <label for="jumlah">jumlah</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= set_value('jumlah')?>" placeholder="Diisi dengan jumlah ">
                </div>
                <div class="mb-3">
                    <label for="total">Total</label>
                    <input type="text" class="form-control" id="total" name="total" value="<?= set_value('total')?>" placeholder="Diisi dengan total ">
                </div>
               
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

      
    </main>
  </div>
</div>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="<?= base_url('dashboard/dashboard.js') ?>"></script>

    <script src="<?= base_url('jquery/jquery.mask.js')?>"></script>
 
 
  </body>
</html>