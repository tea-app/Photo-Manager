<?php
$uri = "https://s3-ap-northeast-1.amazonaws.com/static.magazine.tabitatsu.jp/magazine/wp-content/uploads/2016/08/venezia1-700x500.jpg";
//$uri = $_POST['uri'];
//$filename = $_POST['name'];
$filename = 'o128010241279100257201.jpg';

//var_dump($file);
$url = 'https://southeastasia.api.cognitive.microsoft.com/vision/v1.0/analyze';
$parameters = array(
        'visualFeatures' => 'Categories',
        'details' => 'Celebrities',
        'language' => 'en',
);
$headers = array(
            'Content-Type: application/json',
            'Ocp-Apim-Subscription-Key: 0934d4f4cbc642d5a051a99a65bbdab6',
);
$opt = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_VERBOSE => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => urlBody($uri),
);
$ch = curl_init($url . '?' . http_build_query($parameters));
curl_setopt_array($ch, $opt);
$result = curl_exec($ch);
curl_close($ch);
//var_dump(gettype($value));
$data = json_decode($result, true);
//var_dump($result);
var_dump($data);
//echo count($data["categories"]);
//echo $data["categories"][0]["name"];
for($i=0;$i<count($data["categories"]); $i++){
//    echo $data["categories"][$i]["name"];
//    echo "\n";
    $tag_set[] = array($i => $data["categories"][$i]["name"]);
}

function urlBody($uri)
{
    $body = "{ 'url' : '$uri'}";
    return $body;
}

var_dump($tag_set);

require_once(__DIR__.'/app/connect.php');
require_once(__DIR__.'/app/Photo.php');
$pdo = connect();
var_dump($pdo);
$photo = new Photo($pdo);
$photo->insert($filename);
$stmt = $pdo->prepare('SELECT * FROM photos WHERE filename = :filename');
$stmt->bindValue(':filename', $filename, PDO::PARAM_STR);
$stmt->execute();
$info = $stmt->fetchAll();
var_dump($info);
$id = $info[0]['id'];
foreach ($tag_set as $tag){
    $stmt = $pdo->prepare('SELECT * FROM tagnames WHERE name = :name');
    $stmt->bindValue(':name', $tag, PDO::PARAM_STR);
    $stmt->execute();
    $info2 = $stmt->fetchAll();
    $tag_id_set[] = $info2[0]['tag_id'];
}
foreach ($tag_id_set as $tag_id) {
    $stmt = $pdo->prepare('INSERT INTO tags (id, tag_id) VALUES (:id, :tag_id)');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':tag_id', $tag_id, PDO::PARAM_INT);
    $stmt->execute();
}

return;