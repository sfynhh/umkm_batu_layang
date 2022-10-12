 <main>
   <!-- shop-area -->
            <section class="shop--area pt-90 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-3 order-2 order-lg-0">
                            <aside class="shop-sidebar">
                                <div class="widget shop-widget">
                                    <div class="shop-widget-title">
                                        <h6 class="title">Kategori Produk</h6>
                                    </div>
                                    <div class="shop-cat-list">
                                        <ul>
                                            <?php foreach ($kategori as $val){ ?>
                                            <li><a href="#" onclick="bykategori(<?php echo $val->id_kategori ?>)"><?php echo $val->nama_kategori ?><span><i class="fa-solid fa-magnifying-glass-arrow-right"></i></span></a></li>
                                                                                    
                                            <?php } ?>
                                            </ul>
                                    </div>
                                </div>
                                
                                <div class="widget shop-widget">
                                    <div class="shop-widget-title">
                                        <h6 class="title">Toko</h6>
                                    </div>
                                    <div class="shop-cat-list">
                                        <ul>
                                            <?php foreach ($mitra as $val): ?>
                                               <li><a href="#" onclick="bymitra(<?php echo $val->id_mitra ?>)"><?php echo $val->nama_mitra ?> <span><i class="fa-solid fa-magnifying-glass-arrow-right"></i></span></a></li> 
                                            <?php endforeach ?>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="col-9">
                            <div class="shop-top-meta mb-30">
                                <div class="row">
                                    <div class="col-md-6 col-sm-7">
                                       <!--  <div class="shop-top-left">
                                            <ul>
                                                <li><a href="#"><i class="fas fa-bars"></i> FILTER</a></li>
                                                <li>Showing 1–9 of 80 results</li>
                                            </ul>
                                        </div> -->
                                    </div>
                                    <div class="col-md-6 col-sm-5">
                                        <div class="shop-top-right">
                                            <form action="#">
                                                <select name="select">
                                                    <option>Newest Item</option>
                                            
                                                </select>
                                            </form>
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
            <!-- shop-area-end -->

        </main>
        
        <script type="">

            
            $(document).ready(function(){
                var viewstatus =<?php echo json_encode($viewmenu) ?>;
                load_produk(viewstatus);
            });
            function load_produk(viewstatus) {
               
                if(viewstatus=="default"){
                    $.ajax({
                    type : 'GET',
                    url : "<?php echo site_url(); ?>/Produk/produk_json",
                    dataType : 'json',
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
                                                <div class="sp-product-content"><h6 class="title"><a href="<?php echo base_url('Produkdetail') ?>/`+value.id_produk+`l"> `+value.nama_produk+`</a></h6><span class="">Mitra : `+value.nama_mitra+` </span>
                                                    <div class="sp-cart-wrap">
                                                    <a href="https://wa.me/+62895322050880" class="btn btn-primary">Order Now</a>
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
              }else if(viewstatus=="kategori"){
                     var idkat=<?php echo json_encode($idkategori) ?>;
                    $.ajax({    
                    url : "<?php echo site_url(); ?>/Produk/produkbykategori_json",
                    type:'post',
                    dataType : 'json',
                    data:({
                        id_kat : idkat
                    }),
                    success :  function(res){
                        //console.log(id)
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
                                                <div class="sp-product-content"><h6 class="title"><a href="<?php echo base_url('Produkdetail') ?>/`+value.id_produk+`"> `+value.nama_produk+`</a></h6><span class="">Mitra : `+value.nama_mitra+` </span>
                                                    <div class="sp-cart-wrap">
                                                    <a href="https://wa.me/+62895322050880 " class="btn btn-primary">Order Now</a>
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
            
              }else{
                var idktgr=<?php echo json_encode($idkategori) ?>;
                var namaproduk=<?php echo (isset($namaproduk))? json_encode($namaproduk):json_encode(" ") ?>;
                $.ajax({    
                    url : "<?php echo site_url(); ?>/Produk/produksearch_json",
                    type:'post',
                    dataType : 'json',
                    data:({
                        id_kat : idktgr,
                        nama_produk :namaproduk,
                    }),
                    success :  function(res){
                        //console.log(id)
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
                                                <div class="sp-product-content"><h6 class="title"><a href="<?php echo base_url('Produkdetail') ?>/`+value.id_produk+`"> `+value.nama_produk+`</a></h6><span class="">Mitra : `+value.nama_mitra+` </span>
                                                    <div class="sp-cart-wrap">
                                                    <a href="https://wa.me/+62895322050880 " class="btn btn-primary">Order Now</a>
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
                
            }

            function bykategori(id) {
                          
                $.ajax({    
                    url : "<?php echo site_url(); ?>/Produk/produkbykategori_json",
                    type:'post',
                    dataType : 'json',
                    data:({
                        id_kat : id 
                    }),
                    success :  function(res){
                        //console.log(id)
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
                                                <div class="sp-product-content"><h6 class="title"><a href="<?php echo base_url('Produkdetail') ?>/`+value.id_produk+`"> `+value.nama_produk+`</a></h6><span class="">Mitra : `+value.nama_mitra+` </span>
                                                    <div class="sp-cart-wrap">
                                                    <a href="https://wa.me/+62895322050880 " class="btn btn-primary">Order Now</a>
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

             function bymitra(id) {
                          
                $.ajax({    
                    url : "<?php echo site_url(); ?>/Produk/produkbymitra_json",
                    type:'post',
                    dataType : 'json',
                    data:({
                        id_mitra : id 
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
                                                <div class="sp-product-content"><h6 class="title"><a href="<?php echo base_url('Produkdetail') ?>/`+value.id_produk+`"> `+value.nama_produk+`</a></h6><span class="">Mitra : `+value.nama_mitra+` </span>
                                                    <div class="sp-cart-wrap">
                                                    <a href="https://wa.me/+62895322050880 " class="btn btn-primary">Order Now</a>
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
                           //console.log(numberOfitem); 

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
        <!-- main-area-end --> 