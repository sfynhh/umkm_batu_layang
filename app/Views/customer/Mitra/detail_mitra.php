<main>

            <!-- breadcrumb-area -->
            <section class="blog-details-area blog-gray-bg" style="padding-top:0px;padding-bottom:0px;">
                <div class="container" style="padding-left:0px">
                    <div class="container-inner-wrap" style="padding-left:10px">
                        
                        <div class="row justify-content-left"style="width:100%">
                                
                                <div class="avatar-post mt-50 mb-50" style="width: 100%;">
                                    <div class="post-avatar-img">
                                        <img src="<?php echo base_url('') ?>/assetcustomer/img/blog/post_avatar_img.png" alt="img">
                                    </div>
                                    <div class="post-avatar-content">
                                        <h5><?php echo $detailmitra['nama_mitra'] ?></h5>
                                        <p>Pemilik : <?php echo $detailmitra['nama_pemilik'] ?></p>
                                        <p>Alamat : <?php echo $detailmitra['alamat_mitra'] ?></p>
                                        <div class="blog-details-social">
                                        
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->
            <section class="shop--area pt-90 pb-90" style="padding-top:0px;margin-top:0px;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-3 order-2 order-lg-0">
                            <aside class="shop-sidebar">
                                <div class="widget shop-widget">
                                    <div class="shop-widget-title">
                                        <h6 class="title">Product Categories</h6>
                                    </div>
                                    <div class="shop-cat-list">
                                        <ul>
                                            <?php foreach($kategori as $val) { ?>
                                            <li><a href="#" onclick="bykategori(<?php echo $val->id_kategori ?>, <?php echo $detailmitra['id_mitra'] ?>)"><?php echo $val->nama_kategori ?> <span>+</span></a></li>
                                        <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                
                            </aside>
                        </div>
                        <div class="col-9">
                            
                            <div class="shop-top-meta mb-30">
                                <div class="row">
                                <div class="col-md-8 col-sm-9">
                                    <div class="section-title">
                                        
                                        <h2 class="title">Produk Mitra</h2>
                                    </div>
                                </div>
                                    
                                </div>
                            </div>
                            <div class="shop-products-wrap">
                                <div class="row justify-content-center kontenproduk" id="kontenproduk">
                                   
                                </div>
                            </div>
                            <div class="pagination-wrap" id="pagination-wrap">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- blog-details-area -->
            
            <!-- blog-details-area-end -->

        </main>

        <script type="">

            
            $(document).ready(function(){
                var id=<?php echo json_encode($detailmitra['id_pemilik_mitra']) ?>;
                load_produk(id);
            });
            function load_produk(id) {
                $.ajax({
                    url : "<?php echo site_url(); ?>/Mitra/produkbymitra",
                    type:'post',
                    dataType : 'json',
                    data:({
                        id_mitra : id 
                    }),
                    success :  function(res){
                        var html='';
                        $.each(res, function(key, value) {
                             var newdate = new Date(value.created_date);
                               var nowdate=new Date();
                               newdate.setDate(newdate.getDate()+7);
                               if(newdate<=nowdate){
                                var span =''
                               }else{
                                var span ='<span class="batch">New</span>';
                               }
                             var image = "<?= base_url('assetcustomer/img') ?>/" + value.foto_depan;
                             html += `<a href="<?php echo base_url('Produkdetail') ?>/`+value.id_produk+`">
                                        <div class="col-xl-3 col-md-4 col-sm-6 subkonten">
                                            <div class="sp-product-item">
                                                <div class="sp-product-thumb">
                                               `+span+`<img src="`+image+`" style="width: 192px;height: 143px;" alt="">
                                                </div>
                                                <div class="sp-product-content"><h6 class="title"><a href="shop-details.html"> `+value.nama_produk+`</a></h6><span class="">Mitra : `+value.nama_mitra+` </span>
                                                    <div class="sp-cart-wrap">
                                                    <a href="https://wa.me/+6281461216787" class="btn btn-primary">Order Now</a>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                        </a>`
                        });            
                          
                        $('#kontenproduk').html(html);

                         produk_pagination();
                        
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

                function produk_pagination() {
                   $(function () {
                            var numberOfitem=$('.kontenproduk .subkonten ').length;
                            var limitPerpage=8;
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
                }


                function bykategori(id, mitra) {
                          
                $.ajax({    
                    url : "<?php echo site_url(); ?>/Produk/produkbykategorimitra_json",
                    type:'post',
                    dataType : 'json',
                    data:({
                        id_kat : id,
                        id_mitra: mitra
                    }),
                    success :  function(res){
                        console.log(id)
                        var html='';
                        $.each(res, function(key, value) {

                             var newdate = new Date(value.created_date);
                               var nowdate=new Date();
                               newdate.setDate(newdate.getDate()+7);
                               if(newdate<=nowdate){
                                var span =''
                               }else{
                                var span ='<span class="batch">New</span>';
                               }
                             var image = "<?= base_url('assetcustomer/img') ?>/" + value.foto_depan;
                             html += `<a href="<?php echo base_url('Produkdetail') ?>/`+value.id_produk+`">
                                        <div class="col-xl-3 col-md-4 col-sm-6 subkonten">
                                            <div class="sp-product-item">
                                                <div class="sp-product-thumb">
                                                `+span+`<img src="`+image+`" style="width: 192px;height: 143px;" alt="">
                                                </div>
                                                <div class="sp-product-content"><h6 class="title"><a href="shop-details.html"> `+value.nama_produk+`</a></h6><span class="">Mitra : `+value.nama_mitra+` </span>
                                                    <div class="sp-cart-wrap">
                                                    <a href="https://wa.me/+6281461216787 " class="btn btn-primary">Order Now</a>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                        </a>`
                        });            
                          
                        $('#kontenproduk').html(html);
                        document.getElementById("pagination-wrap").innerHTML="";
                        //document.getElementById("kontenproduk").innerHTML="";
                        produk_pagination();
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                            // alert(xhr.status);
                            alert(thrownError);
                          }
                });
            
            }


           

            
        </script>