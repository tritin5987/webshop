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
<!-- jquery-ui --> 
<script src="<?php echo base_url('public/web/') ?>assets/js/jquery-ui.js"></script>
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

