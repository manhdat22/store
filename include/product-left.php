<?php
//lấy số bản ghi
$get_total = mysqli_query($db->conn, "SELECT COUNT(*) AS total FROM `san_pham`");
$row = mysqli_fetch_assoc($get_total);
$total = $row['total'];

//Limit và trang hiện tại
$current_page = isset($_GET['p']) ? $_GET['p'] : 1;
$limit = 9;

//Tính tổng số page và tính ở page ban đầu;
$total_page = ceil($total / $limit);
if ($current_page > $total) {
    $current_page = $total;
} elseif ($current_page < 1) {
    $current_page = 1;
}
//record bắt đầu trong câu lệnh SQL
$start = ($current_page - 1) * $limit;

$get_product = "SELECT * FROM `san_pham` WHERE `status` != 0  ORDER BY `id` DESC LIMIT $start, $limit";
$datas = mysqli_query($db->conn, $get_product);
?>

<div class="col-md-9 p-left">
    <div class="product-one">
        <?php
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
        ?>
    </div>
    <div class="clearfix"></div>
    <div class="product-left">
        <ul class="pagination">
    <?php
        if ($current_page > 1 && $total_page > 1) {
            echo "<li><a href='index.php?p=".($current_page-1)."'> < </a></li>";
        }
        
        for ($i = 1; $i <= $total_page; $i++){
            if ($i == $current_page) {
                echo "<li><a style='background:#f2f2f2'>$i</a></li>";
            } else  {
                echo "<li><a href='index.php?p=".$i."'> $i </a></li>";
            }
        }
        
        if ($current_page < $total_page && $total_page > 1) {
            echo "<li><a href='index.php?p=".($current_page-1)."'> > </a></li>";
        }
    ?>
        </ul>
    </div>

</div>

