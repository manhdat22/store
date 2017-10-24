<?php
//require_once './include/init.php';
//$base = "SELECT `san_pham`.*  , `danh_muc`.ten_danh_muc , `thuong_hieu`.ten_thuong_hieu,  `nha_phan_phoi`.ten_nha_phan_phoi FROM `san_pham`  JOIN danh_muc on san_pham.id_danh_muc=danh_muc.id JOIN thuong_hieu on san_pham.id_thuong_hieu=thuong_hieu.id JOIN nha_phan_phoi on san_pham.id_nha_phan_phoi=nha_phan_phoi.id";


$danh_muc = "SELECT * from danh_muc";
$dm = mysqli_query($db->conn, $danh_muc);
//
$thuong_hieu = "SELECT * from thuong_hieu";
$th = mysqli_query($db->conn, $thuong_hieu);
//
$nha_phan_phoi = "SELECT * from nha_phan_phoi";
$npp = mysqli_query($db->conn, $nha_phan_phoi);

?>

<h3>Danh mục</h3>
<ul class="product-categories">
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
<h3>Thương hiệu</h3>
<ul class="product-categories">

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
<h3>Nhà phân phối</h3>
<ul class="product-categories">
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
<h3>Giá</h3>
<ul class="product-categories p1">
    <li><a href="index.php?page=locsanpham&max=5000000">Dưới 5 triệu</a> </li>
    <li><a href="index.php?page=locsanpham&min=5000000&max=10000000">Từ 5 - 10 triệu</a> </li>
    <li><a href="index.php?page=locsanpham&min=10000000&max=15000000">Từ 10 - 15 triệu</a> </li>
    <li><a href="index.php?page=locsanpham&min=15000000&max=20000000">Từ 15 - 20 triệu</a> </li>
    <li><a href="index.php?page=locsanpham&min=20000000">Trên 20 triệu</a> </li>
</ul>
