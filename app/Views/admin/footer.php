		
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://dexignlab.com/" target="_blank">DexignLab</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->
		
        <!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo base_url('') ?>/assetadmin/vendor/global/global.min.js"></script>
	<script src="<?php echo base_url('') ?>/assetadmin/vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="<?php echo base_url('') ?>/assetadmin/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<!-- selet js -->
	<script src="<?php echo base_url('') ?>/assetadmin/vendor/select2/js/select2.full.min.js"></script>
    <script src="<?php echo base_url('') ?>/assetadmin/js/plugins-init/select2-init.js"></script>
	
	<!-- Apex Chart -->
	<script src="<?php echo base_url('') ?>/assetadmin/vendor/apexchart/apexchart.js"></script>
	
	<script src="<?php echo base_url('') ?>/assetadmin/vendor/chart.js/Chart.bundle.min.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="<?php echo base_url('') ?>/assetadmin/vendor/peity/jquery.peity.min.js"></script>
     <!-- Datatable -->
    <script src="<?php echo base_url('') ?>/assetadmin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('') ?>/assetadmin/js/plugins-init/datatables.init.js"></script>
    <!-- datepicker -->
    <script src="<?= base_url(); ?>/assetadmin/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="<?php echo base_url('') ?>/assetadmin/js/dashboard/dashboard-1.js"></script>
	
	<script src="<?php echo base_url('') ?>/assetadmin/vendor/owl-carousel/owl.carousel.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	
    <script src="<?php echo base_url('') ?>/assetadmin/js/custom.min.js"></script>
	<script src="<?php echo base_url('') ?>/assetadmin/js/dlabnav-init.js"></script>
	
    
	<script>

		function JobickCarousel()
			{

				/*  testimonial one function by = owl.carousel.js */
				jQuery('.front-view-slider').owlCarousel({
					loop:false,
					margin:30,
					nav:true,
					autoplaySpeed: 3000,
					navSpeed: 3000,
					autoWidth:true,
					paginationSpeed: 3000,
					slideSpeed: 3000,
					smartSpeed: 3000,
					autoplay: false,
					animateOut: 'fadeOut',
					dots:true,
					navText: ['', ''],
					responsive:{
						0:{
							items:1
						},
						
						480:{
							items:1
						},			
						
						767:{
							items:3
						},
						1750:{
							items:3
						}
					}
				})
			}

			jQuery(window).on('load',function(){
				setTimeout(function(){
					JobickCarousel();
				}, 1000); 
			});

	$(".choose_date").datepicker({
        format: 'dd-mm-yyyy ',
        autoclose: true,
        locale: 'id'
    });

	   
	</script>

</body>
</html>