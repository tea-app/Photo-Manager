<?php
//******画像を直接アプロードし画像解析を行う******//

//post.phpのformタグから直接画像データをアップロードする
$file = $_POST['image'];
//デバック確認
//var_dump($file);

//APIを利用できるエリア別のurl：West US,East US 2,West Central US,West Europe,Southeast Asia(In Japan)
$url = 'https://southeastasia.api.cognitive.microsoft.com/vision/v1.0/analyze';

//リクエストするsパラメータを指定
$parameters = array(
    //視覚的特徴 => カテゴリー(Tags,Description,Faces,ImageType,Color,Adult,)
    'visualFeatures' => 'Categories',
    //詳細設定 => 'Celebrities' - 画像で検出した有名人を特定する ('Landmarks' - 画像で検出したランドマークを特定する)
    'details' => 'Celebrities',
    //認識結果の文字列を指定 => 'en' - 英語 ('zh' - 簡体字中国語)
    'language' => 'en',
);

//クエリ関数を用いてブラウザに渡すデータ
$opt = array(
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/octet-stream',
        'Ocp-Apim-Subscription-Key: 0934d4f4cbc642d5a051a99a65bbdab6'
    ),
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS  => file_get_contents($file),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_BINARYTRANSFER => true,
);

// 新しい cURL リソースを作成します
$ch = curl_init($url . '?' . http_build_query($parameters));

curl_setopt_array($ch, $opt);

// URL を取得し、ブラウザに渡す
$result = curl_exec($ch);

// cURL リソースを閉じ、システムリソースを解放する
curl_close($ch);

//認識結果のJsonを連想配列に代入
$data = json_decode($result, true);
//デバック確認
//var_dump($data);



//******以下、DB処理******//

//echo count($data["categories"]);
//echo $data["categories"][0]["name"];
//for($i=0;$i<count($data["categories"]); $i++){
////    echo $data["categories"][$i]["name"];
////    echo "\n";
//    $tag_set[] = array($i => $data["categories"][$i]["name"]);
//}

//require_once(__DIR__.'/app/connect.php');
//require_once(__DIR__.'/app/Photo.php');
//
//$pdo = connect();
//$photo = new Photo($pdo);
//$photo->insert($filename);
//
//
//$stmt = $pdo->prepare('SELECT * FROM photos WHERE filename = :filename');
//$stmt->bindValue(':filename', $filename, PDO::PARAM_STR);
//$stmt->execute();
//$info = $stmt->fetchAll();
//$id = $info[0]['id'];
//
//foreach ($tag_set as $tag) {
//    $stmt = $pdo->prepare('SELECT * FROM tagnames WHERE name = :name');
//    $stmt->bindValue(':name', $tag, PDO::PARAM_STR);
//    $stmt->execute();
//    $info = $stmt->fetchAll();
//    $tag_id_set[] = $info[0]['name'];
//}
//
//foreach ($tag_id_set as $tag_id) {
//    $stmt = $pdo->prepare('INSERT INTO tags (id, tag_id) VALUES (:id, :tag_id)');
//    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
//    $stmt->bindValue(':tag_id', $tag_id, PDO::PARAM_INT);
//    $stmt->execute();
//}

return;