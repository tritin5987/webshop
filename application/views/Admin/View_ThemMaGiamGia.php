<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Mã Giảm Giá</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/ma-giam-gia/'); ?>">Quản Lý Mã Giảm Giá</a></li>
              <li class="breadcrumb-item active">Thêm Mã Giảm Giá</li>
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
                    <label for="ten">Code Giảm Giá</label>
                    <input type="text" class="form-control" id="magiamgia" placeholder="Code giảm giá" name="code" oninput="this.value = this.value.toUpperCase()">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Số Lượng Sử Dụng</label>
                    <input type="number" class="form-control" id="ten" placeholder="Số lượng sử dụng" name="soluong">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Giá Trị Giảm</label>
                    <input type="number" class="form-control" id="ten" placeholder="Giá trị giảm" name="giatrigiam">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Ngày Hết Hạn</label>
                    <input type="date" class="form-control" id="ten" placeholder="Ngày hết hạn" name="thoigian">
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('admin/ma-giam-gia/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Thêm Mã Giảm Giá</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
