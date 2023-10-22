<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else
    $action = "";
if (isset($_GET['sp'])) {
    switch ($_GET['sp']) {
        case 'hang':
            include('./layallsp_hang.php');
            break;
        case 'loai':
            include('./layallsp_loai.php');
            break;
        case 'giohang':
            include('./giohang/giohang.php');
            break;
        case 'sanpham':
            include('./giohang/add_giohang.php');
            break;
        case 'dathangall':
            include('./giohang/dathangall.php');
            break;
        case 'dathang':
            include('./giohang/dathang.php');
            break;
        case 'dathangngay':
            include('./giohang/dathangngay.php');
            break;
        case 'dangky':
            include('./QuanTri/login/dangky.php');
            break;
        case 'xoasp':
            include('./giohang/delete_giohang.php');
            break;
        case 'chitietSP':
            include('./chitietsp.php');
            break;
        case 'tim':
            include('./search.php');
            break;
        default:
            break;
    }
} else {
    include("./layallsp.php");
}
