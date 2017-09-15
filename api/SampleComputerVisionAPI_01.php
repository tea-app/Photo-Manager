<?php
//******画像を直接アプロードし画像解析を行う******//

//解析した画像を$fileに代入する
$file = 'sample.jpg';

//APIを利用できるエリア別のurl：West US,East US 2,West Central US,West Europe,Southeast Asia(In Japan)
$url = 'https://southeastasia.api.cognitive.microsoft.com/vision/v1.0/analyze';

//画像解析する際のパラメータを指定
$parameters = array(
    //視覚的特徴 => カテゴリー(Tags,Description,Faces,ImageType,Color,Adult,)
    'visualFeatures' => 'Categories,Tags',
    //詳細設定 => 'Celebrities' - 画像で検出した有名人を特定する ('Landmarks' - 画像で検出したランドマークを特定する)
    'details' => 'Celebrities,Landmarks',
    //認識結果の文字列を指定 => 'en' - 英語 ('zh' - 簡体字中国語)
    'language' => 'en',
);

//クエリ関数を用いてブラウザに渡すデータ
$opt = array(
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/octet-stream',
        'Ocp-Apim-Subscription-Key: Your Key'
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

//解析結果の配列を出力
var_dump($data);

return;