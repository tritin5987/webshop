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
              <li class="breadcrumb-item active">Quản Lý Sản Phẩm</li>
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
                      <th>Hình Ảnh</th>
                      <th>Tên Sản Phẩm</th>
                      <th>Tên Chuyên Mục</th>
                      <th>Giá Gốc</th>
                      <th>Giá Bán</th>
                      <th>Số Lượng</th>
                      <th>Loại Sản Phẩm</th>
                      <th>Nhập Số Lượng</th>
                      <?php if($_SESSION['phanquyen'] == 1){ ?>
                        <th>Hành Động</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php foreach ($list as $key => $value): ?>
	                    <tr>
	                      <td><?php echo $key + 1; ?></td>
	                      <td><img style="width: 100px; height: 100px" src="<?php echo $value['AnhChinh']; ?>"></td>
	                      <td><?php echo $value['TenSanPham']; ?></td>
                        <td><a href="<?php echo base_url('admin/chuyen-muc/'.$value['MaChuyenMuc'].'/sua/'); ?>"><?php echo $value['TenChuyenMuc']; ?></a></td>
                        <td><?php echo number_format($value['GiaGoc']); ?> VND</td>
                        <td><?php echo number_format($value['GiaBan']); ?> VND</td>
                        <td><?php echo $value['SoLuong']; ?> sản phẩm</td>
                        <td>
                          <?php if($value['LoaiSanPham'] == 1){ ?>
                            Bình Thường
                          <?php }else if($value['LoaiSanPham'] == 2){ ?>
                            Khuyến Mãi
                          <?php }else if($value['LoaiSanPham'] == 3){ ?>
                            Nội Bật
                          <?php }else if($value['LoaiSanPham'] == 4){ ?>
                            Đang Hot
                          <?php } ?>
                        </td>
                        <td>
                          <a href="<?php echo base_url('admin/san-pham/'.$value['MaSanPham'].'/nhap/'); ?>" class="btn btn-success" style="color: white;">
                            <i class="fa-solid fa-plus"></i>
                              <span>NHẬP SỐ LƯỢNG</span>
                            </a>
                            <?php if($_SESSION['phanquyen'] == 1){ ?>
                              <a href="<?php echo base_url('admin/san-pham/'.$value['MaSanPham'].'/lich-su/'); ?>" class="btn btn-info" style="color: white;">
                              <i class="fa-solid fa-clipboard-list"></i>
                                <span>LỊCH SỬ NHẬP</span>
                              </a>
                          <?php } ?>
                        </td>
                        <?php if($_SESSION['phanquyen'] == 1){ ?>
	                      <td>
	                      	<a href="<?php echo base_url('admin/san-pham/'.$value['MaSanPham'].'/sua/'); ?>" class="btn btn-primary" style="color: white;">
	                      		<i class="fas fa-edit"></i>
                            	<span>SỬA</span>
                           	</a>
                           	<a href="<?php echo base_url('admin/san-pham/'.$value['MaSanPham'].'/xoa/'); ?>" class="btn btn-danger" style="color: white;">
	                      		<i class="fas fa-trash"></i>
                            	<span>XÓA</span>
                           	</a>
	                      </td>
                        <?php } ?>
	                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                	<?php for($i = 1; $i <= $totalPages; $i++){ ?>
                  		<li class="page-item"><a class="page-link" href="<?php echo base_url('admin/san-pham/'.$i.'/trang/') ?>"><?php echo $i; ?></a></li>
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
