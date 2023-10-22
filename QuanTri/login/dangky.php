<?php
//include('../connect.php');
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
        <h3 style="text-align: center; font-size: 170%;">Đăng ký tài khoản</h3>
        <table align="center" boder="0" margin-top="50px">
            <!-- dòng thứ nhất -->
            <tr style="font-size: 110%;">
                <!-- <td></td> -->
                <td></td>
                <td><input type="text" name="user" placeholder="Enter Username"></td>
                <td></td>
            </tr>
            <tr style="font-size: 110%;">
                <!-- <td></td> -->
                <td></td>
                <td><input type="text" name="pass" placeholder="Enter Password"></td>
                <td></td>
            </tr>
            <tr style="font-size: 110%;">
                <!-- <td></td> -->
                <td></td>
                <td><input type="text" name="confirmPass" placeholder="Confirm Password"></td>
                <td></td>
            </tr>
            <!-- nút -->
            <tr style="font-size: 110%;">
                <td colspan="3" align="center" margin-top="20px">
                    <input type="submit" value="Đăng ký" name="register">
                </td>
            </tr>
            <?php include('./QuanTri/login/xuly_dangky.php')
            ?>
        </table>
    </form>
</body>

</html>