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
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/hoa-don/'); ?>">Quản Lý Hóa Đơn</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo base_url('admin/hoa-don/them'); ?>">Tạo Hóa Đơn</a></li>
              <li class="breadcrumb-item active">Thêm Sản Phẩm</li>
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
                    <label for="ten">Loại Sản Phẩm</label>
                    <select class="form-control" name="chuyenmuc" id="chuyenmuc" required>
                      <option hidden>Chọn Loại Sản Phẩm</option>
                      <?php foreach ($category as $key => $value): ?>
                        <option value="<?php echo $value['MaChuyenMuc']; ?>"><?php echo $value['TenChuyenMuc']; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Chọn Sản Phẩm</label>
                    <select class="form-control" name="masanpham" id="sanpham" required>
                      <option hidden>Chọn Sản Phẩm</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Số Lượng</label>
                    <input type="number" min="1" class="form-control" placeholder="Số lượng" name="soluong">
                  </div>
                </div>
              </div> 
              <button class="btn btn-primary">Thêm Sản Phẩm</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header text-right">
                <a href="<?php echo base_url('admin/hoa-don/'.$mahoadon.'/xem'); ?>" class="btn btn-primary">Xử Lý Hóa Đơn</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Hình Ảnh</th>
                      <th>Tên Sản Phẩm</th>
                      <th>Số Lượng</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($list as $key => $value): ?>
                      <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><img style="width: 100px; height: 100px" src="<?php echo $value['HinhAnh']; ?>"></td>
                        <td><?php echo $value['TenSanPham']; ?></td>
                        <td><?php echo $value['SoLuong']; ?> sản phẩm</td> 
                        <td>
                            <a href="<?php echo base_url('admin/hoa-don/xoa/'.$value['MaChiTietHoaDon'].'/san-pham/?mahoadon='.$mahoadon); ?>" class="btn btn-danger" style="color: white;">
                            <i class="fas fa-trash"></i>
                              <span>XÓA</span>
                            </a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
                <?php if(count($list) <= 0){ ?>
                  <p class="text-center mt-4">Không có sản phẩm nào!</p>
                <?php } ?>
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
<script>
  $(document).ready(function() {
    $('#chuyenmuc').change(function() {
      const maChuyenMuc = $(this).val(); // Lấy mã chuyên mục đã chọn
      const url = '<?php echo base_url('admin/hoa-don/chuyen-muc/') ?>' + maChuyenMuc;

      if (maChuyenMuc) {
        $.ajax({
          url: url,
          method: 'GET',
          dataType: 'json', // Đảm bảo API trả về JSON
          success: function(data) {
            // Kiểm tra dữ liệu trả về
            if (data && data.length > 0) {
              // Lặp qua danh sách sản phẩm để thêm vào select
              data.forEach(function(item) {
                const formattedPrice = parseFloat(item.GiaBan).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
                const option = `<option value="${item.MaSanPham}">${item.TenSanPham} | Giá bán: ${formattedPrice}</option>`;
                $('#sanpham').append(option);
              });
            } else {
              alert('Không có sản phẩm nào trong chuyên mục này!');
            }
          },
          error: function() {
            alert('Không thể lấy dữ liệu từ máy chủ!');
          }
        });
      }
    });
  });
</script>