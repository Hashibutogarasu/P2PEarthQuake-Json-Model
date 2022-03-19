<?php

require "EarthquakeModel.php";

$html = "";
$base_url = "https://api.p2pquake.net/v1/human-readable?limit=3&code=551";
$response = curl_get($base_url);
$json = json_decode($response,true);

for($i=0;$i<count($json);$i++) {
    $earthquake = new EarthquakeModel($json,$i);

    $html = $html. "<br><br>";
    $html = $html.($earthquake->_id->oid);
    $html = $html. "<br>";
    $html = $html.($earthquake->time);
    $html = $html. "<br>";
    $html = $html.($earthquake->created_at);
    $html = $html. "<br>";
    $html = $html.($earthquake->code);
    $html = $html. "<br>";
    $html = $html.($earthquake->issue->type);
    $html = $html. "<br>";
    $html = $html.($earthquake->issue->source);
    $html = $html. "<br>";
    $html = $html.($earthquake->earthquake->time);
    $html = $html. "<br>";
    $html = $html.($earthquake->earthquake->maxScale);
    $html = $html. "<br>";
    $html = $html.($earthquake->earthquake->domesticTsunami);
    $html = $html. "<br>";
    $html = $html.($earthquake->earthquake->hypocenter->name);
    $html = $html. "<br>";
    $html = $html.($earthquake->earthquake->hypocenter->depth);
    $html = $html. "<br>";
    $html = $html.($earthquake->earthquake->hypocenter->magnitude);
    $html = $html. "<br>";
    $html = $html.($earthquake->earthquake->hypocenter->latitude);
    $html = $html. "<br>";
    $html = $html.($earthquake->earthquake->hypocenter->longitude);
    $html = $html. "<br>";
    for($n=0;$n<$earthquake->points->count();$n++){
        $html = $html.($earthquake->points->get($n)->scale);
        $html = $html. "<br>";
        $html = $html.($earthquake->points->get($n)->addr);
        $html = $html. "<br>";
    }
    
}

?>

<?=$html?>