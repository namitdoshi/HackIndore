<?php
$text = 'hello';
echo $_GET['text'];
    $apiKey = 'AIzaSyCItapntReqhBy7CBO8A3UvJy0FU6MejQ8';
    $url = 'https://www.googleapis.com/language/translate/v2/detect?key=' . $apiKey . '&q=' . rawurlencode($text) . '&target=en&model=nmt';
    //$url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey;
    $handle = curl_init($url);
    //curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE);
    //curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($handle);
    echo "<pre>";
    print_r($response);
    echo "</pre>";
    $responseDecoded = json_decode($response, true);
   // print_r($responseDecoded['data']['detections']);
    curl_close($handle);
    
     $lang = $responseDecoded['data']['detections'][0][0]['language'];
     echo $lang;
    if($lang!='en') {

    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source=en&target=hi&model=nmt';
    //$url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey;
    $handle = curl_init($url);
    //curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE);
    //curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($handle);
    echo "<pre>";
    print_r($response);
    echo "</pre>";
    //$responseDecoded = json_decode($response, true);
    curl_close($handle);
    }
    
    die;
    ?>