<?php

$handle = curl_init();
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_URL,"https://kokkai.ndl.go.jp/api/speech?startRecord=1&from=2020-01-01&recordPacking=json&maximumRecords=1");
$result=curl_exec($handle);
curl_close($handle);

$result = json_decode($result);

var_dump($result);

