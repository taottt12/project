<?php
include('./connect.php');
if (isset($_POST['register'])) {
    $username = $_POST['user'];
    $password = MD5($_POST['pass']);
    $confirmpass = MD5($_POST['confirmPass']);
    if ($username == '' || $password == '' || $confirmpass == '') {
        echo "<script language='javascript'>
        alert('Bạn cần điền đầy đủ thông tin');
        window.open('./index.php?sp=dangky', '_self', 1);
    </script>";
    } else {
        if ($password != $confirmpass) {
            echo "<script language='javascript'>
                                alert('Xác nhận mật khẩu chưa chính xác');
                                window.open('./index.php?sp=dangky', '_self', 1);
                            </script>";
        } else {
            $sql_check2 = "select * from taikhoan_ngdung where username = '$username'";
            $row = mysqli_query($con, $sql_check2);
            $dem3 = mysqli_num_rows($row);
            if ($dem3 > 0) {
                echo "<script language='javascript'>
                                alert('Tài khoản đã tồn tại');
                                window.open('./index.php?sp=dangky', '_self', 1);
                            </script>";
            } else {
                //$sql_add_tknd = "INSERT INTO taikhoan_ngdung( 'username', 'password', 'phanquyen') VALUES ('$username','$password','1')";
                $sql_add_tknd = "INSERT INTO `taikhoan_ngdung`( `username`, `password`, `phanquyen`) VALUES ('$username','$password','1')";
                $tknd = mysqli_query($con, $sql_add_tknd);
                echo "<script language='javascript'>
                                alert('Đăng ký tài khoản thành công');
                                window.open('./index.php', '_self', 1);
                            </script>";
            }
        }
    }
}
