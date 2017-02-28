<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once('./LINEBotTiny.php');

$channelAccessToken = 'SAi/JmOjfgJFLoFf9zIbeLOsYRmH1L7boQ7yWQ3i1HDz1sOcQXVLBel1SPqzCLx21E81g4sj1cU11G5BfyglWpOd2YddstDZocrj1Gbc/IdldKLWCLtc4VkPAu/9ejYMCf1f4BzG3GJaRsDE09Or9gdB04t89/1O/w1cDnyilFU=';
$channelSecret = '61f4908470cde2dbaed84cc00e1aec8c';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':

                    $request = $message['text'];

                    switch ($message['text']) {
                        case '幹我':
                            $request = "我會幹ㄉ你不要不要的";
                            break;
                        
                        case '虎爺我老婆':
                            $request = "家有大貓只是個三次元生物沒有一個真實存在的。";
                            break;

                        case '機器狼可愛':
                            $request = "機器狼只是軟體～～～";
                            break;

                        case '約ㄇ':
                            $request = "幹你娘你每次都會在那邊約嗎然後約你又不來你他媽是三小啦";
                            break;

                        case '我只是想講約ㄇ':
                            $request = "約屁喔操你媽你真的是他媽幹話王耶";
                            break;

                        default:
                            $request = print_r($event);
                            break;
                    }

                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => $request
                            )
                        )
                    ));



                    break;
                default:
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
