<?php
$query=urlencode(htmlspecialchars($_GET["q"]));
$start=urlencode(htmlspecialchars($_GET["start"]));
$url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&rsz=6"
    . "&cx=007378807232701040835:xn_df6yj0ly&key=ABQIAAAAMcOFIsNMan4dlBLjEh68fBS0x3ta7jNbb-6_cQDgPKFKmlZvVhTAx-TcTX01PBpRx5o6zC7FlKws-A"
		. "&q=" . $query . "&start=" . $start;
//echo phpinfo();
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, "http://www.purplexsu.net/");
$body = curl_exec($ch);
curl_close($ch);

// now, output the JSON string
Header("Content-type:text/javascript; charset=utf-8");
echo $body;
?>