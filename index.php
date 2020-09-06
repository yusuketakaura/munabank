<!DOCKTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MUNABANK</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="sec.js"></script>
    </head>
    <body>
        <header id="header">
            <h1><a href="index.php"><img src="logo.png" title="munabank"></a></h1>
            <ul>
                <li><a href="index.php" class="btn2">トップページ</a></li>
                <li><a href="shop/shop_list.php" class="btn4">施設一覧</a></li>
                <li><a href="shop/shop_list_1.php" class="btn4">公共施設</a></li>
                <li><a href="shop/shop_list_2.php" class="btn4">コンビニエンスストア</a></li>
                <li><a href="shop/shop_list_3.php" class="btn4">ホームセンター</a></li>
                <li><a href="shop/shop_list_4.php" class="btn4">ショッピングセンター</a></li>
                <li><a href="shop/shop_list_5.php" class="btn4">ドラッグストア</a></li>
                <li><a href="shop/shop_list_6.php" class="btn4">百貨店</a></li>
                <li><a href="shop/shop_list_7.php" class="btn4">総合スーパーマーケット</a></li>
                <li><a href="shop/shop_maps.php" class="btn4">Googleマップ</a></li>
                <li><a href="manager_login/manager_login.html" class="btn4">管理者用</a><br>
            </ul>
        </header>
        <section>
            <h1>Overview</h1>
            <hr>
<?php
    print 'MUNABANKは、福岡県宗像市の公共施設及び民間施設を、ジャンル別にまとめたポータルサイトです。<br><br>';
    print 'ジャンルごとにまとめた施設名をクリックすることで、該当の外部リンクに移動することができます。<br><br>';
    print 'Googleマップをクリックすることで、宗像市内の施設の場所を検索することができます。<br><br>';
    print '管理者としてログインすることで、施設情報の参照や、修正、削除、追加をすることもできます。<br><br>';
    print '（※もしうまく表示されない場合は、ページを更新することで解決されます。）<br>';
?>

        </section>
        <footer>
        </footer>
    </body>
</html>

