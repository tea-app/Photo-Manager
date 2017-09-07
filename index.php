<?php

// もし検索されたら
// http://domain.com?search=biwako
if (! is_null($_GET['search'])) {
    $tag = $_GET['search'];

    // 絞りこみ
}

// 検索されない場合
else {
   // 全部取得...

}


$imagePaths = array(
    'https://s3-ap-northeast-1.amazonaws.com/tea-liquid-cats/7325.jpg',
    'https://s3-ap-northeast-1.amazonaws.com/tea-liquid-cats/7325.jpg',
    'https://s3-ap-northeast-1.amazonaws.com/tea-liquid-cats/7325.jpg',
    'https://s3-ap-northeast-1.amazonaws.com/tea-liquid-cats/7325.jpg',
    'https://s3-ap-northeast-1.amazonaws.com/tea-liquid-cats/7325.jpg',
    'https://s3-ap-northeast-1.amazonaws.com/tea-liquid-cats/7325.jpg',
    'https://s3-ap-northeast-1.amazonaws.com/tea-liquid-cats/7325.jpg',
    'https://s3-ap-northeast-1.amazonaws.com/tea-liquid-cats/7325.jpg',
    'https://s3-ap-northeast-1.amazonaws.com/tea-liquid-cats/7325.jpg',
    'https://s3-ap-northeast-1.amazonaws.com/tea-liquid-cats/7325.jpg',
);

?>
<!DOCTYPE html>
<html lang=ja>
    <head>
        <meta charset = "utf-8">
        <title>Photo-Manager</title>
        <!--index.cssのリンクタブ-->
        <link href="assets/css/index.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <!--###ヘッダ###ー-->
        <header>
            <div class="header-box">
                <!---alt属性は写真の属性を表す、特に意味のないときは""と書いておく--->
                <a class="logo" id="logo" href="index.php"><img src="assets/img/logo03.png" alt=""></a>
                <input class= "search" type="search" name="search" size="15" autocomplete="on" maxlength="15" placeholder="Search using tag" onkeydown="search(event);">
                <a class="acount-icon" href="index.php"><img src="assets/img/icon.png"></a>
            </div>
        </header>
        <!--###トップ###-->
        <div class = "top">
            <div class = "top-title">
                <h1>さあ、世界を見よう</h1>
            </div>
            <div class = "search-box">
                <input type="text" name="main-search" size="80" autocomplete="on" maxlength="15" placeholder="Search using tag" onkeydown="search(event);">
<!--
                <table>
                    <tr>
                        <td>
                            <img src="assets/img/%E8%99%AB%E7%9C%BC%E9%8F%A101.png">
                        </td>
                        <td>
                            <input type="text" name="main-search" size="80" autocomplete="on" maxlength="15" placeholder="Search using tag">
                        </td>
                    </tr>
                </table>
-->
            </div>
            <div class = "top-bottom">
            </div>
        </div>
        <!--###メイン###-->
        <div class = "main">
            <div class="container">
                <div class = "gallery">
                    <div class = "gallery-bar">
                    </div>
                    <div class = "gallery-main">
                        <?php foreach ($imagePaths as $imagePath) { ?>
                        <div class = "gallery-table">
                            <div class = "gallery-photo">
                                <img src="">
                            </div>
                            <div class = "gallery-photo">
                            </div>
                            <div class = "gallery-photo">
                            </div>
                            <div class = "gallery-photo">
                            </div>
                        </div>

                        <?php } ?>
                        <div class = "gallery-more">
                        <a>more</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!--###フッタ###ー-->
        <footer id="footer">
        </footer>
        <script src="assets/js/search.js"></script>

    </body>
</html>
