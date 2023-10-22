<?php

$con = mysqli_connect('localhost', 'root', '', 'quantriwebsite');

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (isset($_GET['id_sanpham'])) {
    $id_sua = mysqli_real_escape_string($con, $_GET['id_sanpham']);
    $sql_sp = "SELECT * FROM `sanpham` WHERE id_sanpham = '$id_sua'";
    $kq = mysqli_query($con, $sql_sp);
    if (mysqli_num_rows($kq) > 0) {
        $rowSP = mysqli_fetch_array($kq);

        if (isset($_POST['capnhat'])) {
            $ten_sp = isset($_POST['txt_tensp']) ? mysqli_real_escape_string($con, $_POST['txt_tensp']) : '';
            $anh_sp = isset($_FILES['anhdaidien']['name']) ? mysqli_real_escape_string($con, $_FILES['anhdaidien']['name']) : '';
            $gia_ban = isset($_POST['txt_giaban_sp']) ? mysqli_real_escape_string($con, $_POST['txt_giaban_sp']) : '';
            $gia_mua = isset($_POST['txt_giamua_sp']) ? mysqli_real_escape_string($con, $_POST['txt_giamua_sp']) : '';
            $hang_sx = isset($_POST['hangsx']) ? mysqli_real_escape_string($con, $_POST['hangsx']) : '';
            $loai_sp = isset($_POST['loaisp']) ? mysqli_real_escape_string($con, $_POST['loaisp']) : '';
            $nha_cung_cap = isset($_POST['nhacc']) ? mysqli_real_escape_string($con, $_POST['nhacc']) : '';
            $mo_ta = isset($_POST['mota']) ? mysqli_real_escape_string($con, $_POST['mota']) : '';

            if (
                $ten_sp == '' || $anh_sp == '' || $gia_ban == '' || $gia_mua == ''
                || $hang_sx == '' || $loai_sp == '' || $nha_cung_cap == '' || $mo_ta == ''
            ) {
                echo "<script language='javascript'>
                            alert('Bạn cần nhập đầy đủ thông tin');
                            window.open('./index.php?admin=suaSP', '_self', 1);
                        </script>";
            } else {
                $sql_sp_sua = "UPDATE `sanpham` SET `tensp`='$ten_sp',`anhsanpham`='$anh_sp',`giasanpham`='$gia_ban',`gia_nhap`='$gia_mua',
        `id_nhacungcap`='$nha_cung_cap',`id_hangsp`='$hang_sx',`id_loaisp`='$loai_sp',`mota_sp`='$mo_ta' WHERE id_sanpham='$id_sua'";
                $result = mysqli_query($con, $sql_sp_sua);

                if ($result) {
                    echo "<script language='javascript'>
                    alert('Cập nhật thành công');
                    window.open('./index.php?admin=DSsanpham', '_self', 1);
                </script>";
                } else {
                    echo "<script language='javascript'>
                    alert('Cập nhật thất bại');
                    window.open('./index.php?admin=suaSP', '_self', 1);
                </script>";
                }
            }
        }

?>
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

        <body>
            <form method="post" enctype="multipart/form-data">
                <h3 style="text-align: center; font-size: 170%;">Cập nhật sản phẩm</h3>
                <table align="center" boder="0" margin-top="50px">
                    <tr style="font-size: 110%;">
                        <!-- <td></td> -->
                        <td>Nhập tên sản phẩm:</td>
                        <td class="search-label"><input type="text" name="txt_tensp" placeholder="Nhập tên sản phẩm" value="<?php echo $rowSP['tensp'] ?>"></td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 110%;">
                        <!-- <td></td> -->
                        <td>Chọn file ảnh</td>
                        <td><input type="file" name="anhdaidien" value="<?php echo $rowSP['anhsanpham'] ?>"></td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 110%;">
                        <!-- <td></td> -->
                        <td>Nhập giá bán sản phẩm:</td>
                        <td class="search-label"><input type="text" name="txt_giaban_sp" placeholder="Nhập giá bán sản phẩm" value="<?php echo $rowSP['giasanpham'] ?>"></td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 110%;">
                        <!-- <td></td> -->
                        <td>Nhập giá mua sản phẩm:</td>
                        <td class="search-label"><input type="text" name="txt_giamua_sp" placeholder="Nhập giá mua sản phẩm" value="<?php echo $rowSP['gia_nhap'] ?>"></td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 110%;">
                        <!-- <td></td> -->
                        <td>Chọn hãng sản xuất:</td>
                        <td><select name="hangsx">
                                <option><?php
                                        $id_h = $rowSP['id_hangsp'];
                                        $sql = "select * from hangsp where id_hangsp = $id_h";
                                        echo $rowSP['id_hangsp'];
                                        ?></option>
                                <?php
                                $sql = "select * from hangsp";
                                $loai = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($loai)) {
                                    echo "<option value=" . $row['id_hangsp'] . ">" . $row['ten_hangsp'] . "</option>";
                                }
                                ?>
                            </select></td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 110%;">
                        <!-- <td></td> -->
                        <td>Chọn loại sản phẩm</td>
                        <td><select name="loaisp">
                                <option><?php echo $rowSP['id_loaisp'] ?></option>
                                <?php
                                $sql = "select * from loaisp";
                                $loai = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($loai)) {
                                    echo "<option value=" . $row['id_loaisp'] . ">" . $row['ten_loaisp'] . "</option>";
                                }
                                ?>
                            </select></td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 110%;">
                        <!-- <td></td> -->
                        <td>Chọn nhà cung cấp</td>
                        <td><select name="nhacc">
                                <option><?php echo $rowSP['id_nhacungcap'] ?></option>
                                <?php
                                $sql = "select * from nhacungcap";
                                $nhacc = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($nhacc)) {
                                    echo "<option value=" . $row['id_nhacungcap '] . ">" . $row['ten_ncc'] . "</option>";
                                }
                                ?>
                            </select></td>
                        <td></td>
                    </tr>

                    <tr style="font-size: 110%;">

                        <td>Mô tả sản phẩm</td>
                        <td class="search-label"><textarea name="mota" placeholder="Nhập mô tả sản phẩm" rows="5" style="width: 300px;" value=""><?php echo $rowSP['mota_sp'] ?></textarea></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4" align="center">
                            <button type="submit" class="btn-signin" style="color: red;" name="capnhat">Cập nhật Sản Phẩm</button>
                        </td>
                    </tr>
                </table>
            </form>
        </body>
<?php
    }
}
?>