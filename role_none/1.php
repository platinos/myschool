<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,$api_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "func=viewquestion");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$output = curl_exec ($ch);
$feed = json_decode($output, true);
if($feed['error']==true)
{

echo 'err';
}
else {
  echo "sahi";
}
 ?>
