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
                                        <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s">top deal !</h5>
                                        <h2 class="title" data-animation="fadeInUp" data-delay=".4s">organic food</h2>
                                        <p data-animation="fadeInUp" data-delay=".6s">Get up to 50% OFF Today Only</p>
                                        <a href="shop.html" class="btn rounded-btn" data-animation="fadeInUp" data-delay=".8s">Shop Now</a>
                                    </div>
                                </div>
                                <div class="single-slider slider-bg" data-background="<?php echo base_url('') ?>/assetcustomer/img/slider/slider_bg1.jpg">
                                    <div class="slider-content">
                                        <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s">Real simple !</h5>
                                        <h2 class="title" data-animation="fadeInUp" data-delay=".4s">Time Grocery</h2>
                                        <p data-animation="fadeInUp" data-delay=".6s">Get up to 50% OFF Today Only</p>
                                        <a href="shop.html" class="btn rounded-btn" data-animation="fadeInUp" data-delay=".8s">Shop Now</a>
                                    </div>
                                </div>
                                <div class="single-slider slider-bg" data-background="<?php echo base_url('') ?>/assetcustomer/img/slider/slider_bg3.jpg">
                                    <div class="slider-content">
                                        <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s">top deal !</h5>
                                        <h2 class="title" data-animation="fadeInUp" data-delay=".4s">organic food</h2>
                                        <p data-animation="fadeInUp" data-delay=".6s">Get up to 50% OFF Today Only</p>
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
                                    <a href="shop.html" class="category-link"></a>
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
                        <div class="col-md-4 col-sm-3">
                            <div class="section-btn text-left text-md-right">
                                <a href="shop.html" class="btn">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="best-sellers-products">
                        <div class="row justify-content-center">
                            <div class="col-3">
                                <div class="sp-product-item mb-20">
                                    <div class="sp-product-thumb">
                                        <span class="batch">New</span>
                                        <a href="shop-details.html"><img src="<?php echo base_url('') ?>/assetcustomer/img/
product/sp_products09.png" alt=""></a>
                                    </div>
                                    <div class="sp-product-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6 class="title"><a href="shop-details.html">Uncle Orange Vanla Ready Pice</a></h6>
                                        <span class="product-status">IN Stock</span>
                                        <div class="sp-cart-wrap">
                                            <form action="#">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1">
                                                </div>
                                            </form>
                                        </div>
                                        <p>$1.50 - 1 kg</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="sp-product-item mb-20">
                                    <div class="sp-product-thumb">
                                        <span class="batch discount">15%</span>
                                        <a href="shop-details.html"><img src="<?php echo base_url('') ?>/assetcustomer/img/
product/sp_products02.png" alt=""></a>
                                    </div>
                                    <div class="sp-product-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6 class="title"><a href="shop-details.html">Dannon Max Vanla ice cream</a></h6>
                                        <span class="product-status">IN Stock</span>
                                        <div class="sp-cart-wrap">
                                            <form action="#">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1">
                                                </div>
                                            </form>
                                        </div>
                                        <p>$3.50 - 1 lt</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="sp-product-item mb-20">
                                    <div class="sp-product-thumb">
                                        <span class="batch discount">25%</span>
                                        <a href="shop-details.html"><img src="<?php echo base_url('') ?>/assetcustomer/img/
product/sp_products03.png" alt=""></a>
                                    </div>
                                    <div class="sp-product-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6 class="title"><a href="shop-details.html">Walnuts Max Vanla Greek Pice</a></h6>
                                        <span class="product-status">IN Stock</span>
                                        <div class="sp-cart-wrap">
                                            <form action="#">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1">
                                                </div>
                                            </form>
                                        </div>
                                        <p>$2.99 - 1 kg</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="sp-product-item mb-20">
                                    <div class="sp-product-thumb">
                                        <span class="batch">new</span>
                                        <a href="shop-details.html"><img src="<?php echo base_url('') ?>/assetcustomer/img/
product/sp_products04.png" alt=""></a>
                                    </div>
                                    <div class="sp-product-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6 class="title"><a href="shop-details.html">Brachs Bens Vanla Ready Pice</a></h6>
                                        <span class="product-status">IN Stock</span>
                                        <div class="sp-cart-wrap">
                                            <form action="#">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1">
                                                </div>
                                            </form>
                                        </div>
                                        <p>$2.99 - 1 kg</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="sp-product-item mb-20">
                                    <div class="sp-product-thumb">
                                        <span class="batch discount">25%</span>
                                        <a href="shop-details.html"><img src="<?php echo base_url('') ?>/assetcustomer/img/
product/sp_products05.png" alt=""></a>
                                    </div>
                                    <div class="sp-product-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6 class="title"><a href="shop-details.html">Black Lady Vanla Greek Grapes</a></h6>
                                        <span class="product-status">IN Stock</span>
                                        <div class="sp-cart-wrap">
                                            <form action="#">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1">
                                                </div>
                                            </form>
                                        </div>
                                        <p>$5.99 - 1 kg</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
