<?php

/*
// init the resource
$ch = curl_init();

$postData = array(
    'login' => 'admin',
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
*/
//username and password of account
$username = 'admin'; //trim($values["email"]);
$password = 'admin'; //trim($values["password"]);

//set the directory for the cookie using defined document root var
//$dir = "/var/www/dev_project1/public_html/ctemp";
//build a unique path with every request to store 
//the info per user with custom func. 
//$path = build_unique_path($dir);

//login form action url
$url="http://152.62.101.224/index.php?signIn=1"; 
$postinfo = "username=".$username."&password=".$password;

//$cookie_file_path = $path."/cookie.txt";
$cookie_file_path = "/var/www/dev_project1/public_html/ctemp//cookie.txt";

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
//set the cookie the site has for certain features, this is optional
curl_setopt($ch, CURLOPT_COOKIE, "cookiename=0");
curl_setopt($ch, CURLOPT_USERAGENT,
    "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
curl_exec($ch);

//page with the content I want to grab
curl_setopt($ch, CURLOPT_URL, "http://152.62.101.224/MyReport_view.php");
//do stuff with the info with DomDocument() etc
$html = curl_exec($ch);


curl_close($ch);



?>