<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="Anil z" name="author">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo $config[0]['MoTaWeb']; ?>">
<meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

<!-- SITE TITLE -->
<title><?php echo $title; ?></title>
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('public/web/'); ?>assets/images/favicon.png">
<!-- Animation CSS -->
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/animate.css">	
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/bootstrap/css/bootstrap.min.css">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
<!-- Icon Font CSS -->
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/all.min.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/themify-icons.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/linearicons.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/flaticon.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/simple-line-icons.css">
<!--- owl carousel CSS-->
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/owlcarousel/css/owl.theme.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/owlcarousel/css/owl.theme.default.min.css">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/magnific-popup.css">
<!-- Slick CSS -->
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/slick.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/slick-theme.css">
<!-- Style CSS -->
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/style.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/responsive.css">

</head>

<body>


<!-- START HEADER -->
<header class="header_wrap">
	<div class="top-header light_skin bg_dark d-none d-md-block">
        <div class="custom-container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                	<div class="header_topbar_info">
                    	<div class="download_wrap">
                            <span class="me-3">Miễn phí giao hàng với đơn hàng lớn hơn <?php echo number_format($config[0]['MienPhiShip']); ?> VND</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                	<div class="d-flex align-items-center justify-content-center justify-content-md-end">
                        <?php if(isset($_SESSION['khachhang'])){ ?>
                            <div class="header_offer">
                                <a href="<?php echo base_url('khach-hang/'); ?>" style="color: white;"><?php echo $_SESSION['hoten']; ?></a>
                            </div>
                            <div class="download_wrap">
                                <a href="<?php echo base_url('dang-xuat/'); ?>" style="color: white;">Đăng Xuất</a>
                            </div>
                        <?php }else{ ?>
                            <div class="header_offer">
                                <a href="<?php echo base_url('dang-nhap/'); ?>" style="color: white;">Đăng Nhập</a>
                            </div>
                            <div class="download_wrap">
                                <a href="<?php echo base_url('dang-ky/'); ?>" style="color: white;">Đăng Ký</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle-header dark_skin">
    	<div class="custom-container">
        	<div class="nav_block">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">
                    <img class="logo_light" src="<?php echo $config[0]['Logo'] ?>" alt="logo" />
                    <img class="logo_dark" src="<?php echo $config[0]['Logo'] ?>" alt="logo" />
                </a>
                <div class="product_search_form rounded_input">
                    <form action="<?php echo base_url('san-pham/') ?>">
                        <div class="input-group">
                            <input class="form-control" placeholder="Nhập tên sản phẩm ..." required="" name="s" type="text">
                            <button type="submit" class="search_btn3"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a href="#" class="nav-link"><i class="linearicons-heart"></i><span class="wishlist_count">0</span></a></li>

                    <li class="dropdown cart_dropdown">
                        <a class="nav-link cart_trigger" href="#" data-bs-toggle="dropdown">
                            <i class="linearicons-bag2"></i>
                            <span class="cart_count"><?php echo isset($_SESSION['numberCart']) ? $_SESSION['numberCart'] : 0; ?></span>
                        </a>
                        <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                <?php if(isset($_SESSION['cart'])){ ?>
                                    <?php foreach ($_SESSION['cart'] as $key => $value): ?>
                                        <li>
                                            <a href="<?php echo base_url('san-pham/'.$value['slug'].'/') ?>"><img src="<?php echo $value['image'] ?>" style="height: 80px"><?php echo $value['name']; ?></a>
                                            <span class="cart_quantity"> <?php echo $value['number']; ?> x <span class="cart_amount"> <span class="price_symbole"></span></span><?php echo number_format($value['price']); ?>đ</span>
                                        </li>
                                    <?php endforeach ?>
                                <?php } ?>
                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Tổng Tiền:</strong> <span class="cart_price"> </span><span class="price_symbole">
                                    <?php 
                                        if(isset($_SESSION['sumCart'])){ 
                                            if(isset($_SESSION['saleCode'])){
                                                echo number_format($_SESSION['sumCart'] + $_SESSION['saleCode']);
                                            }else{
                                                echo number_format($_SESSION['sumCart']);
                                            }
                                        }else{
                                            echo 0;
                                        }
                                    ?>đ
                                </span></p>
                                <p class="cart_buttons">
                                    <a href="<?php echo base_url('gio-hang/'); ?>" class="btn btn-fill-line view-cart">Giỏ Hàng</a>
                                    <?php if(isset($_SESSION['cart'])){ ?>
                                        <a href="<?php echo base_url('thanh-toan/'); ?>" class="btn btn-fill-out checkout">Thanh Toán</a>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase border-top border-bottom">
    	<div class="custom-container">
            <div class="row"> 
            	<div class="col-lg-3 col-md-4 col-sm-6 col-3">
                	<div class="categories_wrap">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#navCatContent" aria-expanded="false" class="categories_btn">
                            <i class="linearicons-menu"></i><span>Chuyên Mục </span>
                        </button>
                        <div id="navCatContent" class="nav_cat navbar collapse">
                            <ul> 
                                <?php foreach ($category as $key => $value): ?>
                                    <li>
                                        <a class="dropdown-item nav-link nav_item" href="<?php echo base_url('chuyen-muc/'.$value['DuongDan'].'/'); ?>">
                                            <img style="width: 30px; height: 30px;" src="<?php echo $value['HinhAnh']; ?>">
                                            <span style="color: black; font-family: system-ui; font-size:15px; margin-left: 10px;"><?php echo $value['TenChuyenMuc']; ?></span>
                                        </a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                	<nav class="navbar navbar-expand-lg">
                    	<button class="navbar-toggler side_navbar_toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSidetoggle" aria-expanded="false"> 
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="pr_search_icon">
                            <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
                        </div> 
                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
							<ul class="navbar-nav">
                                <li class="dropdown">
                                    <a class="nav-link" href="<?php echo base_url(); ?>" style="font-family: system-ui;"><i class="linearicons-home"></i> Trang Chủ</a>   
                                </li>
                                <li class="dropdown">
                                    <a class="nav-link" href="<?php echo base_url('san-pham/'); ?>" style="font-family: system-ui;"><i class="linearicons-box"></i> Sản Phẩm</a>   
                                </li>
                                <li class="dropdown">
                                    <a class="nav-link" href="<?php echo base_url('chuyen-muc/'); ?>" style="font-family: system-ui;"><i class="linearicons-layers"></i> Chuyên Mục</a>   
                                </li>
                                <li><a class="nav-link nav_item" href="<?php echo base_url('tin-tuc/'); ?>" style="font-family: system-ui;"><i class="linearicons-news"></i> Tin Tức</a></li> 
                                <li><a class="nav-link nav_item" href="<?php echo base_url('lien-he/'); ?>" style="font-family: system-ui;"><i class="linearicons-phone-wave"></i> Liên Hệ</a></li> 
                            </ul>
                        </div>
                        <div class="contact_phone contact_support">
                            <i class="linearicons-phone-wave"></i>
                            <span><?php echo $config[0]['SoDienThoai'] ?></span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER -->

<!-- START SECTION BANNER -->
<div class="mt-4 staggered-animation-wrap">
	<div class="custom-container">
    	<div class="row">
        	<div class="col-lg-9 offset-lg-3">
            	<div class="banner_section shop_el_slider">
                    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php if(count($slide) >= 1){ ?>
                                <a href="<?php echo base_url('chuyen-muc/'.$slide[0]['DuongDan'].'/') ?>" class="carousel-item active background_bg" data-img-src="<?php echo $slide[0]['HinhAnh'] ?>">
                                </a>
                            <?php } ?>

                            <?php if(count($slide) >= 2){ ?>
                                <a href="<?php echo base_url('chuyen-muc/'.$slide[1]['DuongDan'].'/') ?>" class="carousel-item background_bg" data-img-src="<?php echo $slide[1]['HinhAnh'] ?>">
                                </a>
                            <?php } ?>

                            <?php if(count($slide) >= 3){ ?>
                                <a href="<?php echo base_url('chuyen-muc/'.$slide[2]['DuongDan'].'/') ?>" class="carousel-item background_bg" data-img-src="<?php echo $slide[2]['HinhAnh'] ?>">
                                </a>
                            <?php } ?>
                        </div>
                        <ol class="carousel-indicators indicators_style3">
                            <?php if(count($slide) >= 1){ ?>
                                <li data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active"></li>
                            <?php } ?>
                            <?php if(count($slide) >= 2){ ?>
                                <li data-bs-target="#carouselExampleControls" data-bs-slide-to="1"></li>
                            <?php } ?>
                            <?php if(count($slide) >= 3){ ?>
                                <li data-bs-target="#carouselExampleControls" data-bs-slide-to="2"></li>
                            <?php } ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BANNER -->

<!-- END MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section small_pt pb-0">
	<div class="custom-container">
    	<div class="row">
            <?php if(count($banner1) >= 1){ ?>
                <div class="col-xl-3 d-none d-xl-block">
                    <div class="sale-banner">
                        <a class="hover_effect1" href="<?php echo base_url('chuyen-muc/'.$banner1[0]['DuongDan'].'/') ?>">
                            <img src="<?php echo $banner1[0]['HinhAnh']; ?>" style="width: 387px; height: 538px;">
                        </a>
                    </div>
                </div>
            <?php } ?>
        	
        	<div <?php echo count($banner1) >= 1 ? 'class="col-xl-9"' : 'class="col-xl-12"'?>>
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>Sản Phẩm Mới</h4>
                            </div>
                            <div class="view_all">
                                <a href="<?php echo base_url('san-pham/'); ?>" class="text_default"><i class="linearicons-power"></i> <span>Xem Tất Cả</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1"  data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                            <?php foreach ($new as $key => $value): ?>
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
                                            <?php if($value['SoLuong'] <= 0){ ?>
                                                <span>Tạm Hết Hàng</span>
                                            <?php }else{ ?>
                                                <span>Hiện Còn: <?php echo $value['SoLuong']; ?> Sản Phẩm</span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
        	</div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION BANNER --> 
<div class="section pb_20 small_pt">
	<div class="custom-container">
    	<div class="row">
            <?php if(count($banner2) >= 1){ ?>
                <div class="col-md-4">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="<?php echo base_url('chuyen-muc/'.$banner2[0]['DuongDan'].'/') ?>">
                            <img src="<?php echo $banner2[0]['HinhAnh']; ?>" alt="shop_banner_img7">
                        </a>
                    </div>
                </div>
            <?php } ?>

            <?php if(count($banner2) >= 2){ ?>
                <div class="col-md-4">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="<?php echo base_url('chuyen-muc/'.$banner2[1]['DuongDan'].'/') ?>">
                            <img src="<?php echo $banner2[1]['HinhAnh']; ?>" alt="shop_banner_img7">
                        </a>
                    </div>
                </div>
            <?php } ?>

            <?php if(count($banner2) >= 3){ ?>
                <div class="col-md-4">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="<?php echo base_url('chuyen-muc/'.$banner2[2]['DuongDan'].'/') ?>">
                            <img src="<?php echo $banner2[2]['HinhAnh']; ?>" alt="shop_banner_img7">
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- END SECTION BANNER --> 


<!-- START SECTION SHOP -->
<div class="section small_pt small_pb">
	<div class="custom-container">
    	<div class="row">
            <?php if(count($banner3) >= 1){ ?>
                <div class="col-xl-3 d-none d-xl-block">
                    <div class="sale-banner">
                        <a class="hover_effect1" href="<?php echo base_url('chuyen-muc/'.$banner3[0]['DuongDan'].'/') ?>">
                            <img src="<?php echo $banner3[0]['HinhAnh']; ?>" style="height: 538px;">
                        </a>
                    </div>
                </div>
            <?php } ?>

        	<div <?php echo count($banner1) >= 1 ? 'class="col-xl-9"' : 'class="col-xl-12"'?>>
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>Đang Khuyến Mãi</h4>
                            </div>
                            <div class="view_all">
                            	<a href="<?php echo base_url('san-pham/'); ?>" class="text_default"><i class="linearicons-power"></i> <span>Xem Tất Cả</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                            <?php foreach ($sale as $key => $value): ?>
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
                                            <?php if($value['SoLuong'] <= 0){ ?>
                                                <span>Tạm Hết Hàng</span>
                                            <?php }else{ ?>
                                                <span>Hiện Còn: <?php echo $value['SoLuong']; ?> Sản Phẩm</span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
        	</div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SHOP -->
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
<!-- END SECTION SHOP -->


</div>
<!-- END MAIN CONTENT -->

<!-- START FOOTER -->
<div class="middle_footer">
    <div class="custom-container">
        <div class="row">
            <div class="col-12">
                <div class="shopping_info">
                    <div class="row justify-content-center">
                        <div class="col-md-4">  
                            <div class="icon_box icon_box_style2">
                                <div class="icon">
                                    <i class="flaticon-shipped"></i>
                                </div>
                                <div class="icon_box_content">
                                    <h5>Giao Hàng Miễn Phí</h5>
                                    <p>Miễn phí giao hàng với đơn hàng từ <?php echo number_format($config[0]['MienPhiShip']); ?> VND</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="icon_box icon_box_style2">
                                <div class="icon">
                                    <i class="flaticon-money-back"></i>
                                </div>
                                <div class="icon_box_content">
                                    <h5>30 Ngày Hoàn Trả</h5>
                                    <p>Cho phép hoàn trả trong 30 ngày</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="icon_box icon_box_style2">
                                <div class="icon">
                                    <i class="flaticon-support"></i>
                                </div>
                                <div class="icon_box_content">
                                    <h5>Hỗ trợ 24/7</h5>
                                    <p>Luôn sẵn sàng hỗ trợ khách hàng mọi lúc</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer_dark">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget">
                        <div class="footer_logo">
                            <a href="<?php echo base_url(); ?>"><img style="width: 182px; height: 47px;" src="<?php echo $config[0]['Logo']; ?>" alt="logo"/></a>
                        </div>
                        <p><?php echo $config[0]['MoTaWeb']; ?></p>
                    </div>
                    <div class="widget">
                        <ul class="social_icons social_white">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Chức Năng</h6>
                        <ul class="widget_links">
                            <li><a href="<?php echo base_url('san-pham/'); ?>">Sản Phẩm</a></li>
                            <li><a href="<?php echo base_url('chuyen-muc/'); ?>">Chuyên Mục</a></li>
                            <li><a href="<?php echo base_url('tin-tuc/'); ?>">Tin Tức</a></li>
                            <li><a href="<?php echo base_url('gio-hang/'); ?>">Giỏ Hàng</a></li>
                            <li><a href="<?php echo base_url('lien-he/'); ?>">Liên Hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Chuyên Mục</h6>
                        <ul class="widget_links">
                            <?php foreach ($category as $key => $value): ?>
                                <?php if($key == 5){ break; } ?>
                                <li><a href="<?php echo base_url('chuyen-muc/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TenChuyenMuc']; ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Tài Khoản</h6>
                        <ul class="widget_links">
                            <li><a href="<?php echo base_url('khach-hang/'); ?>">Khách Hàng</a></li>
                            <li><a href="<?php echo base_url('khach-hang/'); ?>">Đơn Hàng</a></li>
                            <li><a href="<?php echo base_url('thanh-toan/'); ?>">Thanh Toán</a></li>
                            <li><a href="<?php echo base_url('dang-nhap/'); ?>">Đăng Nhập</a></li>
                            <li><a href="<?php echo base_url('dang-ky/'); ?>">Đăng Ký</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Thông Tin</h6>
                        <ul class="contact_info contact_info_light">
                            <li>
                                <i class="ti-location-pin"></i>
                                <p><?php echo $config[0]['DiaChi']; ?></p>
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                <a href="mailto:<?php echo $config[0]['Email']; ?>"><?php echo $config[0]['Email']; ?></a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <a href="tel:<?php echo $config[0]['SoDienThoai']; ?>" style="letter-spacing: 2px;"><?php echo $config[0]['SoDienThoai']; ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<script src="<?php echo base_url('public/web/') ?>assets/js/jquery-3.6.0.min.js"></script> 
<!-- popper min js -->
<script src="<?php echo base_url('public/web/') ?>assets/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap --> 
<script src="<?php echo base_url('public/web/') ?>assets/bootstrap/js/bootstrap.min.js"></script> 
<!-- owl-carousel min js  --> 
<script src="<?php echo base_url('public/web/') ?>assets/owlcarousel/js/owl.carousel.min.js"></script> 
<!-- magnific-popup min js  --> 
<script src="<?php echo base_url('public/web/') ?>assets/js/magnific-popup.min.js"></script> 
<!-- waypoints min js  --> 
<script src="<?php echo base_url('public/web/') ?>assets/js/waypoints.min.js"></script> 
<!-- parallax js  --> 
<script src="<?php echo base_url('public/web/') ?>assets/js/parallax.js"></script> 
<!-- countdown js  --> 
<script src="<?php echo base_url('public/web/') ?>assets/js/jquery.countdown.min.js"></script> 
<!-- imagesloaded js --> 
<script src="<?php echo base_url('public/web/') ?>assets/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js --> 
<script src="<?php echo base_url('public/web/') ?>assets/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="<?php echo base_url('public/web/') ?>assets/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="<?php echo base_url('public/web/') ?>assets/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="<?php echo base_url('public/web/') ?>assets/js/jquery.elevatezoom.js"></script>
<!-- scripts js --> 
<script src="<?php echo base_url('public/web/') ?>assets/js/scripts.js"></script>

</body>
</html>

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