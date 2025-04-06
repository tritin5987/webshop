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
                    <li class="breadcrumb-item active">Lỗi 404</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->



<!-- START 404 SECTION -->
<div class="section">
    <div class="error_wrap">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-10 order-lg-first">
                    <div class="text-center">
                        <div class="error_txt">404</div>
                        <h5 class="mb-2 mb-sm-3">Trang bạn cần tìm không tồn tại!</h5> 
                        <p>Chúng tôi không thể tìm thấy trang mà bạn yêu cầu, vui lòng thao tác lại hoặc quay về trang chủ!</p>

                        <a href="<?php echo base_url(); ?>" class="btn btn-fill-out">Về Trang Chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END 404 SECTION -->


<?php require(APPPATH.'views/web/layouts/footer.php'); ?>
