<?php
$count = 0;
if (isset($_REQUEST['tukhoa'])) {

$search_product = "SELECT  * FROM `san_pham` WHERE `status` != 0 AND `ten_san_pham` LIKE '%" . $_REQUEST['tukhoa'] . "%'";
echo $search_product;
//$datas = mysqli_query($db->conn, $get_product);
//$t = mysqli_fetch_assoc($datas);
//$count = mysqli_num_rows($datas);
}

?>

<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="index.php">Trang chủ</a></li>
                <li class="active">
                    <?php echo $title; ?>
                </li>
            </ol>
        </div>
    </div>
</div>
<div class="product">
    <div class="container">
        <div class="product-main">
            <div class="col-md-9 p-left">
                <div class="product-one">
                    <?php
                    if ($count != 0) {
                        if (is_array($datas) || is_object($datas)) {
                            foreach ($datas as $p) {
                                ?>
                                <div class="col-md-4 col-xs-6 product-left single-left">
                                    <div class="p-one simpleCart_shelfItem">
                                        <a title="<?php echo $p['ten_san_pham'] ?>" href="index.php?page=sanpham&id=<?php echo $p['id'] ?>">
                                            <img src="http://localhost/store/images/<?php echo $p['hinh_anh'] ?>" alt="<?php echo $p['ten_san_pham'] ?>" />
                                            <div class="mask mask1">
                                                <span>Xem sản phẩm</span>
                                            </div>
                                        </a>
                                        <h4><?php echo $p['ten_san_pham'] ?></h4>
                                        <p><a class="item_add" href="#" title="Thêm vào giỏ hàng"><i></i> <span class=" item_price"><?php echo number_format($p['don_gia'], 0, "", ".") . " VNĐ"; ?></span></a></p>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    } else {
                        echo "Không có sản phẩm nào";
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-3 p-right single-right">
                <?php
                include './include/sidebar-right.php';
                ?>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>