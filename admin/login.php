<!DOCTYPE html>
<html lang="vi">
    <head>

        <title>Đăng nhập</title>
        <meta charset="utf8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- styles -->
        <link href="css/styles.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-bg">
        <?php
//chạy các thư viện
        require_once './init.php';

        if (isset($_POST['submit'])) {

            //Lấy thông tin từ form login
            $username = $_POST['txtU'];
            $password = md5($_POST['txtP']);

            //Kiểm tra trong database
            $check_user = "SELECT username, password FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
            if ($db->num_rows($check_user)) {
                //Kiểm tra quyền
                $check_permission = "SELECT username, password FROM `users` WHERE `username` = '$username' AND `permission` != 2 AND `status` != 0 ";
                if ($db->num_rows($check_permission)) {

                    $

                    if (isset($_SESSION['sa'])) {
                        echo "<script>alert('Hello admin');</script>";
                    } else {
                        new Redirect($_DOMAINS);
                    }
                } else {

                    echo "<script>alert('Bạn không có quyền hoặc bạn đã bị cấm truy cập trang này');</script>";
                    new Redirect("http://localhost/store/"); //Không có quyền -> đẩy về trang chủ
                }
            } else {
                echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu');</script>";
            }
        }
        ?>




        <div class="page-content container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-wrapper">
                        <div class="box">
                            <div class="content-wrap">
                                <h6>Đăng nhập</h6>
                                <form action="" method="POST">
                                    <input class="form-control" required type="text" name="txtU" placeholder="Tên đăng nhập">
                                    <input class="form-control" required type="password" name="txtP" placeholder="Mật khẩu">


                                    <div class="action">
                                        <input type="submit" class="btn btn-primary signup" name="submit" value="Đăng nhập">
                                    </div>    
                                </form>
                            </div>
                        </div>

                        <div class="already">

                            <a href="#">Quên mật khẩu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>