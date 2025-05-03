<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Chuyên Mục</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item active">Quản Lý Chuyên Mục</li>
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
                      <th>Hình Ảnh</th>
                      <th>Tên Chuyên Mục</th>
                      <th>Loại Giao Diện</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php foreach ($list as $key => $value): ?>
	                    <tr>
	                      <td><?php echo $key + 1; ?></td>
	                      <td>
                          <?php if(($value['LoaiGiaoDien'] == 1) || ($value['LoaiGiaoDien'] == 3)){ ?>
                            <img style="width: 200px; height: 100px" src="<?php echo $value['HinhAnh']; ?>">
                          <?php }else{ ?>
                            <img style="width: 150px; height: 150px" src="<?php echo $value['HinhAnh']; ?>">
                          <?php } ?>
                        </td>
	                      <td><a href="<?php echo base_url('admin/chuyen-muc/'.$value['MaChuyenMuc'].'/sua/'); ?>"><?php echo $value['TenChuyenMuc']; ?></a></td>
	                      <td>
	                      	<?php if($value['LoaiGiaoDien'] == 1){ ?>
                            Giao Diện Slide
                          <?php }else if($value['LoaiGiaoDien'] == 2){ ?>
                            Banner Dọc Dưới Slide
                          <?php }else if($value['LoaiGiaoDien'] == 3){ ?>
                            Banner Ngang
                          <?php }else if($value['LoaiGiaoDien'] == 4){ ?>
                            Banner Dọc Cuối Trang
                          <?php } ?>
	                      </td>
	                      <td>
	                      	<a href="<?php echo base_url('admin/giao-dien/'.$value['MaGiaoDien'].'/sua/'); ?>" class="btn btn-primary" style="color: white;">
	                      		<i class="fas fa-edit"></i>
                            	<span>SỬA</span>
                           	</a>
                           	<a href="<?php echo base_url('admin/giao-dien/'.$value['MaGiaoDien'].'/xoa/'); ?>" class="btn btn-danger" style="color: white;">
	                      		<i class="fas fa-trash"></i>
                            	<span>XÓA</span>
                           	</a>
	                      </td>
	                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                	<?php for($i = 1; $i <= $totalPages; $i++){ ?>
                  		<li class="page-item"><a class="page-link" href="<?php echo base_url('admin/chuyen-muc/'.$i.'/trang/') ?>"><?php echo $i; ?></a></li>
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
