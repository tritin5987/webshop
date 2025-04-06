<?php require(APPPATH.'views/web/layouts/header.php'); ?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>
                        <?php echo $title; ?>
                    </h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('gio-hang/'); ?>">Giỏ Hàng</a></li>
                    <li class="breadcrumb-item active">
                        <?php echo $title; ?>
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center order_complete">
                    <i class="fas fa-check-circle"></i>
                    <div class="heading_s1">
                    <?php if(isset($_GET['madonhang'])){ ?>
                        <h3>Thanh toán thành công!</h3>
                    <?php }else{ ?>
                        <h3>Đặt hàng thành công!</h3>
                    <?php } ?>
                    </div>
                    <p>Cảm ơn bạn đã đặt hàng! Chúng tôi đã tiếp nhận đơn hàng của bạn, đơn hàng sẽ được xử lý sớm nhất, vui lòng kiểm tra trạng thái đơn hàng tại trang <a href="<?php echo base_url('khach-hang/'); ?>">khách hàng!</a></p>
                    <a href="<?php echo base_url('khach-hang/don-hang/'.$madonhang.'/xem/'); ?>" class="btn btn-fill-out">Xem Đơn Hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require(APPPATH.'views/web/layouts/footer.php'); ?>
