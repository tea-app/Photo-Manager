<?php
//require_once('./CurlRequest.php');
//class ComputerVisionApi
//{
//    function __construct ($subscriptionKey, $image)
//    {
//        $this->subscriptionKey = $subscriptionKey;
//        $this->image = $image;
//    }
//    private $uri = 'https://southeastasia.api.cognitive.microsoft.com/vision/v1.0';
//    private $parameters = array(
//        // Request parameters
//        'visualFeatures' => 'Categories,Description,Faces,ImageType',
//        'details' => 'Celebrities',
//        'language' => 'en',
//    );
//    private function headers()
//    {
//        $headers = array(
//            // Request headers
//            'Content-Type: application/octet-stream',
//            'Host: westus.api.cognitive.microsoft.com',
//            'Ocp-Apim-Subscription-Key: ' . $this->subscriptionKey,
//        );
//        return $headers;
//    }
//    private function binaryBody()
//    {
//        $body = $this->image;
//        return $body;
//    }
//    private function urlBody()
//    {
//        $body = "{'url':'{$this->image}'}";
//    }
//    private function option()
//    {
//        $opt = array(
//            //curl options
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_SSL_VERIFYPEER => false,
//            CURLOPT_SSL_VERIFYHOST => false,
//            CURLOPT_VERBOSE => true,
//            CURLOPT_POST => true,
//            CURLOPT_HTTPHEADER => self::headers(),
//            CURLOPT_POSTFIELDS => self::binaryBody(),
//        );
//        return $opt;
//    }
//    public function request ()
//    {
//        $client = new CurlRequest($this->uri);
//        $result = $client->request($this->parameters, self::option());
//        $array_data = json_decode($result, true);
//        return $array_data;
//    }
//    public function get ($key)
//    {
//        $data = new ArrayData(self::request());
//        return $data->get_value($key);
//    }
//}
//
//$cva = new ComputerVisionApi('0934d4f4cbc642d5a051a99a65bbdab6', 'https://www.godata:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABICAMAAABiM0N1AAAAA3NCSVQICAjb4U/gAAABzlBMVEVMaXHd1fD6+P2WlJekoKrd2+H69/9ybn36+P4AADT8+v/28P/k4unz8Pf5+f+DgoXDwcd7fXfQzNe+u8Pz7P+Gi3r59v/38//49f/+/P+lo6qwrbX7+P+sqLX9/f9scWWNiZXU0drr6u7k5Oj19fnW09rb2OHJx8+joqexrrWXk56rqax+gHhcVW8AAAC2tLtjXHa6r8/v7vKNiJUAAA98eIPGxMzJxs3////Y096TkpS15h226B246hy98By56xy67Ry77hy36hiPtBq15Ry16BNpejy15xx1kSJfdxjB9Ryt3Byx4BuLsByRj5SaxgKn1RGKkXi+9BJ7mxuCoxqp2AtAThey4xJ0izGKiYuGrAau3RGGlWE+RiSm0xtJWhiBpQmdyBSfyB94f2iMswlweVhZV1vFw8pxjBxykQIlJxuTm4G25xlofyK46w+bmZ+4t7mBnilgZ0+izwtTUVWOmXN6d4Cq1x2FpyC67hGFoD1nghB1lBKLj4M4QhswOhVUZxt0khlXbBt/iGh5mg+WwQBvgUKXvxmXl5SVuxtoeTdUYDZ9il4zNyVnfStQYCCp0Tt0hUkAAB2o1hxWZyNcXFqtqbVpamZodEl+fIGEAOPJAAAAO3RSTlMAMVzlz8+HhnUwYQ+ONQX9z/xzxCP+PVdLHf3wpbZ73Iyxv6uU8oiM596u+umeHMexMPy7MOnf7iFi9nA3gUYAAAMoSURBVFiF7dfnW9pAHAfwKKVNHeCedWvV7j2e3CUXgUY2lg2tyqp7z7r3bu3uv9uQIIKkz5OLvOjTx+8reJEPv7v73eUgiKtc5V+NRhuL2NS5WZAmj4MzR9qaxhKSJMsuA+XWWlnGcejanpsbudfQoCqqUCqRJwYKQGQwGLwOh9m+5S9RCF1/Z6DEcICPaeb4ZfUlITEQxW5nBaKg/UDRKmZAFLtUdAmIgUkIBCOtCqDGJZp/GHU7TSBZUv+AAuiOlYlX0evp+85wieXzFhfiQ5MhoRKot3o2YaIoNPQQH/I7xKc5ZN5Yt4ifgVuLXVKezXE2N8Ck+yZKetP0A1zo1ufR84WnrX3i4rGDamxo7HzdeWltnxGaYQcbahtkUrv60KOPD45ZwYYG+lFqV9NbrjgM+6/hQvO61Ioo2Dts5kuCOmxotit9oyGjDiqCPlyAGJcRZQUCFg+bFYii3yuraDYI0iE2DgHLah4mNBlgJCBqfAQT0jw5HZWGsI9bmwOmQ5/iEP21CRdS73nTZ8ksdEFUhQsRpb60TUIJLKePteBCVRPp2y3RmAEbdknkgZ2RkJafF+BKef5diZrQF+NqaRWJJamnQyBT6mK9Uz9+FWDdBNpjXi5TogCioiedlRgvguqOFVYCig/QMlXeVqiRLbUWf5SGKI52j9XIv32VqQJpDQ4gTM4aMAW08m+FzUOpLQDMVmsvm6RQ+LfsO1NVT+rYwIJzcM1oTkrMfnG+XKnGndoBALEW57ArWRQbrZUr3V+80JSA1RvXw6bEN3pabp83+TK6G9Dh4TEkFgXttkp5UL5tN7O7GWDcAOJyIt+LV/Kklr2L7wFhfMbTBeEHwMxquzzoerlDYsNxcLFPnCd4dEMeRNRGJU4TCgCPVRhc1xu5UMn2uATEXwfCAA8iOnYkdy4QR4wBkX67xAF3FgyIeP0zgCQmHB8iyE5fkP0LhQURRFFkM8hAKQsT0tTfLZ+yuxnEQEjp+SSnHOJBfCrqBiaWna5Q6G08NCuEHh2awH49EUR9ZWndI1UPn4ivW4hz/mmz0j/j+Tl8Ht8U8yxHoXKV/zR/AGRAbCui4PYjAAAAAElFTkSuQmCCogle.co.jp/images/branding/googleg/1x/googleg_standard_color_128dp.png');
//var_dump($cva->request());
?>