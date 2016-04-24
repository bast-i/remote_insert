<?php

$client = new \GuzzleHttp\Client();

$response = $client->post('http://152.62.101.224/index.php?signIn=1', [
    'body' => [
        'admin' => $username,
        'admin' => $password,
        'action' => 'login'
    ],
    'cookies' => true
]
);

$xml = $response;
echo $xml;