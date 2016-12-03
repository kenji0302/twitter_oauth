<?php

$CONSUMER_KEY = getenv('CONSUMER_KEY');
$CONSUMER_SECRET = getenv('CONSUMER_SECRET');
$OAUTH_CALLBACK ='http://127.0.0.1/callback.php';

require "vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

session_start();

$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET);

$access_token = $connection->oauth('oauth/request_token', array('oauth_callback' => $OAUTH_CALLBACK));

$_SESSION['oauth_token'] = $access_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $access_token['oauth_token_secret'];

$url = $connection->url('oauth/authenticate', array('oauth_token' => $access_token['oauth_token']));

header( 'location: '. $url );
