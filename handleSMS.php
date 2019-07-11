<?php
$date   = $_POST["date"];
$sender = $_POST["from"];
$id = $_POST["id"];
$text = $_POST["text"];
$to   = $_POST["to"];
$networkCode = $_POST["from"];

require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;

//Set your credentials
$username   = "";
$apiKey     = "";

$AT         = new AfricasTalking($username, $apiKey);

$sms        = $AT->sms();

$recipients = $sender;

$message    = "Hi, this is a response to your SMS";

/*
use the 'from' parameter to send the SMS with your sender ID or your shortcode
Else, the message will be sent with the default sender ID

$from       = "";
*/
try {
    $result = $sms->send([
        'to'      => $recipients,
        'message' => $message,
        //'from'    => $from
    ]);

    print_r($result);
} catch (Exception $e) {
    echo "Error: ".$e->getMessage();
}