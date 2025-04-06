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
                            <h3>Đăng Nhập</h3>
                        </div>
                        <form method="post">
                            <?php if(isset($error)){ ?>
                                <p class="text-center" style="color: #ff324d;"><?php echo $error; ?></p>
                            <?php } ?>
                            <?php if(isset($_SESSION['redirect'])){ ?>
                                <p class="text-center" style="color: #ff324d;"><?php echo $_SESSION['redirect']; ?></p>
                            <?php } ?>
                            <div class="form-group mb-3">
                                <input type="text" required class="form-control" name="taikhoan" placeholder="Tài khoản">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" required type="password" name="matkhau" placeholder="Mật khẩu">
                            </div>
                            <div class="login_footer form-group mb-3">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                        <label class="form-check-label" for="exampleCheckbox1"><span>Nhớ mật khẩu</span></label>
                                    </div>
                                </div>
                                <a href="#">Quên mật khẩu?</a>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">Đăng Nhập</button>
                            </div>
                        </form>
                        <div class="different_login">
                            <span> hoặc</span>
                        </div>
                        <div class="form-note text-center">Chưa có tài khoản? <a href="<?php echo base_url('dang-ky/'); ?>">Đăng Ký</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require(APPPATH.'views/web/layouts/footer.php'); ?>
