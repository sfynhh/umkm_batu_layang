<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $titletab ?> | UMKM Batu Layang</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('') ?>/assetcustomer/img/logo/umkmlogo.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="icon" href="<?= base_url('images/icon.jpg') ?>" type="image/gif" sizes="16x16">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">


        <!-- Datatables -->
       <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <!-- Jquery masking -->
        <script src="<?= base_url('jquery/jquery.mask.js') ?>"></script>

        <!-- CSS here -->
        <link rel="stylesheet" href="<?php echo base_url('') ?>/assetcustomer/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('') ?>/assetcustomer/css/animate.min.css">
        <link rel="stylesheet" href="<?php echo base_url('') ?>/assetcustomer/css/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo base_url('') ?>/assetcustomer/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="<?php echo base_url('') ?>/assetcustomer/css/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url('') ?>/assetcustomer/css/flaticon.css">
        <link rel="stylesheet" href="<?php echo base_url('') ?>/assetcustomer/css/aos.css">
        <link rel="stylesheet" href="<?php echo base_url('') ?>/assetcustomer/css/slick.css">
        <link rel="stylesheet" href="<?php echo base_url('') ?>/assetcustomer/css/default.css">
        <link rel="stylesheet" href="<?php echo base_url('') ?>/assetcustomer/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url('') ?>/assetcustomer/css/responsive.css">
    </head>
    <body>
<!-- header-area -->
        <header>

            <!-- header-search-area -->
            <div class="header-search-area">
                <div class="container custom-container">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-3 d-none d-lg-block">
                            <div class="logo">
                                <a href="<?php echo base_url() ?>"><img style="height: auto;width: 115px;"src="<?php echo base_url('') ?>/assetcustomer/img/logo/umkmlogo.png" alt="Logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-9">
                            <div class="d-block d-sm-flex align-items-center justify-content-end">
                                <div class="header-search-wrap">
                                    <?= form_open('Produk/search') ?>
                                        <select class="custom-select" id="kategori" name="kategori">
                                            <option selected="" value="all">Semua Kategori</option>
                                            <?php foreach($kategorisearch as $val){ ?>
                                            <option value="<?= $val->id_kategori ?>"><?= $val->nama_kategori ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="text" placeholder="Search Nama Produk" id="namaproduk" name="namaproduk">
                                        
                                        <button><i class="flaticon-loupe-1"></i></button>
                                    </form>
                                </div>
                                <div class="header-action">
                                    <ul>
                                        <li class="header-phone">
                                            <div class="icon"><i class="flaticon-telephone"></i></div>
                                            <a href="tel:1234566789"><span>Hubungi Kami</span>+185 4124 650</a>
                                        </li>
                                        <li class="header-user"><a href="#"><i class="flaticon-user"></i></a></li>
                                        <!-- <li class="header-wishlist">
                                            <a href="#"><i class="flaticon-heart-shape-outline"></i></a>
                                            <span class="item-count">0</span>
                                        </li> -->
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-search-area-end -->

            <div id="sticky-header" class="menu-area">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                            <div class="menu-wrap">
                                <nav class="menu-nav">
                                    <div class="logo d-block d-lg-none">
                                        <a href="index.html"><img style="height: auto;width: 115px;"src="<?php echo base_url('') ?>/assetcustomer/img/logo/umkmlogo.png" alt="Logo"></a>
                                    </div>
                                    <div class="header-category d-none d-lg-block">
                                        <a href="#" class="cat-toggle"><i class="fas fa-bars"></i>Lihat Toko<i class="fas fa-angle-down"></i></a>
                                        <ul class="category-menu">
                                            <li><a href="shop.html"><i class="flaticon-cherry"></i> Fresh Fruits</a></li>
                                            <li><a href="shop.html"><i class="flaticon-fish"></i> Fresh Fish</a></li>
                                            
                                        </ul>
                                    </div>
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">
                                        <ul class="navigation">
                                            <li class="<?php echo (isset($activehome))? $activehome:''; ?>"><a href="<?php echo base_url('Home') ?>">Home</a>
                                            </li>
                                            <li class="<?php echo (isset($activeprod))? $activeprod:''; ?>"><a href="<?php echo base_url('Produk/all/all') ?>">Produk Kami</a></li>
                                            <li class="<?php echo (isset($activemitra))? $activemitra:''; ?>"><a href="<?php echo base_url('Mitra') ?>">Mitra</a></li>
                                            <li class="<?php echo (isset($activetk))? $activetk:''; ?>"><a href="<?php echo base_url('TentangKami') ?>">Tentang Kami</a></li>
                                           
                                            <li class="<?php echo (isset($activektk))? $activektk:''; ?>"><a href="<?php echo base_url('Contact') ?>">Kontak</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <!-- Mobile Menu  -->
                            <div class="mobile-menu">
                                <nav class="menu-box">
                                    <div class="close-btn"><i class="fas fa-times"></i></div>
                                    <div class="nav-logo"><a href="index.html"><img style="height: auto;width: 115px;"src="<?php echo base_url('') ?>/assetcustomer/img/logo/umkmlogo.png" alt="Logo">
                                    </div>
                                    <div class="menu-outer">
                                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                    </div>
                                    <div class="social-links">
                                        <ul class="clearfix">
                                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                            <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                            <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="menu-backdrop"></div>
                            <!-- End Mobile Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <script type="text/javascript">
            
        </script>
        <?php echo view($content,isset($datacontent)?$datacontent:array())?>
        <?php  echo view('customer/footer'); ?>