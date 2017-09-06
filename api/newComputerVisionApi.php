<?php
//require_once('./CurlRequest.php');

echo "hello";

$uri = 'https://southeastasia.api.cognitive.microsoft.com/vision/v1.0/analyze';

$image_file = 'DSCF2507.jpg';

$parameters = array(
        // Request parameters
        'visualFeatures' => 'Categories',
        'details' => 'Celebrities',
        'language' => 'en',
    );

$headers = array(
            // Request headers
            'Content-Type: application/json',
//            'Host: westus.api.cognitive.microsoft.com',
            'Ocp-Apim-Subscription-Key: 0934d4f4cbc642d5a051a99a65bbdab6',
);

$post_data = $image_file;

$opt = array(
            //curl options
            //trueで出力結果を文字列で返す
            CURLOPT_RETURNTRANSFER => true,
            //falseでサーバーの検証を行わない
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_VERBOSE => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => urlBody(),
);

$ch = curl_init($uri . '?' . http_build_query($parameters));
curl_setopt_array($ch, $opt);
$result = curl_exec($ch);
curl_close($ch);
//echo "this is result ===";
//return $result;
var_dump($result);

function urlBody()
    {
    $image = '';
        $body = "{ 'url' : 'http://localhost:8080/Photo-Manager/7325.jpg'}";
    return $body;
    }
?>