<?php
session_start();
session_regenerate_id(true);
if (isset($_SESSION['login']) == false) {
    print 'ログインされていません。<br>';
    print '<a href="../manager_login/manager_login.html">ログイン画面へ</a>';
    exit();
}

if (isset($_POST['disp']) == true) {
    if (isset($_POST['shopcode']) == false) {
        header('Location: shop_ng.php');
        exit();
    }
    $shop_code = $_POST['shopcode'];
    header('Location: shop_disp.php?shopcode='.$shop_code);
    exit();
}

if (isset($_POST['edit']) == true) {
    if (isset($_POST['shopcode']) == false) {
        header('Location: shop_ng.php');
        exit();
    }
    $shop_code = $_POST['shopcode'];
    header('Location: shop_edit.php?shopcode='.$shop_code);
    exit();
}

if (isset($_POST['delete']) == true) {
    if (isset($_POST['shopcode']) == false) {
        header('Location: shop_ng.php');
        exit();
    }
    $shop_code = $_POST['shopcode'];
    header('Location: shop_delete.php?shopcode='.$shop_code);
    exit();
}

