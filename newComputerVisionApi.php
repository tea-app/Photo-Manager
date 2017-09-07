<?php

//$uri = "httsps://tea-liquid-cats.s3-ap-northeast-1.amazonaws.com/FullSizeRender3.jpg";
$uri = $_POST['uri'];
//var_dump($uri);

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
var_dump($result);

function urlBody($uri)
{
    $body = "{ 'url' : '$uri'}";
//    $body = array('uri' => $uri);
    return $body;
}

return;