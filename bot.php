<?php
 
$strAccessToken = "Q9mBh6gIvVPV0WwarYpIJgX2KgaSB8+EVOLQs0ArwbV70v/wy9TSRiDqE5tdWMVBu9f5Hfkhg1IQZo7t75pihBIfiXhf7VSfm4yPB3MzQisRg4pUVXUYgU5ZHhDQP3IoB4Lcw1XntAz8k2Y22GGjCgdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
}else if($arrJson['events'][0]['message']['text'] == "ชื่ออะไร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "อภิรักษ์";
}

else if($arrJson['events'][0]['message']['text'] == "เปิดไฟหน้าบ้านดวงที่หนึ่ง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = 'https://api.anto.io/channel/set/g6WxzaZHiL344vzOljd6yXN2k0VtC6sJlxhUfsiY/NodeMCU/LED1/1';
  $arrPostData['messages'][0]['text'] = "เปิดไฟหน้าบ้านแล้ว";
}

else if($arrJson['events'][0]['message']['text'] == "ปิดไฟหน้าบ้านดวงที่หนึ่ง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = 'https://api.anto.io/channel/set/g6WxzaZHiL344vzOljd6yXN2k0VtC6sJlxhUfsiY/NodeMCU/LED1/0';
  $arrPostData['messages'][0]['text'] = "ปิดไฟหน้าบ้านแล้ว";
}

else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
}
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>
