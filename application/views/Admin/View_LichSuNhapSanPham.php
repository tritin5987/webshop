<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Sản Phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/san-pham/'); ?>">Quản Lý Sản Phẩm</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/san-pham/'); ?>">Lịch Sử Nhập</a></li>
              <li class="breadcrumb-item active"><?php echo $list[0]['TenSanPham']; ?></li>
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
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tên Sản Phẩm</th>
                      <th>Mã Nhân Viên</th>
                      <th>Số Lượng Cũ</th>
                      <th>Số Lượng Nhập</th>
                      <th>Thời Gian</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php foreach ($list as $key => $value): ?>
	                    <tr>
	                      <td><?php echo $key + 1; ?></td>
	                      <td><?php echo $value['TenSanPham']; ?></td>
                        <td><?php echo $value['HoTen']; ?></td>
                        <td><?php echo $value['SoLuongCu']; ?> sản phẩm</td>
                        <td><?php echo $value['SoLuongMoi']; ?> sản phẩm</td>
                        <td><?php echo $value['ThoiGian']; ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
                <a class="btn btn-success" href="<?php echo base_url('admin/san-pham/'); ?>">Quay Lại</a>
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
