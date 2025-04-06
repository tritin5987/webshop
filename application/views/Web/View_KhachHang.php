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

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true"><i class="ti-layout-grid2"></i>Bảng Điều Khiển</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Quản Lý Đơn Hàng</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="false"><i class="ti-id-badge"></i>Cập Nhật Thông Tin</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('dang-xuat/') ?>"><i class="ti-lock"></i>Đăng Xuất</a>
                      </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">
                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Bảng Điều Khiển</h3>
                            </div>
                            <div class="card-body">
                                <p>Từ bảng điều khiển tài khoản của bạn, bạn có thể dễ dàng kiểm tra và xem các <a href="javascript:void(0);" onclick="$('#orders-tab').trigger('click')">đơn hàng gần đây của mình</a>, quản lý <a href="javascript:void(0);" onclick="$('#address-tab').trigger('click')">địa chỉ giao hàng và thanh toán</a> và <a href="javascript:void(0);" onclick="$('#account-detail-tab').trigger('click')">chỉnh sửa mật khẩu và chi tiết tài khoản của mình.</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Danh sách đơn hàng</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Mã ĐH</th>
                                                <th>Thời Gian</th>
                                                <th>Số Lượng</th>
                                                <th>Tổng Tiền</th>
                                                <th>Thanh Toán</th>
                                                <th>Trạng Thái</th>
                                                <th>Xem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($list as $key => $value): ?>
                                                <tr>
                                                    <td>000<?php echo $value['MaHoaDon'] ?></td>
                                                    <td><?php echo $value['ThoiGian'] ?></td>
                                                    <td><?php echo $value['SoLuong'] ?> sản phẩm</td>
                                                    <td><?php echo number_format($value['TongTien']); ?>đ</td>
                                                    <td>
                                                        <?php if($value['ThanhToan'] == 0){ ?>
                                                            Chưa thanh toán
                                                        <?php }else if($value['ThanhToan'] == 1){ ?>
                                                            Đã thanh toán
                                                        <?php }else if($value['ThanhToan'] == 2){ ?>
                                                            Chuyển khoản
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if($value['TrangThai'] == 0){ ?>
                                                            Đã hủy đơn
                                                        <?php }else if($value['TrangThai'] == 1){ ?>
                                                            Chờ duyệt đơn
                                                        <?php }else if($value['TrangThai'] == 2){ ?>
                                                            Chuẩn bị hàng
                                                        <?php }else if($value['TrangThai'] == 3){ ?>
                                                            Đã giao hàng
                                                        <?php }else if($value['TrangThai'] == 4){ ?>
                                                            Đã hoàn tiền
                                                        <?php } ?>
                                                    </td>
                                                    <td><a href="<?php echo base_url('khach-hang/don-hang/'.$value['MaHoaDon'].'/xem/'); ?>" class="btn btn-fill-out btn-sm">Xem</a></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Cập Nhật Thông Tin</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-3">
                                            <label>Họ Tên <span class="required">*</span></label>
                                            <input required="" class="form-control" name="hoten" type="text" placeholder="Họ tên *" value="<?php echo $_SESSION['hoten']; ?>">
                                        </div>
                                        <div class="form-group col-md-12 mb-3">
                                            <label>Số Điện Thoại <span class="required">*</span></label>
                                            <input required="" class="form-control" name="sodienthoai" placeholder="Số điện thoại *" value="<?php echo $_SESSION['sodienthoai']; ?>">
                                        </div>
                                        <div class="form-group col-md-12 mb-3">
                                            <label>Email <span class="required">*</span></label>
                                            <input type="email" class="form-control" name="email" placeholder="Email *" value="<?php echo $_SESSION['email']; ?>">
                                        </div>
                                        <div class="form-group col-md-12 mb-3">
                                            <label>Địa Chỉ<span class="required">*</span></label>
                                            <input required="" class="form-control" name="diachi" placeholder="Địa chỉ *" value="<?php echo $_SESSION['diachi']; ?>">
                                        </div>
                                        <hr>
                                        <div class="form-group col-md-12 mb-3">
                                            <label>Mật Khẩu Hiện Tại <span class="required">*</span></label>
                                            <input required="" class="form-control" name="matkhauhientai" type="password" placeholder="Mật khẩu hiện tại">
                                        </div>
                                        <div class="form-group col-md-12 mb-3">
                                            <label>Mật Khẩu Mới <span class="required">*</span></label>
                                            <input required="" class="form-control" name="matkhaumoi" type="password" placeholder="Mật khẩu mới">
                                        </div>
                                        <div class="form-group col-md-12 mb-3">
                                            <label>Xác Nhận Mật Khẩu <span class="required">*</span></label>
                                            <input required="" class="form-control" name="xacnhanmatkhau" type="password" placeholder="Xác nhận mật khẩu">
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-fill-out update-info" name="submit" value="Submit">Cập Nhật Thông Tin</button>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <p class="info"></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require(APPPATH.'views/web/layouts/footer.php'); ?>
<script>
$(document).ready(function(){
    $(".update-info").click(function(e){
        e.preventDefault();
        var hoten = $('input[name="hoten"]').val();
        var sodienthoai = $('input[name="sodienthoai"]').val();
        var email = $('input[name="email"]').val();
        var diachi = $('input[name="diachi"]').val();
        var matkhauhientai = $('input[name="matkhauhientai"]').val();
        var matkhaumoi = $('input[name="matkhaumoi"]').val();
        var xacnhanmatkhau = $('input[name="xacnhanmatkhau"]').val();

        $.post("<?php echo base_url('khach-hang/sua/'); ?>",
            {hoten,sodienthoai,email,diachi,matkhauhientai,matkhaumoi,xacnhanmatkhau},
            function(data){
                $('.info').html(data);
                $('input[name="matkhauhientai"]').val("");
                $('input[name="matkhaumoi"]').val("");
                $('input[name="xacnhanmatkhau"]').val("");
        });
    });
});
</script>