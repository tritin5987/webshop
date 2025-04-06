<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 436px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item active">Bảng Điều Khiển</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $donHangMoi; ?></h3>

                <p>Đơn Hàng Hôm Nay</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo number_format($doanhThuNgay); ?> VND</h3>
                <p>Doanh Thu Hôm Nay</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $khachHangMoi; ?></h3>

                <p>Khách Hàng Hôm Nay</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $tongSanPham; ?></h3>

                <p>Sản Phẩm Trong Kho</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="ion ion-stats-bars"></i></span>
              <a href="<?php echo base_url('admin/hoa-don/thong-ke/?type=thang'); ?>" class="info-box-content" style="color: black;">
                <span class="info-box-text">Doanh Thu Tháng Này</span>
                <span class="info-box-number"><?php echo number_format($doanhThuThang); ?> VND</span>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa-solid fa-cart-shopping"></i></span>

              <a href="<?php echo base_url('admin/hoa-don/thong-ke/?type=thang'); ?>" class="info-box-content" style="color: black;">
                <span class="info-box-text">Đơn Hàng Tháng Này</span>
                <span class="info-box-number"><?php echo $donHangThang; ?> Đơn Hàng</span>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa-solid fa-bag-shopping"></i></span>

              <a href="<?php echo base_url('admin/hoa-don/thong-ke/?type=thang'); ?>" class="info-box-content" style="color: black;">
                <span class="info-box-text">Bán Trong Tháng Này</span>
                <span class="info-box-number"><?php echo $banTrongThang; ?> Sản Phẩm</span>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="ion ion-stats-bars"></i></span>
              <a href="<?php echo base_url('admin/hoa-don/thong-ke/?type=tuan'); ?>" class="info-box-content" style="color: black;">
                <span class="info-box-text">Doanh Thu Tuần Này</span>
                <span class="info-box-number"><?php echo number_format($doanhThuTuan); ?> VND</span>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa-solid fa-cart-shopping"></i></span>

              <a href="<?php echo base_url('admin/hoa-don/thong-ke/?type=tuan'); ?>" class="info-box-content" style="color: black;">
                <span class="info-box-text">Đơn Hàng Tuần Này</span>
                <span class="info-box-number"><?php echo $donHangTuan; ?> Đơn Hàng</span>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa-solid fa-bag-shopping"></i></span>

              <a href="<?php echo base_url('admin/hoa-don/thong-ke/?type=tuan'); ?>" class="info-box-content" style="color: black;">
                <span class="info-box-text">Bán Trong Tuần Này</span>
                <span class="info-box-number"><?php echo $banTrongTuan; ?> Sản Phẩm</span>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
          <section class="col-lg-6 connectedSortable ui-sortable">
            <!-- solid sales graph -->
            <div class="card bg-gradient-white">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Đơn Hàng Theo Tháng
                </h3>
              </div>
              <div class="card-body">
                <canvas id="orderChar" style="min-height: 250px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
             
            </div>
            <!-- /.card -->
          </section>

          <section class="col-lg-6 connectedSortable ui-sortable">
            <!-- solid sales graph -->
            <div class="card bg-gradient-white">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Doanh Thu Theo Tháng
                </h3>
              </div>
              <div class="card-body">
                <canvas id="revenueChart" style="min-height: 250px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
             
            </div>
            <!-- /.card -->
          </section>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Lịch Sử Nhập Gần Đây</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="display: block;">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Tên Sản Phẩm</th>
                      <th>Số Lượng Cũ</th>
                      <th>Số Lượng Mới</th>
                      <th>Thời Gian</th>
                    </tr>
                    </thead>
                    <tbody>

                      <?php foreach ($history as $key => $value): ?>
                        <tr>
                          <td><?php echo $key + 1; ?></td>
                          <td><a href="<?php echo base_url('admin/san-pham/'.$value['MaSanPham'].'/sua/') ?>"><?php echo $value['TenSanPham']; ?></a></td>
                          <td><?php echo $value['SoLuongCu']; ?> sản phẩm</td>
                          <td><?php echo $value['SoLuongMoi']; ?> sản phẩm</td>
                          <td><?php echo $value['ThoiGian']; ?></td>
                        </tr>
                      <?php endforeach ?>

                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>

          <div class="col-lg-6">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fa-solid fa-layer-group"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng Số Chuyên Mục</span>
                <span class="info-box-number"><?php echo $tongChuyenMuc; ?> chuyên mục</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="fa-solid fa-clipboard-list"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng Số Sản Phẩm</span>
                <span class="info-box-number"><?php echo $tongLoaiSanPham; ?> sản phẩm</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fa-solid fa-barcode"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng Số Mã Giảm Giá</span>
                <span class="info-box-number"><?php echo $tongTongMaGiamGia; ?> mã giảm giá</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fa-solid fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng Số Khách Hàng</span>
                <span class="info-box-number"><?php echo $tongKhachHang; ?> khách hàng</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  $(document).ready(function(){
      // Biểu đồ số lượng đơn hàng theo tháng
      $.get('<?php echo base_url("admin/don-hang-thang/"); ?>', function(data){
        var data = JSON.parse(data);
        // Dữ liệu tháng
        var months = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];
        var order = data;

        // Lấy thẻ canvas
        var ctx = document.getElementById('orderChar').getContext('2d');

        // Khởi tạo biểu đồ cột
        var orderChar = new Chart(ctx, {
            type: 'bar', // Đổi thành biểu đồ cột
            data: {
                labels: months,
                datasets: [{
                    label: 'Đơn Hàng Theo Tháng',
                    data: order,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Màu nền
                    borderColor: 'rgb(75, 192, 192)', // Màu viền
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1, // Đảm bảo hiển thị số nguyên
                            callback: function(value) {
                                return Math.round(value); // Làm tròn giá trị
                            }
                        }
                    }
                }
            }
        });
      });

      // Biểu đồ doanh thu theo tháng
      $.get('<?php echo base_url("admin/doanh-thu-thang/"); ?>', function(data){
        var data = JSON.parse(data);
        // Dữ liệu tháng
        var months = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];
        var revenues = data;

        // Lấy thẻ canvas
        var ctx = document.getElementById('revenueChart').getContext('2d');

        // Khởi tạo biểu đồ cột
        var revenueChart = new Chart(ctx, {
            type: 'bar', // Đổi thành biểu đồ cột
            data: {
                labels: months,
                datasets: [{
                    label: 'Doanh Thu Theo Tháng (VND)',
                    data: revenues,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Màu nền
                    borderColor: 'rgb(54, 162, 235)', // Màu viền
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                // Hiển thị giá trị dưới dạng tiền tệ
                                return value.toLocaleString('vi-VN') + ' đ';
                            }
                        }
                    }
                }
            }
        });
      });
  });
</script>


