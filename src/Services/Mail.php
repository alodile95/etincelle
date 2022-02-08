<?php

namespace App\Services;

use Mailjet\Client;
use Mailjet\Resources;

class Mail
{
    private $api_key = '0dbecc247d4d51ad1c98d3efe8a92e12';
    private $api_key_secret = '17867f28ab3e214752fa07bb51b1e4a4';

    public function send($to_email, $to_name, $subject, $content)
    {
        $mj = new Client($this->api_key, $this->api_key_secret,true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "alodile95@gmail.com",
                        'Name' => "Étincelle-Vittoz"
                    ],
                    'To' => [
                        [
                            'Email' => "$to_email",
                            'Name' => "$to_name"
                        ]
                    ],
                    'TemplateID' => 3573472,
                    'TemplateLanguage' => true,
                    'Subject' => $subject,
                    'Variables' => [
                        'content' => $content,
                    ]
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
    }

}