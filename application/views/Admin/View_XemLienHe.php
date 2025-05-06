<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Liên Hệ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/lien-he/'); ?>">Quản Lý Liên Hệ</a></li>
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
            <form method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Tên Khách Hàng</label>
                    <input type="text" class="form-control tenchinh" id="ten" placeholder="Tên khách hàng" value="<?php echo $detail[0]['HoTen']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Số Điện Thoại</label>
                    <input type="text" class="form-control tenchinh" id="ten" placeholder="Tên khách hàng" value="<?php echo $detail[0]['SoDienThoai']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Email</label>
                    <input type="text" class="form-control tenchinh" id="ten" placeholder="Tên khách hàng" value="<?php echo $detail[0]['Email']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                  	<label for="ten">Tiêu Đề</label>
                    <input type="text" class="form-control" placeholder="Tiêu đề" value="<?php echo $detail[0]['TieuDe']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Thời Gian</label>
                    <input type="datetime-local" class="form-control" placeholder="Tiêu đề" value="<?php echo $detail[0]['ThoiGian']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Nội Dung</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Nội dung"><?php echo $detail[0]['NoiDung']; ?></textarea>
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('admin/lien-he/'); ?>">Quay Lại</a>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
