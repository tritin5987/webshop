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
                    <li class="breadcrumb-item"><a href="<?php echo base_url('chuyen-muc/'); ?>">Chuyên Mục</a></li>
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
        	<?php foreach ($list as $key => $value): ?>
	            <div class="col-lg-4 col-md-6">
	                <div class="blog_post blog_style2 box_shadow1">
	                    <div class="blog_img">
	                        <a href="<?php echo base_url('chuyen-muc/'.$value['DuongDanChuyenMuc'].'/'); ?>">
	                            <img style="height: 237px" src="<?php echo $value['HinhAnhChuyenMuc']; ?>">
	                        </a>
	                    </div>
	                    <div class="blog_content bg-white">
	                        <div class="blog_text">
	                            <h5 class="blog_title"><a href="<?php echo base_url('chuyen-muc/'.$value['DuongDanChuyenMuc'].'/'); ?>"><?php echo $value['TenChuyenMuc']; ?></a></h5>
	                            <ul class="list_none blog_meta">
	                                <li><a href="#"><i class="linearicons-box"></i> <?php echo $value['SoLuongSanPham']; ?> sản phẩm</a></li>
	                            </ul>
	                            <hr>
								<a style="padding: 7px 20px; font-size: 14px;" href="<?php echo base_url('chuyen-muc/'.$value['DuongDanChuyenMuc'].'/'); ?>" class="btn btn-fill-line border-2 btn-xs rounded-0 w-100">XEM CHI TIẾT</a>							
							</div>
	                    </div>
	                </div>
	            </div>
            <?php endforeach ?>
        </div>
        <div class="row">
            <div class="col-12 mt-2 mt-md-4">
                <ul class="pagination pagination_style1 justify-content-center">
                    <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                        <li class="page-item"><a class="page-link" href="<?php echo base_url('chuyen-muc/trang/'.$i.'/') ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php require(APPPATH.'views/web/layouts/footer.php'); ?>
