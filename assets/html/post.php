<!DOCTYPE html>
<html lang=ja>
    <head>
        <meta charset = "utf-8">
        <title>Photo-Manager</title>
        <!--index.cssのリンクタブ-->
        <link href="assets/css/post.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <!--###ヘッダ###ー-->

        <header>
            <div class="header-box">
                <!---alt属性は写真の属性を表す、特に意味のないときは""と書いておく--->
                <a class="logo" id="logo" href="../html/index.php"><img src="../img/post-logo02.png" alt=""></a>
                <!--のちにアイコンをPhoto-ManegerとPostで分ける-->
<!--                <a class="logo" id="logo" href="index.php"><img src="assets/img/post.png" alt=""></a>-->
                <a class="acount-icon" href="../html/index.php"><img src="../img/icon.png"></a>
            </div>
        </header>
        <!--###メイン###-->
        <div class = "main">
           <div class="container">
              <div class="posthover">
                <div class="postphoto">
                  <img class="postphoto-img" src="./assets/img/DSCF2571.jpg" width="550px;" height="400px">
                  <form>
                    <label class="form-file" for="file_photo">
                    	＋choose photo
                    	<input type="file" id="file_photo" name="img" style="display:none;">
                    </label>
                    <input class="form-submit" type="submit" value="Post">

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
