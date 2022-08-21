<!-- main-area -->
        <main>
            <!-- slider-area -->
            <section class="slider-area" data-background="img/bg/slider_area_bg.jpg">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col">
                            <div class="slider-active">
                                <div class="single-slider slider-bg" data-background="<?php echo base_url('') ?>/assetcustomer/img/slider/slider_bg2.jpg">
                                    <div class="slider-content">
                                        <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s">top deal is cooming soon!</h5>
                                        <h2 class="title" data-animation="fadeInUp" data-delay=".4s">Traditional food</h2>
                                        <p data-animation="fadeInUp" data-delay=".6s">Promos are coming soon</p>
                                        <a href="shop.html" class="btn rounded-btn" data-animation="fadeInUp" data-delay=".8s">Shop Now</a>
                                    </div>
                                </div>
                                <div class="single-slider slider-bg" data-background="<?php echo base_url('') ?>/assetcustomer/img/slider/slider_bg1.jpg">
                                    <div class="slider-content">
                                         <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s">top deal is cooming soon!</h5>
                                        <h2 class="title" data-animation="fadeInUp" data-delay=".4s">Traditional food</h2>
                                        <p data-animation="fadeInUp" data-delay=".6s">Promos are coming soon</p>
                                        <a href="shop.html" class="btn rounded-btn" data-animation="fadeInUp" data-delay=".8s">Shop Now</a>
                                    </div>
                                </div>
                                <div class="single-slider slider-bg" data-background="<?php echo base_url('') ?>/assetcustomer/img/slider/slider_bg3.jpg">
                                    <div class="slider-content">
                                         <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s">top deal is cooming soon!</h5>
                                        <h2 class="title" data-animation="fadeInUp" data-delay=".4s">Traditional food</h2>
                                        <p data-animation="fadeInUp" data-delay=".6s">Promos are coming soon</p>
                                        <a href="shop.html" class="btn rounded-btn" data-animation="fadeInUp" data-delay=".8s">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>

                <!-- category-area -->
                <div class="container custom-container">
                    <div class="slider-category-wrap" >
                        <div class="row category-active">
                        <?php foreach ($kategori as $val){ ?>
                            <div class="col-lg-5">
                                <div class="category-item active">
                                    <a href="<?php echo base_url('ProdukList/'.$val->id_kategori) ?>" class="category-link"></a>
                                    <div class="category-thumb">
                                        <img src="<?php echo base_url('assetcustomer/img/'.$val->foto_kategori) ?>" alt="" style="width: 120px;height: 120px;">
                                    </div>
                                    <div class="category-content">
                                        <h6 class="title"><?php echo $val->nama_kategori ?></h6>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                       

                        </div>
                    </div>
                </div>
                <!-- category-area-end -->

            </section>
            <!-- slider-area-end -->
         
            <!-- discount-area -->
            <section class="discount-area pt-80">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-6 col-md-8">
                            <div class="discount-item mb-20">
                                <div class="discount-thumb">
                                    <img src="<?php echo base_url('') ?>/assetcustomer/img/
product/discount_img01.jpg" alt="">
                                </div>
                                <div class="discount-content">
                                    <span>healthy food</span>
                                    <h4 class="title"><a href="shop.html">100 organic UP TO 35%</a></h4>
                                    <a href="shop.html" class="btn">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-8">
                            <div class="discount-item mb-20">
                                <div class="discount-thumb">
                                    <img src="<?php echo base_url('') ?>/assetcustomer/img/
product/discount_img02.jpg" alt="">
                                </div>
                                <div class="discount-content">
                                    <span>healthy food</span>
                                    <h4 class="title"><a href="shop.html">Hygienically Packed</a></h4>
                                    <a href="shop.html" class="btn">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-8">
                            <div class="discount-item style-two mb-20">
                                <div class="discount-thumb">
                                    <img src="<?php echo base_url('') ?>/assetcustomer/img/
product/discount_img03.jpg" alt="">
                                </div>
                                <div class="discount-content">
                                    <span>healthy food</span>
                                    <h4 class="title"><a href="shop.html">baby favorite UP TO 15%</a></h4>
                                    <a href="shop.html" class="btn">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- discount-area-end -->

            <!-- special-products-area -->
            <section class="special-products-area gray-bg pt-75 pb-60">
                  <div class="container">
                    <div class="row align-items-end mb-50">
                        <div class="col-md-8 col-sm-9">
                            <div class="section-title">
                                <span class="sub-title">Best Sellers</span>
                                <h2 class="title">Best Offers View</h2>
                            </div>
                        </div>
                    </div>
                    <div class="best-sellers-products">
                        <div class="row justify-content-center kontenproduk" id="kontenproduk">
                            
                        </div>
                    </div>
                    <div class="pagination-wrap">
                               
                    </div>

                </div>
            </section>
            <!-- special-products-area-end -->

            <!-- coupon-area -->
            <div class="coupon-area gray-bg pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-bg">
                                <div class="coupon-title">
                                    <span>Use coupon Code</span>
                                    <h3 class="title">Get $3 Discount Code</h3>
                                </div>
                                <div class="coupon-code-wrap">
                                    <h5 class="code">ganic21abs</h5>
                                    <img src="<?php echo base_url('') ?>/assetcustomer/img/
images/coupon_code.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- coupon-area-end -->

            <!-- best-sellers-area -->
            <section class="best-sellers-area pt-75">
              

            </section>
            <!-- best-sellers-area-end -->

            <!-- discount-area -->
            <section class="discount-style-two pt-60 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="discount-item-two">
                                <div class="discount-thumb">
                                    <img src="<?php echo base_url('') ?>/assetcustomer/img/
product/s_discount_img01.jpg" alt="">
                                </div>
                                <div class="discount-content">
                                    <span>healthy food</span>
                                    <h4 class="title"><a href="shop.html">organic farm for ganic</a></h4>
                                    <p>Super Offer TO 50% OFF</p>
                                    <a href="shop.html" class="btn rounded-btn">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="discount-item-two">
                                <div class="discount-thumb">
                                    <img src="<?php echo base_url('') ?>/assetcustomer/img/
product/s_discount_img02.jpg" alt="">
                                </div>
                                <div class="discount-content">
                                    <span>healthy food</span>
                                    <h4 class="title"><a href="shop.html">BABY FAVORITE UP TO 15%</a></h4>
                                    <p>Super Offer TO 50% OFF</p>
                                    <a href="shop.html" class="btn rounded-btn">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- discount-area-end -->

        </main>

<script type="text/javascript">
       $(document).ready(function(){
                load_produk();
            });
            function load_produk() {
                $.ajax({
                    type : 'GET',
                    url : "<?php echo site_url(); ?>/Produk/produk_json",
                    dataType : 'json',
                    success :  function(res){
                        var html='';
                        $.each(res, function(key, value) {
                             var image = "<?= base_url('assetcustomer/img') ?>/" + value.foto_depan;
                             html += `<a href="<?php echo base_url('Produkdetail') ?>/`+value.id_produk+`">
                                        <div class="col-3 subkonten">
                                            <div class="sp-product-item mb-20" style="background-color:white;" >
                                                <div class="sp-product-thumb" >
                                                <span class="batch">New</span><img src="`+image+`" style="width: 192px;height: 143px;" alt="">
                                                </div>
                                                <div class="sp-product-content" ><h6 class="title"><a href="shop-details.html"> `+value.nama_produk+`</a></h6><span class="">Mitra : `+value.nama_mitra+` </span>
                                                    <div class="sp-cart-wrap">
                                                    <a href="https://wa.me/+6281461216787 " class="btn btn-primary">Order Now</a>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                        </a>`
                        });            
                          
                        $('#kontenproduk').html(html);

                         $(function () {
                            var numberOfitem=$('.kontenproduk .subkonten ').length;
                            var limitPerpage=5;
                            var totalPages=Math.ceil(numberOfitem/limitPerpage);
                            var paginationSize=7;
                            var currentPage;

                            function showPage(whichPage) {
                                if(whichPage<1 || whichPage>totalPages) return false;

                                currentPage = whichPage;

                                $('.kontenproduk .subkonten ').hide().slice((currentPage-1)*limitPerpage, currentPage*limitPerpage).show();
                                $('.pagination-wrap li').slice(1,-1).remove();

                                // var halaman=1;
                                // var cek=getPageList(totalPages, currentPage, paginationSize);
                                // console.log(cek);
                                getPageList(totalPages, currentPage, paginationSize).forEach(item => {

                                  $("<li>").addClass("page-item").addClass(item ? "current-page" : "dots").toggleClass("activepage", item === currentPage).append($("<a>").addClass("page-link")
                                  .attr({href: "javascript:void(0)"}).text(item || "...")).insertBefore(".next");

                                });

                                 $(".prev").toggleClass("disable", currentPage === 1);
                                $(".next").toggleClass("disable", currentPage === totalPages);
                                return true;
                            }
                           console.log(numberOfitem); 

                            $(".pagination-wrap").append(
                                 $("<ul>").append(
                                    $("<li>").addClass("page-item").addClass("prev").append($("<a>").attr({href: "javascript:void(0)"}).text("Prev")),
                                 $("<li>").addClass("page-item").addClass("next").append($("<a>").attr({href: "javascript:void(0)"}).text("Next"))
                                    ));

                            $(".kontenproduk").show();
                            showPage(1); 
                            $(document).on("click", ".pagination-wrap li.current-page:not(.activepage)", function(){
                                return showPage(+$(this).text());
                              });
                            
                              $(".next").on("click", function(){
                                return showPage(currentPage + 1);
                              });
                            
                              $(".prev").on("click", function(){
                                return showPage(currentPage - 1);
                              });      
                        });
                        
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                            // alert(xhr.status);
                            alert(thrownError);
                          }
                });
            }
            function getPageList(totalPages, page, maxLength){
                  function range(start, end){
                    return Array.from(Array(end - start + 1), (_, i) => i + start);
                  }
                
                  var sideWidth = maxLength < 9 ? 1 : 2;
                  var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
                  var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1;
                  console.log(sideWidth);
                
                  if(totalPages <= maxLength){
                    return range(1, totalPages);
                  }
                
                  if(page <= maxLength - sideWidth - 1 - rightWidth){
                    return range(1, maxLength - sideWidth - 1).concat(0, range(totalPages - sideWidth + 1, totalPages));
                  }
                
                  if(page >= totalPages - sideWidth - 1 - rightWidth){
                    return range(1, sideWidth).concat(0, range(totalPages- sideWidth - 1 - rightWidth - leftWidth, totalPages));
                  }
                
                  return range(1, sideWidth).concat(0, range(page - leftWidth, page + rightWidth), 0, range(totalPages - sideWidth + 1, totalPages));
                }
           

           
</script>