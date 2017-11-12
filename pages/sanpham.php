<?php
if (isset($_REQUEST['page'])) {
    if (isset($_REQUEST['id'])) {
        $id_sp = $_REQUEST['id'];
        $lay_du_lieu = "SELECT  `san_pham`.* , `danh_muc`.ten_danh_muc , `thuong_hieu`.ten_thuong_hieu,  `nha_phan_phoi`.ten_nha_phan_phoi FROM `san_pham`  JOIN danh_muc on san_pham.id_danh_muc=danh_muc.id JOIN thuong_hieu on san_pham.id_thuong_hieu=thuong_hieu.id JOIN nha_phan_phoi on san_pham.id_nha_phan_phoi=nha_phan_phoi.id where san_pham.id = '{$id_sp}'";
        //$lay_anh = "SELECT url FROM `san_pham` JOIN hinhanh_sp on san_pham.id = hinhanh_sp.id_sp JOIN hinh_anh on hinhanh_sp.id_anh = hinh_anh.id where san_pham.id = '{$id_sp}'";
        $rs = mysqli_query($db->conn, $lay_du_lieu);
        //$img = mysqli_query($db->conn, $lay_anh);
        $datas = mysqli_fetch_assoc($rs);

        $lay_lien_quan = "SELECT  `san_pham`.* , `danh_muc`.ten_danh_muc FROM `san_pham` JOIN danh_muc on san_pham.id_danh_muc=danh_muc.id where `danh_muc`.ten_danh_muc = '{$datas['ten_danh_muc']}' ORDER BY RAND() LIMIT 3";
        $r = mysqli_query($db->conn, $lay_lien_quan);
    } else {
        new Redirect('index.php');
    }
} else {
    new Redirect('index.php');
}
//truy vấn toàn bộ dữ liệu của bảng
?>                                  

<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="index.php">Trang chủ</a></li>
                <li class="active">
                    <?php echo $datas['ten_san_pham'] ?> 
                </li>
            </ol>
        </div>
    </div>
</div>
<div class="single contact">
    <div class="container">
        <div class="single-main">
            <div class="col-md-9 single-main-left">
                <div class="sngl-top">
                    <div class="col-md-5 single-top-left">	
                        <div class="flexslider">
                            <ul class="slides">
                                <li data-thumb="images/<?php echo $datas['hinh_anh'] ?>">
                                    <img src="images/<?php echo $datas['hinh_anh'] ?>" />
                                </li>                               
                            </ul>
                        </div>
                        <!-- FlexSlider -->
                        <script defer src="js/jquery.flexslider.js"></script>
                        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

                        <script>
                            // Can also be used with $(document).ready()
                            $(window).load(function () {
                                $('.flexslider').flexslider({
                                    animation: "slide",
                                    controlNav: "thumbnails"
                                });
                            });
                        </script>
                    </div>	
                    <div class="col-md-7 single-top-right">
                        <div class="details-left-info simpleCart_shelfItem">
                            <h3> <?php echo $datas['ten_san_pham'] ?> </h3>
                            <?php
                            if ($datas['available'] > 0) {
                                echo "<p class='availability'>Có sẵn <span class='color'> {$datas['available']}</span> sản phẩm</p>";
                            } else {
                                echo "<p class='availability'><span class='color'> Hết hàng</span></p>";
                            }
                            ?>
                            <div class="price_single">
<!--                                <span class="reducedfrom">$800.00</span>-->
                                <h3><span class="actual item_price"><?php echo number_format($datas['don_gia'], 0, "", ".") . " VNĐ" ?></span></h3>
                            </div>
                            <h2 class="quick">Mô tả ngắn:</h2>
                            <p class=""><?php echo $datas['mo_ta_ngan'] ?></p>
                            <h2 class="quick">Danh mục:</h2>
                            <p class=""><?php echo $datas['ten_danh_muc'] ?></p>
                            <h2 class="quick">Thương hiệu:</h2>
                            <p class=""><?php echo $datas['ten_thuong_hieu'] ?></p>
                            <h2 class="quick">Nhà phân phối:</h2>
                            <p class=""><?php echo $datas['ten_nha_phan_phoi'] ?></p>
                            <!--                            <div class="quantity_box">
                                                            <ul class="product-qty">
                                                                <span>Số lượng:</span>
                                                                <select>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                            
                                                                </select>
                                                            </ul>
                                                        </div> -->

                            <div class="clearfix"> </div>
                            <div class="single-but item_add">
                                <?php
                                if ($datas['available'] > 0) {
                                    ?>
<!--                                    <input type="submit" value="Thêm vào giỏ"/>-->
                                    
                                    <a class="btn-primary btn" href="index.php?page=themgiohang&sanpham=<?php echo $datas['id'] ?>">Thêm vào giỏ</a>
                                    <?php
                                } else {

                                    echo "<div class='btn btn-default disabled'> Sản phẩm hiện đang hết hàng </div>";
                                }
                                ?>
                            </div>

                        </div>

                    </div>

                    <div class="clearfix"></div>
                    <h3 class="quick">Mô tả:</h3>
                    <div class="main-desc">

                        <p class=""><?php echo $datas['mo_ta'] ?></p>
                    </div>

                </div>

                <div class="latest products">
                    <h3>Sản phẩm liên quan</h3>
                    <div class="product-one">
                        <?php foreach ($r as $lq) { ?>
                            <div class="col-md-4 product-left single-left"> 
                                <div class="p-one simpleCart_shelfItem">

                                    <a href="index.php?page=sanpham&id=<?php echo $lq['id']; ?>" title="<?php echo $lq['ten_san_pham'] ?>">
                                        <img src="images/<?php echo $lq['hinh_anh'] ?>" alt="<?php echo $lq['ten_san_pham'] ?>" />
                                        <div class="mask mask1">
                                            <span>Xem sản phẩm</span>
                                        </div>
                                    </a>
                                    <h4><?php echo $lq['ten_san_pham'] ?></h4>
                                    <p><a  class="item_add" ><i></i> <span class=" item_price"><?php echo number_format($lq['don_gia'], 0, "", ".") . " VNĐ" ?></span></a></p>

                                </div>
                            </div>
                        <?php } ?>
                        <div class="clearfix"> </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3 p-right single-right">
                <?php
                include './include/sidebar-right.php';
                ?>
            </div>
            <div class="clearfix"></div>

        </div>

    </div>
</div>