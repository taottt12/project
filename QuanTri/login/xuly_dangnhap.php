<?php
include('./connect.php');
if (isset($_POST['login'])) {
    $username = $_POST['user'];
    $password = MD5($_POST['pass']);
    if ($username == '' || $password == '') {
        echo "<p class='thongbao1'>bạn cần nhập đầy đủ thông tin</p>";
    } else {
        $sql_check = mysqli_query($con, "select * from taikhoan_ngdung where username = '$username'");
        $dem = mysqli_num_rows($sql_check);
        if ($dem == 0) {
            echo "<p class='thongbao1'>Tài khoản không tồn tại</p>";
        } else {
            $sql_check2 = "select * from taikhoan_ngdung where username = '$username' and password = '$password'";
            $row = mysqli_query($con, $sql_check2);
            $dem2 = mysqli_num_rows($row);
            if ($dem2 == 0)
                echo "<p style='text-align:center'>Mật khẩu không chính xác</p>";
            else {
                while ($rows = mysqli_fetch_array($row)) {
                    $_SESSION['username'] = $username;
                    $_SESSION['phanquyen'] = $rows['phanquyen'];
                    $_SESSION['idnd'] = $rows['idnd'];
                    if ($rows['phanquyen'] == 0) {
                        echo "<script language='javascript'>
                                alert('Đăng nhập quản trị thành công');
                                window.open('./QuanTri/index.php?admin=DSsanpham', '_self', 1);
                            </script>";
                    } else {
                        // header("Location: ../index.php");
                        echo "<script language='javascript'>
                                alert('Đăng nhập người dùng thành công');
                                window.open('./index.php', '_self', 0);
                            </script>";
                    }
                }
            }
        }
    }
}
