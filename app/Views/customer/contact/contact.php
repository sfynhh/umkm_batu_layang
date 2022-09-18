<main>

       
            <!-- contact-area -->
            <section class="contact-area pt-90 pb-90">
                <div class="container">
                    <div class="container-inner-wrap">
                        <div class="row justify-content-center justify-content-lg-between">
                            <div class="col-lg-6 col-md-8 order-2 order-lg-0">
                                <div class="contact-title mb-25">
                                    <h5 class="sub-title">Hubungi Kami</h5>
                                    <h2 class="title">Let's Talk Question<span>.</span></h2>
                                </div>
                                <div class="contact-wrap-content">
                                   
                                    <form id="frmtambah" class="contact-form">
                                        <div class="form-grp">
                                            <label for="name">Your Name <span>*</span></label>
                                            <input type="text" placeholder="Jon Deo..." name="nama">
                                            <div  id="nama">
                                                
                                            </div>
                                        </div>
                                        <div class="form-grp">
                                            <label for="email">Your Email <span>*</span></label>
                                            <input type="text" placeholder="info.example@.com" name="email">
                                              <div  id="email">
                                                
                                            </div>
                                        </div>
                                        <div class="form-grp">
                                            <label for="message">Your Message <span>*</span></label>
                                            <textarea name="message" id="message" placeholder="Opinion..." name="message"></textarea>
                                        </div>
                                        <button type="button" class="btn rounded-btn" onclick="add()">Send Now</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-6 col-md-8">
                                <div class="contact-info-wrap">
                                    <div class="contact-img">
                                        <img src="<?php echo base_url('') ?>/assetcustomer/img/images/contact_img.png" alt="">
                                    </div>
                                    <div class="contact-info-list">
                                        <ul>
                                            <li>
                                                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                                <div class="content">
                                                    <p>Desa Batulayang, KAB. BANDUNG BARAT, CILILIN, JAWA BARAT, ID, 40562</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                                <div class="content">
                                                    <p>+62 1277 2572 85</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon"><i class="fas fa-envelope-open"></i></div>
                                                <div class="content">
                                                    <p>p2mddpm@gmail.com</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="contact-social">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>

        <script type="text/javascript">
             function add()
    {

       $.ajax({
         url:"<?php echo base_url('Home/addjson') ?>",
         global:false,
         async:true,
         type:'post',
         dataType:'json',
         data: $('#frmtambah').serialize(),
         success : function(e) {
           if(e.status == 'ok;') 
           {
                alert('pesan anda sudah terkirim');
                 location.reload();

            
          } 
          else{ 
            var msgeror='';
          
            //console.log(e.data);
            $.each(e.data, function(key, value) {
             document.getElementById(key).innerHTML = `<p style="padding-top:10px;"> <span class="badge light badge-danger">`+value+`</span></p>`;
          });
            
         }
      },
      error :function(xhr, status, error) {
       alert(xhr.responseText);
    }

 });
}
        </script>