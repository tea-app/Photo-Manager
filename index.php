<!DOCTYPE html>
<html lang=ja>
    <head>
        <meta charset = "utf-8">
        <title>Photo-Manager</title>
        <!--index.cssのリンクタブ-->
        <link href="../css/index.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <!--###ヘッダ###ー-->
        <header>
            <div class="header-box">
                <!---alt属性は写真の属性を表す、特に意味のないときは""と書いておく--->
                <a class="logo" id="logo" href="index.php"><img src="../img/logo03.png" alt=""></a>
                <input class= "search "type="search" name="search" size="15" autocomplete="on" maxlength="15" placeholder="Search using tag">
                <a class="acount-icon" href="index.php"><img src="../img/icon.png"></a>
            </div>
        </header>
        <!--###トップ###-->
        <div class = "top">
            <div class = "top-title">
                <h1>さあ、世界を見よう</h1>
            </div>
            <div class = "search-box">
                <input type="text" name="main-search" size="80" autocomplete="on" maxlength="15" placeholder="Search using tag">
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
                        <?php for($i=0; $i<5; $i++) { ?>
                        <div class = "gallery-table">
                            <div class = "gallery-photo">
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
    </body>
</html>