<?php


function curl_get($base_url){
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $base_url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($curl);
    
    curl_close($curl);

    return $response;
}
