<?php
session_start();
session_regenerate_id(true);
if (isset($_SESSION['login']) == false) {
    print 'ログインされていません。<br>';
    print '<a href="..//manager_login/manager_login.html">ログイン画面へ</a>';
    exit();
} else {
    print $_SESSION['manager_name'];
    print 'ログイン中<br>';
}
?>

<!DOCKTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MUNABANK</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="../sec.js"></script>
    </head>
    <body>
        <header id="header">
            <h1><a href="../index.php"><img src="../logo.png" title="munabank"></a></h1>
            <ul>
                <li><a href="../index.php" class="btn4">トップページ</a></li>
                <li><a href="../shop/shop_list.php" class="btn4">施設一覧</a></li>
                <li><a href="../shop/shop_list_1.php" class="btn4">公共施設</a></li>
                <li><a href="../shop/shop_list_2.php" class="btn4">コンビニエンスストア</a></li>
                <li><a href="../shop/shop_list_3.php" class="btn4">ホームセンター</a></li>
                <li><a href="../shop/shop_list_4.php" class="btn4">ショッピングセンター</a></li>
                <li><a href="../shop/shop_list_5.php" class="btn4">ドラッグストア</a></li>
                <li><a href="../shop/shop_list_6.php" class="btn4">百貨店</a></li>
                <li><a href="../shop/shop_list_7.php" class="btn4">スーパー・食料品店</a></li>
                <li><a href="../shop/shop_maps.php" class="btn4">Googleマップ</a></li>
                <li><a href="../manager_login/manager_login.html" class="btn2">管理者用</a><br>
            </ul>
        </header>
        <section>
            <h2>施設管理一覧</h2>

<?php
    include "../db.php";
try
{
    $dbh=dbConnect();

    $sql = 'SELECT code, name, url FROM tbl_shop WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;

    print '<form method="post" action="shop_branch.php">';

    while (true) {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($rec == false){
            break;
        }
        print '<input type="radio" name="shopcode" value="'.$rec['code']. '">';
        print $rec['name'];
        print '<br>';
    }
print '<input type="submit" name="disp" value="参照">';
print '<input type="submit" name="edit" value="修正">';
print '<input type="submit" name="delete" value="削除">';
print '</form>';
} catch (Exception $e) {
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}
?>

            <br>
            <a class="link" href="shop_top.php">施設管理トップページへ</a>
        </section>
        <footer>
        </footer>
    </body>
</html>

