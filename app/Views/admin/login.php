<?php echo $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="<?php echo base_url() ?>"><img src="<?php echo base_url('') ?>/assetcustomer/img/logo/umkmlogo.png" alt="" class="custom_logo" /></a>
                                    </div>
                                    <h4 class="text-center mb-4"><?=lang('Auth.loginTitle')?></h4>
                                    <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= url_to('login') ?>" method="post">
                                 <?= csrf_field() ?>
                                        <?php if ($config->validFields === ['email']): ?>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong><?=lang('Auth.email')?></strong></label>
                                            <input type="email" class="form-control form-custom <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" value="hello@example.com" name="login">
                                            <div class="invalid-feedback">
                                          <?= session('errors.login') ?>
                                        </div>

                                        </div>
                                         <?php else: ?>
                                        <div class="mb-3">
                                              <label for="login"><?=lang('Auth.emailOrUsername')?></label>
                                                <input type="text" class="form-control form-custom <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                                       name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
                                                <div class="invalid-feedback">
                                                    <?= session('errors.login') ?>
                                                </div>  
                                        </div>
                                        <?php endif; ?>
                                        <div class="mb-3">
                                            <label for="password"><?=lang('Auth.password')?></label>
                                            <input type="password" name="password" class="form-control form-custom <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.password') ?>
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <?php if ($config->allowRemembering): ?>
                                            <div class="mb-3">
                                               <div class="form-check custom-checkbox ms-1">
                                                       <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                                    <label class="form-check-label" for="basic_checkbox_1"><?=lang('Auth.rememberMe')?></label>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <?php if ($config->activeResetter): ?>
                                            <div class="mb-3">
                                                <p><a href="<?= url_to('forgot') ?>"><?=lang('Auth.forgotYourPassword')?></a></p>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="text-center">
                                          <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.loginAction')?></button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">

                                    <?php if ($config->allowRegistration) : ?>
                                        <p><a class="text-primary" href="<?= url_to('register') ?>">klik disini untuk daftar sebagai seller</a></p>
                                    <?php endif; ?>
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