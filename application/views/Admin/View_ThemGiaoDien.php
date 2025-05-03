<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Giao Diện</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/giao-dien/'); ?>">Quản Lý Giao Diện</a></li>
              <li class="breadcrumb-item active">Thêm Giao Diện</li>
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
                    <label for="ten">Chọn Chuyên Mục</label>
                    <select class="form-control" aria-label="Default select example" name="machuyenmuc">
                      <?php foreach ($category as $key => $value): ?>
                        <option value="<?php echo $value['MaChuyenMuc']; ?>"><?php echo $value['TenChuyenMuc']; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Hình Ảnh</label>
                    <input type="file" class="form-control" id="ten" name="hinhanh">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Loại Giao Diện</label>
                    <select class="form-control" aria-label="Default select example" name="loaigiaodien">
                      <option value="1">Giao Diện Slide</option>
                      <option value="2">Banner Dọc Dưới Slide</option>
                      <option value="3">Banner Ngang</option>
                      <option value="4">Banner Dọc Cuối Trang</option>
                    </select>
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('admin/giao-dien/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Thêm Giao Diện</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
