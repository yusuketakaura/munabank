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
            <h2>施設情報修正</h2>

<?php
$shop_code = $_POST['code'];
$shop_name = $_POST['name'];
$shop_type = $_POST['type'];
$shop_url = $_POST['url'];

$shop_code = htmlspecialchars($shop_code, ENT_QUOTES, 'UTF-8');
$shop_name = htmlspecialchars($shop_name, ENT_QUOTES, 'UTF-8');
$shop_type = htmlspecialchars($shop_type, ENT_QUOTES, 'UTF-8');
$shop_url = htmlspecialchars($shop_url, ENT_QUOTES, 'UTF-8');

if ($shop_name == '') {
	print '施設名が入力されていません。<br>';
} else {
	print '施設名：';
	print $shop_name;
	print '<br>';
}

print '種別：';
$codes = array(1=>'公共施設', 2=>'コンビニエンスストア', 3=>'ホームセンター', 4=>'ショッピングセンター', 5=>'ドラッグストア', 6=>'百貨店', 7=>'スーパー・食料品店');
$i = $shop_type;     // 数字の種別をで取得
print $codes[$i];
print '<br>';

if ($shop_url == '') {
	print 'URLが入力されていません。<br>';
} else {
	print 'URL：';
	print $shop_url;
	print '<br>';
}

if ($shop_name =='' || $shop_url == '')
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
} else {
	print '上記のように変更します。<br>';
	print '<form method="post" action="shop_edit_done.php">';
	print '<input type="hidden" name="code" value="'.$shop_code.'">';
	print '<input type="hidden" name="name" value="'.$shop_name.'">';
	print '<input type="hidden" name="type" value="'.$shop_type.'">';
	print '<input type="hidden" name="url" value="'.$shop_url.'">';
	print '<br>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="ＯＫ">';
	print '</form>';
}
?>

        </section>
        <footer>
        </footer>
    </body>
</html>

