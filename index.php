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
                <li><a href="shop_list.php" class="btn2">施設一覧</a></li>
                <li><a href="shop_list_1.php" class="btn4">公共施設</a></li>
                <li><a href="shop_list_2.php" class="btn4">コンビニエンスストア</a></li>
                <li><a href="shop_list_3.php" class="btn4">ホームセンター</a></li>
                <li><a href="shop_list_4.php" class="btn4">ショッピングセンター</a></li>
                <li><a href="shop_list_5.php" class="btn4">ドラッグストア</a></li>
                <li><a href="shop_list_6.php" class="btn4">百貨店</a></li>
                <li><a href="shop_list_7.php" class="btn4">スーパー・食料品店</a></li>
                <li><a href="shop_maps.php" class="btn4">Googleマップ</a></li>
                <li><a href="../manager_login/manager_login.html" class="btn4">管理者用</a><br>
            </ul>
        </header>
        <section>
            <h2>施設一覧</h2>

<?php
    include "db.php";
try {
    $dbh=dbConnect();

/*
    $dsn = 'mysql:dbname=facility; host=localhost; charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
*/

    $sql = 'SELECT code, name, url FROM tbl_shop WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;

    while (true) {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($rec == false) {
            break;
        }
        print '<a class="link" href="'. $rec['url']. '" target="_blank">';//クリックでリンクに移動
        print $rec['name'];
        print '<br>';
    }
} catch (Exception $e) {
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}
?>

        </section>
        <footer>
        </footer>
    </body>
</html>

