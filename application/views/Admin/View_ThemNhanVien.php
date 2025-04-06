<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Nhân Viên</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/nhan-vien/'); ?>">Quản Lý Nhân Viên</a></li>
              <li class="breadcrumb-item active">Thêm Nhân Viên</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="hoten">Họ và Tên</label>
                    <input type="text" class="form-control" id="hoten" placeholder="Nhập họ và tên" name="hoten">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="taikhoan">Tài Khoản</label>
                    <input type="text" class="form-control" id="taikhoan" placeholder="Nhập tên tài khoản" name="taikhoan">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="matkhau">Mật Khẩu</label>
                    <input type="password" class="form-control" id="matkhau" placeholder="Nhập mật khẩu" name="matkhau">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="sodienthoai">Số Điện Thoại</label>
                    <input type="text" class="form-control" id="sodienthoai" placeholder="Nhập số điện thoại" name="sodienthoai">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phanquyen">Phân Quyền</label>
                    <select class="form-control" id="phanquyen" name="phanquyen">
                      <option value="admin">Admin</option>
                      <option value="staff">Nhân Viên</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="trangthai">Trạng Thái</label>
                    <select class="form-control" id="trangthai" name="trangthai">
                      <option value="active">Hoạt Động</option>
                      <option value="inactive">Không Hoạt Động</option>
                    </select>
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('admin/nhan-vien/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Thêm Nhân Viên</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
