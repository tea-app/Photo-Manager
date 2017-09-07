<?php

//$uri = "https://tour.tabikobo.com/uploads/image/61395.jpg";
$uri = $_POST['uri'];
$file = $_POST['body'];
var_dump($file);

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
    $tag_set = $data["categories"][$i]["name"];
}


function urlBody($uri)
{
    $body = "{ 'url' : '$uri'}";
    return $body;
}

return;