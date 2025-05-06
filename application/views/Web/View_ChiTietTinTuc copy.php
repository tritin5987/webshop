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
                    <li class="breadcrumb-item"><a href="<?php echo base_url('tin-tuc/'); ?>">Tin Tức</a></li>
                    <li class="breadcrumb-item active"><?php echo $title; ?></li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<div class="section">
	<div class="container">
    	<div class="row">
        	<div class="col-xl-9">
            	<div class="single_post">
                	<h2 class="blog_title"><?php echo $detail[0]['TieuDe']; ?></h2>
                    <ul class="list_none blog_meta">
                        <li><a href="#"><i class="ti-calendar"></i> <?php echo date("d-m-Y", strtotime($detail[0]['ThoiGian'])); ?></a></li>
                        <li><a href="#"><i class="ti-user"></i> <?php echo $detail[0]['HoTen']; ?></a></li>
                    </ul>
                    <div class="blog_img">
                        <img src="<?php echo $detail[0]['HinhAnh']; ?>" alt="<?php echo $detail[0]['TieuDe']; ?>">
                    </div>
                    <div class="blog_content">
                        <div class="blog_text">
                        	<?php echo $detail[0]['NoiDung']; ?>
                        </div>
                    </div>
                </div>
                <div class="blog_post_footer">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-8 mb-3 mb-md-0">
                            <div class="tags">
                            	<?php foreach (explode(",", $detail[0]['The']) as $key => $value): ?>
                            		<a href="#"><?php echo $value; ?></a>
                            	<?php endforeach ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="social_icons  text-md-end">
                                <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#" class="sc_google"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
				<div class="card post_author">

                </div>
                <div class="related_post">
                	<div class="content_title">
                    	<h5>Tin Tức Liên Quan</h5>
                    </div>
                    <div class="row">

                    	<?php foreach ($related as $key => $value): ?>
                    		<div class="col-md-6">
	                            <div class="blog_post blog_style2 box_shadow1">
	                                <div class="blog_img">
	                                    <a href="<?php echo base_url('tin-tuc/'.$value['DuongDan'].'/') ?>">
	                                        <img style="height: 269px;" src="<?php echo $value['HinhAnh']; ?>" alt="<?php echo $value['TieuDe']; ?>">
	                                    </a>
	                                </div>
	                                <div class="blog_content bg-white">
	                                    <div class="blog_text">
	                                        <h5 class="blog_title"><a href="<?php echo base_url('tin-tuc/'.$value['DuongDan'].'/') ?>"><?php echo $value['TieuDe']; ?></a></h5>
	                                        <ul class="list_none blog_meta">
	                                            <li><a href="#"><i class="ti-calendar"></i> <?php echo date("d-m-Y", strtotime($value['ThoiGian'])); ?></a></li>
	                                            <li><a href="#"><i class="ti-user"></i> <?php echo $value['HoTen']; ?></a></li>
	                                        </ul>
	                                        <p><?php echo substr(strip_tags($value['NoiDung']), 0, 140); ?> ...</p>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>       
                    	<?php endforeach ?>
                                     

                	</div>
                </div>
            </div>
        	<div class="col-xl-3 order-xl-first mt-4 pt-2 mt-xl-0 pt-xl-0">
            	<div class="sidebar">
                    <div class="widget">
                        <h5 class="widget_title">Tìm Kiếm</h5>
                        <div class="search_form">
                            <form action="<?php echo base_url('tin-tuc/') ?>"> 
                                <input required class="form-control" name="s" placeholder="Nhập tiêu đề tin tức..." type="text">
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
                        <h5 class="widget_title">Tin Tức Mới</h5>
                        <ul class="widget_recent_post">
                            <?php foreach ($new as $key => $value): ?>
                                <?php if($key >= 5){ break; } ?>
                                <li>
	                                <div class="post_footer">
	                                    <div class="post_img">
	                                        <a href="<?php echo base_url('tin-tuc/'.$value['DuongDan'].'/'); ?>"><img style="width: 100px; height: 100px;" src="<?php echo $value['HinhAnh']; ?>"></a>
	                                    </div>
	                                    <div class="post_content">
	                                        <h6><a href="<?php echo base_url('tin-tuc/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TieuDe']; ?></a></h6>
	                                        <p class="small m-0"><i class="ti-calendar"></i> <?php echo date("d-m-Y", strtotime($value['ThoiGian'])); ?></p>
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
<?php require(APPPATH.'views/web/layouts/footer.php'); ?>
<style type="text/css">
	.blog_text img{
		display: block;
        margin-left: auto;
        margin-right: auto;
        width: 100%;
        height: 100%;
	}
</style>