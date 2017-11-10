<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '952627492933-bksru6n1gudlme8bkph9qe38gs47r328.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'Wkv6OXlFnrVokklB0O150lAT'; //Google client secret
$redirectURL = 'http://rudrai.com/mypaper/role_admin/google.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to My Paper');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>