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
        <form class="row" method="post">
            <div class="col-md-6">
                <div class="heading_s1">
                    <h4>Thông Tin Thanh Toán</h4>
                </div>
                <div class="form-group mb-3">
                    <input type="text" required="" class="form-control" name="hoten" placeholder="Họ tên *" value="<?php echo $_SESSION['hoten']; ?>" disabled>
                </div>
                <div class="form-group mb-3">
                    <input type="text" required="" class="form-control" name="sodienthoai" value="<?php echo $_SESSION['sodienthoai']; ?>" placeholder="Số điện thoại *" disabled>
                </div>
                <div class="form-group mb-3">
                    <input class="form-control" required="" type="email" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="Email *" disabled>
                </div>
                <hr>
                <div class="form-group mb-3">
                    <label class="label mb-2">Chọn Tỉnh / Thành Phố</label>
                    <select class="form-control" id="tinh" name="tinh" required>
                        <option value="">Chọn Tỉnh / Thành Phố *</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="label mb-2">Chọn Quận / Huyện</label>
                    <select class="form-control" id="huyen" name="huyen" required>
                        <option value="">Chọn Quận / Huyện *</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="label mb-2">Chọn Xã / Phường</label>
                    <select class="form-control" id="xa" name="xa" required>
                        <option value="">Chọn Xã / Phường *</option>
                    </select>
                </div>
                <input type="hidden" name="tinhhuyenxa" class="tinhhuyenxa">
                <div class="form-group mb-3">
                    <label class="label mb-2">Địa chỉ nhận hàng</label>
                    <input class="form-control diachi" required="" type="text" name="diachi" placeholder="Địa chỉ nhận hàng *">
                </div>
            </div>
            <div class="col-md-6">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4>Thông Tin Đơn Hàng</h4>
                    </div>
                    <div class="table-responsive order_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sản Phẩm</th>
                                    <th>Thành Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $tongtien = 0; ?>
                                <?php foreach($list as $key => $value): ?>
                                    <tr>
                                        <td><?php echo $value['name']; ?> <span class="product-qty">x <?php echo $value['number']; ?></span></td>
                                        <td><?php echo number_format($value['price'] * $value['number']); ?>đ</td>
                                    </tr>
                                    <?php $tongtien += $value['number'] * $value['price']; ?>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tạm Tính</th>
                                    <td class="product-subtotal"><?php echo number_format($tongtien); ?>đ</td>
                                </tr>
                                <tr>
                                    <th>Phí Giao Hàng</th>
                                    <td>
                                        <?php $phiship = 0; ?>
                                        <?php if($tongtien >= $config[0]['MienPhiShip']){ ?>
                                            + <?php echo $phiship; ?>đ
                                        <?php }else{ ?>
                                            + <?php 
                                                $phiship = $config[0]['PhiShip']; 
                                                echo number_format($config[0]['PhiShip'])
                                            ?>đ
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Giảm Giá</th>
                                    <td>
                                        <?php if(!isset($_SESSION['saleCode'])){ ?>
                                            - 0đ
                                        <?php }else{ ?>
                                            - <?php echo number_format($_SESSION['saleCode']) ?>đ
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tổng Tiền</th>
                                    <td class="product-subtotal"><?php echo number_format($_SESSION['sumCart'] + $phiship) ?>đ</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="heading_s1">
                            <h4>Thanh Toán</h4>
                        </div>
                        <div class="payment_option">
                            <div class="custome-radio nhanhang">
                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" value="option3" checked="">
                                <label class="form-check-label" for="exampleRadios3">Trả Tiền Mặt</label>
                                <p data-method="option3" class="payment-text">Bạn sẽ thanh toán trực tiếp khi nhận được sản phẩm. </p>
                            </div>
                            <div class="custome-radio chuyenkhoan">
                                <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios4" value="option4">
                                <label class="form-check-label" for="exampleRadios4">Chuyển Khoản</label>
                                <p data-method="option4" class="payment-text payment-text1"></p>
                                <div class="maqr"></div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="thanhtoan" name="thanhtoan" value="0">
                    <button type="submit" class="btn btn-fill-out btn-block btn-dathang">Đặt Hàng</button>
                </div>
            </div>
        </form>
    </div>
</div>
<style type="text/css">
    .form-control:disabled, .form-control[readonly] {
        background-color: white;
        cursor: not-allowed;
    }
</style>
<?php require(APPPATH.'views/web/layouts/footer.php'); ?>


<script type="text/javascript">
    $(document).ready(function(){
        $(".chuyenkhoan").click(function(e){
            $(".maqr").html('<img src="https://api.vietqr.io/image/<?php echo $config[0]['NganHang']; ?>-<?php echo $config[0]['SoTaiKhoan']; ?>-fTpTJka.jpg?accountName=<?php echo $config[0]['ChuTaiKhoan']; ?>&amp;amount=<?php echo $_SESSION['sumCart'] + $phiship ?>&amp;addInfo=<?php echo $_SESSION['noidung']; ?>">');
            $(".thanhtoan").val(2);
            $(".btn-dathang").hide();
            
            let intervalId = setInterval(function(){
                let tinhhuyenxa = $(".tinhhuyenxa").val();
                let diachi = $(".diachi").val();

                if(tinhhuyenxa == ""){
                    $(".payment-text1").html('<span style="color: red;">Vui lòng nhập đủ thông tin giao hàng trước khi chuyển khoản!</span>')
                }else{
                    let url_check_bank = '<?php echo base_url('thanh-toan/chuyen-khoan/'); ?>';
                    $.post(url_check_bank, { tinhhuyenxa, diachi }, function(data){
                        if(!isNaN(data)){
                            window.location.href = '<?php echo base_url('thanh-toan/thanh-cong/?madonhang='); ?>' + data
                        }
                    });
                }

            }, 3000);
        });

        $(".nhanhang").click(function(e){
            $(".maqr").empty();
            $(".thanhtoan").val(0);
            $(".btn-dathang").show();
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        let selectedTinhName = '';
        let selectedHuyenName = '';
        let selectedXaName = '';

        // Lấy danh sách tỉnh
        function loadTinh() {
            $.ajax({
                url: 'https://vapi.vnappmob.com/api/v2/province/', // API lấy danh sách tỉnh
                method: 'GET',
                success: function (data) {
                    $('#tinh').html('<option value="">Chọn Tỉnh / Thành Phố *</option>');
                    data.results.forEach(function (item) {
                        $('#tinh').append('<option value="' + item.province_id + '" data-name="' + item.province_name + '">' + item.province_name + '</option>');
                    });
                },
                error: function () {
                    alert('Không thể lấy danh sách tỉnh');
                }
            });
        }

        // Khi người dùng chọn tỉnh
        $('#tinh').on('change', function () {
            var tinhCode = $(this).val();
            selectedTinhName = $('#tinh option:selected').data('name'); // Lấy tên tỉnh
            if (tinhCode) {
                $.ajax({
                    url: 'https://vapi.vnappmob.com/api/v2/province/district/' + tinhCode, // API lấy danh sách huyện theo tỉnh
                    method: 'GET',
                    success: function (data) {
                        $('#huyen').html('<option value="">Chọn Quận / Huyện *</option>');
                        $('#xa').html('<option value="">Chọn Xã / Phường *</option>'); // Xóa danh sách xã khi thay đổi huyện
                        data.results.forEach(function (item) {
                            $('#huyen').append('<option value="' + item.district_id + '" data-name="' + item.district_name + '">' + item.district_name + '</option>');
                        });
                    },
                    error: function () {
                        alert('Không thể lấy danh sách huyện');
                    }
                });
            } else {
                $('#huyen').html('<option value="">Chọn Quận / Huyện *</option>');
                $('#xa').html('<option value="">Chọn Xã / Phường *</option>');
            }
        });

        // Khi người dùng chọn huyện
        $('#huyen').on('change', function () {
            var huyenCode = $(this).val();
            selectedHuyenName = $('#huyen option:selected').data('name'); // Lấy tên huyện
            if (huyenCode) {
                $.ajax({
                    url: 'https://vapi.vnappmob.com/api/v2/province/ward/' + huyenCode, // API lấy danh sách xã theo huyện
                    method: 'GET',
                    success: function (data) {
                        $('#xa').html('<option value="">Chọn Xã / Phường *</option>');
                        data.results.forEach(function (item) {
                            $('#xa').append('<option value="' + item.ward_id + '" data-name="' + item.ward_name + '">' + item.ward_name + '</option>');
                        });
                    },
                    error: function () {
                        alert('Không thể lấy danh sách xã');
                    }
                });
            } else {
                $('#xa').html('<option value="">Chọn Xã / Phường *</option>');
            }
        });

        // Khi người dùng chọn xã
        $('#xa').on('change', function () {
            selectedXaName = $('#xa option:selected').data('name'); // Lấy tên xã
            $(".tinhhuyenxa").val(selectedXaName + ", " + selectedHuyenName + ", " + selectedTinhName);
            $(".payment-text1").html("Quyét QR chuyển khoản bên dưới hệ thống sẽ tự động xác nhận thanh toán.");
        });

        // Load tỉnh khi trang được mở
        loadTinh();
    });
</script>
