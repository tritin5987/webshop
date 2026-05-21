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

<div class="section pb_70">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-map2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Địa Chỉ</span>
                        <p><?php echo $config[0]['DiaChi']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-envelope-open"></i>
                    </div>
                    <div class="contact_text">
                        <span>Email</span>
                        <a href="mailto:<?php echo $config[0]['Email']; ?>"><?php echo $config[0]['Email']; ?> </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-tablet2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Số Điện Thoại</span>
                        <p style="letter-spacing: 2px;"><?php echo $config[0]['SoDienThoai']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading_s1">
                    <h2>Gửi Liên Hệ</h2>
                </div>
                <?php if(isset($_SESSION['khachhang'])){ ?>
                    <p class="leads">Gửi thông tin liên hệ cho chúng tôi biết bạn cần chúng tôi hỗ trợ về việc gì trong cửa hàng?</p>
                <?php }else{ ?>
                    <p class="leads">Bạn chỉ được phép gửi liên hệ khi đã <a href="<?php echo base_url('dang-nhap/') ?>">đăng nhập!</a> </p>
                <?php } ?>
                <div class="field_form">
                    <form method="post">
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <?php if(isset($_SESSION['khachhang'])){ ?>
                                    <input required placeholder="Họ tên *" class="form-control" type="text" value="<?php echo $_SESSION['hoten']; ?>">
                                <?php }else{ ?>
                                    <input placeholder="Họ tên *" class="form-control" type="text">
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <?php if(isset($_SESSION['khachhang'])){ ?>
                                    <input required placeholder="Email *" class="form-control" type="email" value="<?php echo $_SESSION['email']; ?>">
                                <?php }else{ ?>
                                    <input placeholder="Email *" class="form-control" type="email">
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <?php if(isset($_SESSION['khachhang'])){ ?>
                                    <input required placeholder="Số điện thoại *" class="form-control" type="text" value="<?php echo $_SESSION['sodienthoai']; ?>">
                                <?php }else{ ?>
                                    <input placeholder="Số điện thoại *" class="form-control" type="text">
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <input placeholder="Tiêu đề *" class="form-control" name="tieude">
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <textarea placeholder="Nội dung *" id="description" class="form-control" name="noidung" rows="4"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-fill-out" >Gửi Liên Hệ</button>
                                <div class="col-md-12 mb-3">
                                    <?php if(isset($error)){ ?>
                                        <div id="alert-msg" class="alert-msg text-center" style="color: red;"><?php echo $error; ?></div>
                                    <?php } ?>

                                    <?php if(isset($success)){ ?>
                                        <div id="alert-msg" class="alert-msg text-center"><?php echo $success; ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            
                        </div>
                    </form>     
                </div>
            </div>
        </div>
    </div>
</div>
<?php require(APPPATH.'views/web/layouts/footer.php'); ?>
