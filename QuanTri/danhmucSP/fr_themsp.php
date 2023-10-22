<?php

$con = mysqli_connect('localhost', 'root', '', 'quantriwebsite');

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (isset($_POST['them'])) {
    // Lấy dữ liệu từ các trường nhập liệu trong form
    $ten_sp = isset($_POST['txt_tensp']) ? $_POST['txt_tensp'] : '';
    $anh_sp = isset($_FILES['anhdaidien']['name']) ? $_FILES['anhdaidien']['name'] : '';
    $gia_ban = isset($_POST['txt_giaban_sp']) ? $_POST['txt_giaban_sp'] : '';
    $gia_mua = isset($_POST['txt_giamua_sp']) ? $_POST['txt_giamua_sp'] : '';
    $hang_sx = isset($_POST['hangsx']) ? $_POST['hangsx'] : '';
    $loai_sp = isset($_POST['loaisp']) ? $_POST['loaisp'] : '';
    $nha_cung_cap = isset($_POST['nhacc']) ? $_POST['nhacc'] : '';
    $mo_ta = isset($_POST['mota']) ? $_POST['mota'] : '';

    // Kiểm tra xem các trường nhập liệu đã được điền đầy đủ hay không
    if (
        $ten_sp == '' || $anh_sp == '' || $gia_ban == '' || $gia_mua == ''
        || $hang_sx == '' || $loai_sp == '' || $nha_cung_cap == '' || $mo_ta == ''
    ) {
        echo "<script language='javascript'>
                            alert('bạn cần nhập đầy đủ thông tin');
                        </script>";
    } else {
        // Thực hiện truy vấn để thêm dữ liệu vào bảng sản phẩm
        $sql_addSP = "INSERT INTO `sanpham`( `tensp`, `anhsanpham`, `giasanpham`, `gia_nhap`, `id_nhacungcap`, `id_hangsp`, `id_loaisp`, `mota_sp`) 
        VALUES ('$ten_sp','$anh_sp','$gia_ban','$gia_mua','$nha_cung_cap','$hang_sx','$loai_sp','$mo_ta');";
        $result = mysqli_query($con, $sql_addSP);

        // Kiểm tra kết quả trả về từ hàm mysqli_query()
        if ($result) {
            echo "<script language='javascript'>
                    alert('Đã thêm thành công');
                    window.open('./index.php?admin=DSsanpham', '_self', 1);
                </script>";
        } else {
            echo "<script language='javascript'>
                    alert('Thêm thất bại');
                    window.open('./index.php?admin=themSP', '_self', 1);
                </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        /* input */
        .search-label {
            display: flex;
            align-items: center;
            box-sizing: border-box;
            position: relative;
            border: 1px solid transparent;
            border-radius: 12px;
            overflow: hidden;
            background: #75787a;
            padding: 9px;
            cursor: text;
        }

        .search-label:hover {
            border-color: gray;
        }



        .search-label input {
            outline: none;
            width: 100%;
            border: none;
            background: none;
            color: #d7d7d7;
        }

        .search-label input:valid {
            width: calc(100% - 22px);
            transform: translateX(20px);
        }

        /* button */
        button {
            background: transparent;
            color: #fff;
            font-size: 17px;
            text-transform: uppercase;
            font-weight: 600;
            border: none;
            padding: 20px 30px;
            perspective: 30rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.308);
        }

        button::before {
            content: '';
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            border-radius: 10px;
            background: linear-gradient(320deg, rgba(0, 140, 255, 0.678), rgba(128, 0, 128, 0.308));
            z-index: 1;
            transition: background 3s;
        }

        button:hover::before {
            animation: rotate 1s;
            transition: all .5s;
        }
    </style>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <h3 style="text-align: center; font-size: 170%;">Thêm sản phẩm</h3>
        <table align="center" border="0" style="margin-top: 50px;">
            <tr style="font-size: 110%;">
                <td>Nhập tên sản phẩm:</td>
                <td class="search-label"><input type="text" name="txt_tensp" placeholder="Nhập tên sản phẩm"></td>
                <td></td>
            </tr>
            <tr style="font-size: 110%;">
                <td>Chọn file ảnh</td>
                <td><input type="file" name="anhdaidien"></td>
                <td></td>
            </tr>
            <tr style="font-size: 110%;">
                <td>Nhập giá bán sản phẩm:</td>
                <td class="search-label"><input type="text" name="txt_giaban_sp" placeholder="Nhập giá bán sản phẩm"></td>
                <td></td>
            </tr>
            <tr style="font-size: 110%;">
                <td>Nhập giá mua sản phẩm:</td>
                <td class="search-label"><input type="text" name="txt_giamua_sp" placeholder="Nhập giá mua sản phẩm"></td>
                <td></td>
            </tr>
            <tr style="font-size:110%;">
                <td>Chọn hãng sản xuất:</td>
                <td>
                    <select name="hangsx">
                        <option>==Chọn hãng sản xuất==</option>
                        <?php
                        $sql = "SELECT * FROM hangsp";
                        $loai = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($loai)) {
                            echo "<option value='" . $row['id_hangsp'] . "'>" . $row['ten_hangsp'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
                <td></td>
            </tr>
            <tr style="font-size: 110%;">
                <td>Chọn loại sản phẩm</td>
                <td>
                    <select name="loaisp">
                        <option>==Chọn loại sản phẩm==</option>
                        <?php
                        $sql = "SELECT * FROM loaisp";
                        $loai = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($loai)) {
                            echo "<option value='" . $row['id_loaisp'] . "'>" . $row['ten_loaisp'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
                <td></td>
            </tr>
            <tr style="font-size: 110%;">
                <td>Chọn nhà cung cấp</td>
                <td>
                    <select name="nhacc">
                        <option>==Chọn nhà cung cấp==</option>
                        <?php
                        $sql = "SELECT * FROM nhacungcap";
                        $nhacc = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($nhacc)) {
                            echo "<option value='" . $row['id_nhacungcap'] . "'>" . $row['ten_ncc'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
                <td></td>
            </tr>
            <tr style="font-size: 110%;">
                <td>Mô tả sản phẩm</td>
                <td class="search-label"><input type="text" name="mota" placeholder="Nhập mô tả sản phẩm"></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <button type="submit" class="btn-signin" style="color: red;" name="them">Thêm Sản Phẩm</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>