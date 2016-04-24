<?php


$postData = array(
    'login' => '<admin></admin>',
    'pwd' => 'admin',
    'redirect_to' => 'http://152.62.101.224/',
    'testcookie' => '1'
);

curl_setopt_array($ch, array(
    CURLOPT_URL => 'http://152.62.101.224/index.php?signIn=1',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData,
    CURLOPT_FOLLOWLOCATION => true
));

$output = curl_exec($ch);
echo $output;


?>