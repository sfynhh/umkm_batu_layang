<div class="content-body">
	<div class="container-fluid">

		<div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Data Produk Saya</a></li>
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Data</a></li>

			</ol>
		</div>

		<div class="card">
			<div class="card-header">
					<a type="button" class="btn btn-warning" style="border-radius: 45%;" href="javascript:window.history.go(-1)" title="kembali"><i class="fa-solid fa-arrow-left"></i></a>
			</div>
			<div class="card-body">

				<div class="basic-form">
					<!-- <form id="frmtambah"> -->
						<?php echo form_open_multipart('MyProduct/tambah') ?>

						<div class="row">
							<div id="error">

							</div>
							<div class="mb-3">
								<label class="form-label"><strong>Nama Produk</strong></label>
								<input type="text" class="form-control form-custom <?= isset($validation) ? ($validation->hasError('nama_produk'))?'is-invalid':'':''; ?>" placeholder="Nama Produk" name="nama_produk" value="<?= set_value('nama_produk')?>">
								<?php if(isset($validation)){ 

									?>

									<p style="padding-top:10px;"> <span class="badge light badge-danger"><?= $validation->getError('nama_produk') ?></span></p>
								<?php } ?>
							</div>
							<div class="mb-3">
								<label><strong>Kategori Produk</strong></label>
								<select id="ptkp"  class="default-select form-control wide <?= isset($validation) ? ($validation->hasError('id_kategori'))?'is-invalid':'':''; ?> form-custom" name="id_kategori" value="<?= set_value('ptkp')?>">
									<option value="" <?= set_value('id_kategori')==""?'selected':'';?>>Choose...</option>
									<?php foreach($kategori as $val){ ?>
										<option value="<?php echo $val->id_kategori; ?>" <?= set_value('id_kategori')==$val->id_kategori ?'selected':'';?>>
											<?php echo $val->nama_kategori ?>

										</option>
									<?php } ?>

								</select>
								<?php if(isset($validation)){ ?>
									<p style="padding-top:10px;"> <span class="badge light badge-danger"><?= $validation->getError('id_kategori') ?></span></p>
								<?php } ?>

							</div>
							<div class="mb-3">
								<label class="form-label"><strong>Deskripsi Produk</strong></label>
								<textarea name="deskripsi" id="editor1" class="form-control form-custom <?= isset($validation) ? ($validation->hasError('deskripsi'))?'is-invalid':'':''; ?>" value="<?= set_value('deskripsi')?>">
									
								</textarea>
								<?php if(isset($validation)){ 

									?>

									<p style="padding-top:10px;"> <span class="badge light badge-danger"><?= $validation->getError('deskripsi') ?></span></p>
								<?php } ?>
							</div>
							<div class="mb-3">
								<label class="form-label"><strong>Stok</strong></label>
								<input type="number" class="form-control form-custom <?= isset($validation) ? ($validation->hasError('stok'))?'is-invalid':'':''; ?>" placeholder="Stok Produk" name="stok" value="<?= set_value('stok')?>">
								<?php if(isset($validation)){ 

									?>

									<p style="padding-top:10px;"> <span class="badge light badge-danger"><?= $validation->getError('stok') ?></span></p>
								<?php } ?>
							</div>
							<div class="mb-3">
								<label class="form-label"><strong>Harga Produk</strong></label>
								<input type="text" class="form-control form-custom <?= isset($validation) ? ($validation->hasError('harga_produk'))?'is-invalid':'':''; ?>" placeholder="Harga Produk" name="harga_produk" value="<?= set_value('harga_produk')?>" id="harga_produk">
								<?php if(isset($validation)){ 

									?>

									<p style="padding-top:10px;"> <span class="badge light badge-danger"><?= $validation->getError('harga_produk') ?></span></p>
								<?php } ?>
							</div>
							<div class="mb-3">
								<label><strong>Tanggal Produksi</strong></label>
								<input type="text" class="form-control form-custom <?= isset($validation) ? ($validation->hasError('tgl_produksi'))?'is-invalid':'':''; ?> choose_date" placeholder="Pilih Tanggal produksi" name="tgl_produksi" autocomplete="off" value="<?= set_value('tgl_produksi')?>">
								<?php if(isset($validation)){ ?>
									<p style="padding-top:10px;"> <span class="badge light badge-danger"><?= $validation->getError('tgl_produksi') ?></span></p>
								<?php } ?>
							</div>
							
							<div class="mb-3">
								<label><strong>Tanggal expired</strong></label>
								<input type="text" class="form-control form-custom <?= isset($validation) ? ($validation->hasError('tgl_expired'))?'is-invalid':'':''; ?> choose_date" placeholder="Pilih Tanggal expired" name="tgl_expired" autocomplete="off" value="<?= set_value('tgl_expired')?>">
								<?php if(isset($validation)){ ?>
									<p style="padding-top:10px;"> <span class="badge light badge-danger"><?= $validation->getError('tgl_expired') ?></span></p>
								<?php } ?>
							</div>
							<div class=" mb-3">
								<label><strong>Foto Produk</strong></label>
							<div class="input-group mb-3">
								<span class="input-group-text">Upload</span>
								<div class="form-file">
									<input type="file" class="form-file-input form-control form-custom" name="foto_produk">
								</div>
							</div>
							</div>


						
						</div>
						<button type="submit" class="btn btn-primary" name="button">Tambah Data</button>

					</form>
				</div>

			</div>

		</div>
	</div>
</div>
<script src="<?= base_url('jquery/jquery.mask.js') ?>"></script>
 <script>
$(document).ready(function($){

        $('#harga_produk').mask('000.000.000.000.000.000',{reverse: true});
        
    });
     CKEDITOR.replace( 'editor1' );
 </script>