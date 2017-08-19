<?php
$access_token = 'Q9mBh6gIvVPV0WwarYpIJgX2KgaSB8+EVOLQs0ArwbV70v/wy9TSRiDqE5tdWMVBu9f5Hfkhg1IQZo7t75pihBIfiXhf7VSfm4yPB3MzQisRg4pUVXUYgU5ZHhDQP3IoB4Lcw1XntAz8k2Y22GGjCgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
