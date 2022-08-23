<!-- main-area -->
        <main>

            <!-- breadcrumb-area -->
            <div class="breadcrumb-area breadcrumb-bg-two">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                     
                                        <li class="breadcrumb-item"><a href="#" onclick="history.back(-1)" >Produk Kami</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Produk Detail</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

            <!-- shop-details-area -->
            <section class="shop-details-area pt-90 pb-90">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="shop-details-flex-wrap">
                                <div class="shop-details-img-wrap">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="item-one" role="tabpanel" aria-labelledby="item-one-tab">
                                            <div class="shop-details-img">
                                                <img src="<?php echo base_url('/assetcustomer/img/'.$produkdetail['foto_depan']) ?>" style="height: 604px; width: 579px;" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="shop-details-content">
                                <h4 class="title"><?php echo $produkdetail['nama_produk'] ?></h4>
                                <div class="shop-details-meta">
                                    <ul>
                                        <li>Mitra : <a href=""><?php echo $produkdetail['nama_mitra'] ?></a></li>
                                        <!-- <li class="shop-details-review">
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span>Review</span>
                                        </li> -->
                                        <!-- <li>ID : <span>QZX8VGH</span></li> -->
                                    </ul>
                                </div>
                                <div class="shop-details-price">
                                    <h2 class="price"><?php echo Rupiah($produkdetail['harga_produk']) ?></h2>
                                   <!--  <h5 class="stock-status">- IN Stock</h5> -->
                                </div>
                                <p><?php echo $produkdetail['deskripsi_produk'] ?></p>
                                <div class="shop-details-list">
                                    <ul>
                                        <li>Type : <span><?php echo $produkdetail['nama_kategori'] ?></span></li>
                                         <li>tanggal Produksi: <span><?php echo date("d-m-Y", strtotime($produkdetail['tgl_produksi'])) ?></span></li>
                                        <li>tanggal Expired : <span><?php echo date("d-m-Y", strtotime($produkdetail['tgl_expired'])) ?></span></li>
                                        <!-- <li>CO : <span>Ganic</span></li> -->
                                    </ul>
                                </div>
                                <div class="shop-perched-info">
                                 
                                    <a href="https://wa.me/+6281461216787 " class="btn btn-primary" style="background-color:green;">Order Now</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- shop-details-area-end -->

            <!-- coupon-area -->
         <!--    <div class="coupon-area">
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
                                    <img src="<?php //echo base_url('') ?>/assetcustomer/img/images/coupon_code.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- coupon-area-end -->

            <!-- best-sellers-area -->
            <section class="best-sellers-area pt-85 pb-70">
                <div class="container">
                    <div class="row align-items-end mb-40">
                        <div class="col-md-8 col-sm-9">
                            <div class="section-title">
                                <span class="sub-title">Related Products</span>
                                <h2 class="title">From this Collection</h2>
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
            <!-- best-sellers-area-end -->

        </main>

        <script type="">

            
            $(document).ready(function(){
                var id=<?php echo json_encode($produkdetail['produk_id_kategori']) ?>;
                console.log(id);
                load_produk(id);
            });
            function load_produk(id) {
                $.ajax({    
                    url : "<?php echo site_url(); ?>/Produk/produkbykategori_json",
                    type:'post',
                    dataType : 'json',
                    data:({
                        id_kat : id 
                    }),
                    success :  function(res){
                        var html='';
                        $.each(res, function(key, value) {
                             var image = "<?= base_url('assetcustomer/img') ?>/" + value.foto_depan;
                             html += `<a href="<?php echo base_url('Produkdetail') ?>/`+value.id_produk+`">
                                        <div class="col-3 subkonten">
                                            <div class="sp-product-item mb-20">
                                                <div class="sp-product-thumb">
                                                <span class="batch">New</span><img src="`+image+`" style="width: 192px;height: 143px;" alt="">
                                                </div>
                                                <div class="sp-product-content"><h6 class="title"><a href="<?php echo base_url('Produkdetail') ?>/`+value.id_produk+`"> `+value.nama_produk+`</a></h6><span class="">Mitra : `+value.nama_mitra+` </span>
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