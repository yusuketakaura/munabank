<?php
    include "db.php";
try {
    $manager_code = $_POST['code'];
    $manager_pass = $_POST['pass'];

    $manager_code = htmlspecialchars($manager_code,ENT_QUOTES,'UTF-8');
    $manager_pass = htmlspecialchars($manager_pass,ENT_QUOTES,'UTF-8');

    $manager_pass = md5($manager_pass);

    $dbh=dbConnect();
    /*
    $dsn = 'mysql:dbname=facility; host=localhost; charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    */

    $sql = 'SELECT name FROM tbl_manager WHERE code=? AND password=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $manager_code;
    $data[] = $manager_pass;
    $stmt->execute($data);

    $dbh = null;

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($rec == false) {
        print 'スタッフコードかパスワードが間違っています。<br>';
        print '<a href="manager_login.html"> 戻る</a>';
    } else {
        session_start();
        $_SESSION['login'] = 1;
        $_SESSION['manager_code'] = $manager_code;
        $_SESSION['manager_name'] = $rec['name'];
        header('Location:../shop/shop_top.php');
        exit();
    }

} catch (Exception $e) {
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}

