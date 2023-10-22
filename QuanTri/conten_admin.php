<?php
include('../connect.php');
if (isset($_GET['admin']))
    switch ($_GET['admin']) {
        case 'DSsanpham':
            include("./danhmucSP/danhmuc_SP.php");
            break;
        case 'DShang':
            include("fr_nhapsp.php");
            break;

        case 'DSloai':
            include("fr_nhaploai.php");
            break;

        case 'Donhang':
            include("fr_nhaphang.php");
            break;
        case 'chitietSP':
            include('./QuanTri/danhmucSP/chitietsanpham.php');
            break;
    }
