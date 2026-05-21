<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Khách Hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/khach-hang/'); ?>">Quản Lý Khách Hàng</a></li>
              <li class="breadcrumb-item active"><?php echo $detail[0]['HoTen']; ?></li>
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
            <form>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Tên Khách Hàng</label>
                    <input type="text" class="form-control" id="ten" placeholder="Tên khách hàng" value="<?php echo $detail[0]['HoTen']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Tài Khoản</label>
                    <input type="text" class="form-control" id="ten" placeholder="Tài khoản" value="<?php echo $detail[0]['TaiKhoan']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Số Điện Thoại</label>
                    <input type="text" class="form-control" id="ten" placeholder="Số điện thoại" value="<?php echo $detail[0]['SoDienThoai']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Email</label>
                    <input type="text" class="form-control" id="ten" placeholder="Email" value="<?php echo $detail[0]['Email']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Địa Chỉ</label>
                    <input type="text" class="form-control tenchinh" id="ten" placeholder="Địa chỉ" value="<?php echo $detail[0]['DiaChi']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Ngày Tham Gia</label>
                    <input type="text" class="form-control tenchinh" id="ten" placeholder="Tên khách hàng" value="<?php echo $detail[0]['NgayThamGia']; ?>">
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('admin/khach-hang/'); ?>">Quay Lại</a>
              <?php if($detail[0]['TrangThai'] == 0){ ?>
                <a href="<?php echo base_url('admin/khach-hang/'.$detail[0]['MaKhachHang'].'/trang-thai/'); ?>" class="btn btn-primary">Bỏ Cấm Tài Khoản</a>
              <?php }else{ ?>
                <a href="<?php echo base_url('admin/khach-hang/'.$detail[0]['MaKhachHang'].'/trang-thai/'); ?>" class="btn btn-danger">Cấm Tài Khoản</a>
              <?php } ?>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
