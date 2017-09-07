<!DOCTYPE html>
<html lang=ja>
    <head>
        <meta charset = "utf-8">
        <title>Photo-Manager</title>
        <!--index.cssのリンクタブ-->
        <link href="../css/post.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <!--###ヘッダ###ー-->

        <header>
            <div class="header-box">
                <!---alt属性は写真の属性を表す、特に意味のないときは""と書いておく--->
                <a class="logo" id="logo" href="./index.php"><img src="../img/post-logo02.png" alt=""></a>
                <!--のちにアイコンをPhoto-ManegerとPostで分ける-->
<!--                <a class="logo" id="logo" href="index.php"><img src="assets/img/post.png" alt=""></a>-->
                <a class="acount-icon" href="./index.php"><img src="../img/icon.png"></a>
            </div>
        </header>
        <!--###メイン###-->
        <div class = "main">
           <div class="container">
              <div class="posthover">
                <div class="postphoto">
                  <img class="postphoto-img" src="../img/DSCF2571.jpg" width="550px;" height="400px">
                  <form>
                    <label class="form-file" for="file_photo">
                        <form action="../../app/photo_manager.php" method="post" enctype="multipart/form-data">
                    	＋choose photo
                    	<input type="file" id="file_photo" name="image" style="display:none;">
                        <input class="form-submit" type="submit" value="upload">
                        </form>
                        
<!--
                        <form action="../../app/photo_manager.php" method="post" enctype="multipart/form-data">
                            input typeは"fileを設定する
                            <input type="file" name="image">
                            <input type="submit" value="upload">
                        </form>
-->
                        
                    </label>

                      <h2>-  自分の世界を伝えよう  -</h2>

                      

                  </form>
                </div>
              </div>
          </div>
       </div>
        <!--###フッタ###ー-->
        <footer id="footer">
        </footer>
    </body>
</html>