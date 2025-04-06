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
                    <li class="breadcrumb-item"><a href="<?php echo base_url('khach-hang/'); ?>">Khách Hàng</a></li>
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
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hình Ảnh</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Giá Bán</th>
                                    <th>Số Lượng</th>
                                    <th>Đơn Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $tongtien = 0; ?>
                                <?php foreach ($list as $key => $value): ?>
                                  <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td class="not_print">
                                      <img style="width: 100px; height: 100px;" src="<?php echo $value['HinhAnh'] ?>">
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>"><?php echo $value['TenSanPham']; ?></a>
                                    </td>
                                    <td><?php echo number_format($value['GiaBan']); ?> VND</td>
                                    <td>
                                      <?php echo $value['SoLuong']; ?> sản phẩm
                                    </td>
                                    <td>
                                      <?php echo number_format($value['SoLuong'] * $value['GiaBan']); ?> VND
                                    </td>
                                  </tr>
                                  <?php $tongtien += $value['SoLuong'] * $value['GiaBan']; ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="text-right mt-2 d-flex justify-content-end mr-4" style="font-family: roboto; color: black;">
                          <span class="d-flex m-1">
                              <b>Tạm Tính: </b>
                              <p style="margin-left: 5px;"><?php echo number_format($tongtien) ?> VND</p>
                          </span>
                          <span class="d-flex m-1">
                              <b>Phí Giao Hàng: </b>
                              <p style="margin-left: 5px;">
                                <?php 
                                  if($tongtien >= $config[0]['MienPhiShip']){
                                    echo 0;
                                  }else{
                                    echo number_format($config[0]['PhiShip']) ;
                                  }
                                ?> 
                              VND</p>
                          </span>
                          <span class="d-flex m-1">
                              <b>Giảm Giá: </b>
                              <p style="margin-left: 5px;"><?php echo number_format($detail[0]['GiaTriGiam']) ?> VND</p>
                          </span>
                          <span class="d-flex m-1">
                              <b>Tổng Tiền: </b>
                              <p style="margin-left: 5px;"><?php echo number_format($detail[0]['TongTien']) ?> VND</p>
                          </span>
                          <span class="d-flex m-1">
                              <b>Thanh Toán: </b>
                              <p style="margin-left: 5px;"><?php echo $detail[0]['ThanhToan'] == 2 ? "Chuyển Khoản" : "Tiền Mặt" ?></p>
                          </span>
                        </div>
                        <a class="btn btn-dark btn-sm" href="<?php echo base_url('khach-hang/'); ?>">Quay Lại</a>

                        <?php if(($detail[0]['TrangThai'] != 3) && ($detail[0]['TrangThai'] != 4) && ($detail[0]['TrangThai'] != 0)){ ?>
                            <a class="btn btn-fill-out btn-sm" href="<?php echo base_url('khach-hang/don-hang/'.$detail[0]['MaHoaDon'].'/huy/'); ?>">Hủy Đơn</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require(APPPATH.'views/web/layouts/footer.php'); ?>
