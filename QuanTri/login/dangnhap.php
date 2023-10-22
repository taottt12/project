<?php
session_start();
if (isset($_SESSION['username'])) {
    if ($_SESSION['phanquyen'] == 1) {
        header("location:../index.php");
    }
    if ($_SESSION['phanquyen'] == 0) {
        header("location:../QuanTri/.dangnhap.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="admin_style.css" rel="stylesheet">
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <h3 style="text-align: center; font-size: 170%;">LOGIN</h3>
        <table align="center" boder="0" margin-top="50px">
            <!-- dòng thứ nhất -->
            <tr style="font-size: 110%;">
                <!-- <td></td> -->
                <!-- <td>Username:</td> -->
                <td><input type="text" name="user" placeholder="Username"></td>
                <td></td>
            </tr>
            <tr style="font-size: 110%;">
                <!-- <td></td> -->
                <!-- <td>Password:</td> -->
                <td><input type="password" name="pass" placeholder="Password"></td>
                <td></td>
            </tr>
            <!-- nút -->
            <tr style="font-size: 110%;">
                <td colspan="3" align="center" margin-top="20px">
                    <input type="submit" value="LOGIN" name="login">
                </td>
            </tr>
            <?php include('xuly_dangnhap.php');
            ?>
        </table>
    </form>
</body>

</html>