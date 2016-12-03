<?php

$CONSUMER_KEY = getenv('CONSUMER_KEY');
$CONSUMER_SECRET = getenv('CONSUMER_SECRET');
$OAUTH_CALLBACK ='http://127.0.0.1/callback.php';

require "vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

session_start();

//AccessToken取得まで
$connection = array();
$connection['oauth_token'] = $_SESSION['oauth_token'];
$connection['oauth_token_secret'] = $_SESSION['oauth_token_secret'];

if (isset($_REQUEST['oauth_token']) && $connection['oauth_token'] !== $_REQUEST['oauth_token']) {
    die( 'Error!' );
}

$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $connection['oauth_token'], $connection['oauth_token_secret']);
$_SESSION['access_token'] = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));

//ユーザー情報取得
$access_token = $_SESSION['access_token'];
$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

$user = $connection->get("account/verify_credentials");
var_dump( $user );
