<?php require(APPPATH.'views/web/layouts/header.php'); ?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1><?php echo $title; ?></h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('san-pham/'); ?>">Sản Phẩm</a></li>
                    <li class="breadcrumb-item active"><?php echo $title; ?></li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION SHOP -->

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <div class="product-image">
                            <div class="product_img_box">
                                <img style="height: 386px; image-rendering: crisp-edges;" id="product_img" src="<?php echo $detail[0]['AnhChinh']; ?>" data-zoom-image="<?php echo $detail[0]['AnhChinh']; ?>" alt="product_img1" />
                                <a href="#" class="product_img_zoom" title="Zoom">
                                    <span class="linearicons-zoom-in"></span>
                                </a>
                            </div>
                            <?php $hinhanh = explode("#", $detail[0]['HinhAnh']); ?>
                            <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">

                                <?php foreach ($hinhanh as $key => $value): ?>
                                    <div class="item">
                                        <a href="#" class="product_gallery_item active" data-image="<?php echo $value; ?>" data-zoom-image="<?php echo $value; ?>">
                                            <img style="height: 80px;" src="<?php echo $value; ?>" alt="product_small_img1" />
                                        </a>
                                    </div>
                                <?php endforeach ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="pr_detail">
                            <div class="product_description">
                                <h4 class="product_title"><a href="#"><?php echo $detail[0]['TenSanPham']; ?></a></h4>
                                <div class="product_price">
                                    <span class="price"><?php echo number_format($detail[0]['GiaBan']); ?></span>
                                    <?php if($detail[0]['GiaBan'] != $detail[0]['GiaGoc']){ ?>
                                        <del><?php echo number_format($detail[0]['GiaGoc']); ?></del>
                                        <?php $phan_tram_khuyen_mai = ($detail[0]['GiaGoc'] - $detail[0]['GiaBan']) / $detail[0]['GiaGoc'] * 100; ?>
                                        <div class="on_sale">
                                            <span>Giảm <?php echo round($phan_tram_khuyen_mai, 0); ?>%</span>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:100%"></div>
                                        </div>
                                    </div>
                                <div class="pr_desc">
                                    <?php echo $detail[0]['MoTaNgan']; ?>
                                </div>
                                <div class="product_sort_info">
                                    <ul>
                                        <li><i class="linearicons-shield-check"></i> Chính hãng, chất lượng</li>
                                        <li><i class="linearicons-sync"></i> Hoàn trả trong 30 ngày</li>
                                        <li><i class="linearicons-bag-dollar"></i> Thanh toán an toàn</li>
                                    </ul>
                                </div>
                            </div>
                            <hr />
                            <div class="cart_extra">
                                <?php if($detail[0]['SoLuong'] <= 0){ ?>
                                    <div class="cart-product-quantity">
                                        <div class="product_sort_info">
                                            <ul>
                                                <li><i class="linearicons-shield-check"></i> Hiện Còn: <?php echo $detail[0]['SoLuong']; ?> sản phẩm</li>
                                            </ul>
                                        </div>
                                        <div class="quantity">
                                            <input type="button" value="-" class="minus">
                                            <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                            <input type="button" value="+" class="plus">
                                        </div>
                                    </div>
                                    <div class="cart_btn" style="cursor: not-allowed;">
                                        <button class="btn btn-fill-out" type="button" disabled style="text-decoration: line-through;"> Tạm Hết Hàng!</button>
                                        <a class="add_compare" href="<?php echo base_url('san-pham/'.$suggest[rand(0,count($suggest) - 1)]['DuongDan'].'/'); ?>"><i class="icon-shuffle"></i></a>
                                        <a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
                                    </div>
                                <?php }else{ ?>
                                    <div class="cart-product-quantity">
                                        <div class="product_sort_info">
                                            <ul>
                                                <li><i class="linearicons-shield-check"></i> Hiện Còn: <?php echo $detail[0]['SoLuong']; ?> sản phẩm</li>
                                            </ul>
                                        </div>
                                        <div class="quantity">
                                            <input type="button" value="-" class="minus">
                                            <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                            <input type="button" value="+" class="plus">
                                        </div>
                                        <span class="m-2 error"></span>
                                    </div>
                                    <div class="cart_btn">
                                        <button class="btn btn-fill-out btn-addtocart" type="button"><i class="icon-basket-loaded"></i> Thêm Giỏ Hàng</button>
                                        <a class="add_compare" href="<?php echo base_url('san-pham/'.$suggest[rand(0,count($suggest) - 1)]['DuongDan'].'/'); ?>"><i class="icon-shuffle"></i></a>
                                        <a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
                                    </div>
                                <?php } ?>
                            </div>
                            <hr />
                            <ul class="product-meta">
                                <li>MSP: <a href="#">SP#000<?php echo $detail[0]['MaSanPham']; ?></a></li>
                                <li>Chuyên Mục: <a href="<?php echo base_url('chuyen-muc/'.$detail[0]['DuongDanChuyenMuc'].'/'); ?>"><?php echo $detail[0]['TenChuyenMuc']; ?></a></li>
                                <li>Thẻ: 
                                    <?php foreach (explode(",", $detail[0]['The']) as $key => $value): ?>
                                        <a href="#" rel="tag"><?php echo $value; ?>, </a> 
                                    <?php endforeach ?>
                                </li>
                            </ul>
                            
                            <div class="product_share">
                                <span>Chia Sẻ:</span>
                                <ul class="social_icons">
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                    <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="large_divider clearfix"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Mô Tả Chi Tiết</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab">
                                <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                    <?php echo $detail[0]['MoTaDai']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="small_divider"></div>
                        <div class="divider"></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="heading_s1">
                            <h3>Sản Phẩm Liên Quan</h3>
                        </div>
                        <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "992":{"items": "2"}, "1199":{"items": "3"}}'>
                            <?php foreach ($categoryProduct as $key => $value): ?>
                                <div class="item">
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>">
                                                <img src="<?php echo $value['AnhChinh']; ?>" alt="el_img2" style="height: 308px;">
                                                <img class="product_hover_img" src="<?php echo explode('#', $value['HinhAnh'])[0]; ?>" alt="el_hover_img2" style="height: 308px;">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart" value="<?php echo $value['MaSanPham']; ?>"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>"><?php echo $value['TenSanPham'] ?></a></h6>
                                            <div class="product_price">
                                                <span class="price"><?php echo number_format($value['GiaBan']); ?></span>
                                                <del><?php echo number_format($value['GiaGoc']); ?></del>
                                                <?php if($value['GiaGoc'] != $value['GiaBan']){ ?>
                                                    <?php $phan_tram_khuyen_mai = ($value['GiaGoc'] - $value['GiaBan']) / $value['GiaGoc'] * 100; ?>
                                                    <div class="on_sale">
                                                        <span>Giảm <?php echo round($phan_tram_khuyen_mai, 0); ?>%</span>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:100%"></div>
                                                </div>
                                                <span class="rating_num"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                <div class="sidebar">
                    <div class="widget">
                        <h5 class="widget_title">Tìm Kiếm</h5>
                        <div class="search_form">
                            <form action="<?php echo base_url('tim-kiem/') ?>"> 
                                <input required class="form-control" name="s" placeholder="Nhập tên sản phẩm..." type="text">
                                <button type="submit" title="Subscribe" class="btn icon_search" value="Tìm Kiếm">
                                    <i class="ion-ios-search-strong"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Chuyên Mục</h5>
                        <ul class="widget_categories">
                            <?php foreach ($categoryNumber as $key => $value): ?>
                                <li><a href="<?php echo base_url('chuyen-muc/'.$value['DuongDanChuyenMuc'].'/'); ?>"><span class="categories_name"><?php echo $value['TenChuyenMuc']; ?></span><span class="categories_num">(<?php echo $value['SoLuongSanPham']; ?>)</span></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>

                    <div class="widget">
                        <h5 class="widget_title">Mới Nhất</h5>
                        <ul class="widget_recent_post">
                            <?php foreach ($new as $key => $value): ?>
                                <?php if($key >= 5){ break; } ?>
                                <li>
                                    <div class="post_img">
                                        <a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/'); ?>"><img style="height: 100px; width: 100px;" src="<?php echo $value['HinhAnh'] ?>" alt="shop_small1"></a>
                                    </div>
                                    <div class="post_content">
                                        <h6 class="product_title" style="white-space: unset;"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TenSanPham']; ?></a></h6>
                                        <div class="product_price">
                                            <span class="price"><?php echo number_format($value['GiaBan']); ?></span>
                                            <del><?php echo number_format($value['GiaGoc']); ?></del>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:100%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <?php if(count($banner1) >= 1){ ?>
                        <div class="widget">
                            <div class="shop_banner">
                                <a href="<?php echo base_url('chuyen-muc/'.$banner1[0]['DuongDan'].'/'); ?>" class="banner_img">
                                    <img style="height: 350px;" src="<?php echo $banner1[0]['HinhAnh'] ?>" alt="sidebar_banner_img">
                                </a> 
                            </div>
                        </div>
                    <?php } ?>
                    <div class="widget">
                        <h5 class="widget_title">Phổ Biến</h5>
                        <ul class="widget_recent_post">
                            <?php foreach ($popular as $key => $value): ?>
                                <?php if($key >= 5){ break; } ?>
                                <li>
                                    <div class="post_img">
                                        <a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/'); ?>"><img style="height: 100px; width: 100px;" src="<?php echo $value['HinhAnh'] ?>" alt="shop_small1"></a>
                                    </div>
                                    <div class="post_content">
                                        <h6 class="product_title" style="white-space: unset;"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TenSanPham']; ?></a></h6>
                                        <div class="product_price">
                                            <span class="price"><?php echo number_format($value['GiaBan']); ?></span>
                                            <del><?php echo number_format($value['GiaGoc']); ?></del>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:100%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Thẻ</h5>

                        <?php $tag = implode(", ", array_unique(array_column($tag, "The"))); ?>
                        <div class="tags">
                            <?php foreach (explode(",", $tag) as $key => $value): ?>
                                <?php if($key >= 10){break;} ?>
                                <a href="#"><?php echo $value; ?></a>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END SECTION SHOP -->

<div class="section pt-0 pb_20">
    <div class="custom-container">
        <div class="row">
            <?php if((count($popular) >= 1)){ ?>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="heading_tab_header">
                                <div class="heading_s2">
                                    <h4>Sản Phẩm Nổi Bật</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5" data-nav="true" data-dots="false" data-margin="20" data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "640":{"items": "2"}, "991":{"items": "1"}}'>

                                    <div class="item">
                                        <?php foreach ($popular as $key => $value): ?>
                                            <div class="product_wrap">
                                                <div class="product_img">
                                                    <a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>">
                                                        <img style="height: 161px;" src="<?php echo $value['AnhChinh']; ?>" alt="el_img2">
                                                        <img style="height: 161px;" class="product_hover_img" src="<?php echo explode('#', $value['HinhAnh'])[0]; ?>" alt="el_hover_img2">
                                                    </a>
                                                </div>
                                                <div class="product_info">
                                                    <h6 class="product_title"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>"><?php echo $value['TenSanPham']; ?></a></h6>
                                                    <div class="product_price">
                                                        <span class="price"><?php echo number_format($value['GiaBan']); ?></span>
                                                        <del><?php echo number_format($value['GiaGoc']); ?></del>
                                                        <?php if($value['GiaGoc'] != $value['GiaBan']){ ?>
                                                            <?php $phan_tram_khuyen_mai = ($value['GiaGoc'] - $value['GiaBan']) / $value['GiaGoc'] * 100; ?>
                                                            <div class="on_sale">
                                                                <span>Giảm <?php echo round($phan_tram_khuyen_mai, 0); ?>%</span>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:100%"></div>
                                                        </div>
                                                        <span class="rating_num"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($key == 2){ break; } ?>
                                        <?php endforeach ?>
                                    </div>

                                    <?php if(count($popular) >= 4){ ?>
                                        <div class="item">
                                            <?php foreach ($popular as $key => $value): ?>
                                                <?php if(($key >= 3) && ($key <= 5)){ ?>
                                                    <div class="product_wrap">
                                                        <div class="product_img">
                                                            <a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>">
                                                                <img style="height: 161px;" src="<?php echo $value['AnhChinh']; ?>" alt="el_img2">
                                                                <img style="height: 161px;" class="product_hover_img" src="<?php echo explode('#', $value['HinhAnh'])[0]; ?>" alt="el_hover_img2">
                                                            </a>
                                                        </div>
                                                        <div class="product_info">
                                                            <h6 class="product_title"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>"><?php echo $value['TenSanPham']; ?></a></h6>
                                                            <div class="product_price">
                                                                <span class="price"><?php echo number_format($value['GiaBan']); ?></span>
                                                                <del><?php echo number_format($value['GiaGoc']); ?></del>
                                                                <?php if($value['GiaGoc'] != $value['GiaBan']){ ?>
                                                                    <?php $phan_tram_khuyen_mai = ($value['GiaGoc'] - $value['GiaBan']) / $value['GiaGoc'] * 100; ?>
                                                                    <div class="on_sale">
                                                                        <span>Giảm <?php echo round($phan_tram_khuyen_mai, 0); ?>%</span>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="rating_wrap">
                                                                <div class="rating">
                                                                    <div class="product_rate" style="width:100%"></div>
                                                                </div>
                                                                <span class="rating_num"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }else{ ?>
                                                    <?php continue; ?>
                                                <?php } ?>
                                            <?php endforeach ?>
                                        </div>
                                    <?php } ?>

                                    <?php if(count($popular) >= 6){ ?>
                                        <div class="item">
                                            <?php foreach ($popular as $key => $value): ?>
                                                <?php if($key >= 6){ ?>
                                                    <div class="product_wrap">
                                                        <div class="product_img">
                                                            <a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>">
                                                                <img style="height: 161px;" src="<?php echo $value['AnhChinh']; ?>" alt="el_img2">
                                                                <img style="height: 161px;" class="product_hover_img" src="<?php echo explode('#', $value['HinhAnh'])[0]; ?>" alt="el_hover_img2">
                                                            </a>
                                                        </div>
                                                        <div class="product_info">
                                                            <h6 class="product_title"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>"><?php echo $value['TenSanPham']; ?></a></h6>
                                                            <div class="product_price">
                                                                <span class="price"><?php echo number_format($value['GiaBan']); ?></span>
                                                                <del><?php echo number_format($value['GiaGoc']); ?></del>
                                                                <?php if($value['GiaGoc'] != $value['GiaBan']){ ?>
                                                                    <?php $phan_tram_khuyen_mai = ($value['GiaGoc'] - $value['GiaBan']) / $value['GiaGoc'] * 100; ?>
                                                                    <div class="on_sale">
                                                                        <span>Giảm <?php echo round($phan_tram_khuyen_mai, 0); ?>%</span>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="rating_wrap">
                                                                <div class="rating">
                                                                    <div class="product_rate" style="width:100%"></div>
                                                                </div>
                                                                <span class="rating_num"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }else{ ?>
                                                    <?php continue; ?>
                                                <?php } ?>
                                            <?php endforeach ?>
                                        </div>
                                    <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if((count($hot) >= 1)){ ?>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="heading_tab_header">
                                <div class="heading_s2">
                                    <h4>Sản Phẩm Hot</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5" data-nav="true" data-dots="false" data-margin="20" data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "640":{"items": "2"}, "991":{"items": "1"}}'>
                                    <div class="item">
                                        <?php foreach ($hot as $key => $value): ?>
                                            <div class="product_wrap">
                                                <div class="product_img">
                                                    <a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>">
                                                        <img style="height: 161px;" src="<?php echo $value['AnhChinh']; ?>" alt="el_img2">
                                                        <img style="height: 161px;" class="product_hover_img" src="<?php echo explode('#', $value['HinhAnh'])[0]; ?>" alt="el_hover_img2">
                                                    </a>
                                                </div>
                                                <div class="product_info">
                                                    <h6 class="product_title"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>"><?php echo $value['TenSanPham']; ?></a></h6>
                                                    <div class="product_price">
                                                        <span class="price"><?php echo number_format($value['GiaBan']); ?></span>
                                                        <del><?php echo number_format($value['GiaGoc']); ?></del>
                                                        <?php if($value['GiaGoc'] != $value['GiaBan']){ ?>
                                                            <?php $phan_tram_khuyen_mai = ($value['GiaGoc'] - $value['GiaBan']) / $value['GiaGoc'] * 100; ?>
                                                            <div class="on_sale">
                                                                <span>Giảm <?php echo round($phan_tram_khuyen_mai, 0); ?>%</span>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:100%"></div>
                                                        </div>
                                                        <span class="rating_num"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($key == 2){ break; } ?>
                                        <?php endforeach ?>
                                    </div>

                                    <?php if(count($hot) >= 4){ ?>
                                        <div class="item">
                                            <?php foreach ($hot as $key => $value): ?>
                                                <?php if(($key >= 3) && ($key <= 5)){ ?>
                                                    <div class="product_wrap">
                                                        <div class="product_img">
                                                            <a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>">
                                                                <img style="height: 161px;" src="<?php echo $value['AnhChinh']; ?>" alt="el_img2">
                                                                <img style="height: 161px;" class="product_hover_img" src="<?php echo explode('#', $value['HinhAnh'])[0]; ?>" alt="el_hover_img2">
                                                            </a>
                                                        </div>
                                                        <div class="product_info">
                                                            <h6 class="product_title"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>"><?php echo $value['TenSanPham']; ?></a></h6>
                                                            <div class="product_price">
                                                                <span class="price"><?php echo number_format($value['GiaBan']); ?></span>
                                                                <del><?php echo number_format($value['GiaGoc']); ?></del>
                                                                <?php if($value['GiaGoc'] != $value['GiaBan']){ ?>
                                                                    <?php $phan_tram_khuyen_mai = ($value['GiaGoc'] - $value['GiaBan']) / $value['GiaGoc'] * 100; ?>
                                                                    <div class="on_sale">
                                                                        <span>Giảm <?php echo round($phan_tram_khuyen_mai, 0); ?>%</span>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="rating_wrap">
                                                                <div class="rating">
                                                                    <div class="product_rate" style="width:100%"></div>
                                                                </div>
                                                                <span class="rating_num"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }else{ ?>
                                                    <?php continue; ?>
                                                <?php } ?>
                                            <?php endforeach ?>
                                        </div>
                                    <?php } ?>

                                    <?php if(count($hot) >= 6){ ?>
                                        <div class="item">
                                            <?php foreach ($hot as $key => $value): ?>
                                                <?php if($key >= 6){ ?>
                                                    <div class="product_wrap">
                                                        <div class="product_img">
                                                            <a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>">
                                                                <img style="height: 161px;" src="<?php echo $value['AnhChinh']; ?>" alt="el_img2">
                                                                <img style="height: 161px;" class="product_hover_img" src="<?php echo explode('#', $value['HinhAnh'])[0]; ?>" alt="el_hover_img2">
                                                            </a>
                                                        </div>
                                                        <div class="product_info">
                                                            <h6 class="product_title"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>"><?php echo $value['TenSanPham']; ?></a></h6>
                                                            <div class="product_price">
                                                                <span class="price"><?php echo number_format($value['GiaBan']); ?></span>
                                                                <del><?php echo number_format($value['GiaGoc']); ?></del>
                                                                <?php if($value['GiaGoc'] != $value['GiaBan']){ ?>
                                                                    <?php $phan_tram_khuyen_mai = ($value['GiaGoc'] - $value['GiaBan']) / $value['GiaGoc'] * 100; ?>
                                                                    <div class="on_sale">
                                                                        <span>Giảm <?php echo round($phan_tram_khuyen_mai, 0); ?>%</span>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="rating_wrap">
                                                                <div class="rating">
                                                                    <div class="product_rate" style="width:100%"></div>
                                                                </div>
                                                                <span class="rating_num"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }else{ ?>
                                                    <?php continue; ?>
                                                <?php } ?>
                                            <?php endforeach ?>
                                        </div>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if((count($suggest) >= 1)){ ?>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="heading_tab_header">
                                <div class="heading_s2">
                                    <h4>Dành Cho Bạn</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5" data-nav="true" data-dots="false"  data-margin="20" data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "640":{"items": "2"}, "991":{"items": "1"}}'>
                                <div class="item">
                                        <?php foreach ($suggest as $key => $value): ?>
                                            <div class="product_wrap">
                                                <div class="product_img">
                                                    <a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>">
                                                        <img style="height: 161px;" src="<?php echo $value['AnhChinh']; ?>" alt="el_img2">
                                                        <img style="height: 161px;" class="product_hover_img" src="<?php echo explode('#', $value['HinhAnh'])[0]; ?>" alt="el_hover_img2">
                                                    </a>
                                                </div>
                                                <div class="product_info">
                                                    <h6 class="product_title"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>"><?php echo $value['TenSanPham']; ?></a></h6>
                                                    <div class="product_price">
                                                        <span class="price"><?php echo number_format($value['GiaBan']); ?></span>
                                                        <del><?php echo number_format($value['GiaGoc']); ?></del>
                                                        <?php if($value['GiaGoc'] != $value['GiaBan']){ ?>
                                                            <?php $phan_tram_khuyen_mai = ($value['GiaGoc'] - $value['GiaBan']) / $value['GiaGoc'] * 100; ?>
                                                            <div class="on_sale">
                                                                <span>Giảm <?php echo round($phan_tram_khuyen_mai, 0); ?>%</span>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:100%"></div>
                                                        </div>
                                                        <span class="rating_num"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($key == 2){ break; } ?>
                                        <?php endforeach ?>
                                    </div>

                                    <?php if(count($suggest) >= 4){ ?>
                                        <div class="item">
                                            <?php foreach ($suggest as $key => $value): ?>
                                                <?php if(($key >= 3) && ($key <= 5)){ ?>
                                                    <div class="product_wrap">
                                                        <div class="product_img">
                                                            <a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>">
                                                                <img style="height: 161px;" src="<?php echo $value['AnhChinh']; ?>" alt="el_img2">
                                                                <img style="height: 161px;" class="product_hover_img" src="<?php echo explode('#', $value['HinhAnh'])[0]; ?>" alt="el_hover_img2">
                                                            </a>
                                                        </div>
                                                        <div class="product_info">
                                                            <h6 class="product_title"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>"><?php echo $value['TenSanPham']; ?></a></h6>
                                                            <div class="product_price">
                                                                <span class="price"><?php echo number_format($value['GiaBan']); ?></span>
                                                                <del><?php echo number_format($value['GiaGoc']); ?></del>
                                                                <?php if($value['GiaGoc'] != $value['GiaBan']){ ?>
                                                                    <?php $phan_tram_khuyen_mai = ($value['GiaGoc'] - $value['GiaBan']) / $value['GiaGoc'] * 100; ?>
                                                                    <div class="on_sale">
                                                                        <span>Giảm <?php echo round($phan_tram_khuyen_mai, 0); ?>%</span>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="rating_wrap">
                                                                <div class="rating">
                                                                    <div class="product_rate" style="width:100%"></div>
                                                                </div>
                                                                <span class="rating_num"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }else{ ?>
                                                    <?php continue; ?>
                                                <?php } ?>
                                            <?php endforeach ?>
                                        </div>
                                    <?php } ?>

                                    <?php if(count($suggest) >= 6){ ?>
                                        <div class="item">
                                            <?php foreach ($suggest as $key => $value): ?>
                                                <?php if($key >= 6){ ?>
                                                    <div class="product_wrap">
                                                        <div class="product_img">
                                                            <a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>">
                                                                <img style="height: 161px;" src="<?php echo $value['AnhChinh']; ?>" alt="el_img2">
                                                                <img style="height: 161px;" class="product_hover_img" src="<?php echo explode('#', $value['HinhAnh'])[0]; ?>" alt="el_hover_img2">
                                                            </a>
                                                        </div>
                                                        <div class="product_info">
                                                            <h6 class="product_title"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>"><?php echo $value['TenSanPham']; ?></a></h6>
                                                            <div class="product_price">
                                                                <span class="price"><?php echo number_format($value['GiaBan']); ?></span>
                                                                <del><?php echo number_format($value['GiaGoc']); ?></del>
                                                                <?php if($value['GiaGoc'] != $value['GiaBan']){ ?>
                                                                    <?php $phan_tram_khuyen_mai = ($value['GiaGoc'] - $value['GiaBan']) / $value['GiaGoc'] * 100; ?>
                                                                    <div class="on_sale">
                                                                        <span>Giảm <?php echo round($phan_tram_khuyen_mai, 0); ?>%</span>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="rating_wrap">
                                                                <div class="rating">
                                                                    <div class="product_rate" style="width:100%"></div>
                                                                </div>
                                                                <span class="rating_num"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }else{ ?>
                                                    <?php continue; ?>
                                                <?php } ?>
                                            <?php endforeach ?>
                                        </div>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<?php require(APPPATH.'views/web/layouts/footer.php'); ?>

<style type="text/css">
    #Description img{
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $(".add-to-cart").click(function(e){
            e.preventDefault()
            var masanpham = $(this).attr("value");
            let urlThem = "<?php echo base_url('gio-hang/them/') ?>" + masanpham + "/" + "1";

            $.get(urlThem, function(data){
                var cart = JSON.parse(data);
                $(".cart_count").text(cart.numberCart)
                $(".price_symbole").text(cart.sumCart + "đ")

                $('.cart_list').empty();
                var cartList = cart.cart;

                for (const key in cartList) {
                    if (cartList.hasOwnProperty(key)) {
                        const item = cartList[key];
                        var formatter = new Intl.NumberFormat('en-US');
                        var price = formatter.format(item.price);
                        $('.cart_list').append('<li> <a href="<?php echo base_url('san-pham/') ?>'+item.slug+'/"><img src="'+item.image+'" style="height: 80px">'+item.name+'</a> <span class="cart_quantity"> '+item.number+' x <span class="cart_amount"> <span class="price_symbole"></span></span>'+price+'đ</span> </li>');
                    }
                }
            })

        });
    });
</script>


<?php if($detail[0]['SoLuong'] >= 1){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".btn-addtocart").click(function(e){
                e.preventDefault()
                var soluong = $(".qty").val();
                var soluongsanpham = '<?php echo $detail[0]['SoLuong'] ?>';

                if(parseInt(soluong) > soluongsanpham){
                    $('.error').html("<br>Số lượng thêm không được quá " + soluongsanpham + " sản phẩm!<br><br>")
                }else{
                    $('.error').html("")

                    var masanpham = "<?php echo $detail[0]['MaSanPham']; ?>";
                    
                    let urlThem = "<?php echo base_url('gio-hang/them/') ?>" + masanpham + "/" + soluong;

                    $.get(urlThem, function(data){
                        var cart = JSON.parse(data);
                        $(".cart_count").text(cart.numberCart)
                        $(".price_symbole").text(cart.sumCart + "đ")

                        $('.cart_list').empty();
                        var cartList = cart.cart;

                        for (const key in cartList) {
                            if (cartList.hasOwnProperty(key)) {
                                const item = cartList[key];
                                var formatter = new Intl.NumberFormat('en-US');
                                var price = formatter.format(item.price);
                                $('.cart_list').append('<li> <a href="<?php echo base_url('san-pham/') ?>'+item.slug+'/"><img src="'+item.image+'" style="height: 80px">'+item.name+'</a> <span class="cart_quantity"> '+item.number+' x <span class="cart_amount"> <span class="price_symbole"></span></span>'+price+'đ</span> </li>');
                            }
                        }
                    })
                }

            });
        });
    </script>
<?php } ?>
