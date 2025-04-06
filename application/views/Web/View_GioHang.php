<?php require(APPPATH.'views/web/layouts/header.php'); ?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1><?php echo $title; ?></h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
                    <li class="breadcrumb-item active"><?php echo $title; ?></li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive shop_cart_table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Tên Sản Phẩm</th>
                                <th class="product-price">Giá Bán</th>
                                <th class="product-quantity">Số Lượng</th>
                                <th class="product-subtotal">Thành Tiền</th>
                                <th class="product-remove">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($_SESSION['cart'])){ ?>
                                <?php $tongtien = 0; ?>
                                <?php foreach ($list as $key => $value): ?>
                                    <tr>
                                        <td class="product-thumbnail"><a href="<?php echo base_url('san-pham/'.$value['slug'].'/') ?>"><img style="height: 111px;" src="<?php echo $value['image']; ?>"></a></td>
                                        <td class="product-name" data-title="Product"><a href="<?php echo base_url('san-pham/'.$value['slug'].'/') ?>"><?php echo $value['name']; ?></a></td>
                                        <td class="product-price" data-title="Price"><?php echo number_format($value['price']); ?>đ</td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity">
                                                <input type="button" value="-" class="minus sp-<?php echo $value['id']; ?>">
                                                <input type="text" name="quantity" value="<?php echo $value['number']; ?>" title="Qty" class="qty qty-<?php echo $value['id']; ?>" size="4">
                                                <input type="button" value="+" class="plus sp-<?php echo $value['id']; ?>">
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Total"><?php echo number_format($value['price'] * $value['number']); ?>đ</td>
                                        <td class="product-remove" data-title="Remove"><a href="#" class="remove-product" value="<?php echo $value['id']; ?>"><i class="ti-close"></i></a></td>
                                    </tr>
                                    <?php $tongtien += $value['number'] * $value['price']; ?>
                                <?php endforeach ?>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="px-0">
                                    <?php if(isset($_SESSION['cart'])){ ?>
                                        <div class="row g-0 align-items-center mt-3 mb-3">
                                            <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                                <div class="coupon field_form input-group">
                                                    <input type="text" value="" class="form-control form-control-sm code_input" placeholder="Nhập mã giảm giá...">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-fill-out btn-sm sale-code" type="submit">Áp Dụng</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="coupon-info mt-3"></p>
                                        </div>
                                    <?php }else{ ?>
                                        <br>
                                        <p>Giỏ hàng hiện chưa có sản phẩm nào!</p>
                                    <?php } ?>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="medium_divider"></div>
                <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                <div class="medium_divider"></div>
            </div>
        </div>
        <?php if(isset($_SESSION['cart'])){ ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="border p-3 p-md-4">
                        <div class="heading_s1 mb-3">
                            <h6>Tổng Tiền</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">Tạm Tính</td>
                                        <td class="cart_total_amount"><?php echo number_format($tongtien) ?>đ</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Phí Giao Hàng</td>
                                        <td class="cart_total_amount">
                                            <?php $phiship = 0; ?>
                                            <?php if($tongtien >= $config[0]['MienPhiShip']){ ?>
                                                + <?php echo $phiship; ?>đ
                                            <?php }else{ ?>
                                                +<?php 
                                                    $phiship = $config[0]['PhiShip']; 
                                                    echo number_format($config[0]['PhiShip'])
                                                ?>đ
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Giảm Giá</td>
                                        <td class="cart_total_amount">
                                            <?php if(!isset($_SESSION['saleCode'])){ ?>
                                                - 0đ
                                            <?php }else{ ?>
                                                - <?php echo number_format($_SESSION['saleCode']) ?>đ
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Tổng Tiền</td>
                                        <td class="cart_total_amount"><strong><?php echo number_format($_SESSION['sumCart'] + $phiship) ?>đ</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="w-100 text-right">
                            <a href="<?php echo base_url('thanh-toan/'); ?>" class="btn btn-fill-out">Thanh Toán</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php }else{ ?>
            <div class="w-100 text-right">
                <a href="<?php echo base_url('san-pham/') ?>" class="btn btn-fill-out">Quay Lại Mua Sắm</a>
            </div>
        <?php } ?>
    </div>
</div>

<?php require(APPPATH.'views/web/layouts/footer.php'); ?>

<script type="text/javascript">
    $(document).ready(function(){
        $(".plus").click(function(e){
            e.preventDefault();

            var masanpham = $(this).attr('class').split(' ')[1].split('-')[1];
            var soluong = $('.qty-'+masanpham).val();

            var urlSua = "<?php echo base_url('gio-hang/sua/') ?>" + masanpham + "/" + soluong;

            $.get(urlSua, function(data){
                location.reload()
            })
            
        })

        $(".minus").click(function(e){
            e.preventDefault();

            var masanpham = $(this).attr('class').split(' ')[1].split('-')[1];
            var soluong = $('.qty-'+masanpham).val();

            var urlSua = "<?php echo base_url('gio-hang/sua/') ?>" + masanpham + "/" + soluong;

            $.get(urlSua, function(data){
                location.reload()
            })
            
        })

        $(".remove-product").click(function(e){
            e.preventDefault();
            var masanpham = $(this).attr('value');
            var urlXoa = "<?php echo base_url('gio-hang/xoa/') ?>" + masanpham;
            $.get(urlXoa, function(data){
                location.reload()
            })
            
        })

        $('.sale-code').click(function(e){
            e.preventDefault()
            var magiamgia = $('.code_input').val()
            var urlMaGiamGia = "<?php echo base_url('gio-hang/giam-gia/') ?>" + magiamgia;
            $.get(urlMaGiamGia, function(data){
                if(data == true){
                    location.reload()
                }else{
                    $('.coupon-info').html(data)
                }
            });
        })
    });
</script>