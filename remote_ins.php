<?php

// init the resource
$ch = curl_init();

$postData = array(
    'login' => '<admin></admin>',
    'pwd' => 'admin',
    'redirect_to' => 'http://152.62.101.224/MyReport_view.php',
    'testcookie' => '1'
);

// set options
curl_setopt_array($ch, array(
    CURLOPT_URL => 'http://152.62.101.224/index.php?signIn=1',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData,
    CURLOPT_FOLLOWLOCATION => true
));

// execute
$output = curl_exec($ch);
echo $output;

// free
curl_close($ch);

?>