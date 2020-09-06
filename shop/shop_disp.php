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
            <h2>施設情報参照</h2>

<?php
    include "../db.php";
try {
    $shop_code = $_GET['shopcode'];

    $dbh=dbConnect();

    $sql = 'SELECT code, name, type, url FROM tbl_shop WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $shop_code;
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $shop_name = $rec['name'];
    $shop_type = $rec['type'];
    $shop_url = $rec['url'];

    $dbh = null;
} catch (Exception $e) {
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}
?>

            施設コード<br>
<?php print $shop_code;?>
            <br>
            <br>
            施設名<br>
<?php print $shop_name; ?>
            <br>
            <br>
            施設種別<br>

<?php 
  $codes = array(1=>'公共施設', 2=>'コンビニエンスストア', 3=>'ホームセンター', 4=>'ショッピングセンター', 5=>'ドラッグストア', 6=>'百貨店', 7=>'スーパー・食料品店');
 $i  = $rec['type'];     // 数字の種別を取得
 print  $codes[$i]  ; 
?>

            <br>
            <br>
            ＵＲＬ名<br>
<?php print $shop_url; ?><br>
<?php print '<a class="link" href="' . $rec['url'] . '" target="_blank">リンクはこちら</a>'?>
            <br>
            <br>
            <form>
                <input type="button" onclick="history.back()" value="戻る">
            </form>
        </section>
        <footer>
        </footer>
    </body>
</html>

