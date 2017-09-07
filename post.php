<!DOCTYPE html>
<html lang=ja>
    <head>
        <meta charset = "utf-8">
        <script src="assets/js/aws-sdk.min.js"></script>
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <title>Photo-Manager</title>
        <!--index.cssのリンクタブ-->
        <link href="assets/css/post.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <!--###ヘッダ###ー-->

        <header>
            <div class="header-box">
                <!---alt属性は写真の属性を表す、特に意味のないときは""と書いておく--->
                <a class="logo" id="logo" href="./index.php"><img src="assets/img/post-logo02.png" alt=""></a>
                <!--のちにアイコンをPhoto-ManegerとPostで分ける-->
<!--                <a class="logo" id="logo" href="index.php"><img src="assets/img/post.png" alt=""></a>-->
                <a class="acount-icon" href="./index.php"><img src="assets/img/icon.png"></a>
            </div>
        </header>
        <!--###メイン###-->
        <div class = "main">
           <div class="container">
              <div class="posthover">
                <div class="postphoto">
                  <img class="postphoto-img" src="assets/img/DSCF2571.jpg" width="550px;" height="400px">
                    <form>
                        <label class="form-file" for="form-input-file">
                            ＋choose photo
                            <input id="form-input-file" name="image" type="file" accept="image" style="display:none;">
                        </label>
                    </form>
                    <button class="form-submit" type="button" id="form-input-submit">Upload</button>


                      <h2>-  自分の世界を伝えよう  -</h2>

                      

                </div>
              </div>
          </div>
       </div>
        <!--###フッタ###ー-->
        <footer id="footer">
        </footer>
        <script src="assets/js/app.js"></script>
    </body>
</html>
