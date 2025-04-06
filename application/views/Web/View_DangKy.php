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
                    <li class="breadcrumb-item active"><?php echo $title; ?></li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Đăng Ký</h3>
                        </div>
                        <form method="post">
                            <?php if(isset($error)){ ?>
                                <p class="text-center" style="color: #ff324d;"><?php echo $error; ?></p>
                            <?php } ?>
                            <div class="different_login">
                                <span> Thông Tin Cá Nhân</span>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" required class="form-control" name="hoten" placeholder="Họ tên">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" required class="form-control" name="sodienthoai" placeholder="Số điện thoại">
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" required class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" required class="form-control" name="diachi" placeholder="Địa chỉ">
                            </div>
                            <div class="different_login">
                                <span> Tài Khoản Đăng Nhập</span>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" required class="form-control" name="taikhoan" placeholder="Tài khoản">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" required type="password" name="matkhau" placeholder="Mật khẩu">
                            </div>
                            <div class="login_footer form-group mb-3">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" id="exampleCheckbox1" value="" required>
                                        <label class="form-check-label" for="exampleCheckbox1"><span>Đồng ý với điều khoản & dịch vụ?</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">Đăng Ký</button>
                            </div>
                        </form>
                        <div class="different_login">
                            <span> hoặc</span>
                        </div>
                        <div class="form-note text-center">Đã có tài khoản? <a href="<?php echo base_url('dang-nhap/'); ?>">Đăng Nhập</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require(APPPATH.'views/web/layouts/footer.php'); ?>
