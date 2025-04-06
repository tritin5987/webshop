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
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/san-pham/'); ?>">Quản Lý Sản Phẩm</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/san-pham/'); ?>">Nhập Số Lượng</a></li>
              <li class="breadcrumb-item active"><?php echo $detail[0]['TenSanPham']; ?></li>
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
                    <label for="ten">Tên Sản Phẩm</label>
                    <input type="text" class="form-control tenchinh" id="ten" placeholder="Tên sản phẩm" name="tensanpham" value="<?php echo $detail[0]['TenSanPham']; ?>" disabled>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Chuyên Mục</label>
                    <?php foreach ($category as $key => $value): ?>
                      <?php if($detail[0]['MaChuyenMuc'] == $value['MaChuyenMuc']){ ?>
                        <input type="text" class="form-control tenchinh" id="ten" placeholder="Chuyên mục" name="machuyenmuc" value="<?php echo $value['TenChuyenMuc']; ?>" disabled>
                      <?php } ?>
                    <?php endforeach ?>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Số Lượng Hiện Tại</label>
                    <input type="text" class="form-control" name="soluong" placeholder="Số lượng" value="<?php echo $detail[0]['SoLuong']; ?> sản phẩm" disabled>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Số Lượng Nhập Thêm</label>
                    <input type="text" class="form-control" name="soluongnhap" placeholder="Số lượng nhập thêm">
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('admin/san-pham/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Nhập Thêm Số Lượng</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
<script>
    function createSlug(str) {
        // Chuyển đổi tiếng Việt thành dạng slug
        str = str.toLowerCase().trim();
        str = str.replace(/\s+/g, '-'); // Thay thế khoảng trắng bằng dấu gạch ngang
        str = convertVietnameseToSlug(str); // Xử lý các dấu tiếng Việt

        return str;
    }

    function convertVietnameseToSlug(str) {
        var slug = str;

        // Xử lý dấu tiếng Việt
        slug = slug.replace(/[áàảãạăắằẳẵặâấầẩẫậ]/g, 'a');
        slug = slug.replace(/[éèẻẽẹêếềểễệ]/g, 'e');
        slug = slug.replace(/[íìỉĩị]/g, 'i');
        slug = slug.replace(/[óòỏõọôốồổỗộơớờởỡợ]/g, 'o');
        slug = slug.replace(/[úùủũụưứừửữự]/g, 'u');
        slug = slug.replace(/[ýỳỷỹỵ]/g, 'y');
        slug = slug.replace(/đ/g, 'd');

        return slug;
    }

    $(document).ready(function(){
        $('#taoduongdan').click(function(){
            if($(".tenchinh").val() == ""){
                toastr.options = {
                  closeButton: true,
                  progressBar: true,
                  positionClass: 'toast-top-right', // Vị trí hiển thị
                  timeOut: 5000 // Thời gian tự động đóng
              };
              toastr.error('Vui lòng nhập tên Sản Phẩm!', 'Thất Bại');
            }else{
                $("#duongdan").val(createSlug($(".tenchinh").val()))
            }
        })
    });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#editor2'))
        .catch(error => {
            console.error(error);
        });
</script>

<style type="text/css">
  .ck-editor__editable {min-height: 300px;}

</style>