<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Hóa Đơn</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item active">Quản Lý Hóa Đơn</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <form class="row" method="POST" action="<?php echo base_url('admin/hoa-don/tim-kiem/') ?>"> 
                  <div class="col-sm-2">
                    <input type="text" name="madonhang" class="form-control" placeholder="Mã đơn hàng" value="<?php if(isset($post)) { echo $post['madonhang'];} ?>">
                  </div>
                  <div class="col-sm-2">
                    <select class="form-control" name="thanhtoan">
                      <option value="">Trạng Thái Thanh Toán</option>
                      <option value="-1" <?php if(isset($post) && ($post['thanhtoan'] == -1)) { echo "selected"; } ?>>Chưa Thanh Toán</option>
                      <option value="2" <?php if(isset($post) && ($post['thanhtoan'] == 2)) { echo "selected"; } ?>>Chuyển Khoản</option>
                      <option value="1" <?php if(isset($post) && ($post['thanhtoan'] == 1)) { echo "selected"; } ?>>Đã Thanh Toán</option>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <select class="form-control" name="trangthai">
                      <option value="">Trạng Thái Đơn Hàng</option>
                      <option value="-1" <?php if(isset($post) && ($post['trangthai'] == -1)) { echo "selected"; } ?>>Đã hủy đơn</option>
                      <option value="1" <?php if(isset($post) && ($post['trangthai'] == 1)) { echo "selected"; } ?>>Chờ duyệt đơn</option>
                      <option value="2" <?php if(isset($post) && ($post['trangthai'] == 2)) { echo "selected"; } ?>>Chuẩn bị hàng</option>
                      <option value="3" <?php if(isset($post) && ($post['trangthai'] == 3)) { echo "selected"; } ?>>Đã giao hàng</option>
                      <option value="4" <?php if(isset($post) && ($post['trangthai'] == 4)) { echo "selected"; } ?>>Đã hoàn tiền</option>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Lọc Đơn Hàng</button>
                  </div>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Mã Hóa Đơn</th>
                      <th>Số Lượng</th>
                      <th>Giảm Giá</th>
                      <th>Tổng Tiền</th>
                      <th>Thời Gian</th>
                      <th>Thanh Toán</th>
                      <th>Trạng Thái</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php foreach ($list as $key => $value): ?>
	                    <tr>
	                      <td>000<?php echo $value['MaHoaDon']; ?></td>
	                      <td>
	                      	<?php echo $value['SoLuong']; ?> sản phẩm
	                      </td>
                        <td>
                          Giảm <?php echo number_format($value['GiaTriGiam']); ?> VND
                        </td>
                        <td>
                          <?php echo number_format($value['TongTien']); ?> VND
                        </td>
                        <td>
                          <?php echo $value['ThoiGian']; ?>
                        </td>
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
	                      <td>
                          <a href="<?php echo base_url('admin/hoa-don/'.$value['MaHoaDon'].'/xem/'); ?>" class="btn btn-primary" style="color: white;">
                            <i class="fas fa-edit"></i>
                              <span>XỬ LÝ HÓA ĐƠN</span>
                            </a>
	                      </td>
	                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                	<?php for($i = 1; $i <= $totalPages; $i++){ ?>
                  		<li class="page-item"><a class="page-link" href="<?php echo base_url('admin/hoa-don/'.$i.'/trang/') ?>"><?php echo $i; ?></a></li>
                  	<?php } ?>      
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
