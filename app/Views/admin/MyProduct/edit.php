<div class="content-body">
	<div class="container-fluid">

		<div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Data Produk Saya</a></li>
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Data</a></li>

			</ol>
		</div>

		<div class="card">
			<div class="card-header">
				<a type="button" class="btn btn-warning" style="border-radius: 45%;" href="javascript:window.history.go(-1)" title="kembali"><i class="fa-solid fa-arrow-left"></i></a>
			</div>
			<div class="card-body">

				<div class="basic-form">
					<!-- <form id="frmtambah"> -->
						<?php echo form_open_multipart('MyProduct/updateProduk/'.$val['id_produk']) ?>

						<div class="row">
							<div id="error">

							</div>
							<div class="mb-3">
								<input type="hidden" name="id_produk" value="<?php echo $val['id_produk'] ?>">
								<input type="hidden" name="id_mitra" value="<?php echo $val['produk_id_mitra'] ?>">
								<label class="form-label"><strong>Nama Produk</strong></label>
								<input type="text" class="form-control form-custom <?= isset($validation) ? ($validation->hasError('nama_produk'))?'is-invalid':'':''; ?>" placeholder="Nama Produk" name="nama_produk" value="<?= $val['nama_produk'] ?>">
								<?php if(isset($validation)){ 

									?>

									<p style="padding-top:10px;"> <span class="badge light badge-danger"><?= $validation->getError('nama_produk') ?></span></p>
								<?php } ?>

							</div>
							<div class="mb-3">
								<label><strong>Kategori Produk</strong></label>
								<select id="ptkp"  class="default-select form-control wide <?= isset($validation) ? ($validation->hasError('id_kategori'))?'is-invalid':'':''; ?> form-custom" name="id_kategori" value="<?= set_value('ptkp')?>">
									<option value="" <?= $val['produk_id_kategori']==""?'selected':'';?>>Choose...</option>
									<?php foreach($kategori as $val2){ ?>
										<option value="<?php echo $val2->id_kategori; ?>" <?= $val['produk_id_kategori']==$val2->id_kategori ?'selected':'';?>>
											<?php echo $val2->nama_kategori ?>

										</option>
									<?php } ?>

								</select>
								<?php if(isset($validation)){ ?>
									<p style="padding-top:10px;"> <span class="badge light badge-danger"><?= $validation->getError('id_kategori') ?></span></p>
								<?php } ?>


							</div>
							<div class="mb-3">
								<label class="form-label"><strong>Deskripsi Produk</strong></label>
								<textarea name="deskripsi" id="editor1" class="form-control form-custom <?= isset($validation) ? ($validation->hasError('deskripsi'))?'is-invalid':'':''; ?>" value="">
									<?= $val['deskripsi_produk']?>
								</textarea>
								<?php if(isset($validation)){ 

									?>

									<p style="padding-top:10px;"> <span class="badge light badge-danger"><?= $validation->getError('deskripsi') ?></span></p>
								<?php } ?>

							</div>
							<div class="mb-3">
								<label class="form-label"><strong>Stok</strong></label>
								<input type="number" class="form-control form-custom <?= isset($validation) ? ($validation->hasError('stok'))?'is-invalid':'':''; ?>" placeholder="Stok Produk" name="stok" value="<?= $val['stok_produk'] ?>">
								<?php if(isset($validation)){ 

									?>

									<p style="padding-top:10px;"> <span class="badge light badge-danger"><?= $validation->getError('stok') ?></span></p>
								<?php } ?>
							</div>
							<div class="mb-3">
								<label class="form-label"><strong>Harga Produk</strong></label>
								<input type="text" class="form-control form-custom <?= isset($validation) ? ($validation->hasError('harga_produk'))?'is-invalid':'':''; ?>" placeholder="Harga Produk" name="harga_produk" value="<?= $val['harga_produk'] ?>" id="harga_produk">
								<?php if(isset($validation)){ 

									?>

									<p style="padding-top:10px;"> <span class="badge light badge-danger"><?= $validation->getError('harga_produk') ?></span></p>
								<?php } ?>
							</div>
							<div class="mb-3">
								<label><strong>Tanggal Produksi</strong></label>
								<input type="text" class="form-control form-custom <?= isset($validation) ? ($validation->hasError('tgl_produksi'))?'is-invalid':'':''; ?> choose_date" placeholder="Pilih Tanggal produksi" name="tgl_produksi" autocomplete="off" value="<?= date("d-m-Y", strtotime($val['tgl_produksi']))?>">
								<?php if(isset($validation)){ ?>
									<p style="padding-top:10px;"> <span class="badge light badge-danger"><?= $validation->getError('tgl_produksi') ?></span></p>
								<?php } ?>

							</div>

							<div class="mb-3">
								<label><strong>Tanggal expired</strong></label>
								<input type="text" class="form-control form-custom <?= isset($validation) ? ($validation->hasError('tgl_expired'))?'is-invalid':'':''; ?> choose_date" placeholder="Pilih Tanggal expired" name="tgl_expired" autocomplete="off" value="<?= date("d-m-Y", strtotime($val['tgl_expired']))?>">
								<?php if(isset($validation)){ ?>
									<p style="padding-top:10px;"> <span class="badge light badge-danger"><?= $validation->getError('tgl_expired') ?></span></p>
								<?php } ?>

							</div>
							<?php if (in_groups('superadmin')) { ?>
								<div class="mb-3">
								<label><strong>Pilih Mitra</strong></label>
								<select class="default-select form-control wide <?= isset($validation) ? ($validation->hasError('id_mitra'))?'is-invalid':'':''; ?> form-custom" name="id_mitra_1">
									<option value="" <?= $val['produk_id_mitra']==""?'selected':'';?>>Choose...</option>
									<?php foreach($mitra as $val2){ ?>
										<option value="<?php echo $val2->id_mitra; ?>" <?= $val['produk_id_mitra']==$val2->id_mitra ?'selected':'';?>>
											<?php echo $val2->nama_mitra ?>

										</option>
									<?php } ?>

								</select>
								<?php if(isset($validation)){ ?>
									<p style="padding-top:10px;"> <span class="badge light badge-danger"><?= $validation->getError('id_mitra') ?></span></p>
								<?php } ?>


							</div>
							<?php } ?>
							<div class=" mb-3">
								<input type="hidden" name="foto_produk_old" value="<?php echo str_replace("product/","", $val['foto_depan']) ?>">
								<label><strong>Foto Produk</strong></label>
								<div class="input-group mb-3">
									<span class="input-group-text">Upload</span>
									<div class="form-file">
										<input type="file" class="form-file-input form-control form-custom" name="foto_produk" value="">
										<?php echo str_replace("product/","", $val['foto_depan']) ?>
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