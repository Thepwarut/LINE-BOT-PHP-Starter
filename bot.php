<?php

// example: https://github.com/onlinetuts/line-bot-api/blob/master/php/example/chapter-01.php

include ('line-bot-api/php/line-bot.php');

$channelSecret = '2955a4a0afede99d8681691bbfea167f';
$access_token  = 'Q9mBh6gIvVPV0WwarYpIJgX2KgaSB8+EVOLQs0ArwbV70v/wy9TSRiDqE5tdWMVBu9f5Hfkhg1IQZo7t75pihBIfiXhf7VSfm4yPB3MzQisRg4pUVXUYgU5ZHhDQP3IoB4Lcw1XntAz8k2Y22GGjCgdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {
		
	$bot->replyMessageNew($bot->replyToken, json_encode($bot->message));

	if ($bot->isSuccess()) {
		echo 'Succeeded!';
		exit();
	}

	// Failed
	echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
	exit();

}
