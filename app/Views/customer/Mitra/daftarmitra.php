<main>
<section class="services-area services-bg"  style="padding-top:0px;">
    <div class="container" >
        <div class="container-inner-wrap" style="padding-top:25px;">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="services-section-title text-center mb-55">
                        <h2 class="title">Mitra Kami</h2>
                        <a type="button" href="<?php echo base_url('Seller') ?>" class="btn rounded-btn">Daftar Mitra</a>
                    </div>
                   
                </div>
            </div>
            <div class="row justify-content-center">
                <?php foreach($mitra as $val) {?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                    <div class="services-item">
                        <a href="<?= base_url('Detail_Mitra/'.$val->id_pemilik_mitra)?>" class="services-link"></a>
                        <div class="post-avatar-img-circle">
                            <img src="<?php echo base_url('') ?>/assetcustomer/img/blog/storelogo.jpg" alt="img">
                        </div>
                        <div class="content">
                            <h5><?php echo $val->nama_mitra ?></h5>
                            <p>Pemilik : <?php echo $val->nama_pemilik ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
              
            </div>
        </div>
    </div>
</section>
<!-- services-area-emd -->



<!-- online-support-area-end -->

</main>