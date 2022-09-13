  <?php echo $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

  <div class="authincation h-200">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-9">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4"><?=lang('Auth.register')?></h4>
                                    <?= view('Myth\Auth\Views\_message_block') ?>
                                    <form action="<?= url_to('register') ?>" method="post">
                                        <?= csrf_field() ?>
                                         <div class="mb-3">
                                            <label class="mb-1"><strong>Nama Pemilik</strong></label>
                                            <input type="text" class="form-control <?php if (session('errors.nama_pemilik')) : ?>is-invalid<?php endif ?>" name="nama_pemilik" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="<?= old('nama_pemilik') ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong><?=lang('Auth.email')?></strong></label>
                                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                                             <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>No Telepon</strong></label>
                                            <input type="number" class="form-control <?php if (session('errors.no_telepon')) : ?>is-invalid<?php endif ?>" name="no_telepon" aria-describedby="emailHelp" placeholder="Nomer Telepon" value="<?= old('no_telepon') ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Alamat</strong></label>
                                            <input type="text" class="form-control <?php if (session('errors.alamat')) : ?>is-invalid<?php endif ?>" name="alamat" aria-describedby="emailHelp" placeholder="alamat" value="<?= old('alamat') ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Nama Mitra(Toko)</strong></label>
                                            <input type="text" class="form-control <?php if (session('errors.nama_mitra')) : ?>is-invalid<?php endif ?>" name="nama_mitra" aria-describedby="emailHelp" placeholder="nama mitra" value="<?= old('nama_mitra') ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="username"><strong><?=lang('Auth.username')?></strong></label>
                                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                          <label for="pass_confirm"><?=lang('Auth.repeatPassword')?></label>
                                          <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                                      </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="<?php echo base_url('login') ?>">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>