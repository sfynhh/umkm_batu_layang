<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta name="description" content="Jobick : Job Admin Bootstrap 5 Template" />
	<meta property="og:title" content="Jobick : Job Admin Bootstrap 5 Template" />
	<meta property="og:description" content="Jobick : Job Admin Bootstrap 5 Template" />
	<meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png" /> -->
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title><?php echo $titletab ?></title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url('') ?>/assetadmin/images/favicon.png" />
	<link href="<?php echo base_url('') ?>/assetadmin/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="<?php echo base_url('') ?>/assetadmin/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('') ?>/assetadmin/fontawesome/css/fontawesome.min.css">
	<!-- <link rel="stylesheet" href="<?php echo base_url('') ?>/assetadmin/fontawesome/css/all.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url('') ?>/assetadmin/fontawesome/css/solid.min.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url('') ?>/assetadmin/fontawesome/css/regular.min.css"> -->
    <!-- select 2 -->
     <link rel="stylesheet" href="<?php echo base_url('') ?>/assetadmin/vendor/select2/css/select2.min.css">
         <!-- Datatable -->
    <link href="<?php echo base_url('') ?>/assetadmin/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- datepicker -->
    <link href="<?= base_url(); ?>/assetadmin/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
	
	<!-- Style css -->
    <link href="<?php echo base_url('') ?>/assetadmin/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('') ?>/assetadmin/css/custom.css" rel="stylesheet">

     <link href="<?php echo base_url('') ?>/assetadmin/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <!-- Jquery masking -->
   <script src="<?= base_url('jquery/jquery.mask.js') ?>"></script>
   <script src="<?= base_url('assetadmin/ckeditor/ckeditor.js');?>"></script>
    <style type="text/css">
    	
    </style>
	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="" class="brand-logo">
				
				<div class="logo-abbr" >
				  <img id="logo" src="<?php echo base_url('') ?>/assetcustomer/img/logo/umkmlogo.png" alt="" class="custom_logo" />
				</div>
            </a>
            <div class="nav-control">
                <div class="hamburger" id="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                    	 <!-- <div class="header-left">

							<div class="dashboard_bar">
                               
                                 <button type="button" class="btn btn-dark btn-rounded" id="theme-dark"><i class="fa-solid fa-lightbulb"></i></button>
                  		  </div>
                            
                        </div> -->
                        <div class="header-left">

							<div class="dashboard_bar">
                                <?php echo $contenttit ?>
                            </div>


							
                        </div>
                       
                        
                        
							<li class="nav-item dropdown header-profile" style="padding-left:0px;">
								
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<div class="header-info2 d-flex align-items-center">
										<img src="<?php echo base_url('') ?>/assetadmin/images/profile/userprofile.jpg" width="20" alt="" />
										<div class="d-flex align-items-center sidebar-info" style="padding-left:10px;">
											<div>
												<span class="font-w400 d-block" style="color:white;"><?php echo user()->nama_mitra.' ('.user()->nama_pemilik.')' ?></span>
												<small class="text-end font-w400"><?php // (in_groups('hrd superadmin'))?'HRD Superadmin':'HRD Admin' ?></small>
											</div>	
											<i class="fas fa-chevron-down"></i>
										</div>
									</div>
									</a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    
                                    <a href="<?php echo base_url('logout') ?>" class="dropdown-item ai-icon">
                                        <svg  xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
                    <li class="<?php echo (isset($activedash))? $activedash :'' ?>"><a class="" href="<?php echo base_url('Seller') ?>">
							<i class="fa-solid fa-house"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>

                    <li><a href="<?php echo base_url('MyProduct') ?>">
                            <i class="fa-solid fa-boxes-stacked"></i>
                            <span class="nav-text">Produk Saya</span>
                        </a>
                    </li>
                    
					
                </ul>
				
				<div class="copyright">
					<p><strong>Jobick Job Admin</strong> © 2021 All Rights Reserved</p>
					
				</div>
			</div>
        </div>
        <?php echo isset($content)? view($content,isset($datacontent)?$datacontent:array()) : '' ?>
        <?php echo view('admin/footer') ?>

        <script type="text/javascript">
        	const burger = document.getElementById('hamburger');
        	const img = document.getElementById('logo');

        	burger.addEventListener('click', function () {
        		img.classList.toggle('small');
        		console.log(img);
        	})
        </script>