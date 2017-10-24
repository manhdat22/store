<?php
//Limit và trang hiện tại
$current_page = isset($_GET['p']) ? $_GET['p'] : 1;
$limit = 9;
$start = ($current_page - 1) * $limit;

$current_url = $_SERVER['QUERY_STRING'];
$pagi = " LIMIT $start, $limit";
$count = 0;
$var = "";
$sql = "SELECT  `san_pham`.* , `danh_muc`.ten_danh_muc , `thuong_hieu`.ten_thuong_hieu,  `nha_phan_phoi`.ten_nha_phan_phoi FROM `san_pham`  JOIN danh_muc on san_pham.id_danh_muc=danh_muc.id JOIN thuong_hieu on san_pham.id_thuong_hieu=thuong_hieu.id JOIN nha_phan_phoi on san_pham.id_nha_phan_phoi=nha_phan_phoi.id WHERE `status` != 0";
if (isset($_REQUEST['danhmuc'])) {
    $var = " AND `id_danh_muc` = " . $_REQUEST['danhmuc'];
    $get_product = $sql . $var . $pagi;
    $datas = mysqli_query($db->conn, $get_product);
    $t = mysqli_fetch_assoc($datas);
    $title = $t['ten_danh_muc'];
    
} elseif (isset($_REQUEST['thuonghieu'])) {
    $var = " AND `id_thuong_hieu` = " . $_REQUEST['thuonghieu'];
    $get_product = $sql . $var . $pagi;
    $datas = mysqli_query($db->conn, $get_product);
    $t = mysqli_fetch_assoc($datas);
    $title = $t['ten_thuong_hieu'];
} elseif (isset($_REQUEST['nhaphanphoi'])) {
    $var = " AND `id_nha_phan_phoi` = " . $_REQUEST['nhaphanphoi'];
    $get_product = $sql . $var . $pagi;
    $datas = mysqli_query($db->conn, $get_product);
    $t = mysqli_fetch_assoc($datas);
    $title = $t['ten_nha_phan_phoi'];
} elseif (isset($_REQUEST['max']) || isset($_REQUEST['min'])) {


    if (isset($_REQUEST['min'])) {
        $min = $_REQUEST['min'];
        $var = " AND `don_gia` > " . $min;
        if (isset($_REQUEST['max'])) {
            $title = " Từ " . number_format($min, 0, "", ".") . " VNĐ";
        } else {
            $title = " Trên " . number_format($min, 0, "", ".") . " VNĐ";
        }
    }
    if (isset($_REQUEST['max'])) {
        $max = $_REQUEST['max'];
        $var = $var . " AND `don_gia` < " . $max;
        if (isset($_REQUEST['min'])) {
            $title = $title . " Đến " . number_format($max, 0, "", ".") . " VNĐ";
        } else {
            $title = " Dưới " . number_format($max, 0, "", ".") . " VNĐ";
        }
    }

    
    $get_product = $sql . $var . $pagi;
    $datas = mysqli_query($db->conn, $get_product);
    $t = mysqli_fetch_assoc($datas);
}
//lấy số bản ghi
//$get_total = mysqli_query($db->conn, "SELECT COUNT(*) AS total FROM `san_pham`");
//$row = mysqli_fetch_assoc($get_total);
$total = mysqli_num_rows($datas);

//Tính tổng số page và tính ở page ban đầu;
$total_page = ceil($total / $limit);
if ($current_page > $total) {
    $current_page = $total;
} elseif ($current_page < 1) {
    $current_page = 1;
}
//record bắt đầu trong câu lệnh SQL


$count = mysqli_num_rows($datas);
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
                <div class="clearfix"></div>
                <div class="product-left">
                    <ul class="pagination">

                        <?php
                        
                        if ($current_page > 1 && $total_page > 1) {
                            echo "<li><a href='index.php?".$current_url."&p=" . ($current_page - 1) . "'> < </a></li>";
                        }

                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($i == $current_page) {
                                echo "<li><a style='background:#f2f2f2'>$i</a></li>";
                            } else {
                                echo "<li><a href='index.php?".$current_url."&p=" . $i . "'> $i </a></li>";
                            }
                        }

                        if ($current_page < $total_page && $total_page > 1) {
                            echo "<li><a href='index.php?".$current_url."&p=" . ($current_page - 1) . "'> > </a></li>";
                        }
                        ?>
                    </ul>
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