<?php
$danh_muc = "SELECT * from danh_muc";
$dm = mysqli_query($db->conn, $danh_muc);
//
$thuong_hieu = "SELECT * from thuong_hieu";
$th = mysqli_query($db->conn, $thuong_hieu);
//
$nha_phan_phoi = "SELECT * from nha_phan_phoi";
$npp = mysqli_query($db->conn, $nha_phan_phoi);

$menu0 = $menu1 =$menu2 = "";

if (!isset($_GET['page'])) {
    $menu0 = 'class="active"';
}
elseif ($_GET['page'] == 'locsanpham') {
    $menu1 = 'style="color: #181b2a;"';
}
elseif ($_GET['page'] == 'gioithieu') {
    $menu2 = 'class="active"';
}
?>

<div class="container">
    <div class="top-nav">
        <ul class="memenu skyblue"><li <?php echo $menu0; ?> ><a href="index.php">Trang chủ</a></li>
            <li class="grid"><a href="#" <?php echo $menu1; ?>>Danh mục sản phẩm</a>
                <div class="mepanel">
                    <div class="row">
                        <div class="col1 me-one">
                            <h4>Danh mục</h4>
                            <ul>
                                <?php
                                if (is_array($dm) || is_object($dm)) {
                                    foreach ($dm as $d) {
                                        if ($d['id'] != 1) {
                                            ?>
                                            <li>
                                                <a href="index.php?page=locsanpham&danhmuc=<?php echo $d['id'] ?>"><?php echo $d['ten_danh_muc'] ?>
                                                </a></li>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="col1 me-one">
                            <h4>Thương hiệu</h4>
                            <ul>
                                <?php
                                if (is_array($th) || is_object($th)) {
                                    foreach ($th as $t) {
                                        if ($t['id'] != 1) {
                                            ?>
                                            <li><a href="index.php?page=locsanpham&thuonghieu=<?php echo $t['id'] ?>"><?php echo $t['ten_thuong_hieu'] ?></a></li>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="col1 me-one">
                            <h4>Nhà phân phối</h4>
                            <ul>
                                <?php
                                if (is_array($npp) || is_object($npp)) {
                                    foreach ($npp as $n) {
                                        if ($n['id'] != 1) {
                                            ?>
                                            <li><a href="index.php?page=locsanpham&nhaphanphoi=<?php echo $n['id'] ?>"><?php echo $n['ten_nha_phan_phoi'] ?></a> </li>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li <?php echo $menu2; ?>><a href="index.php">Giới thiệu</a></li>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>