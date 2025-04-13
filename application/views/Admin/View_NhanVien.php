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
              <li class="breadcrumb-item active">Quản Lý Nhân Viên</li>
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
                <form class="w-100 d-flex">
                  <div class="col-md-3">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm">
                  </div>
                  <button class="btn btn-primary">Tìm Kiếm</button>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Họ Tên</th>
                      <th>Tài Khoản</th>
                      <th>Email</th>
                      <th>Số Điện Thoại</th>
                      <th>Phân Quyền</th>
                      <th>Trạng Thái</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($list as $key => $value): ?>
                      <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $value['HoTen']; ?></td>
                        <td><?php echo $value['TaiKhoan']; ?></td>
                        <td><?php echo $value['Email']; ?></td>
                        <td><?php echo $value['SoDienThoai']; ?></td>
                        <td><?php echo $value['PhanQuyen'] == 1 ? 'Quản Trị' : 'Nhân Viên'; ?></td>
                        <td><?php echo $value['TrangThai'] == 1 ? 'Hoạt Động' : 'Ngừng'; ?></td>
                        <td>
                          <a href="<?php echo base_url('admin/nhan-vien/'.$value['MaNhanVien'].'/sua/'); ?>" class="btn btn-primary" style="color: white;">
                            <i class="fas fa-edit"></i>
                            <span>SỬA</span>
                          </a>
                          <a href="<?php echo base_url('admin/nhan-vien/'.$value['MaNhanVien'].'/xoa/'); ?>" class="btn btn-danger" style="color: white;">
                            <i class="fas fa-trash"></i>
                            <span>XÓA</span>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                    <li class="page-item"><a class="page-link" href="<?php echo base_url('admin/nhan-vien/'.$i.'/trang/') ?>"><?php echo $i; ?></a></li>
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
