<?php

$con = mysqli_connect('localhost', 'root', '', 'quantriwebsite');

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
if (isset($_GET['id_lsp'])) {
    $id_sua = mysqli_real_escape_string($con, $_GET['id_lsp']);
    $sql_sp = "SELECT * FROM `loaisp` WHERE id_loaisp = '$id_sua'";
    $kq = mysqli_query($con, $sql_sp);
    if (mysqli_num_rows($kq) > 0) {
        $rowSP = mysqli_fetch_array($kq);
        if (isset($_POST['update'])) {
            $ten_lsp = isset($_POST['txt_tenLoai']) ? $_POST['txt_tenLoai'] : '';
            if (
                $ten_lsp == ''
            ) {
                echo "<script language='javascript'>
                                alert('bạn cần nhập đầy đủ thông tin');
                            </script>";
            } else {
                $sql_addLSP = "UPDATE `loaisp` SET `ten_loaisp`= '$ten_lsp' WHERE `id_loaisp` = '$id_sua' ";
                $result = mysqli_query($con, $sql_addLSP);

                if ($result) {
                    echo "<script language='javascript'>
                        alert('Đã cập nhật thành công');
                        window.open('./index.php?admin=DSloai', '_self', 1);
                    </script>";
                } else {
                    echo "<script language='javascript'>
                        alert('Cập nhật thất bại');
                        window.open('./index.php?admin=themL', '_self', 1);
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
                <h3 style="text-align: center; font-size: 170%;">Cập nhật loại Sản phẩm</h3>
                <table align="center" border="0" style="margin-top: 50px;">

                    <tr style="font-size: 110%;">
                        <td class="search-label"><input type="text" name="txt_tenLoai" value="<?php echo $rowSP['ten_loaisp'] ?>" placeholder="Nhập loại sản phẩm"></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <button type="submit" class="btn-signin" style="color: red; margin-top:20px;" name="update">Cập nhật</button>
                        </td>
                    </tr>
                </table>

            </form>
        </body>

        </html>
<?php
    }
}

?>